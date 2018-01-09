@extends('layouts.master')
@section('title','Pô Kô Farms - 404')
@section('content')
<section class="error">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1>Opps, Page not found!</h1>
				<p> Please go back to<a href="{{url('/')}}">Home Page</a></p>
				<img src="images/error-img.png" alt="Pokofarms">
			</div>
		</div>
	</div>
</section>
@endsection