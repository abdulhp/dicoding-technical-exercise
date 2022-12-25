<?php

namespace App\Http\Controllers;

use App\Helpers\RajaOngkir;
use App\Models\ExperienceType;
use App\Models\Job;
use App\Models\JobType;
use App\Models\Skill;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $listSkills = Skill::all();
        $listJobTypes = JobType::all();
        $listExperienceTypes = ExperienceType::all();
        $listLocations = collect(RajaOngkir::getCity())->take(5);

        $listJobs = Job::all();

        return view('jobs', compact(
            'listSkills',
            'listJobTypes',
            'listExperienceTypes',
            'listLocations',
            'listJobs'
        ));
    }

    public function show(Request $request, Job $job) {
        return view('jobs-show', compact(
            'job'
        ));
    }
}
