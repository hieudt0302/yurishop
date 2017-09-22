
@extends('layouts.master')
@section('title',$seo_title)
@section('content')

<!-- Head Section -->
    <section class="small-section bg-gray-lighter">
        <div class="relative container align-left">
            
            <div class="row">
                
                <div class="col-md-8">
                    <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">Shop</h1>
                    <div class="hs-line-4 font-alt black">
                        Choose the best products in our shop
                    </div>
                </div>
                
                <div class="col-md-4 mt-30">
                    <div class="mod-breadcrumbs font-alt align-right">
                        <a href="#">Home</a>&nbsp;/&nbsp;<a href="#">Shop</a>&nbsp;/&nbsp;<span>{{ $productCat->name }}</span>
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
                            Showing 1–12 of 23 results
                        </div>
                        
                        <div class="right">
                            <form method="post" action="#" class="form">
                                <select class="input-md round">
                                    <option>Default sorting</option>
                                    <option>Sort by price: low to high</option>
                                    <option>Sort by price: high to low</option>
                                </select>
                            </form>
                        </div>
                        
                    </div>
                    <!-- End Shop options -->
                    
                    <div class="row multi-columns-row">
                
                        @foreach($products as $product)
                        <?php $productSeo = \DB::table('seo')->where('system_id', $product->system_id)->first(); ?>
                        <!-- Shop Item -->
                        <div class="col-md-4 col-lg-4 mb-60 mb-xs-40">
                            
                            <div class="post-prev-img">
                                
                                <a href="{{ route('front.item.show',$productSeo->slug) }}"><img src="{{ asset('public/assets/img/product/' . $product->thumb) }}" alt="" /></a>
                                
                                @if($product->is_promote == 1)
                                <div class="intro-label">
                                    <span class="label label-danger bg-red">Sale</span>
                                </div>
                                @endif 

                            </div>
                            
                            <div class="post-prev-title font-alt align-center">
                                <a href="{{ route('front.item.show',$productSeo->slug) }}">{{ $product->name }}</a>
                            </div>

                            <div class="post-prev-text align-center">
                                @if($product->is_promote == 1)
                                <del>{!! price_format($product->default_price,'VNĐ') !!}</del>
                                &nbsp;
                                <strong>{!! price_format($product->promote_price,'VNĐ') !!}</strong>
                                @else
                                <strong>{!! price_format($product->default_price,'VNĐ') !!}</strong>
                                @endif    
                            </div>
                            
                            <div class="post-prev-more align-center">
                                <a href="#" class="btn btn-mod btn-gray btn-round"><i class="fa fa-shopping-cart"></i> @lang('shoppings.add-cart')</a>
                            </div>
                            
                        </div>
                        <!-- End Shop Item -->
                        @endforeach
                        
                        
                    </div>
                    
                    <!-- Pagination -->
                    <div class="pagination">
                        <a href=""><i class="fa fa-angle-left"></i></a>
                        <a href="" class="active">1</a>
                        <a href="">2</a>
                        <a href="">3</a>
                        <a class="no-active">...</a>
                        <a href="">9</a>
                        <a href=""><i class="fa fa-angle-right"></i></a>
                    </div>
                    <!-- End Pagination -->
                    
                </div>
                <!-- End Content -->
                
                <!-- Sidebar -->
                <div class="col-sm-4 col-md-3 col-md-offset-1 sidebar">
                    
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
                        
                        <h5 class="widget-title font-alt">@lang('shoppings.filter-price')</h5>
                        
                        <div class="widget-body">
                            <form method="post" action="#" class="form">
                                
                                <div class="row mb-20">
                                    <div class="col-xs-6">
                                        <input type="text" name="price-from" id="price-from" class="input-md round form-control" placeholder="From, $" maxlength="100">
                                    </div>
                                    
                                    <div class="col-xs-6">
                                        <input type="text" name="price-to" id="price-to" class="input-md round form-control" placeholder="To, $" maxlength="100">
                                    </div>
                                </div>
                                
                                <button class="btn btn-mod btn-medium btn-full btn-round">@lang('shoppings.filter')</button>
                                
                            </form>
                        </div>
                        
                    </div>
                    <!-- End Widget -->
                    
                    <!-- Widget -->
                    <div class="widget">
                        
                        <h5 class="widget-title font-alt">Shop Categories</h5>
                        
                        <div class="widget-body">
                            <ul class="clearlist widget-menu">
                                <li>
                                    <a href="#" title="">Branding</a>
                                    <small>
                                        - 7
                                    </small>
                                </li>
                                <li>
                                    <a href="#" title="">Design</a>
                                    <small>
                                        - 15
                                    </small>
                                </li>
                                <li>
                                    <a href="#" title="">Development</a>
                                    <small>
                                        - 3
                                    </small>
                                </li>
                                <li>
                                    <a href="#" title="">Photography</a>
                                    <small>
                                        - 5
                                    </small>
                                </li>
                                <li>
                                    <a href="#" title="">Other</a>
                                    <small>
                                        - 1
                                    </small>
                                </li>
                            </ul>
                        </div>
                        
                    </div>
                    <!-- End Widget -->
                    
                    <!-- Widget -->
                    <div class="widget">
                        
                        <h5 class="widget-title font-alt">Bestsellers</h5>
                        
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
                    
                </div>
                <!-- End Sidebar -->
            </div>
            
        </div>
    </section>
    <!-- End Section -->

@endsection