@extends('layouts.admin') 
@section('title','Chi Tiết Đơn Hàng - Admin') 
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
    Chi Tiết Đơn Hàng
        <small>
            <i class="fa fa-arrow-circle-left"></i>
            <a href="{{url('/admin/orders')}}">back to order list</a>
        </small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Chi Tiết Đơn Hàng</a></li>
        <li class="active">Danh Sách</li>
    </ol>
    <div class="row">
        <div class="col-xs-12">
            @include('notifications.status_message') 
            @include('notifications.errors_message') 
        </div>
    </div> 
</section>
<!-- Main content -->
<section class="content">
    <!-- ORDER DETAILS -->
    <div class="row">
        <div class="col-md-12">
            <div class="form-horizontal">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#info" data-toggle="tab">Info</a></li>
                        <li><a href="#billing_address" data-toggle="tab">Billing Address</a></li>
                        <li><a href="#shipping_address" data-toggle="tab">Shipping Address</a></li>
                        <li><a href="#products" data-toggle="tab">Product(s)</a></li>
                        <li><a href="#order_notes" data-toggle="tab">Order Note(s)</a></li>
                    </ul>
                    <div class="tab-content">
                        <!-- INFO TAB -->
                        <div class="active tab-pane" id="info">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="OrderStatus" title="">Order status:</label>
                                            <div class="col-md-9">
                                                <div class="input-group input-group-short">                                                   
                                                    <div class="input-group-text">
                                                        <strong>
                                                            <div class="form-text-row">{{__('status.order.'.$order->order_status)}}</div>
                                                        </strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-9 col-md-offset-3">
                                                <div class="input-group input-group-short">
                                                    <div class="input-group-btn">
                                                        <strong>
                                                            <div class="form-text-row">{{__('status.order.'.$order->order_status)}}</div>
                                                        </strong>
                                                        @if($order->order_status!==3)
                                                        <button type="button" name="" id="cancelorder" class="btn bg-red" style="margin-right: 3px;" data-toggle="modal" data-target="#cancelorder-action-confirmation">
                                                            Cancel order
                                                        </button>
                                                        @endif
                                                        <button type="submit" name="btnChangeOrderStatus" onclick="toggleChangeOrderStatus(true);return false;" id="btnChangeOrderStatus" class="btn btn-primary" style="display: inline-block;">
                                                        Change status
                                                        </button>
                                                        <form action="{{url('/admin/orders')}}/{{$order->id}}/change/orderstatus" method="POST">
                                                        {{ csrf_field()}}
                                                            <div id="pnlChangeOrderStatus" style="margin-top: 3px; display: none;">
                                                                <select class="form-control valid" id="OrderStatusId" name="order_status" style="max-width: 160px">
                                                                    @foreach(\Lang::get('status.order') as $key =>$value)
                                                                        @if($order->order_status === $key)
                                                                            <option value="{{$key}}" selected="selected">{{$value}}</option>
                                                                        @else 
                                                                            <option value="{{$key}}">{{$value}}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                                <button type="submit" name="" id="btnSaveOrderStatus" class="btn btn-primary" style="margin-left: 3px">
                                                                Save
                                                                </button>
                                                                <button type="button" onclick="toggleChangeOrderStatus(false);return false;" id="btnCancelOrderStatus" class="btn bg-teal" style="margin-left: 3px">
                                                                Cancel
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3  control-label" for="CustomOrderNumber" title="">Order No</label>
                                            <div class="col-md-9">
                                                <div class="form-text-row">#{{$order->order_no}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="CustomerId" title="">Customer Name</label>
                                            <div class="col-md-9">
                                                <div class="form-text-row">
                                                    <a href="#">{{$order->billingaddress->last_name}} {{$order->billingaddress->first_name}}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="customer_email" title="">Customer Email</label>
                                            <div class="col-md-9">
                                                <div class="form-text-row">{{$order->billingaddress->email}}</div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="customer_phone" title="">Customer Phone</label>
                                            <div class="col-md-9">
                                                <div class="form-text-row">{{$order->billingaddress->phone}}</div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Order subtotal</label>
                                            <div class="col-md-7">
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <div class="form-text-row">
                                                            {{$order->orderdetails->sum('total')}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3  control-label">Order shipping</label>
                                            <div class="col-md-7">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="form-text-row">
                                                        {{$order->order_shipping_price}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="Tax" title="">Order tax</label>
                                            <div class="col-md-9">
                                                <div class="form-text-row">{{$order->order_tax}}</div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="">
                                                <div class="label-wrapper">
                                                
                                                <label class="col-md-3 control-label" for="OrderTotal" title="">Order total</label>
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-text-row">{{$order->order_total}}</div>
                                            </div>
                                        </div>
                                        <hr>
                                        <form action="{{url('admin/orders')}}/{{$order->id}}/update/fee" method="POST">
                                        {{ csrf_field()}}
                                            <div id="trEditOrderTotals" style="display: none;">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" title="">Order Shipping Price</label>
                                                    <div class="col-md-4">
                                                        <div class="input-group bootstrap-touchspin">
                                                            <input  id="OrderShippingPrice" name="order_shipping_price" type="text" value="0.00"  class="form-control" style="display: block;" value="{{$order->order_shipping_price}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"  title="">Order Tax</label>
                                                    <div class="col-md-4">
                                                        <div class="input-group bootstrap-touchspin">
                                                            <input  id="OrderTax" name="order_tax" type="text" value="0.00" class="form-control" style="display: block;" value="{{$order->order_tax}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-9 col-md-offset-3">
                                                    <button type="button" name="btnEditOrderTotals" onclick="toggleOrderTotals(true);return false;" id="btnEditOrderTotals" class="btn btn-primary">
                                                    Edit order totals
                                                    </button>
                                                    <button type="submit" name="" id="btnSaveOrderTotals" class="btn btn-primary" style="display: none;">
                                                        Save order totals
                                                    </button>
                                                    <button type="button" name="btnCancelOrderTotals" onclick="toggleOrderTotals(false);return false;" id="btnCancelOrderTotals" class="btn bg-teal" style="display: none;">
                                                    Cancel
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="form-group">
                                                <label class="col-md-3 control-label" for="payment_status" title="">Payment status</label>
                                            <div class="col-md-9">
                                                <div class="form-text-row">{{__('status.payment.'.$order->payment_status)}}</div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-9 col-md-offset-3">
                                                <div class="input-group input-group-short">
                                                    <div class="input-group-btn">
                                                        <button type="submit" name="btnChangePaymentStatus" onclick="toggleChangePaymentStatus(true);return false;" id="btnChangePaymentStatus" class="btn btn-primary" style="display: inline-block;">
                                                        Change status
                                                        </button>
                                                        <form action="{{url('/admin/orders')}}/{{$order->id}}/change/paymentstatus" method="POST">
                                                        {{ csrf_field()}}
                                                            <div id="pnlChangePaymentStatus" style="margin-top: 3px; display: none;">
                                                                <select class="form-control valid" id="PaymentStatusId" name="payment_status" style="max-width: 160px">
                                                                    @foreach(\Lang::get('status.payment') as $key =>$value)
                                                                        @if($order->payment_status === $key)
                                                                            <option value="{{$key}}" selected="selected">{{$value}}</option>
                                                                        @else 
                                                                            <option value="{{$key}}">{{$value}}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                                <button type="submit" name="" id="btnSavePaymentStatus" class="btn btn-primary" style="margin-left: 3px">
                                                                Save
                                                                </button>
                                                                <button type="button" onclick="toggleChangePaymentStatus(false);return false;" id="btnCancelPaymentStatus" class="btn bg-teal" style="margin-left: 3px">
                                                                Cancel
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="shipping_status" title="">Shipping status</label>
                                            <div class="col-md-9">
                                                <div class="form-text-row">{{__('status.shipping.'.$order->shipping_status)}}</div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-9 col-md-offset-3">
                                                <div class="input-group input-group-short">
                                                    <div class="input-group-btn">
                                                       
                                                        <button type="submit" name="btnChangeShippingStatus" onclick="toggleChangeShippingStatus(true);return false;" id="btnChangeShippingStatus" class="btn btn-primary" style="display: inline-block;">
                                                        Change status
                                                        </button>
                                                        <form action="{{url('/admin/orders')}}/{{$order->id}}/change/shippingstatus" method="POST">
                                                        {{ csrf_field()}}
                                                            <div id="pnlChangeShippingStatus" style="margin-top: 3px; display: none;">
                                                                <select class="form-control valid" id="ShippingStatusId" name="shipping_status" style="max-width: 160px">
                                                                    @foreach(\Lang::get('status.shipping') as $key =>$value)
                                                                        @if($order->shipping_status === $key)
                                                                            <option value="{{$key}}" selected="selected">{{$value}}</option>
                                                                        @else 
                                                                            <option value="{{$key}}">{{$value}}</option>
                                                                        @endif
                                                                    @endforeach
                                                                </select>
                                                                <button type="submit" name="" id="btnSaveShippingStatus" class="btn btn-primary" style="margin-left: 3px">
                                                                Save
                                                                </button>
                                                                <button type="button" onclick="toggleChangeShippingStatus(false);return false;" id="btnCancelShippingStatus" class="btn bg-teal" style="margin-left: 3px">
                                                                Cancel
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- BILLING ADDRESS TAB -->
                        <div class="tab-pane" id="billing_address">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <form action="{{url('admin/orders')}}/{{$order->id}}/update/billingaddress" method="POST">
                                            {{ csrf_field()}}
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="billing_address" title="">Billing address</label>
                                                <div class="col-md-9">
                                                    <img alt="google maps" src="data:image/gif;base64,R0lGODlhEAAQANUAAAATVm+s78cjAE+tVaq2wldzvBxase3/9gAlvS23QNPZ+QsWpMLO/gdj6HyPx3qk1r/e8MTb4ygmi84UGSQ6sUy0O////6/S+hUqqiZbyykwdOX2/UZ0ygQ2sd0YEomP2RUfgG+a6Rc7k8wuIk21UgAilvf//80qABxJsM3c88H1/xMxxSAuxUJu2//1/2KEqd3r/xY/v9waAGWF2NIoDzFguBMsoNYgL4GZ3zE3sdDl/9slGg4qy+n//zy1RNEQByH5BAAHAP8ALAAAAAAQABAAAAaXwAapMqgMjb6KMuHzNSzQqFQ6elp6MFyBsurUAhDo6XlQcVaw3pUh0kB/1plILU1FoLQnTqQwTaVjFiEULn9ScBY1BoZSHk8ZKIxRN08tJX5QJgcROjopFgJPDwgOB1EMORgUHxY7TxssCwyYUDogBBYTVjASCx8bFgcHFwC4eRYmJhsFEjYrMTwoL8CuklM7Tdna2z4yQQA7">
                                                    <a href="http://maps.google.com/maps?f=q&amp;hl=en&amp;ie=UTF8&amp;oe=UTF8&amp;geocode=&amp;q={{$order->billingaddress->address1}}+{{$order->billingaddress->district}}+{{$order->billingaddress->city}}+{{$order->billingaddress->country}}" style="margin-bottom: 10px;" target="_blank">View address on Google Maps</a>
                                                    <table class="table table-hover table-bordered" style="max-width: 600px;">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    First Name
                                                                </td>
                                                                <td>
                                                                    {{$order->billingaddress->first_name}}
                                                                </td>
                                                                <td id="tdEditBillingFirstName" style="display:none;">
                                                                    <input type="text" name="first_name">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Last Name
                                                                </td>
                                                                <td>
                                                                    {{$order->billingaddress->last_name}}
                                                                </td>
                                                                <td id="tdEditBillingLastName" style="display:none;">
                                                                    <input type="text" name="last_name">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Email
                                                                </td>
                                                                <td>
                                                                    {{$order->billingaddress->email}}
                                                                </td>
                                                                <td id="tdEditBillingEmail" style="display:none;">
                                                                    <input type="text" name="email">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Phone
                                                                </td>
                                                                <td>
                                                                    {{$order->billingaddress->phone}}
                                                                </td>
                                                                <td id="tdEditBillingPhone" style="display:none;">
                                                                    <input type="text" name="phone">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Fax
                                                                </td>
                                                                <td>
                                                                    {{$order->billingaddress->fax}}
                                                                </td>
                                                                <td id="tdEditBillingFax" style="display:none;">
                                                                    <input type="text" name="fax">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Company
                                                                </td>
                                                                <td>
                                                                    {{$order->billingaddress->company}}
                                                                </td>
                                                                <td id="tdEditBillingCompany" style="display:none;">
                                                                    <input type="text" name="company">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Address 1
                                                                </td>
                                                                <td>
                                                                    {{$order->billingaddress->address1}}
                                                                </td>
                                                                <td id="tdEditBillingAddress1" style="display:none;">
                                                                    <input type="text" name="address1">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Address 2
                                                                </td>
                                                                <td>
                                                                    {{$order->billingaddress->address2}}
                                                                </td>
                                                                <td id="tdEditBillingAddress2" style="display:none;">
                                                                    <input type="text" name="address2">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    District
                                                                </td>
                                                                <td>
                                                                    {{$order->billingaddress->district}}
                                                                </td>
                                                                <td id="tdEditBillingDistrict" style="display:none;">
                                                                    <input type="text" name="district">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    City
                                                                </td>
                                                                <td>
                                                                    {{$order->billingaddress->city}}
                                                                </td>
                                                                <td id="tdEditBillingCity" style="display:none;">
                                                                    <input type="text" name="city">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    State / province
                                                                </td>
                                                                <td>
                                                                    {{$order->billingaddress->state_province}}
                                                                </td>
                                                                <td id="tdEditBillingStateProvince" style="display:none;">
                                                                    <input type="text" name="state_province">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Zip / postal code
                                                                </td>
                                                                <td>
                                                                    {{$order->billingaddress->zipcode}}
                                                                </td>
                                                                <td id="tdEditBillingZipCode" style="display:none;">
                                                                    <input type="text" name="zipcode">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Country
                                                                </td>
                                                                <td>
                                                                    {{$order->billingaddress->country}}
                                                                </td>
                                                                <td id="tdEditBillingCountry" style="display:none;">
                                                                    <input type="text" name="country">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-9 col-md-offset-3">
                                                    <div class="input-group input-group-short">
                                                        <div class="input-group-btn">
                                                            <button type="button" id="btnEditChangeBillingAddress" onclick="toggleChangeBillingAddress(true);return false;" class="btn btn-primary">
                                                            Edit
                                                            </button>
                                                            <button type="submit" id="btnSaveChangeBillingAddress" class="btn btn-primary" style="margin-left: 3px; display: none;">
                                                            Save
                                                            </button>
                                                            <button type="button" id="btnCancelChangeBillingAddress" onclick="toggleChangeBillingAddress(false);return false;"  class="btn bg-teal" style="margin-left: 3px; display: none;">
                                                            Cancel
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- SHIPPING ADDRESS TAB -->
                        <div class="tab-pane" id="shipping_address">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <form action="{{url('admin/orders')}}/{{$order->id}}/update/shippingaddress" method="POST">
                                            {{ csrf_field()}}
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="shipping_address" title="">Shipping address</label>
                                                <div class="col-md-9">
                                                    <img alt="google maps" src="data:image/gif;base64,R0lGODlhEAAQANUAAAATVm+s78cjAE+tVaq2wldzvBxase3/9gAlvS23QNPZ+QsWpMLO/gdj6HyPx3qk1r/e8MTb4ygmi84UGSQ6sUy0O////6/S+hUqqiZbyykwdOX2/UZ0ygQ2sd0YEomP2RUfgG+a6Rc7k8wuIk21UgAilvf//80qABxJsM3c88H1/xMxxSAuxUJu2//1/2KEqd3r/xY/v9waAGWF2NIoDzFguBMsoNYgL4GZ3zE3sdDl/9slGg4qy+n//zy1RNEQByH5BAAHAP8ALAAAAAAQABAAAAaXwAapMqgMjb6KMuHzNSzQqFQ6elp6MFyBsurUAhDo6XlQcVaw3pUh0kB/1plILU1FoLQnTqQwTaVjFiEULn9ScBY1BoZSHk8ZKIxRN08tJX5QJgcROjopFgJPDwgOB1EMORgUHxY7TxssCwyYUDogBBYTVjASCx8bFgcHFwC4eRYmJhsFEjYrMTwoL8CuklM7Tdna2z4yQQA7">
                                                    <a href="http://maps.google.com/maps?f=q&amp;hl=en&amp;ie=UTF8&amp;oe=UTF8&amp;geocode=&amp;q={{$order->shippingaddress->address1}}+{{$order->shippingaddress->district}}+{{$order->shippingaddress->city}}+{{$order->shippingaddress->country}}" style="margin-bottom: 10px;" target="_blank">View address on Google Maps</a>
                                                    <table class="table table-hover table-bordered" style="max-width: 600px;">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    First Name
                                                                </td>
                                                                <td>
                                                                    {{$order->shippingaddress->first_name}}
                                                                </td>
                                                                <td id="tdEditShippingFirstName" style="display:none;">
                                                                    <input type="text" name="first_name">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Last Name
                                                                </td>
                                                                <td>
                                                                    {{$order->shippingaddress->last_name}}
                                                                </td>
                                                                <td id="tdEditShippingLastName" style="display:none;">
                                                                    <input type="text" name="last_name">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Email
                                                                </td>
                                                                <td>
                                                                    {{$order->shippingaddress->email}}
                                                                </td>
                                                                <td id="tdEditShippingEmail" style="display:none;">
                                                                    <input type="text" name="email">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Phone
                                                                </td>
                                                                <td>
                                                                    {{$order->shippingaddress->phone}}
                                                                </td>
                                                                <td id="tdEditShippingPhone" style="display:none;">
                                                                    <input type="text" name="phone">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Fax
                                                                </td>
                                                                <td>
                                                                    {{$order->shippingaddress->fax}}
                                                                </td>
                                                                <td id="tdEditShippingFax" style="display:none;">
                                                                    <input type="text" name="fax">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Company
                                                                </td>
                                                                <td>
                                                                    {{$order->shippingaddress->company}}
                                                                </td>
                                                                <td id="tdEditShippingCompany" style="display:none;">
                                                                    <input type="text" name="company">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Address 1
                                                                </td>
                                                                <td>
                                                                    {{$order->shippingaddress->address1}}
                                                                </td>
                                                                <td id="tdEditShippingAddress1" style="display:none;">
                                                                    <input type="text" name="address1">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Address 2
                                                                </td>
                                                                <td>
                                                                    {{$order->shippingaddress->address2}}
                                                                </td>
                                                                <td id="tdEditShippingAddress2" style="display:none;">
                                                                    <input type="text" name="address2">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    District
                                                                </td>
                                                                <td>
                                                                    {{$order->shippingaddress->district}}
                                                                </td>
                                                                <td id="tdEditShippingDistrict" style="display:none;">
                                                                    <input type="text" name="district">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    City
                                                                </td>
                                                                <td>
                                                                    {{$order->shippingaddress->city}}
                                                                </td>
                                                                <td id="tdEditShippingCity" style="display:none;">
                                                                    <input type="text" name="city">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    State / province
                                                                </td>
                                                                <td>
                                                                    {{$order->shippingaddress->state_province}}
                                                                </td>
                                                                <td id="tdEditShippingStateProvince" style="display:none;">
                                                                    <input type="text" name="state_province">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Zip / postal code
                                                                </td>
                                                                <td>
                                                                    {{$order->shippingaddress->zipcode}}
                                                                </td>
                                                                <td id="tdEditShippingZipCode" style="display:none;">
                                                                    <input type="text" name="zipcode">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Country
                                                                </td>
                                                                <td>
                                                                    {{$order->shippingaddress->country}}
                                                                </td>
                                                                <td id="tdEditShippingCountry" style="display:none;">
                                                                    <input type="text" name="country">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-9 col-md-offset-3">
                                                    <div class="input-group input-group-short">
                                                        <div class="input-group-btn">
                                                            <button type="button" id="btnEditChangeShippingAddress" onclick="toggleChangeShippingAddress(true);return false;" class="btn btn-primary">
                                                            Edit
                                                            </button>
                                                            <button type="submit" id="btnSaveChangeShippingAddress" class="btn btn-primary" style="margin-left: 3px; display: none;">
                                                            Save
                                                            </button>
                                                            <button type="button" id="btnCancelChangeShippingAddress" onclick="toggleChangeShippingAddress(false);return false;"  class="btn bg-teal" style="margin-left: 3px; display: none;">
                                                            Cancel
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- PRODUCT(s) TAB -->
                        <div class="tab-pane" id="products">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="form-group">
                                        <div class="col-md-12" style="overflow-x: auto;">
                                            <table class="table table-hover table-bordered text-center">
                                                <colgroup>
                                                    <col>
                                                    <col>
                                                    <col>
                                                    <col>
                                                    <col>
                                                    <col>
                                                    <col>
                                                </colgroup>
                                                <thead>
                                                    <tr>
                                                        <th>
                                                            Picture
                                                        </th>
                                                        <th>
                                                            Product name
                                                        </th>
                                                        <th>
                                                            Price
                                                        </th>
                                                        <th>
                                                            Quantity
                                                        </th>
                                                        <th>
                                                            Discount
                                                        </th>
                                                        <th>
                                                            Total
                                                        </th>
                                                        <th>
                                                            Edit
                                                        </th>
                                                        <th>
                                                            Remove
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($order->orderdetails as $detail)
                                                    <form action="{{url('admin/orders')}}" method="post">
                                                        <tr>
                                                            <td >
                                                                @if(!empty($detail->product->GetMediaByOrderAsc->source))
                                                                <img src="{{asset('/storage')}}/{{$order->GetMediaByOrderAsc->source}}" alt="{{$order->name}}" title="{{$order->name}}" style="width: 120px;">
                                                                @else 
                                                                <img src="{{asset('/images/no-image.png')}}" alt="{{$order->name}}" title="{{$order->name}}"  style="width: 120px;">
                                                                @endif
                                                            </td>
                                                            <td style="text-align: left; width: 15%;">
                                                                <em><a href="{{url('/admin/products')}}/{{$detail->product->slug}}">{{$detail->product->name}}</a></em>
                                                                <p>
                                                                    <strong>SKU</strong><text>:</text> {{$detail->product->sku}}
                                                                </p>
                                                            </td>
                                                            <td style="width: 15%;">
                                                                <div>{{$detail->price}}</div>
                                                                <div id="pnlEditProductPrice{{$detail->id}}" style="display: none;">
                                                                    <div class="form-group">
                                                                        <div class="col-md-8 col-md-offset-2">
                                                                            <input id="price"  name="price" type="text" value="{{$detail->price}}" class="form-control input-sm">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td style="width: 10%;">
                                                                <div>{{$detail->quantity}}</div>
                                                                <div id="pnlEditProductQuantity{{$detail->id}}" style="display: none;">
                                                                    <div class="form-group">
                                                                        <div class="col-md-8 col-md-offset-2">
                                                                            <input id="quantity"  name="quantity" type="text" value="{{$detail->quantity}}" class="form-control input-sm">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td style="width: 15%;">
                                                                <div>{{$detail->discount}}</div>
                                                                <div id="pnlEditProductDiscount{{$detail->id}}" style="display: none;">
                                                                    <div class="form-group">
                                                                        <div class="col-md-8 col-md-offset-2">
                                                                            <input id="discount"   name="discount" type="text" value="{{$detail->discount}}"class="form-control input-sm">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td style="width: 15%;">
                                                                {{$detail->total}}
                                                            </td>
                                                            <td style="width: 15%;">
                                                                <button id="btnEditOrderItem{{$detail->id}}" type="button" class="btn btn-default"  onclick="toggleOrderItemEdit(true, {{$detail->id}});return false;">
                                                                    <i class="fa fa-pencil"></i>
                                                                    Edit
                                                                </button>
                                                                
                                                                <button id="btnSaveOrderItem{{$detail->id}}" type="submit" class="btn btn-default" style="display:none;">
                                                                    <i class="fa fa-floppy-o"></i>
                                                                    Save
                                                                </button>
                                                            
                                                                <button id="btnCancelOrderItem{{$detail->id}}" type="button" class="btn btn-default" onclick="toggleOrderItemEdit(false, {{$detail->id}});return false;"  style="display:none;">
                                                                    <i class="fa fa-close"></i>
                                                                    Cancel
                                                                </button>
                                                            </td>
                                                            <td style="width: 15%;">
                                                                <button type="button" class="btn btn-danger" name="" id="btnDeleteOrderItem{{$detail->id}}">
                                                                    <i class="fa fa-trash"></i>
                                                                    Delete
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    </form>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ORDER NOTE(s) TAB -->
                        <div class="tab-pane" id="order_notes">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div id="ordernotes-grid" data-role="grid" class="k-grid k-widget">
                                            <table role="grid">
                                                <colgroup>
                                                    <col style="width:200px">
                                                    <col>
                                                    <col style="width:200px">
                                                    <col style="width:150px">
                                                    <col style="width:100px">
                                                </colgroup>
                                                <thead class="k-grid-header" role="rowgroup">
                                                    <tr role="row">
                                                        <th role="columnheader" data-field="CreatedOn" data-title="Created on" class="k-header">Created on</th>
                                                        <th role="columnheader" data-field="Note" data-title="Note" class="k-header">Note</th>
                                                        <th role="columnheader" data-field="DownloadId" data-title="Attached file" style="text-align:center" class="k-header">Attached file</th>
                                                        <th role="columnheader" data-field="DisplayToCustomer" data-title="Display to customer" style="text-align:center" class="k-header">Display to customer</th>
                                                        <th class="k-header">Delete</th>
                                                    </tr>
                                                </thead>
                                                <tbody role="rowgroup">
                                                    <tr data-uid="8ab853c8-a5ed-40df-8fc9-7bb05fe14f9f" role="row">
                                                        <td role="gridcell">10/14/2017 11:18:25 PM</td>
                                                        <td role="gridcell">Order item has been edited</td>
                                                        <td style="text-align:center" role="gridcell"> No file attached </td>
                                                        <td style="text-align:center" role="gridcell"> <i class="fa fa-close false-icon"></i> </td>
                                                        <td role="gridcell"><a class="k-button k-button-icontext k-grid-delete" href="#"><span class="k-icon k-delete"></span>Delete</a></td>
                                                    </tr>
                                                    <tr class="k-alt" data-uid="0d3f2714-1d0a-4fc0-91fb-bbf382388290" role="row">
                                                        <td role="gridcell">3/13/2017 6:20:09 PM</td>
                                                        <td role="gridcell">Order placed</td>
                                                        <td style="text-align:center" role="gridcell"> No file attached </td>
                                                        <td style="text-align:center" role="gridcell"> <i class="fa fa-close false-icon"></i> </td>
                                                        <td role="gridcell"><a class="k-button k-button-icontext k-grid-delete" href="#"><span class="k-icon k-delete"></span>Delete</a></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="k-pager-wrap k-grid-pager k-widget" data-role="pager"><a href="#" class="k-pager-refresh k-link" title="Refresh"><span class="k-icon k-i-refresh">Refresh</span></a></div>
                                        </div>

                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    
                                    <div class="panel-heading">
                                        Add order note
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <div class="label-wrapper"><label class="col-md-3 control-label" for="AddOrderNoteMessage" title="">Note</label>
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <textarea class="form-control" cols="20" id="AddOrderNoteMessage" name="AddOrderNoteMessage" rows="4"></textarea>
                                                <span class="field-validation-valid" data-valmsg-for="AddOrderNoteMessage" data-valmsg-replace="true"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <div class="label-wrapper"><label class="col-md-3 control-label" for="AddOrderNoteDisplayToCustomer" title="">Display to customer</label>
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <input class="check-box" id="AddOrderNoteDisplayToCustomer" name="AddOrderNoteDisplayToCustomer" type="checkbox" value="true"><input name="AddOrderNoteDisplayToCustomer" type="hidden" value="false">
                                                <span class="field-validation-valid" data-valmsg-for="AddOrderNoteDisplayToCustomer" data-valmsg-replace="true"></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-9 col-md-offset-3">
                                                <button type="button" id="addOrderNote" class="btn btn-primary">Add order note</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- MODEL AREA -->
<!-- 1 -->
<div id="cancelorder-action-confirmation" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="cancelorder-action-confirmation-title" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="cancelorder-action-confirmation-title">Are you sure?</h4>
            </div>
            <div class="modal-body">
                Are you sure you want to cancel this order?
            </div>
            <div class="modal-footer">
                <form action="{{url('/admin/orders')}}/{{$order->id}}/cancel/orderstatus" method="POST">
                    {{ csrf_field()}}
                    <button type="submit" class="btn btn-danger pull-right">Yes </button>
                </form>
                <span class="btn btn-default pull-right margin-r-5" data-dismiss="modal">No, cancel</span>
            </div>
        </div>
    </div>
</div>

<!-- 3 -->
<div id="btnSaveOrderTotals-action-confirmation" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="btnSaveOrderTotals-action-confirmation-title">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="btnSaveOrderTotals-action-confirmation-title">Are you sure?</h4>
            </div>
            <div class="modal-body">
                Are you sure you want to perform this action?
            </div>
            <div class="modal-footer">
                <button type="submit" id="btnSaveOrderTotals-action-confirmation-submit-button" class="btn btn-primary pull-right" name="btnSaveOrderTotals">
                Yes
                </button>
                <span class="btn btn-default pull-right margin-r-5" data-dismiss="modal">No, cancel</span>
            </div>
        </div>
    </div>
</div>
<!-- 4 -->
<div id="btnDeleteOrderItem4-action-confirmation" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="btnDeleteOrderItem4-action-confirmation-title">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="btnDeleteOrderItem4-action-confirmation-title">Are you sure?</h4>
            </div>
            <div class="modal-body">
                Are you sure you want to perform this action?
            </div>
            <div class="modal-footer">
                <button type="submit" id="btnDeleteOrderItem4-action-confirmation-submit-button" class="btn btn-primary pull-right" name="btnDeleteOrderItem4">
            Yes
            </button>
                <span class="btn btn-default pull-right margin-r-5" data-dismiss="modal">No, cancel</span>
            </div>
        </div>
    </div>
</div>
<!-- 5 -->
<div id="btnSaveOrderItem4-action-confirmation" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="btnSaveOrderItem4-action-confirmation-title">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="btnSaveOrderItem4-action-confirmation-title">Are you sure?</h4>
            </div>
            <div class="modal-body">
                Are you sure you want to perform this action?
            </div>
            <div class="modal-footer">
                <button type="submit" id="btnSaveOrderItem4-action-confirmation-submit-button" class="btn btn-primary pull-right" name="btnSaveOrderItem4">
                Yes
                </button>
                <span class="btn btn-default pull-right margin-r-5" data-dismiss="modal">No, cancel</span>
            </div>
        </div>
    </div>
</div>
@endsection 

@section('scripts') 
<script type="text/javascript">
    $(document).ready(function () {
        toggleChangeOrderStatus(false);
        toggleChangePaymentStatus(false);
        toggleChangeShippingStatus(false);
        toggleOrderTotals(false);
        toggleChangeBillingAddress(false);
        toggleChangeShippingAddress(false);

        $("#OrderShippingPrice").TouchSpin({
            min: 0,
            max: 999999999,
            decimals: 2,
            forcestepdivisibility: "none",
            verticalbuttons: true,
            postfix: ""
        });

        $("#OrderTax").TouchSpin({
            min: 0,
            max: 999999999,
            decimals: 2,
            forcestepdivisibility: "none",
            verticalbuttons: true,
            postfix: ""
        });

       $('#cancelorder').attr("data-toggle", "modal").attr("data-target", "#cancelorder-action-confirmation");
    });

    function toggleChangeOrderStatus(editmode) {
        if (editmode) {
            $('#pnlChangeOrderStatus').show();
            $('#btnChangeOrderStatus').hide();
        } else {
            $('#pnlChangeOrderStatus').hide();
            $('#btnChangeOrderStatus').show();
        }
    }

    function toggleChangePaymentStatus(editmode) {
        if (editmode) {
            $('#pnlChangePaymentStatus').show();
            $('#btnChangePaymentStatus').hide();
        } else {
            $('#pnlChangePaymentStatus').hide();
            $('#btnChangePaymentStatus').show();
        }
    }

    function toggleChangeShippingStatus(editmode) {
        if (editmode) {
            $('#pnlChangeShippingStatus').show();
            $('#btnChangeShippingStatus').hide();
        } else {
            $('#pnlChangeShippingStatus').hide();
            $('#btnChangeShippingStatus').show();
        }
    }

    function toggleOrderTotals(editmode) {
        if (editmode) {
            $('#trEditOrderTotals').show();
            $('#btnEditOrderTotals').hide();
            $('#btnSaveOrderTotals').show();
            $('#btnCancelOrderTotals').show();
        } else {
            $('#trEditOrderTotals').hide();
            $('#btnEditOrderTotals').show();
            $('#btnSaveOrderTotals').hide();
            $('#btnCancelOrderTotals').hide();
        }
    }


    function toggleChangeBillingAddress(editmode) {
        if (editmode) {
            $('#tdEditBillingCompany').show();
            $('#tdEditBillingFirstName').show();
            $('#tdEditBillingLastName').show();
            $('#tdEditBillingPhone').show();
            $('#tdEditBillingFax').show();
            $('#tdEditBillingEmail').show();
            $('#tdEditBillingAddress1').show();
            $('#tdEditBillingAddress2').show();
            $('#tdEditBillingDistrict').show();
            $('#tdEditBillingCity').show();
            $('#tdEditBillingStateProvince').show();
            $('#tdEditBillingCountry').show();
            $('#tdEditBillingZipCode').show();

            $('#btnEditChangeBillingAddress').hide();

            $('#btnSaveChangeBillingAddress').show();
            $('#btnCancelChangeBillingAddress').show();
            
        } else {
            $('#tdEditBillingCompany').hide();
            $('#tdEditBillingFirstName').hide();
            $('#tdEditBillingLastName').hide();
            $('#tdEditBillingPhone').hide();
            $('#tdEditBillingFax').hide();
            $('#tdEditBillingEmail').hide();
            $('#tdEditBillingAddress1').hide();
            $('#tdEditBillingAddress2').hide();
            $('#tdEditBillingDistrict').hide();
            $('#tdEditBillingCity').hide();
            $('#tdEditBillingStateProvince').hide();
            $('#tdEditBillingCountry').hide();
            $('#tdEditBillingZipCode').hide();

            $('#btnEditChangeBillingAddress').show();

            $('#btnSaveChangeBillingAddress').hide();
            $('#btnCancelChangeBillingAddress').hide();
        }
    }
    function toggleChangeShippingAddress(editmode) {
        if (editmode) {
            $('#tdEditShippingCompany').show();
            $('#tdEditShippingFirstName').show();
            $('#tdEditShippingLastName').show();
            $('#tdEditShippingPhone').show();
            $('#tdEditShippingFax').show();
            $('#tdEditShippingEmail').show();
            $('#tdEditShippingAddress1').show();
            $('#tdEditShippingAddress2').show();
            $('#tdEditShippingDistrict').show();
            $('#tdEditShippingCity').show();
            $('#tdEditShippingStateProvince').show();
            $('#tdEditShippingCountry').show();
            $('#tdEditShippingZipCode').show();

            $('#btnEditChangeShippingAddress').hide();

            $('#btnSaveChangeShippingAddress').show();
            $('#btnCancelChangeShippingAddress').show();
            
        } else {
            $('#tdEditShippingCompany').hide();
            $('#tdEditShippingFirstName').hide();
            $('#tdEditShippingLastName').hide();
            $('#tdEditShippingPhone').hide();
            $('#tdEditShippingFax').hide();
            $('#tdEditShippingEmail').hide();
            $('#tdEditShippingAddress1').hide();
            $('#tdEditShippingAddress2').hide();
            $('#tdEditShippingDistrict').hide();
            $('#tdEditShippingCity').hide();
            $('#tdEditShippingStateProvince').hide();
            $('#tdEditShippingCountry').hide();
            $('#tdEditShippingZipCode').hide();

            $('#btnEditChangeShippingAddress').show();

            $('#btnSaveChangeShippingAddress').hide();
            $('#btnCancelChangeShippingAddress').hide();
        }
    }

    function toggleOrderItemEdit(editmode, id = 0){
        if (editmode) {
            $('#pnlEditProductPrice' + id).show();
            $('#pnlEditProductQuantity' + id).show();
            $('#pnlEditProductDiscount' + id).show();

            $('#btnEditOrderItem' + id).hide();

            $('#btnSaveOrderItem' + id).show();
            $('#btnCancelOrderItem' + id).show();
        }else{
            $('#pnlEditProductPrice' + id).hide();
            $('#pnlEditProductQuantity' + id).hide();
            $('#pnlEditProductDiscount' + id).hide();

            $('#btnEditOrderItem' + id).show();

            $('#btnSaveOrderItem' + id).hide();
            $('#btnCancelOrderItem' + id).hide();
        }
    }
</script>


@endsection
