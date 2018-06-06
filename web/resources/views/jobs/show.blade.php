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
            </div>
        </div>
        @if ($job->owner_id === Auth::user()->id || $job->jobUser)
            <div id="jobComments"></div>
            <div class="container pb-cmnt-container">
              <div class="row">
                <div class="col-md-8 col-md-offset-2">
                  <div class="panel panel-info">
                    <div class="panel-body">
                      <form class="form-inline" id="commentForm" method="POST" action="/comment">
                        {{ csrf_field() }}
                        <input type="hidden" name="job_id" value="{{ $job->id }}">
                        <textarea
                        id="commentArea"
                        placeholder="Write your comment here!"
                        name="comment"
                        class="singlejob-cmnt-textarea"
                        ></textarea>
                        <div class="btn-group">
                          <label class="btn">
                            <span class="fa fa-picture-o fa-lg"></span>
                            <input type="file" style="display: none;">
                          </label>
                        </div>
                        <button class="btn btn-primary pull-right" type="submit">Comment</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        @endif
    </div>
</div>
@endsection

@push('script-functions')
    <script type="text/javascript">
        $(function() {
            function getComments() {
                var job_id = <?php echo json_encode($job->id); ?>;
                $.ajax({
                    url: '/comments',
                    type: 'POST',
                    data: {_token: $('meta[name="csrf-token"]').attr('content'), job_id},
                    dataType: 'JSON',
                    success: function (data) { 
                        $("#jobComments").html(data.html);
                    },
                    error: function(data) {
                      console.log('Error: ', data);
                    }
                }); 
            }
            
            getComments();
            
            $('#confirmationModal').on("show.bs.modal", function (e) {
                var values = $(e.relatedTarget);
                $("#confirmationModalTitle").html(values.data('title'));
                $("#confirmationForm").attr("action", values.data('action'));
                $("#formHiddenField").attr("name", values.data('name'));
                $("#formHiddenField").val(values.data('value'));
                if(values.data('ajax')) {
                  $("#confirmationForm").submit(function(e1) {
                    e1.preventDefault();
                    $.ajax({
                        url: values.data('action'),
                        type: 'DELETE',
                        data: {_token: $('meta[name="csrf-token"]').attr('content')},
                        dataType: 'JSON',
                        success: function (data) {
                          if(data.success) {
                            $('#confirmationModal').modal('toggle');
                            getComments();
                          } else {
                            console.log('Errors: ',data);
                          }
                        },
                        error: function(data) {
                          console.log('Error: ', data);
                        }
                    });
                    $(this).unbind();
                  });
                }
            });
            
            $('#commentForm').submit(function(e) {
                e.preventDefault();
                var $inputs = $('#commentForm :input');
                var values = {};
                $inputs.each(function() {
                    values[this.name] = $(this).val();
                });
                $.ajax({
                    url: '/comment',
                    type: 'POST',
                    data: {_token: $('meta[name="csrf-token"]').attr('content'), ...values},
                    dataType: 'JSON',
                    success: function (data) {
                      if(data.success) {
                        $('#commentArea').val('');
                        getComments();
                      } else {
                        console.log('Errors: ',data);
                      }
                    },
                    error: function(data) {
                      console.log('Error: ', data);
                    }
                });
            });
        });
    </script>
@endpush

@push('styles')
    <link href="{{ asset('/packages/bootstrap-select/css/bootstrap-select.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/singleJobView.css') }}" rel="stylesheet">
@endpush

@push('scripts')
    <script type="text/javascript" src="{{ asset('/packages/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
@endpush
