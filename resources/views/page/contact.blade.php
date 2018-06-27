@extends('master')
@section('body')
	<div class="container-fluid" style="margin-top: 5px; margin-bottom: 15px;">
		<div class="row" style="margin-bottom: 15px;">
			<div class="col-12">
				<div class="card">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1643.4498083015624!2d104.93034858930615!3d11.56587478098056!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3109516ff4d05d4b%3A0x2622e5860c6dfac2!2sStage+Music+Lounge!5e0!3m2!1sen!2skh!4v1529472097527" width="100%" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-12 col-sm-12">
				<!-- <div class="card">
					<div class="card-header">Message Us</div>
					<div class="card-body">
						<form autocomplete="off">
							{{csrf_field()}}
							<div class="form-group">
								<input type="text" name="name" class="form-control form-control-sm" placeholder="Your full name">
							</div>
							<div class="form-group">
								<input type="email" name="email" class="form-control form-control-sm" placeholder="Your full name">
							</div>
							<div class="form-group">
								<textarea placeholder="Your message" class="form-control" rows="5"></textarea>
							</div>
							<div class="text-right">
								<button class="btn btn-waring">Reset</button>
								<button class="btn btn-success">Send</button>
							</div>
						</form>
					</div>
				</div> -->
			</div>
		</div>
	</div>
@endsection