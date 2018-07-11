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
		        	<div class="col-12" style="padding: 0 10px;">
			        	<div class="card">
			        		<div class="card-header">{{$gallery->name}}</div>
			        	</div>
		        	</div>
		        	@foreach($images as $index => $i)
					<div class="col-6 col-sm-4 col-md-4" style="padding: 10px;">
							<div class="card" style="border-radius: 0; position: relative;">
								<img src="{{ url('node_modules/Image/Gallery/'.$i->getImage->name) }}" class="img-fluid " onclick="showPopup({{$index}} )">
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




				<div class="mypopup" style="display: none;">
					<div class="mypopup_header">
						<a href="#" class="close">X</a>
					</div>
					<div class="mypopup_body">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="owl-carousel owl-theme">
										@foreach($images as $i)
									    <div class="item">
											<img src="{{ url('node_modules/Image/Gallery/'.$i->getImage->name) }}" class="img-fluid" style="width: 100%; height: 90%;">
										</div>
										@endforeach
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<style type="text/css">

					.mypopup{						
						position: fixed;
						width: 100%;
						height: 100%;
						top: 0;
						left: 0;
						background-color: rgba(0,0,0, 0.9);
						color: #fff;
						z-index: 100;
						overflow: auto;
					}
					.mypopup_header{
						position: absolute;
						top: 0;
						right: 0;
						text-align: right;
					}
					.mypopup_header a, .mypopup a:hover{
						padding: 15px;
						color: #fff;
						text-decoration: none;
						text-align: right;
						z-index: 1000;
					}
					.mypopup_body{
						width: 100%;
						height: auto;
						padding: 250px;
						margin: auto;
						padding-top: 15px;
						overflow: auto;
					}

					@media( max-width: 900px){
						.mypopup_header,{
							position: absolute;
							font-size: 25px;
							padding: 15px;
							margin-top: 15px;
						}
						.mypopup_body{
							width: 100%;
							height: 100%;
							max-width: 100%;
							max-height: 100%;
							margin-top: 150px;
							padding: 0;
						}
					}
				</style>
@endsection

@section('script')
	<script type="text/javascript">
		$('#home').addClass('focus');
		$('img').addClass('img-fluid');
		$('.owl-carousel').owlCarousel({
			    center: true,
			    items: 0,
			    startPosition: 0,
			    loop:true,
			    margin:10,
			})
		function showPopup( id ) {
			$('.owl-carousel').owlCarousel('destroy'); 
			$('.owl-carousel').owlCarousel({
			    center: true,
			    items: 1,
			    startPosition: id,
			    loop:true,
			    margin:10,
			})
			$('.mypopup').show();
			$('body').css({'overflow': 'hidden'})
		}
		$('.close').click( function(){
			$('.mypopup').hide();
			$('body').css({'overflow': 'auto'})
		})
	</script>
@endsection