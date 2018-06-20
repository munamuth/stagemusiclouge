@extends('master')
@section('body')
	<style type="text/css">
		#main-col{
			box-shadow: 0px 0px 10px 0px #136;
			margin-bottom: 15px;
		}
		.letter:before
			{
				content: "";
				position: absolute;
				left: 0; right: 0;
				top: 0; bottom: 0;
				background: rgba(0,0,0,.4);
			}
	</style>
	<div class="container" style="margin-top: 10px; margin-bottom: 10px;">
		<div class="row">
			<div class="col-12 col-sm-8" id="main-col">
				<div class="card" style="border: 0;">
					<div class="card-body">
						<h4>{{$news->name}}</h4>
						<img src="{{ url('node_modules/Image/news/'.$news->img) }}" >
						{!!$news->descr!!}
					</div>
				</div>
			</div>
			<div class="col-12 col-sm-4" id="l">
				<div class="card" style="border: 0;">
					<div class="card-header">Related</div>
					@foreach( $related as $news)
					<a href="{{ url('/news-and-events/'.$news->slug) }}">
						<div class="card-body letter" style="position: relative; padding: 0; margin-bottom: 5px;" >
							<div class="">
								<img src="{{ url('node_modules/Image/news/'.$news->img) }}">
								<div style="position: absolute; bottom: 0; padding: 10px; color: #fff">
									<h4>{{$news->name}}</h4>
									{!! str_limit($news->descr, '100', '...')!!}
								</div>
							</div>
						</div>
					</a>
					@endforeach
				</div>
			</div>
		</div>
	</div>
@endsection

@section('script')
	<script type="text/javascript">
		$('img').addClass('img-fluid');
	</script>
@endsection