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
							<td width="50%">Name</td>
							<td>Action</td>
						</tr>
					</thead>
					<tbody>
						@foreach( $news as $news )
						<tr>
							<td style="max-width: 150px;"><img src="{{ url('/node_modules/Image/News/'. $news->img) }}" class="img-fluid"></td>
							<td>{{$news->name}}</td>
							<td>
								<a href="{{ url('/news-and-events/'.$news->slug) }}" class="btn btn-info btn-sm" target="_blank">View</a>
								<a href="{{ url('/admin/news-and-events/edit/'. $news->id) }}" class="btn btn-warning btn-sm" target="blank">Edit</a>
								<button class="btn btn-warning btn-sm" onclick="btnChangePhoto_Click({{$news->id}})">Change Photo</button>
								<a href="{{ url('/admin/news-and-events/destroy/'.$news->id) }}" class="btn btn-danger btn-sm">destroy</a>
							</td>
						</tr>
						@endforeach
					</tbody>
					
				</table>
				<div style="display: none;">

					<form method="post" action="{{ url('/admin/news-and-events/photo/') }}" enctype="multipart/form-data" id="frmChangePhoto">
						{{ csrf_field() }}
						<input type="file" name="file" id="file">
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
@section('script')
	<script type="text/javascript">
		function btnChangePhoto_Click(id) {
			$('#frmChangePhoto').prop('action', '{{ url("/admin/news-and-events/photo/change/") }}/'+id);
			$('#file').click();
		}
		$('#file').change( function(){
			$('#frmChangePhoto').submit()
		});
	</script>
	<script type="text/javascript" src="{{ url('/node_modules/tinymce/tinymce.min.js') }}"></script>
	<script type="text/javascript">
		tinymce.init({
		selector: 'textarea',
		height: '350',
		plugins: [
		  'advlist autolink lists link image charmap print preview anchor textcolor',
		  'searchreplace visualblocks code fullscreen',
		  ' table contextmenu paste code help wordcount'
			],
		menubar: false,
		toolbar: ' undo redo |  formatselect | bold italic backcolor  | table | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | link image | help',
		
		// enable title field in the Image dialog
		image_title: true, 
		// enable automatic uploads of images represented by blob or data URIs
  		automatic_uploads: true,
  		// URL of our upload handler (for more details check: https://www.tinymce.com/docs/configure/file-image-upload/#images_upload_url)
  		// images_upload_url: 'postAcceptor.php',
  		// here we add custom filepicker only to Image dialog
  		file_picker_types: 'image', 
  		// and here's our custom image picker
  		file_picker_callback: function(cb, value, meta) {
    	var input = document.createElement('input');
    	input.setAttribute('type', 'file');
    	input.setAttribute('accept', 'image/*');
    
    	// Note: In modern browsers input[type="file"] is functional without 
    	// even adding it to the DOM, but that might not be the case in some older
    	// or quirky browsers like IE, so you might want to add it to the DOM
    	// just in case, and visually hide it. And do not forget do remove it
    	// once you do not need it anymore.

    	input.onchange = function() {
      		var file = this.files[0];
      
      		var reader = new FileReader();
      		reader.onload = function () {
        	// Note: Now we need to register the blob in TinyMCEs image blob
        	// registry. In the next release this part hopefully won't be
        	// necessary, as we are looking to handle it internally.
        	var id = 'blobid' + (new Date()).getTime();
        	var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
        	var base64 = reader.result.split(',')[1];
        	var blobInfo = blobCache.create(id, file, base64);
        	blobCache.add(blobInfo);

        	// call the callback and populate the Title field with the file name
        	cb(blobInfo.blobUri(), { title: file.name });
	      	};
	      reader.readAsDataURL(file);
	    };
	    
	    input.click();
	  }
	});
	</script>
@endsection