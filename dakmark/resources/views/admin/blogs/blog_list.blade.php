
@extends('layouts.admin')
@section('title', 'Blog')
@section('description', 'Blog')
@section('content')
<header class="header">
    <a href="{{ route('admin.blog.add') }}" class="btn btn-primary btn-add" title="Thêm blog mới">
        <i class="fa fa-plus"></i>
        Thêm blog mới
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
                        <th>Tiêu đề</th>
                        <th>Hiển thị</th>
                        <th>Lượt xem</th>
                        <th>Tùy chọn</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $count = 0; ?>
                    @foreach ($blogs as $b)
                    <tr>
                        <td>{{ $count++ }}</td>
                        <td style="width:10%">
                            <img class="img-thumb" src="{{ asset('public/assets/img/blog/' . $b->thumb) }}" />
                        </td>
                        <td>{{ $b->title }}</td>
                        <td>
                            <i class="fa {!! ($b->is_show==1) ? 'fa-check' : 'fa-times' !!}"></i>
                        </td>
                        <td>{{ $b->views }}</td>
                        <td>
                            <a href="{{ route('admin.blog.edit',$b->id) }}" class="btn btn-default btn-xs" title="Chỉnh sửa">
                                <i class="fa fa-pencil"></i>Sửa 
                            </a>
                            <a href="{{ route('admin.blog.delete',$b->id) }}" class="btn btn-default btn-xs" title="Xóa" 
                                onclick="return confirm('Bạn muốn xóa blog này ?');">
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


