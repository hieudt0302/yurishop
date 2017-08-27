
@extends('layouts.admin')
@section('title', 'Danh mục sản phẩm')
@section('description', 'Danh mục sản phẩm')
@section('content')
<header class="header">
    <a href="{{ route('admin.product-cat.add') }}" class="btn btn-primary btn-add" title="Thêm danh mục mới">
        <i class="fa fa-plus"></i>
        Thêm danh mục mới
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
                        <th>Tên danh mục</th>
                        <th>Hiển thị</th>
                        <th>Hiển thị trên menu</th>
                        <th>Sắp xếp</th>
                        <th>Tùy chọn</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productCats as $pCat)
                    <tr>
                        <td>{{ $pCat->name }}</td>
                        <td>
                            <i class="fa {!! ($pCat->is_show==1) ? 'fa-check' : 'fa-times' !!}"></i>
                        </td>
                        <td>
                            <i class="fa {!! ($pCat->is_show_nav==1) ? 'fa-check' : 'fa-times' !!}"></i>
                        </td>
                        <td>{{ $pCat->sort_order }}</td>
                        <td>
                            <a href="{{ route('admin.product-cat.edit',$pCat->id) }}" class="btn btn-default btn-xs" title="Chỉnh sửa">
                                <i class="fa fa-pencil"></i>Sửa 
                            </a>
                            <a href="{{ route('admin.product-cat.delete',$pCat->id) }}" class="btn btn-default btn-xs" title="Xóa" 
                                onclick="return confirm('Bạn muốn xóa danh mục này ?');">
                                <i class="fa fa-trash"></i>Xóa
                            </a>
                        </td>
                    </tr>
                   
                        @if(App\Models\ProductCat::hasChildCat($pCat->id))
                            @foreach(App\Models\ProductCat::getChildCat($pCat->id) as $childCat)
                        <tr>
                            <td>
                                <i class="fa fa-minus-square-o"></i>
                                {{ $childCat->name }}
                            </td>
                            <td>
                                <i class="fa {!! ($childCat->is_show==1) ? 'fa-check' : 'fa-times' !!}"></i>
                            </td>
                             <td>
                                <i class="fa {!! ($childCat->is_show_nav==1) ? 'fa-check' : 'fa-times' !!}"></i>
                            </td>
                            <td>{{ $childCat->sort_order }}</td>
                            <td>
                                <a href="{{ route('admin.product-cat.edit',$childCat->id) }}" class="btn btn-default btn-xs" title="Chỉnh sửa">
                                    <i class="fa fa-pencil"></i>Sửa 
                                </a>
                                <a href="{{ route('admin.product-cat.delete',$childCat->id) }}" class="btn btn-default btn-xs" title="Xóa" 
                                   onclick="return confirm('Bạn muốn xóa danh mục này ?');">
                                    <i class="fa fa-trash"></i>Xóa
                                </a>
                            </td>
                        </tr>
                                @if(App\Models\ProductCat::hasChildCat($childCat->id))
                                    @foreach(App\Models\ProductCat::getChildCat($childCat->id) as $childCat2){ 
                            <tr>
                                <td>
                                    <i class="fa fa-minus-square-o"></i>
                                    {{ $childCat2->name }}
                                </td>
                                <td>
                                    <i class="fa {!! ($childCat2->is_show==1) ? 'fa-check' : 'fa-times' !!}"></i>
                                </td>
                                <td>
                                    <i class="fa {!! ($childCat2->is_show_nav==1) ? 'fa-check' : 'fa-times' !!}"></i>
                                </td>
                                <td>{{ $childCat2->sort_order }}</td>
                                <td>
                                    <a href="{{ route('admin.product-cat.edit',$childCat2->id) }}" class="btn btn-default btn-xs" title="Chỉnh sửa">
                                        <i class="fa fa-pencil"></i>Sửa 
                                    </a>
                                    <a href="{{ route('admin.product-cat.delete',$childCat2->id) }}" class="btn btn-default btn-xs" title="Xóa" 
                                       onclick="return confirm('Bạn muốn xóa danh mục này ?');">
                                        <i class="fa fa-trash"></i>Xóa
                                    </a>
                                </td>
                            </tr>
                                    @endforeach
                                @endif
                            @endforeach
                        @endif
                        
                    @endforeach
                </tbody>        
            </table>
        </div>
    </div>
</div>

@endsection


