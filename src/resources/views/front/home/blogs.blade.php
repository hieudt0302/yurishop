<div class="blog">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="heading-sec">
					<h1>@lang('home.farm-activities')</h1>
					<h4>-@lang('home.farm-activities-message')-</h4>
				</div>
			</div>
		</div>		
		<div class="row">
			@foreach ($new_blogs as $blog)
			<div class="col-md-4 col-sm-4 col-xs-4">
				<div class="blog-it-left">
					<a href="{{url('/posts')}}/{{$blog->slug}}">
						<img class="blog-img" src="{{ asset('images/blog/' . $blog->img) }}" alt="">
					</a>
					<div class="blog-ct-left">
						<div class="date">
							<span>{!! date('F jS, Y', strtotime($blog->updated_at)) !!}</span>
						</div>
						<h2><a href="{{url('/posts')}}/{{$blog->slug}}"> {{ $blog->title }} </a></h2>
						<p> {{ $blog->excerpt }} </p>
						<a class="readmore2" href="{{url('/posts')}}/{{$blog->slug}}">/ &nbsp; Read more</a>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>