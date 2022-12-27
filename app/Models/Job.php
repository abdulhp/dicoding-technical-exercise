<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    /**
     * Get the company that owns the Job
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    /**
     * Get the experience that owns the Job
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function experience_type()
    {
        return $this->belongsTo(ExperienceType::class, 'experience_id', 'id');
    }

    /**
     * Get the job_type that owns the Job
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function job_type()
    {
        return $this->belongsTo(JobType::class, 'job_type_id', 'id');
    }

    /**
     * Get all of the JobSkill for the Job
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function job_skill()
    {
        return $this->hasMany(JobSkill::class, 'job_id', 'id');
    }
}
