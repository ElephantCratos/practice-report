<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PracticeType;

class PracticeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $practiceType = PracticeType::create([
            'id' => '1',
            'name' => 'Ознакомительная',
        ]);
    }
}
