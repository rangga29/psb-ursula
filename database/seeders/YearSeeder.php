<?php

namespace Database\Seeders;

use App\Models\Year;
use Illuminate\Database\Seeder;

class YearSeeder extends Seeder
{
    public function run()
    {
        Year::create([
            'code' => '2223',
            'name' => '2022/2023',
            'isMainYear' => 0
        ]);

        Year::create([
            'code' => '2324',
            'name' => '2023/2024',
            'isMainYear' => 1
        ]);

        Year::create([
            'code' => '2425',
            'name' => '2024/2025',
            'isMainYear' => 0
        ]);
    }
}
