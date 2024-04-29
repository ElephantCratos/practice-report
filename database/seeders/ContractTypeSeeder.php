<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ContractType;

class ContractTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contractType = ContractType::create([
            'id' => '1',
            'name' => 'Долгосрочный',
        ]);

        $contractType = ContractType::create([
            'id' => '2',
            'name' => 'Краткосрочный',
        ]);
    }
}
