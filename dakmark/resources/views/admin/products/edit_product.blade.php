
@extends('layouts.admin')
@section('title', 'Sản phẩm')
@section('description', 'Sản phẩm')
@section('content')
<header class="header">
    <a href="{{ route('admin.product') }}" class="btn btn-primary btn-add" title="Danh sách sản phẩm">Quay lại danh sách</a>
</header>
<div class="container-fluid">
    <div class="block-header">
        <h3>Chỉnh sửa sản phẩm</h3>
    </div>
    </br>
    <div class="row clearfix" >
        <section class="panel panel-default">
            {!! Form::open(array('route' => ['admin.product.update', $productDetail->id], 'files'=>'true')) !!}
                @if(count($errors))
                <div class="alert alert-danger">
                    <strong>Chú ý !</strong> Đã xảy ra một số lỗi !
                </div>
                @endif
                <input type="hidden" id="system-id" name="system_id" value="{{ $productDetail->system_id }}" />
                <ul class="nav nav-tabs" role="tablist" style="padding-left: 10px">
                    <li class="active">
                        <a href="#general" data-toggle="tab">Thông tin chung</a>
                    </li>
                    <li>
                        <a href="#product-des" data-toggle="tab">Mô tả sản phẩm</a>
                    </li>
                    <li>
                        <a href="#gallery" data-toggle="tab">Thư viện hình</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="general">
                        <table class="table table-responsive">
                            <tr>
                                <td>
                                    Mã sản phẩm
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="product_code" value="{{ $productDetail->product_code }}" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Tên sản phẩm - Tiếng Việt
                                    <span class="text-danger">*</span>
                                </td>
                                <td>
                                    <input type="text" id="name" class="form-control" name="name" value="{{ $productDetail->name }}" />
                                    <span class="text-danger">{{ $errors->first('name') }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Tên sản phẩm - Tiếng Anh
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="en_name" value="{{ $productDetail->en_name }}" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Slug
                                    <span class="text-danger">*</span>
                                </td>
                                <td>
                                    <input type="text" id="slug" class="form-control" name="slug" value="{{ $productSeo->slug }}" />
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
                                    <input type="text" class="form-control" name="seo_title" value="{{ $productSeo->seo_title }}" />
                                    <span class="text-danger">{{ $errors->first('seo_title') }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Tiêu đề (SEO) - Tiếng Anh
                                </td>
                                <td>
                                    <input type="text" class="form-control" name="en_seo_title" value="{{ $productSeo->en_seo_title }}" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Danh mục sản phẩm
                                    <span class="text-danger">*</span>
                                </td>
                                <td>
                                    <select name="cat_id" class="form-control">
                                        @foreach ($productCats as $pCat)
                                        <option value="{{ $pCat->id }}" {!! $productDetail->cat_id == $pCat->id ? 'selected' : '' !!}>{{ $pCat->name }}</option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{ $errors->first('cat_id') }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Giá sản phẩm</td>
                                <td>
                                    <input type="text" class="form-control" name="default_price" id="price" value="{{ $productDetail->default_price }}"/>
                                </td>
                                <td style="width:10%"><label style="padding-left: 10px; padding-top: 10px">VNĐ</label></td>
                            </tr>
                            <tr>
                                <td>Hàng hot</td>
                                <td>
                                    <select name="is_hot" class="form-control">
                                        <option value="0" {!! $productDetail->is_hot == 0 ? 'selected' : '' !!} >Không</option>
                                        <option value="1" {!! $productDetail->is_hot == 1 ? 'selected' : '' !!}>Có</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Hàng mới</td>
                                <td>
                                    <select name="is_new" class="form-control">
                                        <option value="0" {!! $productDetail->is_new == 0 ? 'selected' : '' !!} >Không</option>
                                        <option value="1" {!! $productDetail->is_new == 1 ? 'selected' : '' !!}>Có</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Hàng khuyến mãi</td>
                                <td>
                                    <select id="is-promote" name="is_promote" class="form-control">
                                        <option value="0" {!! $productDetail->is_promote == 0 ? 'selected' : '' !!}>Không</option>
                                        <option value="1" {!! $productDetail->is_promote == 1 ? 'selected' : '' !!}>Có</option>
                                    </select>
                                </td>
                            </tr>
                            <tr id="promote-price-row" style="display: none">
                                <td>Giá khuyến mãi</td>
                                <td>
                                    <input type="text" class="form-control" id="promote-price" name="promote_price" value="{{ $productDetail->promote_price }}"/>
                                </td>
                                <td><label style="padding-left: 10px; padding-top: 10px">VNĐ</label></td>
                            </tr>
                            <tr id="promote-time-row" style="display: none">
                                <td>Thời gian khuyến mãi</td>
                                <td>
                                    <input type="text" class="form-control" id="promote-begin" name="promote_begin" value="{{ $productDetail->promote_begin }}"/>
                                    Đến
                                    <input type="text" class="form-control" id="promote-end" name="promote_end" value="{{ $productDetail->promote_end }}"/>
                                    <span class="text-danger">{{ $errors->first('promote_end') }}</span>
                                </td>
                            </tr>
                            <tr>
                                <td>Cho phép hiển thị</td>
                                <td>
                                    <select name="is_show" class="form-control">
                                        <option value="0" {!! $productDetail->is_show == 0 ? 'selected' : '' !!}>Không</option>
                                        <option value="1" {!! $productDetail->is_show == 1 ? 'selected' : '' !!}>Có</option>
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
                                   <i class="fa {!! ($productDetail->thumb != '') ? 'fa-check' : 'fa-times' !!}"></i>
                                </td>
                            </tr>
                            <tr>
                                <td>Giới thiệu - Tiếng Việt</td>
                                <td>
                                    <textarea class="form-control" name="introduce">{{ $productDetail->introduce }}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>Giới thiệu - Tiếng Anh</td>
                                <td>
                                    <textarea class="form-control" name="en_introduce">{{ $productDetail->en_introduce }}</textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>Từ khóa (SEO)</td>
                                <td>
                                    <input type="text" class="form-control" name="keyword" value="{{ $productSeo->keyword }}" />
                                </td>
                            </tr>
                            <tr>
                                <td>Mô tả (SEO)</td>
                                <td>
                                    <textarea class="form-control" name="seo_description">{{ $productSeo->description }}</textarea>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="product-des">
                        <textarea class="form-control" id="description" name="description">{{ $productDetail->description }}</textarea>
                    </div>
                    <div class="tab-pane fade" id="gallery">
                        <table class="table table-responsive" id="gallery-table">
                            <tr>
                                <td style="width:15%">
                                    <a href="javascript:;" onclick="new_file()">[<i class="fa fa-plus"></i>]</a>
                                    <input type="file" name="imgs[]"/>
                                </td>
                                <td style="width: 30%">
                                    Tiêu đề
                                    <input type="text" class="form-control" name="img_title[]" value="" />
                                </td>
                                <td style="width: 30%">
                                    Mô tả
                                    <input type="text" class="form-control" name="img_des[]" value="" />
                                </td>
                                <td>
                                    Sắp xếp
                                    <input type="text" class="form-control" name="sort_indexes[]" value="" />
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div style=" text-align: center">
                    <button type="submit" class="btn btn-info">Lưu thay đổi</button>
                </div>
            </form>
        </section>
    </div>
</div>
        
<script src="{{url('/')}}/public/assets/js/datepicker/bootstrap-datepicker.min.js"></script>
<script src="{{url('/')}}/public/assets/js/jquery.price_format_2.0.min.js"></script>
<script src="{{url('/')}}/public/assets/ckeditor/ckeditor.js"></script>     
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
        $("#is-promote").change(function(){
            var is_promote = $("#is-promote").val(); 
            if(is_promote==1){
                $("#promote-price-row").show();
                $("#promote-time-row").show();
                $('#promote-begin, #promote-end').datepicker({
                    autoclose: true,
                    todayHighlight:true,
                    orientation:'bottom',
                });
            }
            else{
                $("#promote-price-row").hide();
                $("#promote-time-row").hide();
            }
        });
    });

    function new_file(){
        $("#gallery-table").append(
                                "<tr>" +
                                    "<td>" + 
                                        "<a href='javascript:;' onclick='remove_file()'>[<i class='fa fa-minus'></i>]</a>" +
                                        "<input type='file' name='imgs[]'/>" +
                                    "</td>" +
                                "<td>" +
                                    "Tiêu đề" +
                                    "<input type='text' class='form-control' name='img_title[]' value='' />" +
                                "</td>" +
                                "<td>" +
                                    "Mô tả" +
                                    "<input type='text' class='form-control' name='img_des[]' value='' />" +
                                "</td>" +
                                "<td>" +
                                    "Sắp xếp" +
                                    "<input type='text' class='form-control' name='sort_indexes[]' value='' />" +
                                "</td>" +
                            "</tr>");
    }
    function remove_file(){
        $("#gallery-table tr:last-child").remove();
    }

    $('#price').priceFormat({
        centsSeparator: '.',
        thousandsSeparator: ','
    });
    $('#promote-price').priceFormat({
        centsSeparator: '.',
        thousandsSeparator: ','
    });

    $(function() {                                      
        if(CKEDITOR.instances['description']) {                     
            CKEDITOR.remove(CKEDITOR.instances['description']);
        }
        CKEDITOR.config.max_width = 1000;
                CKEDITOR.config.height = 300;
        CKEDITOR.replace('description',{
            language:'vi'
        });
    })
</script>  

@endsection


