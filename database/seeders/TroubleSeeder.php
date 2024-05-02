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
    }
}
