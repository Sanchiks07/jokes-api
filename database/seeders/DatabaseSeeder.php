<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Joke;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Joke::factory()->count(20)->create();
    }
}
