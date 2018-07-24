@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
               
                <div class="panel-heading">Profile Update</div>

                <div class="panel-body">

                    <form class="form-horizontal" method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group">
                            <label for="image" class="col-md-4 control-label">Profile Image</label>
                            
                            <div class="col-md-6">
                                <div>
                                    <img src={{ $user->image_url }}  style="width:200px;height:200px; border-radius: 10px;">
                                </div>
                                <input type="file" name="image"/>
                            </div>

                        </div>

                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="first_name" class="col-md-4 control-label">First Name</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ $user->first_name }}" required autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="last_name" class="col-md-4 control-label">Last Name</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ $user->last_name }}" required autofocus>

                                @if ($errors->has('last_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('subtitle') ? ' has-error' : '' }}">
                            <label for="subtitle" class="col-md-4 control-label">Subtitle</label>

                            <div class="col-md-6">
                                <input id="subtitle" type="text" class="form-control" name="subtitle" value="{{ $user->subtitle }}" autofocus>

                                @if ($errors->has('subtitle'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('subtitle') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address_line_1') ? ' has-error' : '' }}">
                            <label for="address_line_1" class="col-md-4 control-label">Address line 1</label>

                            <div class="col-md-6">
                                <input id="address_line_1" type="text" class="form-control" name="address_line_1" value="{{ $user->address_line_1 }}">

                                @if ($errors->has('address_line_1'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address_line_1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address_line_2') ? ' has-error' : '' }}">
                            <label for="address_line_2" class="col-md-4 control-label">Address line 2</label>

                            <div class="col-md-6">
                                <input id="address_line_2" type="text" class="form-control" name="address_line_2" value="{{ $user->address_line_2 }}">

                                @if ($errors->has('address_line_2'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address_line_2') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address_city') ? ' has-error' : '' }}">
                            <label for="address_city" class="col-md-4 control-label">City</label>

                            <div class="col-md-6">
                                <input id="address_city" type="text" class="form-control" name="address_city" value="{{ $user->address_city }}">

                                @if ($errors->has('address_city'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address_city') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('address_postcode') ? ' has-error' : '' }}">
                            <label for="address_postcode" class="col-md-4 control-label">Postal Code</label>

                            <div class="col-md-6">
                                <input id="address_postcode" type="text" class="form-control" name="address_postcode" value="{{ $user->address_postcode }}">

                                @if ($errors->has('address_postcode'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address_postcode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                            <label for="dob" class="col-md-4 control-label">DOB</label>

                            <div class="col-md-6">
                                <input id="dob" type="text" class="form-control" data-provide="datepicker" name="dob" value="{{ $user->dob->format('d/m/Y') }}">

                                @if ($errors->has('dob'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('interests') ? ' has-error' : '' }}">
                            <label for="interests" class="col-md-4 control-label">Interests</label>

                            <div class="col-md-6">
                                <select id="interests" class="form-control selectpicker" multiple="multiple" name="interests[]" data-live-search="true">
                                    @foreach ($interests as $interest)
                                      <option value={{$interest->id}} {{$interest->selected ? 'selected': ''}}>{{$interest->name}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('interests'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('interests') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('skills') ? ' has-error' : '' }}">
                            <label for="skills" class="col-md-4 control-label">Skills</label>

                            <div class="col-md-6">
                                <select id="skills" class="form-control selectpicker" multiple="multiple" name="skills[]" data-live-search="true">
                                    @foreach ($skills as $skill)
                                        <option value={{$skill->id}} {{$skill->selected ? 'selected': ''}}>{{$skill->name}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('skills'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('skills') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('visibility') ? ' has-error' : '' }}">
                            <label for="visibility" class="col-md-4 control-label">Profile visibility</label>

                            <div class="col-md-6">
                                <input id="visibility" name="visibility" {{ $user->visibility ? 'checked' : ''}} type="checkbox" value='true'>

                                @if ($errors->has('visibility'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('visibility') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('notification') ? ' has-error' : '' }}">
                            <label for="notification" class="col-md-4 control-label">Email notification</label>

                            <div class="col-md-6">
                                <input id="notification" name="notification" type="checkbox" value="true" {{ $user->notification ? 'checked' : ''}}>

                                @if ($errors->has('notification'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('notification') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
    <link href="{{ asset('/packages/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script type="text/javascript" src="{{ asset('/packages/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
@endpush

@push('script-functions')
<script type="text/javascript">
    $(document).ready(function() {
        $('#dob').datepicker({  
           format: 'dd/mm/yyyy'
        });  
        
        $('#interests').selectpicker();
        
        $('#skills').selectpicker();
    });
</script>
@endpush
