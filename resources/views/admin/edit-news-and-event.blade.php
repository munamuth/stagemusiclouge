@extends('admin')
@section('content')
	<div class="card">
		<div class="card-header">
			<h4>Edit ({{$news->name}})</h4>
		</div>
		<div class="card-body">
			<form action="{{ url('/admin/news-and-events/update/'.$news->id) }}" method="post">
				{{csrf_field()}}
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="name" class="form-control form-control-sm" value="{{$news->name}}">
				</div>
				<div class="form-group">
					<textarea name="descr">{{$news->descr}}</textarea>
				</div>
				<button class="btn btn-success btn-sm" style="min-width: 150px;">Update</button>
			</form>
		</div>
	</div>
@endsection
@section('script')
	<script type="text/javascript" src="{{ url('/node_modules/tinymce/tinymce.min.js') }}"></script>
	<script type="text/javascript">
		tinymce.init({
		selector: 'textarea',
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