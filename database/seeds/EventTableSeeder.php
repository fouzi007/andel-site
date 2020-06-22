<?php

use Illuminate\Database\Seeder;
use App\Event;
class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 8èmes journées andel ( a venir )
        Event::create([
            'nom' => '8ème Congrès Annuel',
            'slug' => \Illuminate\Support\Str::slug('8ème Congrès Annuel'),
            'description' => '
<h3>8<sup>èmes</sup> journées nationales de l\'ANDEL</h3>
<p>Les thèmes retenus cette année sont les suivants :</p>
<ul>
<li>Thyroïde et auto-immunité</li>
<li>Chirurgie des GMN</li>
<li>Tumeurs hypophysaires</li>
<li>Hyperprolactinemies</li>
<li>gynécomasties</li>
<li>Diabète et grossesse</li>
<li>Diabète et nouvelles thérapeutiques</li>
<li>Lipides et HTA quoi de neuf</li>
<li>Diabètes secondaires</li>
<li>Neuropathie diabétique</li>
<li>Hypoglycémies</li>
<li>Chronobiologie</li>
<li>Télémédecine</li>
</ul>     ',
            'is_active' => 1,
            'lieu' => 'Sheraton Oran',
            'coordonnes' => json_encode([
                'long' => -0.6117725,
                'lat' => 35.7156376
            ]),
            'date_start' => \Carbon\Carbon::parse('2020-04-09'),
            'date_end' => \Carbon\Carbon::parse('2020-04-11'),
            'created_by_id' => 1,
        ]);
        // 7ème journées andel ( terminé )
        Event::create([
            'nom' => '7ème Congrès Annuel',
            'slug' => \Illuminate\Support\Str::slug('7ème Congrès Annuel'),
            'description' => 'Aucune description',
            'is_active' => false,
            'lieu' => 'Sétif',
            'date_start' => \Carbon\Carbon::parse('2019-03-07'),
            'date_end' => \Carbon\Carbon::parse('2019-03-09'),
            'created_by_id' => 1

        ]);
        Event::create([
            'nom' => 'Journée Thématique ANDEL',
            'slug' => \Illuminate\Support\Str::slug('Journée Thématique ANDEL'),
            'description' => 'Aucune description',
            'is_active' => false,
            'lieu' => 'Sidi Bel Abbès',
            'date_start' => \Carbon\Carbon::parse('2019-09-26'),
            'date_end' => \Carbon\Carbon::parse('2019-09-26'),
            'created_by_id' => 1

        ]);
    }
}
