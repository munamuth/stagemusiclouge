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
	<div class="container" style="margin-top: 15px; margin-bottom: 15px;">
		<div class="row">
			<div class="col-12 col-sm-6">
				<div class="card">
					<img src="{{ url('/node_modules/Image/about/'.$about->img) }}" class="img-fluid">
				</div>
			</div>
			<div class="col-12 col-sm-6">
				{{$about->descr}}
			</div>
		</div>
	</div>
@endsection

@section('script')
	<script type="text/javascript">
		$('#home').addClass('focus');
	</script>
@endsection