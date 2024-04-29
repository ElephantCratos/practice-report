<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Score;

class ScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $score = Score::create([
            'id' => '1',
            'name' => 'Неудовлетворительно',
        ]);

        $score = Score::create([
            'id' => '2',
            'name' => 'Удовлетворительно',
        ]);

        $score = Score::create([
            'id' => '3',
            'name' => 'Хорошо',
        ]);

        $score = Score::create([
            'id' => '4',
            'name' => 'Отлично',
        ]);
    }
}
