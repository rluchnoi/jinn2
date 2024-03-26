<?php

namespace Database\Seeders;

use App\Models\Actor;
use Illuminate\Database\Seeder;

class ActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $actors = [
            [
                'id'   => Actor::RESERVED_ID_1,
                'name' => 'Ewan McGregor'
            ],
            [
                'id'   => Actor::RESERVED_ID_2,
                'name' => 'Natalie Portman'
            ],
            [
                'id'   => Actor::RESERVED_ID_3,
                'name' => 'Hayden Christensen'
            ],



            [
                'id'   => Actor::RESERVED_ID_4,
                'name' => 'Keanu Reeves'
            ],
            [
                'id'   => Actor::RESERVED_ID_5,
                'name' => 'Al Pacino'
            ],
            [
                'id'   => Actor::RESERVED_ID_6,
                'name' => 'Charlize Theron'
            ],



            [
                'id'   => Actor::RESERVED_ID_7,
                'name' => 'George Clooney'
            ],
            [
                'id'   => Actor::RESERVED_ID_8,
                'name' => 'Brad Pitt'
            ],
            [
                'id'   => Actor::RESERVED_ID_9,
                'name' => 'Matt Damon'
            ],



            [
                'id'   => Actor::RESERVED_ID_10,
                'name' => 'Marlon Brando'
            ],
            [
                'id'   => Actor::RESERVED_ID_11,
                'name' => 'James Caan'
            ],
            [
                'id'   => Actor::RESERVED_ID_12,
                'name' => 'Robert Duvall'
            ],
            [
                'id'   => Actor::RESERVED_ID_13,
                'name' => 'John Cazale'
            ],
            [
                'id'   => Actor::RESERVED_ID_14,
                'name' => 'Diane Keaton'
            ],
            [
                'id'   => Actor::RESERVED_ID_15,
                'name' => 'Talia Shire'
            ],
            [
                'id'   => Actor::RESERVED_ID_16,
                'name' => 'Andy García'
            ]
        ];

        foreach ($actors as $actor) {
            Actor::updateOrInsert($actor, $actor);
        }
    }
}
