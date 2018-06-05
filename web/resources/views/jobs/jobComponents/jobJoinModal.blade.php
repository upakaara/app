<div class="modal fade" tabindex="-1" role="dialog" id="joinJobModal">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="row">
                <div class="col-xs-12">
                    <button style="margin-right: 1rem" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                      <div class="col-xs-5">
                          <div class="card text-center">
                              <div class="card-body">
                                  <p class="card-text">Request for another skill needed and join.</p>
                                  <form method="post" action="{{ route('job_user') }}">
                                      {{ csrf_field() }}
                                      <input type="hidden" name="job_id" value="{{ $job->id }}">
                                      <div class="form-group">
                                            <select id="skills" class="form-control selectpicker" name="skills[]" data-live-search="true">
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
                                      <button type="submit" class="btn btn-default btn-lg">Join</button>
                                  </form>
                              </div>
                          </div>
                      </div>
                      <div class="col-xs-2 text-center"> - OR -</div>
                      <div class="col-xs-5">
                          <div class="card text-center">
                              <div class="card-body">
                                  <p class="card-text">Join and start the job immediately</p>                                  
                                  <form method="post" action="{{ route('job_user') }}">
                                      {{ csrf_field() }}
                                      <input type="hidden" name="job_id" value="{{ $job->id }}">
                                      <button name="start_job" value="{{ true }}" type="submit" class="btn btn-default btn-lg">Join & Start</button>
                                  </form>
                              </div>
                          </div>
                      </div>
                    </div>
                </div>  
            </div>
        </div>
    </div>
</div>