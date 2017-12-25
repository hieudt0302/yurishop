@extends('layouts.master')
@section('title','Pô Kô Farms - Galleries')
@section('content')
<div class="hero">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Gallery</h1>
				<ul class="breadcumb">
					<li><a href="{{url('/')}}">Home</a></li>
					<li><span>/</span>Gallery</li>
				</ul>
			</div>
		</div>
	</div>
</div>


<section class="gallery products">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<ul class="menu-filter">
                    <li class="active" data-filter="*"><a href="#">All</a></li>
                    @foreach($galleries as $gallery)
                    <li  data-filter=".{{str_slug($gallery->name, "-")}}"><a href="#">{{$gallery->name}}</a></li>
					@endforeach

					<!-- <li  data-filter=".fruits"><a href="#">Fruits</a></li>
					<li  data-filter=".vegetable"><a href="#">vegetable</a></li>
					<li  data-filter=".juices"><a href="#">juices</a></li>
					<li  data-filter=".dried"><a href="#">dried fruits</a></li> -->
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="grid gallery-items">
                @foreach($galleries as $gallery)
                    @foreach($gallery->media as $m)
                        <div class="grid-item {{str_slug($gallery->name, "-")}} gallery-it it pro-it">
                            <a href="{{asset('/storage')}}/{{$m->thumb}}" data-lightbox="test1">
                                <img class="pro-img" src="{{asset('/storage')}}/{{$m->source}}" alt="">
                                <div class="hover-inner">	
                                    <h1>{{$m->name}}</h1>
                                    <span class="sub">{{$gallermy->description}}</span>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endforeach
			</div>	
		</div>
	</div>
</section>

@endsection

@section('scripts')
@endsection