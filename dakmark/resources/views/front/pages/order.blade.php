

@extends('layouts.master')
@section('title','Đặt hàng')
@section('content')

<div>Thời gian load trang : {{$load_time}}</div>

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
            <input type="text" class="input-link" name="product_url" value="{{$product_url}}">
            <button class="btn-get-info" type="submit">Lấy thông tin sản phẩm</button>
            <input type="hidden" id="link-hidden" value="">
        {!! Form::close() !!}
    </div>
</div>  
<!--
<div id="loading" style="display: none">
    <img src="{{url('/')}}/public/assets/img/loading.gif" alt="Loading..." />
</div>
-->
<div class="row" id="product-info">
    <input type="hidden" name="sizes" value="{{serialize($sizes)}}">
    <input type="hidden" name="skuMap" value="{{serialize($skuMap)}}">
    <div class="col-md-4 product-img">
        <img class="img-responsive" src="{{$image}}" alt="Hình sản phẩm" />
    </div>
    <div class="col-md-8">
        <div class="product-name">
            {{$name}}
        </div>
        <div class="shop-box">
            <div class="col-md-2 detail-label">Cửa hàng</div>
            <div class="col-md-10 shop-name">{{$shop_name}}</div>
        </div>    
        <div class="price-box">
            <div class="col-md-2 detail-label">Giá sản phẩm</div>
            <div class="col-md-10">
                <span class="cur-price">{{$current_price}}</span>
                @if($origin_price)
                <span class="org-price">{{$origin_price}}</span>
                @endif
            </div>
        </div>

        @if(!empty($colors) AND !empty($sizes))
        <div class="color-box">
            <div class="col-md-2 detail-label">Màu sắc</div>
            <div class="col-md-10">
                <ul class='color'>
                @foreach ($colors as $c)
                    <li data-value="{{ $c['colorId'] }}" class="single-color">
                        <a href="javascript:;" title="{{ $c['colorName'] }}">
                            <img src="{{ $c['colorImg'] }}" alt="{{ $c['colorName'] }}">
                        </a>
                    </li>
                @endforeach
                </ul>
            </div>
        </div>
        <div class="size-box">
            <div class="col-md-2 detail-label">Kích cỡ</div>
            <div class="col-md-10">
                @foreach ($sizes as $key => $s)
                <div class="size">
                    <span class="size-name">{{ $s['sizeName'] }}</span>
                    <span class="size-price">{{ $s['sizePrice'] }}</span>
                    <span class="size-quantity">Còn <span class="quantity" data-key="size_{{ $key }}">{{ $s['sizeQuantity'] }}</span></span>
                    <span>
                        <button type="button" class="btn btn-default btn-number" data-type="minus" data-field="size_{{ $key }}" disabled>
                            <span class="glyphicon glyphicon-minus"></span>
                        </button>
                        <input type="text" class="form-control input-number" name="size_{{ $key }}" value="0" min="0">
                        <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="size_{{ $key }}">
                            <span class="glyphicon glyphicon-plus"></span>
                        </button>
                    </span>
                </div>
                @endforeach
            </div>
        </div>

        @elseif(!empty($colors))
        <div class="size-box">
            <div class="col-md-2 detail-label">Màu sắc</div>
            <div class="col-md-10">
                @foreach ($colors as $key => $c)
                <div class="size">
                    <span class="size-name">
                        @if($c['colorImg'] != '')
                        <img src="{{ $c['colorImg'] }}" alt="{{ $c['colorName'] }}">
                        @endif
                        {{ $c['colorName'] }}
                    </span>
                    <span class="size-price">{{ $c['colorPrice'] }}</span>
                    <span class="size-quantity">Còn {{ $c['colorQuantity'] }}</span>
                    <span>
                        <button type="button" class="btn btn-default btn-number" data-type="minus" data-field="size_{{ $key }}" disabled>
                            <span class="glyphicon glyphicon-minus"></span>
                        </button>
                        <input type="text" class="form-control input-number" name="size_{{ $key }}" value="0" min="0">
                        <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="size_{{ $key }}">
                            <span class="glyphicon glyphicon-plus"></span>
                        </button>
                    </span>
                </div>
                @endforeach
            </div>
        </div>

        @elseif(!empty($sizes))
        <div class="size-box">
            <div class="col-md-2 detail-label">Kích cỡ</div>
            <div class="col-md-10">
                @foreach ($sizes as $key => $s)
                <div class="size">
                    <span class="size-name">{{ $s['sizeName'] }}</span>
                    <span class="size-price">{{ $s['sizePrice'] }}</span>
                    <span class="size-quantity">Còn {{ $s['sizeQuantity'] }}</span>
                    <span>
                        <button type="button" class="btn btn-default btn-number" data-type="minus" data-field="size_{{ $key }}" disabled>
                            <span class="glyphicon glyphicon-minus"></span>
                        </button>
                        <input type="text" class="form-control input-number" name="size_{{ $key }}" value="0" min="0">
                        <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="size_{{ $key }}">
                            <span class="glyphicon glyphicon-plus"></span>
                        </button>
                    </span>
                </div>
                @endforeach
            </div>
        </div>
        @endif
        <div class="pay-box">
            <div>
                <span class="pay-label">Số sản phẩm đã chọn</span>
                <span class="total-quantity">3</span>
            </div>
            <div>
                <span class="pay-label">Số tiền phải thanh toán</span>
                <span class="total-amount">360.00 tệ</span>
            </div>
        </div>
        <div>
            <button class="btn btn-primary">Thêm vào giỏ hàng</button>
        </div>
    </div>
</div>
<div class="row product-des">
    <h4>CHI TIẾT SẢN PHẨM</h4>
    <div class="description">
    @if(!empty($description))
        @foreach ($description as $d)
        <div class="col-md-4">
            {{$d}}
        </div>
        @endforeach
    @endif
    </div>
</div>
<script>
    $(document).ready(function(){
        $(".quantity").each(function(index){
            if($(this).html()==0){
                //console.log(name + " = 0");
                //$(".btn-number").eq(index).attr('disabled', true);
                $(".input-number").eq(index).readOnly;
            }
        });
        $('ul.color li').click(function() {
            $('ul.color li').removeClass('li-selected');
            $(this).addClass('li-selected');
            
            var colorId = $(this).attr("data-value");
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{url('/get-prop')}}" ,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    sizes: $("input[name='sizes']").val(),
                    skuMap: $("input[name='skuMap']").val(),
                    colorId: colorId,
                },
                success: function(res){
                    $(".size-price").each(function(index){
                        $(this).html(res[index].sizePrice);
                    });
                    $(".quantity").each(function(index){
                        $(this).html(res[index].sizeQuantity);
                        if($(this).html()==0){
                            //console.log(name + " = 0");
                            //$(".btn-number").eq(index).attr('disabled', true);
                            $(".input-number").eq(index).attr('disabled', true);
                        }
                    });
                }
            });
            
        });
        $('.btn-number').click(function(e){
            e.preventDefault();
            fieldName = $(this).attr('data-field');
            type      = $(this).attr('data-type');
            var input = $("input[name='"+fieldName+"']");
            var currentVal = parseInt(input.val());
            if(!isNaN(currentVal)) {
                if(type == 'minus') {           
                    if(currentVal > input.attr('min')) {
                        input.val(currentVal - 1).change();
                    } 
                    if(parseInt(input.val()) == input.attr('min')) {
                        $(this).attr('disabled', true);
                    }
                }
                else if(type == 'plus') {
                    input.val(currentVal + 1).change();
                }
            } 
            else {
                input.val(0);
            }
        });
        $('.input-number').change(function() {   
            minValue =  parseInt($(this).attr('min'));
            valueCurrent = parseInt($(this).val());
            name = $(this).attr('name');
            if(valueCurrent > minValue) {
                $(".btn-number[data-field='"+name+"']").removeAttr('disabled')
            } 
        });
    });
</script>   
@endsection
