{{-- custom template for using in my pages --}}

@extends('backend.mastering.master')

@section('content')

	{{-- custom content will go here --}}

	<div class="row">
		<div class="col-md-3">
			<div class="form-group">

				<input type="date" class="sdate form-control">
			</div>
			<div class="form-group">
				<select name="branches" id="" class="sbranch form-control">
					<option value="">--Select Branch--</option>
					@foreach($branches as $branch)
					<option value="{{$branch->id}}">{{$branch->name}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<input type="text" class="sproduct_id form-control" placeholder="Enter Product ID">
			</div>
			
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<input readonly value="{{$invoice}}" type="text" class="sinvoice form-control" placeholder="Invoice Number">
			</div>
			<div class="form-group">
				<input readonly type="text" class="sprice form-control" placeholder="Price">
			</div>
			<div class="form-group">
				<input type="text" class="squantity form-control" placeholder="Enter Quantity">
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<input type="text" class="sdis form-control" placeholder="Enter Discount">
			</div>
			<div class="form-group">
				<input readonly type="text" class="sdis_amount form-control" placeholder="Discount Amount">
			</div>
			<div class="form-group">
				<input readonly type="text" class="stotal_amount form-control" placeholder="Total Amount">
			</div>
			<button class="sale_btn form-control btn btn-primary">Save</button>
		</div>
	</div>


	<div class="row mt-5">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<tr>
						<th>#Sl</th>
						<th>Product Name</th>
						<th>Quantity</th>
						<th>Price</th>
						<th>Sub Total</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody class="saleproduct">
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				</tbody>
			</table>
		</div>

		<div class="col-md-3 mt-5">
			<button class="print btn btn-info btn-sm">Print <i class="fas fa-print"></i></button>
		</div>
	</div>




@endsection