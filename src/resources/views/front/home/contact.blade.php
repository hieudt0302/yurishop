
@extends('layouts.master')
@section('title','Pokofarms - '.__('header.contact'))
@section('content')
<section class="contact blogsingle">
    <div class="container">
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
                        <a href="#"><i class="fa fa-facebook" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Twitter"></i></a>
                        <a href="#"><i class="fa fa-youtube-play" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Youtube"></i></a>
                        <a href="#"><i class="fa fa-vimeo" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Vimeo"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="contact-form blogsingle-content">
                    <!-- comment form -->
                    <form action="#" class="post-cmt">
                        <label>@lang('contact.review')</label>
                            <div class="row">
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <input class="name" type="text" placeholder="@lang('contact.name')">
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <input class="email" type="text" placeholder="@lang('contact.email')*">
                                </div>
                                <div class="col-md-4 col-sm-4 col-xs-12">
                                    <input class="website" type="text" placeholder="@lang('contact.phone')">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 col-xs-12 col-sm-12">
                                    <input  class="comt" type="text" placeholder="@lang('contact.message')*">
                                </div>
                            </div>
                            <input class="submit" type="submit" value="@lang('contact.submit')">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
