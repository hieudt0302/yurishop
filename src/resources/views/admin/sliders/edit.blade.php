@extends('layouts.admin')
@section('title','Slider - Admin')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
        Chỉnh sửa Slider
        <small>
            <i class="fa fa-arrow-circle-left"></i>
            <a href="{{url('/admin/sliders')}}">Quay lại danh sách</a>
        </small>   
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Slider</a></li>
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
                                
                {!! Form::open(array('method' => 'PATCH','route' => ['admin.sliders.update', $slider->id],'files'=>'true')) !!}
                    <ul class="nav nav-tabs" role="tablist" style="padding-left: 10px">
                        <li class="active">
                            <a href="#general" data-toggle="tab">Thông tin chung</a>
                        </li>          
                        @foreach ($language_list as $language)
                        <li>
                            <a href="#{{$language->id}}-description" data-toggle="tab">Nội dung - {{$language->name}}</a>
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
                                        <input type="text" id="title" class="form-control" name="title" value="{{ $slider->title }}"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Url
                                        <span class="text-danger">*</span>
                                    </td>
                                    <td>
                                        <input type="text" id="url" class="form-control" name="url" value="{{ $slider->url }}"/>
                                    </td>
                                </tr>
                               <tr>
                                    <td>Sắp xếp</td>
                                    <td>
                                        <input type="text" class="form-control" name="sort_order" value="{{ $slider->order }}"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Cho phép hiển thị</td>
                                    <td>
                                        <select name="is_show" class="form-control" value="{{ $slider->is_show }}">
                                            <option value="0">Không</option>
                                            <option value="1" selected >Có</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Hình ảnh
                                        <span class="text-danger">*</span>
                                    </td>
                                    <td>
                                        <input type="file" name="image" vvalue="{{ $slider->image }}"/>
                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                    </td>
                                </tr>                               
                            </table>                
                        </div>

                        @foreach ($slider_translations as $slider_tran)
                        <div class="tab-pane fade" id="{{$slider_tran->language_id}}-description">
                            <table class="table table-responsive">
                                <tr>
                                    <td>Mô tả</td>                 
                                    <td>
                                        <textarea class="form-control" name="{{$slider_tran->language_id}}-description">{{ $slider_tran->description }}</textarea>                 
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
@endsection