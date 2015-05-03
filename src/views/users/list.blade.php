<h1>Users List</h1>

<div class="list-group">
	<div class="clearfix list-group-item active visible-md visible-lg">
		<span class="col-xs-2  col-sm-1  col-md-1  col-lg-1"></span>
		<span class="col-xs-7  col-sm-4  col-md-3  col-lg-2">Name</span>
		<span class="hidden-xs col-sm-5  col-md-3  col-lg-2">Email</span>
		<span class="hidden-xs hidden-sm col-md-3  col-lg-2">Groups</span>
		<span class="hidden-xs hidden-sm hidden-md col-lg-2">Memeber Since</span>
		<span class="hidden-xs hidden-sm hidden-md col-lg-2">Last Update</span>
		<span class="col-xs-3  col-sm-2  col-md-2  col-lg-1"></span>  	
	</div>

	@foreach($users as $user)
	<div class="clearfix list-group-item">
		<span class="col-xs-2  col-sm-1  col-md-1  col-lg-1">
			{!! Form::open(['route' => ['users.enable', $user->id], 'class'=>'form-horizontal']) !!} 
			{!! Form::token() !!}
			{!! Form::hidden('enable', $user->enable ) !!}
			{!! Form::hidden('page', Input::get("page", 1) ) !!}
			<button type="submit" class="btn btn-circle btn-default btn-xs">
				<i class="fa fa-toggle-{{$user->enable?'on':'off'}}"></i>
			</button>
			{!! Form::close() !!} 
		</span>
		<span class="col-xs-7  col-sm-4  col-md-3  col-lg-2 {{$user->enable?'enable':'disable'}}">
			<img class="img-circle img-bordered" src="{!! Gatekeeper::getProfile($user) !!}" width="24" height="24">
			{!! $user->name !!}
		</span>
		<span class="hidden-xs col-sm-5  col-md-3  col-lg-2 {{$user->enable?'enable':'disable'}}">{!! $user->email !!}</span>
		<span class="hidden-xs hidden-sm col-md-3  col-lg-2 {{$user->enable?'enable':'disable'}}">
		@foreach($user->groups as $group)
			[{!!$group->name!!}]  
		@endforeach
		</span>
		<span class="hidden-xs hidden-sm hidden-md col-lg-2 {{$user->enable?'enable':'disable'}}">{!! $user->created_at !!}</span>
		<span class="hidden-xs hidden-sm hidden-md col-lg-2 {{$user->enable?'enable':'disable'}}">{!! $user->updated_at !!}</span>
		<span class="col-xs-3  col-sm-2  col-md-2  col-lg-1">
			<a role="button" href="/users/{{$user->id}}" class="btn btn-success btn-xs"><i class="fa fa-cogs "></i> Options</a>
		</span>
	</div>
	@endforeach
</div>
