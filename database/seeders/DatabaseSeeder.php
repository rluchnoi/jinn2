<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(DirectorSeeder::class);
        $this->call(ActorSeeder::class);
        $this->call(FilmSeeder::class);
        $this->call(ActorFilmSeeder::class);
        $this->call(UserSeeder::class);
    }
}
