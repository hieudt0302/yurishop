@extends('layouts.admin')
@section('title','Sản Phẩm - Admin')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
      Sản Phẩm
        <small>
            <i class="fa fa-arrow-circle-left"></i>
            <a href="{{url('/admin/products')}}">back to product list</a>
        </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Sản Phẩm</a></li>
        <li class="active">Cập Nhật</li>
      </ol>
</section>
<!-- Main content -->
<section class="content">
    <!-- PRODUCTS EDIT -->
    <div class="row">
        <div class="col-md-12">
            <div class="form-horizontal">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#info" data-toggle="tab">Product Info</a></li>
                        <li><a href="#content" data-toggle="tab">Content</a></li>
                        <li><a href="#pictures" data-toggle="tab">Pictures</a></li>
                    </ul>
                    <div class="tab-content">
                        <!-- INFO TAB -->
                        <div class="active tab-pane" id="info">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        General Infomation
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <div class="label-wrapper"><label class="control-label" for="name" title="">Product name</label><div class="ico-help" title="The name of the product."><i class="fa fa-question-circle"></i></div></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group input-group-required">
                                                    <input class="form-control text-box single-line valid" id="name" name="name" type="text" value="{{$product->name}}">
                                                    <div class="input-group-btn">
                                                        <span class="required">*</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <div class="label-wrapper"><label class="control-label" for="sku" title="">SKU</label>
                                                    <div class="ico-help" title="Product stock keeping unit (SKU). Your internal unique identifier that can be used to track this product."><i class="fa fa-question-circle"></i></div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <input class="form-control text-box single-line valid" 
                                                name="sku" type="text" 
                                                value="{{$product->sku}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <div class="label-wrapper"><label class="control-label" for="Published" title="">Published</label><div class="ico-help" title="Check to publish this product (visible in store). Uncheck to unpublish (product not available in store)."><i class="fa fa-question-circle"></i></div></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        {{ Form::checkbox('published', 1 , $product->published ? true : false, array('class' => 'check-box')) }}
                                                        Published
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <div class="label-wrapper"><label class="control-label" for="slug" title="">Slug</label>
                                                    <div class="ico-help" title="Slug of product"><i class="fa fa-question-circle"></i></div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <input class="form-control text-box single-line valid"  id="slug" name="slug" type="text" value="{{$product->slug}}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        Price(s)
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <div class="label-wrapper"><label class="control-label" for="old_price" title="">Old Price</label>
                                                    <div class="ico-help" title="Old price of product."><i class="fa fa-question-circle"></i></div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group bootstrap-touchspin">
                                                    <input  id="old_price" name="old_price" type="text" value="0.0000" class="form-control" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <div class="label-wrapper"><label class="control-label" for="price" title="">Price</label>
                                                    <div class="ico-help" title="Price of product."><i class="fa fa-question-circle"></i></div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group bootstrap-touchspin">
                                                    <input  id="price" name="price" type="text" value="0.0000" class="form-control" >
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <div class="label-wrapper"><label class="control-label" for="special_price" title="">Special Price</label>
                                                    <div class="ico-help" title="Special price of product."><i class="fa fa-question-circle"></i></div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group bootstrap-touchspin">
                                                    <input  id="special_price" name="special_price" type="text" value="0.0000" class="form-control" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <div class="label-wrapper"><label class="control-label" for="special_price_start_date" title="">Special Price Start Date</label>
                                                    <div class="ico-help" title="Special start date of price of product."><i class="fa fa-question-circle"></i></div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="input-group date">
                                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                    <input type="text" name="special_price_start_date" class="form-control pull-right" id="special_price_start_date" data-date-start-date="0d">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <div class="label-wrapper"><label class="control-label" for="special_price_end_date" title="">Special Price Start Date</label>
                                                    <div class="ico-help" title="Special end date of price of product."><i class="fa fa-question-circle"></i></div>
                                                </div>
                                            </div>
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
                                        Option(s)
                                    </div>
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <div class="label-wrapper"><label class="control-label" for="disable_buy_button" title="">Disable Buy Button</label>
                                                <div class="ico-help" title="Check to disable buy button this product (customer cannot see the buy button in store). Uncheck to disable (customer see the buy button in store)."><i class="fa fa-question-circle"></i></div></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        {{ Form::checkbox('disable_buy_button', 1 , $product->disable_buy_button ? true : false, array('class' => 'check-box')) }}
                                                        Disable Buy Button
                                                    </label>                                                
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <div class="label-wrapper"><label class="control-label" for="disable_wishlist_button" title="">Disable Wishlist Button</label>
                                                <div class="ico-help" title="Check to disable wishlist button this product (customer cannot see the wishlist button in store). Uncheck to disable (customer see the wishlist button in store)."><i class="fa fa-question-circle"></i></div></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        {{ Form::checkbox('disable_wishlist_button', 1 , $product->disable_wishlist_button ? true : false, array('class' => 'check-box')) }}
                                                        Disable Wishlist Button
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <div class="label-wrapper"><label class="control-label" for="call_for_price" title="">Call For Price</label>
                                                <div class="ico-help" title="Check to call for price this product (Customer cannot see all price). Uncheck to call for price (Customer can see price)."><i class="fa fa-question-circle"></i></div></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        {{ Form::checkbox('call_for_price', 1 , $product->call_for_price ? true : false, array('class' => 'check-box')) }}
                                                        Call For Price
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <div class="label-wrapper"><label class="control-label" for="sold_off" title="">Sold Off</label>
                                                <div class="ico-help" title="Check to sold off this product (Customer cannot buy more). Uncheck to sold off (Customer can buy more)."><i class="fa fa-question-circle"></i></div></div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        {{ Form::checkbox('sold_off', 1 , $product->sold_off ? true : false, array('class' => 'check-box')) }}
                                                        Sold Off
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- CONTENT TAB -->
                        <div class="tab-pane" id="content">
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
                        </div>
                        <!-- PRICTURES TAB -->
                        <div class="tab-pane" id="pictures">
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
                        </div>
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
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    // CKEDITOR.replace('excerpt-editor');
    // CKEDITOR.replace('content-editor');
    //bootstrap WYSIHTML5 - text editor
    // $('.textarea').wysihtml5()
  })
</script>
@endsection