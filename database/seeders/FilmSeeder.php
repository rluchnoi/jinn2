<?php

namespace Database\Seeders;

use App\Models\Film;
use App\Models\Director;
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
                'id'          => Film::RESERVED_ID_1,
                'name'        => 'Star Wars: Episode II - Attack of the Clones',
                'image'       => '/storage/images/StarWars2.jpg',
                'video'       => '/storage/videos/example/index.m3u8',
                'year'        => '2002',
                'director_id' => Director::RESERVED_ID_1,
            ],



            [
                'id'          => Film::RESERVED_ID_2,
                'name'        => "The Devil's Advocate",
                'image'       => '/storage/images/DevilsAdvocate.jpg',
                'video'       => '/storage/videos/example/index.m3u8',
                'year'        => '1997',
                'director_id' => Director::RESERVED_ID_2,
            ],



            [
                'id'          => Film::RESERVED_ID_3,
                'name'        => "Ocean's Eleven",
                'image'       => '/storage/images/Oceans11.jpg',
                'video'       => '/storage/videos/example/index.m3u8',
                'year'        => '2001',
                'director_id' => Director::RESERVED_ID_3,
            ],
            [
                'id'          => Film::RESERVED_ID_4,
                'name'        => "Ocean's Twelve",
                'image'       => '/storage/images/Oceans12.jpg',
                'video'       => '/storage/videos/example/index.m3u8',
                'year'        => '2004',
                'director_id' => Director::RESERVED_ID_3,
            ],
            [
                'id'          => Film::RESERVED_ID_5,
                'name'        => "Ocean's Thirteen",
                'image'       => '/storage/images/Oceans13.jpg',
                'video'       => '/storage/videos/example/index.m3u8',
                'year'        => '2007',
                'director_id' => Director::RESERVED_ID_3,
            ],


            
            [
                'id'          => Film::RESERVED_ID_6,
                'name'        => 'The Godfather',
                'image'       => '/storage/images/TheGodfather.jpg',
                'video'       => '/storage/videos/example/index.m3u8',
                'year'        => '1972',
                'director_id' => Director::RESERVED_ID_4,
            ],
            [
                'id'          => Film::RESERVED_ID_7,
                'name'        => 'The Godfather 2',
                'image'       => '/storage/images/TheGodfather2.jpg',
                'video'       => '/storage/videos/example/index.m3u8',
                'year'        => '1974',
                'director_id' => Director::RESERVED_ID_4,
            ],
            [
                'id'          => Film::RESERVED_ID_8,
                'name'        => 'The Godfather 3',
                'image'       => '/storage/images/TheGodfather3.jpg',
                'video'       => '/storage/videos/example/index.m3u8',
                'year'        => '1990',
                'director_id' => Director::RESERVED_ID_4,
            ],
        ];

        foreach ($films as $film) {
            Film::updateOrInsert($film, $film);
        }
    }
}
