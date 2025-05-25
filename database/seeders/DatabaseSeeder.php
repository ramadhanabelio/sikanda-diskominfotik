<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\TitleSeeder;
use Database\Seeders\BudgetSeeder;
use Database\Seeders\SubtitleSeeder;
use Database\Seeders\DescriptionSeeder;
use Database\Seeders\SubSubtitleSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            TitleSeeder::class,
            BudgetSeeder::class,
            SubtitleSeeder::class,
            DescriptionSeeder::class,
            SubSubtitleSeeder::class,
        ]);
    }
}
