@extends('admin')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="card" style="margin-bottom: 15px;">
					<div class="card-body text-right">
						<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#newCategory">New Category</button>
						<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#newMenu">New Menu</button>
					</div>
				</div>
			</div>
		</div>
		<div class="row">

					<div class="col-12 col-sm-4">
						<div class="card">
							<div class="card-header">Categories</div>
							<div class="card-body">
								@foreach($categories as $g)
									<p>
										<a href="#"><img src="{{ url('node_modules/Image/MenuCategory/'. $g->img) }}" style="width: 20%;"></a>
										<a href="{{ url('/admin/menu/category/'.$g->slug) }}">{{$g->name}}</a>
										<span class="text-right float-right">
											<a href="#" class="btn btn-primary btn-sm" onclick="btnEditCategory_Click({{$g->id}})"><i class="fa fa-edit"></i></a>					
											<a href="#" class="btn btn-primary btn-sm" onclick="btnChangeCatPhoto_Click({{$g->id}})"><i class="fa fa-repeat"></i></a>	
											@if($g->status == 1)
												<a href="{{ url('/admin/menu-category/destroy/'.$g->id) }}" class="btn btn-success btn-sm"><i class="fa fa-check"></i></a>	
											@else 
												<a href="{{ url('/admin/menu-category/destroy/'.$g->id) }}" class="btn btn-danger btn-sm"><i class="fa fa-close"></i></a>
											@endif										
										</span>
										
									</p>
								@endforeach
							</div>
						</div>
					</div>

					<div class="col-12 col-sm-8">
						<div class="card">
							<div class="card-header">Menu</div>
							<div class="card-body" style="padding: 0">
								<table class="table">
									<thead>
										<tr>
											<td width="10%">Image</td>
											<td>Name</td>
											<td>Category</td>
											<td>Price</td>
											<td>Action</td>
										</tr>
									</thead>
									<tbody>
										@foreach( $menu as $m )
										<tr>
											<td><img src="{{ url('node_modules/Image/Menu/'.$m->image) }}" class="img-fluid"></td>
											<td>{{ $m->name }}</td>
											<td>{{ $m->type->name }}</td>
											<td>$ {{ $m->price }}</td>
											<td>
												<a href="#" class="btn btn-sm btn-primary" onclick="btnEditMenu_Click({{$m->id}})"><i class="fa fa-edit"></i></a> 
												<a href="#" class="btn btn-sm btn-primary" onclick="btnChangePhoto_Click({{$m->id}})"><i class="fa fa-repeat"></i></a> 
												<a href="{{ url('/admin/menu/destroy/'.$m->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-trash"></i></a> 
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
		</div>
	</div>
	<div class="modal fade" id="newCategory">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header bg-primary text-light">
					New Category
				</div>
			<div class="modal-body">
				<form action="{{ url('/admin/menu-category') }}" method="post" id="frmAddCategory" enctype="multipart/form-data" autocomplete="off">
					{{csrf_field()}}

					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" class="form-control form-control-sm">
					</div>

					<div class="form-group">
						<input type="file" name="file">
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-success btn-sm">Save</button>
					</div>
				</form>
			</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="newMenu">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					New Menu
				</div>
			<div class="modal-body">
				<form action="{{ url('/admin/menu') }}" method="post" id="frmAddMenu" enctype="multipart/form-data" autocomplete="off">
					{{csrf_field()}}

					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" class="form-control form-control-sm">
					</div>

					<div class="form-group">
						<label>Category</label>
						<select name="category_id" class="form-control form-control-sm">
							@foreach($categories as $cat)
								<option value="{{$cat->id}}">{{$cat->name}}</option>
							@endforeach
						</select>
					</div>


					<div class="form-group">
						<label>Price</label>
						<input type="text" name="price" class="form-control form-control-sm">
					</div>

					<div class="form-group">
						<input type="file" name="file">
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-success btn-sm">Save</button>
					</div>
				</form>
			</div>
			</div>
		</div>
	</div>	

	<div class="modal fade" id="modalEditCategory">
		<div class="modal-dialog modal-sm">
			<div class="modal-content">
				<div class="modal-header">Edit</div>
				<div class="modal-body">
					<form method="post" id="frmEditMenu">
						{{csrf_field()}}
						<div class="form-group">
							<input type="text" name="name" class="form-control-sm form-control">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>


	<div style="display: none;">
		<form method="post" enctype="multipart/form-data" id="frmChangePhoto">
			{{csrf_field()}}
			<input type="file" name="file" id="changePhoto">
		</form>
	</div>
@endsection
@section('script')
	<script type="text/javascript">

		function btnChangePhoto_Click(id) {
			$('#frmChangePhoto').prop('action', '{{ url("/admin/menu/change-photo/") }}/'+id);
			$('#changePhoto').click();
		}
		$('#changePhoto').change( function(){
			$('#frmChangePhoto').submit();
		})
		function btnEditMenu_Click(id) {
			$.ajax({
				url : '{{ url("/admin/menu/edit/") }}/'+id,
				type : 'get',
				success: function(data){
					$('body').html(data)
				}, error: function(data){

				}
			})
		}

		function btnEditCategory_Click(id) {
			$.ajax({
				url : '{{ url("/admin/menu-category/edit/") }}/'+ id,
				type : 'get',
				success : function(data){
					$('body').html(data);

				}, error: function(data){

				}
			});
		}
		function btnChangeCatPhoto_Click(id) {
			$('#frmChangePhoto').prop('action', '{{ url("/admin/menu-category/change/photo/") }}/'+id);
			$('#changePhoto').click();
		}
	</script>
@endsection