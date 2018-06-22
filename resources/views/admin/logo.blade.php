@extends('admin')

@section('content')

	<div class="card" style="background: {{App\style::where('id', 1)->first()->header_background}}; padding: 15px;">
		<div style="text-align: center; position: relative;">
			<img src="{{ url('/node_modules/logo/'.App\style::where('id', 1)->first()->logo) }}" class="img-fluid">
			<br>
			<br>
			<button class="btn btn-success btn-sm btnChange" >Change Logo</button>
		</div>
		<br>
	</div>
	<div style="display: none;">
		<form action="{{ url('/admin/logo') }}" method="post" enctype="multipart/form-data" id="formFile">
			{{ csrf_field()}}
			<input type="file" name="file" id="file">
		</form>
	</div>

@endsection
@section('script')
	<script type="text/javascript">
		$('.btnChange').click( function(argument) {
			$('#file').click();
		})
		$('#file').change( function(){
			$('#formFile').submit();
		})
	</script>
@endsection