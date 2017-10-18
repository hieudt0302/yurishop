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
                        <li class="active"><a href="#info" data-toggle="tab">Product Info</a></li>
                        <li><a href="#content" data-toggle="tab">Content</a></li>
                        <li><a href="#pictures" data-toggle="tab">Pictures</a></li>
                    </ul>
                    <div class="tab-content">
                        <!-- INFO TAB -->
                        <div class="active tab-pane" id="info">
                            <form action="{{url('/admin/products')}}/{{$product->id}}" method="post">
                            {!! method_field('patch') !!} 
                            {{ csrf_field()}}
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                                <div class="panel-group">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            General Infomation
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                               <label class="col-md-3 control-label" for="name" title="">Product name</label>
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
                                               <label class="col-md-3 control-label" for="sku" title="">SKU</label>
                                                <div class="col-md-4">
                                                    <input class="form-control text-box single-line valid" 
                                                    name="sku" type="text" 
                                                    value="{{$product->sku}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4 col-md-offset-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            {{ Form::checkbox('published', 1 , $product->published ? true : false, array('class' => 'check-box')) }}
                                                            Published
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="slug" title="">Slug</label>
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
                                                <label class="col-md-3 control-label" for="old_price" title="">Old Price</label>
                                                <div class="col-md-4">
                                                    <div class="input-group bootstrap-touchspin">
                                                        <input  id="old_price" name="old_price" type="text" value="{{$product->old_price}}" class="form-control" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="price" title="">Price</label>
                                                <div class="col-md-4">
                                                    <div class="input-group bootstrap-touchspin">
                                                        <input  id="price" name="price" type="text" value="{{$product->price}}" class="form-control" >
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="special_price" title="">Special Price</label>
                                                <div class="col-md-4">
                                                    <div class="input-group bootstrap-touchspin">
                                                        <input  id="special_price" name="special_price" type="text" value="{{$product->special_price}}" class="form-control" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="special_price_start_date" title="">Special Price Start Date</label>
                                                <div class="col-md-4">
                                                    <div class="input-group date">
                                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                        <input type="text" name="special_price_start_date" class="form-control pull-right" id="special_price_start_date" data-date-start-date="0d">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="special_price_end_date" title="">Special Price Start Date</label>
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
                                                <div class="col-md-4 col-md-offset-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            {{ Form::checkbox('disable_buy_button', 1 , $product->disable_buy_button ? true : false, array('class' => 'check-box')) }}
                                                            Disable Buy Button
                                                        </label>                                                
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4 col-md-offset-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            {{ Form::checkbox('disable_wishlist_button', 1 , $product->disable_wishlist_button ? true : false, array('class' => 'check-box')) }}
                                                            Disable Wishlist Button
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4 col-md-offset-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            {{ Form::checkbox('call_for_price', 1 , $product->call_for_price ? true : false, array('class' => 'check-box')) }}
                                                            Call For Price
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4 col-md-offset-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            {{ Form::checkbox('sold_off', 1 , $product->sold_off ? true : false, array('class' => 'check-box')) }}
                                                            Sold Off
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-3">
                                                </div>
                                                <div class="col-md-4">
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- CONTENT TAB -->
                        <div class="tab-pane" id="content">
                            <div class="panel-group">
                                <!-- Language Select -->
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="name" title="">Translate</label>
                                            <div class="col-md-4">
                                                <select id="language-select" name="language_id" class="form-control">
                                                    <option value="0">-----Chọn Ngôn Ngữ-----</option>
                                                    @foreach($languages as  $language)
                                                    <option value="{{$language->id}}">{{$language->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Translate Content -->
                                <div class="panel panel-default">
                                    <form id="update-content-translation" method="POST">
                                        {!! method_field('patch') !!} 
                                        {{ csrf_field()}}
                                        <input type="hidden" id="language_id_translate" name="language_id_translate" value="0">
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="name_translate" title="">Product Name</label>
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
                                                <label class="col-md-3 control-label" for="summary_translate" title="">Summary</label>
                                                <div class="col-md-8">
                                                    <textarea class="form-control" id="summary_translate" name="summary_translate" rows="3"  placeholder=""></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="description_translate" title="">Description</label>
                                                <div class="col-md-8">
                                                    <textarea class="form-control" id="description_translate" name="description_translate" rows="3"  placeholder=""></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="specs_translate" title="">Specs</label>
                                                <div class="col-md-8">
                                                    <textarea class="form-control" id="specs_translate" name="specs_translate" rows="3"  placeholder=""></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-3">
                                                </div>
                                                <div class="col-md-4">
                                                    <button type="submit" class="btn btn-primary">Cập Nhật</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- PRICTURES TAB -->
                        <div class="tab-pane" id="pictures">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <form id="form-upload-image" name="form-upload-image"  method="post" enctype="multipart/form-data"> 
                                        {{ csrf_field()}}
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <div class="panel-heading">
                                        Add a new picture
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="product_image_upload" title="">Upload Image</label>
                                                <div class="col-md-8">
                                                    <input type="file" id="image_upload" name="image_upload" >
                                                    <div style="width:200px;height: 200px;border: 1px solid whitesmoke;text-align: center" id="img1">
                                                        <img width="100%" height="100%" src="{{asset('images/default-image-250.png')}}"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="display_order" title="">Display Order</label>
                                                <div class="col-md-4">
                                                    <div class="input-group bootstrap-touchspin">
                                                        <input  id="display_order" name="display_order" type="text" value="0" class="form-control" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="name_image" title="">Name</label>
                                                <div class="col-md-4">
                                                    <div class="input-group bootstrap-touchspin">
                                                        <input  id="name_image" name="name_image" type="text"  class="form-control" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="description_image" title="">Description</label>
                                                <div class="col-md-4">
                                                    <div class="input-group bootstrap-touchspin">
                                                        <input  id="description_image" name="description_image" type="text" class="form-control" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-3">
                                                </div>
                                                <div class="col-md-8">
                                                    <button type="submit" class="btn btn-primary add-product-image">Add Product Image</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div id="productpictures-grid" >
                                            <table id="medias-table" class="table table-bordered ">
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
                                                    @foreach($product->medias as  $m)
                                                        <tr>
                                                            <td>
                                                                <a href="#"><img alt="File Not Found" src="{{asset('/storage')}}/{{$m->source}}" width="150"></a>
                                                            </td>
                                                            <td>{{$m->pivot->order}}</td>
                                                            <td >{{$m->name}}</td>
                                                            <td >{{$m->description}}</td>
                                                            <td ><a href="#"><span></span>Edit</a><a href="#"><span ></span>Delete</a></td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
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
    

    // TAB: CONTENT
        $('#language-select').on('change', function() {
            var code_id = this.value;
            $('#language_id_translate').val(code_id);
            $.ajax({
                type: "GET",
                url: '{{url("/admin/products")}}/{{$product->id}}/'+ code_id +'/fetch',
                data:{
                    '_token': '{{csrf_token()}}'
                },
                success:function(response){
                $('#name_translate').val(response['name']);
                $('#summary_translate').val(response['summary']);
                $('#description_translate').val(response['description']);
                $('#specs_translate').val(response['specs']);
                },
                error:function(response){
                    alert('Không thể gửi yêu cầu về server');
                }
            });
        })

        $('#update-content-translation' ).on( 'submit', function(e) {
            e.preventDefault();
            var language_id = $(this).find('input[name=language_id_translate]').val();
            var name = $(this).find('input[name=name_translate]').val();
            var summary = $(this).find('textarea[name=summary_translate]').val();
            var description = $(this).find('textarea[name=description_translate]').val();
            var specs = $(this).find('textarea[name=specs_translate]').val();

            $.ajax({
                type: "PATCH",
                url: '{{url("/admin/products")}}/{{$product->id}}/translation',
                data:{
                    'language_id':language_id,
                    'name': name,
                    'summary': summary,
                    'description': description,
                    'specs': specs
                },
                success:function(response){
                    alert(response['message']);
                },
                error:function(response){
                    alert(response['message']);
                }
            });
        });

    $('#form-upload-image').on( 'submit', function(e) {
      event.preventDefault();
                var form = document.forms.namedItem("form-upload-image");
                var formData = new FormData(form);
        $('#img1').html('<img src="{{asset("images/loader.gif")}}" style="padding-top: 40%"/>');
        $.ajax({
            type: 'POST',
            url: '{{url("/admin/products")}}/{{$product->id}}/image/upload',
            dataType:'json',
            processData: false,
            contentType: false,
            data:formData,
            success: function (response) {
                if (response['status'] =='error') {
                    $('#img1').html('<img width="100%" height="100%" src="{{asset("images/default-image-250.png")}}"/>');
                }
                else {
                    $('#img1').html('<img width="100%" height="100%" src="{{asset("storage/")}}/' + response['path'] + '"/>');

                    //add to table
                    // $('#medias-table > tbody:first-child').append
                    $("#medias-table").prepend(
                        '<tr>'
                            +'<td><a href="#"><img alt="File Not Found" src="{{asset("/storage")}}/'+response['path']+'"width="150"></a></td>'
                            +'<td>'+response['order']+'</td>'
                            +'<td>'+response['name']+'</td>'
                            +'<td>'+response['description']+'</td>'
                            +'<td><a href="#"><span></span>Edit</a><a href="#"><span ></span>Delete</a></td>'
                        +'</tr>');
                }
            },
            error: function (response) {
                $('#img1').html('<img width="100%" height="100%" src="{{asset("images/default-image-250.png")}}"/>');
            }
        });
    });
});
</script>
@endsection