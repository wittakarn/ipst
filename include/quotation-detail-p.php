<script type="text/javascript">
$(document).keypress(function(event){

	var keycode = (event.keyCode ? event.keyCode : event.which);
	
	if(keycode == '13'){
		$("#addDateToTableButton").click();
	}
	
});
$(document).ready(function() {
	
	loadOldQuotation();
	
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
				
				var existProductId = $("#existProductId").val();
				
				var duplicateRow = findDuplicateRowOfProductIdInProductDetailTable(existProductId);
				
				if(duplicateRow != null){
					modifyExistRow(duplicateRow);
				} else {
					addNewRow(existProductId);
				}
				calculateTotalPrice();
				clearProductPanel();
				$('#emptyTableError').hide();
				$.unblockUI();
				
				$( "#productSuggestName" ).focus();
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

		
		if(productId != ""){
			$( "#existProductId" ).val(productId);
			$( "#productModifyPrice" ).val(<?php echo $customerSelected['grade'].'Price';?>);   
			$( ".label-unit-name" ).html(unitName);		
			$( ".label-price-per-unit-name" ).html("บาท/".concat(unitName));
			$( "#productModifyQuantity" ).val(1);
			
			loadOfferedPrice(productId);
		}
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
		var tbody = $('#tableQuotationDetail').find('tbody');
		
		tbody
			.append($(
					'<tr productId="' + data["product_id"] + '">')
					.append($('<td class="col-md-1 tableSeq">').html(''))
					.append(
							$('<td class="col-md-4">')
									.append($('<input type="text" class="form-control"/>')
																		.attr("value", data["product_name"])
																		.attr("name", "product_name[]"))
									.append($('<input type="hidden" class="form-control"/>')
																		.attr("value", data["product_id"])
																		.attr("name", "product_id[]")))
					.append(
							$('<td class="col-md-1 quantity">')
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
							$('<td class="col-md-1 price">')
									.append($('<p class="text-right">').html(data["price"]))
									.append($('<input type="hidden"/>')
																		.attr("value", data["price"])
																		.attr("name", "price[]")))
					.append(
							$('<td class="col-md-1 summary" align="right">')
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
				calculateTotalPrice();
			}
		);
		
		addTableQuotationDetailSqeuqnce();
	}
	
	function addTableQuotationDetailSqeuqnce(){
		var rows = $('#tableQuotationDetail').find('tbody').children();
		rows.each(function( index ) {
			columns = $( this ).find($( ".tableSeq" ));
			columns.empty();
			columns.append($('<p>').html(index + 1))
						.append($('<input type="hidden"/>')
													.attr("value", index + 1)
													.attr("name", "sequence[]"))
		});
	}
	
	function addNewRow(existProductId){
		var productData = [];
		productData['product_id'] = existProductId;
		productData['product_name'] = $("#productSuggestName").val();
		productData['unit_name'] = $(".label-unit-name").html();
		productData['quantity'] = $("#productModifyQuantity").val();
		productData['price'] = $("#productModifyPrice").val();
		//var summary = (productData['price'] * productData['quantity']);
		//productData['summary'] = Math.round(summary * 100)/100;
		
		var summary = (productData['price'] * productData['quantity']);
		productData['summary'] = roundPrice(summary);
		
		addProductToTable(productData);
	}
	
	function modifyExistRow(duplicateRow){
		var columnQuantity = duplicateRow.find($( ".quantity" ));
		var columnPrice = duplicateRow.find($( ".price" ));
		var columnSummary = duplicateRow.find($( ".summary" ));
		
		var pElement = columnQuantity.find($("p"));
		var inputElement = columnQuantity.find($(":input"));
		var modifyQuantity = Number($("#productModifyQuantity").val()) + Number(inputElement.val());
		pElement.html(modifyQuantity);
		inputElement.val(modifyQuantity);
		
		pElement = columnPrice.find($("p"));
		inputElement = columnPrice.find($(":input"));
		var modifyPrice = Number($("#productModifyPrice").val());
		pElement.html(modifyPrice);
		inputElement.val(modifyPrice);
		
		pElement = columnSummary.find($("p"));
		inputElement = columnSummary.find($(":input"));
		var modifySummary = (modifyPrice * modifyQuantity);
		modifySummary = roundPrice(modifySummary);
		pElement.html(modifySummary);
		inputElement.val(modifySummary);
	}
	
	function findDuplicateRowOfProductIdInProductDetailTable(productId){
		var rows = $("#tableQuotationDetail").find('tbody').children();
		var duplicateRow = null;
		rows.each(function( index ) {
			if($( this ).attr("productId") == productId){
				duplicateRow = $( this );
			}
		});
		return duplicateRow;
	}
	
	function calculateTotalPrice(){
		var classSummary = $( ".summary" );
		var elements = $('#tableQuotationDetail').find($( "input[name*='summary[]']" ));
		
		var totalPrice = 0;
		elements.each(function( index ) {
			totalPrice = totalPrice + Number($( this ).val());
		});
		totalPrice = roundPrice(totalPrice);
		
		var vatPrice = 0;
		if(totalPrice > 0){
			vatPrice = (<?php echo THAI_VAT;?> * totalPrice) / 100;
		}
		vatPrice = roundPrice(vatPrice);
		
		var netPrice = totalPrice + vatPrice;
		netPrice = roundPrice(netPrice);
		
		setQuotationFooter(totalPrice, vatPrice, netPrice);
	}
	
	function setQuotationFooter(totalPrice, vatPrice, netPrice){
		$( "#pTotalPrice" ).html(totalPrice);
		$( "#pVatPrice" ).html(vatPrice);
		$( "#pNetPrice" ).html(netPrice);
		
		$( "#totalPrice" ).val(totalPrice);
		$( "#vatPrice" ).val(vatPrice);
		$( "#netPrice" ).val(netPrice);
	}
	
	function clearProductPanel(){
		$("#productSuggestName").val("");
		$("#existProductId").val("");
		$("#productModifyQuantity").val("");
		$("#productModifyPrice").val("");
		$(".label-unit-name").html("");		
		$(".label-price-per-unit-name").html("");
	}
	
	function loadOfferedPrice(productId){
		$.ajax({
			url : "<?php echo ROOT.'ajax/ajax.list.old.prices.php'; ?>",
			dataType: "json",
			data: {
			"customer_id"  : $( "#customerId" ).val(),
			"product_id"  : productId
			},
			success: setOfferedPriceToTable
		});
	}
	
	function setOfferedPriceToTable(data, textStatus, xhr) {
		var dataSize = data.length;
		var tbody = $('#tableOfferedPrice').find('tbody');
		tbody.empty();
		for (var i = 0; i < dataSize; i++) {
			var tdDateElement = $('<td>');
			tdDateElement.append($('<small>').html(formatThaiDate(data[i]["date"])));
			
			var tdPriceElement = $('<td class="text-right">');
			tdPriceElement.append($('<small>').html(data[i]["price"]));
			
			tbody
					.append($('<tr>')
							.append(tdDateElement)
							.append(tdPriceElement)
							);
		}
		$.unblockUI();
	}
	
	function loadOldQuotation(){
		$.ajax({
			url : "<?php echo ROOT.'ajax/ajax.list.old.quotations.php'; ?>",
			dataType: "json",
			data: {
			"customer_id"  : $( "#customerId" ).val()
			},
			success: setOldQuotationsToTable
		});
	}
	
	function setOldQuotationsToTable(data, textStatus, xhr) {
		var dataSize = data.length;
		var tbody = $('#tableOldQuotationDetail').find('tbody');
		var quot_no;
		tbody.empty();
		for (var i = 0; i < dataSize; i++) {
			quot_no = data[i]["quot_no"];
			
			var tdPdfElement = $('<td class="center">');
			var ahref = "<?php echo ROOT.'report/example-quotation-detail.php?quot_no='; ?>" + quot_no;
			var aElement = $('<a>').attr("href", ahref)
									.attr("target", "_blank");
			aElement.append($('<span>').attr("class", "glyphicon glyphicon-file")
										.attr("aria-hidden", "true")
										.attr("style", "cursor: zoom-in;"));
			tdPdfElement.append(aElement);
			
			tbody
					.append($(
							'<tr style="cursor: pointer;" quot_no="' + quot_no + '">')
							.append(
									$('<td>')
											.html(
													data[i]["quot_no"]))
							.append(
									$('<td>')
											.html(
													formatThaiDate(data[i]["date"])))
							.append(
									$('<td align="right">')
											.html(
													data[i]["net_price"]))
							.append(tdPdfElement)
							);
		}
		setOldQuotationsRowEvent();
		$.unblockUI();
	}
	
	function setOldQuotationsRowEvent() {
		$('#tableOldQuotationDetail tbody > tr').click(function() {
			$.blockUI();
			var quot_no = $(this).attr('quot_no');
			getOfferedQuotation(quot_no);
			getOfferedQuotationDetails(quot_no);
			$( "#createButton" ).hide();
			$( "#updateButton" ).show();
			$( ".quot-no" ).show();
			$.unblockUI();
		});
		
		$('#tableOldQuotationDetail tbody > tr .glyphicon-file').click(function(e){
            e.stopPropagation(); 
        });
	}
	
	function getOfferedQuotation(quot_no){
		$.ajax({
			url : "<?php echo ROOT.'ajax/ajax.list.offered.quotation.php'; ?>",
			dataType: "json",
			data: {
			"quot_no"  : quot_no
			},
			success: setOfferedQuotation
		});
	}
	
	function setOfferedQuotation(data, textStatus, xhr){
		$( "#pOfferedQuotNo" ).html(data['quot_no']);
		$( "#pOfferedQuotationDate" ).html(formatThaiDate(data['date']));
		
		$( "#offeredQuotNo" ).val(data['quot_no']);
		setQuotationFooter(data['total_price'], data['vat_price'], data['net_price']);
	}
	
	function getOfferedQuotationDetails(quot_no){
		$.ajax({
			url : "<?php echo ROOT.'ajax/ajax.list.offered.quotation.details.php'; ?>",
			dataType: "json",
			data: {
			"quot_no"  : quot_no
			},
			success: setQuotationDetailsToTable
		});
	}
	
	function setQuotationDetailsToTable(data, textStatus, xhr){
		var dataSize = data.length;
		var tbody = $('#tableQuotationDetail').find('tbody');
		tbody.empty();
		for (var i = 0; i < dataSize; i++) {
			data[i]["summary"] = data[i]["summary_price"];
			addProductToTable(data[i]);
		}
	}
	
	function isInvalidateForm() {
		$("#saleQuoteForm").validate({
			ignore : ""
		});
		return !$("#saleQuoteForm").valid();
	}
	
	function roundPrice(num){
		var roundVal = 0;
		if(num > 0){
			roundVal = Math.round(num * 100)/100
		}
		return roundVal;
	}
	
	function formatThaiDate(strDate){
		var thaiDate = "";
		
		if(strDate != null && strDate != ""){
			var arrDmy = strDate.split("-");
			if(arrDmy.length == 3){
				var engYear = Number(arrDmy[0]);
				var thaiYear = engYear;
				if(thaiYear < 2400){
					thaiYear = thaiYear + 543;
				}
				thaiDate = arrDmy[2].concat("/").concat(arrDmy[1]).concat("/").concat(thaiYear);
			}
		}
		
		return thaiDate;
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
			<div class="col-md-3 table-responsive table-fixed">
				<table id="tableOfferedPrice" class="table table-bordered">
					<thead>
						<tr class="success">
							<th>วันที่</th>
							<th class="text-right">ราคา</th>
						</tr>
					</thead>
					<tbody>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>