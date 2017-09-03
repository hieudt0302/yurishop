
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
        <div class="col-md-12" class="search-box">
            {!! Form::open(array('route' => 'admin.product.search')) !!}
                <div class="col-md-5">
                    <span class="search-label">Tên sản phẩm</span>
                    <input type="text" name="name" class="form-control search-input" placeholder="Nhập tên sản phẩm">
                </div>
                <div class="col-md-7">
                    <span class="search-label">Danh mục</span>
                    <select name="cat_id" class="form-control search-select">
                        <option value="0" selected >Tất cả</option>
                        @foreach ($productCats as $pCat)
                        <option value="{{ $pCat->id }}">{{ $pCat->name }}</option>
                            @if(App\Models\ProductCat::hasChildCat($pCat->id))
                                @foreach(App\Models\ProductCat::getChildCat($pCat->id) as $childCat)
                            <option value="{{ $childCat->id }}">---{{ $childCat->name }}</option>
                                    @if(App\Models\ProductCat::hasChildCat($childCat->id))
                                        @foreach(App\Models\ProductCat::getChildCat($childCat->id) as $childCat2)
                                <option value="{{ $childCat2->id }}">---{{ $childCat2->name }}</option>
                                        @endforeach
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    </select>
                    <button type="submit" class="btn btn-primary search-btn">Tìm kiếm</button>
                </div>
            {!! Form::close() !!}
        </div>
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
                    <?php $count = 1; ?>
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


