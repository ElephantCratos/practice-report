<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([
            ContractTypeSeeder::class,
            PracticeSortSeeder::class,
            PracticeTypeSeeder::class,
            ScoreSeeder::class,
            InstitutsSeeder::class,
            TrainingDirectionsSeeder::class,
            CoursesSeeder::class,
            GroupsSeeder::class,
            UsersSeeder::class
        ]);
    }
}
