 @extends('layouts.admin') 
 @section('title', 'Đơn Hàng Người Dùng') @section('description', 'This is a blank description
that needs to be implemented') @section('pageheader', 'Người Dùng Đặt Hàng') @section('pagedescription', 'Danh sách') @section('breadarea',
'Đơn Đặt Hàng') @section('breaditem', 'Người Dùng') @section('content')

<div class="row">
    <div class="col-xs-12">
        <!-- .box -->
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Bộ Lọc</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    {!! Form::open(array('route' => 'admin.orders.find','method'=>'POST', 'class'=>'')) !!}
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="customer">Khách Hàng</label> {!! Form::text('customer', null, array('class' => 'form-control',
                            'id'=>'customer')) !!}
                        </div>
                    </div>
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="fromDate">Từ Ngày</label> {!! Form::text('fromDate', null, array('class' => 'form-control',
                            'id'=>'fromDate')) !!}
                        </div>
                    </div>
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="toDate">Đến Ngày</label> {!! Form::text('toDate', null, array('class' => 'form-control',
                            'id'=>'toDate')) !!}
                        </div>
                    </div>
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="status">Trạng Thái</label> {!! Form::select('status', array(0=>'Tất Cả', 1 => 'Chờ
                            xử lý', 2 => 'Đang xử lý', 3 => 'Hoàn Thành', 4 => 'Hủy'), 0, array('name' => 'status','type'=>'text',
                            'class'=>'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-4" style="display: inline-block;vertical-align: middle;float: none;">
                        <button type="submit" class="btn btn-info">Tìm Kiếm</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Đơn Hàng</h3>
            </div>
            <!-- <div class="row">
                {!! Form::open(array('route' => 'front.orders.find','method'=>'POST', 'class'=>'form-inline')) !!}
              <div class="form-group">
                    <label for="fromDate">Từ Ngày</label> {!! Form::text('fromDate', null, array('class' => 'form-control',
                    'id'=>'fromDate')) !!}
                </div>
                <span style="margin-left:20px"></span>
                <div class="form-group">
                    <label for="toDate">Đến Ngày</label> {!! Form::text('toDate', null, array('class' => 'form-control',
                    'id'=>'toDate')) !!}
                </div>
                <span style="margin-left:20px"></span>
                <div class="form-group">
                    <label for="status">Trạng Thái</label> {!! Form::select('status', array(0=>'Tất Cả', 1 => 'Chờ xử lý',
                    2 => 'Đang xử lý', 3 => 'Hoàn Thành', 4 => 'Hủy'), 0, array('name' => 'status','type'=>'text', 'class'=>'form-control'))
                    !!}
                </div>
                <span style="margin-left:20px"></span>
                <button type="submit" class="btn btn-info">Tìm Kiếm</button> 
                {!! Form::close() !!} 
            </div> -->
            <div class="box-body">
                <table id="order-table" class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Khách Hàng</th>
                            <th>Thời Gian Đặt Hàng</th>
                            <th>Tổng Giá Đơn Hàng</th>
                            <th>Trạng Thái</th>
                            <th>Tùy chọn</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $key => $order)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>
                                {{ $order->user->last_name }} {{ $order->user->first_name }}
                            </td>
                            <td>{{ $order->created_at }}</td>
                            <td>{{ $order->totalamount }} Tệ</td>
                            <td>
                                @if($order->status===1)
                                <span>Chờ xử lý</span> @elseif($order->status===2)
                                <span>Đang xử lý</span> @elseif($order->status===3)
                                <span>Hoàn thành</span> @elseif($order->status===4)
                                <span>Hủy</span> @else
                                <span>Không xác định!</span> @endif
                            </td>
                            <td class="order-option">
                                <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-info btn-xs" title="Xem chi tiết">
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
                @if(!empty($fromDate) || !empty($toDate) || !empty($status)) {!! $orders->appends(['from' => $fromDate ])->appends(['to'
                => $toDate ])->appends(['status' => $status])->render() !!} @else {!! $orders->render() !!} @endif
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
    $(document).ready(function () {
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
    });
</script>
@endsection