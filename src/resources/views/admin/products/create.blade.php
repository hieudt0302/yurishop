@extends('layouts.admin')
@section('title','Sản Phẩm - Admin')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
      <h1>
      Thêm Mới Sản Phẩm
        <small>
            <i class="fa fa-arrow-circle-left"></i>
            <a href="{{url('/admin/products')}}">Quay lại danh sách</a>
        </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Sản Phẩm</a></li>
        <li class="active">Thêm Mới</li>
      </ol>
    <div class="row">
        <div class="col-xs-12">
        @include('notifications.status_message') 
        @include('notifications.errors_message') 
        </div>
    </div>
</section>
<!-- Main content -->
<section class="content">
    <!-- PRODUCTS EDIT -->
    <div class="row">
        <div class="col-md-12">
            <div class="form-horizontal">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#info" data-toggle="tab">Thông tin sản phẩm</a></li>
                    </ul>
                    <div class="tab-content">
                        <!-- INFO TAB -->
                        <div class="active tab-pane" id="info">
                            <form action="{{url('/admin/products/create')}}" method="post">
                            {{ csrf_field()}}
                                <div class="panel-group">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Thông tin chung
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="name" title="">Tên sản phẩm</label>                                                    
                                                <div class="col-md-4">
                                                    <div class="input-group">
                                                        <input class="form-control text-box single-line valid" id="name" name="name" type="text" value="{{old('name')}}" >
                                                        <div class="input-group-btn">
                                                            <span class="required">*</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="sku" title="">SKU</label>
                                                <div class="col-md-4">
                                                    <input class="form-control text-box single-line valid" name="sku" type="text" value="{{old('sku')}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4 col-md-offset-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            {{ Form::checkbox('published', old('published') , true, array('class' => 'check-box')) }}
                                                            Xuất bản
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="slug" title="">Slug</label>
                                                <div class="col-md-4">
                                                    <input class="form-control text-box single-line valid"  id="slug" name="slug" type="text" value="{{old('slug')}}">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="category" title="">Danh mục</label>
                                                <div class="col-md-4">
                                                    <select name="category_id" class="form-control">
                                                        @foreach($categories as  $category)
                                                        <option value="{{$category->id}}" {{old('category_id')===$category->id?'selected':''}}>{{$category->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="tags" class="col-md-3 control-label">Tags</label>
                                                <div class="col-md-4">
                                                    <select id="tags" multiple name="tagIds[]" class="form-control select2" style="width: 100%;">
                                                        <!-- Tags  -->
                                                        @foreach($tags as $key =>$tag)
                                                            @php($selected = false)
                                                            @if (is_array(old('tagIds')))
                                                                @foreach(old('tagIds') as $id)
                                                                    @if($id == $tag->id)
                                                                        @php($selected = true)
                                                                    @endif
                                                                @endforeach
                                                            @endif
                                                            <option value="{{$tag->id}}" {{$selected?'selected':''}}>{{$tag->name}}</option>
                                                        @endforeach

                                                        <!-- Old Data -->
                                                        @if (is_array(old('tagIds')))                                                            
                                                            @foreach(old('tagIds') as $id)
                                                                @php($selected = true)
                                                                @foreach($tags as $key =>$tag)
                                                                    @if($id == $tag->id)
                                                                        @php($selected = false)
                                                                    @endif
                                                                @endforeach
                                                                
                                                                <option value="{{$id}}" {{$selected?'selected':''}}>{{$id}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>                                            
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Giá ({{Setting::config('currency')}})
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="old_price" title="">Giá cũ</label>
                                                <div class="col-md-4">
                                                    <div class="input-group bootstrap-touchspin">
                                                        <input  id="old_price" name="old_price" type="text" placeholder="0.00" class="form-control" value="{{old('old_price',0)}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="price" title="">Giá</label>
                                                <div class="col-md-4">
                                                    <div class="input-group bootstrap-touchspin">
                                                        <input  id="price" name="price" type="text" placeholder="0.00" class="form-control" value="{{old('price',0)}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="special_price" title="">Giá đặc biệt</label>
                                                <div class="col-md-4">
                                                    <div class="input-group bootstrap-touchspin">
                                                        <input  id="special_price" name="special_price" type="text" placeholder="0.00" class="form-control" value="{{old('special_price',0)}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="label-wrapper"><label class="col-md-3 control-label" for="special_price_start_date" title="">Ngày bắt đầu giá đặc biệt</label>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="input-group date">
                                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                        <input type="text" name="special_price_start_date" class="form-control pull-right" 
                                                        value="{{ old('special_price_start_date') }}"
                                                        id="special_price_start_date" data-date-start-date="0d">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label" for="special_price_end_date" title="">Ngày kết thúc giá đặc biệt</label>
                                                <div class="col-md-4">
                                                    <div class="input-group date">
                                                        <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                        <input type="text" name="special_price_end_date" class="form-control pull-right" 
                                                        value="{{ old('special_price_end_date') }}"
                                                        id="special_price_end_date" data-date-start-date="+1d">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            Lựa chọn khác
                                        </div>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <div class="col-md-4 col-md-offset-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            {{ Form::checkbox('disable_buy_button', old('disable_buy_button') , false, array('class' => 'check-box')) }}
                                                            Vô hiệu nút mua
                                                        </label>                                                
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4 col-md-offset-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            {{ Form::checkbox('disable_wishlist_button', old('disable_wishlist_button') , false, array('class' => 'check-box')) }}
                                                            Vô hiệu nút thích
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4 col-md-offset-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            {{ Form::checkbox('call_for_price',old('call_for_price') , false, array('class' => 'check-box')) }}
                                                            Gọi để biết giá
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-4 col-md-offset-3">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            {{ Form::checkbox('sold_off', old('sold_off') , false, array('class' => 'check-box')) }}
                                                            Hết hàng
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-3">
                                                </div>
                                                <div class="col-md-4">
                                                    <button type="submit" class="btn btn-primary">Thêm mới</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
@endsection


@section('scripts')
<script>
  $(function () {
    $('#special_price_start_date, #special_price_end_date').datepicker({
        format : 'yyyy-mm-dd',
        autoclose : true,
        clearBtn : true
    })
   

    $('#special_price_start_date').datepicker().on('changeDate', function(e) {
       
    });

    $('#special_price_end_date').datepicker().on('changeDate', function(e) {
      
    });

    $('.select2').select2();
    $('#tags').select2({
        tags: true,
        tokenSeparators: [',']
    });

    $('#name').on('change', function(e) {
        e.preventDefault();
        var token = '{{csrf_token()}}';
        var name =  $('#name').val();
        $.ajax({
            cache: false,
            url: '{{url("admin/products/generateslug")}}' + '/' + name,
            type: 'GET',
            data: { _token :token},
            success: function (response) {
                if (response['status'] =='success') {
                    $('#slug').val(response['slug'])
                }
            }
        });
        return false;
    });
  })
</script>
@endsection