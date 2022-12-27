<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    /**
     * Get all of the job_skill for the Skill
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function job_skill()
    {
        return $this->hasMany(JobSkill::class, 'skill_id', 'id');
    }
}
