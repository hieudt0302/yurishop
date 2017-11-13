@extends('layouts.admin')
@section('title','Menu - Admin')
@section('content')
<section class="content-header">
      <h1>
      Chỉnh Sửa Menu
        <small>
            <i class="fa fa-arrow-circle-left"></i>
            <a href="{{url('/admin/menu')}}">Quay lại danh sách</a>
        </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Menu</a></li>
        <li class="active">Chỉnh Sửa</li>
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
                        <li class="active"><a href="#info" data-toggle="tab">Menu</a></li>
                        <li><a href="#content" data-toggle="tab">Nội Dung</a></li>
                        
                    </ul>
                    <div class="tab-content">
                        <!-- INFO TAB -->
                        <div class="active tab-pane" id="info">
                            <form action="{{url('/admin/menu')}}/{{$menu->id}}" method="post">
                            {!! method_field('patch') !!} 
                            {{ csrf_field()}}
                                <div class="panel-group">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Thông Tin
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="name" title="">Tên</label>                                                    
                                                <div class="col-md-4">
                                                    <input class="form-control" id="name" name="name" type="text" value="{{$menu->name}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="sku" title="">Thứ Tự</label>
                                                <div class="col-md-4">
                                                    <input class="form-control" name="order" type="text" value="{{$menu->order}}" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="slug" title="">Slug</label>
                                                <div class="col-md-4">
                                                    <input class="form-control"  id="slug" name="slug" type="text" value="{{$menu->slug}}" >
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="name" title="">Menu Chính</label>
                                                <div class="col-md-4">
                                                    <select name="parent_id" class="form-control">
                                                        <option value="0">-----Không Chọn-----</option>
                                                        @foreach($menus as  $m)
                                                            @if($menu->parent_id??0 == $m->id)
                                                            <option selected="selected" value="{{$m->id}}">{{$m->name}}</option>
                                                            @else
                                                            <option value="{{$m->id}}">{{$m->name}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Tùy Chọn
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <div class="col-md-4 col-md-offset-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            {{ Form::checkbox('enabled', 1 ,$menu->enabled? true:false, array('class' => 'check-box')) }}
                                                            Enable
                                                        </label>                                                
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4 col-md-offset-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            {{ Form::checkbox('is_visible', 1 , $menu->is_visible? true:false, array('class' => 'check-box')) }}
                                                            Vô Hiệu
                                                        </label>
                                                    </div>
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
                                            <label class="col-md-3 control-label" for="name" title="">Ngôn ngữ</label>
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
                                    <!-- REMOVE THIS TO FIX BUT: Cannot send data to server -->
                                        <!-- {!! method_field('patch') !!}  -->
                                        {{ csrf_field()}}
                                        <input type="hidden" id="language_id_translate" name="language_id_translate" value="0">
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="name_translate" title="">Tên Menu</label>
                                                <div class="col-md-4">
                                                    <div class="input-group input-group-required">
                                                        <input class="form-control" id="name_translate" name="name_translate" type="text" value="">
                                                        <div class="input-group-btn">
                                                            <span class="required">*</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="description_translate" title="">Mô tả</label>
                                                <div class="col-md-8">
                                                    <textarea class="form-control" id="description_translate" name="description_translate" rows="3"  placeholder=""></textarea>
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
                    </div>
                </div>
            </div>
        </div>
    </div>  
@endsection


@section('scripts')
<script>
  $(function () {
    $('#language-select').on('change', function() {
        var code_id = this.value;
        $('#language_id_translate').val(code_id);
        $.ajax({
            type: "GET",
            url: '{{url("/admin/menu")}}/{{$menu->id}}/'+ code_id +'/fetch',
            data:{
                '_token': '{{csrf_token()}}'
            },
            success:function(response){
                ///TODO: Make sense
                $('#name_translate').val(response['name']);
                $('#description_translate').val(response['description']);
            },
            error:function(response){
                ///TODO: Make sense
                alert('ERROR: Không thể xử lý yêu cầu, vui lòng kiểm tra kết nối');
            }
        });
    })

    /* Update Translation */
    $('#update-content-translation' ).on( 'submit', function(e) {
        e.preventDefault();
        var language_id = $(this).find('input[name=language_id_translate]').val();
        var name = $(this).find('input[name=name_translate]').val();
        var description = $(this).find('textarea[name=description_translate]').val();

        $.ajax({
            type: "POST",
            url: '{{url("/admin/menu")}}/{{$menu->id}}/translation',
            data:{
                'language_id':language_id,
                'name': name,
                'description': description,
                '_method': 'PATCH',
            },
            success:function(response){
                ///TODO: Make sense
                alert(response['message']);
            },
            error:function(response){
                ///TODO: Make sense
                alert('ERROR: Không thể xử lý yêu cầu, vui lòng kiểm tra kết nối');
            }
        });
    });

    $('#name').on('change', function(e) {
        e.preventDefault();
        var token = '{{csrf_token()}}';
        var name =  $('#name').val();
        $.ajax({
            cache: false,
            url: '{{url("admin/menu/generateslug")}}' + '/' + name,
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
})
</script>
@endsection