@extends('layouts.master')
@section('title','Poko Farms - Product')
@section('header')
<!-- Share Nav -->
@include('layouts.share')
<style>
.add-on .input-group-btn > .btn {
  border-left-width:0;left:-2px;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
}
.add-on .input-group-btn > .btn:hover{
    color:#8eb35a;
}
/* stop the glowing blue shadow */
.add-on .form-control:focus {
 box-shadow:none;
 -webkit-box-shadow:none; 
 border-color:#cccccc; 
}
.form-control{width:20%}
.navbar-nav > li > a {
  border-right: 1px solid #ddd;
  padding-bottom: 15px;
  padding-top: 15px;
}
.navbar-nav:last-child{ border-right:0}
</style>
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
                    <form action="{{url('/subject/')}}/{{$parent}}/{{$slug}}" method="GET" class="navbar-form" role="search">
                        <div class="input-group add-on">
                        <input class="form-control" placeholder="Search" name="search" type="text" value="{{old('search')}}">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
                        </div>
                        </div>
                    </form>
				</div>
			</div>
        </div>
        @php($index = 0)
        @foreach($results as $product)
            @if($index == 0 || $index % 4 == 0)
            <div class="row">
                <div class="products-it">
            @endif                    
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="pro-it">
                        <a href="{{url('/products')}}/{{$product->slug}}">
                        <img class="pro-img" src="{{asset('/storage')}}/{{$product->GetMediaByOrderAsc()->thumb??'images/no-image.png'}}" alt="">
                        </a>
                        <div class="pro-infor">
                            <h2>{{$product->translation->name??$product->name}}</h2>
                            <span class="pro-cost">{{$product->price}}</span>
                        </div>
                    </div>
                </div>
            @if(($index > 0 && $index % 3 === 0) || $index + 1 === count($results))
                </div>
            </div>
            @endif
        @endforeach
		
        
		<div class="row">
			<div class="blogpanigation">
				<div class="col-md-12 col-sm-12 col-xs-12">
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