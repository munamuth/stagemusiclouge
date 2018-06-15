@extends('admin')

@section('content')
	<div class="card">
		<div class="card-header">
			<h5>New Category</h5>
		</div>
		<div class="card-body">
			<form method="post" action="{{url('/admin/menu-category')}}" enctype="multipart/formdata">
				{{csrf_field()}}
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="name" class="form-control form-control-sm">
				</div>
				<button class="btn btn-warning btn-sm" style="min-width: 100px;" onclick="document.GetElementByTageName('form').action('/admin/menu-category')" type="reset">Reset</button>
				<button class="btn btn-success btn-sm" style="min-width: 100px;" type="submit">Save</button>
			</form>
		</div>
	</div>

	<br>	
	<div class="card">
		<div class="card-header">
			<h5>Categories</h5>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-tripped">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						@foreach( $data as $d )
						<tr>
							<td>{{$d->id}}</td>
							<td>{{$d->name}}</td>
							<td>
								@if($d->status == 0)
									<b style="color:red">Inactive</b>
								@else
									<b style="color: green">Active</b>
								@endif
							</td>
							<td>
								<a href="#" class="btn btn-sm btn-info" onclick="btnEdit_Click({{$d->id}})">Edit</a>
								@if($d->status == 0)
									<a href="{{url('/admin/menu-category/destroy/'.$d->id)}}" class="btn btn-sm btn-danger" title="Click to Active">Inactive</a>
								@else
									<a href="{{url('/admin/menu-category/destroy/'.$d->id)}}" class="btn btn-sm btn-success" title="Click to Inactive">Active</a>
								@endif
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
	<script type="text/javascript">
		function btnEdit_click(id) {
			$.ajax({
				url : '/admin/menu-category/show/'+id,
				type: 'get',
				success: function(data)
				{
					if(data.STATUS == true )
					{
						$('form').prop('action', '/admin/menu-category/update/'+id);
						$('input[type="name"]').val(data.DATA.name);
						$
					}
				}
				error: function(data){
					console.log('error');
				}
			}, 200);
		}
	</script>
@endsection