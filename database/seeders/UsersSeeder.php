<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password'),
            'full_name' => 'Малых Кирилл Алексеевич',
            'group_id' => 1
        ]);
        User::create([
            'name' => 'John Do',
            'email' => 'jane@example.com',
            'password' => Hash::make('password'),
            'full_name' => 'Петрушов Александр Сергеевич',
            'group_id' => 1
        ]);
        User::create([
            'name' => 'John',
            'email' => 'jaaaaan@example.com',
            'password' => Hash::make('password'),
            'full_name' => 'Розмахов Илья Владимирович',
            'group_id' => 1
        ]);
        User::create([
            'name' => 'Joh',
            'email' => 'jaaaaa@example.com',
            'password' => Hash::make('password'),
            'full_name' => 'Плосков Артур Игоревич',
            'group_id' => 2
        ]);
        // Добавьте здесь другие примеры данных для таблицы 'users'
    }
}
