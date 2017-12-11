<!-- menu for mobile -->
	
<nav id="menu">
	<ul class="main-menu clearfix">
		<li><a href="{{ url('/')}}">@lang('header.home')</a></li>
		<li>
            <a href="{{ url('/about')}}">
            Pô Kô Farms
            </a>
        </li>
        @foreach($blog_menu as $menu)
        <li>
            <a href="{{url('/subject')}}/{{$menu->parent->slug}}/{{$menu->slug}}">
            {{$menu->translation->name??$menu->name}}
            </a>
        </li>  
        @endforeach
        <li>
            <a href="#">
            {{$product_menu->translation->name??$product_menu->name}}
                <i class="ion-ios-arrow-down it2"></i>
            </a>
            <ul class="sub-menu sub2">
                @foreach($product_menu->GetMenuSubLevel1() as $sub)
                <li>
                    <a href="{{url('/subject')}}/{{$sub->parent->slug}}/{{$sub->slug}}">
                        {{$sub->translation->name??$sub->name}}
                    </a>
                </li>
                @endforeach
            </ul>
        </li>
        <li>
            <a href="{{ url('/contact')}}">
            @lang('header.contact')
            </a>
        </li>
	</ul>
</nav>
	