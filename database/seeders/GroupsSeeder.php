<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Group;

class GroupsSeeder extends Seeder
{
    public function run()
    {
        Group::create(['name' => '1121б', 'course_id' => 1, 'training_direction_id' => 1]);
        Group::create(['name' => '1521б', 'course_id' => 2, 'training_direction_id' => 2]);
        // Добавьте здесь другие примеры данных для таблицы 'groups'
    }
}
