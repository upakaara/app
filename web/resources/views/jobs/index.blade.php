@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Job Listing
                
                    <a class="btn btn-primary" href="{{ url('/jobs/create') }}">+ Create Job</a>
                </div>
                
                <div class="panel-body">
                    @if (session('success_message'))
                        <div id="successMessageAlert" class="alert alert-success">
                            {{ session('success_message') }}
                        </div>
                    @endif
                    <div>
                        <div class="col-md-2">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    Categories<span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">Cat 1</a>
                                    </li>
                                    <li>
                                        <a href="#">Cat 2</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
          
                        <div class="col-md-2">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true" v-pre>
                                    Tags<span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="#">Tag 1</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="col-md-2 text-center">
                                Sort:
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-primary">Top</button>                         
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-default">Latest</button>
                            </div>
                        </div>
                    </div>

                    <div>
                        <table class="table table-hover" id="jobListTable">
                            <thead>
                                <tr>
                                    <th scope="col">Title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Colaborators</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($jobs as $job)
                                    <tr>
                                        <td><a href={{ "jobs/".$job->id }}/>{{ $job->title }}</td>
                                        <td>{{ $job->description }}</td>
                                        <td></td>
                                        <td>{{ $job->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
