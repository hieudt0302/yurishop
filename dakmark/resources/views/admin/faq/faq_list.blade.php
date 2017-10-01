@extends('layouts.admin')
@section('title', 'FAQs')
@section('description', 'FAQs')
@section('content')
<header class="header">
    <a href="{{ route('admin.faq.add') }}" class="btn btn-primary btn-add" title="Thêm FAQ mới">
        <i class="fa fa-plus"></i>
        Thêm FAQ mới
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
                        <th>Câu hỏi</th>
                        <th>Sắp xếp</th>
                        <th>Hiển thị</th>
                        <th class="col-options no-sort">Tùy chọn</th>
                     </tr> 
                </thead> 
                <tbody>
                    @foreach ($faqs as $faq)
                    <tr>
                        <td>{{ $faq->question }}</td>
                        <td>{{ $faq->sort_order }}</td>
                        <td>
                            <i class="fa {!! ($faq->is_show==1) ? 'fa-check' : 'fa-times' !!}"></i>
                        </td>
                        <td>
                            <a href="{{ route('admin.faq.edit',$faq->id) }}" class="btn btn-default btn-xs" title="Chỉnh sửa">
                                <i class="fa fa-pencil"></i>Sửa 
                            </a>
                            <a href="{{ route('admin.faq.delete',$faq->id) }}" class="btn btn-default btn-xs" title="Xóa" 
                               onclick="return confirm('Bạn muốn xóa FAQ này ?');">
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
