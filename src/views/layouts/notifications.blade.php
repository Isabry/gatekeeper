@if(Session::has('success'))
<p class="text-success"><i class="fa fa-thumbs-up"></i> {!! Session::get('success') !!}</p>
@endif

@if(Session::has('info'))
<p class="text-info"><i class="fa fa-info-circle"></i> {!! Session::get('info') !!}</p>
@endif

@if(Session::has('warning'))
<p class="text-warning"><i class="fa fa-warning"></i> {!! Session::get('warning') !!}</p>
@endif

@if(Session::has('error'))
<p class="text-danger"><i class="fa fa-thumbs-down"></i> {!! Session::get('error') !!}</p>
@endif

{{-- 
<p class="text-primary">{!! "<pre>" . print_r(Session::all(), true) . "</pre>" !!}</p>
--}}

