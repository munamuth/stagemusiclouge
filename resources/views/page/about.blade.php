@extends('master')
@section('header')
	<title>{{config('app.name')}}</title>
	<style type="text/css">
		.container{
			width: 100%;
		}
	</style>
@endsection
@section('body')
	<div class="col-xs-12 col-sm-12">
		<div class="row">
			<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  			<div class="carousel-inner">
  				@foreach( $images as $index => $image )
			    		@if( $index == 0 )
					    	<div class="carousel-item active">
					        	<img src="{{ url('/node_modules/Image/Slider/'. $image->name) }}" class="d-block img-fluid">
					      	</div>
					    @else 
					    	<div class="carousel-item">
					        	<img src="{{ url('/node_modules/Image/Slider/'. $image->name) }}" class="d-block img-fluid">
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
@endsection

@section('script')
	<script type="text/javascript">
		$('#home').addClass('focus');
	</script>
@endsection