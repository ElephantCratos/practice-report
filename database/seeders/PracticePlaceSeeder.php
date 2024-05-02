<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PracticePlace;

class PracticePlaceSeeder extends Seeder
{
    public function run()
    {
        PracticePlace::create([
            'name' => 'Югорский Государственный Университет',
            'address' => 'ХМАО, г. Ханты-Мансийск, ул. Чехова, 16',
            'name_p' => 'Югорском Государсвенном Университете',
        ]);
        
    }
}
