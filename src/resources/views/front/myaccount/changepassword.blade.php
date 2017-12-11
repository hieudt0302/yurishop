@extends('layouts.master')
@section('title','Danh Sách Đơn Hàng - Pokofarms')
@section('header')
@parent
<!-- OVERRIDER MASTER CSS -->
<link rel="stylesheet" href="{{ asset('css/custom-order.css') }}">
@stop


@section('content')
<div id="content-wrapper">
    <section id="content" class="container mt-3">
        <div id="content-body" class="row row-hardcode mt-4">
            <div id="content-center" class="col-lg-12">
                <div class="page page-myaccount page-myaccount-changepassword">
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
                                    <h1 class="h3">@lang('profile.change-password')</h1>
                                </div>
                                <form action="{{url('/Account/ChangePassword/Update')}}" class="form-horizontal" method="post">
                                {{ csrf_field()}}
                                    <div class="form-group row row-hardcode">
                                        <label class="col-lg-4 col-form-label required" for="OldPassword">Old password</label>
                                        <div class="col-lg-8">
                                            <input class="form-control" id="OldPassword" name="old_password" type="password">
                                        </div>
                                    </div>
                                    <div class="form-group row row-hardcode">
                                        <label class="col-lg-4 col-form-label required" for="NewPassword" aria-required="true">@lang('profile.new-password')</label>
                                        <div class="col-lg-8">
                                            <input class="form-control" id="NewPassword" name="new_password" type="password">
                                        </div>
                                    </div>
                                    <div class="form-group row row-hardcode">
                                        <label class="col-lg-4 col-form-label required" for="ConfirmNewPassword" >Confirm password</label>
                                        <div class="col-lg-8">
                                            <input class="form-control" id="ConfirmNewPassword" name="new_password_confirmation" type="password">
                                        </div>
                                    </div>
                                    <div class="form-group row row-hardcode">
                                        <div class="col">
                                            <button type="submit" class="btn btn-lg btn-primary">
                                            <i class="fa fa-check"></i>
                                            <span>@lang('profile.change-password')</span>
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
