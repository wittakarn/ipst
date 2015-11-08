<script type="text/javascript">
	$(document)
			.ready(
					function() {
          
						/* populate unit name to unit dropdown list */
						populateUnitTypes(setUnitNamesToDropdown);

						function populateUnitTypes(callback) {
							var data = {};
							$
									.ajax({
										type : "POST",
										dataType : "json",
										url : "<?php echo ROOT.'ajax/ajax.unit.name.php' ?>", //Relative or absolute path
										data : data,
										success : callback
									});
						}

						function setUnitNamesToDropdown(data, textStatus, xhr) {
							$("#unitName").html("");
              
							for (i = 0; i < data.length; i++) {
								$("#unitName").append(
										'<option value="' + data[i].unit_name + '">'
												+ data[i].unit_name
												+ '</option>');
							}
							
							populateSearchUnitName();
						}
						
						function populateSearchUnitName(){
							<?php
								if(isset($productEdit['unit_name'])){
									echo '$("#unitName").val("'.$productEdit['unitName'].'");';
								}
							?>
						}
						/* populate unit type to unit dropdown list */
						
						$("#readButton").click(function() {
							searchProducts(setProductsToTable);
						});

						function searchProducts(callback) {
							$.blockUI();
							var data = {
								"action" : "searchProducts",
								"product_name" : $("#productName").val()
							};
							$.ajax({
								type : "POST",
								dataType : "json",
								url : "<?php echo ROOT ?>ajax/ajax.search.product.php", //Relative or absolute path
								data : data,
								success : callback
							});
						}

						function setProductsToTable(data, textStatus, xhr) {
							var dataSize = data.length;
							var tbody = $('#tableProduct').find('tbody');
							tbody.empty();
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
							$.unblockUI();
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
	<div class="row">
		<div class="panel panel-primary">
			<div class="panel-heading">ค้นหา รายการสินค้า</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-2">ชื่อสินค้า</div>
					<div class="col-md-10">
						<input class="form-control" 
							type="text"
							id="productName" 
							name="product_name"
							autofocus/>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row ">
		<div class="col-md-2">
			<button type="button" 
					class="btn btn-default" 
					id="readButton">
				ค้นหา</button>
		</div>
		<div class="col-md-7"></div>
		<div class="col-md-3">
			<a class="btn btn-default pull-right" href="product.php?MODE=A">เพิ่มใหม่</a>
      <button type="button" 
					class="btn btn-default pull-right"
					id="reloadPage" 
					onclick="location.reload();">
					เริ่มใหม่
			</button>
		</div>
	</div>
	<div class="row">
	  <div class="col-md-12">
		<hr/>
	  </div>
	</div>
	<div class="table-responsive">
		<table id="tableProduct" class="table table-bordered table-hover">
			<thead>
				<tr class="success">
					<th>#</th>
					<th>ชื่อสินค้า</th>
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
