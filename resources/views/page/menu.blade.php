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

		.listMenu li{
			list-style: none;
			border-bottom: dotted 1px #000;
			padding: 5px 0px;
		}
	</style>
	<div class="container" style="margin-top: 15px; margin-bottom: 15px;">
		<div class="row">

			<div class="col-12 col-sm-4 order-12" style="margin-bottom: 15px;">
				<div class="card">
					<div class="card-header">Categories</div>
					<div class="card-body" style="border: none;">
						<ul style="padding-left: 15px;">
							@foreach( $categories as $cat )
							<li><a href="{{ url('/menu/category/'. $cat->slug) }}">{{$cat->name}}</a></li>
							@endforeach
						</ul>
					</div>
				</div>
			</div>
			<br><br>
			<div class="col-12 col-sm-8" style="margin-bottom: 15px;">
				
				<div class="card">
					<div class="card-header">{{$category->name}}</div>
					<div class="card-body">
						<ul class="listMenu" style="padding-left: 0;">
							@foreach( $menu as $index => $menu )
								<li style="font-weight: bold"><span style="padding-right: 15px;">{{ $index+1 }}.</span>{{$menu->name }} <span style="float: right;">$ {{ number_format($menu->price, 2, '.', ',') }}</span></li>
							@endforeach
						</ul>
					</div>	
				</div>

			</div>
		</div>
	</div>
@endsection

@section('script')

@endsection