{{-- custom template for using in my pages --}}

@extends('backend.mastering.master')

@section('content')

	{{-- custom content will go here --}}
	<div class="row">
		<div class="col-md-4  rounded">
			<div class="form-group mt-3">
					<input type="text" id="name" class="form-control " placeholder="Enter product name">
					<span class="name text-danger"></span>

			</div>
			<div class="form-group">
					<textarea type="text" id="des" class="form-control mt-3" placeholder="Enter product description" cols="10" rows="2"></textarea>
					<span class="des text-danger"></span>
			</div>
			<div class="form-group">
					<input type="text" id="size" class="form-control mt-3" placeholder="Enter product size">
					<span class="size text-danger"></span>
			</div>
			<div class="form-group">
					<input type="color" id="color" class="form-control mt-3" placeholder="Enter product color">
			</div>
			<div class="form-group">
					<input type="text" id="product_code" class="form-control mt-3" placeholder="Enter product code">
					<span class="product_code text-danger"></span>
			</div>
			<div class="form-group">
					<input type="text" id="cost_price" class="form-control mt-3" placeholder="Enter product cost price">
					<span class="cost_price text-danger"></span>
			</div>
			<div class="form-group">
					<input type="text" id="sale_price" class="form-control mt-3" placeholder="Enter product sale price">
					<span class="sale_price text-danger"></span>
			</div>
			<div class="form-group">
				<button class="btn btn-success form-control addproduct">Add Product</button>
			</div>
		</div>
		<div class="col-md-8">
			<table class="table-sm table-striped w-100">
				<thead>
					<tr>
						<th>Sl#</th>
						<th>Name</th>
						<th>Description</th>
						<th>Size</th>
						<th>Color</th>
						<th>Product Code</th>
						<th>Cost Price</th>
						<th>Sale Price</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody class="products">
					
				</tbody>
			</table>

		</div>

		<!-- Edit Modal -->
		<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <div class="form-group mt-3">
					<input type="text" id="edit_name" class="form-control " placeholder="Enter product name">
				</div>
				<div class="form-group">
						<textarea type="text" id="edit_des" class="form-control mt-3" placeholder="Enter product description" cols="10" rows="2"></textarea>
				</div>
				<div class="form-group">
						<input type="text" id="edit_size" class="form-control mt-3" placeholder="Enter product size">
				</div>
				<div class="form-group">
						<input type="color" id="edit_color" class="form-control mt-3" placeholder="Enter product color">
				</div>
				<div class="form-group">
						<input type="text" id="edit_product_code" class="form-control mt-3" placeholder="Enter product code">
				</div>
				<div class="form-group">
						<input type="text" id="edit_cost_price" class="form-control mt-3" placeholder="Enter product cost price">
				</div>
				<div class="form-group">
						<input type="text" id="edit_sale_price" class="form-control mt-3" placeholder="Enter product sale price">
				</div>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
		        <button type="button" class="btn btn-primary" id="update_modal" value="">Update</button>
		      </div>
		    </div>
		  </div>
		</div>
	</div>

@endsection