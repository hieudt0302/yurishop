@extends('layouts.master')
@section('title','Thông Tin Tài Khoản - Pokofarms')
@section('header')
@parent
<!-- OVERRIDER MASTER CSS -->
<link rel="stylesheet" href="{{ asset('css/custom-order.css') }}">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
@stop


@section('content')
<div id="content-wrapper">
    <section id="content" class="container mt-3">
        <div id="content-body" class="row row-hardcode mt-4">
            <div id="content-center" class="col-lg-12">
                <div class="page page-myaccount page-myaccount-info">
                    <div class="page-body">
                        <div class="row row-hardcode">
                            <div class="col-md-4 col-lg-3">
                                @include('front.myaccount.myaccount_sidebar')
                            </div>
                            <div class="col-md-8 col-lg-9">
                                <div class="row">
                                    <div class="col-xs-12">
                                            @include('notifications.status_message') 
                                            @include('notifications.errors_message') 
                                    </div>
                                </div> 
                                <div class="page-title pt-4 pt-md-0">
                                    <h1 class="h3">@lang('account.customer-info')</h1>
                                </div>
                                <form action="{{url('Account/Info/Update')}}" class="form-horizontal" method="post" novalidate="novalidate">
                                {{ csrf_field() }}
                                    <fieldset class="content-group">
                                        <legend><span>@lang('account.personal-details')</span></legend>
                                        <div class="form-group row row-hardcode">
                                            <label class="col-lg-3 col-form-label">@lang('account.gender')</label>
                                            <div class="col-lg-9">
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input  class="form-check-input" id="gender-male" name="gender" type="radio" value="M" {{Auth::user()->gender == 1 ?'checked':''}}>
                                                    <span>&nbsp;&nbsp;&nbsp;&nbsp;@lang('account.male')</span>
                                                </label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" id="gender-female" name="gender" type="radio" value="F" {{Auth::user()->gender == 1  ?'':'checked'}}>
                                                        <span>&nbsp;&nbsp;&nbsp;&nbsp;@lang('account.female')</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row row-hardcode"><label class="col-lg-3 col-form-label required" for="FirstName" aria-required="true">@lang('profile.first-name')</label>
                                            <div class="col-lg-9">
                                                <input class="form-control" data-val="true" data-val-required="First name is required." id="FirstName" name="first_name" type="text" value="{{Auth::user()->first_name}}">
                                            </div>
                                        </div>

                                        <div class="form-group row row-hardcode"><label class="col-lg-3 col-form-label required" for="LastName" aria-required="true">@lang('profile.last-name')</label>
                                            <div class="col-lg-9">
                                                <input class="form-control" data-val="true" data-val-required="Last name is required." id="LastName" name="last_name" type="text" value="{{Auth::user()->last_name}}">
                                            </div>
                                        </div>
                                        <div class="form-group row row-hardcode">
                                            <label class="col-lg-3 col-form-label" for="DateOfBirthDay">@lang('account.birthday')</label>
                                            <div class="col-lg-9">
                                                <div class="row row-hardcode xs-gutters">
                                                    <div class="col">
                                                        <input class="form-control"  id="day" name="day" type="text" value="{{date('d',strtotime(Auth::user()->date_of_birth))}}">
                                                    </div>
                                                    <div class="col">
                                                        <input class="form-control"  id="month" name="month" type="text" value="{{date('m',strtotime(Auth::user()->date_of_birth))}}">
                                                    </div>
                                                    <div class="col">
                                                        <input class="form-control" id="year" name="year" type="text" value="{{date('Y',strtotime(Auth::user()->date_of_birth))}}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row row-hardcode"><label class="col-lg-3 col-form-label required" for="Email" aria-required="true">Email</label>
                                            <div class="col-lg-9">
                                                <input class="form-control" id="Email" name="email" type="email" value="{{Auth::user()->email}}">
                                            </div>
                                        </div>
                                        <div class="form-group row row-hardcode"><label class="col-lg-3 col-form-label" for="Phone" aria-required="true">Phone</label>
                                            <div class="col-lg-9">
                                                <input class="form-control" id="Phone" name="phone" type="text" value="{{Auth::user()->phone}}">
                                            </div>
                                        </div>
                                        <div class="form-group row row-hardcode">
                                            <label class="col-lg-3 col-form-label required" for="Username" aria-required="true">Username</label>
                                            <div class="col-lg-9">
                                                <p class="form-control-static">{{Auth::user()->username}}</p>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset class="content-group">
                                        <legend><span>@lang('checkout.optional')</span></legend>
                                        <div class="form-group row row-hardcode">
                                            <div class="col-lg-9">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        {{ Form::checkbox('newsletter', 1 , Auth::user()->newsletter ? true : false, array('class' => 'name')) }}
                                                        Newsletter
                                                    </label>
                                                    <span class="field-validation-valid" data-valmsg-for="Newsletter" data-valmsg-replace="true"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="form-group row row-hardcode">
                                        <div class="col">
                                            <button type="submit" name="save-info-button" class="btn btn-primary btn-lg save-customer-info-button">
                                                <i class="fa fa-check"></i>
                                                <span>@lang('common.update')</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@section('scripts')
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/lodash.js/0.10.0/lodash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script> 
    <script type="text/javascript" src="{{ asset('js/viewport.js') }}"></script> 
    <script type="text/javascript" src="{{ asset('js/eventbroker.js') }}"></script> 
    <script type="text/javascript" src="{{ asset('js/underscore.js') }}"></script> 
    <script type="text/javascript" src="{{ asset('js/underscore.mixins.js') }}"></script> 
    <script type="text/javascript" src="{{ asset('js/underscore.string.js') }}"></script> 
    <script type="text/javascript" src="{{ asset('js/system.js') }}"></script> 
    <script type="text/javascript" src="{{ asset('js/system.common.js') }}"></script> 
    <script type="text/javascript" src="{{ asset('js/public.common.js') }}"></script> 
    <script type="text/javascript" src="{{ asset('js/throbber.js') }}"></script>     
    <script type="text/javascript" src="{{ asset('js/doAjax.js') }}"></script> 
    <script type="text/javascript" src="{{ asset('js/jquery.bootstrap-touchspin.js') }}"></script> 
    <script type="text/javascript" src="{{ asset('js/offcanvas.js') }}"></script> 
    <script type="text/javascript" src="{{ asset('js/offcanvas-cart.js') }}"></script> 
  
<script>
    $(function () {
        
    });
</script>
@endsection
