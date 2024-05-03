<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Troubles;

class TroubleSeeder extends Seeder
{
    public function run(): void
    {
        $trouble = Troubles::create([
            'description' => 'оперативно, качественно',
            'score_id' => '4',
        ]);

        Troubles::create([
            'description' => 'стабильно, без особых проблем',
            'score_id' => '3',
        ]);

        Troubles::create([
            'description'=> 'достаточно стабильно, с частичной потерей мотивации ',
            'score_id'=> '2',
        ]);  

        Troubles::create([
            'description' => 'плохо, теряет последовательность действий',
            'score_id' => '1',
        ]);
    }
}
