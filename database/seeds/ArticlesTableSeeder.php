<?php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Throwable
     */
    public function run()
    {
        \App\Article::create([
            'type' => 'Divers',
            'titre' => 'Lancement du site web',
            'slug' => \Illuminate\Support\Str::slug('Lancement du site web'),
            'article' => view('data.article')->render(),
            'is_published' => true,
            'image' => 'img/article.png',
            'created_by_id' => 2
        ]);
    }
}
