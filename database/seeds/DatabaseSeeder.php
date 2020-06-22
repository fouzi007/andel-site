<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(EventTableSeeder::class);
         $this->call(WilayasTableSeeder::class);
         $this->call(ArticlesTableSeeder::class);
         $this->call(MediasTableSeeder::class);

        \App\SiteSettings::create([
            'featured_event_id' => 1,
            'communication_instructions' => view('layouts.communication')->render(),
            'presentation_assoc' => view('layouts.presentation')->render(),
        ]);

        $query = file_get_contents(database_path('users.sql'));
        $query2 = file_get_contents(database_path('user_events.sql'));

        \Illuminate\Support\Facades\DB::insert($query);
        \Illuminate\Support\Facades\DB::insert($query2);

        foreach(\App\User::where('id', '>=',4)->get() as $user) {
            $user->password = bcrypt($user->password);
            $user->save();
        }
    }
}
