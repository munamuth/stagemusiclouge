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
			<p>Gallery Upload</p>
		</div>
		<div class="card-body">
			<form method="post" action="{{ url('/admin/gallery') }}" enctype="multipart/form-data" id="formAdd" autocomplete="off">
				{{ csrf_field() }}
				<div id="file_container">
					<div class="form-group">
						<input type="text" name="name" class="form-control form-control-sm" placeholder="Gallery's name">
					</div>
					<div class="form-group">
						<input type="file" name="file[]" required multiple>
					</div>
				</div>
				<br><!-- 
				<button class="btn btn-success btn-sm" id="btnAdd" type="button">Add more</button>
				<button class="btn btn-warning btn-sm" id="btnRemoveLast" type="button">Remove Last</button> -->
				<button class="btn btn-success btn-sm" id="btnSave" type="submit">Save</button>
			</form>
		</div>
	</div>
	<br>
	<div class="list_image card">
	<div class="card-body">
			@foreach( $data as $d )
			<div class="image_one overlay" style="width: 25%; float: left; padding: 5px; position: relative;">
				<img src="{{ url('/node_modules/Image/Gallery/').'/'.App\Image::find($d->image->image_id)->name }}" class="img-fluid">
				<a class="deleteImage" href="{{ url('/admin/gallery/destroy/'.$d->id) }}"><i class="fa fa-close"></i></a>
				<a class="editPhoto" href="{{ url('/admin/gallery/edit/'.$d->id) }}" target="Blank"><i class="fa fa-edit"></i></a>
				<p style="position: absolute; bottom: 0; margin: 0; padding: 5px; color: #fff; text-shadow: 1px 1px 3px #000;">{{$d->name}}</p>
			</div>
			@endforeach
			<style type="text/css">
				.deleteImage{
					position: absolute;
					top: 2px;
					right: 7px;
					background: #ffffff01;
					cursor: pointer;
					color: #fff;
				}
				.editPhoto{
					position: absolute;
					top: 3px;
					right: 20px;
					cursor: pointer;
					color: #fff;
				}
				.deleteImage:hover, .edit:hover
				{
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