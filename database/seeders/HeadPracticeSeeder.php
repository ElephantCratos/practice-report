<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class HeadPracticeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $headPractice = User::create([
            'email' => 'headpractice@gmail.com',
            'name' => 'head_practice',
            'password' => Hash::make('1234567890'),
            'first_name' => 'Денис',
            'second_name' => 'Змеев',
            'patronymic' => 'Олегович',
            'group_id' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $headPracticeRole = Role::create([
            'name' => 'head_practice',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $headPracticeRole->givePermissionTo('access to head_practice panel');
        $headPractice->assignRole('head_practice');
    }
}
