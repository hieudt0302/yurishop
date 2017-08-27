
@extends('layouts.admin')
@section('title', 'Sản phẩm')
@section('description', 'Sản phẩm')
@section('content')
<header class="header">
    <a href="{{ route('admin.product.add') }}" class="btn btn-primary btn-add" title="Thêm sản phẩm mới">
        <i class="fa fa-plus"></i>
        Thêm sản phẩm mới
    </a>
</header>
<div class="container">
    <div class="row">
        @include('notifications.status_message') 
        @include('notifications.errors_message')
        @if (session()->has('success_message'))
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif
        @if (session()->has('error_message'))
            <div class="alert alert-danger">
                {{ session()->get('error_message') }}
            </div>
        @endif
        <div class="col-md-12">
            <table id="order-table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Hình đại diện</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Hiển thị</th>
                        <th>Hàng hot</th>
                        <th>Hàng mới</th>
                        <th>Hàng khuyến mãi</th>
                        <th>Lượt xem</th>
                        <th>Đánh giá</th>
                        <th>Tùy chọn</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 0; ?>
                    @foreach ($products as $p)
                    <tr>
                        <td>{{ $count++ }}</td>
                        <td style="width:10%">
                            <img class="img-thumb" src="{{ asset('public/assets/img/product/' . $p->thumb) }}" />
                        </td>
                        <td>{{ $p->name }}</td>
                        <td>{{ price_format($p->default_price,'VNĐ') }}</td>
                        <td>
                            <i class="fa {!! ($p->is_show==1) ? 'fa-check' : 'fa-times' !!}"></i>
                        </td>
                        <td>
                            <i class="fa {!! ($p->is_hot==1) ? 'fa-check' : 'fa-times' !!}"></i>
                        </td>
                        <td>
                            <i class="fa {!! ($p->is_new==1) ? 'fa-check' : 'fa-times' !!}"></i>
                        </td>
                        <td>
                            <i class="fa {!! ($p->is_promote==1) ? 'fa-check' : 'fa-times' !!}"></i>
                        </td>
                        <td>{{ $p->views }}</td>
                        <td>{{ $p->rates }}</td>
                        <td>
                            <a href="{{ route('admin.product.edit',$p->id) }}" class="btn btn-default btn-xs" title="Chỉnh sửa">
                                <i class="fa fa-pencil"></i>Sửa 
                            </a>
                            <a href="{{ route('admin.product.delete',$p->id) }}" class="btn btn-default btn-xs" title="Xóa" 
                                onclick="return confirm('Bạn muốn xóa sản phẩm này ?');">
                                <i class="fa fa-trash"></i>Xóa
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>        
            </table>
        </div>
    </div>
</div>

@endsection


