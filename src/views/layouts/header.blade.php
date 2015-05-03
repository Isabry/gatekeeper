<div class="navbar-header">
	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		<span class="sr-only">Toggle Navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</button>
	<a class="navbar-brand" href="/">
		<section>
			<img src="{!!asset('img/logo-w.png')!!}" width="24" height="24">
			<span class="text-danger">{!! Gatekeeper::getProjectName() !!}</span>
		</section>
	</a>
</div>

<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	<ul class="nav navbar-nav">
		@foreach ( Gatekeeper::getMenus('left') as $menu )
		<li {!! Request::is(ltrim($menu["href"]."*", "/"))?'class="active"':'' !!}>
			<a href="{{$menu["href"]}}">
				@if( $menu["icon_visible"] )
					{!! $menu["icon"] !!}
				@endif 
				@if( $menu["label_visible"]  )
					<span>{{$menu["label"]}}</span>
				@endif 
			</a>
		</li>
		@endforeach
	</ul>
	
	<ul class="nav navbar-nav navbar-right">
		@if( Auth::check() )
		<li>
			<a href="/profile"><img class="img-circle img-bordered bg-white" src="{!! Gatekeeper::getProfile(Auth::user()) !!}" width="24" height="24"> {!! Auth::user()->name !!}</a>
		</li>
		@endif
		@foreach ( Gatekeeper::getMenus('right') as $menu )
		<li {!! Request::is(ltrim($menu["href"]."*", "/"))?'class="active"':'' !!}>
			<a href="{{$menu["href"]}}">
				@if( $menu["icon_visible"] )
					{!! $menu["icon"] !!}
				@endif 
				@if( $menu["label_visible"] )
					<span>{{$menu["label"]}}</span>
				@endif 
			</a>
		</li>
		@endforeach
	</ul>
</div>
