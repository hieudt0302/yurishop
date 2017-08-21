@extends('layouts.admin') 
@section('title', 'Đơn Hàng Cửa Hàng') @section('description', 'This is a blank description
that needs to be implemented') 
@section('pageheader', 'Đặt Hàng Theo Cửa Hàng') 
@section('pagedescription', 'Danh sách') @section('breadarea',
'Đơn Đặt Hàng') @section('breaditem', 'Cửa Hàng') @section('content')

<div class="row">
   <div class="col-xs-12">
       <!-- .box -->
       <div class="box box-danger">
           <div class="box-header with-border">
           <i class="fa fa-shopping-bag"></i>
               <h3 class="box-title">Bộ Lọc</h3>
           </div>
           <div class="box-body">
               <div class="row">
                   {!! Form::open(array('route' => 'admin.ordershops.find','method'=>'POST', 'class'=>'form-inline')) !!}
                   <div class="col-xs-2">
                       <div class="form-group">
                           <label for="customer">Cửa Hàng</label> {!! Form::text('shop', null, array('class' => 'form-control',
                           'id'=>'shop')) !!}
                       </div>
                   </div>
                   <div class="col-xs-2">
                       <div class="form-group">
                           <label for="fromDate">Mã Vận Đơn</label> {!! Form::text('landingcode', null, array('class' => 'form-control',
                           'id'=>'landingcode')) !!}
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
           <div class="box-body">
               <table id="order-table" class="table table-bordered">
                   <thead>
                       <tr>
                           <th>#</th>
                           <th>Tên Cửa Hàng</th>
                           <th>Mã Vận Đơn</th>
                           <th>Tổng Giá Đơn Hàng</th>
                           <th>Trạng Thái</th>
                           <th>Tùy chọn</th>
                       </tr>
                   </thead>
                   <tbody>
                       @foreach ($ordershops as $key => $ordershop)
                       <tr>
                           <td>{{ ++$i }}</td>
                           <td>
                               {{ $ordershop->shop->name }}
                           </td>
                           <td>
                               {{ $ordershop->landing_code }}
                           </td>
                           <td>{{ $ordershop->totalamount }} Tệ</td>
                           <td>
                               @if($ordershop->status===1)
                               <span>Chờ xử lý</span> @elseif($ordershop->status===2)
                               <span>Đang xử lý</span> @elseif($ordershop->status===3)
                               <span>Hoàn thành</span> @elseif($ordershop->status===4)
                               <span>Hủy</span> @else
                               <span>Không xác định!</span> @endif
                           </td>
                           <td >
                               <a href="{{ route('admin.ordershops.show', $ordershop->id) }}" class="btn btn-info btn-xs" title="Xem chi tiết">
                                                           <i class="fa fa-eye"></i> Xem chi tiết
                                                   </a> @if($ordershop->status===1)
                               <a href="" class="btn btn-danger btn-xs" data-toggle="ajaxModal" title="Hủy bỏ">
                                                           <i class="fa fa-ban"></i> Hủy đơn hàng
                                                   </a> @endif
                           </td>
                       </tr>
                       @endforeach
                   </tbody>
               </table>
               @if(!empty($shop) || !empty($landingcode) || !empty($status)) 
               {!! $ordershops->appends(['shop' => $shop ])->appends(['landingcode'=> $landingcode ])->appends(['status' => $status])->render() !!} 
               @else {!! $ordershops->render() !!} @endif
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
    $("#dasboard").removeClass("active");
        $("#order").addClass("active"); 
        $("#user").removeClass("active");
        $("#setting").removeClass("active");
   });
</script>
@endsection