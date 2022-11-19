@extends('layouts.app-master')

@section('content')
@if ($message = Session::get('message'))
<div class="alert alert-success alert-block">
    <strong>{{ $message }}</strong>
</div>
@endif
@endsection



