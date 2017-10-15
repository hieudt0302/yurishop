@extends('layouts.master')
@section('title','Danh Sách Đơn Hàng - Cà Phê Đăk Hà')
@section('header') @parent
<!-- OVERRIDER MASTER CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="{{ asset('css/theme.css') }}"> 
@endsection 
@section('content')
<div id="content-wrapper">
    <section id="content" class="container mt-3">
        <div id="content-body" class="row mt-4">
            <div id="content-center" class="col-lg-12">
                <div class="page page-myaccount page-myaccount-orders">
                    <div class="page-body">
                        <div class="row">
                            <div class="col-md-4 col-lg-3">
                            @include('front.myaccount.myaccount_sidebar')
                            </div>
                            <div class="col-md-8 col-lg-9">
                                <div class="page-title pt-4 pt-md-0">
                                    <h1 class="h3">Orders</h1>
                                </div>
                                <div class="card-deck card-cols-sm-1 order-list">
                                    @foreach(Auth::user()->orders as $order)
                                    <div class="card card-shadow order-item">
                                        <div class="card-block">
                                            <h4 class="card-title mb-4">Order #: {{$order->order_no}}</h4>
                                            <dl class="row mb-0">
                                                <dt class="col-sm-3 font-weight-400 text-muted">Order Status</dt>
                                                <dd class="col-sm-9">Pending</dd>
                                                <dt class="col-sm-3 font-weight-400 text-muted">Order Date</dt>
                                                <dd class="col-sm-9">10/9/2017 6:04:02 PM</dd>
                                                <dt class="col-sm-3 font-weight-400 text-muted">Order Total</dt>
                                                <dd class="col-sm-9 price">230,00 €</dd>
                                            </dl>
                                        </div>
                                        <div class="card-footer d-flex p-0">
                                            <a class="btn btn-secondary btn-flat rounded-0" href="{{url('/Order/Details')}}/{{$order->id}}" rel="nofollow">
                                                <i class="fa fa-list-alt"></i>
                                                <span>Order Details</span>
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
        
    });
</script>
@endsection
