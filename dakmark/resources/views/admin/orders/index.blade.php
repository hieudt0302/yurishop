 @extends('layouts.admin') @section('title', 'Đơn Hàng Người Dùng') @section('description', 'This is a blank description
that needs to be implemented') @section('pageheader', 'Người Dùng Đặt Hàng') @section('pagedescription', 'Danh sách') @section('breadarea',
'Đơn Đặt Hàng') @section('breaditem', 'Người Dùng') @section('content')

@include('notifications.status_message') 
@include('notifications.errors_message')
           
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
                    <div class="col-xs-3">
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
                    <div class="col-xs-2">
                        <div class="form-group">
                            <label for="status">Tìm Kiếm</label>
                            <button type="submit" class="btn btn-info form-control">
                                <span class="fa fa-search"></span> 
                            </button>
                        </div>
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
                                <span class="label label-primary">Chờ xử lý</span>
                                @elseif($order->status===2)
                                <span class="label label-warning">Đang làm việc</span>
                                @elseif($order->status===3)
                                <span class="label label-success">Đã giao hàng</span>
                                @elseif($order->status===4)
                                <span class="label label-danger">Hủy</span>
                                @else
                                <span>Không xác định!</span> 
                                @endif
                            </td>
                            <td class="order-option">
                                <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-info" title="Xem chi tiết">
                                <i class="fa fa-eye"></i> Xem chi tiết
                                </a>                               
                                 @if($order->status===1)
                                    <a type="button" class="btn btn-danger" data-order-id="{{$order->id}}" data-toggle="modal" data-target="#modal-delete-order">
                                    Hủy đơn hàng
                                    </a> 
                                @endif
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

<div class="modal modal-danger fade" id="modal-delete-order">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Cảnh Báo</h4>
            </div>
            <div class="modal-body">
                <p>Bạn có muốn hủy đơn đặt hàng này không?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Đóng</button>
                <form name="form-order-delete" method="post">
                    {!! csrf_field() !!}
                    <!-- <input type="hidden" name="_method" value="DELETE"> -->
                    <input type="submit" class="btn btn-outline" value="Hủy Đơn Hàng">
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

@endsection @section('scripts')
<!-- bootstrap datepicker -->
<script src="{{url('/')}}/public/assets/js/datepicker/bootstrap-datepicker.min.js"></script>

<!-- DataTables -->
<script src="{{url('/')}}/public/assets/js/datatables/jquery.dataTables.min.js"></script>
<script src="{{url('/')}}/public/assets/js/datatables/dataTables.bootstrap.min.js"></script>

<!-- FastClick -->
<!-- <script src="{{url('/')}}/public/assets/js/fastclick/fastclick.js"></script> -->

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

 
       
        $('#modal-delete-order').on('shown.bs.modal', function (e) {
            var orderID = $(e.relatedTarget).data('order-id');
            var action = "{{url('admin/orders')}}/" + orderID;
            $(e.currentTarget).find('form[name="form-order-delete"]').attr("action", action);
        })
        
    });
</script>
@endsection