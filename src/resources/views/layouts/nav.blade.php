 <!-- BEGIN | Header -->
 <div class="sticky-wrapper" style="height: 110px;">
 <header class="ht-header" id="hd-fixed">
     <div class="row">
         <div class="topsearch">
             <form action="GET">
                 <input type="text" class="search-top" placeholder="What are you looking for ?">
             </form>
         </div>
     </div>
     <div class="row">
         <nav id="mainNav" class="navbar navbar-default navbar-custom">
             <!-- Brand and toggle get grouped for better mobile display -->
             <div class="col-md-3 col-sm-3 col-xs-12">
                 <div class="row">
                     <div class="main-logo">
                         <div class="col-md-5">
                             <div class="mobile-btn">
                                 <button id="btn">
                                     <i class="ion-navicon"></i>
                                 </button>
                                 <button id="close-btn">
                                     <i class="ion-android-close"></i>
                                 </button>
                             </div>
                         </div>
                         <div class="col-md-7">
                             <a class="hd-logo" href="{{url('/')}}">
                                 <img class="logo" src="{{asset('frontend/images/logo.png')}}" alt="">
                             </a>
                         </div>
                     </div>
                 </div>
             </div>
             <!-- Collect the nav links, forms, and other content for toggling -->
             <div class="col-md-7 col-sm-7 col-xs-12">
                 <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                     <ul class="nav navbar-nav hd-menu">
                         <li class="hidden">
                             <a href="#page-top"></a>
                         </li>
                         <li class="dropdown first">
                             <a class="btn btn-default lv1">
                             @lang('header.home')
                             </a>
                         </li>

                         @foreach($menus as $key => $menu)
                         <li class="dropdown first">
                             <a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
                             {{$menu->translation->name}}
                                 <i class="fa fa-angle-down" aria-hidden="true"></i>
                             </a>
                             <ul class="dropdown-menu level1">
                                @foreach($menu->GetMenuSubLevel1() as $sub)
                                 <li>
                                    <a href="{{url('/menu')}}/{{$sub->parent->slug}}/{{$sub->slug}}">
                                         <i class="ion-ios-minus-empty"></i>
                                         {{$sub->translation->name}}
                                    </a>
                                 </li>
                                 @endforeach
                             </ul>
                         </li>
                         @endforeach
                         <li class="dropdown first">
                             <a href="{{ url('/contact')}}" class="btn btn-default lv1">
                             @lang('header.contact')
                             </a>
                         </li>
                     </ul>
                 </div>
             </div>
             <div class="col-md-2 col-sm-2 col-xs-12">
                 <div class="right-menu">
                     <button class="search-top-bt">
                         <i class="ion-ios-search" data-toggle="tooltip" data-placement="top" title="Search"></i>
                     </button>
                     <button class="opennav2">
                         <i class="ion-ios-cart-outline shopping-cart-icon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Add to cart"></i>
                     </button>
                     <button class="menu-btn">
                         <i class="ion-navicon" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Open Sidebar"></i>
                     </button>
                 </div>
             </div>
             <!-- /.navbar-collapse -->
         </nav>
     </div>
 </header>
</div>
<!-- END | Header -->