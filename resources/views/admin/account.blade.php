@extends('admin')
@section('content')
	<div class="card">
		<div class="card-header">Edit User</div>
		<div class="card-body ">
			<form action="{{ url('/admin/account/update/'.auth::id() ) }}" method="post" class="form-horizontal">
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
							<input type="text" name="email" value="{{ auth::user()->email }}" class="form-control">
						</div>
					</div>
				</div>
				<div class="form-group">
					<div class="row">
						<div class="col-12 col-sm-3"></div>
						<div class="col-12 col-sm-9">
							<button class="btn btn-success" type="submit">Update</button>
							<button class="btn btn-success" type="button" data-toggle="modal" data-target="#modalChangePassword">Change Password</button>
						</div>
					</div>				
				</div>
			</form>
		</div>
	</div>


	<div class="modal fade" id="modalChangePassword">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-info text-light">
					<span>Change Password</span>
					<button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" >&times;</span>
				</div>
				<div class="modal-body">
					<form action="{{ url('/admin/account/password/change/'. auth::id()) }}" method="post">
						{{ csrf_field() }}
						<div class="form-group">
							<input type="password" name="password" class="form-control form-control-sm" placeholder="New Password"  pattern=".{6,20}" required title="Password must be between 6-20 digits!">
						</div>
						<div class="form-group">
							<input type="password" name="cpassword" class="form-control form-control-sm" placeholder="Confirm New Password">
							<label class="perror text-danger" style="text-transform: bolder;"></label>
						</div>
						<button id="btnChangepassword" class="btn btn-success btn-sm" type="submit" disabled>change</button>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('script')
	<script type="text/javascript">
		$(document).on('keyup', 'input[type="password"]', function() {
			if( $('input[name="cpassword"]').val() != $('input[name="password"]').val()  )
			{
				$('.perror').text('Password not match!!!')
				$('#btnChangepassword').attr("disabled", "disabled");
			} else {
				$('.perror').text('')
				$('#btnChangepassword').removeAttr('disabled')
			}
		});
	</script>
@endsection