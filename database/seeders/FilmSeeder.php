<?php

namespace Database\Seeders;

use App\Models\Film;
use Illuminate\Database\Seeder;

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $films = [
            [
                'name'  => 'Star Wars: Episode II - Attack of the Clones',
                'image' => '/storage/images/StarWars2.jpg'
            ],
            [
                'name'  => "Ocean's Eleven",
                'image' => '/storage/images/Oceans11.jpg'
            ],
            [
                'name'  => "The Devil's Advocate",
                'image' => '/storage/images/DevilsAdvocate.jpg'
            ],
        ];

        foreach ($films as $film) {
            Film::updateorcreate($film, $film);
        }
    }
}
