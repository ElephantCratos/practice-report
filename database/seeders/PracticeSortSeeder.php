<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PracticeSort;

class PracticeSortSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $practiceSort = PracticeSort::create([
            'id' => '1',
            'name' => 'Учебная',
            'p_d' => 'УЧЕБНОЙ',
            'p_w' => 'учебную'
        ]);
    }
}
