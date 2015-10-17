<?php
require_once DOCUMENT_ROOT.'/connection.php';
require_once DOCUMENT_ROOT.'/class/class.Product.php';
if(isset($_REQUEST['product_id'])){
	$conn = DataBaseConnection::createConnect();
	$productEdit = Product::get($conn, $_REQUEST['product_id']);
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
								if(isset($productEdit['unit_name'])){
									echo '$("#unitName").val("'.$productEdit['unit_name'].'");';
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
              				var form = $("#productForm");
              				var action = "<?php echo ROOT."crud/create-product.php" ?>";
                                    
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
              				var form = $("#productForm");
              				var action = "<?php echo ROOT."crud/update-product.php" ?>";
                                    
              				form.attr('action', action);
              				form.attr('target', '_self');
              				form.submit();
              			}
              		}
            );
			
			$("#deleteButton")
				.click(
					function() {
						var form = $("#productForm");
						var action = "<?php echo ROOT."crud/delete-product.php" ?>";

						form.attr('action', action);
						form.attr('target', '_self');
						form.submit();
					});
            
            function isInvalidateForm() {
							$("#productForm").validate({
								ignore : ""
							});
							return !$("#productForm").valid();
						}
            
          }
      );
</script>
<div class="container">
  <form id="productForm" method="post" enctype="multipart/form-data">
    <div class="row">
  		<div class="panel panel-primary">
  			<div class="panel-heading">เพิ่ม/แก้ไข รายการสินค้า</div>
  			<div class="panel-body">
  				<div class="row">
  					<div class="col-md-2">ชื่อสินค้า</div>
  					<div class="col-md-6">
  						<input class="form-control" 
  							type="text"
  							id="productName" 
  							name="product_name"
							required
							<?php echo $_REQUEST['MODE'] !== 'A' ? 'readonly' : ''?>
							value="<?php echo isset($productEdit) ? $productEdit['product_name'] : ''?>"/>
  					</div>
  				</div>
  				<div class="row">
  					<div class="col-md-2">หน่วยสินค้า</div>
  					<div class="col-md-4">
  						<select class="form-control" id="unitName" name="unit_name">
  						</select>
  					</div>
  				</div>
  				<div class="row">
  					<div class="col-md-2">ราคาตั้ง</div>
  					<div class="col-md-3">
  						<input class="form-control" 
  							type="text"
  							id="standardPrice" 
  							name="standard_price"
							number="true"
							required
							value="<?php echo isset($productEdit) ? $productEdit['standard_price'] : ''?>"/>
  					</div>
  				</div>
				<div class="row">
  					<div class="col-md-2">ทุน</div>
  					<div class="col-md-3">
  						<input class="form-control" 
  							type="text"
  							id="capitalPrice" 
  							name="capital_price"
							number="true"
							required
							value="<?php echo isset($productEdit) ? $productEdit['capital_price'] : ''?>"/>
  					</div>
  				</div>
  				<div class="row">
  					<div class="col-md-2">ราคาลูกค้าเกรด S</div>
  					<div class="col-md-3">
  						<input class="form-control" 
  							type="text"
  							id="sPrice" 
  							name="s_price"
							number="true"
							value="<?php echo isset($productEdit) ? $productEdit['s_price'] : ''?>"/>
  					</div>
  				</div>
          <div class="row">
  					<div class="col-md-2">ราคาลูกค้าเกรด A</div>
  					<div class="col-md-3">
  						<input class="form-control" 
  							type="text"
  							id="aPrice" 
  							name="a_price"
							number="true"
							value="<?php echo isset($productEdit) ? $productEdit['a_price'] : ''?>"/>
  					</div>
  				</div>
  				<div class="row">
  					<div class="col-md-2">ราคาลูกค้าเกรด B</div>
  					<div class="col-md-3">
  						<input class="form-control" 
  							type="text"
  							id="bPrice" 
  							name="b_price"
							number="true"
							value="<?php echo isset($productEdit) ? $productEdit['b_price'] : ''?>"/>
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
			<a class="btn btn-default pull-right" href="product.php?MODE=S">ย้อนกลับ</a>
			<button type="button" 
  					class="btn btn-default pull-right"
  					id="reloadPage" 
  					onclick="location.reload();">
  					เริ่มใหม่
  			</button>
  		</div>
  	</div>
	<input type="hidden" name="product_id" value="<?php echo isset($productEdit) ? $productEdit['product_id'] : ''?>"/>
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
