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
			<table class="table">
				<thead>
					<tr>
						<th>Sl#</th>
						<th>Product Name</th>
						<th>Description</th>
						<th>Size</th>
						<th>Color</th>
						<th>Product Code</th>
						<th>Cost Price</th>
						<th>Sale Price</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					
				</tbody>
			</table>

		</div>
	</div>

@endsection