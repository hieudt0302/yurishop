
@extends('layouts.admin')
@section('title', 'Blog')
@section('description', 'Blog')
@section('content')
<header class="header">
    <a href="{{ route('admin.blog') }}" class="btn btn-primary btn-add" title="Danh sách blog">Quay lại danh sách</a>
</header>
<div class="container-fluid">
    <div class="block-header">
        <h3>Chỉnh sửa blog</h3>
    </div>
    </br>
    <div class="row clearfix" >
        <section class="panel panel-default">
            {!! Form::open(array('route' => ['admin.blog.update', $blogDetail->id], 'files'=>'true')) !!}
                @if(count($errors))
                <div class="alert alert-danger">
                    <strong>Chú ý !</strong> Đã xảy ra một số lỗi !
                </div>
                @endif
                <input type="hidden" id="system-id" name="system_id" value="{{ $blogDetail->system_id }}" />
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
                                    <input type="text" id="title" class="form-control" name="title" value="{{ $blogDetail->title }}" />
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Tiêu đề - Tiếng Anh
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="en_title" value="{{ $blogDetail->en_title }}" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Slug
                                    <span class="text-danger">*</span>
                                </td>
                                <td>
                                    <input type="text" id="slug" class="form-control" name="slug" value="{{ $blogSeo->slug }}" />
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
                                    <input type="text" class="form-control" name="seo_title" value="{{ $blogSeo->seo_title }}" />
                                    <span class="text-danger">{{ $errors->first('seo_title') }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Tiêu đề (SEO) - Tiếng Anh
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="en_seo_title" value="{{ $blogSeo->en_seo_title }}" />
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
                                        <option value="{{ $bCat->id }}" {!! $blogDetail->cat_id == $bCat->id ? 'selected' : '' !!}>{{ $bCat->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{ $errors->first('cat_id') }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Cho phép hiển thị</td>
                                <td>
                                    <select name="is_show" class="form-control">
                                        <option value="0" {!! $blogDetail->is_show == 0 ? 'selected' : '' !!}>Không</option>
                                        <option value="1" {!! $blogDetail->is_show == 1 ? 'selected' : '' !!}>Có</option>
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
                                <td>
                                   <i class="fa {!! ($blogDetail->thumb != '') ? 'fa-check' : 'fa-times' !!}"></i>
                                </td>
                            </tr>
                            <tr>
                                <td>Giới thiệu - Tiếng Việt</td>
                                <td>
                                    <textarea class="form-control" name="introduce">{{ $blogDetail->introduce }}</textarea>
                                </td>
                            </tr> 
                            <tr>
                                <td>Giới thiệu - Tiếng Anh</td>
                                <td>
                                    <textarea class="form-control" name="en_introduce">{{ $blogDetail->en_introduce }}</textarea>
                                </td>
                            </tr> 
                            <tr>
                                <td>Từ khóa (SEO)</td>
                                <td>
                                    <input type="text" class="form-control" name="keyword" value="{{ $blogSeo->keyword }}" />
                                </td>
                            </tr>
                            <tr>
                                <td>Mô tả (SEO)</td>
                                <td>
                                    <textarea class="form-control" name="seo_description">{{ $blogSeo->description }}</textarea>
                                </td>
                            </tr>
                        </table>
                    </div>
                   <div class="tab-pane fade" id="vi-content">
                        <textarea class="form-control" id="vi-con" name="content">{{ $blogDetail->content }}</textarea>
                    </div>
                    <div class="tab-pane fade" id="en-content">
                        <textarea class="form-control" id="en-con" name="en_content">{{ $blogDetail->en_content }}</textarea>
                    </div>
                </div>
                <div style=" text-align: center">
                    <button type="submit" class="btn btn-info">Lưu thay đổi</button>
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


