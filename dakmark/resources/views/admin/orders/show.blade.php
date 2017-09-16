@extends('layouts.admin') 
@section('title', 'Chi Tiết Đơn Hàng') 
@section('description', 'Đơn hàng') 
@section('pageheader', 'Người Dùng Đặt Hàng') 
@section('pagedescription', 'Chi Tiết') 
@section('breadarea','Đơn Đặt Hàng') 
@section('breaditem', 'Người Dùng') 
@section('content') 
@include('notifications.status_message') 
@include('notifications.errors_message') 
@if (session()->has('success_message'))
<div class="alert alert-success">
    {{ session()->get('success_message') }}
</div>
@endif @if (session()->has('error_message'))
<div class="alert alert-danger">
    {{ session()->get('error_message') }}
</div>
@endif
<div class="row">
    <div class="col-xs-12">
        <div class="box box-warning">
            <div class="box-header with-border">
                <h3 class="page-name">
                    <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Chi tiết Đơn hàng
                </h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
                @if($order->status===1 || $order->status=== 2)
                <div class="row">
                    <div class="col-xs-12  text-right">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-stack-overflow"></i> Lưu &amp; Thêm Vào Đơn Hàng</button>
                        <button type="submit" class="btn btn-primary order-save"><i class="fa fa-save"></i> Lưu</button>
                    </div>
                </div>
                @endif
                <hr>
                <div class="row">
                    <div class="col-xs-2">
                        <p class="text-right">Tên Khách Hàng:</p>
                    </div>
                    <div class="col-xs-5">
                        <p class="text-left">{{$order->user->last_name}} {{$order->user->first_name}}</p>
                    </div>
                    <div class="col-xs-2">
                        <p class="text-right">Điện Thoại:</p>
                    </div>
                    <div class="col-xs-3">
                        <p class="text-left">{{$order->shipphone}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-2">
                        <p class="text-right">Ngày Đặt Hàng:</p>
                    </div>
                    <div class="col-xs-5">
                        <p class="text-left">{{$order->created_at}}</p>
                    </div>
                    <div class="col-xs-2">
                        <p class="text-right">Trạng Thái:</p>
                    </div>
                    <div class="col-xs-3">
                        <p class="text-left">
                            @if($order->status===1)
                            <span>Chờ xử lý</span> @elseif($order->status===2)
                            <span>Đang xử lý</span> @elseif($order->status===3)
                            <span>Hoàn thành</span> @elseif($order->status===4)
                            <span>Hủy</span> @else
                            <span>Không xác định!</span> @endif
                        </p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-2">
                        <p class="text-right">Địa Chỉ Nhận Hàng:</p>
                    </div>
                    <div class="col-xs-5">
                        <p class="text-left">{{ $order->shipaddress }}, {{ $order->shipdistrict }}, {{ $order->shipcity }}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xs-8">
                        @foreach ($orderdetails as $key => $item)
                        <div class="row">
                            <div class="col-xs-2">
                                <a href="{{$item->product_url}}" target="_blank">
                                    <img src="{{$item->image}}" alt="{{ $item->productname }}" class="img-rounded img-inside">
                                </a>
                            </div>
                            <div class="col-xs-8">
                                <div class="row">
                                    <div class="col-xs-12 text-left">
                                        <a href="{{$item->product_url}}" target="_blank">
                                            {{ $item->productname }}
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-3 text-left">
                                        <p>Đơn Giá:</p>
                                    </div>
                                    <div class="col-xs-4 text-left">
                                        <p>{{ $item->unitprice }}</p>
                                    </div>
                                    <div class="col-xs-3">
                                        <p>Kích Cỡ:</p>
                                    </div>
                                    <div class="col-xs-1">
                                        <p>{{ $item->size }}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-3 text-left">
                                        <p>Số Lượng:</p>
                                    </div>
                                    <div class="col-xs-4 text-left">
                                        @if($order->status===1)
                                        <div class="form-group">
                                            <div class="input-group spinner">
                                                <input type="text" class="form-control quantity" data-id="{{ $item->id }}" value="{{$item->quantity}}" min="0" max="100000">
                                                <div class="input-group-btn-vertical">
                                                    <button class="btn btn-default ajust-quantity" type="button"><i class="fa fa-caret-up"></i></button>
                                                    <button class="btn btn-default ajust-quantity" type="button"><i class="fa fa-caret-down"></i></button>
                                                </div>
                                            </div>
                                            <!-- /.input group -->
                                        </div>
                                        @else
                                        <p>{{ $item->quantity }}</p>
                                        @endif
                                    </div>
                                    <div class="col-xs-3">
                                        <p>Màu Sắc:</p>
                                    </div>
                                    <div class="col-xs-1">
                                        <p>{{ $item->color }}</p>
                                    </div>
                                </div>
                            </div>
                            @if($order->status===1)
                            <div class="col-xs-2 text-left">
                                <form action="{{ url('order/itemdestroy', [$item->id]) }}" method="POST">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="submit" class="btn btn-danger btn-sm" value="Xóa">
                                </form>
                            </div>
                            @endif
                        </div>
                        <hr> @endforeach
                    </div>
                    <div class="col-xs-4">
                        <div class="row">
                            <div class="col-xs-6">
                                <p>Tổng giá hàng:</p>
                            </div>
                            <div class="col-xs-6 text-left">
                                <p>12,500,000.00 vnđ</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <p>Phí vận chuyển 1:</p>
                            </div>
                            <div class="col-xs-6 text-left">
                                @if($order->status===3 || $order->status===4)
                                <p>{{$order->freight1}}</p>
                                @else
                                <div class="form-group">
                                    <input id="freight1" type="text" class="form-control" value="{{$order->freight1}}" placeholder="0.00 vnđ">
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <p>Phí vận chuyển 2:</p>
                            </div>
                            <div class="col-xs-6 text-left">
                                @if($order->status===3 || $order->status===4)
                                <p>{{$order->freight2}}</p>
                                @else
                                <div class="form-group">
                                    <input id="freight2" type="text" class="form-control" value="{{$order->freight2}}" placeholder="0.00 vnđ">
                                </div>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <p>Phí dịch vụ:</p>
                            </div>
                            <div class="col-xs-6 text-left">
                                @if($order->status===3 || $order->status===4)
                                <p>{{$order->service}}</p>
                                @else
                                <div class="form-group">
                                    <input id="service" type="text" class="form-control" value="{{$order->service}}" placeholder="0.00 vnđ">
                                </div>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xs-6">
                                <p>Tổng đơn hàng:</p>
                            </div>
                            <div class="col-xs-6 text-left">
                                <p>25,000,000.00 vnđ</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <p>Đặt cọc:</p>
                            </div>
                            <div class="col-xs-6 text-left">
                                @if($order->status===3 || $order->status===4)
                                <p>{{$order->deposit}}</p>
                                @else
                                <div class="form-group">
                                    <input id="deposit" type="text" class="form-control" value="{{$order->deposit}}" placeholder="0.00 vnđ">
                                </div>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-xs-6">
                                <p>Còn lại:</p>
                            </div>
                            <div class="col-xs-6 text-left">
                                <p>10,000,000 vnđ</p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label>Ghi chú của khách hàng</label>
                            <textarea class="form-control" rows="4" placeholder="I want to..." disabled></textarea>
                        </div>
                        <div class="form-group">
                            <label>Phản hồi của khách hàng</label>
                            <textarea class="form-control" rows="4" placeholder="I would to like..." disabled></textarea>
                        </div>
                        @if($order->status===1 || $order->status===2)
                        <div class="form-inline text-right">
                            <form action="{{ url('/admin/orders/send/ordershop') }}/{{$order->id}}" method="POST" class="form-group">
                                {!! method_field('patch') !!} {!! csrf_field() !!}
                                <input type="hidden" name="freight1">
                                <input type="hidden" name="freight2">
                                <input type="hidden" name="service">
                                <input type="hidden" name="deposit">
                                <button class="btn-lg btn-primary" type="submit" disabled>
                                    <i class="fa fa-save"></i> Lưu &amp; Thêm Vào Đơn Đặt Hàng
                                </button>
                            </form>
                            <form action="{{ url('/admin/orders') }}/{{$order->id}}" method="POST" class="form-group">
                                {!! method_field('patch') !!} {!! csrf_field() !!}
                                <input type="hidden" name="freight1" >
                                <input type="hidden" name="freight2" >
                                <input type="hidden" name="service">
                                <input type="hidden" name="deposit">
                                <button class="btn-lg btn-primary" type="submit" disabled>
                                    <i class="fa fa-save"></i> Lưu
                                </button>
                            </form>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection @section('scripts')

<!-- bootstrap datepicker -->
<script src="{{url('/')}}/public/assets/js/datepicker/bootstrap-datepicker.min.js"></script>

<!-- DataTables -->
<script src="{{url('/')}}/public/assets/js/datatables/jquery.dataTables.min.js"></script>
<script src="{{url('/')}}/public/assets/js/datatables/dataTables.bootstrap.min.js"></script>


<script>
    $(document).ready(function() {
        $('#fromDate, #toDate').datepicker({
            autoclose: true,
            todayHighlight: true,
            orientation: 'bottom',
            format: 'yyyy-mm-dd',
        });

        $("#dasboard").removeClass("active");
        $("#order").addClass("active");
        $("#user").removeClass("active");
        $("#setting").removeClass("active");

        /* Ajust Quantity of item */
        $('.spinner .btn:first-of-type').on('click', function() {
            var btn = $(this);
            var input = btn.closest('.spinner').find('input');
            if (input.attr('max') == undefined || parseInt(input.val()) < parseInt(input.attr('max'))) {
                input.val(parseInt(input.val(), 10) + 1);
                //update quantity
                var id = input.attr('data-id');
                $.ajax({
                    type: "PATCH",
                    url: '{{ url("/admin/orders/ajust/quantity/item") }}' + '/' + id,
                    data: {
                        'quantity': input.val(),
                    },
                    success: function(data) {
                        location.reload();
                    },
                    error: function(textStatus, errorThrown) {
                        location.reload();
                    }
                });
                //end update input
            } else {
                btn.next("disabled", true);
            }
        });

        $('.spinner .btn:last-of-type').on('click', function() {
            var btn = $(this);
            var input = btn.closest('.spinner').find('input');
            if (input.attr('min') == undefined || parseInt(input.val()) > parseInt(input.attr('min'))) {
                input.val(parseInt(input.val(), 10) - 1);
                //update quantity
                var id = input.attr('data-id');
                $.ajax({
                    type: "PATCH",
                    url: '{{ url("/admin/orders/ajust/quantity/item") }}' + '/' + id,
                    data: {
                        'quantity': input.val(),
                    },
                    success: function(data) {
                        location.reload();
                    },
                    error: function(textStatus, errorThrown) {
                        location.reload();
                    }
                });
                //end update input
            } else {
                btn.prev("disabled", true);
            }
        });

        $('.quantity').focusout('input', function() {
            var id = $(this).attr('data-id')
            $.ajax({
                type: "PATCH",
                url: '{{ url("/admin/orders/ajust/quantity/item") }}' + '/' + id,
                data: {
                    'quantity': this.value,
                },
                success: function(data) {
                    location.reload();
                },
                error: function(textStatus, errorThrown) {
                    location.reload();
                }
            });
        });

        $('#freight1').on('input', function() {
            var freight1 = this.value;
            $('form input[name=freight1]').val(freight1);

            var freight2 = $('#freight2').val();
            var service = $('#service').val();
            var deposit = $('#deposit').val();

            $('form input[name=freight2]').val(freight2);
            $('form input[name=service]').val(service);
            $('form input[name=deposit]').val(deposit);

            $('form button').prop('disabled', false);
        });

        $('#freight2').on('input', function() {
            var freight2 = this.value;
            $('form input[name=freight2]').val(freight2);

            var freight1 = $('#freight1').val();
            var service = $('#service').val();
            var deposit = $('#deposit').val();

            $('form input[name=freight1]').val(freight1);
            $('form input[name=service]').val(service);
            $('form input[name=deposit]').val(deposit);

            $('form button').prop('disabled', false);
        });

        $('#service').on('input', function() {
            var service = this.value;
            $('form input[name=service]').val(service);

            var freight1 = $('#freight1').val();
            var freight2 = $('#freight2').val();
            var deposit = $('#deposit').val();

            $('form input[name=freight1]').val(freight1);
            $('form input[name=freight2]').val(freight2);
            $('form input[name=deposit]').val(deposit);

            $('form button').prop('disabled', false);
        });

        $('#deposit').on('input', function() {
            var deposit = this.value;
            $('form input[name=deposit]').val(deposit);

            var freight1 = $('#freight1').val();
            var freight2 = $('#freight2').val();
            var service = $('#service').val();

            $('form input[name=freight1]').val(freight1);
            $('form input[name=freight2]').val(freight2);
            $('form input[name=service]').val(deposit);

            $('form button').prop('disabled', false);
        });
    });
</script>
@endsection