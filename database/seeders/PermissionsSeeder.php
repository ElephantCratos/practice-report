<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        Permission::create(['name' => 'access to admin panel']);
        Permission::create(['name' => 'access to head_OPOP panel']);
        Permission::create(['name' => 'access to head_practice panel']);
        Permission::create(['name' => 'access to student panel']);
    }
}
