<?php

namespace App\Http\Controllers;

use Session;
use App\Job;
use App\JobUser;
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
        
        $validatedData = $request->validate([
            'job_id' => 'required|integer',
        ]);
        
        $data = $request->input();
        $job = Job::find($data['job_id']);
        
        if($job['status'] === 'pending') {
            $jobUser = new JobUser;
            $jobUser->job_id = $data['job_id'];
            $jobUser->user_id = $user->id;
            $jobUser->user_role = 'contributer';
            $jobUser->save();
            Session::flash('success_message', 'Joined Job Successfully');
        } else {
            Session::flash('error_message', 'Cannot join at the moment');            
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
        $jobUser = JobUser::where('job_id', $id)
            ->where('user_id', $user->id)
            ->delete();

        if(!$jobUser) {
            Session::flash('error_message', 'Failed to leave job!');
            return Redirect::back();
        }

        Session::flash('success_message', 'Successfully left job!');
        return Redirect::to('jobs');
    }
}
