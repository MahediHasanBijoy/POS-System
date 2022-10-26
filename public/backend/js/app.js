$(document).ready(function(){

/*-----------Product Section----------*/

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
								<td class="p-2">
									<button id="edit_button" class="btn-edit btn btn-info btn-sm" value="${val.id}" data-toggle="modal" data-target="#editModal"><i class="fas fa-edit"></i></button>
									<button class="btn-delete btn btn-danger btn-sm" value="${val.id}"><i class="fas fa-trash"></i></button>
								</td>
							</tr>
						`;

						sl++;
					});
					
					$(".products").html(output);
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



	// Edit product
	$(document).on("click", "#edit_button",function(){
		let id = $(this).val();

		// Sending http request to controllers edit method
		$.ajax({
			url: '/product/edit/'+id,
			type: 'get',
			success: function(response){

				$("#edit_name").val(response.data[0].name);
				$("#edit_des").val(response.data[0].des);
				$("#edit_size").val(response.data[0].size);
				$("#edit_color").val(response.data[0].color);
				$("#edit_product_code").val(response.data[0].product_code);
				$("#edit_cost_price").val(response.data[0].cost_price);
				$("#edit_sale_price").val(response.data[0].sale_price);

				// setting value for modal update button
				$("#update_modal").val(id);
			}
		})
	});


	// Update Product
	$("#update_modal").click(function(){
		// product id
		let id = $("#update_modal").val();
		// values from update modal
		let name = $("#edit_name").val();
		let des = $("#edit_des").val();
		let size = $("#edit_size").val();
		let color = $("#edit_color").val();
		let product_code = $("#edit_product_code").val();
		let cost_price = $("#edit_cost_price").val();
		let sale_price = $("#edit_sale_price").val();

		$.ajaxSetup({
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
		});

		$.ajax({
			url: '/product/update/'+id,
			type: 'post',
			data: {
				name,
				des,
				size,
				color,
				product_code,
				cost_price,
				sale_price
			},
			success:function(response){
				$(".modal").modal("hide");

				show();
			}
		})
	});


	// Delete Product
	$(document).on("click", ".btn-delete", function(){
		let id = $(this).val();

		$.ajax({
			url: '/product/destroy/'+id,
			type: 'get',
			success:function(response){
				show();
			}
		});
	})
/*-------------End Product Section------------*/


/*-------------Purchase Section Starts------------*/
	
	// Finding cost price when entering product id
	$(document).on("keyup", ".product_id", function(){
		let product_id = $(this).val();

		if(product_id){
			// http request
			$.ajax({
				url:'/purchase/find/'+product_id,
				type:'get',
				success:function(response){
					if(response.msg === 'success'){
						$(".cost_price").val(response.product.cost_price);
						let qty = $(".qty").val();
						let dis = $('.dis').val();
						let total_amount = response.product.cost_price * qty;
						let dis_amount = (total_amount*dis)/100;
						let g_total = total_amount - dis_amount;
						$(".total_amount").val(total_amount);
						$(".dis_amount").val(dis_amount);
						$(".g_total").val(g_total);

					}else{
						$(".cost_price").val('');
					}
				}
			});


		}else{
			$(".cost_price").val('');
			$(".total_amount").val('');
			$(".dis_amount").val('');
			$(".g_total").val('');
		}
		
	});


	// Finding total price after adding quantity
	$(document).on('keyup','.qty', function(){
		let qty = $(this).val();
		let cost_price = $('.cost_price').val();
		let dis = $('.dis').val();
		let dis_amount = $('.dis_amount').val();
		let total_amount = cost_price * qty;


		$(".total_amount").val(total_amount);

		if(dis!=''){
			$('.dis_amount').val((total_amount*dis)/100);
		}else{
			$('.dis_amount').val('');
			$('.g_total').val(total_amount);			
		}

		if(dis_amount!=''){
			$('.g_total').val(total_amount - dis_amount);
		}else{
			$('.g_total').val(total_amount);
		}
		
	});

	// Finding discount amount
	$(document).on('keyup', '.dis', function(){
		let dis = $(this).val();
		let total_amount = $('.total_amount').val();
		let dis_amount = (total_amount * dis)/100;
		$('.dis_amount').val(dis_amount);
		let g_total = total_amount - dis_amount;
		$('.g_total').val(g_total);
	})

/*-------------Purchase Section Ends------------*/

})