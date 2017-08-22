
@extends('layouts.admin')
@section('title', 'Danh mục sản phẩm')
@section('description', 'Danh mục sản phẩm')
@section('content')
<header class="header">
    <a href="{{ route('admin.product-cat.add') }}" class="btn btn-primary btn-sm pull-right" title="Thêm danh mục mới">
        <i class="fa fa-plus"></i>
        Thêm danh mục mới
    </a>
</header>
<div class="container">
    <div class="row">
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
                                onclick="return confirm(\'Bạn muốn xóa danh mục này ?\')">
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


