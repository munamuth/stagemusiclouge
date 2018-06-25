@extends('admin')

@section('content')
	<div class="container">
		<div class="card">
			<div class="card-header">
				<form action="{{ url('/admin/gallery/update/'.$galery->id) }}" method="post">
					{{csrf_field()}}
					<input type="text" name="name" value="{{$galery->name}}"><button>Save</button>
					
				</form>
				<span style="position: absolute;
    top: 5px;
    right: 5px;"><button class="btn btn-sm btn-primary" id="btnAddPhoto">Add photo</button></span>
				
			</div>
			<div class="card-body">
				<div class="row">
					@foreach( $images as $image)
						<div class="col-6 col-sm-4" style="padding: 5px;">
							<div style="position: relative;">
								<img src="{{ url('node_modules/Image/Gallery/'.$image->getImage->name) }}" class="img-fluid">
								<div style="position: absolute; top: 0; right:5px;">
									<a href="{{ url('/admin/gallery/image/destoy/'.$image->id.'/'.$image->getImage->id) }}" class="delete"><i class="fa fa-close"></i></i></a>
									<a href="#" class="change"><i class="fa fa-repeat"></i></i></a>
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
	<div style="display: none;">
		<form action="{{ url('/admin/gallery/image/add/'.$galery->id) }}" method="post" enctype="multipart/form-data" id="formAddPhoto">
			{{csrf_field()}}
			<input type="file" name="file" id="file" multiple>
		</form>

		<form action="{{ url('/admin/gallery/image/update/'.$gallery->id) }}" method="post" enctype="multiple/form-data" id="formchangePhoto">
			{{csrf_field()}}
			<input type="file" name="file" id="updatefile" >
		</form>
	</div>
@endsection
@section('script')
	<style type="text/css">
		.delete, .change{
			color: #fff;
			text-shadow: 1px 1px 3px #000;
		}
		.delete:hover, .change:hover{
			color: #000;
			text-shadow: 1px 1px 3px #fff;
		}
	</style>
	<script type="text/javascript">
		$('#btnAddPhoto').click( function(){
			$('#file').click();
		});
		$('#file').change( function(){
			$('#formAddPhoto').submit();
		})
	</script>
@endsection