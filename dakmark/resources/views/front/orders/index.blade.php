 @extends('layouts.master') @section('title','Danh sách đơn hàng') @section('content')
<br>
<div class="container">
    <div class="row">
        <h1>@lang('shoppings.order-list')</h1>
        @include('notifications.status_message') 
        @include('notifications.errors_message')
    </div>
    <div class="row">

        {!! Form::open(array('route' => 'front.orders.find','method'=>'POST', 'class'=>'form-inline')) !!}
        <div class="form-group">
            <label for="fromDate">@lang('common.from-date')</label> {!! Form::text('fromDate', null, array('class' => 'form-control', 'id'=>'fromDate'))
            !!}
        </div>
        <span style="margin-left:20px"></span>
        <div class="form-group">
            <label for="toDate">@lang('common.to-date')</label> {!! Form::text('toDate', null, array('class' => 'form-control', 'id'=>'toDate'))
            !!}
        </div>
        <span style="margin-left:20px"></span>
        <div class="form-group">
            <label for="status">@lang('common.status')</label> {!! Form::select('status', array(0=>'Tất Cả', 1 => 'Chờ xử lý', 2 => 'Đang
            xử lý', 3 => 'Hoàn Thành', 4 => 'Hủy'), 0, array('name' => 'status','type'=>'text', 'class'=>'form-control'))
            !!}
        </div>
        <span style="margin-left:20px"></span>
        <button type="submit" class="btn btn-info">@lang('common.search')</button> {!! Form::close() !!}
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <table id="order-table" class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>@lang('shoppings.order-date')</th>
                        <th>@lang('shoppings.order-total-price')</th>
                        <th>@lang('common.status')</th>
                        <th>@lang('common.note')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $key => $order)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>{{ $order->totalamount }} Tệ</td>
                        <td>
                            @if($order->status===1)
                            <span>@lang('shoppings.order-stat-wait')</span> @elseif($order->status===2)
                            <span>@lang('shoppings.order-stat-processing')</span> @elseif($order->status===3)
                            <span>@lang('shoppings.order-stat-done')</span> @elseif($order->status===4)
                            <span>@lang('shoppings.order-stat-cancel')</span> @else
                            <span>@lang('shoppings.order-stat-unclear')</span> @endif
                        </td>
                        <td class="order-option">
                            <a href="{{ route('front.orders.show', $order->id) }}" class="btn btn-info btn-xs" title="Xem chi tiết">
                                <i class="fa fa-eye"></i> @lang('common.more-details')
                        </a> @if($order->status===1)
                            <a href="" class="btn btn-danger btn-xs" data-toggle="ajaxModal" title="Hủy bỏ">
                                <i class="fa fa-ban"></i> @lang('common.cancel')
                        </a> @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if(!empty($fromDate) || !empty($toDate) || !empty($status)) {!! $orders->appends(['from' => $fromDate ])->appends(['to'
            => $toDate ])->appends(['status' => $status])->render() !!} @else {!! $orders->render() !!} @endif
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