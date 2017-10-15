@extends('layouts.admin') 
@section('title','Đơn Hàng - Admin') 
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
    Đơn Hàng
        <small>Danh Sách</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Đơn Hàng</a></li>
        <li class="active">Danh Sách</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <!-- SEARCH -->
    <div class="row">
        <div class="col-xs-12">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                <h3 class="box-title">Quick Search</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{url('admin/orders')}}" method="POST" class="form-horizontal" >
                {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="order_start_date" class="col-sm-2 control-label">Start Date</label>
                            <div class="col-sm-4 input-group date">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                <input type="text" name="order_start_date" class="form-control pull-right" id="start_datepicker" data-date-end-date="-1d">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="order_end_date" class="col-sm-2 control-label">End Date</label>
                            <div class="col-sm-4 input-group date">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                <input type="text" name="order_end_date" class="form-control pull-right" id="end_datepicker" data-date-end-date="0d">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="customer_name" class="col-sm-2 control-label">Customer Name</label>
                            <div class="col-sm-8">
                                <input type="text" name="customer_name" class="form-control" id="customer_name" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="billing_email" class="col-sm-2 control-label">Billing Email</label>
                            <div class="col-sm-8">
                                <input type="email" name="billing_email" class="form-control" id="billing_email" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="order_status" class="col-sm-2 control-label">Order Status</label>
                            <div class="col-sm-8">
                                <select id="order_status" multiple name="order_status[]" class="form-control select2" style="width: 100%;">
                                    @foreach(\Lang::get('status.order') as $key =>$value)
                                    <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="payment_status" class="col-sm-2 control-label">Payment Status</label>
                            <div class="col-sm-8">
                                <select id="payment_status" multiple name="paymenst_status[]" class="form-control select2" style="width: 100%;">
                                    @foreach(\Lang::get('status.payment') as $key =>$value)
                                    <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="shipping_status" class="col-sm-2 control-label">Shipping Status</label>
                            <div class="col-sm-8">
                                <select id="shipping_status" multiple name="shippings_status[]" class="form-control select2" style="width: 100%;">
                                    @foreach(\Lang::get('status.shipping') as $key =>$value)
                                    <option value="{{$key}}">{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="order_no" class="col-sm-2 control-label">#Order No</label>
                            <div class="col-sm-8">
                                <input type="text" name="order_no" class="form-control" id="order_no" >
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info">
                            <i class="fa fa-search"></i> Search
                        </button>
                        <button type="submit" class="btn btn-default pull-right">
                            <i class="fa fa-print"></i> Export
                        </button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
    <!-- TABLE -->
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-danger">
                <div class="box-header">
                    <h3 class="box-title">Danh Sách Đơn Hàng</h3>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#No</th>
                                <th>Order</th>
                                <th>Payment</th>
                                <th>Shipping</th>
                                <th>Customer</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Order Date</th>
                                <th>Order Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td><a href="{{url('admin/orders/')}}/{{$order->id}}">#{{$order->order_no}}</a></td>
                                <td>{{__('status.order.'.$order->order_status)}}</td>
                                <td>{{__('status.payment.'.$order->payment_status)}}</td>
                                <td>{{__('status.shipping.'.$order->shipping_status)}}</td>
                                <td>{{$order->last_name}} {{$order->first_name}}</td>
                                <td>{{$order->email}}</td>
                                <td>{{$order->phone}}</td>
                                <td>{{$order->order_start_date}}</td>
                                <td>{{$order->order_total}}</td>
                                <td></td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#No</th>
                                <th>Order</th>
                                <th>Payment</th>
                                <th>Shipping</th>
                                <th>Customer</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Order Date</th>
                                <th>Order Total</th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection 

@section('scripts') 
<script>
    $(function(){
         //Date picker
      
        $('#start_datepicker, #end_datepicker').datepicker({
            format : 'yyyy-mm-dd',
            autoclose : true,
            clearBtn : true
        })
       

        $('#start_datepicker').datepicker().on('changeDate', function(e) {
           
        });

        $('#end_datepicker').datepicker().on('changeDate', function(e) {
          
        });

        //Select2: Order Status
        $('#order_status').select2();
        $('#order_status').on('select2:opening select2:closing', function( event ) {
            var $searchfield = $(this).parent().find('.select2-search__field');
            $searchfield.prop('disabled', true);
            console.log("Selected value is: "+$("#order_status").val());
        });

        //Select2: Payment Status
        $('#payment_status').select2();
        $('#payment_status').on('select2:opening select2:closing', function( event ) {
            var $searchfield = $(this).parent().find('.select2-search__field');
            $searchfield.prop('disabled', true);
        });

        //Select2: Shipping Status
        $('#shipping_status').select2();
        $('#shipping_status').on('select2:opening select2:closing', function( event ) {
            var $searchfield = $(this).parent().find('.select2-search__field');
            $searchfield.prop('disabled', true);
        });
    });
</script>
@endsection