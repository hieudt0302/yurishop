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
                        <li class="{{$tab==1?'active':''}}"><a href="#info" data-toggle="tab">Chung</a></li>
                        <li class="{{$tab==2?'active':''}}"><a href="#billing_address" data-toggle="tab">Địa Chỉ Thanh Toán</a></li>
                        <li class="{{$tab==3?'active':''}}"><a href="#shipping_address" data-toggle="tab">Địa Chỉ Vận Chuyển</a></li>
                        <li class="{{$tab==4?'active':''}}"><a href="#products" data-toggle="tab">Sản  Phẩm</a></li>
                        <li class="{{$tab==5?'active':''}}"><a href="#order_notes" data-toggle="tab">Theo Dõi</a></li>
                    </ul>
                    <div class="tab-content">
                        <!-- INFO TAB -->
                        <div class="{{$tab==1?'active':''}}  tab-pane" id="info">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="OrderStatus" title="">Đơn Hàng:</label>
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
                                                        @if($order->order_status!==4)
                                                            <button type="button" name="" id="cancelorder" class="btn bg-red" style="margin-right: 3px;" data-toggle="modal" data-target="#cancelorder-action-confirmation">
                                                                Hủy Đơn Hàng
                                                            </button>
                                                            <button type="submit" name="btnChangeOrderStatus" onclick="toggleChangeOrderStatus(true);return false;" id="btnChangeOrderStatus" class="btn btn-primary" style="display: inline-block;">
                                                            Đổi Trạng Thái
                                                            </button>
                                                        @endif
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
                                                                Lưu
                                                                </button>
                                                                <button type="button" onclick="toggleChangeOrderStatus(false);return false;" id="btnCancelOrderStatus" class="btn bg-teal" style="margin-left: 3px">
                                                                Hủy
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3  control-label" for="CustomOrderNumber" title="">Mã Đơn Hàng</label>
                                            <div class="col-md-9">
                                                <div class="form-text-row">#{{$order->order_no}}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="CustomerId" title="">Tên Khách Hàng</label>
                                            <div class="col-md-9">
                                                <div class="form-text-row">
                                                    <a href="#">{{$order->billingaddress->last_name??''}} {{$order->billingaddress->first_name??''}}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="customer_email" title="">Email Khách Hàng</label>
                                            <div class="col-md-9">
                                                <div class="form-text-row">{{$order->billingaddress->email??''}}</div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="customer_phone" title="">Điện Thoại Khách Hàng</label>
                                            <div class="col-md-9">
                                                <div class="form-text-row">{{$order->billingaddress->phone??''}}</div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Tổng Tiền Sản Phẩm</label>
                                            <div class="col-md-7">
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <div class="form-text-row">
                                                            {{FormatPrice::price($order->orderdetails->sum('total'))}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3  control-label">Phí Vận Chuyển</label>
                                            <div class="col-md-7">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <div class="form-text-row">
                                                        {{FormatPrice::price($order->order_shipping_price)}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="Tax" title="">Thuế</label>
                                            <div class="col-md-9">
                                                <div class="form-text-row">{{FormatPrice::price($order->order_tax)}}</div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="">
                                                <div class="label-wrapper">
                                                
                                                <label class="col-md-3 control-label" for="OrderTotal" title="">Tổng Tiền Đơn Hàng</label>
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-text-row">{{FormatPrice::price($order->order_total)}}</div>
                                            </div>
                                        </div>
                                        <hr>
                                        <form action="{{url('admin/orders')}}/{{$order->id}}/update/fee" method="POST">
                                        {{ csrf_field()}}
                                            <div id="trEditOrderTotals" style="display: none;">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" title="">Phí Vận Chuyển</label>
                                                    <div class="col-md-4">
                                                        <div class="input-group bootstrap-touchspin">
                                                            <input  id="OrderShippingPrice" name="order_shipping_price" type="text" value="0.00"  class="form-control" style="display: block;" value="{{$order->order_shipping_price}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"  title="">Thuế</label>
                                                    <div class="col-md-4">
                                                        <div class="input-group bootstrap-touchspin">
                                                            <input  id="OrderTax" name="order_tax" type="text" value="0.00" class="form-control" style="display: block;" value="{{$order->order_tax}}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-9 col-md-offset-3">
                                                    @if($order->order_status!==4)
                                                    <button type="button" name="btnEditOrderTotals" onclick="toggleOrderTotals(true);return false;" id="btnEditOrderTotals" class="btn btn-primary">
                                                    Cập Nhật Phí/Thuế
                                                    </button>
                                                    @endif
                                                    <button type="submit" name="" id="btnSaveOrderTotals" class="btn btn-primary" style="display: none;">
                                                        Lưu
                                                    </button>
                                                    <button type="button" name="btnCancelOrderTotals" onclick="toggleOrderTotals(false);return false;" id="btnCancelOrderTotals" class="btn bg-teal" style="display: none;">
                                                    Hủy
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                        
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="form-group">
                                                <label class="col-md-3 control-label" for="payment_status" title="">Thanh Toán</label>
                                            <div class="col-md-9">
                                                <div class="form-text-row">{{__('status.payment.'.$order->payment_status)}}</div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-9 col-md-offset-3">
                                                <div class="input-group input-group-short">
                                                    <div class="input-group-btn">
                                                        @if($order->order_status!==4)
                                                        <button type="submit" name="btnChangePaymentStatus" onclick="toggleChangePaymentStatus(true);return false;" id="btnChangePaymentStatus" class="btn btn-primary" style="display: inline-block;">
                                                        Đổi Trạng Thái
                                                        </button>
                                                        @endif
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
                                                                Lưu
                                                                </button>
                                                                <button type="button" onclick="toggleChangePaymentStatus(false);return false;" id="btnCancelPaymentStatus" class="btn bg-teal" style="margin-left: 3px">
                                                                Hủy
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="shipping_status" title="">Vận Chuyển</label>
                                            <div class="col-md-9">
                                                <div class="form-text-row">{{__('status.shipping.'.$order->shipping_status)}}</div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-9 col-md-offset-3">
                                                <div class="input-group input-group-short">
                                                    <div class="input-group-btn">
                                                        @if($order->order_status!==4)
                                                        <button type="submit" name="btnChangeShippingStatus" onclick="toggleChangeShippingStatus(true);return false;" id="btnChangeShippingStatus" class="btn btn-primary" style="display: inline-block;">
                                                        Đổi Trạng Thái
                                                        </button>
                                                        @endif
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
                                                                Lưu
                                                                </button>
                                                                <button type="button" onclick="toggleChangeShippingStatus(false);return false;" id="btnCancelShippingStatus" class="btn bg-teal" style="margin-left: 3px">
                                                                Hủy
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
                        <div class="{{$tab==2?'active':''}} tab-pane" id="billing_address">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <form action="{{url('admin/orders')}}/{{$order->id}}/update/billingaddress" method="POST">
                                            {{ csrf_field()}}
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="billing_address" title="">Địa chỉ thanh toán</label>
                                                <div class="col-md-9">
                                                    <img alt="google maps" src="data:image/gif;base64,R0lGODlhEAAQANUAAAATVm+s78cjAE+tVaq2wldzvBxase3/9gAlvS23QNPZ+QsWpMLO/gdj6HyPx3qk1r/e8MTb4ygmi84UGSQ6sUy0O////6/S+hUqqiZbyykwdOX2/UZ0ygQ2sd0YEomP2RUfgG+a6Rc7k8wuIk21UgAilvf//80qABxJsM3c88H1/xMxxSAuxUJu2//1/2KEqd3r/xY/v9waAGWF2NIoDzFguBMsoNYgL4GZ3zE3sdDl/9slGg4qy+n//zy1RNEQByH5BAAHAP8ALAAAAAAQABAAAAaXwAapMqgMjb6KMuHzNSzQqFQ6elp6MFyBsurUAhDo6XlQcVaw3pUh0kB/1plILU1FoLQnTqQwTaVjFiEULn9ScBY1BoZSHk8ZKIxRN08tJX5QJgcROjopFgJPDwgOB1EMORgUHxY7TxssCwyYUDogBBYTVjASCx8bFgcHFwC4eRYmJhsFEjYrMTwoL8CuklM7Tdna2z4yQQA7">
                                                    <a href="http://maps.google.com/maps?f=q&amp;hl=en&amp;ie=UTF8&amp;oe=UTF8&amp;geocode=&amp;q={{$order->billingaddress->address1??''}}+{{$order->billingaddress->district??''}}+{{$order->billingaddress->city??''}}+{{$order->billingaddress->country??''}}" style="margin-bottom: 10px;" target="_blank">View address on Google Maps</a>
                                                    <table class="table table-hover table-bordered" style="max-width: 600px;">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    Tên
                                                                </td>
                                                                <td>
                                                                    {{$order->billingaddress->first_name??''}}
                                                                </td>
                                                                <td id="tdEditBillingFirstName" style="display:none;">
                                                                    <input type="text" name="first_name" value="{{$order->billingaddress->first_name??''}}">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Họ
                                                                </td>
                                                                <td>
                                                                    {{$order->billingaddress->last_name??''}}
                                                                </td>
                                                                <td id="tdEditBillingLastName" style="display:none;">
                                                                    <input type="text" name="last_name" value="{{$order->billingaddress->last_name??''}}">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Email
                                                                </td>
                                                                <td>
                                                                    {{$order->billingaddress->email??''}}
                                                                </td>
                                                                <td id="tdEditBillingEmail" style="display:none;">
                                                                    <input type="text" name="email" value="{{$order->billingaddress->email??''}}">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Điện Thoại
                                                                </td>
                                                                <td>
                                                                    {{$order->billingaddress->phone??''}}
                                                                </td>
                                                                <td id="tdEditBillingPhone" style="display:none;">
                                                                    <input type="text" name="phone" value="{{$order->billingaddress->phone??''}}">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Fax
                                                                </td>
                                                                <td>
                                                                    {{$order->billingaddress->fax??''}}
                                                                </td>
                                                                <td id="tdEditBillingFax" style="display:none;">
                                                                    <input type="text" name="fax" value="{{$order->billingaddress->fax??''}}">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Công Ty
                                                                </td>
                                                                <td>
                                                                    {{$order->billingaddress->company??''}}
                                                                </td>
                                                                <td id="tdEditBillingCompany" style="display:none;">
                                                                    <input type="text" name="company" value="{{$order->billingaddress->company??''}}">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Địa Chỉ 1
                                                                </td>
                                                                <td>
                                                                    {{$order->billingaddress->address1??''}}
                                                                </td>
                                                                <td id="tdEditBillingAddress1" style="display:none;">
                                                                    <input type="text" name="address1" value="{{$order->billingaddress->address1??''}}">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Địa Chỉ 2
                                                                </td>
                                                                <td>
                                                                    {{$order->billingaddress->address2??''}}
                                                                </td>
                                                                <td id="tdEditBillingAddress2" style="display:none;">
                                                                    <input type="text" name="address2" value="{{$order->billingaddress->address2??''}}">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Quận/Huyện
                                                                </td>
                                                                <td>
                                                                    {{$order->billingaddress->district??''}}
                                                                </td>
                                                                <td id="tdEditBillingDistrict" style="display:none;">
                                                                    <input type="text" name="district" value="{{$order->billingaddress->district??''}}">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Tỉnh/Thành Phố
                                                                </td>
                                                                <td>
                                                                    {{$order->billingaddress->city??''}}
                                                                </td>
                                                                <td id="tdEditBillingCity" style="display:none;">
                                                                    <input type="text" name="city" value="{{$order->billingaddress->city??''}}">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    State / Province (Tùy chọn)
                                                                </td>
                                                                <td>
                                                                    {{$order->billingaddress->state_province??''}}
                                                                </td>
                                                                <td id="tdEditBillingStateProvince" style="display:none;">
                                                                    <input type="text" name="state_province" value="{{$order->billingaddress->state_province??''}}">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Zip / postal code
                                                                </td>
                                                                <td>
                                                                    {{$order->billingaddress->zipcode??''}}
                                                                </td>
                                                                <td id="tdEditBillingZipCode" style="display:none;">
                                                                    <input type="text" name="zipcode" value="{{$order->billingaddress->zipcode??''}}">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Quốc Gia
                                                                </td>
                                                                <td>
                                                                    {{$order->billingaddress->country??''}}
                                                                </td>
                                                                <td id="tdEditBillingCountry" style="display:none;">
                                                                    <input type="text" name="country" value="{{$order->billingaddress->country??''}}">
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
                                                           @if($order->order_status!==4)
                                                            <button type="button" id="btnEditChangeBillingAddress" onclick="toggleChangeBillingAddress(true);return false;" class="btn btn-primary">
                                                            Cập Nhật
                                                            </button>
                                                            @endif
                                                            <button type="submit" id="btnSaveChangeBillingAddress" class="btn btn-primary" style="margin-left: 3px; display: none;">
                                                            Lưu
                                                            </button>
                                                            <button type="button" id="btnCancelChangeBillingAddress" onclick="toggleChangeBillingAddress(false);return false;"  class="btn bg-teal" style="margin-left: 3px; display: none;">
                                                            Hủy
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
                        <div class="{{$tab==3?'active':''}} tab-pane" id="shipping_address">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <form action="{{url('admin/orders')}}/{{$order->id}}/update/shippingaddress" method="POST">
                                            {{ csrf_field()}}
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="shipping_address" title="">Shipping address</label>
                                                <div class="col-md-9">
                                                    <img alt="google maps" src="data:image/gif;base64,R0lGODlhEAAQANUAAAATVm+s78cjAE+tVaq2wldzvBxase3/9gAlvS23QNPZ+QsWpMLO/gdj6HyPx3qk1r/e8MTb4ygmi84UGSQ6sUy0O////6/S+hUqqiZbyykwdOX2/UZ0ygQ2sd0YEomP2RUfgG+a6Rc7k8wuIk21UgAilvf//80qABxJsM3c88H1/xMxxSAuxUJu2//1/2KEqd3r/xY/v9waAGWF2NIoDzFguBMsoNYgL4GZ3zE3sdDl/9slGg4qy+n//zy1RNEQByH5BAAHAP8ALAAAAAAQABAAAAaXwAapMqgMjb6KMuHzNSzQqFQ6elp6MFyBsurUAhDo6XlQcVaw3pUh0kB/1plILU1FoLQnTqQwTaVjFiEULn9ScBY1BoZSHk8ZKIxRN08tJX5QJgcROjopFgJPDwgOB1EMORgUHxY7TxssCwyYUDogBBYTVjASCx8bFgcHFwC4eRYmJhsFEjYrMTwoL8CuklM7Tdna2z4yQQA7">
                                                    <a href="http://maps.google.com/maps?f=q&amp;hl=en&amp;ie=UTF8&amp;oe=UTF8&amp;geocode=&amp;q={{$order->shippingaddress->address1??''}}+{{$order->shippingaddress->district??''}}+{{$order->shippingaddress->city??''}}+{{$order->shippingaddress->country??''}}" style="margin-bottom: 10px;" target="_blank">View address on Google Maps</a>
                                                    <table class="table table-hover table-bordered" style="max-width: 600px;">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    Tên
                                                                </td>
                                                                <td>
                                                                    {{$order->shippingaddress->first_name??''}}
                                                                </td>
                                                                <td id="tdEditShippingFirstName" style="display:none;">
                                                                    <input type="text" name="first_name" value="{{$order->shippingaddress->first_name??''}}">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Họ
                                                                </td>
                                                                <td>
                                                                    {{$order->shippingaddress->last_name??''}}
                                                                </td>
                                                                <td id="tdEditShippingLastName" style="display:none;">
                                                                    <input type="text" name="last_name" value="{{$order->shippingaddress->last_name??''}}">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Email
                                                                </td>
                                                                <td>
                                                                    {{$order->shippingaddress->email??''}}
                                                                </td>
                                                                <td id="tdEditShippingEmail" style="display:none;">
                                                                    <input type="text" name="email" value="{{$order->shippingaddress->email??''}}">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Điện Thoại
                                                                </td>
                                                                <td>
                                                                    {{$order->shippingaddress->phone??''}}
                                                                </td>
                                                                <td id="tdEditShippingPhone" style="display:none;">
                                                                    <input type="text" name="phone" value="{{$order->shippingaddress->phone??''}}">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Fax
                                                                </td>
                                                                <td>
                                                                    {{$order->shippingaddress->fax??''}}
                                                                </td>
                                                                <td id="tdEditShippingFax" style="display:none;">
                                                                    <input type="text" name="fax" value="{{$order->shippingaddress->fax??''}}">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Công Ty
                                                                </td>
                                                                <td>
                                                                    {{$order->shippingaddress->company??''}}
                                                                </td>
                                                                <td id="tdEditShippingCompany" style="display:none;">
                                                                    <input type="text" name="company" value="{{$order->shippingaddress->company??''}}">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Địa Chỉ 1
                                                                </td>
                                                                <td>
                                                                    {{$order->shippingaddress->address1??''}}
                                                                </td>
                                                                <td id="tdEditShippingAddress1" style="display:none;">
                                                                    <input type="text" name="address1" value="{{$order->shippingaddress->address1??''}}">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Địa Chỉ 2
                                                                </td>
                                                                <td>
                                                                    {{$order->shippingaddress->address2??''}}
                                                                </td>
                                                                <td id="tdEditShippingAddress2" style="display:none;">
                                                                    <input type="text" name="address2" value="{{$order->shippingaddress->address2??''}}">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Quận/Huyện
                                                                </td>
                                                                <td>
                                                                    {{$order->shippingaddress->district??''}}
                                                                </td>
                                                                <td id="tdEditShippingDistrict" style="display:none;">
                                                                    <input type="text" name="district" value="{{$order->shippingaddress->district??''}}">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Tỉnh/Thành Phố
                                                                </td>
                                                                <td>
                                                                    {{$order->shippingaddress->city??''}}
                                                                </td>
                                                                <td id="tdEditShippingCity" style="display:none;">
                                                                    <input type="text" name="city" value="{{$order->shippingaddress->city??''}}">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    State / Province (Tùy chọn)
                                                                </td>
                                                                <td>
                                                                    {{$order->shippingaddress->state_province??''}}
                                                                </td>
                                                                <td id="tdEditShippingStateProvince" style="display:none;">
                                                                    <input type="text" name="state_province" value="{{$order->shippingaddress->state_province??''}}">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Zip / postal code
                                                                </td>
                                                                <td>
                                                                    {{$order->shippingaddress->zipcode??''}}
                                                                </td>
                                                                <td id="tdEditShippingZipCode" style="display:none;">
                                                                    <input type="text" name="zipcode" value="{{$order->shippingaddress->zipcode??''}}">
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>
                                                                    Quốc Gia
                                                                </td>
                                                                <td>
                                                                    {{$order->shippingaddress->country??''}}
                                                                </td>
                                                                <td id="tdEditShippingCountry" style="display:none;">
                                                                    <input type="text" name="country" value="{{$order->shippingaddress->country??''}}">
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
                                                             @if($order->order_status!==4)
                                                            <button type="button" id="btnEditChangeShippingAddress" onclick="toggleChangeShippingAddress(true);return false;" class="btn btn-primary">
                                                            Cập Nhật
                                                            </button>
                                                            @endif
                                                            <button type="submit" id="btnSaveChangeShippingAddress" class="btn btn-primary" style="margin-left: 3px; display: none;">
                                                            Lưu
                                                            </button>
                                                            <button type="button" id="btnCancelChangeShippingAddress" onclick="toggleChangeShippingAddress(false);return false;"  class="btn bg-teal" style="margin-left: 3px; display: none;">
                                                            Hủy
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
                        <div class="{{$tab==4?'active':''}} tab-pane" id="products">
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
                                                        <!-- <th>
                                                            Picture
                                                        </th> -->
                                                        <th>
                                                            Tên Sản Phẩm
                                                        </th>
                                                        <th>
                                                            Giá Tiền
                                                        </th>
                                                        <th>
                                                            Số Lượng
                                                        </th>
                                                        <th>
                                                            Giảm Giá
                                                        </th>
                                                        <th>
                                                            Tổng
                                                        </th>
                                                        <th>
                                                            Cập Nhật
                                                        </th>
                                                        <th>
                                                            Loại Bỏ
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($order->orderdetails as $detail)
                                                    @if(empty($detail->product))
                                                    @continue
                                                    @endif
                                                    <form action="{{url('admin/orders')}}/{{$order->id}}/details/update" method="post">
                                                    {{ csrf_field()}}
                                                        <input type="hidden" name="order_detail_id" value="{{$detail->id}}">
                                                        <tr>
                                                            <td style="text-align: left; width: 15%;">
                                                                <em>
                                                                    <a href="{{url('/admin/products')}}/{{$detail->product->slug}}">{{$detail->product->name}}</a>
                                                                </em>
                                                                <p>
                                                                    <strong>SKU</strong><text>:</text> {{$detail->product->sku}}
                                                                </p>
                                                            </td>
                                                            <td style="width: 15%;">
                                                                <div>{{FormatPrice::price($detail->price)}}</div>
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
                                                                <div>{{FormatPrice::price($detail->discount)}}</div>
                                                                <div id="pnlEditProductDiscount{{$detail->id}}" style="display: none;">
                                                                    <div class="form-group">
                                                                        <div class="col-md-8 col-md-offset-2">
                                                                            <input id="discount"   name="discount" type="text" value="{{$detail->discount}}"class="form-control input-sm">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td style="width: 15%;">
                                                                {{FormatPrice::price($detail->total)}}
                                                            </td>
                                                            <td style="width: 15%;">
                                                                @if($order->order_status!==4)
                                                                <button id="btnEditOrderItem{{$detail->id}}" type="button" class="btn btn-primary"  onclick="toggleOrderItemEdit(true, {{$detail->id}});return false;">
                                                                    <i class="fa fa-pencil"></i>
                                                                    Cập Nhật
                                                                </button>
                                                                @endif
                                                                <button id="btnSaveOrderItem{{$detail->id}}" type="submit" class="btn btn-primary" style="display:none; width:80px;">
                                                                    <i class="fa fa-floppy-o"></i>
                                                                    Lưu
                                                                </button>
                                                            
                                                                <button id="btnCancelOrderItem{{$detail->id}}" type="button" class="btn btn-teal" onclick="toggleOrderItemEdit(false, {{$detail->id}});return false;"  style="display:none; width:80px; margin-top:4px;">
                                                                    <i class="fa fa-close"></i>
                                                                    Hủy
                                                                </button>
                                                            </td>
                                                            <td style="width: 15%;">
                                                                <a type="button" class="btn btn-danger" data-detail-id="{{$detail->id}}" data-toggle="modal" data-target="#modal-delete-detail">
                                                                <i class="fa fa-trash"></i>
                                                                </a> 
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
                        <div class="tab-pane {{$tab==5?'active':''}} " id="order_notes">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div id="ordernotes-grid" data-role="grid" class="k-grid k-widget">
                                            <table role="grid">
                                                <colgroup>
                                                    <col style="width:60px">
                                                    <col style="width:200px">
                                                    <col style="width:400px">
                                                    <col style="width:100px">
                                                </colgroup>
                                                <thead>
                                                    <tr role="row">
                                                        <th>No.</th>
                                                        <th >Ngày Tạo</th>
                                                        <th >Nội Dung</th>
                                                        <th >Xóa</th>
                                                    </tr>
                                                </thead>
                                                <tbody role="rowgroup">
                                                    @foreach($order->ordernotes as $key =>$note)
                                                    <tr >
                                                        <td >{{$key}}</td>
                                                        <td >{{$note->created_at}}</td>
                                                        <td >{{$note->note}}</td>
                                                        <td ><a href="#"><span ></span>Xóa</a></td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <div ><a href="#" title="Refresh"><span >Làm Mới</span></a></div>
                                        </div>

                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    
                                    <div class="panel-heading">
                                        Thêm Nội Dung
                                    </div>
                                    <div class="panel-body">
                                        <form action="{{url('admin/orders/')}}/{{$order->id}}/notes/create" method="POST" class="form-horizontal">
                                         {{ csrf_field() }}
                                         <input type="hidden" name="order_id" value="{{$order->id}}">
                                            <div class="form-group">
                                                <div class="col-md-3">
                                                    <div ><label class="col-md-3 control-label" title="">Nội Dung</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-9">
                                                    <textarea class="form-control" cols="20" id="order_note" name="order_note" rows="4"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-9 col-md-offset-3">
                                                    <button type="submit" class="btn btn-primary">Thêm</button>
                                                </div>
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
    </div>
</section>

<!-- MODEL AREA -->
<!-- QUESTION TO CANCEL ORDER STATUS -->
<div id="cancelorder-action-confirmation" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="cancelorder-action-confirmation-title" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="cancelorder-action-confirmation-title">Cảnh báo!</h4>
            </div>
            <div class="modal-body">
                Bạn có chắc chắn muốn hủy đơn hàng này không?
            </div>
            <div class="modal-footer">
                <form action="{{url('/admin/orders')}}/{{$order->id}}/cancel/orderstatus" method="POST">
                    {{ csrf_field()}}
                    <button type="submit" class="btn btn-danger pull-right">Hủy Đơn Hàng </button>
                </form>
                <span class="btn btn-default pull-right margin-r-5" data-dismiss="modal">Không, Đừng Hủy</span>
            </div>
        </div>
    </div>
</div>

<!-- QUESTION TO DELETE -->
<div class="modal modal-danger fade" id="modal-delete-detail">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Cảnh Báo</h4>
        </div>
        <div class="modal-body">
            <p>Bạn có muốn xóa sản phẩm này không?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Đóng</button>
            <form name="form-detail-delete"  method="POST">
                {!! csrf_field() !!}
                <input type="hidden" name="_method" value="DELETE">
                <input type="submit" class="btn btn-outline" value="Xóa Sản Phẩm">
            </form>
        </div>
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
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
       $('#modal-delete-detail').on('show.bs.modal', function (e) {
            var detailID = $(e.relatedTarget).data('detail-id');
            var action = "{{url('admin/orders')}}/"+'{{$order->id}}/details/' + detailID;
            $(e.currentTarget).find('form[name="form-detail-delete"]').attr("action", action);
        })  
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
