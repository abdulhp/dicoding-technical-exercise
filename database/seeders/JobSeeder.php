<?php

namespace Database\Seeders;

use App\Helpers\RajaOngkir;
use App\Models\Company;
use App\Models\ExperienceType;
use App\Models\Job;
use App\Models\JobType;
use Carbon\Carbon;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $city = collect(RajaOngkir::getCity());

        for($i = 0; $i < 10; $i++) {
            Job::create([
                'name' => $faker->jobTitle(),
                'closed_date' => Carbon::now(),
                'job_location' => $city->random()['city_name'],
                'description' => $faker->paragraphs(3, true),
                'job_responsibilities' => $faker->paragraphs(3, true),
                'job_requirements' => $faker->paragraphs(3, true),
                'closing_statement' => $faker->paragraphs(3, true),
                'company_id' => Company::all()->random()->id,
                'experience_id' => ExperienceType::all()->random()->id,
                'job_type_id'=> JobType::all()->random()->id,
            ]);
        }
    }
}
