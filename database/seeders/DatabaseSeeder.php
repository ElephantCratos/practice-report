<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PermissionsSeeder::class,
            AdminSeeder::class,
            HeadOPOPSeeder::class,
            HeadPracticeSeeder::class,
        ]);

        $this->call([
            ContractTypeSeeder::class,
            PracticeSortSeeder::class,
            PracticeTypeSeeder::class,
            ScoreSeeder::class
        ]);
    }
}
