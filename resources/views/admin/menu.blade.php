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
			<form method="post" action="{{ url('/admin/menu') }}" enctype="multipart/form-data" id="formAdd">
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
						<input type="file" name="file" required>
					</div>
				</div>
				<br>
				<button class="btn btn-warning btn-sm" type="reset" onclick="document.getElementById('formAdd').action('/admin/menu')">Reset</button>
				<button class="btn btn-success btn-sm" id="btnSave" type="submit">Save</button>
			</form>
		</div>
	</div>
	<br>
	<div class="card">
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-tripped">
				<thead>
					<tr>
						<th>Photo</th>
						<th>Name</th>
						<th>Type</th>
						<th>Action</th>
					</tr>					
				</thead>
				<tbody>
					@foreach( $data as $d )
					<tr>
						<td style="max-width: 100px"><img src="{{url('/node_modules/Image/Menu/'. $d->image)}}" style="max-height: 100px; width: 100px;"></td>
						<td>{{$d->name}}</td>
						<td>{{$d->type->name}}</td>
						<td>
							<a href="/menu/{{$d->slug}}" class="btn btn-sm btn-success" target="_BLANK">View</a>
							<a href="/admin/menu/edit/{{$d->id}}" class="btn btn-warning btn-sm" target="_BLANK">Edit</a>
							<a href="/admin/menu/destroy/{{$d->id}}" class="btn btn-danger btn-sm">Destroy</a>

							<a href="#" class="btn btn-danger btn-sm" onclick="btnChangePhoto_Click({{ $d->id}})">Change Photo</a>
						</td>
					</tr>
					@endforeach
					
				</tbody>
			</table>
		</div>
	</div>
	<div style="display: none;">
	<form method="post" enctype="multipart/form-data" id="frmChangePhoto">
		{{ csrf_field() }}
		<input type="file" name="file" onchange="document.getElementById('frmChangePhoto').submit()" id="changePhoto">
	</form>
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

		function btnChangePhoto_Click(id, image) {
			$('#frmChangePhoto').prop('action', '/admin/menu/change-photo/'+id);
			$('#changePhoto').click();
		}
	</script>
@endsection