<script type="text/javascript">
$(document).ready(function() {
	
	$("#resetButton")
	.click(
		function() {
			clearProductPanel();
		}
	);
	
	$("#addDateToTableButton")
	.click(
		function() {
			$.blockUI();
			
			var productData = [];
			productData['product_id'] = $("#existProductId").val();
			productData['product_name'] = $("#productSuggestName").val();
			productData['unit_name'] = $(".label-unit-name").html();
			productData['quantity'] = $("#productModifyQuantity").val();
			productData['price'] = $("#productModifyPrice").val();
			productData['summary'] = (productData['price'] * productData['quantity']).toFixed(2);
			
			addProductToTable(productData);
			clearProductPanel();
			
			$.unblockUI();
		}
	);
	
	$( "#productSuggestName" ).autocomplete({
		source: productsSuggestion,
		minLength: 2,                            
		select: productsSelected,
		change: productsSelected
	});
	
	function productsSuggestion(request, response){
		$.ajax({
			url : "<?php echo ROOT.'ajax/ajax.products.suggestion.php'; ?>",
			dataType: "json",
			data: {
			"product_name"  : $( "#productSuggestName" ).val()
			},
			success: function( data ) {
				productsResponseSuggestion(response, data);
			}
		});
	}
	
	function productsSelected(event, ui){
		var productId = "";
		var productName = "";
		var unitName = "";
		var sPrice = "";
		var aPrice = "";
		var bPrice = "";

		var respObj = ui.item;
		if(respObj != null){
			productId = respObj.productId;
			productName = respObj.productName;
			unitName = respObj.unitName;
			sPrice = respObj.sPrice;
			aPrice = respObj.aPrice;
			bPrice = respObj.bPrice;
		}

		$( "#existProductId" ).val(productId);
		$( "#productModifyPrice" ).val(<?php echo $customerSelected['grade'].'Price';?>);   
		$( ".label-unit-name" ).html(unitName);		
		$( ".label-price-per-unit-name" ).html("บาท/".concat(unitName));
		
	}
	
	function productsResponseSuggestion(response, data){
		var responseArr = $.map( data, function( item ) {
			return {
				value: item.product_name,
				productId: item.product_id,
				productName: item.product_name,
				unitName: item.unit_name,
				sPrice: item.s_price,
				aPrice: item.a_price,
				bPrice: item.b_price
			}
		});
		return response(responseArr);
	}
	
	function addProductToTable(data) {
		var dataSize = data.length;
		var tbody = $('#tableQuotationDetail').find('tbody');
		
		tbody
			.append($(
					'<tr style="cursor: pointer;" productId="' + data["product_id"] + '">')
					.append($('<td>').html(1))
					.append(
							$('<td>')
									.html(
											data["product_name"]))
					.append(
							$('<td align="right">')
									.html(
											data["quantity"]))
					.append(
							$('<td>')
									.html(
											data["unit_name"]))
					.append(
							$('<td align="right">')
									.html(
											data["price"]))
					.append(
							$('<td align="right">')
									.html(
											data["summary"]))
					);
	}
	
	function clearProductPanel(){
		$("#productSuggestName").val("");
		$("#existProductId").val("");
		$("#productModifyQuantity").val("");
		$("#productModifyPrice").val("");
		$(".label-unit-name").html("");		
		$(".label-price-per-unit-name").html("");
	}
});
</script>
<div class="panel panel-primary">
	<div class="panel-heading">เพิ่มรายการสินค้า</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-2">ชื่อสินค้า</div>
			<div class="col-md-10">
				<input class="form-control" 
					type="text"
					id="productSuggestName"
					autofocus/>
				<input type="hidden" id="existProductId" required/>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2">จำนวน</div>
			<div class="col-md-3">
				<input class="form-control" 
					type="text"
					id="productModifyQuantity"
					digit="true"/>
			</div>
			<div class="col-md-7">
				<p class="label-unit-name"></p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2">ราคา</div>
			<div class="col-md-3">
				<input class="form-control" 
					type="text"
					id="productModifyPrice"
					number="true"/>
			</div>
			<div class="col-md-7">
				<p class="label-price-per-unit-name"></p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2">
				<button type="button" 
						class="btn btn-default"
						id="addDateToTableButton">
						เพิ่ม
				</button>
			</div>
			<div class="col-md-8">
			</div>
			<div class="col-md-2">
				<button type="button" 
						class="btn btn-default"
						id="resetButton">
						ล้าง
				</button>
			</div>
		</div>
	</div>
</div>