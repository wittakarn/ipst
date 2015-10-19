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
								if(isset($customerEdit['unit_name'])){
									echo '$("#unitName").val("'.$customerEdit['unitName'].'");';
								}
							?>
						}
						/* populate unit type to unit dropdown list */
						
						$("#readButton").click(function() {
							searchCustomers(setCustomersToTable);
						});

						function searchCustomers(callback) {
							$.blockUI();
							var data = {
								"action" : "searchCustomers",
								"customer_name" : $("#customerName").val()
							};
							$.ajax({
								type : "POST",
								dataType : "json",
								url : "<?php echo ROOT ?>ajax/ajax.search.customer.php", //Relative or absolute path
								data : data,
								success : callback
							});
						}

						function setCustomersToTable(data, textStatus, xhr) {
							var dataSize = data.length;
							var tbody = $('#tableCustomer').find('tbody');
							tbody.empty();
							for (var i = 0; i < dataSize; i++) {
								tbody
										.append($(
												'<tr style="cursor: pointer;" customerId="' + data[i]["customer_id"] + '">')
												.append($('<td>').html(i + 1))
												.append(
														$('<td>')
																.html(
																		data[i]["customer_name"]))
												.append(
														$('<td>')
																.html(
																		data[i]["address"]))
												.append(
														$('<td>')
																.html(
																		data[i]["tel"]))
												.append(
														$('<td>')
																.html(
																		data[i]["contact"]))
												);
							}
							setEvent();
							$.unblockUI();
						}

						function setEvent() {
							$('#tableCustomer tbody > tr').click(function() {
								var customerId = $(this).attr('customerId');

								$('#editCustomerId').val(customerId);
								$('#searchCustomerForm').submit();
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
					<div class="col-md-2">ชื่อลูกค้า</div>
					<div class="col-md-10">
						<input class="form-control" 
							type="text"
							id="customerName" 
							name="customer_name"
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
			<a class="btn btn-default pull-right" href="customer.php?MODE=A">เพิ่มใหม่</a>
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
		<table id="tableCustomer" class="table table-bordered table-hover">
			<thead>
				<tr class="success">
					<th>#</th>
					<th>ชื่อลูกค้า</th>
					<th>ที่อยู่</th>
					<th>เบอร์โทรศัพท์</th>
					<th>ติดต่อ</th>
				</tr>
			</thead>
			<tbody></tbody>
		</table>
	</div>
	<form id="searchCustomerForm" method="get" target="_self">
		<input type="hidden" id="editCustomerId" name="customer_id"/>
		<input type="hidden" id="screenMode" name="MODE" value="E"/>
	</form>
</div>
