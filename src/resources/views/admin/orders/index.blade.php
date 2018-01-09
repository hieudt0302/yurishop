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
                <h3 class="box-title">Tìm Nhanh</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form action="{{url('admin/orders')}}" method="POST" class="form-horizontal" >
                {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="order_start_date" class="col-sm-2 control-label">Từ Ngày</label>
                            <div class="col-sm-4 input-group date">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                <input type="text" name="order_start_date" class="form-control pull-right" id="start_datepicker" data-date-end-date="-1d" value="{{old('order_start_date')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="order_end_date" class="col-sm-2 control-label">Đến Ngày</label>
                            <div class="col-sm-4 input-group date">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                <input type="text" name="order_end_date" class="form-control pull-right" id="end_datepicker" data-date-end-date="0d" value="{{old('order_end_date')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="customer_name" class="col-sm-2 control-label">Tên Khách Hàng</label>
                            <div class="col-sm-8">
                                <input type="text" name="customer_name" class="form-control" id="customer_name" value="{{old('customer_name')}}" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="billing_email" class="col-sm-2 control-label">Email Thanh Toán</label>
                            <div class="col-sm-8">
                                <input type="email" name="billing_email" class="form-control" id="billing_email" value="{{old('billing_email')}}" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="orders_status" class="col-sm-2 control-label">Đơn Hàng</label>
                            <div class="col-sm-8">
                                <select id="orders_status" multiple name="orders_status[]" class="form-control select2" style="width: 100%;">
                                    @foreach(\Lang::get('status.order') as $key =>$value)
                                        @php($selected = false)
                                        @if (is_array(old('orders_status')))
                                            @foreach(old('orders_status') as $id)
                                                @if($id == $key)
                                                    @php($selected = true)
                                                @endif
                                            @endforeach
                                        @endif
                                        <option value="{{$key}}" {{$selected?'selected':''}}>{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="payments_status" class="col-sm-2 control-label">Thanh Toán</label>
                            <div class="col-sm-8">
                                <select id="payments_status" multiple name="payments_status[]" class="form-control select2" style="width: 100%;">
                                    @foreach(\Lang::get('status.payment') as $key =>$value)
                                        @php($selected = false)
                                        @if (is_array(old('payments_status')))
                                            @foreach(old('payments_status') as $id)
                                                @if($id == $key)
                                                    @php($selected = true)
                                                @endif
                                            @endforeach
                                        @endif
                                        <option value="{{$key}}" {{$selected?'selected':''}}>{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="shippings_status" class="col-sm-2 control-label">Vận Chuyển</label>
                            <div class="col-sm-8">
                                <select id="shippings_status" multiple name="shippings_status[]" class="form-control select2" style="width: 100%;">
                                    @foreach(\Lang::get('status.shipping') as $key =>$value)
                                        @php($selected = false)
                                        @if (is_array(old('shippings_status')))
                                            @foreach(old('shippings_status') as $id)
                                                @if($id == $key)
                                                    @php($selected = true)
                                                @endif
                                            @endforeach
                                        @endif
                                        <option value="{{$key}}" {{$selected?'selected':''}}>{{$value}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="order_no" class="col-sm-2 control-label">Mã Đơn Hàng</label>
                            <div class="col-sm-8">
                                <input type="text" name="order_no" class="form-control" id="order_no" value="{{old('order_no')}}">
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info">
                            <i class="fa fa-search"></i> Tìm Kiếm
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
                                <th>#</th>
                                <th>Mã</th>
                                <th>Đơn Hàng</th>
                                <th>Thanh Toán</th>
                                <th>Vận Chuyển</th>
                                <th>Khách Hàng</th>
                                <th>Email</th>
                                <th>Điện Thoại</th>
                                <th>Ngày Đặt</th>
                                <th>Tổng</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $key =>  $order)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td><a href="{{url('admin/orders/')}}/{{$order->id}}">#{{$order->order_no}}</a></td>
                                <td>{{__('status.order.'.$order->order_status)}}</td>
                                <td>{{__('status.payment.'.$order->payment_status)}}</td>
                                <td>{{__('status.shipping.'.$order->shipping_status)}}</td>
                                <td>{{$order->last_name}} {{$order->first_name}}</td>
                                <td>{{$order->email}}</td>
                                <td>{{$order->phone}}</td>
                                <td>{{$order->order_start_date}}</td>
                                <td>{{FormatPrice::price($order->order_total)}}</td>
                                <td>
                                    @if($order->order_status === 4 )
                                    <div class="tools">
                                    <a type="button" class="btn btn-danger" data-order-id="{{$order->id}}" data-toggle="modal" data-target="#modal-delete-order">
                                    <i class="fa fa-ban"></i>
                                    </a> 
                                  </div>
                                  @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Mã</th>
                                <th>Đơn Hàng</th>
                                <th>Thanh Toán</th>
                                <th>Vận Chuyển</th>
                                <th>Khách Hàng</th>
                                <th>Email</th>
                                <th>Điện Thoại</th>
                                <th>Ngày Đặt</th>
                                <th>Tổng</th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="box-footer clearfix">
                    {{ $orders->appends(['order_start_date' => old('order_start_date'), 'order_end_date' => old('order_end_date'), 'customer_name' => old('customer_name'), 'billing_email' => old('billing_email'), 'order_no' => old('order_no'),'orders_status' => old('orders_status'),'shippings_status' => old('shippings_status'),'payments_status' => old('payments_status')])->links('vendor.pagination.admin') }}
                </div>
            </div>
        </div>
    </div>
</section>

<!-- QUESTION TO DELETE -->
<div class="modal modal-danger fade" id="modal-delete-order">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Cảnh Báo</h4>
            </div>
            <div class="modal-body">
                <p>Bạn có muốn xóa đơn hàng này không?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Đóng</button>
                <form name="form-order-delete"  method="POST">
                    {!! csrf_field() !!}
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" class="btn btn-outline" value="Xóa Đơn Hàng">
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection 

@section('scripts') 
<script>
    $(function(){

        $('#modal-delete-order').on('show.bs.modal', function (e) {
            var orderID = $(e.relatedTarget).data('order-id');
            var action = "{{url('admin/orders')}}/" + orderID;
            $(e.currentTarget).find('form[name="form-order-delete"]').attr("action", action);
        })  

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
        $('#orders_status').select2();
        // $('#order_status').on('select2:opening select2:closing', function( event ) {
        //     var $searchfield = $(this).parent().find('.select2-search__field');
        //     $searchfield.prop('disabled', true);
        //     console.log("Selected value is: "+$("#order_status").val());
        // });

        //Select2: Payment Status
        $('#payments_status').select2();
        // $('#payment_status').on('select2:opening select2:closing', function( event ) {
        //     var $searchfield = $(this).parent().find('.select2-search__field');
        //     $searchfield.prop('disabled', true);
        // });

        //Select2: Shipping Status
        $('#shippings_status').select2();
        // $('#shipping_status').on('select2:opening select2:closing', function( event ) {
        //     var $searchfield = $(this).parent().find('.select2-search__field');
        //     $searchfield.prop('disabled', true);
        // });
    });
</script>
@endsection