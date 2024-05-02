<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Traits;

class TraitSeeder extends Seeder
{
    public function run(): void
    {
        $trait = Traits::create([
            'description' => 'инициативность, креативность, надежность',
            'score_id' => '4',
        ]);
    }
}
