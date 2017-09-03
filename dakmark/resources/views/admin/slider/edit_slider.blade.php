
@extends('layouts.admin')
@section('title', 'Slider')
@section('description', 'Slider')
@section('content')
<header class="header">
    <a href="{{ route('admin.slider') }}" class="btn btn-primary btn-sm pull-right" title="Danh sách slider">Quay lại danh sách</a>
</header>
<div class="container-fluid">
    <div class="block-header">
        <h3>Chỉnh sửa slider</h3>
    </div>
    </br>
    <div class="row clearfix" >
        <section class="panel panel-default">
            {!! Form::open(array('route' => ['admin.slider.update', $sliderDetail->id], 'files'=>'true')) !!}
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
                            <input type="text" class="form-control" name="title" value="{{ $sliderDetail->title }}" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Tiêu đề - Tiếng Anh
                        </td>
                        <td>
                            <input type="text" class="form-control" name="en_title" value="{{ $sliderDetail->en_title }}" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Url
                        </td>
                        <td>
                            <input type="text" class="form-control" name="url" value="{{ $sliderDetail->url }}" />
                        </td>
                    </tr>
                    <tr>
                        <td>Mô tả - Tiếng Việt</td>
                        <td>
                            <textarea class="form-control" name="description">{{ $sliderDetail->description }}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Mô tả - Tiếng Anh</td>
                        <td>
                            <textarea class="form-control" name="en_description">{{ $sliderDetail->en_description }}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Sắp xếp</td>
                        <td>
                            <input type="text" class="form-control" name="sort_order" value="{{ $sliderDetail->sort_order }}" />
                        </td>
                    </tr>
                    <tr>
                        <td>Cho phép hiển thị</td>
                        <td>
                            <select name="is_show" class="form-control">
                                <option value="0" {!! $sliderDetail->is_show == 0 ? 'selected' : '' !!}>Không</option>
                                <option value="1" {!! $sliderDetail->is_show == 1 ? 'selected' : '' !!}>Có</option>
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
                        <td><button type="submit" class="btn btn-info" style="margin-left: 15px; margin-top: 10px">Lưu thay đổi</button></td>
                    </tr>
                </table>
            </form>
        </section>
    </div>
</div>

@endsection


