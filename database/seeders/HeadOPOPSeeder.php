<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class HeadOPOPSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $headOPOP = User::create([
            'email' => 'headopop@gmail.com',
            'name' => 'head_OPOP',
            'password' => Hash::make('1234567890'),
            'first_name' => 'Валерий',
            'second_name' => 'Самарин',
            'patronymic' => 'Анатольевич',
            'group_id' => null,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $headOPOPRole = Role::create([
            'name' => 'head_OPOP',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        $headOPOPRole->givePermissionTo('access to head_OPOP panel');
        $headOPOP->assignRole('head_OPOP');
    }
}
