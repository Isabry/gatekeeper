@extends('gatekeeper::layouts.default')

@section('styles')
@stop

@section('content')
@include('gatekeeper::users.list')
{!! $users !!}
@endsection

@section('scripts')
@stop