<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Skill;
use App\Interest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | User Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the user actions.
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $userId = Auth::user()->id;

        return Validator::make($data, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|max:255|unique:users|email',
            'email' => [
                'required',
                'string',
                'max:255',
                Rule::unique('users')->ignore($userId),
            ],
            'subtitle' => 'string',
            'address_line_1' => 'string',
            'address_line_2' => 'string',
            'address_city' => 'string',
            'address_postcode' => 'string',
            'dob' => 'date_format:mm/dd/Y',
            'interests' => 'array',
            'skills' => 'array',
            'visibility' => 'string',
            'notification' => 'string'
        ]);
    }

    /**
     * Show the user profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $user = User::find($userId);
        $skills = Skill::all();
        $interests = Interest::all();

        foreach($user->skills as $selectedSkill) {
            foreach ($skills as $skill) {
                    
                if($selectedSkill->pivot->skill_id === $skill->id || $skill->selected) {
                    $skill->selected = true;
                }else{
                    $skill->selected = false;
                }
            }
        }

        foreach($user->interests as $selectedInterest) {
            foreach ($interests as $interest) {
                    
                if($selectedInterest->pivot->interest_id === $interest->id || $interest->selected) {
                    $interest->selected = true;
                }else{
                    $interest->selected = false;
                }
            }
        }

        return view('user.profile', ['user' => $user, 'skills' => $skills, 'interests' => $interests]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function update(Request $req)
    {
        $validator = $this->validator($req->all());

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $userId = Auth::user()->id;
        $user = User::find($userId);

        $user->first_name = $req->first_name;
        $user->last_name = $req->last_name;
        $user->email = $req->email;
        $user->subtitle = $req->subtitle;
        $user->address_line_1 = $req->address_line_1;
        $user->address_line_2 = $req->address_line_2;
        $user->address_city = $req->address_city;
        $user->address_postcode = $req->address_postcode;
        $user->dob = $req->dob;
        $user->visibility = $req->visibility === 'true';
        $user->notification = $req->notification === 'true';
        $user->save();

        $user->interests()->detach();
        $user->skills()->detach();
        
        if ($req->interests) {
            foreach ($req->interests as $key => $interest) {
                $user->interests()->attach($interest);
            }
        }

        if($req->skills) {
            foreach ($req->skills as $key => $skill) {
                $user->skills()->attach($skill);
            }
        }

        return redirect()->back()->with('message', 'Successfully update user profile.');
    }
}
