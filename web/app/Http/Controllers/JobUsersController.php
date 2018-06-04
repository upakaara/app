<?php

namespace App\Http\Controllers;

use Session;
use App\Job;
use App\JobUser;
use App\JobType;
use App\JobVacancy;
use App\JobVacancySkill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class JobUsersController extends Controller
{
        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $successMessage = '';
        $errorMessage = '';
        $validatedData = $request->validate([
            'job_id' => 'required|integer',
        ]);
        
        $data = $request->input();
        $job = Job::find($data['job_id']);
        
        if($job['status'] === 'pending') {
            $jobUser = null;
            $restoreUserJob = null;
            $trashedUserJob = JobUser::withTrashed()
                ->where('user_id', $user->id)
                ->where('job_id', $data['job_id'])
                ->first();
            if($trashedUserJob) {
                $restoreUserJob = $trashedUserJob->restore();
            } else {
                $jobUser = new JobUser;
                $jobUser->job_id = $data['job_id'];
                $jobUser->user_id = $user->id;
                $jobUser->user_role = 'contributer';
                $jobUser->save();

            }
            if(($jobUser || $restoreUserJob) && isset($data['start_job'])) {
                $jobVacancy = JobVacancy::where('job_id', $data['job_id'])
                ->delete();
                $job->status='started';
                $job->save();
                $successMessage = 'Joined & Started Job Successfully';
            } else {
                $jobVacancy = new JobVacancy;
                $jobVacancy->job_id = $data['job_id'];
                $jobVacancy->requested_by = $user->id;
                $jobVacancy->save();
                
                foreach($data['skills'] as $skill){
                    $jobVacancySkills = new JobVacancySkill;
                    $jobVacancySkills->job_vacancy_id = $jobVacancy->id;
                    $jobVacancySkills->skill_id = $skill;
                    $jobVacancySkills->save();
                }

                $successMessage = 'Joined Job Successfully';
            }
            Session::flash('success_message', $successMessage);            
        } else {
            $errorMessage = 'Cannot join at the moment';
            Session::flash('error_message', $errorMessage);            
        }
        return Redirect::back();
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $job = Job::find($id);
        $jobUsers = JobUser::where('job_id', $id)
            ->count();
        $jobUser = JobUser::where('job_id', $id)
            ->where('user_id', $user->id)
            ->delete();
        $jobVacancy = JobVacancy::where('requested_by', $user->id)
            ->delete();    
        if($jobUsers < 2) {
            $jobVacancy = new JobVacancy;
            $jobVacancy->job_id = $id;
            $jobVacancy->requested_by = $job->owner_id;
            $jobVacancy->save();
            
            $jobTypes = $job->jobType;
            $jobTypeSkills = $jobTypes->skills;

            foreach($jobTypeSkills as $jobTypeSkill){
                $jobVacancySkills = new JobVacancySkill;
                $jobVacancySkills->job_vacancy_id = $jobVacancy->id;
                $jobVacancySkills->skill_id = $jobTypeSkill->skill_id;
                $jobVacancySkills->save();
            }
            $jobStatus = Job::where('id', $id)
              ->update(['status' => 'pending']);
        }

        if(!$jobUser) {
            Session::flash('error_message', 'Failed to leave job!');
            return Redirect::back();
        }

        Session::flash('success_message', 'Successfully left job!');
        return Redirect::to('jobs');
    }
}
