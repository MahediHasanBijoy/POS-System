$(document).ready(function(){
	// Show products
	show();


	// Function show 
	function show(){
		$.ajax({
			url:'/product/show',
			method:'GET',
			dataType:'JSON',
			success:function(response){
				if(response.msg == 'success'){

					var output = '';
					var sl = 1;
					$.each(response.data, function(key, val){
					
						output += `
							<tr>
								<td>${sl}</td>
								<td>${val.name}</td>
								<td>${val.des}</td>
								<td>${val.size}</td>
								<td><div style="width:10px; height:10px; background:${val.color}"></div></td>
								<td>${val.product_code}</td>
								<td>${val.cost_price}</td>
								<td>${val.sale_price}</td>
								<td>
									<button class="btn-edit btn btn-info btn-sm">Edit</button>
									<button class="btn-delete btn btn-danger btn-sm">Delete</button>
								</td>
							</tr>
						`;

						sl++;
					});
					console.log(output);
					$("tbody").html(output);
				}
			}
		});
	}

	// Add product
	$(".addproduct").click(function(){
		// values from input field
		var name = $('#name').val();
		var des = $('#des').val();
		var size = $('#size').val();
		var color = $('#color').val();
		var product_code = $('#product_code').val();
		var cost_price = $('#cost_price').val();
		var sale_price = $('#sale_price').val();

		//clear errors
		$('.name').text('');
		$('.des').text('');
		$('.size').text('');
		$('.product_code').text('');
		$('.cost_price').text('');
		$('.sale_price').text('');

		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

		$.ajax({
			url:'/product/store',
			type:'POST',
			dataType:'JSON',
			data:{
				name,
				des,
				size,
				color,
				product_code,
				cost_price,
				sale_price
			},
			success:function(response){

				// error messages
				if(response.msg == 'error'){
					if(response.errors.name){
						$('.name').text(response.errors.name[0]);
					}
					if(response.errors.des){
						$('.des').text(response.errors.des[0]);
					}
					if(response.errors.size){
						$('.size').text(response.errors.size[0]);
					}
					if(response.errors.product_code){
						$('.product_code').text(response.errors.product_code[0]);
					}
					if(response.errors.cost_price){
						$('.cost_price').text(response.errors.cost_price[0]);
					}
					if(response.errors.sale_price){
						$('.sale_price').text(response.errors.sale_price[0]);
					}

				}else{
					// clearing input fields
					$('#name').val('');
					$('#des').val('');
					$('#size').val('');
					$('#color').val('');
					$('#product_code').val('');
					$('#cost_price').val('');
					$('#sale_price').val('');

					show();
				}
			}
		})
	});
})