@extends ('layouts.app')

@section('content')

<div class="col-md-8  justify-content-center" style="background-color:white">
	<ul class="nav nav-tabs">
		<li class="{{ $tab == 'profile' ? 'active' : ''}}"><a href={{ route('public.index', ['id' => $id, 'tab' => 'profile']) }} >Profile</a></li>
		<li class="{{ $tab == 'jobs' ? 'active' : ''}}"><a href={{ route('public.index', ['id' => $id, 'tab' => 'jobs']) }}>Jobs</a></li>
		<li class="{{ $tab == 'achievemets' ? 'active' : ''}}"><a href={{ route('public.index', ['id' => $id, 'tab' => 'achievemets']) }}>Achievemets</a></li>
	</ul>

	<div class="tab-content">
        <div class="tab-pane fade in active" id='#profile'>
	        @if($tab === 'profile')
	        	<br/>
	        	@include('public.profile', ['user' => $user])
	        @elseif($tab === 'jobs')
	        	@include('public.jobs')
	        @elseif($tab === 'achievemets')
	        	@include('public.achievements')
	        @else
	        	<p>Nothing to show</p>
	        @endif
        </div>
    </div>
</div>

@endsection