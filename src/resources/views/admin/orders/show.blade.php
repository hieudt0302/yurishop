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
                                                            <input  id="OrderShippingPrice" name="order_shipping_price" type="text" value="0.00"  class="form-control" style="display: block;">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label"  title="">Order Tax</label>
                                                    <div class="col-md-4">
                                                        <div class="input-group bootstrap-touchspin">
                                                            <input  id="OrderTax" name="order_tax" type="text" value="0.00" class="form-control" style="display: block;">
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
                                            <label class="col-md-3 control-label" for="shipping_status" title="">Shipping status</label>
                                            <div class="col-md-9">
                                                <div class="form-text-row">{{__('status.shipping.'.$order->shipping_status)}}</div>
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
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="billing_address" title="">Billing address</label>
                                        <div class="col-md-9">
                                            <img alt="google maps" src="data:image/gif;base64,R0lGODlhEAAQANUAAAATVm+s78cjAE+tVaq2wldzvBxase3/9gAlvS23QNPZ+QsWpMLO/gdj6HyPx3qk1r/e8MTb4ygmi84UGSQ6sUy0O////6/S+hUqqiZbyykwdOX2/UZ0ygQ2sd0YEomP2RUfgG+a6Rc7k8wuIk21UgAilvf//80qABxJsM3c88H1/xMxxSAuxUJu2//1/2KEqd3r/xY/v9waAGWF2NIoDzFguBMsoNYgL4GZ3zE3sdDl/9slGg4qy+n//zy1RNEQByH5BAAHAP8ALAAAAAAQABAAAAaXwAapMqgMjb6KMuHzNSzQqFQ6elp6MFyBsurUAhDo6XlQcVaw3pUh0kB/1plILU1FoLQnTqQwTaVjFiEULn9ScBY1BoZSHk8ZKIxRN08tJX5QJgcROjopFgJPDwgOB1EMORgUHxY7TxssCwyYUDogBBYTVjASCx8bFgcHFwC4eRYmJhsFEjYrMTwoL8CuklM7Tdna2z4yQQA7">
                                            <a href="http://maps.google.com/maps?f=q&amp;hl=en&amp;ie=UTF8&amp;oe=UTF8&amp;geocode=&amp;q={{$order->billingaddress->address1}}+{{$order->billingaddress->district}}+{{$order->billingaddress->city}}+{{$order->billingaddress->country}}" style="margin-bottom: 10px;" target="_blank">View address on Google Maps</a>
                                            <table class="table table-hover table-bordered" style="max-width: 400px;">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            Full name
                                                        </td>
                                                        <td>
                                                            {{$order->billingaddress->last_name}} {{$order->billingaddress->first_name}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Email
                                                        </td>
                                                        <td>
                                                            {{$order->billingaddress->email}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Phone
                                                        </td>
                                                        <td>
                                                            {{$order->billingaddress->phone}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Fax
                                                        </td>
                                                        <td>
                                                            {{$order->billingaddress->fax}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Company
                                                        </td>
                                                        <td>
                                                            {{$order->billingaddress->company}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Address 1
                                                        </td>
                                                        <td>
                                                            {{$order->billingaddress->address1}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Address 2
                                                        </td>
                                                        <td>
                                                            {{$order->billingaddress->address2}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            City
                                                        </td>
                                                        <td>
                                                            {{$order->billingaddress->city}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            State / province
                                                        </td>
                                                        <td>
                                                            {{$order->billingaddress->state_province}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Zip / postal code
                                                        </td>
                                                        <td>
                                                            {{$order->billingaddress->zipcode}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Country
                                                        </td>
                                                        <td>
                                                            {{$order->billingaddress->country}}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-9 col-md-offset-3">
                                            <a href="{{url('/admin/addresses/edit')}}/{{$order->billingaddress->id}}" class="btn btn-primary">Edit</a>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- SHIPPING ADDRESS TAB -->
                        <div class="tab-pane" id="shipping_address">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label" for="billing_address" title="">Shipping address</label>
                                        <div class="col-md-9">
                                            <img alt="google maps" src="data:image/gif;base64,R0lGODlhEAAQANUAAAATVm+s78cjAE+tVaq2wldzvBxase3/9gAlvS23QNPZ+QsWpMLO/gdj6HyPx3qk1r/e8MTb4ygmi84UGSQ6sUy0O////6/S+hUqqiZbyykwdOX2/UZ0ygQ2sd0YEomP2RUfgG+a6Rc7k8wuIk21UgAilvf//80qABxJsM3c88H1/xMxxSAuxUJu2//1/2KEqd3r/xY/v9waAGWF2NIoDzFguBMsoNYgL4GZ3zE3sdDl/9slGg4qy+n//zy1RNEQByH5BAAHAP8ALAAAAAAQABAAAAaXwAapMqgMjb6KMuHzNSzQqFQ6elp6MFyBsurUAhDo6XlQcVaw3pUh0kB/1plILU1FoLQnTqQwTaVjFiEULn9ScBY1BoZSHk8ZKIxRN08tJX5QJgcROjopFgJPDwgOB1EMORgUHxY7TxssCwyYUDogBBYTVjASCx8bFgcHFwC4eRYmJhsFEjYrMTwoL8CuklM7Tdna2z4yQQA7">
                                            <a href="http://maps.google.com/maps?f=q&amp;hl=en&amp;ie=UTF8&amp;oe=UTF8&amp;geocode=&amp;q={{$order->shippingaddress->address1}}+{{$order->shippingaddress->district}}+{{$order->shippingaddress->city}}+{{$order->shippingaddress->country}}" style="margin-bottom: 10px;" target="_blank">View address on Google Maps</a>
                                            <table class="table table-hover table-bordered" style="max-width: 400px;">
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            Full name
                                                        </td>
                                                        <td>
                                                            {{$order->shippingaddress->last_name}} {{$order->shippingaddress->first_name}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Email
                                                        </td>
                                                        <td>
                                                            {{$order->shippingaddress->email}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Phone
                                                        </td>
                                                        <td>
                                                            {{$order->shippingaddress->phone}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Fax
                                                        </td>
                                                        <td>
                                                            {{$order->shippingaddress->fax}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Company
                                                        </td>
                                                        <td>
                                                            {{$order->shippingaddress->company}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Address 1
                                                        </td>
                                                        <td>
                                                            {{$order->shippingaddress->address1}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Address 2
                                                        </td>
                                                        <td>
                                                            {{$order->shippingaddress->address2}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            City
                                                        </td>
                                                        <td>
                                                            {{$order->shippingaddress->city}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            State / province
                                                        </td>
                                                        <td>
                                                            {{$order->shippingaddress->state_province}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Zip / postal code
                                                        </td>
                                                        <td>
                                                            {{$order->shippingaddress->zipcode}}
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Country
                                                        </td>
                                                        <td>
                                                            {{$order->shippingaddress->country}}
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-9 col-md-offset-3">
                                            <a href="{{url('/admin/addresses/edit')}}/{{$order->shippingaddress->id}}" class="btn btn-primary">Edit</a>
                                        </div>
                                    </div>
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
                                                    <tr>
                                                        <td >
                                                            @if(strlen($order->GetMediaByOrderAsc->source??'')> 0)
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
                                                            <div id="pnlEditPvPrice4" style="display: none;">
                                                                <div class="form-group">
                                                                    <div class="col-md-8 col-md-offset-2">
                                                                        <input id="price"  name="price" type="text" value="{{$detail->price}}" class="form-control input-sm">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td style="width: 10%;">
                                                            <div>{{$detail->quantity}}</div>
                                                            <div id="pnlEditPvQuantity4" >
                                                                <div class="form-group">
                                                                    <div class="col-md-8 col-md-offset-2">
                                                                        <input id="quantity"  name="quantity" type="text" value="{{$detail->quantity}}" class="form-control input-sm">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td style="width: 15%;">
                                                            <div>{{$detail->discount}}</div>
                                                            <div id="pnlEditPvDiscount4" style="display: none;">
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
                                                            <button type="submit" class="btn btn-default" name="btnEditOrderItem4" onclick="toggleOrderItemEdit(true);return false;" id="btnEditOrderItem4}">
                                                                <i class="fa fa-pencil"></i>
                                                                Edit
                                                            </button>
                                                            
                                                            <button type="button" class="btn btn-default" name="" id="btnSaveOrderItem4" style="display:none;">
                                                                <i class="fa fa-floppy-o"></i>
                                                                Save
                                                            </button>
                                                        
                                                            <button type="submit" class="btn btn-default" name="btnCancelOrderItem4" onclick="toggleOrderItemEdit(false);return false;" id="btnCancelOrderItem4" style="display:none;">
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
        toggleOrderTotals(false);
        toggleCC(false);
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

    
</script>
<script>
    $(function(){
       $('#cancelorder').attr("data-toggle", "modal").attr("data-target", "#cancelorder-action-confirmation");

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

    });
</script>


<script type="text/javascript">
    function toggleOrderItemEdit4(editMode) {
        if (editMode) {
            $('#pnlEditPvUnitPrice4').show();
            $('#pnlEditPvQuantity4').show();
            $('#pnlEditPvDiscount4').show();
            $('#pnlEditPvPrice4').show();
            $('#btnEditOrderItem4').hide();
            $('#btnDeleteOrderItem4').hide();
            $('#btnSaveOrderItem4').show();
            $('#btnCancelOrderItem4').show();
        } else {
            $('#pnlEditPvUnitPrice4').hide();
            $('#pnlEditPvQuantity4').hide();
            $('#pnlEditPvDiscount4').hide();
            $('#pnlEditPvPrice4').hide();
            $('#btnEditOrderItem4').show();
            $('#btnDeleteOrderItem4').show();
            $('#btnSaveOrderItem4').hide();
            $('#btnCancelOrderItem4').hide();
        }
    }
</script>

<script>
    $(document).ready(function() {
        $('#btnDeleteOrderItem4').attr("data-toggle", "modal").attr("data-target", "#btnDeleteOrderItem4-action-confirmation");
        $('#btnDeleteOrderItem4-action-confirmation-submit-button').attr("name", $("#btnDeleteOrderItem4").attr("name"));
        $("#btnDeleteOrderItem4").attr("name", "")
        if ($("#btnDeleteOrderItem4").attr("type") == "submit") $("#btnDeleteOrderItem4").attr("type", "button")

        $('#btnSaveOrderItem4').attr("data-toggle", "modal").attr("data-target", "#btnSaveOrderItem4-action-confirmation");
        $('#btnSaveOrderItem4-action-confirmation-submit-button').attr("name", $("#btnSaveOrderItem4").attr("name"));
        $("#btnSaveOrderItem4").attr("name", "")
        if ($("#btnSaveOrderItem4").attr("type") == "submit") $("#btnSaveOrderItem4").attr("type", "button")
    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#AddOrderNoteHasDownload").change(toggleAddOrderNoteHasDownload);
        toggleAddOrderNoteHasDownload();
    });

    function toggleAddOrderNoteHasDownload() {
        if ($('#AddOrderNoteHasDownload').is(':checked')) {
            $('#pnlAddOrderNoteDownloadId').show();
        } else {
            $('#pnlAddOrderNoteDownloadId').hide();
        }
    }
</script>
@endsection
