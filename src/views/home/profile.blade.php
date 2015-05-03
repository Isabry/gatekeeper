@extends('gatekeeper::layouts.default')

@section('styles')
@stop

@section('content')

<div class="col-sm-4">
	<h3>{!! $user->name !!}</h3>
	<img class="img-circle img-bordered" src="{!!Gatekeeper::getProfile($user)!!}" width="128" height="128">
	<br/><br/>
	<div class="hidden-xs">

	<div class="list-group">
	@foreach($user->groups as $group)
		<div class="clearfix list-group-item">
		Group : {!!$group->name!!}
		</div>
	@endforeach
	</div>

	</div>
</div>
<div class="space visible-xs"></div>
<div class="col-sm-8">
	<h3> </h3>
	{!! form($user_form) !!}
</div>

<div class="visible-xs">
	<div class="list-group">
	@foreach($user->groups as $group)
		<div class="clearfix list-group-item">
		{!!$group->name!!}
		</div>
	@endforeach
	</div>
</div>

@endsection

@section('scripts')
@stop