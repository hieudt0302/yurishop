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
                <div class="page page-myaccount page-myaccount-addresses">
                    <div class="page-body">
                        <div class="row row-hardcode">
                            <div class="col-md-4 col-lg-3">
                                @include('front.myaccount.myaccount_sidebar')
                            </div>
                            <div class="col-md-8 col-lg-9">
                                <div class="page-title pt-4 pt-md-0">
                                    <h1 class="h3">@lang('account.addresses')</h1>
                                </div>
                                <div class="add-address">
                                    <a class="btn btn-primary btn-lg add-address-button mb-4" href="{{url('/Account/Addresses/Create')}}" rel="nofollow">
                                        <i class="fa fa-plus"></i>
                                        <span>@lang('common.add')</span>
                                    </a>
                                </div>

                                <div class="card-deck card-cols-sm-1 card-cols-lg-2 address-list">
                                    @foreach(Auth::user()->bookaddresses as $address)
                                    <div class="card card-shadow address-list-item">
                                        <div class="card-block">
                                            <h4 class="card-title">{{$address->last_name}} {{$address->first_name}}</h4>

                                            <div class="mb-2">
                                                <div class="email">
                                                    <label class="m-0" for="email">Email</label>: {{$address->email}}
                                                </div>
                                                <div class="phone">
                                                    <label class="m-0" for="phone">Phone</label>: {{$address->phone}}
                                                </div>
                                            </div>

                                            <div class="company">{{$address->company}}</div>
                                            <div class="address1">{{$address->address1}}</div>
                                            <div class="address2">{{$address->address2}}</div>
                                            <div class="city-state-zip">
                                            {{$address->city}}, {{$address->zipcode}}
                                            </div>
                                            <div class="country">
                                            {{$address->country}}
                                            </div>
                                        </div>

                                        <div class="card-footer d-flex p-0">
                                            <a class="btn btn-secondary btn-lg btn-flat rounded-0 edit-address-button" href="{{url('/Account/Addresses/Edit')}}/{{$address->id}}">
                                                <span>@lang('common.edit')</span>
                                            </a>
                                            <a class="btn btn-danger btn-lg btn-flat rounded-0 delete-address-button" href="{{url('/Account/Addresses/Delete')}}/{{$address->id}}" onclick="return confirm('Are you sure?');">
                                                <span>@lang('common.delete')</span>
                                            </a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>

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
        $('#account-addresses').addClass("active");   
    });
</script>
@endsection
