@extends('layouts.admin') @section('title', 'Chi Tiết - Đơn Hàng Cửa Hàng') @section('description', 'This is a blank description
that needs to be implemented') @section('pageheader', 'Đặt Hàng Theo Cửa Hàng') @section('pagedescription', 'Chi Tiết') @section('breadarea',
'Đơn Đặt Hàng') @section('breaditem', 'Cửa Hàng') @section('content')

<div class="row">
    <div class="col-xs-12">
        <div class="box box-info">
            <div class="box-header with-border">
                <i class="fa fa-list-ol"></i>
                <h3 class="box-title">Chi Tiết Đơn Hàng</h3>
                
                <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-save"></i> Lưu Thay Đổi</button>
                <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
                          <i class="fa fa-print"></i> Export
                </button>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
                <div class="row">
                    <div class="col-xs-2">
                        <p class="text-right">Tên Cửa Hàng:</p>
                    </div>
                    <div class="col-xs-5">
                        <p class="text-left">{{$ordershop->shop->name}}</p>
                    </div>
                    <div class="col-xs-2">
                        <p class="text-right">Mã Vận Đơn:</p>
                    </div>
                    <div class="col-xs-3">
                        <div class="form-group">
                            <input type="text" class="form-control" value="{{$ordershop->landingcode}}" placeholder="Mã vận đơn">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-2">
                        <p class="text-right">Ngày Đặt Hàng:</p>
                    </div>
                    <div class="col-xs-5">
                        <p class="text-left">{{$ordershop->orderdate}}</p>
                    </div>
                    <div class="col-xs-2">
                        <p class="text-right">Trạng Thái:</p>
                    </div>
                    <div class="col-xs-3">
                        <div class="form-group">
                            {!! Form::select('status', array(1 => 'Chờ
                            xử lý', 2 => 'Đang xử lý', 3 => 'Hoàn Thành', 4 => 'Hủy'), 0, array('name' => 'status','type'=>'text',
                            'class'=>'form-control')) !!}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-2">
                        <p class="text-right">Ngày Nhận Hàng:</p>
                    </div>
                    <div class="col-xs-5">
                        <p class="text-left">{{$ordershop->shippeddate}}</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xs-8">
                        @foreach($orderdetails as $key => $item)
                        <div class="row">
                            <div class="col-xs-3">
                                <!-- <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNWRlNTI1Y2Y5NiB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1ZGU1MjVjZjk2Ij48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ0LjA1NDY4NzUiIHk9Ijc0LjUiPjE0MHgxNDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4="
                                    alt="default" class="img-rounded img-inside"> -->
                                <a href="{{$item->url}}" target="_blank"><img src="{{$item->image}}"
                                    alt="default" class="img-rounded img-inside">
                                </a>
                            </div>
                            <div class="col-xs-7">
                                <div class="row">
                                    <div class="col-xs-12 text-left">
                                        <a href="{{$item->url}}" target="_blank">
                                            <p>{{$item->productname}}</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-3 text-left">
                                        <p>Đơn Giá:</p>
                                    </div>
                                    <div class="col-xs-4 text-left">
                                        <p>{{$item->unitprice}}</p>
                                    </div>
                                    <div class="col-xs-3">
                                        <p>Kích Cỡ:</p>
                                    </div>
                                    <div class="col-xs-1">
                                        <p>{{$item->size}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-3 text-left">
                                        <p>Số Lượng:</p>
                                    </div>
                                    <div class="col-xs-4 text-left">
                                        <p>{{$item->quantity}}</p>
                                    </div>
                                    <div class="col-xs-3">
                                        <p>Màu Sắc:</p>
                                    </div>
                                    <div class="col-xs-1">
                                        <p>{{$item->color}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-3 text-left">
                                        <p>Đơn hàng:</p>
                                    </div>
                                    <div class="col-xs-4 text-left">
                                        <a href="{{ route('admin.orders.show', $item->order->id) }}" target="_blank">
                                            <p>{{$item->order->user->last_name}} {{$item->order->user->first_name}}</p>
                                        </a>
                                    </div>
                                    <div class="col-xs-3">
                                        <p>Đủ hàng:</p>
                                    </div>
                                    <div class="col-xs-1">
                                        <div class="form-group">
                                            <label>
                                                <input type="checkbox" class="flat-red" checked>
                                                50/50
                                            </label>
            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-2 text-left">
                                <button type="button" class="btn btn-danger" title="Xóa sản phẩm này khỏi đơn hàng!">
                                    <i class="fa fa-ban"></i>
                                </button>
                            </div>
                        </div>
                        @endforeach
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
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="0.00 vnđ">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6">
                                <p>Phí vận chuyển 2:</p>
                            </div>
                            <div class="col-xs-6 text-left">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="0.00 vnđ">
                                </div>
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
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
                            <label>Ghi chú</label>
                            <textarea class="form-control" rows="4"  placeholder="This is important package...">{{$ordershop->note}}</textarea>
                        </div>
                        <button type="button" class="btn btn-primary pull-left" style="margin-right: 5px;">
                          <i class="fa fa-print"></i> Export
                        </button>
                       
                        <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
                          <i class="fa fa-save"></i> Lưu Thay Đổi
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

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