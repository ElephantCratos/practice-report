<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Institute;

class InstitutesSeeder extends Seeder
{
    public function run()
    {
        Institute::create(['name' => 'Высшая школа цифровых технологий']);
        Institute::create(['name' => 'Institut B']);
        // Добавьте здесь другие примеры данных для таблицы 'instituts'
    }
}
