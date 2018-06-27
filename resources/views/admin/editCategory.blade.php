@extends('admin')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="card">
					<div class="card-header bg-primary text-light">Edit {{$cat->name}}</div>
					<div class="card-header">
						<form action="{{ url('/admin/menu-category/edit/'. $cat->id) }}" method="post">
							{{csrf_field()}}
							<div class="form-group">
								<label>Name</label>
								<input type="text" name="name" class="form-control form-control-sm" value="{{$cat->name}}">
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-sm">Update</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('script')
@endsection