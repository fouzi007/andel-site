<?php

use Illuminate\Database\Seeder;
use App\Media;
class MediasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fichiers = \File::files(public_path().'/img/uploads/events/');
        foreach($fichiers as $path) {
            Media::create([
                'type' => 0,
                'event_id' => 2,
                'title' => 'Image ',
                'description' =>  '',
                'url' => pathinfo($path)['filename'],
                'vues' => 0,
            ]);
        }
    }
}
