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
					<li  data-filter=".fruits"><a href="#">Fruits</a></li>
					<li  data-filter=".vegetable"><a href="#">vegetable</a></li>
					<li  data-filter=".juices"><a href="#">juices</a></li>
					<li  data-filter=".dried"><a href="#">dried fruits</a></li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="grid gallery-items">
				<div class="grid-item juices gallery-it it pro-it">
					<a href="images/uploads/gallery7.jpg" data-lightbox="test1">
						<img class="pro-img" src="images/uploads/gallery7.jpg" alt="">
						<div class="hover-inner">	
							<h1>Organic vegetable</h1>
							<span class="sub">Vegetable</span>
						</div>
					</a>
            	</div>
				<div class="grid-item vegetable gallery-it pro-it">
					<a href="images/uploads/gallery8.jpg" data-lightbox="test1">
						<img class="pro-img" src="images/uploads/gallery8.jpg"  alt="">
						<div class="hover-inner">	
							<h1>Organic vegetable</h1>
							<span class="sub">Vegetable</span>
						</div>
					</a>
	        	</div>	
	        	<div class="grid-item juices gallery-it pro-it">
	        		<a href="images/uploads/gallery3.jpg" data-lightbox="test1">
						<img class="pro-img" src="images/uploads/gallery3.jpg" alt="">
						<div class="hover-inner">	
							<h1>Organic vegetable</h1>
							<span class="sub">Vegetable</span>
						</div>
					</a>
	        	</div>	
	        	<div class="grid-item vegetable gallery-it pro-it">
		        	<a href="images/uploads/gallery4.jpg" data-lightbox="test1">
						<img class="pro-img" src="images/uploads/gallery4.jpg"  alt="">
						<div class="hover-inner">	
							<h1>Organic vegetable</h1>
							<span class="sub">Vegetable</span>
						</div>
					</a>
	        	</div>
	        	<div class="grid-item vegetable gallery-it pro-it">
		        	<a href="images/uploads/gallery5.jpg" data-lightbox="test1">
						<img class="pro-img" src="images/uploads/gallery5.jpg"  alt="">
						<div class="hover-inner">	
							<h1>Organic vegetable</h1>
							<span class="sub">Vegetable</span>
						</div>
					</a>
	        	</div>
	        	<div class="grid-item vegetable gallery-it pro-it">
		        	<a href="images/uploads/gallery6.jpg" data-lightbox="test1">
						<img class="pro-img" src="images/uploads/gallery6.jpg"  alt="">
						<div class="hover-inner">	
							<h1>Organic vegetable</h1>
							<span class="sub">Vegetable</span>
						</div>
					</a>
	        	</div>
	        	<div class="grid-item fruits gallery-it pro-it">
		        	<a href="images/uploads/gallery7.jpg" data-lightbox="test1">
						<img class="pro-img" src="images/uploads/gallery7.jpg"  alt="">
						<div class="hover-inner">	
							<h1>Organic vegetable</h1>
							<span class="sub">Vegetable</span>
						</div>
					</a>
	        	</div>
	        	<div class="grid-item dried gallery-it pro-it">
		        	<a href="images/uploads/gallery8.jpg" data-lightbox="test1">
						<img class="pro-img" src="images/uploads/gallery8.jpg"  alt="">
						<div class="hover-inner">	
							<h1>Organic vegetable</h1>
							<span class="sub">Vegetable</span>
						</div>
					</a>
	        	</div>					 
	        	<div class="grid-item dried gallery-it pro-it">
		        	<a href="images/uploads/gallery9.jpg" data-lightbox="test1">
						<img class="pro-img" src="images/uploads/gallery9.jpg"  alt="">
						<div class="hover-inner">	
							<h1>Organic vegetable</h1>
							<span class="sub">Vegetable</span>
						</div>
					</a>
	        	</div>
	        	<div class="grid-item vegetable gallery-it pro-it">
		        	<a href="images/uploads/gallery6.jpg" data-lightbox="test1">
						<img class="pro-img" src="images/uploads/gallery6.jpg"  alt="">
						<div class="hover-inner">	
							<h1>Organic vegetable</h1>
							<span class="sub">Vegetable</span>
						</div>
					</a>
	        	</div>
	        	<div class="grid-item fruits gallery-it pro-it">
		        	<a href="images/uploads/gallery7.jpg" data-lightbox="test1">
						<img class="pro-img" src="images/uploads/gallery7.jpg"  alt="">
						<div class="hover-inner">	
							<h1>Organic vegetable</h1>
							<span class="sub">Vegetable</span>
						</div>
					</a>
	        	</div>
	        	<div class="grid-item dried gallery-it pro-it">
		        	<a href="images/uploads/gallery8.jpg" data-lightbox="test1">
						<img class="pro-img" src="images/uploads/gallery8.jpg"  alt="">
						<div class="hover-inner">	
							<h1>Organic vegetable</h1>
							<span class="sub">Vegetable</span>
						</div>
					</a>
	        	</div>					 
			</div>	
		</div>
	</div>
</section>

@endsection

@section('scripts')
@endsection