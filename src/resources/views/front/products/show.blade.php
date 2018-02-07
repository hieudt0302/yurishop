@extends('layouts.master')
@section('title',$product->name)
@section('header')
<!-- Share Nav -->
@include('layouts.share')
@endsection
@section('content')
<section class="page-header mb-lg">

	<div class="container">
		<ul class="breadcrumb">
			<li><a href="#">Trang chủ</a></li>

			<li><a href="#">Sản phẩm</a></li>
			<li class="active">{{$product->translation->name??$product->name}}</li>
		</ul>
	</div>
</section>

<div class="container">
	<div class="row">
		<div class="col-md-9">
			<div class="product-view">
				<div class="product-essential">
					<div class="row">
						<div class="product-img-box col-sm-5">
							<div class="product-img-box-wrapper">
                                <div class="product-img-wrapper">
                                	<img id="product-zoom" src="{{asset('/storage')}}/{{$product->GetMediaByOrderAsc()->thumb??'images/no-image.png'}}" data-zoom-image="{{asset('/storage')}}/{{$product->GetMediaByOrderAsc()->thumb??'images/no-image.png'}}" alt="Product main image">
                                </div>

								<a href="#" class="product-img-zoom" title="Zoom">
									<span class="glyphicon glyphicon-search"></span>
								</a>
							</div>

							<div class="owl-carousel manual" id="productGalleryThumbs">
								@foreach($product->medias as $media)
								<div class="product-img-wrapper">
									<a href="#" data-image="{{asset('/storage')}}/{{$media->source}}" data-zoom-image="{{asset('/storage')}}/{{$media->source}}" class="product-gallery-item">
                                        <img src="{{asset('/storage')}}/{{$media->source}}" alt="product">
                                    </a>
								</div>
								@endforeach
								
								
							
							</div>
						</div>

						<div class="product-details-box col-sm-7">
							<h1 class="product-name">
								{{$product->translation->name??$product->name}}
							</h1>

							<div class="product-rating-container">
                                <div class="product-ratings">
									<div class="ratings-box">
										<div class="rating" style="width:{{$product->comments->avg('rate')/5*100}}%"></div>
									</div>
								</div>
                                <div class="review-link">
                                    <a href="#" class="review-link-in" rel="nofollow"> <span class="count">{{count($product->comments)}}</span> đánh giá từ khách hàng</a> | 
                                    <a href="#" class="write-review-link" rel="nofollow">Đánh giá sản phẩm</a>
                                </div>
                            </div>

                            <div class="product-short-desc">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
							</div>

							<div class="product-detail-info">
								<div class="product-price-box">
									@if(!$is_sales)
									<span class="product-price">{{FormatPrice::price($product->price)}}</span>
									@else
									<span class="old-price">{{FormatPrice::price($product->price)}}</span>
									<span class="product-price">{{FormatPrice::price($product->special_price)}}</span>
									@endif
								</div>
								@if(!$product->call_for_price && !$product->disable_buy_button && !$product->sold_off)
								<p class="availability">
									<span class="font-weight-semibold">Tình trạng kho:</span>
									Còn hàng
								</p>
								@endif
							</div>

							<div class="product-detail-options">
								<div class="row">
									<div class="col-xs-6">
										<label><span class="required">*</span>Màu sắc:<span class="text-primary">Đen</span></label>
										<ul class="configurable-filter-list filter-list-color">
											<li>
												<a href="#">
													<span style="background-color: #000"></span>
												</a>
											</li>
											<li>
												<a href="#">
													<span style="background-color: #21284f"></span>
												</a>
											</li>
											<li>
												<a href="#">
													<span style="background-color: #272725"></span>
												</a>
											</li>
											<li>
												<a href="#">
													<span style="background-color: #006b20"></span>
												</a>
											</li>
											<li>
												<a href="#">
													<span style="background-color: #68686a"></span>
												</a>
											</li>
										</ul>
									</div>
									<div class="col-xs-6">
										<label><span class="required">*</span>Size:<span class="text-primary">S</span></label>
										<ul class="configurable-filter-list">
											<li>
												<a href="#">S</a>
											</li>
											<li>
												<a href="#">M</a>
											</li>
											<li>
												<a href="#">L</a>
											</li>
											<li>
												<a href="#">XL</a>
											</li>
										</ul>
									</div>
								</div>
							</div>

							<div class="product-actions">
								<div class="product-detail-qty">
                                    <input type="text" value="1" name="quantity" class="vertical-spinner" id="product-vqty">
                                </div>
								<a href="#" class="addtocart" title="Add to Cart">
									<i class="fa fa-shopping-cart"></i>
									<span>Thêm vào giỏ hàng</span>
								</a>
								
								<div class="actions-right">
									<a href="#" class="addtowishlist" title="Thêm vào Wishlist">
										<i class="fa fa-heart"></i>
									</a>
								</div>
							</div>

							<div class="product-share-box">
								<div class="addthis_inline_share_toolbox"></div>
								 
							</div>
						</div>
					</div>
				</div>

				<div class="panel-group produt-panel" id="accordion">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse1One">
									Mô tả sản phẩm
								</a>
							</h4>
						</div>
						<div id="collapse1One" class="accordion-body collapse">
							<div class="panel-body">
								<div class="product-desc-area">
									{!!$product->translation->description??''!!}
								</div>
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse1Two">
									Thông tin khác
								</a>
							</h4>
						</div>
						<div id="collapse1Two" class="accordion-body collapse">
							<div class="panel-body">
								{!!$product->translation->specs??''!!}
							</div>
						</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse1Four">
									Đánh giá ({{count($product->comments)}})
								</a>
							</h4>
						</div>
						<div id="collapse1Four" class="accordion-body collapse">
							<div class="panel-body">
								<div class="add-product-review">
									<h3 class="text-uppercase heading-text-color font-weight-semibold">CHO CHÚNG TÔI BIẾT CẢM NHẬN CỦA BẠN</h3>
									<form action="#">
										<table class="ratings-table">
											<thead>
												<tr>
													<th>1 sao</th>
													<th>2 sao</th>
													<th>3 sao</th>
													<th>4 sao</th>
													<th>5 sao</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>
														<input type="radio" name="ratings[1]" id="Quality_1" value="1" class="radio">
													</td>
													<td>
														<input type="radio" name="ratings[1]" id="Quality_2" value="2" class="radio">
													</td>
													<td>
														<input type="radio" name="ratings[1]" id="Quality_3" value="3" class="radio">
													</td>
													<td>
														<input type="radio" name="ratings[1]" id="Quality_4" value="4" class="radio">
													</td>
													<td>
														<input type="radio" name="ratings[1]" id="Quality_5" value="5" class="radio">
													</td>
												</tr>
											</tbody>
										</table>

										<div class="form-group">
											<label>Tên<span class="required">*</span></label>
											<input type="text" class="form-control" required>
										</div>
										<div class="form-group">
											<label>Đánh giá chung<span class="required">*</span></label>
											<input type="text" class="form-control" required>
										</div>
										<div class="form-group mb-xlg">
											<label>Đánh giá chi tiết<span class="required">*</span></label>
											<textarea cols="5" rows="6" class="form-control"></textarea>
										</div>

										<div class="text-right">
											<input type="submit" class="btn btn-primary" value="Submit Review">
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<h2 class="slider-title">
                <span class="inline-title">Sản phẩm được yêu thích</span>
                <span class="line"></span>
            </h2>

            <div class="owl-carousel owl-theme" data-plugin-options="{'items':4, 'margin':20, 'nav':true, 'dots': false, 'loop': false}">
				@php($curDate = Carbon\Carbon::now())
				@foreach($best_seller_products as $product)
				<div class="product">
					<figure class="product-image-area">
						<a href="#" title="Product Name" class="product-image">
							<img src="{{asset('/storage')}}/{{$product->GetMediaByOrderAsc()->thumb??'images/no-image.png'}}" alt="Product Name">
							<img src="{{asset('/storage')}}/{{$product->GetMediaByOrderAsc()->thumb??'images/no-image.png'}}" alt="Product Name" class="product-hover-image">
						</a>
						@if($product->special_price != 0 && $product->special_price_start_date  <= $curDate && $curDate <= $product->special_price_end_date )
						<div class="product-label"><span class="discount">SALE</span></div>
						@endif
					</figure>
					<div class="product-details-area">
						<h2 class="product-name"><a href="#" title="Product Name">{{$product->translation->name??$product->name}}</a></h2>
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

						<div class="product-actions">
							<a href="#" class="addtowishlist" title="Thêm vào Wishlist">
								<i class="fa fa-heart"></i>
							</a>
							<a href="javascript:void(0)" class="addtocart" title="Thêm vào giỏ hàng">
								<i class="fa fa-shopping-cart"></i>
								<span>Đặt hàng</span>
							</a>
                            <a href="{{url('/products')}}/{{$product->slug}}" class="comparelink" title="Xem thêm">
                                <i class="fa fa-search"></i>
                            </a> 							
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
		<aside class="col-md-3 sidebar product-sidebar">
			<div class="feature-box feature-box-style-3">
				<div class="feature-box-icon">
					<i class="fa fa-truck"></i>
				</div>
				<div class="feature-box-info">
					<h4>MIỄN PHÍ VẬN CHUYỂN</h4>
					<p class="mb-none">Miễn phí vận chuyển mọi đơn hàng trên 500k.</p>
				</div>
			</div>

			<div class="feature-box feature-box-style-3">
				<div class="feature-box-icon">
					<i class="fa fa-dollar"></i>
				</div>
				<div class="feature-box-info">
					<h4>HOÀN TIỀN 100%</h4>
					<p class="mb-none">Khi có bất cứ sai sót nào về sản phẩm.</p>
				</div>
			</div>

			<div class="feature-box feature-box-style-3">
				<div class="feature-box-icon">
					<i class="fa fa-support"></i>
				</div>
				<div class="feature-box-info">
					<h4>HỖ TRỢ ONLINE 24/7</h4>
					<p class="mb-none">Hỗ trợ thông qua Messenger và Skyple.</p>
				</div>
			</div>

			<hr class="mt-xlg">

			<div class="owl-carousel owl-theme" data-plugin-options="{'items':1, 'margin': 5}">
				<a href="#">
					<img class="img-responsive" src="{{asset('frontend/img/demos/shop/banners/banner1.jpg')}}" alt="Banner">
				</a>
				<a href="#">
					<img class="img-responsive" src="{{asset('frontend/img/demos/shop/banners/banner2.jpg')}}" alt="Banner">
				</a>
			</div>

			<hr class="mb-xlg">
		</aside>
	</div>
</div>

@endsection

@section('scripts')

<!-- Current Page Vendor and Views -->
<script src="{{asset('frontend/js/views/view.contact.js')}}"></script>

<script src="{{asset('frontend/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.js')}}"></script>
<script src="{{asset('frontend/vendor/elevatezoom/jquery.elevatezoom.js')}}"></script>

<script type="text/javascript" src="{{ asset('js/flytocart.js') }}"></script>
<script>
     $(document).ready(function(){      
        $('.addtocart').click(function() {
            var quantity = $("input[name='quantity']").val();
            $.ajax({
               type:'POST',
               url:'{{ url("/add-to-cart") }}',              
               data: {
                    'id': '{{$product->id}}',//just test
                    'name': '{{$product->name}}',//just test
                    'price': {{$product->price}},//just test
                    'quantity': quantity,//just test
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
			// $(this).effect("shake", {
            //     times: 1
			// }, 200);
			
            $.ajax({
               type:'POST',
               url:'{{ url("/add-to-wishlist") }}',              
               data: {
                    'id': '{{$product->id}}',//just test
                    'name': '{{$product->name}}',//just test
                    'price': {{$product->price}},//just test
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