@extends('admin')

@section('content')
	<div class="card">
		<div class="card-header">Style Panel</div>
		<div class="card-body">
			<form action="{{ url ('/admin/style/') }}" method="post">
				{{ csrf_field()}}
				<div class="form-group row">
					<label class="col-12 col-sm-6">Header background Color</label>
					<div class="col-12 col-sm-6">
						<input type="color" name="hbackground" value="{{$style->header_background}}">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-12 col-sm-6">Header Text Color</label>
					<div class="col-12 col-sm-6">
						<input type="color" name="htext" value="{{$style->header_text}}">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-12 col-sm-6">Header Border Top Color</label>
					<div class="col-12 col-sm-6">
						<input type="color" name="hbordertop" value="{{$style->header_border_top}}">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-12 col-sm-6">Header Border Bottom Color</label>
					<div class="col-12 col-sm-6">
						<input type="color" name="hborderbottom" value="{{$style->header_border_bottom}}">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-12 col-sm-6">Header Text Hover</label>
					<div class="col-12 col-sm-6">
						<input type="color" name="htexthover" value="{{$style->header_text_hover}}">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-12 col-sm-6">Foot Background Color</label>
					<div class="col-12 col-sm-6">
						<input type="color" name="fbackground" value="{{$style->footer_background}}">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-12 col-sm-6">Foot Text Color</label>
					<div class="col-12 col-sm-6">
						<input type="color" name="ftext" value="{{$style->footer_text}}">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-12 col-sm-6">Foot Border Top Color</label>
					<div class="col-12 col-sm-6">
						<input type="color" name="fbordertop" value="{{$style->footer_border_top}}">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-12 col-sm-6">Bottom Background Color</label>
					<div class="col-12 col-sm-6">
						<input type="color" name="bbackground" value="{{$style->bottom_background}}">
					</div>
				</div>

				<div class="form-group row">
					<label class="col-12 col-sm-6">Bottom Text Color</label>
					<div class="col-12 col-sm-6">
						<input type="color" name="btext" value="{{$style->bottom_text}}">
					</div>
				</div>
				<div class="form-group row">
					<div class="col-12 col-sm-6"></div>
					<div class="col-12 col-sm-6">
						<button type="submit" class="btn btn-success btn-sm">Update</button>
					</div>
					
				</div>
				
			</form>
		</div>
	</div>
@endsection
@section('script')
@endsection