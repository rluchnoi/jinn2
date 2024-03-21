<?php

namespace Database\Seeders;

use App\Models\Actor;
use App\Models\Film;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActorFilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $actorFilmListings = [
            [
                'film_id'  => Film::RESERVED_ID_1,
                'actor_id' => Actor::RESERVED_ID_1,
            ],
            [
                'film_id'  => Film::RESERVED_ID_1,
                'actor_id' => Actor::RESERVED_ID_2,
            ],
            [
                'film_id'  => Film::RESERVED_ID_1,
                'actor_id' => Actor::RESERVED_ID_3,
            ],



            [
                'film_id'  => Film::RESERVED_ID_2,
                'actor_id' => Actor::RESERVED_ID_4,
            ],
            [
                'film_id'  => Film::RESERVED_ID_2,
                'actor_id' => Actor::RESERVED_ID_5,
            ],
            [
                'film_id'  => Film::RESERVED_ID_2,
                'actor_id' => Actor::RESERVED_ID_6,
            ],



            [
                'film_id'  => Film::RESERVED_ID_3,
                'actor_id' => Actor::RESERVED_ID_7,
            ],
            [
                'film_id'  => Film::RESERVED_ID_3,
                'actor_id' => Actor::RESERVED_ID_8,
            ],
            [
                'film_id'  => Film::RESERVED_ID_3,
                'actor_id' => Actor::RESERVED_ID_9,
            ],



            [
                'film_id'  => Film::RESERVED_ID_4,
                'actor_id' => Actor::RESERVED_ID_7,
            ],
            [
                'film_id'  => Film::RESERVED_ID_4,
                'actor_id' => Actor::RESERVED_ID_8,
            ],
            [
                'film_id'  => Film::RESERVED_ID_4,
                'actor_id' => Actor::RESERVED_ID_9,
            ],



            [
                'film_id'  => Film::RESERVED_ID_5,
                'actor_id' => Actor::RESERVED_ID_7,
            ],
            [
                'film_id'  => Film::RESERVED_ID_5,
                'actor_id' => Actor::RESERVED_ID_8,
            ],
            [
                'film_id'  => Film::RESERVED_ID_5,
                'actor_id' => Actor::RESERVED_ID_9,
            ],



            [
                'film_id'  => Film::RESERVED_ID_6,
                'actor_id' => Actor::RESERVED_ID_5,
            ],
            [
                'film_id'  => Film::RESERVED_ID_6,
                'actor_id' => Actor::RESERVED_ID_10,
            ],
            [
                'film_id'  => Film::RESERVED_ID_6,
                'actor_id' => Actor::RESERVED_ID_11,
            ],
            [
                'film_id'  => Film::RESERVED_ID_6,
                'actor_id' => Actor::RESERVED_ID_12,
            ],
            [
                'film_id'  => Film::RESERVED_ID_6,
                'actor_id' => Actor::RESERVED_ID_13,
            ],
            [
                'film_id'  => Film::RESERVED_ID_6,
                'actor_id' => Actor::RESERVED_ID_14,
            ],
            [
                'film_id'  => Film::RESERVED_ID_6,
                'actor_id' => Actor::RESERVED_ID_15,
            ],



            [
                'film_id'  => Film::RESERVED_ID_7,
                'actor_id' => Actor::RESERVED_ID_5,
            ],
            [
                'film_id'  => Film::RESERVED_ID_7,
                'actor_id' => Actor::RESERVED_ID_12,
            ],
            [
                'film_id'  => Film::RESERVED_ID_7,
                'actor_id' => Actor::RESERVED_ID_13,
            ],
            [
                'film_id'  => Film::RESERVED_ID_7,
                'actor_id' => Actor::RESERVED_ID_14,
            ],
            [
                'film_id'  => Film::RESERVED_ID_7,
                'actor_id' => Actor::RESERVED_ID_15,
            ],



            [
                'film_id'  => Film::RESERVED_ID_8,
                'actor_id' => Actor::RESERVED_ID_5,
            ],
            [
                'film_id'  => Film::RESERVED_ID_8,
                'actor_id' => Actor::RESERVED_ID_14,
            ],
            [
                'film_id'  => Film::RESERVED_ID_8,
                'actor_id' => Actor::RESERVED_ID_15,
            ],
            [
                'film_id'  => Film::RESERVED_ID_8,
                'actor_id' => Actor::RESERVED_ID_16,
            ],
        ];

        foreach ($actorFilmListings as $actorFilmListing) {
            DB::table('actor_film')->updateOrInsert($actorFilmListing, $actorFilmListing);
        }
    }
}
