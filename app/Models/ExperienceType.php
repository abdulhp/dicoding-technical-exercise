<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExperienceType extends Model
{
    use HasFactory;

    public function job()
    {
        return $this->hasMany(Job::class, 'experience_id', 'id');
    }
}
