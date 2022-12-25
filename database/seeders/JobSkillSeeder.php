<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\JobSkill;
use App\Models\Skill;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JobSkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Job::all() as $key => $job) {
            JobSkill::create([
                'job_id' => $job->id,
                'skill_id' => Skill::all()->random()->id,
            ]);
        }
    }
}
