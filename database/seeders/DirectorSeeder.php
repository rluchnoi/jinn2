<?php

namespace Database\Seeders;

use App\Models\Director;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DirectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $directors = [
            [
                'id'   => Director::RESERVED_ID_1,
                'name' => 'George Lucas'
            ],
            [
                'id'   => Director::RESERVED_ID_2,
                'name' => 'Taylor Hackford'
            ],
            [
                'id'   => Director::RESERVED_ID_3,
                'name' => 'Steven Soderbergh'
            ],
            [
                'id'   => Director::RESERVED_ID_4,
                'name' => 'Francis Ford Coppola'
            ]
        ];

        foreach ($directors as $director) {
            Director::updateOrInsert($director, $director);
        }
    }
}
