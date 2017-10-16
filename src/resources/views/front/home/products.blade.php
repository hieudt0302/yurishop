<div class="products">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="heading-sec">
					<h1>@lang('product.products')</h1>
					<h4>-@lang('home.farm-activities-message')-</h4>					
				</div>				
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12">
				<ul class="menu-filter">
					<li class="active" data-filter="*"><a href="#">Tất cả</a></li>
					<li  data-filter=".new"><a href="#">Sản phẩm mới</a></li>
					<li  data-filter=".hot"><a href="#">Sản phẩm hot</a></li>
					<li  data-filter=".sale"><a href="#">Sản phẩm khuyến mãi</a></li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="products-it grid">
			@foreach($new_products as $product)
				<div class="pro-it col-md-3 col-sm-6 col-xs-12
					<img class="pro-img" src="images/uploads/p1.jpg" alt="">
					<div class="pro-infor">
						<h2><a href="{{url('/products')}}/{{$product->id}}">{{$product->name}}</a></h2>
						<span class="pro-cost">
							@if($product->special_price != 0 && $product->special_price_start_date  <= $product->special_price_end_date )
                            <del class="section-text">{{$product->price}}</del> &nbsp;
                            <strong>{{$product->special_price}}</strong>
                        	@else
                            	@if($product->old_price > 0)
                            	<del class="section-text">{{$product->old_price}}</del> &nbsp;
                            	@endif
                            	<strong>{{$product->price}}</strong>
                        	@endif
						</span>
					</div>
					<div class="hover-inner">	
						<a class="search" href="{{url('/products')}}/{{$product->id}}" data-toggle="tooltip" data-placement="top" title="Quick view">
							<i class="fa fa-search" aria-hidden="true"></i>
						</a>
						<a class="cart" href="#" data-toggle="tooltip" data-placement="top" title="Add to cart">
							<i class="fa fa-shopping-cart" aria-hidden="true"></i>
						</a>
						<a class="wishlist" href="#"  data-toggle="tooltip" data-placement="top" title="Add to wishlist">
							<i class="fa fa-heart" aria-hidden="true"></i>
						</a>
					</div>
            	</div>
            @endforeach        						
			</div>	
		</div>
	</div>
</div>