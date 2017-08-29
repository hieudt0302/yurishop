
@extends('layouts.admin')
@section('title', 'Danh mục sản phẩm')
@section('description', 'Danh mục sản phẩm')
@section('content')
<header class="header">
    <a href="{{ route('admin.product-cat') }}" class="btn btn-primary btn-sm pull-right" title="Danh sách danh mục">Quay lại danh sách</a>
</header>
<div class="container-fluid">
    <div class="block-header">
        <h3>Thêm danh mục sản phẩm</h3>
    </div>
    </br>
    <div class="row clearfix" >
        <section class="panel panel-default">
            {!! Form::open(array('route' => 'admin.product-cat.insert', 'files'=>'true')) !!}
                @if(count($errors))
                <div class="alert alert-danger">
                    <strong>Chú ý !</strong> Đã xảy ra một số lỗi !
                </div>
                @endif
                <table class="table table-responsive">
                    <tr>
                        <td>
                            Tên danh mục - Tiếng Việt
                            <span class="text-danger">*</span>
                        </td>
                        <td>
                            <input type="text" id="name" class="form-control" name="name" value="{!! old('name') !!}" />
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Tên danh mục - Tiếng Anh
                        </td>
                        <td>
                            <input type="text" class="form-control" name="en_name" value="{!! old('en_name') !!}" />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Slug
                            <span class="text-danger">*</span>
                        </td>
                        <td>
                            <input type="text" id="slug" class="form-control" name="slug" value="{!! old('slug') !!}" />
                            <span class="text-danger">{{ $errors->first('slug') }}</span>
                        </td>
                        <td style="padding-left:10px">
                            <button type="button" id="generate-slug" class="btn btn-warning">Tạo slug</button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Tiêu đề (SEO) - Tiếng Việt
                            <span class="text-danger">*</span>
                        </td>
                        <td>
                            <input type="text" class="form-control" name="seo_title" value="{!! old('seo_title') !!}" />
                            <span class="text-danger">{{ $errors->first('seo_title') }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Tiêu đề (SEO) - Tiếng Anh
                        </td>
                        <td>
                            <input type="text" class="form-control" name="en_seo_title" value="{!! old('en_seo_title') !!}" />
                        </td>
                    </tr>
                    <tr>
                        <td>Danh mục cha</td>
                        <td>
                            <select name="parent_id" class="form-control">
                                <option value="0" selected ></option>
                                @foreach($productCats as $pCat)
                                <option value="{{ $pCat->id }}">{{ $pCat->name }}</option>
                                @endforeach
                            </select>
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
                                <option value="1" selected >Có</option>
                                <option value="0">Không</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Hiển thị trên menu</td>
                        <td>
                            <select name="is_show_nav" class="form-control">
                                <option value="1" >Có</option>
                                <option value="0" selected>Không</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                       <td>Từ khóa (SEO)</td>
                        <td>
                            <input type="text" class="form-control" name="keyword" value="{!! old('keyword') !!}" />
                        </td>
                    </tr>
                    <tr>
                        <td>Mô tả (SEO)</td>
                        <td>
                            <textarea class="form-control" name="description">{!! old('description') !!}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>Hình đại diện</td>
                        <td>
                            <input type="file" name="icon"/>
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
        
<script type="text/javascript">
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $("#generate-slug").click(function(){
            var name = $("#name").val();
            $.ajax({
                type: "POST",
                url: "{{url('/admin/generate-slug')}}" ,
                data: {
                    name: name,
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


