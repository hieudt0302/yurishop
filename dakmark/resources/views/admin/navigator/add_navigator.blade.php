
@extends('layouts.admin')
@section('title', 'Menu')
@section('description', 'Menu')
@section('content')
<header class="header">
    <a href="{{ route('admin.navigator') }}" class="btn btn-primary btn-sm pull-right" title="Danh sách menu">Quay lại danh sách</a>
</header>
<div class="container-fluid">
    <div class="block-header">
        <h3>Thêm menu</h3>
    </div>
    </br>
    <div class="row clearfix" >
        <section class="panel panel-default">
            {!! Form::open(array('route' => 'admin.navigator.insert', 'files'=>'true')) !!}
                @if(count($errors))
                <div class="alert alert-danger">
                    <strong>Chú ý !</strong> Đã xảy ra một số lỗi !
                </div>
                @endif
                <table class="table table-responsive">
                    <tr>
                        <td style="width: 25%">Danh mục hệ thống</td>
                        <td>
                            <select name="system" id="system-cat" class="form-control"
                                    onchange="return get_system_cat(this.value)">
                                <option value="0" selected>---</option>
                                @foreach($system_cats as $s)
                                <option value="{{ $s->system_id }}" >{{ $s->name }}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Tên menu - Tiếng Việt
                            <span class="text-danger">*</span>
                        </td>
                        <td>
                            <input type="text" id="name" class="form-control" name="name" value="{!! old('name') !!}" />
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Tên menu - Tiếng Anh
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
                        <td>Menu cha</td>
                        <td>
                            <select name="parent_id" class="form-control">
                                <option value="0" selected ></option>
                                @foreach($navigators as $nav)
                                <option value="{{ $nav->id }}">{{ $nav->name }}</option>
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
                                <option value="0">Không</option>
                                <option value="1" selected >Có</option>
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
                        <td></td>
                        <td><button type="submit" class="btn btn-info" style="margin-left: 15px; margin-top: 10px">Thêm</button></td>
                    </tr>
                </table>
            </form>
        </section>
    </div>
</div>
        
<script type="text/javascript">
     $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });
    function get_system_cat(system_id) {
        $.ajax({
            type: "POST",
            url: "{{url('/admin/get-system-cat')}}" + "/" + system_id,
            dataType: 'json',
            success: function(response){
                $("input[name='name']").val(response.name);
                $("input[name='en_name']").val(response.en_name);
                $("input[name='slug']").val(response.slug);
                $("input[name='seo_title']").val(response.seo_title);
                $("input[name='en_seo_title']").val(response.en_seo_title);
                $("input[name='keyword']").val(response.keyword);
                $("input[name='description']").html(response.description);
            }
        });
    }
    $(document).ready(function(){
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


