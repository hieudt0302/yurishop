@extends('layouts.admin')
@section('title','Galleries - Admin')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Galleries
        <small>
            <i class="fa fa-arrow-circle-left"></i>
            <a href="{{url('/admin/galleries')}}">Quay lại danh sách</a>
        </small>
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <li><a href="#">Gallery</a></li>
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
    <!-- Galleries EDIT -->
    <div class="row">
        <div class="col-md-12">
            <div class="form-horizontal">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="{{$tab==1?'active':''}}"><a href="#info" data-toggle="tab">Thông tin</a></li>
                        <li class="{{$tab==2?'active':''}}"><a href="#pictures" data-toggle="tab">Ảnh</a></li>
                    </ul>
                    <div class="tab-content">
                        <!-- INFO TAB -->
                        <div class="{{$tab==1?'active':''}}  tab-pane" id="info">
                            <form action="{{url('/admin/galleries')}}/{{$gallery->id}}" method="post">
                            {!! method_field('patch') !!} 
                            {{ csrf_field()}}
                                <input type="hidden" name="gallery_id" value="{{$gallery->id}}">
                                <div class="panel-group">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Thông tin chung
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                               <label class="col-md-3 control-label" for="name" title="">Tên sản phẩm</label>
                                                <div class="col-md-4">
                                                     <input class="form-control" id="name" name="name" type="text" value="{{$gallery->name}}">
                                                </div>
                                            </div>
                                            
                                            <div class="form-group">
                                                <div class="col-md-4 col-md-offset-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            {{ Form::checkbox('published', 1 , $gallery->published ? true : false, array('class' => 'check-box')) }}
                                                            Xuất bản
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="slug" title="">Slug</label>
                                                <div class="col-md-4">
                                                    <input class="form-control text-box single-line valid"  id="slug" name="slug" type="text" value="{{$gallery->slug}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="category" title="">Danh mục</label>
                                                <div class="col-md-4">
                                                    <select name="category_id" class="form-control">
                                                        @foreach($categories as  $category)
                                                        <option value="{{$category->id}}" {{($gallery->category->id??0) == $category->id? 'selected':''}}>{{$category->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div> 
                                            <div class="form-group">
                                                <div class="col-md-3">
                                                </div>
                                                <div class="col-md-4">
                                                    <button type="submit" class="btn btn-primary">Lưu</button>
                                                </div>
                                            </div>                               
                                        </div>
                                    </div>
                                   
                                </div>
                            </form>
                        </div>
                       
                        <!-- PRICTURES TAB -->
                        <div class="{{$tab==2?'active':''}} tab-pane" id="pictures">
                            <div class="panel-group">
                                <div class="panel panel-default">
                                    <form id="form-upload-image" name="form-upload-image"  method="post" enctype="multipart/form-data"> 
                                        {{ csrf_field()}}
                                        <input type="hidden" name="gallery_id" value="{{$gallery->id}}">
                                        <div class="panel-heading">
                                        Thêm ảnh mới
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="gallery_image_upload" title="">Upload ảnh</label>
                                                <div class="col-md-8">
                                                    <input type="file" id="image_upload" name="image_upload" >
                                                    <div style="width:270px;height: 170px;border: 1px solid whitesmoke;text-align: center" id="img1">
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
                                                    <button type="submit" class="btn btn-primary add-gallery-image">Thêm ảnh sản phẩm</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div id="gallerypictures-grid" >
                                            <table id="medias-table" class="table table-bordered ">
                                                <thead>
                                                    <tr>
                                                        <th>Ảnh</th>
                                                        <th>Thứ tự hiển thị</th>
                                                        <th>Tên</th>
                                                        <th>Mô tả</th>
                                                        <th colspan="2">Cập Nhật</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($gallery->medias as  $m)
                                                    <form action="{{url('admin/galleries/images')}}/{{$gallery->id}}/update" method="post">
                                                    {{ csrf_field()}}
                                                        <input type="hidden" name="m_id" value="{{$m->id}}">
                                                        <tr id="table-row-{{$m->id}}">
                                                            <td>
                                                                <a href="#"><img alt="File Not Found" src="{{asset('/storage')}}/{{$m->source}}" width="150"></a>
                                                            </td>
                                                            <td>
                                                                <div>{{$m->pivot->order}}</div>
                                                                <div id="pnlEditMediaItemOrder{{$m->id}}" style="display: none;">
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <input id="m_order"  name="m_order" type="text" value="{{$m->pivot->order}}" class="form-control input-sm">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td >
                                                                <div>{{$m->name}}</div>
                                                                <div id="pnlEditMediaItemName{{$m->id}}" style="display: none;">
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <input id="m_name"  name="m_name" type="text" value="{{$m->name}}" class="form-control input-sm">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td >{{$m->description}}
                                                                <div id="pnlEditMediaItemDescription{{$m->id}}" style="display: none;">
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <input id="m_description"  name="m_description" type="text" value="{{$m->description}}" class="form-control input-sm">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td >
                                                                <button id="btnEditMediaItem{{$m->id}}" type="button" class="btn btn-primary"  onclick="toggleImageItemEdit(true, {{$m->id}});return false;">Cập Nhật</button>
                                                                <button id="btnSaveMediaItem{{$m->id}}" type="submit" class="btn btn-primary" style="display:none; width:80px;">
                                                                    <i class="fa fa-floppy-o"></i>
                                                                    Lưu
                                                                </button>
                                                                <button id="btnCancelMediaItem{{$m->id}}" type="button" class="btn btn-teal" onclick="toggleImageItemEdit(false, {{$m->id}});return false;"  style="display:none; width:80px; margin-top:4px;">Hủy</button>
                                                            </td>
                                                            <td >
                                                                <button class="btn btn-danger ajax-action-link" data-href="{{url('/admin/galleries/images')}}/{{$m->id}}" data-id="{{$m->id}}">Xóa</button>
                                                            </td>
                                                        </tr>
                                                    </form>
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

@endsection

@section('scripts')
<script>
    $(function () {

        $('.select2').select2();
        $('#tags').select2({
            tags: true,
            tokenSeparators: [',']
        });
    
    $('#form-upload-image').on('submit', function(e) {
        e.preventDefault();
        var form = document.forms.namedItem("form-upload-image");
        var formData = new FormData(form);

        $('#img1').html('<img src="{{asset("images/loader.gif")}}" style="padding-top: 40%"/>');
        $.ajax({
            type: 'POST',
            url: '{{url("/admin/galleries")}}/{{$gallery->id}}/image/upload',
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
                            +'<td ><button class="btn btn-danger ajax-action-link" data-href="{{url("/admin/galleries/images")}}/'+response['id']+'" data-id="'+response['id']+'" ><span ></span>Xóa</button></td>'
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
            url: '{{url("admin/galleries/generateslug")}}' + '/' + name,
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


/* Toggle Edit Buton */
function toggleImageItemEdit(editmode, id = 0){
        if (editmode) {
            $('#pnlEditMediaItemOrder' + id).show();
            $('#pnlEditMediaItemName' + id).show();
            $('#pnlEditMediaItemDescription' + id).show();
            
            $('#btnEditMediaItem' + id).hide();
            $('#btnSaveMediaItem' + id).show();
            $('#btnCancelMediaItem' + id).show();
        }else{
            $('#pnlEditMediaItemOrder' + id).hide();
            $('#pnlEditMediaItemName' + id).hide();
            $('#pnlEditMediaItemDescription' + id).hide();

            $('#btnEditMediaItem' + id).show();
            $('#btnSaveMediaItem' + id).hide();
            $('#btnCancelMediaItem' + id).hide();
        }
    }
</script>
@endsection