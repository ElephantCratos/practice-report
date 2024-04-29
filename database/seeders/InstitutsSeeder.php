<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Institut;

class InstitutsSeeder extends Seeder
{
    public function run()
    {
        Institut::create(['name' => 'Высшая школа цифровых технологий']);
        Institut::create(['name' => 'Institut B']);
        // Добавьте здесь другие примеры данных для таблицы 'instituts'
    }
}
