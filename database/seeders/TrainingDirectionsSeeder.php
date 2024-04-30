<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TrainingDirection;
use App\Models\User;
use App\Models\Institute;

class TrainingDirectionsSeeder extends Seeder
{
    public function run()
    {
        // Получаем первого пользователя (предполагается, что он будет главой OPOP)
        $head_OPOP = User::first();

        // Получаем первый институт
        $institute = Institute::first();

        TrainingDirection::create([
            'name' => 'Информатика и вычислительная техника',
            'head_OPOP_id' => $head_OPOP->id,
            'institute_id' => $institute->id
        ]);

        TrainingDirection::create([
            'name' => 'Програмная инженерия',
            'head_OPOP_id' => $head_OPOP->id,
            'institute_id' => $institute->id
        ]);

        // Добавьте здесь другие примеры данных для таблицы 'training_directions'
    }
}
