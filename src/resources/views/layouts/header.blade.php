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
						    			<button id="btn"><i class="ion-navicon"></i></button>
						    			<button id="close-btn"><i class="ion-android-close"></i></button>
						    		</div>
								</div>
								<div class="col-md-7">
									<a class="hd-logo" href="{{ url('/') }}"><img  class="logo" src="images/logo.png" alt=""></a>	
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
								<!-- <li class="dropdown">
									<a href="landing.html" class="btn btn-default dropdown-toggle lv1">Landing </a>
								</li>	 -->
								<li class="dropdown first">
									<a href="{{ url('/') }}" class="btn btn-default">
										@lang('header.home')
									</a>
								</li>	
								<li class="dropdown first">
									<a href="{{ url('/about-us') }}" class="btn btn-default">
										@lang('header.about-us')
									</a>
								</li>

					            @foreach($menus as $key => $menu)
					            <li class="dropdown first">
					                <a class="btn btn-default dropdown-toggle lv1" data-toggle="dropdown" data-hover="dropdown">
					                	{{$menu->translation->name}}<i class="fa fa-angle-down" aria-hidden="true"></i>
									</a>
					                <!-- Sub - Level 2 -->
					                <ul class="dropdown-menu level1">
					                    @foreach($menu->GetMenuSubLevel1() as $sub)
					                    <li>                        
					                        <a href="{{url('/menu')}}/{{$sub->parent->slug}}/{{$sub->slug}}" title="  {{$sub->translations->first()->name}}">
					                        {{$sub->translation->name}}
					                        </a> 
					                    </li>
					                    @endforeach
					                </ul>
					                <!-- End Sub - Level 2-->
					            </li>
					            @endforeach

								<li class="dropdown first">
									<a href="{{ url('/posts') }}" class="btn btn-default">
										@lang('header.activity')
									</a>
								</li>
								<li class="dropdown first">
									<a href="{{ url('/promotion') }}" class="btn btn-default">
										@lang('header.promotion')
									</a>
								</li>
								<li class="dropdown first">
									<a href="{{ url('/contact') }}" class="btn btn-default">
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
								<i class="ion-ios-cart-outline" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Add to cart"></i>
							</button>
						</div>
					</div>
				<!-- /.navbar-collapse -->
		    </nav>		
		</div>
	</header>
</div>
<!-- END | Header -->
<!-- start of page ct -->