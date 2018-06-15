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
			<form method="post" action="{{ url('/admin/menu/update/'.$data->id) }}" enctype="multipart/form-data" id="formAdd">
				{{ csrf_field() }}
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="name" class="form-control form-control-sm" value="{{$data->name}}">
				</div>
				<div class="form-group">
					<label>Category</label>
					<select name="category_id" class="form-control form-control-sm">
						@foreach( $category as $cat )
							@if( $cat->id == $data->category_id )
								<option value="{{$cat->id}}" selected>{{ $cat->name}}</option>
							@else
								<option value="{{$cat->id}}">{{ $cat->name}}</option>
							@endif
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label>Description</label>
					<textarea class="form-control" name="descr" rows="5">{{$data->descr}}</textarea>
				</div>
				<button class="btn btn-warning btn-sm" type="reset" onclick="document.getElementById('formAdd').action('/admin/menu')">Reset</button>
				<button class="btn btn-success btn-sm" id="btnSave" type="submit">Save</button>
			</form>
		</div>
	</div>
@endsection