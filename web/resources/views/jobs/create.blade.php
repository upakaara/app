@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create Job</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/jobs">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="title" class="col-md-4 control-label">Title</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title" autofocus value="{{ old('title') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <textarea id="description" type="text" name="description" class="form-control">{{ old('description') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="summary" class="col-md-4 control-label">Summary</label>

                            <div class="col-md-6">
                                <textarea id="summary" type="text" name="summary" class="form-control">{{ old('summary') }}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="jobTypes" class="col-md-4 control-label">Job Type</label>

                            <div class="col-md-6">
                                <select id="jobTypes" class="form-control selectpicker" name="jobType">
                                    @foreach ($jobTypes as $jobType)
                                        <option value={{$jobType->id}} {{$jobType->selected ? 'selected': ''}}>{{$jobType->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="duration" class="col-md-4 control-label">Duration</label>

                            <div class="col-md-6">
                                <input id="duration" type="text" name="duration" class="form-control" placeholder="Duration in number of days" value="{{ old('duration') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-2 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save Changes
                                </button>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn" onclick="location.href='{{ url('jobs') }}'">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </form>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script-functions')
<script type="text/javascript">
    $(document).ready(function() {
        $('#jobTypes').selectpicker();
    });
</script>
@endpush
