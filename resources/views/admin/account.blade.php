@extends('admin')
@section('content')
	<div class="card">
		<div class="card-header">Edit User</div>
		<div class="card-body ">
			<form action="{{ url('/admin/account/edit/'.auth::id() ) }}" method="post" class="form-horizontal">
				{{csrf_field() }}
				<div class="form-group">
					<div class="row">
						<div class="col-12 col-sm-3">
							<label>Name</label>
						</div>
						<div class="col-12 col-sm-7">
							<input type="text" name="name" value="{{ auth::user()->name }}" class="form-control">
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="row">
						<div class="col-12 col-sm-3">
							<label>Email</label>
						</div>
						<div class="col-12 col-sm-7">
							<input type="text" name="name" value="{{ auth::user()->email }}" class="form-control">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-12 col-sm-3"></div>
						<div class="col-12 col-sm-9">
							<button class="btn btn-success">Update</button>
							<button class="btn btn-success">Change Password</button>
						</div>
					</div>				
				</div>
			</form>
		</div>
	</div>
@endsection