

@extends('layouts.master')
@section('title','Đặt hàng')
@section('content')

<div class="order-info-address">
    <div class="address">
        <span>Địa chỉ nhận hàng: </span>Thang Le Duc, SĐT: 0935334983, 
         ----       
        <a class="edit-info-address" href="javascript:;" data-reveal-id="edit-info-address" id="edit-order-address">Sửa địa chỉ nhận hàng</a>
    </div>
</div>
<div class="order-float-bar-block" id="order-bar">
    <div class="tab-btn block-get-info" data-tab="tab-product-info">
        {!! Form::open(['url' => '/thong-tin-san-pham']) !!}
            <input type="text" class="input-link" id="product-link" name="product_url" autofocus="true">
            <button class="btn-get-info" type="submit">Lấy thông tin sản phẩm</button>
            <input type="hidden" id="link-hidden" value="">
        {!! Form::close() !!}
        @if (count($errors) > 0)
        <div class="input-error">
            @foreach ($errors->all() as $error)
            <div>{{ $error }}</div>
            @endforeach
        </div>
        @endif
    </div>
</div>  

<!--
<div id="loading" style="display: none">
    <img src="{{url('/')}}/public/assets/img/loading.gif" alt="Loading..." />
</div>
-->

<div id="null-shop" class="null-shop">
    Chưa có sản phẩm nào trong đơn hàng
</div>
<script>
    $(document).ready(function(){

    });
</script>   
@endsection
