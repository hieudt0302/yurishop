
@extends('layouts.admin')
@section('title', 'Blogs')
@section('description', 'Blogs')
@section('content')
<header class="header">
    <a href="{{ route('admin.blog') }}" class="btn btn-primary btn-sm pull-right" title="Danh sách blog">Quay lại danh sách</a>
</header>
<div class="container-fluid">
    <div class="block-header">
        <h3>Thêm blog</h3>
    </div>
    </br>
    <div class="row clearfix" >
        <section class="panel panel-default">
            {!! Form::open(array('route' => 'admin.blog.insert', 'files'=>'true')) !!}
                @if(count($errors))
                <div class="alert alert-danger">
                    <strong>Chú ý !</strong> Đã xảy ra một số lỗi !
                </div>
                @endif
                <ul class="nav nav-tabs" role="tablist" style="padding-left: 10px">
                    <li class="active">
                        <a href="#general" data-toggle="tab">Thông tin chung</a>
                    </li>
                    <li>
                        <a href="#vi-content" data-toggle="tab">Nội dung - Tiếng Việt</a>
                    </li>
                    <li>
                        <a href="#en-content" data-toggle="tab">Nội dung - Tiếng Anh</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="general">
                        <table class="table table-responsive">
                            <tr>
                                <td>
                                    Tiêu đề - Tiếng Việt
                                    <span class="text-danger">*</span>
                                </td>
                                <td>
                                    <input type="text" id="title" class="form-control" name="title" value="{!! old('title') !!}" />
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
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
                                <td>
                                    Danh mục blog
                                    <span class="text-danger">*</span>
                                </td>
                                <td>
                                    <select name="cat_id" class="form-control">
                                        @foreach ($blogCats as $bCat)
                                        <option value="{{ $bCat->id }}">{{ $bCat->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{ $errors->first('cat_id') }}</span>
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
                                    Hình đại diện
                                    <span class="text-danger">*</span>
                                </td>
                                <td>
                                    <input type="file" name="thumb"/>
                                    <span class="text-danger">{{ $errors->first('thumb') }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Giới thiệu - Tiếng Việt</td>
                                <td>
                                    <textarea class="form-control" name="introduce">{!! old('introduce') !!}</textarea>
                                </td>
                            </tr> 
                            <tr>
                                <td>Giới thiệu - Tiếng Anh</td>
                                <td>
                                    <textarea class="form-control" name="en_introduce">{!! old('en_introduce') !!}</textarea>
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
                        </table>
                    </div>
                    <div class="tab-pane fade" id="vi-content">
                        <textarea class="form-control" id="vi-con" name="content">{!! old('content') !!}</textarea>
                    </div>
                    <div class="tab-pane fade" id="en-content">
                        <textarea class="form-control" id="en-con" name="en_content">{!! old('en_content') !!}</textarea>
                    </div>
                </div>
                <div style=" text-align: center">
                    <button type="submit" class="btn btn-info">Thêm</button>
                </div>
            </form>
        </section>
    </div>
</div>
     
<script src="{{url('/')}}/public/assets/ckeditor/ckeditor.js"></script>     
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

    $(function() {                                      
        if(CKEDITOR.instances['vi-con']) {                     
            CKEDITOR.remove(CKEDITOR.instances['vi-con']);
        }
        CKEDITOR.config.max_width = 1000;
                CKEDITOR.config.height = 300;
        CKEDITOR.replace('vi-con',{
            language:'vi'
        });
    })
    $(function() {                                      
        if(CKEDITOR.instances['en-con']) {                     
            CKEDITOR.remove(CKEDITOR.instances['en-con']);
        }
        CKEDITOR.config.max_width = 1000;
                CKEDITOR.config.height = 300;
        CKEDITOR.replace('en-con',{
            language:'vi'
        });
    })
</script>   

@endsection


