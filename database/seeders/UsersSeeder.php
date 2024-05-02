<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $superAdmin = User::create([
            'name' => 'SuperAdmin',
            'email' => 'SuperAdmin@example.com',
            'password' => Hash::make('password'),
            'full_name' => 'Super Admin Adminovich',
            'group_id' => 1
        ]);

        $superAdminRole = Role::create([
            'name' => 'superAdmin',
        ]);

        $permissions = Permission::pluck('name')->all();
        $superAdminRole->syncPermissions($permissions);
        $superAdmin->assignRole('superAdmin');
/////////////////////////////////////////////////////////////////////////
        $admin = User::create([
            'name' => 'John Do',
            'email' => 'jane@example.com',
            'password' => Hash::make('password'),
            'full_name' => 'Петрушов Александр Сергеевич',
            'group_id' => 1
        ]);

        $adminRole = Role::create([
            'name' => 'admin',
        ]);

        $adminRole->givePermissionTo('access to admin panel');
        $admin->assignRole('admin');
/////////////////////////////////////////////////////////////////////////
        $head_ugrasu = User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password'),
            'full_name' => 'Малых Кирилл Алексеевич',
            'group_id' => 1,
        ]);

        $head_ugrasuRole = Role::create([
            'name' => 'head_ugrasu',
        ]);

        $head_ugrasuRole->givePermissionTo('access to head_ugrasu panel');
        $head_ugrasu->assignRole('head_ugrasu');
/////////////////////////////////////////////////////////////////////////
        $head_OPOP = User::create([
            'name' => 'Joh',
            'email' => 'jaaaaa@example.com',
            'password' => Hash::make('password'),
            'full_name' => 'Плосков Артур Игоревич',
            'group_id' => 2,
        ]);

        $head_OPOPRole = Role::create([
            'name' => 'head_OPOP',
        ]);

        $head_OPOPRole->givePermissionTo('access to head_OPOP panel');
        $head_OPOP->assignRole('head_OPOP');
/////////////////////////////////////////////////////////////////////////
        $student = User::create([
            'name' => 'John',
            'email' => 'jaaaaan@example.com',
            'password' => Hash::make('password'),
            'full_name' => 'Розмахов Илья Владимирович',
            'group_id' => 1,

        ]);

        $studentRole = Role::create([
            'name' => 'student',
        ]);

        $studentRole->givePermissionTo('access to student panel');
        $student->assignRole('student');
/////////////////////////////////////////////////////////////////////////
    }
}
