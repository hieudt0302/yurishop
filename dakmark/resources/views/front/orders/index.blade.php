 @extends('layouts.master') @section('title','Danh sách đơn hàng') @section('content')
<br>
<div class="container">
    <div class="row">
        <h3 class="page-name">
            <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
            Danh Sách Đơn Hàng
        </h3>
        @include('notifications.status_message') 
        @include('notifications.errors_message')
    </div>
    <div class="row">
        {!! Form::open(array('route' => 'front.orders.find','method'=>'POST', 'class'=>'form-inline')) !!}
        <div class="form-group">
            <label for="fromDate">Từ Ngày</label> {!! Form::text('fromDate', null, array('class' => 'form-control', 'id'=>'fromDate'))
            !!}
        </div>
        <span style="margin-left:20px"></span>
        <div class="form-group">
            <label for="toDate">Đến Ngày</label> {!! Form::text('toDate', null, array('class' => 'form-control', 'id'=>'toDate'))
            !!}
        </div>
        <span style="margin-left:20px"></span>
        <div class="form-group">
            <label for="status">Trạng Thái</label> 
            {!! Form::select('status', 
                            array(0=>'Tất Cả', 1 => 'Chờ xử lý', 2 => 'Đangxử lý', 3 => 'Hoàn Thành',  4 => 'Hủy'), 
                            0, 
                            array('name' => 'status','type'=>'text', 'class'=>'form-control'))
            !!}
        </div>
        <span style="margin-left:20px"></span>
        <button type="submit" class="btn btn-info">Tìm Kiếm</button> {!! Form::close() !!}
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <table id="order-table" class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Thời gian đặt hàng</th>
                        <th>Tổng giá trị đơn hàng</th>
                        <th>Tình trạng</th>
                        <th>Tùy chọn</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $key => $order)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>{!! price_format($order->totalamount, 'VNĐ') !!}</td>
                        <td>
                            @if($order->status===1)
                            <span>Chờ xử lý</span> @elseif($order->status===2)
                            <span>Đang xử lý</span> @elseif($order->status===3)
                            <span>Hoàn thành</span> @elseif($order->status===4)
                            <span>Hủy</span> @else
                            <span>Không xác định!</span> @endif
                        </td>
                        <td class="order-option">
                            <a href="{{ route('front.orders.show', $order->id) }}" class="btn btn-info btn-xs" title="Xem chi tiết">
                                <i class="fa fa-eye"></i> Xem chi tiết
                        </a> @if($order->status===1)
                            <a href="" class="btn btn-danger btn-xs" data-toggle="ajaxModal" title="Hủy bỏ">
                                <i class="fa fa-ban"></i> Hủy đơn hàng
                        </a> @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if(!empty($fromDate) || !empty($toDate) || !empty($status)) 
            {!! $orders->appends(['from' => $fromDate ])->appends(['to'=> $toDate ])->appends(['status' => $status])->render() !!} 
            @else {!! $orders->render() !!} @endif
        </div>
    </div>
</div>
<br>

<script src="{{url('/')}}/public/assets/js/bootstrap-datepicker.js"></script>
<script>
    $(document).ready(function () {
        $('#fromDate, #toDate').datepicker({
            autoclose: true,
            todayHighlight: true,
            orientation: 'bottom',
            format: 'yyyy-mm-dd',
        });
    });
</script>
@endsection