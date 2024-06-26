<?php

namespace Database\Seeders;

use App\Models\Practice;
use App\Models\Traits;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Contracts\Permission;

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
            PermissionsSeeder::class,
            ContractTypeSeeder::class,
            PracticePlaceSeeder::class,
            PracticeSortSeeder::class,
            PracticeTypeSeeder::class,
            ScoreSeeder::class,
            VolumeSeeder::class,
            InstitutesSeeder::class,
            TrainingDirectionsSeeder::class,
            CoursesSeeder::class,
            GroupsSeeder::class,
            TroubleSeeder::class,
            TraitSeeder::class,
            UsersSeeder::class,
        ]);
    }
}
