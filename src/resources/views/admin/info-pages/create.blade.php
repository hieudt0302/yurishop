@extends('layouts.admin')
@section('title','Trang thông tin - Admin')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Menu
        <small>Tạo mới</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Trang thông tin</a></li>
        <li class="active">Tạo mới</li>
      </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Tạo Mới Trang Thông Tin</h3>
                </div>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Lỗi!</strong> Kiểm tra lại thông tin đã nhập.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if ($message = Session::get('success_message'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                @if ($message = Session::get('danger_message'))
                    <div class="alert alert-danger">
                        <p>{{ $message }}</p>
                    </div>
                @endif   

                {!! Form::open(array('method' => 'POST','route' => ['admin.info-pages.store'])) !!}
                    <ul class="nav nav-tabs" role="tablist" style="padding-left: 10px">
                        <li class="active">
                            <a href="#general" data-toggle="tab">Thông tin chung</a>
                        </li>        
                        @foreach ($language_list as $language)
                        <li>
                            <a href="#{{$language->id}}-content" data-toggle="tab">Nội dung - {{$language->name}}</a>
                        </li>
                        @endforeach
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="general">
                            <table class="table table-responsive">            
                                <tr>
                                    <td>
                                        Tiêu đề
                                        <span class="text-danger">*</span>
                                    </td>
                                    <td>
                                        <input type="text" id="title" class="form-control" name="title" placeholder="Nhập tiêu đề" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Slug
                                        <span class="text-danger">*</span>
                                    </td>
                                    <td>
                                        <input type="text" id="slug" class="form-control" name="slug" placeholder="Nhập slug"/>
                                        <span class="text-danger">{{ $errors->first('slug') }}</span>
                                    </td>
                                    <td style="padding-left:10px">
                                        <button type="button" id="generate-slug" class="btn btn-warning">Tạo slug</button>
                                    </td>
                                </tr>              
                            </table>                
                        </div>

                        @foreach ($language_list as $language)
                        <div class="tab-pane" id="{{$language->id}}-content">
                            <table class="table table-responsive">
                                <tr>
                                    <td>
                                        Tiêu đề hiển thị
                                    </td>
                                    <td>
                                        <input type="text" id="title" class="form-control" name="{{$language->id}}-title" placeholder="Nhập tiêu đề" />
                                    </td>
                                </tr>                
                                <tr>
                                    <td>Nội dung</td>                  
                                    <td>
                                        <textarea class="form-control ckeditor" id="{{$language->id}}-content-editor" name="{{$language->id}}-content" placeholder="Nhập nội dung" rows="10" cols="120"></textarea>                        
                                    </td>
                                </tr> 
                            </table>
                        </div>
                        @endforeach
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right">Thêm mới</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>        
    
<script type="text/javascript">
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#generate-slug").click(function(){
            var title = $("#title").val();
            $.ajax({
                type: "POST",
                url: "{{url('/admin/generate-slug')}}" ,
                data: {
                    name: title,
                },
                success: function(res){
                    $('#slug').val(res);
                },
                error: function (data) {
                    console.log(data);
                }
            });
        });      
    });
  
</script>   
  
@endsection