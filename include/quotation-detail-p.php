<script type="text/javascript">
$(document).ready(function() {
	
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

		$( "#productId" ).val(productId);
		$( "#productModifyName" ).val(productName);
		$( "#productModifyPrice" ).val(<?php echo $customerSelected['grade'].'Price';?>);   
		$( ".display-unit-name" ).html(unitName);		
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
			</div>
		</div>
		<div class="row">
			<div class="col-md-2">ชื่อแสดง</div>
			<div class="col-md-10">
				<input class="form-control" 
					type="text"
					id="productModifyName"/>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2">จำนวน</div>
			<div class="col-md-3">
				<input class="form-control" 
					type="text"
					id="productModifyQuantity"/>
			</div>
			<div class="col-md-7"></div>
		</div>
		<div class="row">
			<div class="col-md-2">ราคา</div>
			<div class="col-md-3">
				<input class="form-control" 
					type="text"
					id="productModifyPrice"/>
			</div>
			<div class="col-md-7"></div>
		</div>
	</div>
</div>