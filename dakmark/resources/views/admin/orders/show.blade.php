@extends('layouts.admin') @section('title', 'Chi Tiết Đơn Hàng') @section('description', 'This is a blank description that
needs to be implemented') @section('pageheader', 'Người Dùng Đặt Hàng') @section('pagedescription', 'Chi Tiết') @section('breadarea','Đơn
Đặt Hàng') @section('breaditem', 'Người Dùng') 
@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-warning">
            <div class="box-header with-border">
                <i class="fa fa-list-ol"></i>
                <h3 class="box-title">Chi Tiết Đơn Hàng</h3>
            </div>
            <!-- /.box-header -->

            <div class="box-body">
				<div class="row">
                    <div class="col-xs-12  text-right">                        
                        <button type="submit" class="btn btn-warning"><i class="fa fa-stack-overflow"></i> Lưu &amp; Thêm Vào Đơn Hàng</button>
						<button type="submit" class="btn btn-warning"><i class="fa fa-save"></i> Lưu</button>
                    </div>
                </div>
				<hr>
                <div class="row">
                    <div class="col-xs-2">
                        <p class="text-right">Tên Khách Hàng:</p>
                    </div>
                    <div class="col-xs-5">
                        <p class="text-left">Lê Minh Tuấn</p>
                    </div>
                    <div class="col-xs-2">
                        <p class="text-right">Điện Thoại:</p>
                    </div>
                    <div class="col-xs-3">
                        <p class="text-left">+84 989 183 193</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-2">
                        <p class="text-right">Ngày Đặt Hàng:</p>
                    </div>
                    <div class="col-xs-5">
                        <p class="text-left">2017-08-15</p>
                    </div>
                    <div class="col-xs-2">
                        <p class="text-right">Trạng Thái:</p>
                    </div>
                    <div class="col-xs-3">
                        <p class="text-left">Đang xử lý</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-2">
                        <p class="text-right">Địa Chỉ Nhận Hàng:</p>
                    </div>
                    <div class="col-xs-5">
                        <p class="text-left">02 Quang Trung, Thạc Thang, Hải Châu, Đà Nẵng</p>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="row">
                            <div class="col-xs-3">
                                <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNWRlNTI1Y2Y5NiB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1ZGU1MjVjZjk2Ij48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ0LjA1NDY4NzUiIHk9Ijc0LjUiPjE0MHgxNDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4="
                                    alt="default" class="img-rounded img-inside">
                            </div>
                            <div class="col-xs-7">
                                <div class="row">
                                    <div class="col-xs-12 text-left">
                                        <p>Tên Sản Phẩm</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-3 text-left">
                                        <p>Đơn Giá:</p>
                                    </div>
                                    <div class="col-xs-4 text-left">
                                        <p>12,789.,456.00 vnđ</p>
                                    </div>
                                    <div class="col-xs-3">
                                        <p>Kích Cỡ:</p>
                                    </div>
                                    <div class="col-xs-1">
                                        <p>M</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-3 text-left">
                                        <p>Số Lượng:</p>
                                    </div>
                                    <div class="col-xs-4 text-left">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="0">
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <p>Màu Sắc:</p>
                                    </div>
                                    <div class="col-xs-1">
                                        <p>Xanh</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-2 text-left">
                                <button type="button" class="btn btn-danger" title="Xóa sản phẩm này khỏi đơn hàng!">
                                    <i class="fa fa-ban"></i>
                                </button>
                            </div>
                        </div>
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
                        <div class="row">
                            <div class="col-xs-6">
                                <p>Phí dịch vụ:</p>
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
                        <div class="row">
                            <div class="col-xs-6">
                                <p>Đặt cọc:</p>
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
                        <div class="form-group text-right">
							<a class="btn-lg btn-warning"><i class="fa fa-stack-overflow"></i> Lưu &amp; Thêm Vào Đơn Hàng</a>
                            <a class="btn-lg btn-warning">
                                <i class="fa fa-save"></i> Lưu
                            </a>
                        </div>
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