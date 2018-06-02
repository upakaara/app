<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="content">
                    <div class="body">
                        <center>
                        <br />    
                        <img src={{ $user->image_url }} name="aboutme" width="140" height="140" border="0" class="img-circle"></a>
                        <h3 class="media-heading">{{ $user->first_name . ' ' . $user->last_name }}<small>{{ $errors->first('subtitle') }}</small></h3>
                        <br />
                        <div>
                            <span><strong>Email: </strong></span>
                                <span>{{ $user->email }}</span>
                        </div>
                        <br />
                        
                        @if(sizeof($user->skills))
                        <div>
                            <span><strong>Skills: </strong></span>
                                @foreach ($user->skills as $skill)
                                    <span class="label label-info">{{$skill->name}}</span>
                                @endforeach

                        </div>
                        <br />
                        @endif

                        @if(sizeof($user->interests))
                        <div>
                            <span><strong>Interests: </strong></span>
                                @foreach ($user->interests as $interest)
                                    <span class="label label-warning">{{$interest->name}}</span>
                                @endforeach
                        </div>
                        @endif

                        </center>
                        <br />
                    </div>
                </div>               
            </div>
        </div>
    </div>
</div>