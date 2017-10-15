@extends('layouts.master') 
@section('title','Dakmark Foods - Search')
@section('header')
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
@endsection 
@section('content')

<!-- Head Section -->
<section class="small-section bg-gray-lighter pt-30 pb-30" style="background-image:url('{{ asset('public/assets/rhythm/images/foods/caphe.jpg') }}');">
    <div class="relative container align-left">

        <div class="row">

            <div class="col-md-8">
                <h1 class="hs-line-11 font-alt mb-20 mb-xs-0">@lang('common.search')</h1>
            </div>

            <div class="col-md-4 mt-30">
                <div class="mod-breadcrumbs font-alt align-right">
                    <a href="">@lang('header.home')</a>&nbsp;/&nbsp;<span>@lang('common.search')</span>
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
            
            <!-- Product Content -->
            <div class="col-sm-12">
                 
                <!-- Shop options -->
                <div class="clearfix mb-40">
                    <div class="hs-line-4 font-alt black">
                        @lang('header.products')
                    </div>
                    <!-- Divider -->
                    <hr class="mt-0 mb-0"/>
                    <!-- End Divider -->                                          
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
                    <div class="col-md-3 col-lg-3 mb-60 mb-xs-40">
                        <div class="post-prev-img">
                            <a href="{{url('/')}}/product/{{$product->id}}"><img class="product-main-img" src="images/shop/shop-prev-1.jpg" alt="" /></a>
                            <div class="intro-label">
                                <span class="label label-danger bg-red">Sale</span>
                            </div>
                        </div>
                        <div class="post-prev-title font-alt align-center">
                            <a href="{{url('/')}}/product/{{$product->id}}">{{$product->name}}</a>
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
            <!-- End Product Content -->
        </div>

        <div class="row">

            <!-- Post Content -->
            <div class="col-sm-12">
                <!-- Blog options -->
                <div class="clearfix mb-40">
                    <div class="hs-line-4 font-alt black">
                        @lang('header.blogs')
                    </div>
                    <!-- Divider -->
                    <hr class="mt-0 mb-0"/>
                    <!-- End Divider -->                                          
                    <div class="left section-text mt-10">
                        @if(!empty($search_key) && count($posts)==0)
                            @lang('common.zero-search-message')&nbsp;{{$search_key}}
                        @endif 
                    </div>
                    
                </div>
                <!-- End Blog options -->              
                <!-- Post -->
                @foreach($posts as $post)
               <!-- Post Item -->
                <div class="col-sm-6 col-md-4 col-lg-4 mb-60 mb-xs-40">
                    
                    <div class="post-prev-img">
                        <a href="{{url('/')}}/posts/{{$post->slug}}"><img src="{{ asset('images/blog/' . $post->img) }}" alt="" /></a>
                    </div>
                    
                    <div class="post-prev-title font-alt">
                        <a href="">{{$post->title}}</a>
                    </div>
                    
                    <div class="post-prev-info font-alt">
                        <a href="">{{$post->author->first_name}}</a> | {{$post->created_at}}
                    </div>
                    
                    <div class="post-prev-text">
                        {{$post->excerpt}}
                        Maecenas  volutpat, diam enim sagittis quam, id porta quam. Sed id dolor 
                        consectetur fermentum nibh volutpat, accumsan purus. 
                    </div>
                    
                    <div class="post-prev-more">
                        <a href="{{url('/')}}/posts/{{$post->slug}}" class="btn btn-mod btn-gray btn-round">Read More <i class="fa fa-angle-right"></i></a>
                    </div>
                    
                </div>
                <!-- End Post Item -->
                @endforeach


                <!-- Pagination -->
                {{ $posts->links() }}
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
            <!-- End Post Content -->            
            
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