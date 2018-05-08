@extends('layouts.app')

@section('content')
<div class="container">
    <div class="modal fade" tabindex="-1" role="dialog" id="confimationModal">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Remove Job?</h4>
                </div>
                <div class="modal-footer">
                    <form method="post" action="/jobs/{{ $job->id }}">
                        {{ method_field('DELETE') }}
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">  
                        <button type="submit" class="btn btn-default">Yes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                      <div class="row">
                          <div class="col-md-6">{{ $job->title }}</div>
                          <div class="col-md-6">
                              <span class="pull-right">
                                  <button type="button" class="btn btn-default" data-toggle="modal" data-target="#confimationModal">
                                      Remove Job
                                  </button>
                              </span>
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
                            <button class="btn btn-warning btn-sm" id="btn-chat">
                                Send</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
