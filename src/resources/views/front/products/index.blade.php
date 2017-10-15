@extends('layouts.master')
@section('title','Dakmark Foods - Product')
@section('header')
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
@endsection
@section('content')
<!-- Head Section -->
<section class="small-section bg-gray-lighter pt-30 pb-30">
    <div class="relative container align-left">
        
        <div class="row">
            
            <div class="col-md-8">
                <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">@lang('header.product')</h1>
            </div>
            
            <div class="col-md-4 mt-30">
                <div class="mod-breadcrumbs font-alt align-right">
                     <a href="#">@lang('header.home')</a>&nbsp;/&nbsp;<a href="#">@lang('header.product')</a>&nbsp;
                </div>
                
            </div>
        </div>
        
    </div>
</section>
<!-- End Head Section -->


<!-- Section -->
<section class="page-section">
    <div class="container relative">
        
        <div class="row">
            
            <!-- Content -->
            <div class="col-sm-8">
                 
                <!-- Shop options -->
                <div class="clearfix mb-40">
                    
                    <div class="left section-text mt-10">
                        @if(!empty($search_key) && count($products)==0)
                            @lang('common.zero-search-message')&nbsp;{{$search_key}}
                        @endif 
                    </div>
    
                </div>
                <!-- End Shop options -->
                
                <div class="row multi-columns-row">
            
                    <!-- Shop Item -->
                    @foreach($products as $product)
                    <div class="col-md-4 col-lg-4 mb-60 mb-xs-40">
                        <div class="post-prev-img">
                            <a href="{{url('/')}}/products/{{$product->id}}"><img class="product-main-img" src="images/shop/shop-prev-1.jpg" alt="" /></a>
                            <div class="intro-label">
                                <span class="label label-danger bg-red">Sale</span>
                            </div>
                        </div>
                        <div class="post-prev-title font-alt align-center">
                            <a href="{{url('/')}}/products/{{$product->id}}">{{$product->name}}</a>
                        </div>

                        <div class="post-prev-text align-center">
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
                        
                        <div class="post-prev-more align-center">
                            <input type="hidden" id="product_id" name="product_id" value="{{$product->id}}">
                            <input type="hidden" id="product_name" name="product_name" value="{{$product->name}}">
                            <input type="hidden" id="product_price" name="product_price" value="{{$product->price}}">
                            <button class="btn btn-mod btn-gray btn-round add-shoopingcart"><i class="fa fa-shopping-cart"></i> Add to cart</button>
                        </div>
                        
                    </div>
                    @endforeach
                    <!-- End Shop Item -->

                </div>
                
                <!-- Pagination -->
                {{ $products->links() }}
                <!-- <div class="pagination">
                    <a href=""><i class="fa fa-angle-left"></i></a>
                    <a href="" class="active">1</a>
                    <a href="">2</a>
                    <a href="">3</a>
                    <a class="no-active">...</a>
                    <a href="">9</a>
                    <a href=""><i class="fa fa-angle-right"></i></a>
                </div> -->
                <!-- End Pagination -->
                
            </div>
            <!-- End Content -->
            
            <!-- Sidebar -->
            <div class="col-sm-4 col-md-3 col-md-offset-1 sidebar">
                <!-- Search Widget -->
                <div class="widget">
                    {!! Form::open(array('method'=>'post','url' => '/products','class'=>'form-inline form','role'=>'form')) !!}
                        <div class="search-wrap">
                            <button class="search-button animate" type="submit" title="Start Search">
                                <i class="fa fa-search"></i>
                            </button>
                        @if(!empty($search_key))
                            <input type="text" class="form-control search-field" name="key" placeholder="{{$search_key}}">                            
                        @else
                            <input type="text" class="form-control search-field" name="key" placeholder="{{ __('common.search') }}">                        
                        @endif                             

                        </div>
                    {!! Form::close() !!}
                </div>
                <!-- End Search Widget -->                

                <!-- Widget -->
                <div class="widget">

                    <h5 class="widget-title font-alt">@lang('shoppings.cart')</h5>
                    
                    <div class="widget-body">
                        <ul class="clearlist widget-posts">
                            
                            <!-- Preview item -->
                            <li class="clearfix">
                                <a href=""><img src="images/shop/previews/shop-prev-5.jpg" alt="" class="widget-posts-img" /></a>
                                <div class="widget-posts-descr">
                                    <a href="#" title="">Polo Shirt With Argyle Print</a>
                                    <div>
                                        1 x $25.99
                                    </div>
                                    <div>
                                        <a href=""><i class="fa fa-times"></i> Remove</a>
                                    </div>
                                </div>
                            </li>
                            <!-- End Preview item -->
                            
                             <!-- Preview item -->
                            <li class="clearfix">
                                <a href=""><img src="images/shop/previews/shop-prev-4.jpg" alt="" class="widget-posts-img" /></a>
                                <div class="widget-posts-descr">
                                    <a href="#" title="">Shirt With Mesh Sleeves</a>
                                    <div>
                                        1 x $30.00
                                    </div>
                                    <div>
                                        <a href=""><i class="fa fa-times"></i> Remove</a>
                                    </div>
                                </div>
                            </li>
                            <!-- End Preview item -->
                            
                        </ul>
                        
                        <div class="clearfix mt-20">
                            
                            <div class="left mt-10">
                                Subtotal: <strong>$35.00</strong>
                            </div>
                            
                            <div class="right">
                                <a href="#" class="btn btn-mod btn-border btn-small btn-round">View Cart</a>
                            </div>
                            
                        </div>
                        
                        <div>
                            
                        </div>
                        
                    </div>
                    
                </div>
                <!-- End Widget -->
                
                <!-- Widget -->
                <div class="widget">
                    
                    <h5 class="widget-title font-alt">Shop Categories</h5>
                    
                    <div class="widget-body">
                        <ul class="clearlist widget-menu">
                            @foreach($products as $item)
                            <li>
                                <a href="#" title="">{{$item->category->name}}</a>
                                <small>
                                    - {{count($item->category->posts)}}
                                </small>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    
                </div>
                <!-- End Widget -->
                
                <!-- Widget -->
                <div class="widget">
                    
                    <h5 class="widget-title font-alt">@lang('home.best-sellers')</h5>
                    
                    <div class="widget-body">
                        <ul class="clearlist widget-posts">
                            
                            <!-- Preview item -->
                            <li class="clearfix">
                                <a href=""><img src="images/shop/previews/shop-prev-1.jpg" alt="" class="widget-posts-img" /></a>
                                <div class="widget-posts-descr">
                                    <a href="#" title="">Polo Shirt With Argyle Print</a>
                                    <div>
                                        <del>
                                            50.00
                                        </del>&nbsp;
                                        $25.99
                                    </div>
                                    <div>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                </div>
                            </li>
                            <!-- End Preview item -->
                            
                            <!-- Preview item -->
                            <li class="clearfix">
                                <a href=""><img src="images/shop/previews/shop-prev-2.jpg" alt="" class="widget-posts-img" /></a>
                                <div class="widget-posts-descr">
                                    <a href="#" title="">Polo Slim Fit Pique Badge Logo</a>
                                    <div>
                                        $75.00
                                    </div>
                                    <div>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                </div>
                            </li>
                            <!-- End Preview item -->
                            
                            <!-- Preview item -->
                            <li class="clearfix">
                                <a href=""><img src="images/shop/previews/shop-prev-3.jpg" alt="" class="widget-posts-img" /></a>
                                <div class="widget-posts-descr">
                                    <a href="#" title="">Esprit Pique Polo Shirt</a>
                                    <div>
                                        $30.99
                                    </div>
                                    <div>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                    </div>
                                </div>
                            </li>
                            <!-- End Preview item -->
                            
                            <!-- Preview item -->
                            <li class="clearfix">
                                <a href=""><img src="images/shop/previews/shop-prev-4.jpg" alt="" class="widget-posts-img" /></a>
                                <div class="widget-posts-descr">
                                    <a href="#" title="">Polo Shirt With Argyle Print</a>
                                    <div>
                                        $15.99
                                    </div>
                                    <div>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                </div>
                            </li>
                            <!-- End Preview item -->
                            
                        </ul>
                    </div>
                    
                </div>
                <!-- End Widget -->
                
                
                <!-- Widget -->
                <div class="widget">
                    
                    <h5 class="widget-title font-alt">Tags</h5>
                    
                    <div class="widget-body">
                        <div class="tags">
                            @foreach($tags as $tag)
                            <a href="">{{$tag->name}}</a>
                            @endforeach
                        </div>
                    </div>
                    
                </div>
                <!-- End Widget -->
                
            </div>
            <!-- End Sidebar -->
        </div>
        
    </div>
</section>
<!-- End Section -->

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