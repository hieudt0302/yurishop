@extends('layouts.master')
@section('title','Poko Farms - Product')
@section('header')

@endsection

@section('content')
<div class="hero">
    <div class="container">
        @if(!empty($promo)&&$promo==true)
        <div class="row">
            <div class="col-md-12">
                <h1>@lang('header.promotion')</h1>
                <ul class="breadcumb">
                    <li><a href="#">@lang('common.home')</a></li>
                    <li><span>/</span><a href="#">@lang('product.product')</a></li>
                    <li><span>/</span>@lang('header.promotion')</li>
                </ul>
            </div>
        </div>
        @else
        <div class="row">
            <div class="col-md-12">
                <h1>{{$category->translation->name??'List'}}</h1>
                <ul class="breadcumb">
                    <li><a href="#">@lang('common.home')</a></li>
                    <li><span>/</span><a href="#">@lang('product.product')</a></li>
                    <li><span>/</span>{{$category->translation->name??'List'}}</li>
                </ul>
            </div>
        </div>
        @endif
    </div>
</div>

<section class="shopgrid products">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="left-it">
					<h5>@lang('common.showing') <span class="sub">{{($results->currentPage()- 1) * 21 + 1}}-{{$results->total() * $results->currentPage() }} @lang('common.of') {{$results->count()}}</span> </h5>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="right-it">
						<div class="drop">
							<select>
								<option value="default sorting">default sorting</option>
								<option value="default sorting">default sorting</option>
							</select>
						</div>
						<div class="drop">
							<select>
								<option value="by categories">by categories</option>
								<option value="by categories">by categories</option>
							</select>
						</div>
						<div class="icon-select">
							<a href="shoplist.html"><i class="fa fa-bars" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="List"></i></a>
							<a href="shopgridv2.html"><i class="fa fa-th" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Grid"></i></a>
						</div>
				</div>
			</div>
        </div>
        @foreach($results as $key => $product)
            @if($key == 0 || $key%4 === 0)
            <div class="row">
                <div class="products-it">
            @endif                    
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="pro-it">
                        <i class="fa fa-heart-o" aria-hidden="true"></i>
                        <a href="{{url('/products')}}/{{$product->slug}}">
                        <img class="pro-img" src="{{asset('/storage')}}/{{$product->GetMediaByOrderAsc()->thumb??'images/no-image.png'}}" alt="">
                        </a>
                        <div class="pro-infor">
                            <h2>{{$product->translation->name??$product->name}}</h2>
                            <span class="pro-cost">{{$product->price}}</span>
                        </div>
                    </div>
                </div>
            @if(($key > 0 && ($key+1) %4 === 0) || $key +1 ===count($results))
                </div>
            </div>
            @endif
        @endforeach
		
        
		<div class="row">
			<div class="blogpanigation">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<!-- <ul>
						<li class="prev"><a href="#">prev</a></li>
						<li class="num"><a href="#">1</a></li>
						<li class="num active"><a href="#">2</a></li>
						<li class="num"><a href="#">3</a></li>
						<li><a href="#">...</a></li>
						<li class="num2"><a href="#">13</a></li>
						<li class="num2"><a href="#">14</a></li>
						<li class="next"><a href="#">next</a></li>
					</ul> -->
                    {{ $results->links() }}
				</div>
			</div>
		</div>
	</div>
</section>

@endsection
@section('scripts')
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<script type="text/javascript" src="{{ asset('js/flytocart.js') }}"></script>
<script>
     $(document).ready(function(){      
        $('.add-shoopingcart').click(function() {
            var id = $("input[name='product_id']").val();
            var name = $("input[name='product_name']").val();
            var price = $("input[name='product_price']").val();
            var quantity = 1;//$("input[name='quantity']").val();
            $.ajax({
               type:'POST',
               url:'{{ url("/add-to-cart") }}',              
               data: {
                    'id': id, //just test
                    'name': name,//just test
                    'price': price,//just test
                    'quantity': quantity,//just test
                },
               success:function(response){
                console.log(response['message']);
               },
               error:function(response){
                  console.log(response['message']);
               }
            });
        });
    });
</script>
@endsection