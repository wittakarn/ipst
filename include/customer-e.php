<?php
require_once DOCUMENT_ROOT.'/connection.php';
require_once DOCUMENT_ROOT.'/class/class.Customer.php';
require_once DOCUMENT_ROOT.'/class/class.FileStorage.php';

if(isset($_REQUEST['MODE'])){
	$screenMode = $_REQUEST['MODE'];
}

if(isset($_REQUEST['customer_id'])){
	$conn = DataBaseConnection::createConnect();
	$customerEdit =  Customer::get($conn, $_REQUEST['customer_id']);
	
	$refTable = 'customer';
	$fileBlob1 = FileStorage::get($conn, $_REQUEST['customer_id'], $refTable, 1);
	$fileBlob2 = FileStorage::get($conn, $_REQUEST['customer_id'], $refTable, 2);
	
	$conn = null;
}
?>
<script type="text/javascript">
	$(document).keypress(function(event){
	
		var keycode = (event.keyCode ? event.keyCode : event.which);
		if(keycode == '13'){
			<?php
				if($screenMode === 'A'){
					echo '$("#createButton").click();';
				}else{
					echo '$("#updateButton").click();';
				}
			?>
		}
		
	});

	$(document)
			.ready(
					function() {
          
								$("#createButton")
								  .click(
										function() {
											if (!isInvalidateForm()) {
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
												if (!isInvalidateForm()) {     
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
							autofocus
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
							email="true"
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
				<div class="row">
  					<div class="col-md-2">ระดับ</div>
  					<div class="col-md-3">
  						<select class="form-control" name="grade">
							<option <?php echo (isset($customerEdit) && $customerEdit['grade'] ==='s') ? 'selected' : ''; ?>>s</option>
							<option <?php echo (isset($customerEdit) && $customerEdit['grade'] ==='a') ? 'selected' : ''; ?>>a</option>
							<option <?php echo (isset($customerEdit) && $customerEdit['grade'] ==='b') ? 'selected' : ''; ?>>b</option>
						</select>
  					</div>
  				</div>
				<div class="row">
  					<div class="col-md-2">ที่อยู่จัดส่ง</div>
  					<div class="col-md-6">
						<input type="file" 
							class="form-control" 
							name="file_blob[]"
							id="deliverBlob"/>
					</div>
					<div class="col-md-1">
						<?php
							if(is_array($fileBlob1)){
								echo '<a href="" target="_blank">
											<span class="glyphicon glyphicon-file" aria-hidden="true"></span>
										</a>';
							}
						?>
					</div>
  				</div>
				<div class="row">
  					<div class="col-md-2">รายละเอียดอื่นๆ</div>
  					<div class="col-md-6">
						<input type="file" 
							class="form-control" 
							name="file_blob[]"
							id="remarkBlob"/>
					</div>
					<div class="col-md-1">
						<?php
							if(is_array($fileBlob2)){
								echo '<a href="" target="_blank">
											<span class="glyphicon glyphicon-file" aria-hidden="true"></span>
										</a>';
							}
						?>
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
				if($screenMode === 'E') {
      				echo '<button type="button" 
      								class="btn btn-default"
      								id="updateButton">
      								แก้ไข
      						</button>';
      			}else if($screenMode === 'A') {
      				echo '<button type="button" 
      								class="btn btn-default"
      								id="createButton">
      								บักทึก
      						</button>';
      			}
    		?>
  		</div>
  		<div class="col-md-7"></div>
  		<div class="col-md-3">
			<?php
				if($screenMode === 'E') {
						echo '<button type="button" 
										class="btn btn-default" 
										data-toggle="modal" 
										data-target="#confirmDeleteModel">
										ลบ
								</button>';
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
