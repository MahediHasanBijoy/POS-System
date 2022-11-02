@extends('backend.mastering.master')

@section('content')

	<div class="row">
		<div class="col-md-6">
			<div class="form-group mt-3">
				<input type="date" class="form-control date">
			</div>
			<div class="form-group mt-3">
				<select name="branches" class="form-control branches">
					<option value="0">---Select Branch---</option>
					@foreach($branches as $branch)
					<option value="{{$branch->id}}">{{$branch->name}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group mt-3">
				<input type="text" class="form-control company_name" placeholder="Enter Company Name">
			</div>
			<div class="form-group mt-3">
				<input type="text" class="form-control invoice" placeholder="Enter Invoice Number">
			</div>
			<div class="form-group mt-3">
				<input readonly type="text" class="form-control available_stock" placeholder="Available Stock">
			</div>
			<div class="form-group mt-3">
				<input type="text" class="form-control product_id" placeholder="Enter Product Id">
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group mt-3">
				<input readonly type="text" class="form-control cost_price" placeholder="Cost Price">
			</div>
			<div class="form-group mt-3">
				<input type="text" class="form-control qty" placeholder="Enter Quantity">
			</div>
			<div class="form-group mt-3">
				<input readonly type="text" class="form-control total_amount" placeholder="Total Amount">
			</div>
			<div class="form-group mt-3">
				<input type="text" class="form-control dis" placeholder="Enter Discount">
			</div>
			<div class="form-group mt-3">
				<input readonly type="text" class="form-control dis_amount" placeholder="Discounted Amount">
			</div>
			<div class="form-group mt-3">
				<input readonly type="text" class="form-control g_total" placeholder="Grand Total">
			</div>
			<button id="purchase_btn" class="form-control btn btn-success">Save</button>
		</div>
	</div>


@endsection