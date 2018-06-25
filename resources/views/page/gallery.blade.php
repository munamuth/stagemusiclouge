@extends('master')
@section('header')
	<title>{{config('app.name')}}</title>
	<style type="text/css">
		.container{
			width: 100%;
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
@endsection
@section('body')
	<div class="container">
        <div class="row">
			@foreach($gallery as $g)
			<div class="col-6 col-sm-4 col-md-3" style="margin-top: 10px; padding-left: 5px; padding-right: 5px;">
				<a href="{{ url('/gallery/'.$g->slug ) }}">
					<div class="card overlay" style="border-radius: 0; position: relative;">
						<img src="{{ url('node_modules/Image/Gallery/'.App\Image::find($g->image->image_id)->name ) }}" class="img-fluid">
						<p style="position: absolute; margin: 0; bottom: 0; color: #fff; padding: 5px; text-shadow: 1px 1px 3px #000;">{{$g->name}}</p>
					</div>
				</a>
			</div>
			@endforeach
			<div style="padding-bottom: 10px; float: left; width: 100%;"></div>
		</div>
	</div>
@endsection

@section('script')
	<script type="text/javascript">
		$('#home').addClass('focus');
	</script>
@endsection