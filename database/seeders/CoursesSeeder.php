<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Course;

class CoursesSeeder extends Seeder
{
    public function run()
    {
        Course::create(['name' => '1']);
        Course::create(['name' => '2']);
        Course::create(['name' => '3']);
        Course::create(['name' => '4']);
        Course::create(['name' => 'м1']);
        Course::create(['name' => 'м2']);
        // Добавьте здесь другие примеры данных для таблицы 'courses'
    }
}
