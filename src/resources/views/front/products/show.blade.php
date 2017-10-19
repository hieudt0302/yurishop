@extends('layouts.master')
@section('title',$product->name)
@section('header')

@endsection
@section('content')
<div class="hero">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Product detail</h1>
                <ul class="breadcumb">
                    <li><a href="#">Home</a></li>
                    <li><span>/</span><a href="#">Shop grid</a></li>
                    <li><span>/</span>Product detail</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<section class="productdetail blogsingle shoplist">
	<div class="container">
		<div class="row">
			<div class="pro-detail-infor list-item">
				<div class="col-md-4 col-sm-4 col-xs-12">
					@foreach($product->medias as $key =>  $media)
						@if($key === 0)
						<div class="pro-img">
							<img src="{{asset('/storage')}}/{{$media->source}}" alt="" class="product-main-img">
						</div>
						@else 
							@if($key === 1)
							<div class="more-img">
								<a href="#" class="prev"><i class="ion-ios-arrow-thin-left"></i></a>
							@endif 
								@if($key < 4)
									@if($key === 1)
									<img class="sub-img img1" src="{{asset('/storage')}}/{{$media->source}}" alt="">
									@else
									<img class="sub-img" src="{{asset('/storage')}}/{{$media->source}}" alt="">
									@endif
								@endif
							@if($key + 1  == count($product->medias))
								<a href="#" class="next"><i class="ion-ios-arrow-thin-right"></i></a>
							</div>
							@endif
						@endif
					@endforeach
				</div>
				<div class="col-md-8 col-sm-8 col-xs-12">
					<div class="pro-list-it it">
						<span class="hot">hot</span>
						<h4 class="hd-after"><a href="#">{{$product->translation->name??$product->name}}</a></h4>
						<span class="right">
							<span class="star-rate small">
                                @if($starAvg>=1)
                                <i class="fa fa-star" aria-hidden="true"></i>
                                @else
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                @endif
                                @if($starAvg>=2)
                                <i class="fa fa-star" aria-hidden="true"></i>
                                @else
                                <i class="fa fa-star-o"></i>
                                @endif
                                @if($starAvg>=3)
                                <i class="fa fa-star" aria-hidden="true"></i>
                                @else
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                @endif
                                @if($starAvg>=4)
                                <i class="fa fa-star" aria-hidden="true"></i>
                                @else
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                @endif
                                @if($starAvg>=5)
                                <i class="fa fa-star" aria-hidden="true"></i>
                                @else
                                <i class="fa fa-star-o" aria-hidden="true"></i>
                                @endif
						 	</span><br>
						 	<span class="rv">(Based on {{count($product->comments)}} reviews)</span>
						</span>
						<span class="price2">{{$product->old_price}}</span><span class="sub">{{$product->price}}</span>
						<p class="para">{{$product->translation->summary??''}}</p>
						<img src="{{asset('frontend/images/uploads/div-line.png')}}" alt="" class="div-line">
						<div class="right-it">
								 <form class="quantity" method="post" action="#">
								      <div class="numbers-row">
								        <input type="text" name="quantity" id="french-hens" value="3">
								      </div>
							    </form>
								<div class="drop">
									<select>
										<option value="">1 kg</option>
										<option value="">Other</option>
									</select>
								</div>
								<span class="check">
									<i class="fa fa-check-circle" aria-hidden="true"></i>In stock
								</span>	
						</div>
						<img src="{{asset('frontend/images/uploads/div-line.png')}}" alt="" class="div-line">
						<div class="pro-description"> 
							<p>sku<span>{{$product->sku}}</span></p>
							<p>@lang('common.categories')<span>{{$product->category->translation->name??''}}</span></p>
							<!-- <p>Expire date<span>01/11/2015</span></p> -->
							<p>Tags<span>
                                    @foreach($product->tags as $tag)
                                		{{$tag->name}}, 
                                		@endforeach
                                </span></p>
						</div>
						<img src="{{asset('frontend/images/uploads/div-line.png')}}" alt="" class="div-line-3">
						<a class="readmore add-shoopingcart" href="javascript:void(0)">@lang('shoppings.add-cart')</a>
						<a class="wishlist" href="#"><i class="fa fa-heart" aria-hidden="true"></i></a>
					</div>	
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="tabs  blogsingle-content">
					<span class="tab-links">
						<li class="active"><a href="#tab1">@lang('product.description')</a></li>
						<li><a href="#tab2">@lang('product.add-info')</a></li>
						<li><a href="#tab3">@lang('product.reviews') <span>({{count($product->comments)}})</span></a></li>
					</span>
					<img src="{{asset('frontend/images/uploads/div-line.png')}}" alt="" class="div-line4" width="100">
				    <div class="tab-content">
				        <div id="tab1" class="tab active comment list-item">
				            <h2 class="cmt-heading">@lang('product.description')</span></h2>
				            <div class="cmt-it pro-list-it ">
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
                                        {!!$product->translation->description??''!!}
									</div>
								
								</div>
							</div>
							<img src="{{asset('frontend/images/uploads/div-line.png')}}" alt="" class="div-line4">
			
				        </div>
				        <div id="tab2" class="tab comment list-item">
				           <h2 class="cmt-heading">@lang('product.specs')</span></h2>
				            <div class="cmt-it pro-list-it ">
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
                                        <p>
                                            {!!$product->translation->specs??''!!}
                                        </p>
									</div>
								</div>
							</div>
							<img src="{{asset('frontend/images/uploads/div-line.png')}}" alt="" class="div-line4">
				        </div>
				        <div id="tab3" class="tab comment list-item">
				        	<h2 class="cmt-heading">@lang('product.reviews')({{count($product->comments)}})</span></h2>
                            @foreach($product->comments as  $review)
                            <div class="cmt-it pro-list-it ">
								<div class="row">
									<div class="col-md-2 col-sm-2 col-xs-2">
										<img src="{{asset('frontend/images/uploads/cmt1.png')}}" alt="">
									</div>
									<div class="col-md-10 col-sm-10 col-xs-10">
										<div class="cmt-content">
											<h4><a href="#">{{$review->name}}</a><span class="date">{{date('M d, Y',strtotime($review->created_at))}}</span></h4>
											<span class="right">
												<span class="star-rate small">
                                                    @if($review->rate>=1)
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    @else
                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                    @endif
                                                    @if($review->rate>=2)
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    @else
                                                    <i class="fa fa-star-o"></i>
                                                    @endif
                                                    @if($review->rate>=3)
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    @else
                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                    @endif
                                                    @if($review->rate>=4)
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    @else
                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                    @endif
                                                    @if($review->rate>=5)
                                                    <i class="fa fa-star" aria-hidden="true"></i>
                                                    @else
                                                    <i class="fa fa-star-o" aria-hidden="true"></i>
                                                    @endif
											 	</span>
											</span>
											<p>{{$review->comment}}</p>
											<a class="reply" href="#"><i class="fa fa-reply" aria-hidden="true"></i>@lang('product.comment')</a>
										</div>	
									</div>
								</div>
							</div>
							<img src="{{asset('frontend/images/uploads/div-line.png')}}" alt="" class="div-line4">
                            @endforeach
                            
			       	 	</div>
				    </div>
				    <!-- comment form -->
					<form method="post" action="{{url('/products')}}/{{$product->id}}/review"  class="post-cmt">
                    {{ csrf_field() }}
                    <input type="hidden" id="product_id" name="product_id" value="{{$product->id}}">
                        <label>@lang('product.add-review')</label>
                            @guest
							<div class="row">
								<div class="col-md-4 col-sm-4 col-xs-12">
									<input name="name" class="name" type="text" placeholder="{{ __('profile.name')}}">
								</div>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<input name="email" class="email" type="text" placeholder="E-{{ __('profile.email')}}*">
								</div>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<input name="website" class="website" type="text" placeholder="Website">
								</div>
                            </div>
                            @else
                            <input type="hidden" id="reviewer_id" name="reviewer_id" value="{{Auth::user()->id}}">
                            <input type="hidden" id="name" name="name" value="{{Auth::user()->last_name}} {{Auth::user()->first_name}}">
                            <input type="hidden" id="email" name="email" value="{{Auth::user()->email}}">
                            <input type="hidden" id="website" name="website" value="">
                            @endguest
							<div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12">
                                    <!-- Rating -->
                                    <select name="rate">
                                        <option value="0">-- @lang('product.select-one')--</option>
                                        <option value="1">1 Star</option>
                                        <option value="2">2 Star</option>
                                        <option value="3">3 Star</option>
                                        <option value="4">4 Star</option>
                                        <option value="5">5 Star</option>
                                    </select>
                                </div>
								<div class="col-md-12 col-sm-12 col-xs-12">
									<input  class="comt" type="textarea" placeholder="{{ __('product.comment')}}*">
								</div>
                            </div>
							<input class="submit" type="submit" value="{{ __('product.send-review')}}">
					</form>
				</div>
			</div>
		</div>
	</div>
</section>


@endsection

@section('scripts')


<script type="text/javascript" src="{{ asset('js/flytocart.js') }}"></script>

<script>
     $(document).ready(function(){      
        $('.add-shoopingcart').click(function() {
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
                    /* @bravohex: refresh cart items */
                    $('.cartItemCount').html($('.cartItemCount').html().replace (/\((.*?)\)/g,"(" + response['newCartItemCount'] + ")"));
               },
               error:function(response){
                    console.log(response['newCartItemCount']); //debug
               }
            });
        });
    });
</script>
@endsection