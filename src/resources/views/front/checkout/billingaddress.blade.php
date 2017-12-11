@extends('layouts.master') 
@section('title','Địa Chỉ Thanh Toán Hóa Đơn - Giỏ Hàng') 
@section('header')
@parent
<!-- OVERRIDER MASTER CSS -->
<link rel="stylesheet" href="{{ asset('css/custom-order.css') }}">
@stop

@section('content')
<div id="content-wrapper">
    <section id="content" class="container mt-3">        
        <div class="costeps row row-hardcode no-gutters">
            <div class="col-2 costep visited" data-step="cart">
                <a class="costep-link" href="{{url('/cart')}}"> <i class="costep-icon"></i>
                    <span class="costep-label">@lang('shoppings.cart')</span>
                </a>
            </div>
            <div class="col-2 costep active" data-step="address">
                <a class="costep-link" href="{{url('/Checkout/BillingAddress')}}"> <i class="costep-icon"></i>
                    <span class="costep-label">@lang('profile.address')</span>
                </a>
            </div>
            <div class="col-2 costep inactive" data-step="shipping">
                <a class="costep-link" href="javascript:void(0)">
                    <i class="costep-icon"></i>
                    <span class="costep-label">@lang('shoppings.shipping')</span>
                </a>
            </div>
            <div class="col-2 costep inactive" data-step="payment">
                <a class="costep-link" href="javascript:void(0)">
                    <i class="costep-icon"></i>
                    <span class="costep-label">@lang('shoppings.payment')</span>
                </a>
            </div>


            <div class="col-2 costep inactive" data-step="confirm">
                <a class="costep-link" href="javascript:void(0)">
                    <i class="costep-icon"></i>
                    <span class="costep-label">@lang('shoppings.confirm')</span>
                </a>
            </div>
            <div class="col-2 costep inactive" data-step="complete">
                <a class="costep-link" href="javascript:void(0)">
                    <i class="costep-icon"></i>
                    <span class="costep-label">@lang('shoppings.complete')</span>
                </a>
            </div>
        </div>

        <div id="content-body" class="row row-hardcode mt-4">
            <div id="content-center" class="col-lg-12">
                <div class="page billing-address-page">
                    <div class="page-title">
                        <h1 class="h3">@lang('checkout.billing-address')</h1>
                    </div>
                    <div class="page-body checkout-data">
                        @if(count(Auth::user()->bookaddresses()) > 0)
                        <fieldset class="content-group mb-3">
                            <legend>
                                <span>@lang('checkout.select-billing-address')</span>
                            </legend>
                            <div class="card-deck card-cols-sm-1 card-cols-md-2 card-cols-lg-3 address-list">
                                @foreach(Auth::user()->bookaddresses as $bookaddress)
                                <div class="card card-block address-list-item">
                                    <div class="address-item">
                                        <button class="btn btn-warning btn-block select-billing-address-button" onclick="setLocation('/Checkout/SelectBillingAddress?addressId={{$bookaddress->
                                            id}}')">
                                            <span>@lang('checkout.bill-this-address')</span>
                                            <i class="fa fa-angle-right"></i>
                                        </button>
                                        <div class="address-data mt-3">
                                            <div class="name pb-2"> <strong>{{$bookaddress->last_name}} {{$bookaddress->first_name}}</strong>
                                            </div>
                                            <div class="email">Email: {{$bookaddress->email}}</div>
                                            <div class="phone">@lang('profile.phone'): {{$bookaddress->phone}}</div>
                                            <div class="company">{{$bookaddress->company}}</div>
                                            <div class="address1">{{$bookaddress->address1}}</div>
                                            <div class="address2">{{$bookaddress->address2}}</div>
                                            <div class="city-state-zip">{{$bookaddress->city}}, {{$bookaddress->zipcode}}</div>
                                            <div class="country">{{$bookaddress->country}}</div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </fieldset>
                        @endif
                        <fieldset class="content-group">
                            <legend>
                                <span>
                                    @if(count(Auth::user()->bookaddresses()) > 0)
                                    @lang('checkout.or-enter')
                                    @else 
                                    @lang('checkout.enter')
                                    @endif
                                    @lang('checkout.new-address')
                                </span>
                            </legend>
                            <div class="enter-address">
                                <form action="{{url('/Checkout/BillingAddress/CreateNew')}}" method="POST">
                                    {{ csrf_field() }}

                                    <!-- Common Form Create New Address -->
                                    @include('front.checkout.createaddressform')

                                    <div class="buttons">
                                        <a class="btn btn-secondary btn-lg" href="{{url('/cart')}}">
                                            <i class="fa fa-angle-left"></i>
                                            <span>@lang('checkout.back')</span>
                                        </a>
                                        <input type="submit" id="nextstep" class="d-none">
                                        <button class="btn btn-warning btn-lg new-address-next-step-button" onclick="$('#nextstep').trigger('click');return false;">
                                            <span>@lang('checkout.next')</span>
                                            <i class="fa fa-angle-right"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@section('scripts')
<!-- <script type="text/javascript" src="{{ asset('js/jquery-3.2.1.js') }}"></script>
-->
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/lodash.js/0.10.0/lodash.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
-->
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
<script type="text/javascript" src="{{ asset('dist/pnotify/pnotify.js') }}"></script>
<script type="text/javascript" src="{{ asset('dist/pnotify/pnotify.animate.js') }}"></script>

<!-- Select2 -->
<script src="{{asset('js/select2.full.min.js')}}"></script>
<script type="text/javascript">
    $(function() {
        $("#NewAddress_CountryId").change(function() {
            var selectedItem = $(this).val();
            var ddlStates = $("#state_province");
            $.ajax({
                cache: false,
                type: "GET",
                url: "/frontend/en/Country/GetStatesByCountryId",
                data: {
                    "countryId": selectedItem,
                    "addEmptyStateIfRequired": "true"
                },
                success: function(data) {
                    ddlStates.html('');
                    $.each(data, function(id, option) {
                        ddlStates.append($('<option></option>').val(option.id).html(option.name));
                    });
                    ddlStates.trigger("change");
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert('Failed to retrieve states.');
                }
            });
        });
    });
</script>
@endsection