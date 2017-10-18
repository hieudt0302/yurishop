@extends('layouts.admin')
@section('title','Sản Phẩm - Admin')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
      Thêm Mới Sản Phẩm
        <small>
            <i class="fa fa-arrow-circle-left"></i>
            <a href="{{url('/admin/products')}}">Quay lại danh sách</a>
        </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Sản Phẩm</a></li>
        <li class="active">Thêm Mới</li>
      </ol>
    <div class="row">
        <div class="col-xs-12">
        @include('notifications.status_message') 
        @include('notifications.errors_message') 
        </div>
    </div>
</section>
<!-- Main content -->
<section class="content">
    <!-- PRODUCTS EDIT -->
    <div class="row">
        <div class="col-md-12">
            <div class="form-horizontal">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#info" data-toggle="tab">Thông tin sản phẩm</a></li>
                        <!-- <li><a href="#content" data-toggle="tab">Content</a></li> -->
                        <!-- <li><a href="#pictures" data-toggle="tab">Pictures</a></li> -->
                    </ul>
                    <div class="tab-content">
                        <!-- INFO TAB -->
                        <div class="active tab-pane" id="info">
                            <form action="{{url('/admin/products/create')}}" method="post">
                            {{ csrf_field()}}
                                <div class="panel-group">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Thông tin chung
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="name" title="">Tên sản phẩm</label>                                                    
                                                <div class="col-md-4">
                                                    <div class="input-group">
                                                        <input class="form-control text-box single-line valid" id="name" name="name" type="text">
                                                        <div class="input-group-btn">
                                                            <span class="required">*</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="sku" title="">SKU</label>
                                                <div class="col-md-4">
                                                    <input class="form-control text-box single-line valid" 
                                                    name="sku" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4 col-md-offset-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            {{ Form::checkbox('published', 1 , true, array('class' => 'check-box')) }}
                                                            Xuất bản
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="slug" title="">Slug</label>
                                                <div class="col-md-4">
                                                    <input class="form-control text-box single-line valid"  id="slug" name="slug" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="category" title="">Danh mục</label>
                                                <div class="col-md-4">
                                                    <select name="category_id" class="form-control">
                                                        @foreach($categories as  $category)
                                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>                                            
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Giá
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="old_price" title="">Giá cũ</label>
                                                <div class="col-md-4">
                                                    <div class="input-group bootstrap-touchspin">
                                                        <input  id="old_price" name="old_price" type="text" placeholder="0.0000" class="form-control" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="price" title="">Giá</label>
                                                <div class="col-md-4">
                                                    <div class="input-group bootstrap-touchspin">
                                                        <input  id="price" name="price" type="text" placeholder="0.0000" class="form-control" >
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="special_price" title="">Giá đặc biệt</label>
                                                <div class="col-md-4">
                                                    <div class="input-group bootstrap-touchspin">
                                                        <input  id="special_price" name="special_price" type="text" placeholder="0.0000" class="form-control" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="label-wrapper"><label class="col-md-3 control-label" for="special_price_start_date" title="">Ngày bắt đầu giá đặc biệt</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="input-group date">
                                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                        <input type="text" name="special_price_start_date" class="form-control pull-right" id="special_price_start_date" data-date-start-date="0d">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="special_price_end_date" title="">Ngày kết thúc giá đặc biệt</label>
                                                <div class="col-md-4">
                                                    <div class="input-group date">
                                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                        <input type="text" name="special_price_end_date" class="form-control pull-right" id="special_price_end_date" data-date-start-date="+1d">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Lựa chọn khác
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <div class="col-md-4 col-md-offset-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            {{ Form::checkbox('disable_buy_button', 1 , false, array('class' => 'check-box')) }}
                                                            Vô hiệu nút mua
                                                        </label>                                                
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4 col-md-offset-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            {{ Form::checkbox('disable_wishlist_button', 1 , false, array('class' => 'check-box')) }}
                                                            Vô hiệu nút thích
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4 col-md-offset-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            {{ Form::checkbox('call_for_price', 1 , false, array('class' => 'check-box')) }}
                                                            Gọi để biết giá
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4 col-md-offset-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            {{ Form::checkbox('sold_off', 1 , false, array('class' => 'check-box')) }}
                                                            Hết hàng
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-3">
                                                </div>
                                                <div class="col-md-4">
                                                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- CONTENT TAB -->
                        <!-- <div class="tab-pane" id="content">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <div class="label-wrapper"><label class="control-label" for="name" title="">Translate</label><div class="ico-help" title="The language of the content."><i class="fa fa-question-circle"></i></div></div>
                                            </div>
                                            <div class="col-md-4">
                                                <select name="language_id" class="form-control">
                                                    @foreach($languages as  $language)
                                                    <option value="{{$language->id}}">{{$language->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <div class="label-wrapper"><label class="control-label" for="name_translate" title="">Product Name</label><div class="ico-help" title="The name of the product."><i class="fa fa-question-circle"></i></div></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group input-group-required">
                                                    <input class="form-control text-box single-line valid" id="name_translate" name="name_translate" type="text" value="">
                                                    <div class="input-group-btn">
                                                        <span class="required">*</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <div class="label-wrapper"><label class="control-label" for="summary_translate" title="">Summary</label>
                                                <div class="ico-help" title="The summary of the product."><i class="fa fa-question-circle"></i></div></div>
                                            </div>
                                            <div class="col-md-8">
                                                <textarea class="form-control" name="summary_translate" rows="3"  placeholder=""></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <div class="label-wrapper"><label class="control-label" for="description_translate" title="">Description</label>
                                                <div class="ico-help" title="The description of the product."><i class="fa fa-question-circle"></i></div></div>
                                            </div>
                                            <div class="col-md-8">
                                                <textarea class="form-control" name="description_translate" rows="3"  placeholder=""></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <div class="label-wrapper"><label class="control-label" for="specs_translate" title="">Specs</label>
                                                <div class="ico-help" title="The specs of the product."><i class="fa fa-question-circle"></i></div></div>
                                            </div>
                                            <div class="col-md-8">
                                                <textarea class="form-control" name="specs_translate" rows="3"  placeholder=""></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- PRICTURES TAB -->
                        <!-- <div class="tab-pane" id="pictures">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <div id="productpictures-grid" >
                                        <table class="table table-bordered ">
                                            <thead>
                                                <tr>
                                                    <th>Picture</th>
                                                    <th>Display order</th>
                                                    <th>Name</th>
                                                    <th>Description</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <a href="{{asset('images/shop/previews/shop-prev-1.jpg')}}" target="_blank"><img alt="81" src="{{asset('images/shop/previews/shop-prev-1.jpg')}}" width="150"></a>
                                                    </td>
                                                    <td>5</td>
                                                    <td ></td>
                                                    <td ></td>
                                                    <td ><a  href="#"><span class="k-icon k-edit"></span>Edit</a><a href="#"><span ></span>Delete</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                    Add a new picture
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <div class="label-wrapper"><label class="control-label" for="product_image_upload" title="">Upload Image</label>
                                                <div class="ico-help" title="Upload image for product."><i class="fa fa-question-circle"></i></div></div>
                                            </div>
                                            <div class="col-md-8">
                                                <input type="file">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <div class="label-wrapper"><label class="control-label" for="display_order" title="">Display Order</label>
                                                    <div class="ico-help" title="Display order of image."><i class="fa fa-question-circle"></i></div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group bootstrap-touchspin">
                                                    <input  id="display_order" name="display_order" type="text" value="0" class="form-control" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3">
                                            </div>
                                            <div class="col-md-8">
                                                <button type="button" class="btn btn-primary">Add Product Image</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>  
@endsection


@section('scripts')
<script>
  $(function () {
    $('#special_price_start_date, #special_price_end_date').datepicker({
        format : 'yyyy-mm-dd',
        autoclose : true,
        clearBtn : true
    })
   

    $('#special_price_start_date').datepicker().on('changeDate', function(e) {
       
    });

    $('#special_price_end_date').datepicker().on('changeDate', function(e) {
      
    });

    $('.select2').select2();
  })
</script>
@endsection