@extends('layouts.master')
@section('title','Pokofarms')
@section('content')

<div class="container">
    <div class="row">
        <h4>@lang('home.unsubscribe-success')</h4>
        <h3><a href="{{ url('/') }}">@lang('home.back-home')</a></h3>
    </div>
</div>

@endsection
