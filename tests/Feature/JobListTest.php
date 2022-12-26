<?php

namespace Tests\Feature;

use App\Models\Company;
use App\Models\Job;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class JobListTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_success()
    {
        $response = $this->get('/jobs');

        $response->assertStatus(200);
    }

    public function test_job_name()
    {
        $page = $this->get('/jobs');
        $jobList = Job::all();

        $page->assertSeeText($jobList->pluck('name')->toArray());
    }

    public function test_job_company()
    {
        $page = $this->get('/jobs');
        $companyList = Company::whereHas('job')->get();

        $page->assertSeeText($companyList->pluck('name')->toArray());
    }


}
