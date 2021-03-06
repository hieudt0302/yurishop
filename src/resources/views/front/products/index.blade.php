@extends('layouts.master')
@section('title','Poko Farms - Product')
@section('header')
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- Share Nav -->
@include('layouts.share')
@endsection
@section('content')
<section class="page-header mb-lg">

    <div class="container">
        <ul class="breadcrumb">
            <li><a href="#">Trang chủ</a></li>
            @if(!empty($promo)&&$promo==true)
            <li class="active">Khuyến mại</li>
            @else
            <li class="active">{{$category->translation->name??'Danh sách sản phẩm'}}</li>
            @endif
        </ul>
    </div>
</section>

<div class="container">
    <div class="row">
        <div class="col-md-9 col-md-push-3">
            <div class="toolbar mb-none">
                <div class="sorter">
                    <div class="sort-by">
                        <label>Sắp xếp theo:</label>
                        <select>
                            <option value="Name">Tên</option>
                            <option value="Price">Giá</option>
                        </select>
                    </div>

                {{ $results->links() }}
                
                </div>
            </div>

            <ul class="products-grid columns3">
                @foreach($results as $product)
                <li>
                    <div class="product">
                        <figure class="product-image-area">
                            <a href="{{url('/products')}}/{{$product->slug}}" title="Product Name" class="product-image">
                                <img src="{{asset('/storage')}}/{{$product->GetMediaByOrderAsc()->thumb??'images/no-image.png'}}" alt="Product Name">
                            </a>
                            <div class="product-label"><span class="discount">-10%</span></div>
                            <div class="product-label"><span class="new">New</span></div>
                        </figure>
                        <div class="product-details-area">
                            <h2 class="product-name"><a href="demo-shop-4-product-details.html" title="Product Name">{{$product->translation->name??$product->name}}</a></h2>
                            <div class="product-ratings">
                                <div class="ratings-box">
                                    <div class="rating" style="width:{{$product->comments->avg('rate')/5*100}}%"></div>
                                </div>
                            </div>

                            <div class="product-price-box">
                                @php($curDate = Carbon\Carbon::now())
                                @if($product->special_price != 0 && $product->special_price_start_date  <= $curDate && $curDate <= $product->special_price_end_date )
                                <span class="old-price">{{FormatPrice::price($product->price)}}</span>
                                <span class="product-price">{{FormatPrice::price($product->special_price)}}</span>
                                @else
                                <span class="product-price">{{FormatPrice::price($product->price)}}</span>
                                @endif
                            </div>

                            <div class="product-actions">
                                <a href="javascript:void(0)" data-id="{{$product->id}}" data-name="{{$product->name}}" class="addtowishlist" title="Thêm vào danh sách yêu thích">
                                    <i class="fa fa-heart"></i>
                                </a>
                                <a href="javascript:void(0)" data-id="{{$product->id}}" data-name="{{$product->name}}" class="addtocart" title="Thêm vào giỏ hàng">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span>Đặt hàng</span>
                                </a>
                                <a href="{{url('/products')}}/{{$product->slug}}" class="comparelink" title="Xem thêm">
                                    <i class="fa fa-search"></i>
                                </a>                                   
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach      
            </ul>


            <div class="toolbar-bottom">
                <div class="toolbar">
                    <div class="sorter">
                        {{ $results->links() }}
                    </div>
                </div>
            </div>
        </div>

        <aside class="col-md-3 col-md-pull-9 sidebar shop-sidebar">
            <div class="panel-group">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            <a class="accordion-toggle" data-toggle="collapse" href="#panel-filter-category">
                                Danh mục
                            </a>
                        </h4>
                    </div>
                    <div id="panel-filter-category" class="accordion-body collapse in">
                        <div class="panel-body">
                            <ul>
                                @foreach($products_menu as $menu)
                                <li><a href="{{url('/subject')}}/{{$menu->parent->slug}}/{{$menu->slug}}">{{$menu->translation->name??$menu->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <h4>Sản phẩm mới</h4>
            <div class="owl-carousel owl-theme" data-plugin-options="{'items':1, 'margin': 5, 'dots': false, 'nav': true}">
                @php($index = 0)
                @foreach($lastProducts as $product)
                @if($index == 0 || $index % 3 == 0)                
                <div>
                @endif                                      
                    <div class="product product-sm">
                        <figure class="product-image-area">
                            <a href="{{url('/products')}}/{{$product->slug}}" title="Product Name" class="product-image">
                                <img src="{{asset('/storage')}}/{{$product->GetMediaByOrderAsc()->thumb??'images/no-image.png'}}" alt="Product Name">
                            </a>
                        </figure>
                        <div class="product-details-area">
                            <h2 class="product-name"><a href="{{url('/products')}}/{{$product->slug}}" title="Product Name">{{$product->translation->name??$product->name}}</a></h2>
                            <div class="product-ratings">
                                <div class="ratings-box">
                                    <div class="rating" style="width:{{$product->comments->avg('rate')/5*100}}%"></div>
                                </div>
                            </div>

                            <div class="product-price-box">
                                @if($product->special_price != 0 && $product->special_price_start_date  <= $curDate && $curDate <= $product->special_price_end_date )
                                <span class="old-price">{{FormatPrice::price($product->price)}}</span>
                                <span class="product-price">{{FormatPrice::price($product->special_price)}}</span>
                                @else
                                <span class="product-price">{{FormatPrice::price($product->price)}}</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    @php($index = $index+1)
                @if(($index > 0 && $index % 3 === 0) || $index === count($lastProducts))                                        
                </div>
                @endif
                @endforeach
            </div>
        </aside>
    </div>
</div>
@endsection


@section('scripts')

<!-- Current Page Vendor and Views -->
<script src="{{asset('frontend/js/views/view.contact.js')}}"></script>

<script src="{{asset('frontend/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.js')}}"></script>
<script src="{{asset('frontend/vendor/elevatezoom/jquery.elevatezoom.js')}}"></script>

<script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script type="text/javascript" src="{{ asset('js/flytocart.js') }}"></script>
<script>
     $(document).ready(function(){      
        $('.addtocart').click(function() {
            var quantity = $("input[name='quantity']").val();
            var id = $(this).attr("data-id") 
            var name = $(this).attr("data-name") 
            var price = 0;            
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });  
                      
            $.ajax({
               type:'POST',
               url:'{{ url("/add-to-cart") }}',              
               data: {
                    'id': id,//just test
                    'name': name,//just test
                    'price': {{$product->price}},//just test
                    'quantity': quantity  ,//just test
                },
               success:function(response){
                    console.log(response['newCartItemCount']); //debug
                    //$('.cartItemCount').html($('.cartItemCount').html().replace (/\((.*?)\)/g,"(" + response['newCartItemCount'] + ")"));
                    $('.cart-qty').html('(' + response['newCartItemCount'] + ')' );//+ '{{trans('shoppings.items')}}' 
               },
               error:function(response){
                    console.log(response['newCartItemCount']); //debug
               }
            });
        });
        
        $('.addtowishlist').click(function() {
            var id = $(this).attr("data-id") 
            var name = $(this).attr("data-name")             
            // $(this).effect("shake", {
            //     times: 1
            // }, 200);
            
            $.ajax({
               type:'POST',
               url:'{{ url("/add-to-wishlist") }}',              
               data: {
                    'id': id,//just test
                    'name': name,//just test
                    'price': 0,//just test
                    'quantity': 1,//just test
                },
               success:function(response){
                    console.log(response['message']); //debug
                   if(response['status'] === 'error')
                    window.location.href = "/login";
                    
               },
               error:function(response){
                    console.log(response['message']); //debug
               }
            });
        });
        $('.call').click(function() {
            var x = document.getElementById("call-number");
            if (x.style.display === "none") {
                x.style.display = "block";
            } else {
                x.style.display = "none";
            }
        });
    });
</script>
@endsection