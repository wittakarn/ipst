<script type="text/javascript">
	$(document)
			.ready(
					function() {
						
						$("#readButton").click(function() {
							searchProducts(setProductsToTable);
						});
						
						$("#productName").keyup(function(){
							searchProducts(setProductsToTable);
						});

						function searchProducts(callback) {
							var tbody = $('#tableProduct').find('tbody');
							tbody.empty();
							
							var productNameCriteria = $("#productName").val();
							
							if(productNameCriteria.length > 0){
								var data = {
									"action" : "searchProducts",
									"product_name" : $("#productName").val()
								};
								$.ajax({
									type : "POST",
									dataType : "json",
									url : "<?php echo ROOT ?>ajax/ajax.products.suggestion.php", //Relative or absolute path
									data : data,
									success : callback
								});
							}
						}

						function setProductsToTable(data, textStatus, xhr) {
							var dataSize = data.length;
							var tbody = $('#tableProduct').find('tbody');
							
							for (var i = 0; i < dataSize; i++) {
								tbody
									.append($(
											'<tr style="cursor: pointer;" productId="' + data[i]["product_id"] + '">')
											.append($('<td>').html(i + 1))
											.append(
													$('<td>')
															.html(
																	data[i]["product_name"]))
											.append(
													$('<td align="right">')
															.html(
																	data[i]["standard_price"]))
											.append(
													$('<td align="right">')
															.html(
																	data[i]["capital_price"]))
											.append(
													$('<td align="right">')
															.html(
																	data[i]["s_price"]))
											.append(
													$('<td align="right">')
															.html(
																	data[i]["a_price"]))
											.append(
													$('<td align="right">')
															.html(
																	data[i]["b_price"]))
											);
							}
							setEvent();
						}

						function setEvent() {
							$('#tableProduct tbody > tr').click(function() {
								var productId = $(this).attr('productId');

								$('#editProductId').val(productId);
								$('#searchProductForm').submit();
							});
						}
          }
      );
</script>
<div class="container">
	<div class="table-responsive">
		<table id="tableProduct" class="table table-bordered table-hover">
			<thead>
				<tr class="success">
					<th>#</th>
					<th>
						<input type="text" 
							class="form-control" 
							id="productName" 
							name="product_name"
							placeholder="ชื่อสินค้า"
							autofocus/>
					</th>
					<th>ราคาตั้ง</th>
					<th>ทุน</th>
					<th>ราคาเกรด S</th>
					<th>ราคาเกรด A</th>
					<th>ราคาเกรด B</th>
				</tr>
			</thead>
			<tbody></tbody>
		</table>
	</div>
	<form id="searchProductForm" method="get" target="_self">
		<input type="hidden" id="editProductId" name="product_id"/>
		<input type="hidden" id="screenMode" name="MODE" value="E"/>
	</form>
</div>
