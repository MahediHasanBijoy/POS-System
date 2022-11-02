<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sales Invoice Print</title>
	<style>
		@media print{
			button{
				display: none;
			}

			body{
				width: 10in;
			}
			
		}
	</style>
</head>
<body>
	<div class="row" style="width:50%; text-align: center; margin:auto; padding: 25px; border:1px solid black">
		<h2>Apple Technology Center</h2>
		<h4>Mirpur DOHS, Dhaka-1230</h4>
		<p>Registration: 123456</p>
		<img src="" alt="">
		<div style="overflow: hidden;">
			<div class="left" style="float: left;">
				Print Date: {{date("d/m/Y")}}
			</div>
			<div class="right" style="float: right;">
				@php date_default_timezone_set("Asia/Dhaka"); @endphp
				Time: {{date('h:i:sa')}}
			</div>
		</div>
		<hr>

		<table align="center" border="1" width="100%">
			<tr>
				<th>#sl</th>
				<th>Product Name</th>
				<th>Quantity</th>
				<th>Price</th>
				<th>Dis. Amount</th>
				<th>Sub Total</th>
			</tr>
			@php
				$sl = 1;
				$g_total=0;
			@endphp 
			@foreach($sales as $sale)
			<tr>
				<td>{{$sl++}}</td>
				<td>{{$sale->product->name}}</td>
				<td>{{$sale->quantity}}</td>
				<td>{{$sale->product->sale_price}}</td>
				<td>{{$sale->dis_amount}}</td>
				<td>{{$sale->total_amount}}</td>
			</tr>
				<?php $g_total += $sale->total_amount;  ?>
			@endforeach
			<tr>
				<td colspan="5">Grand Total</td>
				<td colspan="1">{{$g_total}}</td>
			</tr>

		</table>

		<h3>Thank for your purchase</h3>

		<button onclick="window.print()">Print</button>
	</div>
</body>
</html>