@extends('layouts.master')
@section('title',$product->name)
@section('header')
    <!-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> -->
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
					<div class="pro-img">
						<img src="{{asset('frontend/images/uploads/p2.png')}}" alt="">
					</div>
					<div class="more-img">
						<a href="#" class="prev"><i class="ion-ios-arrow-thin-left"></i></a>
						<img class="sub-img img1" src="{{asset('frontend/images/uploads/p2.png')}}" alt="">
						<img class="sub-img" src="{{asset('frontend/images/uploads/subimg2.png')}}" alt="">
						<img class="sub-img" src="{{asset('frontend/images/uploads/subimg3.png')}}" alt="">
						<a href="#" class="next"><i class="ion-ios-arrow-thin-right"></i></a>
					</div>
				</div>
				<div class="col-md-8 col-sm-8 col-xs-12">
					<div class="pro-list-it it">
						<span class="hot">hot</span>
						<h4 class="hd-after"><a href="#">Organic Sweetcorn</a></h4>
						<span class="right">
							<span class="star-rate small">
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star" aria-hidden="true"></i>
								<i class="fa fa-star-o" aria-hidden="true"></i>
						 	</span><br>
						 	<span class="rv">(Based on 03 reviews)</span>
						</span>
						<span class="price2">$12.00</span><span class="sub">$ 6.00</span>
						<p class="para">Cur tantas regiones barbarorum pedibus obiit, tot maria transmisit? Uterque enim summo bono fruitur, id est voluptate barbarorum pedibu biit, tot maria tranbarbarorum pedibu smiearia trana.</p>
						<img src="{{asset('frontend/images/uploads/div-line.png')}}" alt="" class="div-line">
						<div class="right-it">
								 <form class="quantity" method="post" action="#">
								      <div class="numbers-row">
								        <input type="text" name="french-hens" id="french-hens" value="3">
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
							<p>sku<span>A937-C</span></p>
							<p>Categories<span>Fruits</span></p>
							<p>Expire date<span>01/11/2015</span></p>
							<p>Tags<span>Fruit, corn, organic</span></p>
						</div>
						<img src="{{asset('frontend/images/uploads/div-line.png')}}" alt="" class="div-line-3">
						<a class="readmore" href="#">Add to cart</a>
						<a class="wishlist" href="#"><i class="fa fa-heart" aria-hidden="true"></i></a>
					</div>	
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="tabs  blogsingle-content">
					<span class="tab-links">
						<li class="active"><a href="#tab1">Description</a></li>
						<li><a href="#tab2">Additional info</a></li>
						<li><a href="#tab3">Reviews <span>(03)</span></a></li>
					</span>
					<img src="{{asset('frontend/images/uploads/div-line.png')}}" alt="" class="div-line4" width="100">
				    <div class="tab-content">
				        <div id="tab1" class="tab active comment list-item">
				            <h2 class="cmt-heading">Customer Reviews<span>(03)</span></h2>
				            <div class="cmt-it pro-list-it ">
								<div class="row">
									<div class="col-md-2 col-sm-2 col-xs-2">
										<img src="{{asset('frontend/images/uploads/cmt1.png')}}" alt="">
									</div>
									<div class="col-md-10 col-sm-10 col-xs-10">
										<div class="cmt-content">
											<h4><a href="#">Jonathan Doe</a><span class="date">July 14th, 2016</span></h4>
											<span class="right">
												<span class="star-rate small">
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star-o" aria-hidden="true"></i>
											 	</span>
											</span>
											<p>Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Indemon strunt lectores legere me lius quod ii legunt saepiu laritas est etiam pro</p>
											<a class="reply" href="#"><i class="fa fa-reply" aria-hidden="true"></i>Comment</a>
										</div>	
									</div>
								</div>
							</div>
							<img src="{{asset('frontend/images/uploads/div-line.png')}}" alt="" class="div-line4">
							<div class="cmt-it pro-list-it ">
								<div class="row">
									<div class="col-md-2 col-sm-2 col-xs-2">
										<img src="{{asset('frontend/images/uploads/cmt1.png')}}" alt="">
									</div>
									<div class="col-md-10 col-sm-10 col-xs-10">
										<div class="cmt-content">
											<h4><a href="#">Jonathan Doe</a><span class="date">July 14th, 2016</span></h4>
											<span class="right">
												<span class="star-rate small">
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star-o" aria-hidden="true"></i>
											 	</span>
											</span>
											<p>Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Indemon strunt lectores legere me lius quod ii legunt saepiu laritas est etiam pro</p>
											<a class="reply" href="#"><i class="fa fa-reply" aria-hidden="true"></i>Comment</a>
										</div>	
									</div>
								</div>
							</div>
							<img src="{{asset('frontend/images/uploads/div-line.png')}}" alt="" class="div-line4">
				        </div>
				        <div id="tab2" class="tab comment list-item">
				           <h2 class="cmt-heading">Customer Reviews<span>(03)</span></h2>
				            <div class="cmt-it pro-list-it ">
								<div class="row">
									<div class="col-md-2 col-sm-2 col-xs-2">
										<img src="{{asset('frontend/images/uploads/cmt1.png')}}" alt="">
									</div>
									<div class="col-md-10 col-sm-10 col-xs-10">
										<div class="cmt-content">
											<h4><a href="#">Jonathan Doe</a><span class="date">July 14th, 2016</span></h4>
											<span class="right">
												<span class="star-rate small">
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star-o" aria-hidden="true"></i>
											 	</span>
											</span>
											<p>Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Indemon strunt lectores legere me lius quod ii legunt saepiu laritas est etiam pro</p>
											<a class="reply" href="#"><i class="fa fa-reply" aria-hidden="true"></i>Comment</a>
										</div>	
									</div>
								</div>
							</div>
							<img src="{{asset('frontend/images/uploads/div-line.png')}}" alt="" class="div-line4">
				        </div>
				        <div id="tab3" class="tab comment list-item">
				        	<h2 class="cmt-heading">Customer Reviews<span>(03)</span></h2>
				            <div class="cmt-it pro-list-it ">
								<div class="row">
									<div class="col-md-2 col-sm-2 col-xs-2">
										<img src="{{asset('frontend/images/uploads/cmt1.png')}}" alt="">
									</div>
									<div class="col-md-10 col-sm-10 col-xs-10">
										<div class="cmt-content">
											<h4><a href="#">Jonathan Doe</a><span class="date">July 14th, 2016</span></h4>
											<span class="right">
												<span class="star-rate small">
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star-o" aria-hidden="true"></i>
											 	</span>
											</span>
											<p>Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Indemon strunt lectores legere me lius quod ii legunt saepiu laritas est etiam pro</p>
											<a class="reply" href="#"><i class="fa fa-reply" aria-hidden="true"></i>Comment</a>
										</div>	
									</div>
								</div>
							</div>
							<img src="{{asset('frontend/images/uploads/div-line.png')}}" alt="" class="div-line4">
							<div class="cmt-it pro-list-it ">
								<div class="row">
									<div class="col-md-2 col-sm-2 col-xs-2">
										<img src="{{asset('frontend/images/uploads/cmt1.png')}}" alt="">
									</div>
									<div class="col-md-10 col-sm-10 col-xs-10">
										<div class="cmt-content">
											<h4><a href="#">Jonathan Doe</a><span class="date">July 14th, 2016</span></h4>
											<span class="right">
												<span class="star-rate small">
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star-o" aria-hidden="true"></i>
											 	</span>
											</span>
											<p>Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Indemon strunt lectores legere me lius quod ii legunt saepiu laritas est etiam pro</p>
											<a class="reply" href="#"><i class="fa fa-reply" aria-hidden="true"></i>Comment</a>
										</div>	
									</div>
								</div>
							</div>
							<img src="{{asset('frontend/images/uploads/div-line.png')}}" alt="" class="div-line4">
							<div class="cmt-it pro-list-it ">
								<div class="row">
									<div class="col-md-2 col-sm-2 col-xs-2">
										<img src="{{asset('frontend/images/uploads/cmt1.png')}}" alt="">
									</div>
									<div class="col-md-10 col-sm-10 col-xs-10">
										<div class="cmt-content">
											<h4><a href="#">Jonathan Doe</a><span class="date">July 14th, 2016</span></h4>
											<span class="right">
												<span class="star-rate small">
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star" aria-hidden="true"></i>
													<i class="fa fa-star-o" aria-hidden="true"></i>
											 	</span>
											</span>
											<p>Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Indemon strunt lectores legere me lius quod ii legunt saepiu laritas est etiam pro</p>
											<a class="reply" href="#"><i class="fa fa-reply" aria-hidden="true"></i>Comment</a>
										</div>	
									</div>
								</div>
							</div>
							<img src="{{asset('frontend/images/uploads/div-line.png')}}" alt="" class="div-line4">
			       	 	</div>
				    </div>
				    <!-- comment form -->
					<form action="#" class="post-cmt">
						<label>Add a Review</label>
							<div class="row">
								<div class="col-md-4 col-sm-4 col-xs-12">
									<input class="name" type="text" placeholder="Lee Bui">
								</div>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<input class="email" type="text" placeholder="E-mail*">
								</div>
								<div class="col-md-4 col-sm-4 col-xs-12">
									<input class="website" type="text" placeholder="Website">
								</div>
							</div>
							<div class="row">
								<div class="col-md-12 col-sm-12 col-xs-12">
									<input  class="comt" type="textarea" placeholder="Comment*">
								</div>
							</div>
							<input class="submit" type="submit" value="post comment">
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