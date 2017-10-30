@extends('layouts.admin') 
@section('title','Sản Phẩm - Admin') 
@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1 class="pull-left">
    Sản Phẩm
        <small>Danh Sách</small>
    </h1>
    <div class="pull-right">
        <a href="{{('/admin/products/create')}}" class="btn bg-blue">
            <i class="fa fa-plus-square"></i>
            Thêm mới
        </a>
    </div>
    <div class="row">
        <div class="col-xs-12">
            @include('notifications.status_message') 
            @include('notifications.errors_message') 
        </div>
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
                                <input type="text" name="from_date" class="form-control pull-right" id="from_date" data-date-end-date="-1d" value="{{old('from_date')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="to_date" class="col-sm-2 control-label">To</label>
                            <div class="col-sm-4 input-group date">
                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                <input type="text" name="to_date" class="form-control pull-right" id="to_date" data-date-end-date="0d" value="{{old('to_date')}}" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="product_name" class="col-sm-2 control-label">Tên sản phẩm</label>
                            <div class="col-sm-4">
                                <input type="text" name="product_name" class="form-control" id="product_name" value="{{old('product_name')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="sku" class="col-sm-2 control-label">SKU</label>
                            <div class="col-sm-4">
                                <input type="text" name="sku" class="form-control" id="sku" value="{{old('sku')}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="category_id" class="col-sm-2 control-label">Danh mục</label>
                            <div class="col-sm-4">
                                <select name="category_id" class="form-control select2" style="width: 100%;">
                                    <option value="0" >-----Tất cả-----</option>
                                    @foreach($categories as $category)
                                       <option value="{{$category->id}}" {{ old('category_id') == $category->id? 'selected':''}}>{{$category->name}}</option>
                                    @endforeach
                             </select>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info">
                            <i class="fa fa-search"></i> Tìm kiếm
                        </button>
                        <!-- <button type="submit" class="btn btn-default pull-right">
                            <i class="fa fa-print"></i> Xuất file
                        </button> -->
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
                                <td style="width: 20%">
                                   <img src="{{asset('/storage')}}/{{$product->GetMediaByOrderAsc()->source??''}}" alt="" title="" width="120">
                                </td>
                                <td><a href="{{url('/admin/products/')}}/{{$product->id}}/edit">{{$product->name}}</a></td>
                                <td>{{$product->sku}}</td>
                                <td>
                                    @if($product->published==1) 
                                    <i class="fa fa-check true-icon"></i>
                                    @else 
                                    <i class="fa fa-times false-icon"></i>
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
                                    <a type="button" class="btn btn-danger" data-product-id="{{$product->id}}" data-toggle="modal" data-target="#modal-delete-product">
                                    <i class="fa fa-ban"></i>
                                    </a> 
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
                                <th>Xuất Bản</th>
                                <th>Ngày Tạo</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <div class="box-footer clearfix">
                    {{ $products->appends(['from_date'=> old('from_date'), 'to_date'=> old('to_date'), 'product_name'=> old('product_name'),'sku'=> old('sku'), 'category_id'=> old('category_id')])->links('vendor.pagination.admin') }}
                </div>
            </div>
        </div>
    </div>
</section>

<!-- QUESTION TO DELETE -->
<div class="modal modal-danger fade" id="modal-delete-product">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Cảnh Báo</h4>
            </div>
            <div class="modal-body">
                <p>Bạn có muốn xóa sản phẩm này không?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Đóng</button>
                <form name="form-product-delete"  method="POST">
                    {!! csrf_field() !!}
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="submit" class="btn btn-outline" value="Xóa Sản Phẩm">
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection 

@section('scripts')
<script>
    $(function(){
        $('#from_date, #to_date').datepicker({
            format : 'yyyy-mm-dd',
            autoclose : true,
            clearBtn : true
        })

        $('#modal-delete-product').on('show.bs.modal', function (e) {
            var productID = $(e.relatedTarget).data('product-id');
            var action = "{{url('admin/products')}}/" + productID;
            $(e.currentTarget).find('form[name="form-product-delete"]').attr("action", action);
        })  
    })
</script>
@endsection