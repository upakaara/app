@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="panel">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="nav nav-tabs nav-justified">
                            <li class="{{ is_active('jobs') }}"><a href="{{ route('jobs', ['type' => 'jobs']) }}">Job Listing</a></li>
                            <li class="{{ is_active('recommended_jobs') }}"><a href="{{ route('jobs', ['type' => 'recommended_jobs']) }}">Recomended Jobs For Me</a></li>
                            <li class="{{ is_active('my_jobs') }}"><a href="{{ route('jobs', ['type' => 'my_jobs']) }}">My Created Jobs</a></li>
                            @if(Auth::user()->hasUserRole && Auth::user()->hasUserRole->hasRole->name === 'moderator')
                              <li class="{{ is_active('need_approval') }}"><a href="{{ route('jobs', ['type' => 'need_approval']) }}">Need Approval</a></li>
                            @endif
                        </ul>
                    </div>
                    <div class="col-md-6">
                        <span class="pull-right">
                            <a class="btn btn-primary" href="{{ url('/jobs/create') }}">+ Create Job</a>
                        </span>
                    </div>
                </div>
            </div>
            
            <div class="panel-body">
                @if (session('success_message'))
                    <div id="successMessageAlert" class="alert alert-success">
                        {{ session('success_message') }}
                    </div>
                @endif
                @include('jobs.jobComponents.jobTable')
            </div>
            
        </div>
    </div>
</div>
@endsection
