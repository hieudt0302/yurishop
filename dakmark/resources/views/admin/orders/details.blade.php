
@extends('layouts.admin')
@section('title', 'Chi tiết đơn hàng')
@section('description', 'Chi tiết đơn hàng')
@section('content')
<div id="order-detail">
    <div class="row">
        <div class="col-md-7">
            <div>
                <span class="key">Tên khách hàng</span>
                <span class="value">Donald Trump</span>
            </div>
            <div>
                <span class="key">Thời gian đặt hàng</span>
                <span class="value">06-08-2017 10:00</span>
            </div>
            <div>
                <span class="key">Địa chỉ nhận hàng</span>
                <span class="value">02 Quang Trung, Đà Nẵng</span>
            </div>
        </div>
        <div class="col-md-5">
            <label>Tình trạng</label>
            <select class="form-control option-state" name="begin_date">
                <option>Chờ xử lý</option>
                <option>Hoàn thành</option>
                <option>Đã hủy</option>
            </select>
        </div>
    </div>
    <div class="row product-wrapper">
        <div class="col-md-8 product-list">
            <div class="col-md-12 product-single">
                <div class="col-md-3">
                    <img class="img-responsive" src="{{url('/')}}/public/assets/img/sp-test-1.jpg" alt="Hình sản phẩm" />
                </div>
                <div class="col-md-9">
                    <span class="product-name">
                        Luật Egger phụ nữ CV đi lại màu thanh lịch đầm voan ren mỏng hoang dã xanh ống tay đầm miễn phí vận chuyển
                    </span>
                    <div class="col-md-6">
                        <div>
                            <span class="key2">Đơn giá</span>
                            <span class="value2">250.000 VNĐ</span>
                        </div>
                        <div>
                            <span class="key2">Số lượng</span>
                            <input type="number" name="amount" value="2" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div>
                            <span class="key2">Màu sắc</span>
                            <span class="value2">Xanh</span>
                        </div>
                        <div>
                            <span class="key2">Kích cỡ</span>
                            <span class="value2">36</span>
                        </div>
                    </div>
                    <div class="delete-product">
                        <button type="submit" class="btn-danger">Xóa sản phẩm</button>
                    </div>
                </div>   
            </div>
            <div class="col-md-12 product-single">
                <div class="col-md-3">
                    <img class="img-responsive" src="{{url('/')}}/public/assets/img/sp-test-2.jpg" alt="Hình sản phẩm" />
                </div>
                <div class="col-md-9">
                    <span class="product-name">
                        2017 mùa thu mới của nam giới thể thao thể thao giải trí phù hợp phù hợp với quần dài tay Jordan nam
                    </span>
                    <div class="col-md-6">
                        <div>
                            <span class="key2">Đơn giá</span>
                            <span class="value2">300.000 VNĐ</span>
                        </div>
                        <div>
                            <span class="key2">Số lượng</span>
                            <input type="number" name="amount" value="1" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div>
                            <span class="key2">Màu sắc</span>
                            <span class="value2">Nâu</span>
                        </div>
                        <div>
                            <span class="key2">Kích cỡ</span>
                            <span class="value2">30</span>
                        </div>
                    </div>
                    <div class="delete-product">
                        <button type="submit" class="btn-danger">Xóa sản phẩm</button>
                    </div>
                </div>   
            </div>
        </div>
        <div class="col-md-4">
            <div class="order-property">
                <span class="key3">Tổng giá trị sản phẩm</span>
                <span class="value3">550.000 VNĐ</span>
            </div>
            <div class="order-property">
                <span class="key3">Phí vận chuyển 1</span>
                <input type="text" name="ship_fee_1" value="50000">
            </div>
            <div class="order-property">
                <span class="key3">Phí vận chuyển 2</span>
                <input type="text" name="ship_fee_1" value="50000">
            </div>
            <div class="order-property">
                <span class="key3">Phí dịch vụ</span>
                <input type="text" name="service_fee" value="50000">
            </div>
            <div class="order-property amount">
                <span class="key3">Tổng giá trị đơn hàng</span>
                <span class="value3">750.000 VNĐ</span>
            </div>
            <div class="order-property">
                <span class="key3">Đặt cọc</span>
                <input type="text" name="deposit" value="100000">
            </div>
            <div class="order-property amount">
                <span class="key3">Còn lại</span>
                <span class="value3">650.000 VNĐ</span>
            </div>
        </div>
    </div>
    <div class="row feedback-wrapper">
        <label>Ý kiến phản hồi</label>
        <textarea class="ta-feedback" name="feedback"></textarea>
    </div>
    <div>
        <button class="btn btn-primary">Lưu thay đổi</button>
    </div>
</div>

@endsection


