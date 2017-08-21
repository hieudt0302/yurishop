
@extends('layouts.master')
@section('title','Danh sách đơn hàng')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <label>Từ ngày</label>
            <input type="text" class="form-control" id="begin-date" name="begin_date" value=""/>
        </div>
        <div class="col-md-3">
            <label>Đến ngày</label>
            <input type="text" class="form-control" id="end-date" name="end_date" value=""/>
        </div>
        <div class="col-md-3">
            <label>Tình trạng</label>
            <select class="form-control" name="begin_date">
                <option selected="">Tất cả</option>
                <option>Chờ xử lý</option>
                <option>Hoàn thành</option>
                <option>Đã hủy</option>
            </select>
        </div>
        <div class="col-md-3">
            <button class="btn btn-primary btn-search" type="submit">Tìm kiếm</button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table id="order-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Thời gian đặt hàng</th>
                        <th>Tổng giá trị đơn hàng</th>
                        <th>Tình trạng</th>
                        <th>Tùy chọn</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>10-06-2017 10:00</td>
                        <td>{{price_format(2000000,'VNĐ')}}</td>
                        <td>Hoàn thành</td>
                        <td class="order-option">
                            <a href="" class="btn btn-default btn-xs" title="Xem chi tiết">
                                <i class="fa fa-eye"></i>Xem chi tiết
                            </a>
                            <a href="" class="btn btn-default btn-xs" data-toggle="ajaxModal" title="Hủy bỏ">
                                <i class="fa fa-ban"></i>Hủy đơn hàng
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>15-06-2017 8:00</td>
                        <td>2.300.000</td>
                        <td>Đã hủy</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>10-07-2017 10:30</td>
                        <td>3.000.000</td>
                        <td>Chờ xử lý</td>
                        <td></td>
                    </tr>
                </tbody>        
            </table>
        </div>
    </div>
</div>
<script src="{{url('/')}}/public/assets/js/jquery.dataTables.min.js"></script>
<script src="{{url('/')}}/public/assets/js/dataTables.bootstrap.min.js"></script>
<script src="{{url('/')}}/public/assets/js/bootstrap-datepicker.js"></script>
<script>
    $(document).ready(function(){
        $('#begin-date, #end-date').datepicker({
            autoclose: true,
            todayHighlight:true,
            orientation:'bottom',
        });
        $('#order-table').DataTable({ 
            "lengthChange": false,
            "filter": false
        });
    });
</script>   

@endsection


