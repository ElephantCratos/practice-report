<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Volume;

class VolumeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $volume = Volume::create([
            'description' => 'не выполнено',
            'score_id' => '1',
        ]);

        $volume = Volume::create([
            'description' => 'выполнено частично',
            'score_id' => '2',
        ]);

        $volume = Volume::create([
            'description' => 'выполнено преимущественно хорошо',
            'score_id' => '3',
        ]);

        $volume = Volume::create([
            'description' => 'выполнено в полном объёме',
            'score_id' => '4',
        ]);
    }
}
