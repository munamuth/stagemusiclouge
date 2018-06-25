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
	<div class="container" style="margin-top: 15px; margin-bottom: 15px;">
        <div class="row">
	        <div class="col-12 col-sm-8">
	        	<div class="row">
		        	<div class="col-12" style="padding: 0 5px;">
			        	<div class="card">
			        		<div class="card-header">{{$gallery->name}}</div>
			        	</div>
		        	</div>
		        	@foreach($images as $i)
					<div class="col-6 col-sm-4 col-md-4" style="margin-top: 10px; padding-left: 5px; padding-right: 5px;">
							<div class="card" style="border-radius: 0; position: relative;">
								<img src="{{ url('node_modules/Image/Gallery/'.$i->getImage->name) }}" class="img-fluid">
							</div>
					</div>
					@endforeach
				</div>
				<div style="margin-bottom: 15px;"></div>
			</div>

			<div class="col-12 col-sm-4">
				<div class="row">
					<div class="col-12" style="padding: 0 5px;">
						<div class="card">
							<div class="card-header">Related</div>
						</div>
					</div>
					@foreach( $related as $r )
					<div class="col-6 col-sm-6" style="padding: 0 5px; margin-top: 10px;">
						<a href="{{ url('/gallery/'.$r->slug) }}">
							<div style="position: relative;" class="overlay">
								<img src="{{ url('node_modules/Image/Gallery/'.App\Image::find($r->image->image_id)->name ) }}" class="img-fluid">
								<p style="position: absolute;bottom: 0; padding: 5px; margin: 0; color: #fff; text-shadow: 1px 1px 3px #000;">{{$r->name}}</p>
							</div>
						</a>
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