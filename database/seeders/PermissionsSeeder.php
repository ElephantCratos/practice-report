<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'Что то может']);
        Permission::create(['name' => 'Голова не варит']);
        Permission::create(['name' => 'Все неймы пермишнов ']);
        Permission::create(['name' => 'строго для теста']);
    }
}
