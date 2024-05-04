<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\TrainingDirection;

class UsersSeeder extends Seeder
{
    public function run()
    {
        $studentRole = Role::create([
            'name' => 'student',
        ]);

        $studentRole->givePermissionTo('access to student panel');



        $head_OPOPRole = Role::create([
            'name' => 'head_OPOP',
        ]);

        $head_OPOPRole->givePermissionTo('access to head_OPOP panel');


        $adminRole = Role::create([
            'name' => 'admin',
        ]);

        $adminRole->givePermissionTo('access to admin panel');


        $head_ugrasuRole = Role::create([
            'name' => 'head_ugrasu',
        ]);

        $head_ugrasuRole->givePermissionTo('access to head_ugrasu panel');


        $head_enterpriceRole = Role::create([
            'name' => 'head_enterprice',
        ]);

        $head_enterpriceRole->givePermissionTo('access to head_enterprice panel');



        $head_OPOP_samarin = User::create([
            'name' => 'samarin',
            'email' => 'samarin@example.com',
            'full_name' => 'Самарин Валерий Анатольевич',
            'full_name_r' => 'Самарина Валерия Анатольевича',
            'full_name_d' => 'Самарину Валерию Анатольевичу',
            'password' => Hash::make('password'),
            'position' => 'доцент'
        ]);


        $head_OPOP_samarin->assignRole('head_OPOP');


        $head_OPOP_samarina = User::create([
            'name' => 'samarina',
            'email' => 'samarina@example.com',
            'full_name' => 'Самарина Ольга Владимировна',
            'full_name_r' => 'Самарину Ольгу Владимировну',
            'full_name_d' => 'Самариной Ольге Владимировне',
            'password' => Hash::make('password'),
            'position' => 'доцент'
        ]);

        $head_OPOP_samarina->assignRole('head_OPOP');





        $trainingDirections = TrainingDirection::all();

        $i = 1 ;

        foreach ($trainingDirections as $direction)
        {
            $direction['head_OPOP_id'] = $i + 1;
            $i++;
            $direction->save();
        }


/////////////////////////////////////////////////////////////////////////
        $pas = User::create([
            'name' => 'pas',
            'email' => 'pas@example.com',
            'password' => Hash::make('password'),
            'full_name' => 'Петрушов Александр Сергеевич',
            'full_name_r' => 'Петрушова Александра Сергеевича',
            'full_name_d' => 'Петрушову Александру Сергеевичу',
            'group_id' => 1,
            'position' => 'студент'
        ]);

        $pas->assignRole('student');


/////////////////////////////////////////////////////////////////////////
        $mka = User::create([
            'name' => 'mka',
            'email' => 'mka@example.com',
            'password' => Hash::make('password'),
            'full_name' => 'Малых Кирилл Алексеевич',
            'full_name_r' => 'Малых Кирилла Алексеевича',
            'full_name_d' => 'Малых Кириллу Алексеевичу',
            'group_id' => 1,
            'position' => 'студент'

        ]);


        $mka->assignRole('student');

/////////////////////////////////////////////////////////////////////////
        $pai = User::create([
            'name' => 'pai',
            'email' => 'pai@example.com',
            'password' => Hash::make('password'),
            'full_name' => 'Плосков Артур Игоревич',
            'full_name_r' => 'Плоскова Артура Игоревича',
            'full_name_d' => 'Плоскову Артуру Игоревичу',
            'group_id' => 2,
            'position' => 'студент'
        ]);


        $pai->assignRole('student');
        /////////////////////////////////////////////////////////////////////////
        $head_enterprice = User::create([
            'name' => 'Zmeev',
            'email' => 'zmeev@example.com',
            'password' => Hash::make('password'),
            'full_name' => 'Змеев Денис Олегович',
            'full_name_r' => 'Змеева Дениса Олеговича',
            'full_name_d' => 'Змееву Денису Олеговичу',
            'position' => 'доцент',

        ]);


        $head_enterprice->assignRole('head_enterprice');
/////////////////////////////////////////////////////////////////////////
        $riv = User::create([
            'name' => 'riv',
            'email' => 'riv@example.com',
            'password' => Hash::make('password'),
            'full_name' => 'Розмахов Илья Владимирович',
            'full_name_r' => 'Розмахова Ильи Владимировича',
            'full_name_d' => 'Розмахову Илье Владимировичу',
            'group_id' => 1,
            'position' => 'студент',

        ]);


        $riv->assignRole('student');

        /////////////////////////////////////////////////////////////////

        $admin = User::create([
            'name' => 'pka',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'full_name' => 'Петунин Кирилл Александрович',
            'full_name_r' => 'Петунин Кирилл Александрович',
            'full_name_d' => 'Петунин Кирилл Александрович',
        ]);

        $admin->assignRole('admin');
/////////////////////////////////////////////////////////////////////////
        $superAdmin = User::create([
            'name' => 'SuperAdmin',
            'email' => 'SuperAdmin@example.com',
            'password' => Hash::make('password'),
            'full_name' => 'Super Admin Adminovich',
        ]);

        $superAdminRole = Role::create([
                'name' => 'superAdmin',
            ]);

        $permissions = Permission::pluck('name')->all();
        $superAdminRole->syncPermissions($permissions);
        $superAdmin->assignRole('superAdmin', 'student', 'admin', 'head_OPOP', 'head_enterprice', 'head_ugrasu');
    }
}
