{{-- custom template for using in my pages --}}

@extends('backend.mastering.master')

@section('content')
	{{-- custom content will go here --}}
	<div class="row">
		<div class="col-md-12">
			<table class="table stock-table" border="1">
				<tr>
					<th>Branch Name</th>
					<th>Branch Manager Name</th>
					<th>Product Name</th>
					<th>Cost Price</th>
					<th>Sale Price</th>
					<th>Quantity</th>
				</tr>
				@foreach($stocks as $stock)
				<tr>        {{-- $branch = Stock::find(1)->branch; --}}

					<td>{{$stock->branch->name}}</td>
					<td>{{$stock->branch->manager}}</td>
					<td>{{$stock->product->name}}</td>
					<td>{{$stock->product->cost_price}}</td>
					<td>{{$stock->product->sale_price}}</td>
					<td>{{$stock->quantity}}</td>
				</tr>
				@endforeach
				<tr><th>Total Quantity = </th><td colspan="5">400</td></tr>
			</table>

			<button class="print btn btn-primary btn-sm" onclick="window.print()">Print <i class="fas fa-print"></i></button>
		</div>
	</div>


	<style>
		@media print{
			.print, .br-pagetitle, .br-footer, .br-header{
				display: none;
			}
			.stock-table{
				background-color: cyan;
			}
		}
		
	</style>
@endsection