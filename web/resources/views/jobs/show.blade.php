@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('success_message'))
        <div id="successMessageAlert" class="alert alert-success">
            {{ session('success_message') }}
        </div>
    @endif
    @if (session('error_message'))
        <div id="successMessageAlert" class="alert alert-danger">
            {{ session('error_message') }}
        </div>
    @endif

    @include('common.confirmationModal')
    @include('jobs.jobComponents.jobJoinModal')
    
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">{{ $job->title }}</div>
                        <div class="col-md-6">
                              @if ($job->owner_id === Auth::user()->id)
                                  <span class="pull-right">
                                      <button
                                          type="button"
                                          class="btn btn-danger"
                                          data-toggle="modal"
                                          data-title="Remove Job?"
                                          data-action="/jobs/{{ $job->id }}"
                                          data-value="DELETE"
                                          data-name="_method"
                                          data-target="#confirmationModal">
                                          Remove Job
                                      </button>
                                  </span>
                              @elseif (!(Auth::user()->alreadyJoinedJob($job->id)))
                                  <span class="pull-right">
                                      <button
                                          type="button"
                                          class="btn btn-primary"
                                          data-toggle="modal"
                                          data-target="#joinJobModal">
                                          Join Job
                                      </button>
                                  </span>
                              @else
                                  <span class="pull-right">
                                      <button
                                          type="button"
                                          class="btn btn-danger"
                                          data-toggle="modal"
                                          data-title="Are you sure you want to leave?"
                                          data-action="/job_user/{{ $job->id }}"
                                          data-value="DELETE"
                                          data-name="_method"
                                          data-target="#confirmationModal">
                                          Leave Job
                                      </button>
                                  </span>     
                              @endif
                        </div>
                    </div>
                </div>
                <div class="panel-heading">
                    {{ $job->description }}
                </div>
                <div class="panel-body">
                    <div class="col-md-12">
                        <div>
                          <span class="chat-img pull-left">
                            <img src="http://placehold.it/50/55C1E7/fff&text=JS" alt="User Avatar" class="img-circle" />
                          </span>
                          <div class="chat-body clearfix">
                              <div class="header">
                                  <strong class="primary-font">Jack Sparrow</strong> <small class="pull-right text-muted">
                                  <span class="glyphicon glyphicon-time"></span>12 mins ago</small>
                              </div>
                              <p>
                                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                              </p>
                          </div>
                        </div>
                        <div>
                          <span class="chat-img pull-left">
                            <img src="http://placehold.it/50/FA6F57/fff&text=BP" alt="User Avatar" class="img-circle" />
                          </span>
                          <div class="chat-body clearfix">
                              <div class="header">
                                  <strong class="primary-font">Bhaumik Patel</strong> <small class="pull-right text-muted">
                                  <span class="glyphicon glyphicon-time"></span>13 mins ago</small>
                              </div>
                              <p>
                                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur bibendum ornare dolor, quis ullamcorper ligula sodales.
                              </p>
                          </div>
                        </div>
                    <div>
                </div>
                <div class="panel-footer">
                    <div class="input-group">
                        <input id="btn-input" type="text" class="form-control input-sm" placeholder="Type your message here..." />
                        <span class="input-group-btn">
                            <button class="btn btn-warning btn-sm" id="btn-chat">Send</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script-functions')
<script type="text/javascript">
    $(function() {
        $('#confirmationModal').on("show.bs.modal", function (e) {
            var values = $(e.relatedTarget);
            $("#confirmationModalTitle").html(values.data('title'));
            $("#confirmationForm").attr("action", values.data('action'));
            $("#formHiddenField").attr("name", values.data('name'));
            $("#formHiddenField").val(values.data('value'));
        });
    });
</script>
@endpush

@push('styles')
    <link href="{{ asset('/packages/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script type="text/javascript" src="{{ asset('/packages/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
@endpush