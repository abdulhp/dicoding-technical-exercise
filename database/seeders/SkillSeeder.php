<?php

namespace Database\Seeders;

use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (['Back-End Developer', 'Front-End Developer', 'Product Manager', 'Product Designer', 'iOS Developer'] as $key => $value) {
            Skill::create([
                'skill' => $value
            ]);
        }
    }
}
