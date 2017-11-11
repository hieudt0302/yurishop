@extends('layouts.admin')
@section('title','Mail Template - Admin')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Chỉnh sửa Mail Template
        <small>
            <i class="fa fa-arrow-circle-left"></i>
            <a href="{{url('/admin/mail_templates')}}">Quay lại danh sách</a>
        </small>   
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Mail Template</a></li>
        <li class="active">Chỉnh sửa</li>
      </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
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
                                
                {!! Form::open(array('method' => 'PATCH','route' => ['admin.mail_templates.update', $mailTemplate->id])) !!}
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
                                        Tên
                                        <span class="text-danger">*</span>
                                    </td>
                                    <td>
                                        <input type="text" id="name" class="form-control" name="name" value="{{ $mailTemplate->name }}"/>
                                    </td>
                                </tr>       
                            </table>                
                        </div>

                        @foreach ($mail_temp_translations as $mail_temp_translation)
                        <div class="tab-pane" id="{{$mail_temp_translation->language_id}}-content">
                            <table class="table table-responsive">
                                <tr>
                                    <td>Nội dung</td>                 
                                    <td>
                                        <textarea id="content-{{$mail_temp_translation->language_id}}" class="form-control" name="{{$mail_temp_translation->language_id}}-content">{{ $mail_temp_translation->content }}</textarea>                 
                                    </td>
                                </tr> 
                            </table>
                        </div>
                        @endforeach
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right">Cập Nhật</button>
                    </div>
                </form>    
  
            </div>
        </div>
    </div>
</section>  
<script src="{{asset('backend/dist/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('backend/dist/ckfinder/ckfinder.js')}}"></script>
<script type="text/javascript">
    @foreach ($mail_temp_translations as $mail_temp_translation)
    CKEDITOR.replace( 'content-{{$mail_temp_translation->language_id}}',
    {
        filebrowserBrowseUrl : '/backend/dist/ckfinder/ckfinder.html',
        filebrowserImageBrowseUrl : '/backend/dist/ckfinder/ckfinder.html?type=Images',
        filebrowserFlashBrowseUrl : '/backend/dist/ckfinder/ckfinder.html?type=Flash',
        filebrowserUploadUrl : '/backend/dist/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserImageUploadUrl : '/backend/dist/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
        filebrowserFlashUploadUrl : '/backend/dist/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
    });
    @endforeach
</script>      
@endsection