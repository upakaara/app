@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="panel">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6">
                        <ul class="nav nav-tabs nav-justified">
                            <li id="menu1"><a href="{{ url('/jobs?type=jobs') }}">Job Listing</a></li>
                            <li id="menu2"><a href="{{ url('/jobs?type=my_jobs') }}">My Created Jobs</a></li>
                            @if(Auth::user()->hasUserRole && Auth::user()->hasUserRole->hasRole->name === 'moderator')
                              <li id="menu3"><a href="{{ url('/jobs?type=need_approval') }}">Need Approval</a></li>
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

@push('script-functions')
<script type="text/javascript">
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    var sParameterName = sURLVariables[0].split('=');
    if(sParameterName[1] === 'need_approval') {
      $("#menu3").addClass("active");
    } else if(sParameterName[1] === 'my_jobs') {
      $("#menu2").addClass("active");
    } else {
      $("#menu1").addClass("active");
    }
</script>
@endpush