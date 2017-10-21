@extends('layouts.admin') 
@section('title','Sản Phẩm - Admin') 
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1 class="pull-left">
    Sản Phẩm
        <small>Danh Sách</small>
    </h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Menu</a></li>
        <li class="active">Danh Sách</li>
    </ol> -->
    <div class="pull-right">
        <a href="{{('/admin/products/create')}}" class="btn bg-blue">
            <i class="fa fa-plus-square"></i>
            Thêm mới
        </a>
    </div>
</section>
<!-- Main content -->
<section class="content">
     <!-- SEARCH -->
     <div class="row">
        <div class="col-xs-12">
            <div class="box box-info">
                <div class="box-header with-border">
                <h3 class="box-title">Tìm kiếm</h3>
                </div>
                <form action="{{url('admin/products')}}" method="POST" class="form-horizontal" >
                {{ csrf_field() }}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="from_date" class="col-sm-2 control-label">From</label>
                            <div class="col-sm-4 input-group date">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                <input type="text" name="from_date" class="form-control pull-right" id="from_date" data-date-end-date="-1d">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="to_date" class="col-sm-2 control-label">To</label>
                            <div class="col-sm-4 input-group date">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                <input type="text" name="to_date" class="form-control pull-right" id="to_date" data-date-end-date="0d">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="product_name" class="col-sm-2 control-label">Tên sản phẩm</label>
                            <div class="col-sm-4">
                                <input type="text" name="product_name" class="form-control" id="product_name" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sku" class="col-sm-2 control-label">SKU</label>
                            <div class="col-sm-4">
                                <input type="email" name="sku" class="form-control" id="billing_email" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="category_id" class="col-sm-2 control-label">Danh mục</label>
                            <div class="col-sm-4">
                                <select name="category_id" class="form-control select2" style="width: 100%;">
                                    <option value="0" selected>-----Tất cả-----</option>
                                    @foreach($categories as $category)
                                       <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                             </select>
                            </div>
                        </div>
                      
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" name="show_sub_categories" id="show_sub_categories" >
                                        Bao gồm cả danh mục con
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info">
                            <i class="fa fa-search"></i> Tìm kiếm
                        </button>
                        <button type="submit" class="btn btn-default pull-right">
                            <i class="fa fa-print"></i> Xuất file
                        </button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
            <!-- /.box -->
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"></h3>Danh Sách Sản Phẩm
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Ảnh</th>
                                <th>Tên</th>
                                <th>SKU</th>
                                <th>Xuất Bản</th>
                                <th>Ngày Tạo</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>
                                   <img src="{{asset('/images/shop/previews/shop-prev-1.jpg')}}" alt="" title="">
                                </td>
                                <td><a href="{{url('/admin/products/')}}/{{$product->id}}/edit">{{$product->name}}</a></td>
                                <td>{{$product->sku}}</td>
                                <td>
                                    @if($product->published==1) 
                                    <i class="fa fa-check true-icon"></i>
                                    @else 
                                    <i class="fa fa-check false-icon"></i>
                                    @endif
                                </td>
                                <td>{{$product->created_at}}</td>
                                <td>
                                  <div class="tools">
                                   <a class="btn btn-primary btn-sm" href="{{url('/')}}/admin/products/{{$product->id}}/edit"> <i class="fa fa-edit"></i></a>
                                  </div>
                                </td>
                                <td>
                                  <div class="tools">
                                    {!! Form::open(['method' => 'DELETE','route' => ['admin.products.destroy', $product->id],'style'=>'display:inline']) !!}
                                    {{ Form::button('<i class="fa fa-trash-o"></i>', ['type' => 'submit','class' => 'btn btn-warning btn-sm'] )  }}
                                    {!! Form::close() !!}  
                                  </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Ảnh</th>
                                <th>Tên</th>
                                <th>SKU</th>
                                <th>Xuất Bản(s)</th>
                                <th>Ngày Tạo</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection 

@section('scripts')
<script>
    $(function(){
        $('#from_date, #to_date').datepicker({
            format : 'yyyy-mm-dd',
            autoclose : true,
            clearBtn : true
        })
    })
</script>
@endsection