@foreach ($comments as $comment)
<div class="container pb-cmnt-container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-info singlejob-cmnt-area">
              <div class="panel-heading panel-default">
                {{ $comment->user->first_name.' '.$comment->user->last_name }} commented 7 days ago
                <button
                    type="button"
                    class="btn btn-default pull-right"
                    data-toggle="modal"
                    data-title="Are you sure?"
                    data-action="/comment/{{ $comment->id }}"
                    data-value="DELETE"
                    data-name="_method"
                    data-ajax=true
                    data-target="#confirmationModal">
                    <span class="fa fa-trash fa-sm pull-right"></span>
                </button>
              </div>
              <div class="panel-body">
                {{ $comment->comment }}
              </div>  
            </div>
        </div>
    </div>
</div>
@endforeach
