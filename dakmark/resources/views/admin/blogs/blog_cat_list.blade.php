
@extends('layouts.admin')
@section('title', 'Danh mục blog')
@section('description', 'Danh mục blog')
@section('content')
<header class="header">
    <a href="{{ route('admin.blog-cat.add') }}" class="btn btn-primary btn-add" title="Thêm danh mục mới">
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
                    @foreach ($blogCats as $bCat)
                    <tr>
                        <td>{{ $bCat->name }}</td>
                        <td>
                            <i class="fa {!! ($bCat->is_show==1) ? 'fa-check' : 'fa-times' !!}"></i>
                        </td>
                        <td>
                            <i class="fa {!! ($bCat->is_show_nav==1) ? 'fa-check' : 'fa-times' !!}"></i>
                        </td>
                        <td>{{ $bCat->sort_order }}</td>
                        <td>
                            <a href="{{ route('admin.blog-cat.edit',$bCat->id) }}" class="btn btn-default btn-xs" title="Chỉnh sửa">
                                <i class="fa fa-pencil"></i>Sửa 
                            </a>
                            @if($bCat->system_id != 'INFOCAT')
                            <a href="{{ route('admin.blog-cat.delete',$bCat->id) }}" class="btn btn-default btn-xs" title="Xóa" 
                                onclick="return confirm('Bạn muốn xóa danh mục này ?');">
                                <i class="fa fa-trash"></i>Xóa
                            </a>
                            @endif
                        </td>
                    </tr>
                   
                        @if(App\Models\BlogCat::hasChildCat($bCat->id))
                            @foreach(App\Models\BlogCat::getChildCat($bCat->id) as $childCat)
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
                                <a href="{{ route('admin.blog-cat.edit',$childCat->id) }}" class="btn btn-default btn-xs" title="Chỉnh sửa">
                                    <i class="fa fa-pencil"></i>Sửa 
                                </a>
                                @if($childCat->system_id != 'INFOCAT')
                                <a href="{{ route('admin.blog-cat.delete',$childCat->id) }}" class="btn btn-default btn-xs" title="Xóa" 
                                   onclick="return confirm('Bạn muốn xóa danh mục này ?');">
                                    <i class="fa fa-trash"></i>Xóa
                                </a>
                                @endif
                            </td>
                        </tr>
                                @if(App\Models\BlogCat::hasChildCat($childCat->id))
                                    @foreach(App\Models\BlogCat::getChildCat($childCat->id) as $childCat2){ 
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
                                    <a href="{{ route('admin.blog-cat.edit',$childCat2->id) }}" class="btn btn-default btn-xs" title="Chỉnh sửa">
                                        <i class="fa fa-pencil"></i>Sửa 
                                    </a>
                                    @if($childCat2->system_id != 'INFOCAT')
                                    <a href="{{ route('admin.blog-cat.delete',$childCat2->id) }}" class="btn btn-default btn-xs" title="Xóa" 
                                       onclick="return confirm('Bạn muốn xóa danh mục này ?');">
                                        <i class="fa fa-trash"></i>Xóa
                                    </a>
                                    @endif
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


