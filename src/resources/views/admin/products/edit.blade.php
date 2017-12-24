@extends('layouts.admin')
@section('title','Sản Phẩm - Admin')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Sản Phẩm
        <small>
            <i class="fa fa-arrow-circle-left"></i>
            <a href="{{url('/admin/products')}}">Quay lại danh sách</a>
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
                        <li class="{{$tab==1?'active':''}}"><a href="#info" data-toggle="tab">Thông tin sản phẩm</a></li>
                        <li class="{{$tab==2?'active':''}}"><a href="#content" data-toggle="tab">Nội dung</a></li>
                        <li class="{{$tab==3?'active':''}}"><a href="#pictures" data-toggle="tab">Ảnh sản phẩm</a></li>
                    </ul>
                    <div class="tab-content">
                        <!-- INFO TAB -->
                        <div class="{{$tab==1?'active':''}}  tab-pane" id="info">
                            <form action="{{url('/admin/products')}}/{{$product->id}}" method="post">
                            {!! method_field('patch') !!} 
                            {{ csrf_field()}}
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <div class="panel-group">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Thông tin chung
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                               <label class="col-md-3 control-label" for="name" title="">Tên sản phẩm</label>
                                                <div class="col-md-4">
                                                     <input class="form-control" id="name" name="name" type="text" value="{{$product->name}}">
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
                                                            Xuất bản
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
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="category" title="">Danh mục</label>
                                                <div class="col-md-4">
                                                    <select name="category_id" class="form-control">
                                                        @foreach($categories as  $category)
                                                        <option value="{{$category->id}}" {{($product->category->id??0) == $category->id? 'selected':''}}>{{$category->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div> 
                                            <div class="form-group">
                                                <label for="tags" class="col-md-3 control-label">Tags</label>
                                                <div class="col-md-4">
                                                    <select id="tags" multiple name="tagIds[]" class="form-control select2" style="width: 100%;">
                                                        <!-- Tags  -->
                                                        @foreach($tags as $key =>$tag)
                                                            @php($selected = false)
                                                            @foreach($product->tags as $t)
                                                                @if($t->id == $tag->id)
                                                                    @php($selected = true)
                                                                @endif
                                                            @endforeach
                                                            <option value="{{$tag->id}}" {{$selected?'selected':''}}>{{$tag->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>                                   
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Giá ({{Setting::config('currency')}})
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="old_price" title="">Giá cũ</label>
                                                <div class="col-md-4">
                                                    <div class="input-group bootstrap-touchspin">
                                                        <input  id="old_price" name="old_price" type="text" value="{{$product->old_price}}" class="form-control" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="price" title="">Giá</label>
                                                <div class="col-md-4">
                                                    <div class="input-group bootstrap-touchspin">
                                                        <input  id="price" name="price" type="text" value="{{$product->price}}" class="form-control" >
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="special_price" title="">Giá đặc biệt</label>
                                                <div class="col-md-4">
                                                    <div class="input-group bootstrap-touchspin">
                                                        <input  id="special_price" name="special_price" type="text" value="{{$product->special_price}}" class="form-control" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="special_price_start_date" title="">Ngày bắt đầu giá đặc biệt</label>
                                                <div class="col-md-4">
                                                    <div class="input-group date">
                                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                        <input id="special_price_start_date" type="text" name="special_price_start_date" value="{{date('Y-m-d', strtotime($product->special_price_start_date))}}" class="form-control pull-right"  data-date-start-date="0d">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="special_price_end_date" title="">Ngày kết thúc giá đặc biệt</label>
                                                <div class="col-md-4">
                                                    <div class="input-group date">
                                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                        <input id="special_price_end_date" type="text" name="special_price_end_date" value="{{date('Y-m-d', strtotime($product->special_price_end_date))}}" class="form-control pull-right"  data-date-start-date="+1d">
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
                                                            {{ Form::checkbox('disable_buy_button', 1 , $product->disable_buy_button ? true : false, array('class' => 'check-box')) }}
                                                            Vô hiệu nút mua
                                                        </label>                                                
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4 col-md-offset-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            {{ Form::checkbox('disable_wishlist_button', 1 , $product->disable_wishlist_button ? true : false, array('class' => 'check-box')) }}
                                                            Vô hiệu nút thích
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4 col-md-offset-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            {{ Form::checkbox('call_for_price', 1 , $product->call_for_price ? true : false, array('class' => 'check-box')) }}
                                                            Gọi để biết giá
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4 col-md-offset-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            {{ Form::checkbox('sold_off', 1 , $product->sold_off ? true : false, array('class' => 'check-box')) }}
                                                            Hết hàng
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
                        <div class="{{$tab==2?'active':''}} tab-pane" id="content">
                            <div class="panel-group">
                                <form id="getTranslation" action="{{url('/admin/products')}}/{{$product->id}}/edit" method="GET">
                                    <!-- Language Select -->
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="name" title="">Ngôn ngữ</label>
                                                <div class="col-md-4">
                                                    <select id="language-select" name="language_id" class="form-control">
                                                        <option value="0">-----Chọn Ngôn Ngữ-----</option>
                                                        @foreach($languages as  $language)
                                                        <!-- <option value="{{$language->id}}">{{$language->name}}</option> -->
                                                        @if( $language_id == $language->id )
                                                                <option value="{{$language->id}}" selected>{{$language->name}}</option>
                                                            @else
                                                                <option value="{{$language->id}}" >{{$language->name}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <form action="{{url('/admin/products')}}/{{$product->id}}/translation" method="post">
                                {!! method_field('patch') !!} 
                                {{ csrf_field()}}
                                    <!-- Translate Content -->
                                    <div class="panel panel-default">
                                        <!-- <form id="update-content-translation" method="POST"> -->
                                            <!-- REMOVE THIS TO FIX BUT: Cannot send data to server -->
                                            <!-- {!! method_field('patch') !!}  -->
                                            <!-- {{ csrf_field()}} -->
                                            <input type="hidden" name="language_id" value="{{$language_id}}">
                                            <div class="panel-body">
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" for="name_translate" title="">Tên sản phẩm</label>
                                                    <div class="col-md-4">
                                                        <div class="input-group input-group-required">
                                                            <input class="form-control text-box single-line valid" id="name_translate" name="name_translate" type="text" value="{{$translation->name??''}}">
                                                            <div class="input-group-btn">
                                                                <span class="required">*</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" for="summary_translate" title="">Giới thiệu</label>
                                                    <div class="col-md-8">
                                                        <textarea class="form-control" id="summary_translate" name="summary_translate" rows="3"  placeholder="">{{$translation->summary??''}}</textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" for="description_translate" title="">Mô tả</label>
                                                    <div class="col-md-8">
                                                        <textarea class="form-control" id="description_translate" name="description_translate" rows="3"  placeholder="">{!! $translation->description??'' !!}</textarea>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="col-md-3 control-label" for="specs_translate" title="">Thông số</label>
                                                    <div class="col-md-8">
                                                        <textarea class="form-control" id="specs_translate" name="specs_translate" rows="3"  placeholder="">{{$translation->specs??''}}</textarea>
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
                                        <!-- </form> -->
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- PRICTURES TAB -->
                        <div class="{{$tab==3?'active':''}} tab-pane" id="pictures">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <form id="form-upload-image" name="form-upload-image"  method="post" enctype="multipart/form-data"> 
                                        {{ csrf_field()}}
                                        <input type="hidden" name="product_id" value="{{$product->id}}">
                                        <div class="panel-heading">
                                        Thêm ảnh mới
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="product_image_upload" title="">Upload ảnh</label>
                                                <div class="col-md-8">
                                                    <input type="file" id="image_upload" name="image_upload" >
                                                    <div style="width:200px;height: 200px;border: 1px solid whitesmoke;text-align: center" id="img1">
                                                        <img width="100%" height="100%" src="{{asset('images/default-image.png')}}"/>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="display_order" title="">Thứ tự hiển thị</label>
                                                <div class="col-md-4">
                                                    <div class="input-group bootstrap-touchspin">
                                                        <input  id="display_order" name="display_order" type="text" value="0" class="form-control" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="name_image" title="">Tên</label>
                                                <div class="col-md-4">
                                                    <div class="input-group bootstrap-touchspin">
                                                        <input  id="name_image" name="name_image" type="text"  class="form-control" >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="description_image" title="">Mô tả</label>
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
                                                    <button type="submit" class="btn btn-primary add-product-image">Thêm ảnh sản phẩm</button>
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
                                                        <th>Ảnh</th>
                                                        <th>Thứ tự hiển thị</th>
                                                        <th>Tên</th>
                                                        <th>Mô tả</th>
                                                        <th></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($product->medias as  $m)
                                                        <tr id="table-row-{{$m->id}}">
                                                            <td>
                                                                <a href="#"><img alt="File Not Found" src="{{asset('/storage')}}/{{$m->source}}" width="150"></a>
                                                            </td>
                                                            <td>{{$m->pivot->order}}</td>
                                                            <td >{{$m->name}}</td>
                                                            <td >{{$m->description}}</td>
                                                            <td ><button class="btn btn-danger ajax-action-link" data-href="{{url('/admin/products/images')}}/{{$m->id}}" data-id="{{$m->id}}"><span ></span>Xóa</button></td>
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
</section>

<!-- MESSAGE-->
<div class="modal modal-info fade" id="modal-alert-update">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Phản Hồi</h4>
            </div>
            <div class="modal-body">
                <p id="modal-message">Cập nhật thành công!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Đóng</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script src="{{asset('backend/dist/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('backend/dist/ckfinder/ckfinder.js')}}"></script>
<script type="text/javascript">
    CKEDITOR.replace( 'description_translate',
    {
        filebrowserBrowseUrl : '/backend/dist/ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl : '/backend/dist/ckfinder/ckfinder.html?type=Images',
        filebrowserFlashBrowseUrl : '/backend/dist/ckfinder/ckfinder.html?type=Flash',
        filebrowserUploadUrl : '/backend/dist/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl : '/backend/dist/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserFlashUploadUrl : '/backend/dist/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
    });
</script>

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
        $('#tags').select2({
            tags: true,
            tokenSeparators: [',']
        });
    

    // TAB: CONTENT
        $('#language-select').on('change', function() {
            $('form#getTranslation').submit();
            return false;
        })    

        // $('#language-select').on('change', function() {
        //     var code_id = this.value;
        //     $('#language_id_translate').val(code_id);
        //     $.ajax({
        //         type: "GET",
        //         url: '{{url("/admin/products")}}/{{$product->id}}/'+ code_id +'/fetch',
        //         data:{
        //             '_token': '{{csrf_token()}}'
        //         },
        //         success:function(response){
        //         $('#name_translate').val(response['name']);
        //         $('#summary_translate').val(response['summary']);
        //         $('#description_translate').val(response['description']);
        //         $('#specs_translate').val(response['specs']);
        //         },
        //         error:function(response){
        //             alert('Không thể gửi yêu cầu về server');
        //         }
        //     });
        // })

        // $('#update-content-translation' ).on( 'submit', function(e) {
        //     e.preventDefault();
        //     var language_id = $(this).find('input[name=language_id_translate]').val();
        //     var name = $(this).find('input[name=name_translate]').val();
        //     var summary = $(this).find('textarea[name=summary_translate]').val();
        //     var description = $(this).find('textarea[name=description_translate]').val();
        //     var specs = $(this).find('textarea[name=specs_translate]').val();

        //     $.ajax({
        //         type: "POST",
        //         url: '{{url("/admin/products")}}/{{$product->id}}/translation',
        //         data:{
        //             'language_id':language_id,
        //             'name': name,
        //             'summary': summary,
        //             'description': description,
        //             'specs': specs,
        //             '_method': 'PATCH'
        //         },
        //         success:function(response){
        //             // alert(response['message']);
        //             $('#modal-message').html(response['message'])
        //             $("#modal-alert-update").modal();
        //         },
        //         error:function(response){
        //             alert(response['message']);
        //         }
        //     });
        // });

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
                    $('#img1').html('<img width="100%" height="100%" src="{{asset("images/default-image.png")}}"/>');
                }
                else {
                    $('#img1').html('<img width="100%" height="100%" src="{{asset("storage/")}}/' + response['path'] + '"/>');

                    //add to table
                    // $('#medias-table > tbody:first-child').append
                    $("#medias-table").prepend(
                        '<tr id="table-row-'+ response['id']+'">'
                            +'<td><a href="#"><img alt="File Not Found" src="{{asset("/storage")}}/'+response['path']+'"width="150"></a></td>'
                            +'<td>'+response['order']+'</td>'
                            +'<td>'+response['name']+'</td>'
                            +'<td>'+response['description']+'</td>'
                            +'<td ><button class="btn btn-danger ajax-action-link" data-href="{{url("/admin/products/images")}}/'+response['id']+'" data-id="'+response['id']+'" ><span ></span>Xóa</button></td>'
                        +'</tr>');
                }
            },
            error: function (response) {
                $('#img1').html('<img width="100%" height="100%" src="{{asset("images/default-image.png")}}"/>');
            }
        });
    });

    $('#name').on('change', function(e) {
        e.preventDefault();
        var token = '{{csrf_token()}}';
        var name =  $('#name').val();
        $.ajax({
            cache: false,
            url: '{{url("admin/products/generateslug")}}' + '/' + name,
            type: 'GET',
            data: { _token :token},
            success: function (response) {
                if (response['status'] =='success') {
                    $('#slug').val(response['slug'])
                }
            }
        });
        return false;
    });
    /* DELETE IMAGE */
    // $('td').on("click", ".ajax-action-link", function (e) {
    $(document).on("click", ".ajax-action-link", function(e) {
        e.preventDefault();
        var token = '{{csrf_token()}}';
        var link = $(this);
        var id =link.data("id");
        
        $.ajax({
            cache: false,
            url: link.data("href"),
            type: 'DELETE',
            data: { _token :token},
            success: function (response) {
                if (response['status'] =='success') {
                    $('#table-row-'+id+'').remove();
                }
            }
        });
        return false;
    });
});
</script>
@endsection