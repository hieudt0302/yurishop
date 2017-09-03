@extends('layouts.admin')
@section('title', 'Slider')
@section('description', 'Slider')
@section('content')
<header class="header">
    <a href="{{ route('admin.slider.add') }}" class="btn btn-primary btn-add" title="Thêm slider mới">
        <i class="fa fa-plus"></i>
        Thêm slider mới
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
                        <th>Hình đại diện</th>
                        <th>Tiêu đề</th>
                        <th>Sắp xếp</th>
                        <th>Hiển thị</th>
                        <th class="col-options no-sort">Tùy chọn</th>
                     </tr> 
                </thead> 
                <tbody>
                    @foreach ($sliders as $s)
                    <tr>
                        <td style="width:20%">
                            <img class="img-thumb" src="{{ asset('public/assets/img/slider/' . $s->image) }}" />
                        </td>
                        <td>{{ $s->title }}</td>
                        <td>{{ $s->sort_order }}</td>
                        <td>
                            <i class="fa {!! ($s->is_show==1) ? 'fa-check' : 'fa-times' !!}"></i>
                        </td>
                        <td>
                            <a href="{{ route('admin.slider.edit',$s->id) }}" class="btn btn-default btn-xs" title="Chỉnh sửa">
                                <i class="fa fa-pencil"></i>Sửa 
                            </a>
                            <a href="{{ route('admin.slider.delete',$s->id) }}" class="btn btn-default btn-xs" title="Xóa" 
                               onclick="return confirm('Bạn muốn xóa slider này ?');">
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
