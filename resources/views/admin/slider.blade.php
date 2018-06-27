@extends('admin')

@section('content')
	<style type="text/css">
		#formAdd .form-group
		{
			margin-bottom: 0;
		}
	</style>
	<div class="card">
		<div class="card-header">
			<p>Image Upload</p>
		</div>
		<div class="card-body">
			<form method="post" action="{{ url('/admin/slider') }}" enctype="multipart/form-data" id="formAdd">
				{{ csrf_field() }}
				<div id="file_container">
					<div class="form-group">
						<input type="file" name="file[]" required multiple>
					</div>
				</div>
				<br>
				<button class="btn btn-success btn-sm" id="btnSave" type="submit">Save</button>
			</form>
		</div>
	</div>
	<br>
	<div class="list_image card">
	<div class="card-body">
			@foreach( $data as $d )
			<div class="image_one" style="width: 25%; float: left; padding: 5px; position: relative;">
				<img src="{{ url('/node_modules/Image/Slider/').'/'.$d->name }}" class="img-fluid">
				<a class="deleteImage" href="{{ url('/admin/slider/destroy/'.$d->id.'/'.$d->name) }}"><i class="fa fa-close"></i></a>
			</div>
			@endforeach
			<style type="text/css">
				.deleteImage{
					position: absolute;
					color: #fff;
					top: 0px;
					right: 5px;
					background: transparent;
					cursor: pointer;
				}
				.deleteImage:hover{
					color: #000;
				}
			</style>
	</div>
	</div>
@endsection
@section('script')
	<script type="text/javascript">
	stringFile = "<div class='form-group'><input type='file' name='file[]' required></div>";
		$(document).on('click', '#btnAdd', function(){
			$('#file_container').append(stringFile);
		});

		$('#btnRemoveLast').click( function(){
			$('#formAdd').find('.form-group').last().remove();
		});
	</script>
@endsection