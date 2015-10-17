<?php
require_once DOCUMENT_ROOT.'/connection.php';
require_once DOCUMENT_ROOT.'/class/class.Customer.php';
if(isset($_REQUEST['customer_id'])){
	$conn = DataBaseConnection::createConnect();
	$customerEdit = Product::get($conn, $_REQUEST['customer_id']);
	$conn = null;
}
?>
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
									echo '$("#unitName").val("'.$customerEdit['unit_name'].'");';
								}
							?>
						}
						/* populate unit type to unit dropdown list */
          
            $("#createtButton")
              .click(
              		function() {
              			if (isInvalidateForm()) {
              				openInvalidTab();
              			} else {                             
              				var form = $("#customerForm");
              				var action = "<?php echo ROOT."crud/create-customer.php" ?>";
                                    
              				form.attr('action', action);
              				form.attr('target', '_self');
              				form.submit();
              			}
              		}
            );
			
			$("#updateButton")
              .click(
              		function() {
              			if (isInvalidateForm()) {
              				openInvalidTab();
              			} else {                             
              				var form = $("#customerForm");
              				var action = "<?php echo ROOT."crud/update-customer.php" ?>";
                                    
              				form.attr('action', action);
              				form.attr('target', '_self');
              				form.submit();
              			}
              		}
            );
			
			$("#deleteButton")
				.click(
					function() {
						var form = $("#customerForm");
						var action = "<?php echo ROOT."crud/delete-customer.php" ?>";

						form.attr('action', action);
						form.attr('target', '_self');
						form.submit();
					});
            
            function isInvalidateForm() {
							$("#customerForm").validate({
								ignore : ""
							});
							return !$("#customerForm").valid();
						}
            
          }
      );
</script>
<div class="container">
  <form id="customerForm" method="post" enctype="multipart/form-data">
    <div class="row">
  		<div class="panel panel-primary">
  			<div class="panel-heading">เพิ่ม/แก้ไข ลูกค้า</div>
  			<div class="panel-body">
  				<div class="row">
  					<div class="col-md-2">ชื่อลูกค้า</div>
  					<div class="col-md-6">
  						<input class="form-control" 
  							type="text"
  							id="customerName" 
  							name="customer_name"
							required
							<?php echo $_REQUEST['MODE'] !== 'A' ? 'readonly' : ''?>
							value="<?php echo isset($customerEdit) ? $customerEdit['customer_name'] : ''?>"/>
  					</div>
  				</div>
  				<div class="row">
  					<div class="col-md-2">ที่อยู่</div>
  					<div class="col-md-6">
  						<input class="form-control" 
  							type="text"
  							id="address" 
  							name="address"
							value="<?php echo isset($customerEdit) ? $customerEdit['address'] : ''?>"/>
  					</div>
  				</div>
  				<div class="row">
  					<div class="col-md-2">เบอร์โทรศัพท์ (tel)</div>
  					<div class="col-md-3">
  						<input class="form-control" 
  							type="text"
  							id="tel" 
  							name="tel"
							value="<?php echo isset($customerEdit) ? $customerEdit['tel'] : ''?>"/>
  					</div>
  				</div>
				<div class="row">
  					<div class="col-md-2">แฟกซ์ (fax)</div>
  					<div class="col-md-3">
  						<input class="form-control" 
  							type="text"
  							id="fax" 
  							name="fax"
							value="<?php echo isset($customerEdit) ? $customerEdit['fax'] : ''?>"/>
  					</div>
  				</div>
  				<div class="row">
  					<div class="col-md-2">Email</div>
  					<div class="col-md-3">
  						<input class="form-control" 
  							type="text"
  							id="email" 
  							name="email"
							value="<?php echo isset($customerEdit) ? $customerEdit['email'] : ''?>"/>
  					</div>
  				</div>
          <div class="row">
  					<div class="col-md-2">ติดต่อ (contact)</div>
  					<div class="col-md-3">
  						<input class="form-control" 
  							type="text"
  							id="contact" 
  							name="contact"
							value="<?php echo isset($customerEdit) ? $customerEdit['contact'] : ''?>"/>
  					</div>
  				</div>
  			</div>
  		</div>
  	</div>
    <div class="row">
      <div class="col-md-12">
        <hr/>
      </div>
    </div>
    <div class="row ">
  		<div class="col-md-2">
  			<?php
          if(isset($_REQUEST['MODE'])){
            if($_REQUEST['MODE'] === 'E') {
      				echo '<button type="button" 
      								class="btn btn-default"
      								id="updateButton">
      								แก้ไข
      						</button>';
      			}else if($_REQUEST['MODE'] === 'A') {
      				echo '<button type="button" 
      								class="btn btn-default"
      								id="createtButton">
      								บักทึก
      						</button>';
      			}
          }
    		?>
  		</div>
  		<div class="col-md-7"></div>
  		<div class="col-md-3">
			<?php
				if(isset($_REQUEST['MODE'])){
					if($_REQUEST['MODE'] === 'E') {
							echo '<button type="button" 
											class="btn btn-default" 
											data-toggle="modal" 
											data-target="#confirmDeleteModel">
											ลบ
									</button>';
						}
				  }
			?>
			<a class="btn btn-default pull-right" href="customer.php?MODE=S">ย้อนกลับ</a>
			<button type="button" 
  					class="btn btn-default pull-right"
  					id="reloadPage" 
  					onclick="location.reload();">
  					เริ่มใหม่
  			</button>
  		</div>
  	</div>
	<input type="hidden" name="customer_id" value="<?php echo isset($customerEdit) ? $customerEdit['customer_id'] : ''?>"/>
  </form>
</div>
<div class="modal fade" id="confirmDeleteModel" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteLabel">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title">ท่านแน่ใจว่าต้องการลบข้อมูลนี้</h4>
		</div>
		<div class="modal-body">
			<button type="button" 
				class="btn btn-primary"
				id="deleteButton">
				ยืนยัน
			</button>
			<button type="button" 
				class="btn btn-primary pull-right"
				id="deleteButton"
				onclick="$('#confirmDeleteModel').modal('hide')">
				ยกเลิก
			</button>
		</div>
    </div>
  </div>
</div>
