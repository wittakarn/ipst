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
			if (!isInvalidateForm()) {
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
					'<tr productId="' + data["product_id"] + '">')
					.append($('<td class="col-md-1 tableSeq">').html(''))
					.append(
							$('<td class="col-md-4">')
									.append($('<input type="text" class="form-control"/>')
																		.attr("value", data["product_name"])
																		.attr("name", "product_name[]")))
					.append(
							$('<td class="col-md-1">')
									.append($('<p class="text-right">').html(data["quantity"]))
									.append($('<input type="hidden"/>')
																		.attr("value", data["quantity"])
																		.attr("name", "quantity[]")))
					.append(
							$('<td class="col-md-1">')
									.append($('<p>').html(data["unit_name"]))
									.append($('<input type="hidden"/>')
																		.attr("value", data["unit_name"])
																		.attr("name", "unit_name[]")))
					.append(
							$('<td class="col-md-1">')
									.append($('<p class="text-right">').html(data["price"]))
									.append($('<input type="hidden"/>')
																		.attr("value", data["price"])
																		.attr("name", "price[]")))
					.append(
							$('<td class="col-md-1" align="right">')
									.append($('<p class="text-right">').html(data["summary"]))
									.append($('<input type="hidden"/>')
																		.attr("value", data["summary"])
																		.attr("name", "summary[]")))
					.append(
							$('<td class="col-md-1" align="center">')
									.html('<span class="glyphicon glyphicon-arrow-up" aria-hidden="true" style="cursor: pointer;" />'))
					.append(
							$('<td class="col-md-1" align="center">')
									.html('<span class="glyphicon glyphicon-arrow-down" aria-hidden="true" style="cursor: pointer;" />'))
					.append(
							$('<td class="col-md-1" align="center">')
									.html('<span class="glyphicon glyphicon-remove" aria-hidden="true" style="cursor: pointer;" />'))
					);
		addTableQuotationDetailEvent();
	}
	
	function addTableQuotationDetailEvent(){
		$(".glyphicon-arrow-up").unbind();
		$(".glyphicon-arrow-down").unbind();
		
		$(".glyphicon-arrow-up")
		.click(
			function() {
				var currentRow = $(this).parent().parent();
				var previousRow = currentRow.prev();
				previousRow.before(currentRow);
				addTableQuotationDetailSqeuqnce();
			}
		);
		
		$(".glyphicon-arrow-down")
		.click(
			function() {
				var currentRow = $(this).parent().parent();
				var nextRow = currentRow.next();
				nextRow.after(currentRow);
				addTableQuotationDetailSqeuqnce();
			}
		);
		
		$(".glyphicon-remove")
		.click(
			function() {
				var currentRow = $(this).parent().parent();
				currentRow.remove();
				addTableQuotationDetailSqeuqnce();
			}
		);
		
		addTableQuotationDetailSqeuqnce();
	}
	
	function addTableQuotationDetailSqeuqnce(){
		var rows = $('#tableQuotationDetail').find('tbody').children();
		var rowCount = rows.size();
		var seq = $( ".tableSeq" );
		
		rows.each(function( index ) {
			$( this ).find(seq).html(index + 1);
		});
	}
	
	function clearProductPanel(){
		$("#productSuggestName").val("");
		$("#existProductId").val("");
		$("#productModifyQuantity").val("");
		$("#productModifyPrice").val("");
		$(".label-unit-name").html("");		
		$(".label-price-per-unit-name").html("");
	}
	
	function isInvalidateForm() {
		$("#saleQuoteForm").validate({
			ignore : ""
		});
		return !$("#saleQuoteForm").valid();
	}
});
</script>
<div class="panel panel-primary">
	<div class="panel-heading">เพิ่มรายการสินค้า</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-9">
				<div class="row">
					<div class="col-md-2">ชื่อสินค้า</div>
					<div class="col-md-10">
						<input class="form-control" 
							type="text"
							id="productSuggestName"
							name="product_suggest_name"
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
							name="product_modify_quantity"
							required
							digits="true"/>
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
			<div class="col-md-3">
				<table id="soldPrice" class="table table-fixed">
					<thead>
						<tr class="success">
							<th class="col-md-6">วันที่</th>
							<th class="col-md-6">ราคา</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>