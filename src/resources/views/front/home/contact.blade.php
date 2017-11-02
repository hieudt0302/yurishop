
@extends('layouts.master')
@section('title','Pokofarms - '.__('header.contact'))
@section('content')

<!-- Head Section -->
<div class="hero">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>@lang('header.contact')</h1>
            </div>
        </div>
    </div>
</div>
<!-- End Head Section -->

<section class="contact blogsingle">
    <div class="container">
        @include('notifications.status_message') 
        @include('notifications.errors_message')
        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif
        @if (session()->has('error_message'))
            <div class="alert alert-danger">
                {{ session()->get('error_message') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-12">
                <div class="contact-left">
                    <div class="ct-it">
                        <h4>@lang('contact.address')</h4>
                        @lang('common.headquarter-address')
                        <hr>
                    </div>
                    <div class="ct-it">
                        <h4>@lang('contact.phone')</h4>
                        <p>Mobile: (+88) - 1990 - 6886<br>
                        Hotline: 1800 - 1102</p>
                        <hr>
                    </div>
                    <div class="ct-it">
                        <h4>@lang('contact.email')</h4>
                        <p>pokofarms@pokofarms.com.vn</p>
                        <hr>
                    </div>
                    <div class="ct-it ct-icon">
                        <h4>@lang('contact.social')</h4><br>
                        <a target="_blank" href="http://www.facebbook.com/{{ Setting::config('facebook') }}"><i class="fa fa-facebook" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Facebook"></i></a>
                        <a target="_blank" href="http://www.twitter.com/{{ Setting::config('twitter') }}"><i class="fa fa-twitter" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Twitter"></i></a>
                        <a target="_blank" href="http://www.youtube.com/{{ Setting::config('youtube') }}"><i class="fa fa-youtube-play" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Youtube"></i></a>
                        <a target="_blank" href="http://www.vimeo.com/{{ Setting::config('vimeo') }}"><i class="fa fa-vimeo" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Vimeo"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="contact-form blogsingle-content">
                    <!-- comment form -->
                    {!! Form::open(array('route' => 'front.send-contact', 'class' => 'post-cmt')) !!}
                        <label>@lang('contact.review')</label>
                        <div class="row">
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <input class="name" type="text" name="name" placeholder="@lang('contact.name')">
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <input class="email" type="text" name="email" placeholder="@lang('contact.email')*">
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <input class="website" type="text" name="phone" placeholder="@lang('contact.phone')">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 col-xs-12 col-sm-12">
                                <input  class="comt" type="text" name="message" placeholder="@lang('contact.message')*">
                            </div>
                        </div>
                        <input class="submit" type="submit" value="@lang('contact.submit')">
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
