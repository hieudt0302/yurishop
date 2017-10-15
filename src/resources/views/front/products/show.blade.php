@extends('layouts.master')
@section('title',$product->name)
@section('header')
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
@endsection
@section('content')

<!-- Head Section -->
<section class="small-section bg-gray-lighter pt-30 pb-30">
    <div class="relative container align-left">
        <div class="row">
            
            <div class="col-md-8">
                <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">@lang('shoppings.product-details')</h1>
            </div>
            
            <div class="col-md-4 mt-30">
                <div class="mod-breadcrumbs font-alt align-right">
                    <a href="#">@lang('header.home')</a>&nbsp;/&nbsp;<a href="#">@lang('header.shop')</a>
                </div>
                
            </div>
        </div>
        
    </div>
</section>
<!-- End Head Section -->


<!-- Section -->
<section class="page-section">
    <div class="container relative">
        <!-- Product Content -->
        <div class="row mb-60 mb-xs-30">
            
            <!-- Product Images -->
            <div class="col-md-4 mb-md-30">
                
                <div class="post-prev-img">
                    <a href="{{asset('images/caphe.jpg')}}" class="lightbox-gallery-3 mfp-image"><img class="product-main-img" src="{{asset('images/caphe.jpg')}}" alt="" /></a>
                    @if(!empty($product->special_price_start_date) && $product->special_price_start_date  <= $product->special_price_end_date )
                    <div class="intro-label">
                        <span class="label label-danger bg-red">Sale</span>
                    </div>
                    @endif
                </div>
                
                <div class="row">
                    
                    <div class="col-xs-3 post-prev-img">
                        <a href="{{asset('images/shop/shop-prev-2.jpg')}}" class="lightbox-gallery-3 mfp-image"><img src="{{asset('images/shop/shop-prev-2.jpg')}}" alt="" /></a>
                    </div>
                    
                    <div class="col-xs-3 post-prev-img">
                        <a href="{{asset('images/shop/shop-prev-3.jpg')}}" class="lightbox-gallery-3 mfp-image"><img src="{{asset('images/shop/shop-prev-3.jpg')}}" alt="" /></a>
                    </div>
                    
                    <div class="col-xs-3 post-prev-img">
                        <a href="{{asset('images/shop/shop-prev-4.jpg')}}" class="lightbox-gallery-3 mfp-image"><img src="{{asset('images/shop/shop-prev-4.jpg')}}" alt="" /></a>
                    </div>
                    
                </div>
                
            </div>
            <!-- End Product Images -->
            
            <!-- Product Description -->
            <div class="col-sm-8 col-md-5 mb-xs-40">
                
                <h3 class="mt-0">{{$product->name??'Name not found'}}</h3>
                
                <hr class="mt-0 mb-30"/>
                
                <div class="row">
                    <div class="col-xs-6 lead mt-0 mb-20">
                        @if(!empty($product->special_price_start_date) && $product->special_price_start_date  <= $product->special_price_end_date )
                            <del class="section-text">{{$product->price}}</del> &nbsp;
                            <strong>{{$product->special_price}}</strong>
                        @else
                        @if($product->old_price > 0)
                            <del class="section-text">{{$product->old_price}}</del> &nbsp;
                            @endif
                            <strong>{{$product->price}}</strong>
                        @endif
                    </div>
                    <div class="col-xs-6 align-right section-text">

                        @if($starAvg>=1)
                        <i class="fa fa-star"></i>
                        @else
                        <i class="fa fa-star-o"></i>
                        @endif
                        @if($starAvg>=2)
                        <i class="fa fa-star"></i>
                        @else
                        <i class="fa fa-star-o"></i>
                        @endif
                        @if($starAvg>=3)
                        <i class="fa fa-star"></i>
                        @else
                        <i class="fa fa-star-o"></i>
                        @endif
                        @if($starAvg>=4)
                        <i class="fa fa-star"></i>
                        @else
                        <i class="fa fa-star-o"></i>
                        @endif
                        @if($starAvg>=5)
                        <i class="fa fa-star"></i>
                        @else
                        <i class="fa fa-star-o"></i>
                        @endif
                        &nbsp;({{count($product->comments)}} reviews)
                    </div>
                </div>
                
                <hr class="mt-0 mb-30"/> 
                
                <div class="section-text mb-30">
                    {{$product->translation->summary}}
                </div>
                
                <hr class="mt-0 mb-30"/> 
                
                <div class="mb-30">
                    <!-- <form method="post" action class="form"> -->
                    <div class="form">
                        <input name="quantity" type="number" class="input-lg round" min="1" max="1000000" value="1" />
                        <button  class="btn btn-mod btn-large btn-round add-shoopingcart">Add to Cart</button> 
                    </div>
                       
                    <!-- </form> -->
                </div>
                
                <hr class="mt-0 mb-30"/> 
                
                <div class="section-text small">
                    <div>SKU: {{$product->sku??'-----'}}</div>
                    @if(!empty($product->category))
                    <div>Category:
                        <a href="{{url('category')}}/{{$product->category->slug}}"> {{$product->category->name}}</a>
                    </div>
                    @endif
                    <div>Tags: 
                        @foreach ($product->tags as $tag)
                        <a href="{{url('tag')}}/{{$tag->slug}}">{{$tag->name}}</a>, 
                        @endforeach
                    </div>
                </div>
                
            </div>
            <!-- End Product Description -->
            
            <!-- Features -->
            <div class="col-sm-4 col-md-3 mb-xs-40">
                
                <!-- Features Item -->
                <div class="alt-service-wrap">
                    <div class="alt-service-item">
                        <div class="alt-service-icon">
                            <i class="fa fa-paper-plane-o"></i>
                        </div>
                        <h3 class="alt-services-title font-alt">Free Shipping</h3>
                        Vivamus neque orci, ultricies blandit ultricies vel, semper..
                    </div>
                </div>
                <!-- End Features Item -->
                
                <!-- Features Item -->
                <div class="alt-service-wrap">
                    <div class="alt-service-item">
                        <div class="alt-service-icon">
                            <i class="fa fa-clock-o"></i>
                        </div>
                        <h3 class="alt-services-title font-alt">14 days moneyback</h3>
                        Vivamus neque orci, ultricies blandit ultricies vel, semper..
                    </div>
                </div>
                <!-- End Features Item -->
                
                <!-- Features Item -->
                <div class="alt-service-wrap">
                    <div class="alt-service-item">
                        <div class="alt-service-icon">
                            <i class="fa fa-gift"></i>
                        </div>
                        <h3 class="alt-services-title font-alt">100% Original</h3>
                        Vivamus neque orci, ultricies blandit ultricies vel, semper..
                    </div>
                </div>
                <!-- End Features Item -->
                    
                    
                
            </div>
            <!-- End Features -->
            
        </div>
        <!-- End Product Content -->
        
        
        <!-- Nav tabs -->
        <ul class="nav nav-tabs tpl-tabs animate">
            <li class="active">
                <a href="#one" data-toggle="tab">Description</a>
            </li>
            <li>
                <a href="#two" data-toggle="tab">Specs</a>
            </li>
            <li>
                <a href="#three" data-toggle="tab">Reviews ({{count($product->comments)}})</a>
            </li>
        </ul>
        <!-- End Nav tabs -->
        
        <!-- Tab panes -->
        <div class="tab-content tpl-tabs-cont">
            <div class="tab-pane fade in active" id="one">
                {{$product->translation->description}}
            </div>
            <div class="tab-pane fade" id="two">
                
                {{$product->translation->specs}}
                
            </div>
            <div class="tab-pane fade" id="three">
                    <div class="mb-60 mb-xs-30">
                        <ul class="media-list text comment-list clearlist">
                            @foreach($product->comments as  $review)
                            <!-- Comment Item -->
                            <li class="media comment-item">
                                <a class="pull-left" href="#"><img class="media-object comment-avatar" src="{{asset('images/user-avatar.png')}}" alt=""></a>
                                <div class="media-body">
                                    <div class="comment-item-data">
                                        <div class="comment-author">
                                            <a href="#">{{$review->name}}</a>
                                        </div>
                                        {{$review->created_at}}<span class="separator">&mdash;</span>
                                        
                                        <span>
                                            @if($review->rate>=1)
                                            <i class="fa fa-star"></i>
                                            @else
                                            <i class="fa fa-star-o"></i>
                                            @endif
                                            @if($review->rate>=2)
                                            <i class="fa fa-star"></i>
                                            @else
                                            <i class="fa fa-star-o"></i>
                                            @endif
                                            @if($review->rate>=3)
                                            <i class="fa fa-star"></i>
                                            @else
                                            <i class="fa fa-star-o"></i>
                                            @endif
                                            @if($review->rate>=4)
                                            <i class="fa fa-star"></i>
                                            @else
                                            <i class="fa fa-star-o"></i>
                                            @endif
                                            @if($review->rate>=5)
                                            <i class="fa fa-star"></i>
                                            @else
                                            <i class="fa fa-star-o"></i>
                                            @endif
                                            
                                        </span>
                                        
                                    </div>
                                    <p>
                                    {{$review->comment}}
                                    </p>
                                </div>
                            </li>
                            <!-- End Comment Item -->
                            @endforeach
                        </ul>
                    </div>
                    
                    <!-- Add Review -->
                    <div>
                        
                        <h4 class="blog-page-title font-alt">Add Review</h4>
                        
                        <!-- Form -->
                        <form method="post" action="{{url('/products')}}/{{$product->id}}/review" id="form" role="form" class="form">
                            {{ csrf_field() }}
                            <input type="hidden" id="product_id" name="product_id" value="{{$product->id}}">
                            @guest
                            <div class="row mb-20 mb-md-10">                                
                                <div class="col-md-6 mb-md-10">
                                    <!-- Name -->
                                    <input type="text" name="name" id="name" class="input-md form-control" placeholder="Name *" maxlength="100" required>
                                </div>
                                <div class="col-md-6">
                                    <!-- Email -->
                                    <input type="email" name="email" id="email" class="input-md form-control" placeholder="Email *" maxlength="100" required>
                                </div>                                
                            </div>
                            @else
                            <input type="hidden" id="reviewer_id" name="reviewer_id" value="{{Auth::user()->id}}">
                            <input type="hidden" id="name" name="name" value="{{Auth::user()->last_name}} {{Auth::user()->first_name}}">
                            <input type="hidden" id="email" name="email" value="{{Auth::user()->email}}">
                            @endguest
                            <div class="mb-20 mb-md-10">
                                <!-- Rating -->
                                <select name="rate" class="input-md round form-control">
                                    <option value="0">-- Select one --</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                </select>
                            </div>
                            
                            <!-- Comment -->
                            <div class="mb-30 mb-md-10">
                                <textarea name="comment" id="text" class="input-md form-control" rows="6" placeholder="Comment" maxlength="400"></textarea>
                            </div>
                            
                            <!-- Send Button -->
                            <button type="submit" class="btn btn-mod btn-medium btn-round">
                                Send Review
                            </button>
                            
                        </form>
                        <!-- End Form -->
                        
                    </div>
                    <!-- End Add Review -->
                    
            </div>
        </div>
        <!-- End Tab panes -->
    
    </div>
</section>
<!-- End Section -->


<!-- Divider -->
<hr class="mt-0 mb-0 "/>
<!-- End Divider -->


<!-- Related Products -->
@if(count($relatedProducts) > 0)
<section class="page-section">
    <div class="container relative">
        
        <h2 class="section-title font-alt mb-70 mb-sm-40">
            @lang('shoppings.related-products')
        </h2>
        
        <!-- Products Grid -->
                <div class="row multi-columns-row">
                    <!-- Shop Item -->
                    @foreach(@relatedProducts as $item)
                    <div class="col-md-3 col-lg-3 mb-60 mb-xs-40">
                        
                        <div class="post-prev-img">
                            
                            <a href="shop-single.html"><img src="{{asset('images/shop/shop-prev-1.jpg')}}" alt="" /></a>
                            
                            <div class="intro-label">
                                <span class="label label-danger bg-red">Sale</span>
                            </div>
                            
                        </div>
                        
                        <div class="post-prev-title font-alt align-center">
                            <a href="shop-single.html">G-Star Polo Applique Jersey</a>
                        </div>

                        <div class="post-prev-text align-center">
                            <del>$150.00</del>
                            &nbsp;
                            <strong>$94.75</strong>
                        </div>
                        
                        <div class="post-prev-more align-center">
                            <a href="#" class="btn btn-mod btn-gray btn-round"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                        </div>
                        
                    </div>
                    @endforeach
                    <!-- End Shop Item -->
                    
                   
        </div>
        <!-- End Products Grid -->
        
    </div>
</section>
@endif
<!-- End Related Products -->

@endsection

@section('scripts')
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
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