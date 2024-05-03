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

        $trait = Traits::create([
            'description' => 'профессионализм, ответственность , инициативность',
            'score_id' => '4',
        ]);

        $trait = Traits::create([
            'description' => 'творческое мышление, гибкость и лидерские навыки',
            'score_id' => '4',
        ]);

        $trait = Traits::create([
            'description' => 'эффективность, креативность, отличные познавательные способности',
            'score_id' => '4',
        ]);





        $trait = Traits::create([
            'description' => 'коммуникабельность, точность, организованность',
            'score_id' => '3',
        ]);

        $trait = Traits::create([
            'description' => 'аналитические способности, стрессоустойчивость, координация',
            'score_id' => '3',
        ]);

        $trait = Traits::create([
            'description' => 'умение работать в комманде, устойчивость к стрессу, пунктуальность',
            'score_id' => '3',
        ]);





        $trait = Traits::create([
            'description' => 'пунктуальность, самостоятельность, обучаемость  ',
            'score_id' => '2',
        ]);

        $trait = Traits::create([
            'description' => 'средняя коммуникативная компетенция, креативность, умение идти на компромисс',
            'score_id' => '2',
        ]);
        
        $trait = Traits::create([
            'description' => 'обучаемость, умение идти на компромисс',
            'score_id' => '2',
        ]);


        $trait = Traits::create([
            'description' => 'отсутствие стремления к самосовершенствованию, неспособность к планированию  ',
            'score_id' => '1',
        ]);

        $trait = Traits::create([
            'description' => 'недостаток инициативы, немотивированность ',
            'score_id' => '1',
        ]);

        $trait = Traits::create([
            'description' => 'неспособность к адаптации, нерегулярность  ',
            'score_id' => '1',
        ]);

    }
}
