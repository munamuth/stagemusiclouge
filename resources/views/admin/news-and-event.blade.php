@extends('admin')
@section('content')
	<div class="card">
		<div class="card-header">
			New
		</div>
		<div class="card-body">
			<form action="{{ url('/admin/news-and-events') }}" method="post" enctype="multipart/form-data" autocomplete="off">
				{{ csrf_field()}}
				<div class="form-group">
					<input type="text" name="name" class="form-control form-control-sm" placeholder="Name">
				</div>
				<div class="form-group">
					<input type="file" name="file">
				</div>
				<div class="form-group">
					<textarea name="descr"></textarea>
				</div>
				<button class="btn btn-success" style="min-width: 100px;">Save</button>
			</form>
			
		</div>
	</div>
	<br>
	<div class="card">
		<div class="card-header">
			<h4>List of News and Events</h4>
		</div>
		<div class="card-body" style="padding: 0px;">
			<div class="table-responsive">
				<table class="table table-stripped">
					<thead>
						<tr>
							<td>Photo</td>
							<td>Name</td>
							<td>Description</td>
							<td>Action</td>
						</tr>
					</thead>
					<tbody>
						@foreach( $news as $news )
						<tr>
							<td style="max-width: 150px;"><img src="{{ url('/node_modules/Image/News/'. $news->img) }}" class="img-fluid"></td>
							<td>{{$news->name}}</td>
							<td>{!!$news->descr!!}</td>
							<td>
								<button class="btn btn-info btn-sm">View</button>
								<a href="{{ url('/admin/news-and-events/edit/'. $news->id) }}" class="btn btn-warning btn-sm">Edit</button>
								<button class="btn btn-warning btn-sm">Change Photo</button>
								<button class="btn btn-danger btn-sm">destroy</button>
							</td>
						</tr>
						@endforeach
					</tbody>
					
				</table>
				
			</div>
		</div>
	</div>
@endsection
@section('script')
	<script type="text/javascript" src="{{ url('/node_modules/tinymce/tinymce.min.js') }}"></script>
	<script type="text/javascript">
		tinymce.init({
		selector: 'textarea',
		height: 500,
		menubar: false,
		plugins: [
		  'advlist autolink lists link image charmap print preview anchor textcolor',
		  'searchreplace visualblocks code fullscreen',
		  'insertdatetime media table contextmenu paste code help wordcount'
		],
		toolbar: 'insert | undo redo |  formatselect | bold italic backcolor  | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help',
		content_css: [
		    '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
		    '//www.tinymce.com/css/codepen.min.css']
		});
	</script>
@endsection