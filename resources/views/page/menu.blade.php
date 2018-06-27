@extends('master')

@section('body')
	<style type="text/css">
		.overlay:hover::before{
			content: '';
		position: absolute;
		left: 0; right: 0;
		top: 0; bottom: 0;
		background: rgba(0,0,0,.3);
		}
	</style>
	<div class="container" style="margin-top: 15px; margin-bottom: 15px;">
		<div class="row">

			<div class="col-12 col-sm-4 order-12 order-md-1" style="margin-bottom: 15px;  padding: 0px 10px 10px 10px;">
				<div class="card">
					<div class="card-header">Category</div>
					<div class="card-body" style="border: none;">
						<ul>
							@foreach( $categories as $cat )
							<li><a href="{{ url('/menu/category/'. $cat->slug) }}">{{$cat->name}}</a></li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>

			<div class="col-12 col-sm-8">
				<div class="row">
					@foreach( $menu as $menu )
						<div class="col-6 col-sm-4" style="padding: 0px 10px 10px 10px">
							<div class="card">
								<div class="card-body overlay" style="padding: 0; ">
									<img src="{{ url('node_modules/Image/Menu/'. $menu->image) }}" class="img-fluid">
									<p style="position: absolute; top: 5px; right: 5px; margin: 0; color: #fff; text-shadow: 2px 2px 3px #000; font-weight: 999">$ {{$menu->price}}</p>
								</div>
								<div class="card-footer bg-success">									
									<p style="margin: 0; font-weight: bold;" class="text-light">{{$menu->name}}</p>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
@endsection

@section('script')

@endsection