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
        // This line is ESSENTIAL.
        // It MUST be present and NOT commented out (starting with //)
        $this->call([
            ProjectSeeder::class,
            ArticleSeeder::class, // Add this line to call the ArticleSeeder
        ]);
    }
}