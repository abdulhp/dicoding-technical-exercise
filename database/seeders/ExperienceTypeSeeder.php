<?php

namespace Database\Seeders;

use App\Models\ExperienceType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExperienceTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (['Freshgraduate', '1-3 tahun', '3-5 tahun', '5-10 tahun', 'Lebih dari 10 tahun'] as $key => $value) {
            ExperienceType::create([
                'experience' => $value
            ]);
        }
    }
}
