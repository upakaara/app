<?php

namespace App\Http\Controllers;

use DB;
use Session;
use App\Job;
use App\JobType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $jobs = [];
        $type = $request->get('type');
        if($type === 'need_approval') {
            if($user->hasUserRole && $user->hasUserRole->hasRole->name === 'moderator')
            $jobs = Job::where('owner_id', '!=', $user->id)
                ->where('status', 'approval')
                ->orderBy('created_at', 'desc')
                ->get();          
        } else if($type === 'my_jobs') {
            $jobs = Job::where('owner_id', $user->id)
                ->orderBy('created_at', 'desc')
                ->get();
        } else if($type && $type === 'recommended_jobs') {
              $jobTypeIds = [];
              $userSkills = $user->skills;
              $userInterests = $user->interests;
              foreach ($userSkills as $skill) {
                  foreach ($skill->jobTypeSkill as $skillJobType) {
                      $jobTypeIds[] = $skillJobType->jobType->id;
                  }
              }

              foreach ($userInterests as $interest) {
                  foreach ($interest->jobTypeInterest as $interestJobType) {
                      $jobTypeIds[] = $interestJobType->jobType->id;
                  }
              }
              $uniqueJobTypes = array_unique($jobTypeIds);
              $jobs = Job::where('owner_id', '!=', $user->id)
                  ->where('job_type_id', $uniqueJobTypes)
                  ->where('status', '!=', 'approval')
                  ->orderBy('created_at', 'desc')
                  ->get();
        } else {
            $jobs = Job::where('owner_id', '!=', $user->id)
                ->where('status', '!=', 'approval')
                ->orderBy('created_at', 'desc')
                ->get();
        }
        
        return view('jobs/index')->with('jobs', $jobs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $jobTypes = JobType::all();
        return view('jobs/create')
            ->with('jobTypes', $jobTypes);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'jobType' => 'required|integer',
            'duration' => 'required|integer',
        ]);
        
        $data = $request->input();
        $jobs = new Job;
        $jobs->title = $data['title'];
        $jobs->summary = $data['summary'];
        $jobs->description = $data['description'];
        $jobs->job_type_id = $data['jobType'];
        $jobs->duration = $data['duration'];
        $jobs->owner_id = $user->id;
        $jobs->save();

        Session::flash('success_message', 'Job Added Successfully');
        return Redirect::to('jobs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $job = Job::find($id);

        if ( $job ) {
            return view('jobs/show')
                ->with('job', $job);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $job = Job::find($id);
        $job->delete();

        Session::flash('success_message', 'Successfully removed the job!');
        return Redirect::to('jobs');
    }
}
