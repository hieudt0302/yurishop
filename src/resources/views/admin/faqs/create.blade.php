@extends('layouts.admin')
@section('title','FAQ - Admin')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Menu
        <small>Chỉnh Sửa</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">FAQ</a></li>
        <li class="active">Tạo mới</li>
      </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Tạo mới FAQ</h3>
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

                {!! Form::open(array('method' => 'POST','route' => ['admin.faqs.store'])) !!}
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
                                        Câu hỏi
                                        <span class="text-danger">*</span>
                                    </td>
                                    <td>
                                        <input type="text" id="question" class="form-control" name="question" placeholder="Nhập câu hỏi" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Cho phép hiển thị</td>
                                    <td>
                                        <div class="form-group">
                                            <div class="col-sm-10 checkbox">
                                                <label>{{ Form::checkbox('is_show', 1 ,false, array('class' => 'is_show')) }}Hiển thị</label>
                                            </div>
                                        </div>
                                    </td>
                                </tr>                                           
                            </table>                
                        </div>                        
                        @foreach ($language_list as $language)
                        <div class="tab-pane fade" id="{{$language->id}}-content">
                            <table class="table table-responsive">
                                <tr>
                                    <td>
                                        Câu hỏi
                                        <span class="text-danger">*</span>
                                    </td>
                                    <td>
                                        <input type="text" id="title" class="form-control" name="{{$language->id}}-question" placeholder="Nhập nội dung" />
                                    </td>
                                </tr>
                                <tr>
                                    <td>Trả lời
                                    <span class="text-danger">*</span>
                                    </td>                    
                                    <td>
                                        <textarea class="form-control" name="{{$language->id}}-answer" placeholder="Nhập nội dung"></textarea>
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
@endsection