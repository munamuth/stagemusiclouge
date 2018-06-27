@extends('master')
@section('body')
	<style type="text/css">

	p{
		margin-bottom: 0px;
	}
	.overlay h4, .letter p
	{
		text-shadow:1px 1px 3px #000
	}
	.overlay:before
	{
		content: "";
		position: absolute;
		left: 0; right: 0;
		top: 0; bottom: 0;
		background: rgba(0,0,0,.3);
	}

</style>
	<div class="container" style="margin-top: 5px;">
		<div class="row">
			@foreach( $news as $news )
			<div class="col-12 col-sm-4 col-md-4 col-lg-3" style="padding: 10px;">
				<a href="{{ url('/news-and-events/'.$news->slug) }}">
					<div class="card overlay" style="border: 0" style="position: relative;" >
						<img src="{{ url('node_modules/Image/News/'.$news->img) }}" class="img-fluid">
						<div style="position: absolute; bottom: 0px; color: #fff; padding: 5px 15px;">
							<h4 style="margin-bottom: 0;" class="text_shadow">{{$news->name}}</h4>
							<p class="text_shadow">{!! str_limit($news->descr, 100, '...')!!}</p>
						</div>
					</div>
				</a>
			</div>
			@endforeach
		</div>
	</div>
@endsection