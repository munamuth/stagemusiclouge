@extends('master')
@section('header')
	<title>{{config('app.name')}}</title>
	<style type="text/css">
		.container{
			width: 100%;
		}
		@media (max-width: 999px){
			.news_image{
				width: 100%;
				height: auto;
			}
		}
	</style>
@endsection
@section('body')
<div class="container-fluid">
	<div class="row">
		<div class="col-12 col-sm-9" style="padding: 5px 20px;">
			<div class="row justify-content-center">
				<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
	  			<div class="carousel-inner">
	  				@foreach( $images as $index => $image )
				    		@if( $index == 0 )
						    	<div class="carousel-item active">
						        	<img src="{{ url('/node_modules/Image/Slider/'. $image->name) }}" class="d-block slider-img img-fluid">
						      	</div>
						    @else 
						    	<div class="carousel-item">
						        	<img src="{{ url('/node_modules/Image/Slider/'. $image->name) }}" class="d-block slider-img img-fluid">
						      	</div>
				      		@endif
				    @endforeach
			  	</div>
				  	<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
				    	<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				    	<span class="sr-only">Previous</span>
				  	</a>
				  	<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
				    <span class="carousel-control-next-icon" aria-hidden="true"></span>
				    	<span class="sr-only">Next</span>
					</a>
				</div>
			</div>
		</div>
		<div class="col-12 col-sm-3" style="position: relative;">
			<div class="row">
				@foreach($news as $news )
				<div class="col-12" style="padding: 5px 5px 0 5px;">
					<div class="card" style="border: none; position: relative; text-align: center;">
						<a href="{{ url('/news-and-events/'.$news->slug) }}">
							<img src="{{ url('node_modules/Image/News/'. $news->img) }}" class="news_image" style="max-height:184.5px; min-width: 100%;">
							<p style="position: absolute; bottom: 0; left: 35px; margin: 0; padding: 5px; color: #fff; text-shadow: 1px 1px 3px #000">{{$news->name}}</p>
						</a>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
@endsection

@section('script')
	<script type="text/javascript">
		$('#home').addClass('focus');
	</script>
@endsection