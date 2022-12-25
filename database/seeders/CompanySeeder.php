<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CompanyEmployeeSize;
use Faker\Factory;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for($i = 0; $i < 10; $i++) {
            Company::create([
                'name' => $faker->company(),
                'image' => 'example-joblist.png',
                'company_size_id' => CompanyEmployeeSize::all()->random()->id,
                'description' => $faker->catchPhrase()
            ]);
        }
    }
}
