<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>{!! Gatekeeper::getProjectTitle() !!}</title>
	<link rel="icon" type="image/png" href="{{asset('favicon.png')}}" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/bootstrap-theme.min.css')}}">
	<link rel="stylesheet" href="{{asset('font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
	@yield('styles')
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
		<div class="container">
			@include('gatekeeper::layouts.header')
		</div>
	</nav>

	<div class="container">
		@include('gatekeeper::layouts.notifications')
		@yield('content')
	</div>
	</div>

    <footer class="pagefooter">
      <div class="container">
        <p class="text-muted">
        	{!! Gatekeeper::getProjectTitle() !!} - {!! Gatekeeper::getProjectCopyright() !!}
        </p>
      </div>
    </footer>

	<script src="{{asset('js/jquery-1.11.2.min.js')}}"></script>
	<script src="{{asset('js/bootstrap.min.js')}}"></script>
	<script src="{{asset('js/app.js')}}"></script>
	@yield('scripts')

</body>
</html>
