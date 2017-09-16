 @extends('layouts.master') @section('title','Danh sách đơn hàng') @section('content')
<br>
<div class="container">
    <div class="row">
        <h3 class="page-name">
            <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Chi tiết Đơn hàng
        </h3>
        @include('notifications.status_message') 
		@include('notifications.errors_message')
    </div>
    <hr>
    <div class="row">
        <div class="col-xs-2">
            <p class="text-right">Tên Khách Hàng:</p>
        </div>
        <div class="col-xs-5">
            <p class="text-left">{{ $order->user->last_name }} {{ $order->user->first_name }}</p>
        </div>
        <div class="col-xs-2">
            <p class="text-right">Điện Thoại:</p>
        </div>
        <div class="col-xs-3">
            <p class="text-left">{{ $order->shipphone }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-2">
            <p class="text-right">Ngày Đặt Hàng:</p>
        </div>
        <div class="col-xs-5">
            <p class="text-left">{{ $order->created_at }}</p>
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
                                <span>Không xác định!</span> 
                @endif
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
                        <img src="{{ $item->image }}" alt="default" class="img-rounded img-inside">
                    </a>
                </div>
                <div class="col-xs-8">
                   <div class="row">
                        <div class="col-xs-4 text-left">
                            <a href="{{$item->product_url}}" target="_blank">
                                {{ $item->productname }}
                            </a>
                        </div>
                        <div class="col-xs-4 text-left">
                            <p>Đơn Giá</p>
                            <p>{!! price_format($item->unitprice, 'VNĐ') !!}</p>
                        </div>
                        <div class="col-xs-3 text-left">
                            <p>Số Lượng</p>
                            <p>{{ $item->quantity }}</p>
                        </div>
                    </div>
                </div>
                @if($order->status===1)
                <div class="col-xs-2 text-left">
                    <form action="{{ url('order/itemdestroy', [$item->id]) }}" method="POST" >
                            {!! csrf_field() !!}
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="submit" class="btn btn-danger btn-sm" value="Xóa">
                    </form>
                </div>
                @endif
            </div>
            @endforeach
        </div>
        <div class="col-xs-4">
            <div class="row">
                <div class="col-xs-6">
                    <p>Tổng giá sản phẩm:</p>
                </div>
                <div class="col-xs-6 text-left">
                    <p>{!! price_format($order->totalamount, 'VNĐ') !!} </p>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <p>Phí vận chuyển:</p>
                </div>
                <div class="col-xs-6 text-left">
                    <p>{!! price_format($order->ship_fee, 'VNĐ') !!} </p>
                </div>
            </div>
          
            <hr>
            <div class="row">
                <div class="col-xs-6">
                    <p>Tổng đơn hàng:</p>
                </div>
                <div class="col-xs-6 text-left">
                    <p>{!! price_format($order->getTotalOrderPrice(), 'VNĐ') !!}</p>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="bs-example bs-order-detail">
            <form class="form-horizontal">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Ghi Chú:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="request" value="{{ $order->note }}" placeholder="Nhập nội dung yêu cầu...">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10 text-right">
                        <button type="submit" class="btn btn-primary">Lưu Ghi Chú</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<br> @endsection