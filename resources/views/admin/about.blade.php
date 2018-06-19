@extends('admin')

@section('content')
<style type="text/css">
			#changePhoto
			{
				position: absolute;
				top: 0;
				right: 2px;
				cursor: pointer;
				background: transparent;
				color: #fff
			}
			#changePhoto:hover{
				color: #000;
			}
		</style>
	<div style="width: 100%; text-align: center; position: relative; margin-bottom: 5px;">
		@if( empty($about->img) )
		<img src="{{ url('node_modules/Image/default/about.png') }}" class="img-fluid">
		<i class="fa fa-repeat" id="changePhoto"></i>
		
		@else
		<img src="{{ url('node_modules/Image/about/'. $about->img) }}" class="img-fluid">
		<i class="fa fa-repeat" id="changePhoto"></i>
		@endif
	</div>
	<form action="{{ url('/admin/about/update/'.$about->id) }}" method="post" id="#updateDescr">
		{{ csrf_field() }}
		<textarea style="width: 100%;" rows="10" name="descr">{{$about['descr']}}</textarea>
		<button class="btn btn-success btn-sm">Update</button>
	</form>
	<div style="display: none;">
		<form action="{{ url('/admin/about/update/photo/'.$about->id) }}" method="post" enctype="multipart/form-data" id="frmChangePhoto">
			{{csrf_field()}}
			<input type="file" name="file" id="file">
		</form>
	</div>
@endsection
@section('script')
	<script type="text/javascript">
		$('textarea').on('change', function(){
			$("#updateDescr").submit();
		});
		$('#changePhoto').click( function(){
			$('#file').click();
		});
		$('#file').change( function(){
			$('#frmChangePhoto').submit();
		})
	</script>
@endsection