<?php

namespace Database\Seeders;

use App\Models\JobType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (['Full-time', 'Freelance', 'Intern', 'Bisa Remote'] as $key => $value) {
            JobType::create([
                'type' => $value
            ]);
        }
    }
}
