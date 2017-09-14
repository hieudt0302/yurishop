@extends('layouts.master')
@section('title',$seo_title)
@section('content')
   
<div class="container product">
    <div class="col-md-9 product-wrapper">
        <div class="row main-info">
            <input type="hidden" class="product-id" value="{{ $product->id }}">
            <input type="hidden" class="shop-price" value="{!! $product->promote_price != 0 ? $product->promote_price : $product->default_price !!}">
            <div class="col-md-4">
                <img class="img-responsive product-img" alt="{{ $product->name }}" src="{{ asset('public/assets/img/product/' . $product->thumb) }}" />
            </div>
            <div class="col-md-8">
                <h3 class="product-name cur-product-name">{{ $product->name }} </h3>
                <div>
                    <span class="product-label">Mã sản phẩm : </span><span class="product-code">{{ $product->product_code }}</span>
                </div>
                <div>
                    <span class="product-label">Bình chọn : </span>
                    <span>
                        @for($i=0; $i<5; $i++)
                        <i class="fa fa-star" style="color: #FF9900"></i>    
                        @endfor
                    </span>
                </div>
                <div class="price">
                    <span class="product-label">Giá sản phẩm : </span>
                   @if($product->promote_price != 0)
                    <span class="cur-price">{!! price_format($product->promote_price,'VNĐ') !!}</span>
                    <span class="org-price"><del>{!! price_format($product->default_price,'VNĐ') !!}</del></span>
                    @else
                   <span class="cur-price">{!! price_format($product->default_price,'VNĐ') !!}</span>
                    @endif
                </div>
                <div>
                    <span class="amount">
                        <button type="button" class="btn btn-default btn-number" data-type="minus" disabled="">
                            <span class="glyphicon glyphicon-minus"></span>
                        </button>
                        <input type="text" class="form-control input-number" value="0" min="0">
                        <button type="button" class="btn btn-default btn-number" data-type="plus">
                            <span class="glyphicon glyphicon-plus"></span>
                        </button>
                    </span>
                    <button class="btn btn-primary add-cart"><i class="fa fa-cart-plus"></i>Thêm vào giỏ hàng</button>
                </div>
                <div class="add-cart-note" style="display: none">Hãy chọn số lương sản phẩm</div>
                <div class="add-cart-res" style="display: none;">Sản phẩm đã được thêm vào giỏ hàng</div>
            </div>
        </div>
        <div class="row extend-info">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#description">Chi tiết sản phẩm</a></li>
                <li><a data-toggle="tab" href="#comment">Bình luận - Chia sẻ</a></li>
                <li><a data-toggle="tab" href="#rate">Đánh giá - Phản hồi</a></li>
            </ul>
            <div class="tab-content">
                <div id="description" class="tab-pane fade in active"> 
                    {!! $product->description !!}
                </div>  
                <div id="comment" class="tab-pane fade">
                    <?php echo View::make('front.products.social_network_plugin') ?>
                </div>  
                <div id="rate" class="tab-pane fade">
                    <div class="rate">
                        <span>Bình chọn</span>
                        <div class="stars">
                            <input class="star star-5" id="star-5" type="radio" name="star"/>
                            <label class="star star-5" for="star-5"></label>
                            <input class="star star-4" id="star-4" type="radio" name="star"/>
                            <label class="star star-4" for="star-4"></label>
                            <input class="star star-3" id="star-3" type="radio" name="star"/>
                            <label class="star star-3" for="star-3"></label>
                            <input class="star star-2" id="star-2" type="radio" name="star"/>
                            <label class="star star-2" for="star-2"></label>
                            <input class="star star-1" id="star-1" type="radio" name="star"/>
                            <label class="star star-1" for="star-1"></label>
                        </div>
                    </div>
                    
                    <div class="feedback">
                        Phản hồi
                        <textarea class="form-control"></textarea>
                        <button class="btn btn-primary send-feedback"> Gửi </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 relate-product">
        <span class="subject">Sản phẩm liên quan</span>
        <ul>
        @foreach ($relate_products as $rProduct)
            <?php $pSeo = \DB::table('seo')->where('system_id',$rProduct->system_id)->first(); ?>
            <li>
                <a href="{{ route('front.item.show',$pSeo->slug) }}" title="{{ $rProduct->name }}">
                    <img class="img-responsive product-thumb" src="{{ asset('public/assets/img/product/' . $rProduct->thumb) }}" alt="{{ $rProduct->name }}" />
                </a>
                <div class="product-info">
                    <a href="{{ route('front.item.show',$pSeo->slug) }}" title="{{ $rProduct->name }}">
                        <span class="product-name">{{ $rProduct->name }}</span>
                    </a>
                    <div class="product-carousel-price">
                        @if($rProduct->is_promote == 1)
                        <span class="cur-price">{!! price_format($rProduct->promote_price,'VNĐ') !!}</span>
                        <span class="org-price"><del>{!! price_format($rProduct->default_price,'VNĐ') !!}</del></span>
                        @else
                        <span class="cur-price">{!! price_format($rProduct->default_price,'VNĐ') !!}</span>
                        @endif
                    </div>
                    <div>
                        @for($i=0; $i<5; $i++)
                        <i class="fa fa-star" style="color: #FF9900"></i>    
                        @endfor
                    </div>
                </div>
            </li>   
        @endforeach
        </ul>
    </div>
</div>

<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.btn-number').click(function(e){
            e.preventDefault();
            type      = $(this).attr('data-type');
            var input = $(".input-number");
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
            if(valueCurrent > minValue) {
                $(".btn-number").removeAttr('disabled')
            } 
        });

        $('.add-cart').click(function() {
            var product_id = $(".product-id").val();
            var product_name = $(".cur-product-name").text();
            var price = $(".shop-price").val();
            var product_img = $(".product-img").attr('src');
            var amount = $(".input-number").val();
            if(amount > 0){
                $.ajax({
                    type: "POST",
                    url: "{{ url('/them-vao-gio-hang') }}",
                    data: {
                        'product_id': product_id,
                        'product_name': product_name,
                        'product_img': product_img,
                        'price': price,
                        'amount': amount,
                    },
                    success: function(res) {
                        $(".add-cart-note").hide();
                        $(".add-cart-res").show();
                        $('.cart-item-count').html(res['itemNum']);              
                    },
                    error: function (data) {
                        console.log("có lỗi : "+data);
                    }
                });
            }
            else{
                $(".add-cart-res").hide();
                $(".add-cart-note").show();
            }      
        });
    });
</script>   


@endsection
