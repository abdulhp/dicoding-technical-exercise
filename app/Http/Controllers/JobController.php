<?php

namespace App\Http\Controllers;

use App\Helpers\RajaOngkir;
use App\Models\Applicant;
use App\Models\ExperienceType;
use App\Models\Job;
use App\Models\JobType;
use App\Models\Skill;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $listSkills = Skill::all();
        $listJobTypes = JobType::all();
        $listExperienceTypes = ExperienceType::all();
        $listJobs = Job::with('company');

        if($request->has('job_name_search')) {
            $listJobs->whereRaw("lower(name) like '%".$request->input('job_name_search')."%'");
        }
        // [name=skill], [name=work_type], [name=location], [name=work_experience]

        if($request->has('skill')){
            $listJobs->whereHas('job_skill', function($q) use($request) {
                $q->whereHas('skill', function($q2) use($request) {
                    $q2->where('skill', $request->input('skill'));
                });
            });
        }

        if($request->has('work_type')){
            $listJobs->whereHas('job_type', function($q) use($request) {
                $q->where('type', $request->input('work_type'));
            });
        }

        if($request->has('location')){
            $listJobs->where('job_location', $request->input('location'));
        }

        if($request->has('work_experience')){
            $listJobs->whereHas('experience_type', function($q) use($request) {
                $q->where('experience', $request->input('work_experience'));
            });
        }

        $listJobs = $listJobs->get();

        $listLocations = collect(RajaOngkir::getCity())->whereIn('city_name', $listJobs->pluck('job_location'))->take(5);


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

    public function apply(Request $request, Job $job) {
        return view('jobs-apply', compact(
            'job'
        ));
    }

    public function store_applicant(Request $request, Job $job) {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'email' => ['required', 'email:dns,rfc'],
            'phone' => ['required', 'string'],
            'cover_letter' => ['required', 'string'],
            'cv_link' => ['required', 'string'],
            'additional_link' => []
        ], [
            'required' => 'Kolom :attribute harus diisi'
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput();
        }else if($job->closed_date < Carbon::now()) {
            return redirect()->back()->withErrors('Maaf, lowongan sudah ditutup')->withInput();
        }else {
            $validatedData = $validator->validate();
            $existingApplicants = Applicant::where('email', $validatedData['email'])
            ->where('phone', $validatedData['phone'])->get();

            if($existingApplicants->where('job_id', $job->id)->count() >= 1) {
                return redirect()->back()->withErrors('Maaf, kamu tidak bisa melakukan lamaran lebih dari 1 kali pada lowongan yang sama')->withInput();
            }else if($existingApplicants->count() >= 3) {
                return redirect()->back()->withErrors('Maaf, kamu tidak bisa melakukan lamaran lebih dari 3 kali')->withInput();
            }else{
                $validatedData['status'] = 'waiting';
                $validatedData['job_id'] = $job->id;
                Applicant::create($validatedData);

                return redirect('/jobs/'.$job->id.'/apply')->with('success', 'Berhasil mengirimkan lamaran pekerjaan');
            }
        }
    }
}
