 @extends('layouts.master') @section('title','Danh sách đơn hàng') @section('content')
<br>
<div class="container">
    <div class="row">
        <h1>Chi Tiết Đơn Hàng</h1>
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
                <div class="col-xs-2">
                    <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE0MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjwhLS0KU291cmNlIFVSTDogaG9sZGVyLmpzLzE0MHgxNDAKQ3JlYXRlZCB3aXRoIEhvbGRlci5qcyAyLjYuMC4KTGVhcm4gbW9yZSBhdCBodHRwOi8vaG9sZGVyanMuY29tCihjKSAyMDEyLTIwMTUgSXZhbiBNYWxvcGluc2t5IC0gaHR0cDovL2ltc2t5LmNvCi0tPjxkZWZzPjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+PCFbQ0RBVEFbI2hvbGRlcl8xNWRlNTI1Y2Y5NiB0ZXh0IHsgZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQgfSBdXT48L3N0eWxlPjwvZGVmcz48ZyBpZD0iaG9sZGVyXzE1ZGU1MjVjZjk2Ij48cmVjdCB3aWR0aD0iMTQwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjQ0LjA1NDY4NzUiIHk9Ijc0LjUiPjE0MHgxNDA8L3RleHQ+PC9nPjwvZz48L3N2Zz4="
                        alt="default" class="img-rounded img-inside">
                </div>
                <div class="col-xs-8">
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
                            <p>1</p>
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
                    <button type="button" class="btn btn-danger">Xóa</button>
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
                    <p>600,000.00 vnđ</p>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <p>Phí vận chuyển 2:</p>
                </div>
                <div class="col-xs-6 text-left">
                    <p>250,000.00 vnđ</p>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <p>Phí dịch vụ:</p>
                </div>
                <div class="col-xs-6 text-left">
                    <p>50,000 vnđ</p>
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
                    <p>5,000,00.00 vnđ</p>
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
        <div class="bs-example">
            <form class="form-horizontal">
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Nội Dung</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="request" placeholder="Nhập nội dung yêu cầu...">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10 text-right">
                        <button type="submit" class="btn btn-primary">Xác Nhận</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<br> @endsection