@extends('layouts.admin')
@section('title', 'Menu')
@section('description', 'Menu')
@section('content')
<header class="header">
    <a href="{{ route('admin.navigator.add') }}" class="btn btn-primary btn-add" title="Thêm menu mới">
        <i class="fa fa-plus"></i>
        Thêm menu mới
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
                        <th>Tên</th>
                        <th>Sắp xếp</th>
                        <th>Hiển thị</th>
                        <th class="col-options no-sort">Tùy chọn</th>
                     </tr> 
                </thead> 
                <tbody>
                    @foreach ($navigators as $nav)
                    <tr>
                        <td>{{ $nav->name }}</td>
                        <td>{{ $nav->sort_order }}</td>
                        <td>
                            <i class="fa {!! ($nav->is_show==1) ? 'fa-check' : 'fa-times' !!}"></i>
                        </td>
                        <td>
                            <a href="{{ route('admin.navigator.edit',$nav->id) }}" class="btn btn-default btn-xs" title="Chỉnh sửa">
                                <i class="fa fa-pencil"></i>Sửa 
                            </a>
                            <a href="{{ route('admin.navigator.delete',$nav->id) }}" class="btn btn-default btn-xs" title="Xóa" 
                               onclick="return confirm('Bạn muốn xóa menu này ?');">
                                <i class="fa fa-trash"></i>Xóa
                            </a>
                        </td>
                    </tr>
                        @if(App\Models\Navigator::hasChildNav($nav->id))
                            @foreach(App\Models\Navigator::getChildNav($nav->id) as $childNav)
                        <tr>
                            <td><i class="fa fa-minus-square-o" style="padding-left: 7px; padding-right: 5px"></i>{{ $childNav->name }}</td>
                            <td>{{ $childNav->sort_order }}</td>
                            <td>
                                <i class="fa {!! ($childNav->is_show==1) ? 'fa-check' : 'fa-times' !!}"></i>
                            </td>
                            <td>
                                <a href="{{ route('admin.navigator.edit',$childNav->id) }}" class="btn btn-default btn-xs" title="Chỉnh sửa">
                                    <i class="fa fa-pencil"></i>Sửa 
                                </a>
                                <a href="{{ route('admin.navigator.delete',$childNav->id) }}" class="btn btn-default btn-xs" title="Xóa" 
                                   onclick="return confirm('Bạn muốn xóa menu này ?');">
                                    <i class="fa fa-trash"></i>Xóa
                                </a>
                            </td>
                        </tr>
                            @endforeach
                        @endif
                    @endforeach                  
                </tbody>
            </table>    
        </div>   
    </div>
</div>

@endsection
