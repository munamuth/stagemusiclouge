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
	<div class="container" style="margin-bottom: 15px;">
        <div class="row">
			@foreach($category as $cat)
			<div class="col-6 col-sm-4 col-md-3 col-lg-2" style="margin-top: 10px; padding-left: 5px; padding-right: 5px;">
				<div class="card" style="border-radius: 0">
					<a href="{{ url('/menu/category/'. $cat->slug) }}">
					<img src="{{ url('node_modules/Image/MenuCategory/'.$cat->img) }}" class="img-fluid">
					<p class="text-center" style="margin-bottom: 0; font-weight: bold;">{{$cat->name}}</p>
				</div>
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