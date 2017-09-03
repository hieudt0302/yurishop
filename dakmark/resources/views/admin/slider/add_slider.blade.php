
@extends('layouts.admin')
@section('title', 'Slider')
@section('description', 'Slider')
@section('content')
<header class="header">
    <a href="{{ route('admin.slider') }}" class="btn btn-primary btn-sm pull-right" title="Danh sách slider">Quay lại danh sách</a>
</header>
<div class="container-fluid">
    <div class="block-header">
        <h3>Thêm slider</h3>
    </div>
    </br>
    <div class="row clearfix" >
        <section class="panel panel-default">
            {!! Form::open(array('route' => 'admin.slider.insert', 'files'=>'true')) !!}
                @if(count($errors))
                <div class="alert alert-danger">
                    <strong>Chú ý !</strong> Đã xảy ra một số lỗi !
                </div>
                @endif
                <table class="table table-responsive">
                    <tr>
                        <td>
                            Tiêu đề - Tiếng Việt
                        </td>
                        <td>
                            <input type="text" class="form-control" name="title" value="{!! old('title') !!}" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Tiêu đề - Tiếng Anh
                        </td>
                        <td>
                            <input type="text" class="form-control" name="en_title" value="{!! old('en_title') !!}" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Url
                        </td>
                        <td>
                            <input type="text" class="form-control" name="url" value="{!! old('url') !!}" />
                        </td>
                    </tr>
                    <tr>
                        <td>Mô tả - Tiếng Việt</td>
                        <td>
                            <textarea class="form-control" name="description">{!! old('description') !!}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Mô tả - Tiếng Anh</td>
                        <td>
                            <textarea class="form-control" name="en_description">{!! old('en_description') !!}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Sắp xếp</td>
                        <td>
                            <input type="text" class="form-control" name="sort_order" value="{!! old('sort_order') !!}" />
                        </td>
                    </tr>
                    <tr>
                        <td>Cho phép hiển thị</td>
                        <td>
                            <select name="is_show" class="form-control">
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
                            <input type="file" name="image"/>
                            <span class="text-danger">{{ $errors->first('image') }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button type="submit" class="btn btn-info" style="margin-left: 15px; margin-top: 10px">Thêm</button></td>
                    </tr>
                </table>
            </form>
        </section>
    </div>
</div>

@endsection


