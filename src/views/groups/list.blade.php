<h1>Groups List</h1>

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

	@foreach($groups as $group)
	<div class="clearfix list-group-item">
		<span class="col-xs-2  col-sm-1  col-md-1  col-lg-1">
			{!! Form::open(['route' => ['groups.enable', $group->id], 'class'=>'form-horizontal']) !!} 
			{!! Form::token() !!}
			{!! Form::hidden('enable', $group->enable ) !!}
			{!! Form::hidden('page', Input::get("page", 1) ) !!}
			<button type="submit" class="btn btn-circle btn-default btn-xs">
				<i class="fa fa-toggle-{{$group->enable?'on':'off'}}"></i>
			</button>
			{!! Form::close() !!} 
		</span>
		<span class="col-xs-7  col-sm-4  col-md-3  col-lg-2 {{$group->enable?'enable':'disable'}}">
			{!! $group->name !!}
		</span>
		<span class="hidden-xs col-sm-5  col-md-3  col-lg-2 {{$group->enable?'enable':'disable'}}"></span>
		<span class="hidden-xs hidden-sm col-md-3  col-lg-2 {{$group->enable?'enable':'disable'}}">
		</span>
		<span class="hidden-xs hidden-sm hidden-md col-lg-2 {{$group->enable?'enable':'disable'}}">{!! $group->created_at !!}</span>
		<span class="hidden-xs hidden-sm hidden-md col-lg-2 {{$group->enable?'enable':'disable'}}">{!! $group->updated_at !!}</span>
		<span class="col-xs-3  col-sm-2  col-md-2  col-lg-1">
			<a role="button" href="/groups/{{$group->id}}" class="btn btn-success btn-xs"><i class="fa fa-cogs "></i> Options</a>
		</span>
	</div>
	@endforeach
</div>
