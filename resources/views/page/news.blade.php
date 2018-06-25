@extends('master')
@section('body')
	<style type="text/css">

	p{
		margin-bottom: 0px;
	}
	.letter h4, .letter p
	{
		text-shadow:2px 2px 2px #001
	}
	.overlay:before
	{
		content: "";
		position: absolute;
		left: 0; right: 0;
		top: 0; bottom: 0;
		background: rgba(0,0,0,.09);
	}
</style>
	<div class="container" style="margin-top: 5px;">
		<div class="row">
			@foreach( $news as $news )
			<div class="col-12 col-sm-4 col-md-4" style="padding: 10px;">
				<a href="{{ url('/news-and-events/'.$news->slug) }}">
					<div class="card overlay" style="border: 0" style="position: relative;" >
						<img src="{{ url('node_modules/Image/news/'.$news->img) }}" class="img-fluid">
						<div style="position: absolute; bottom: 0px; color: #fff; padding: 5px 15px;">
							<h4 style="margin-bottom: 0;">{{$news->name}}</h4>
							<p>{!! str_limit($news->descr, 100, '...')!!}</p>
						</div>
					</div>
				</a>
			</div>
			@endforeach
		</div>
	</div>
@endsection