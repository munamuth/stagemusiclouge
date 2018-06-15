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
			<h1>New Menu</h1>
		</div>
		<div class="card-body">
			<form method="post" action="{{ url('/admin/slider') }}" enctype="multipart/form-data" id="formAdd">
				{{ csrf_field() }}
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="name" class="form-control form-control-sm">
				</div>
				<div class="form-group">
					<label>Category</label>
					<select name="category_id" class="form-control form-control-sm" value="-1">
						@foreach( $category as $cat )
							<option value="{{$cat->id}}">{{ $cat->name}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label>Description</label>
					<textarea class="form-control" name="descr" rows="5"></textarea>
				</div>
				<br>
				<div id="file_container">
					<div class="form-group">
						<input type="file" name="file[]" required>
					</div>
				</div>
				<br>
				<button class="btn btn-success btn-sm" id="btnAdd" type="button">Add more</button>
				<button class="btn btn-warning btn-sm" id="btnRemoveLast" type="button">Remove Last</button>
				<button class="btn btn-success btn-sm" id="btnSave" type="submit">Save</button>
			</form>
		</div>
	</div>
	<br>
	<div class="list_image card">
	<div class="card-body">
			
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