@extends('layouts.app')

@section('content')
  <div class="g-pa-20">
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

    <h1 class="g-font-weight-300 g-font-size-28 g-color-black g-mb-30">{{ $job->title }}</h1>
    <h3 class="g-font-weight-300 g-font-size-20 g-color-black g-mb-30">{{ $job->description }}</h3>
    @if (!(Auth::user()->alreadyJoinedJob($job->id)) && $job->owner_id !== Auth::user()->id)
        <a href="#!"
          class="btn btn-md u-btn-outline-blue g-mr-10 g-mb-15"
          data-toggle="modal"
          data-target="#joinJobModal"
        >
          Join
        </a>
    @endif
    @if ($job->owner_id === Auth::user()->id || $job->jobUser)
        <div class="card">
          <div class="row no-gutters">
            <!-- Chat. Message Area. -->
            <div class="col-lg-12">

              <!-- Chat. Message Area. Header. -->
              <header class="g-px-15 g-px-25--lg">
                <div class="media g-height-50 g-height-80--lg">
                  <div class="media-body d-flex align-self-center justify-content-center g-font-size-16--md g-color-black">
                    Job Discussion
                  </div>

                  <div class="d-flex align-self-center align-items-center justify-content-end g-width-100--sm">
                    <div class="g-pos-rel g-z-index-2 g-line-height-1 g-ml-10 g-ml-20--lg">
                      <a id="dropDown1Invoker" class="u-link-v5 g-line-height-0 g-font-size-24 g-color-gray-light-v6 g-color-lightblue-v3--hover"
                        href="#!" aria-controls="dropDown1" aria-haspopup="true" aria-expanded="false" data-dropdown-event="click"
                        data-dropdown-target="#dropDown1" data-dropdown-type="jquery-slide">
                        <i class="hs-admin-more-alt"></i>
                      </a>

                      <div id="dropDown1" class="u-shadow-v31 g-pos-abs g-right-0 g-bg-white u-dropdown--jquery-slide u-dropdown--hidden" aria-labelledby="dropDown1Invoker">
                        <ul class="list-unstyled g-nowrap mb-0">
                          @if ($job->owner_id === Auth::user()->id)
                              <li>
                                <a class="d-flex align-items-center u-link-v5 g-bg-gray-light-v8--hover g-color-gray-dark-v6 g-px-25 g-py-14" href="#!">
                                  <i class="hs-admin-trash g-font-size-18 g-color-gray-light-v6 g-mr-15"></i>
                                  Remove Job
                                </a>
                              </li>
                          @else
                              <li>
                                <a class="d-flex align-items-center u-link-v5 g-bg-gray-light-v8--hover g-color-gray-dark-v6 g-px-25 g-py-14" href="#!">
                                  <i class="hs-admin-close g-font-size-18 g-color-gray-light-v6 g-mr-15"></i>
                                  Leave Job
                                </a>
                              </li>
                          @endif
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </header>
              <!-- End Chat. Message Area. Header. -->

              <hr class="d-flex g-brd-gray-light-v7 g-mx-15 g-mx-25--lg my-0">
              <!-- Chat. Message Area. Messages. -->
              <div class="js-custom-scroll g-height-50vh--lg g-pa-15 g-pa-25--lg">
                <div id="jobComments"></div>
              </div>
              <!-- End Chat. Message Area. Messages. -->

              <footer class="g-bg-gray-light-v8 g-px-15 g-px-30--lg g-py-10 g-py-25--lg">
                <form id="commentForm" method="POST" action="/comment">
                  {{ csrf_field() }}
                  <input type="hidden" name="job_id" value="{{ $job->id }}">
                  <div class="media align-items-top">
                    <div class="d-flex">
                      <label class="u-file-attach-v2 g-line-height-1 g-color-gray-dark-v6 mb-0">
                        <input type="file" name="image" id="image_upload">
                        <i class="hs-admin-clip g-font-size-18"></i>
                      </label><br/>
                      <div id="image_preview"></div>
                    </div>

                    <div class="media-body g-ml-25">
                      <textarea
                        name="comment"
                        id="commentArea"
                        placeholder="Write your comment here!"
                        class="form-control u-textarea-expandable g-resize-none g-bg-transparent g-brd-none w-100 p-0 g-mt-minus-3"
                      >
                      </textarea>
                    </div>

                    <div class="d-flex ml-auto">
                      <button type="submit" class="btn btn-link d-flex align-self-top align-items-top u-link-v5 g-color-lightblue-v3 g-color-lightblue-v4--hover p-0 g-ml-15">
                        <i class="hs-admin-arrow-top-right g-font-size-18 g-line-height-1_4"></i>
                        <span class="g-hidden-sm-down g-font-weight-300 g-font-size-12 g-font-size-default--md g-ml-4 g-ml-8--md">Send</span>
                      </button>
                    </div>
                  </div>
                </form>
              </footer>
            </div>
            <!-- End Chat. Message Area. -->
          </div>
        </div>
    @endif
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
                // var $inputs = $('#commentForm :input');
                // var values = {};
                // var image = document.getElementById("image_upload").files;
                // $inputs.each(function() {
                //   if(this.name === 'image') {
                //     values[this.name] = image;
                //   } else {
                //     values[this.name] = $(this).val();
                //   }
                // });
                // var fileInput = document.getElementById('image_upload');
                // var file = fileInput.files[0];
                // var formData = {};
                // formData.image = file;
                // console.log(formData);
                var formData = new FormData($("#commentForm")[0]);
                $.ajax({
                    url: '/comment',
                    type: 'POST',
                    data:formData,
                    dataType: 'JSON',
                    async:false,
                    processData: false,
                    contentType: false,
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
            
            $("#image_upload").change(function() {
              $('#image_preview').html("");
              var image=document.getElementById("image_upload").files[0];
              $('#image_preview').html(image.name);
           });
        });
    </script>
@endpush

@push('styles')
    <link href="{{ asset('css/singleJobView.css') }}" rel="stylesheet">
@endpush
