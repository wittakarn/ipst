<?php
require_once DOCUMENT_ROOT.'/connection.php';
require_once DOCUMENT_ROOT.'/class/class.Register.php';

if(isset($_REQUEST['MODE'])){
	$screenMode = $_REQUEST['MODE'];
}

if(isset($_REQUEST['user_id'])){
	$conn = DataBaseConnection::createConnect();
	$userEdit = User::get($conn, $_REQUEST['user_id']);
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
									if (isInvalidateForm()) {
										openInvalidTab();
									} else {                             
										var form = $("#userForm");
										var action = "<?php echo ROOT."crud/create-user.php" ?>";
												
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
										var form = $("#userForm");
										var action = "<?php echo ROOT."crud/update-user.php" ?>";
												
										form.attr('action', action);
										form.attr('target', '_self');
										form.submit();
									}
								}
						);
						
						$("#deleteButton")
							.click(
								function() {
									var form = $("#userForm");
									var action = "<?php echo ROOT."crud/delete-user.php" ?>";

									form.attr('action', action);
									form.attr('target', '_self');
									form.submit();
								});
						
						function isInvalidateForm() {
							$("#userForm").validate({
								ignore : ""
							});
							return !$("#userForm").valid();
						}
            
          }
      );
</script>
<div class="container">
  <form id="userForm" method="post" enctype="multipart/form-data">
    <div class="row">
  		<div class="panel panel-primary">
  			<div class="panel-heading">เพิ่ม/แก้ไข ผู้ใช้งาน</div>
  			<div class="panel-body">
  				<div class="row">
  					<div class="col-md-2">ชื่อสินค้า</div>
  					<div class="col-md-6">
  						<input class="form-control" 
  							type="text"
  							id="userName" 
  							name="user_name"
							required
							autofocus
							value="<?php echo isset($userEdit) ? $userEdit['user_name'] : ''?>"/>
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
							value="<?php echo isset($userEdit) ? $userEdit['standard_price'] : ''?>"/>
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
							value="<?php echo isset($userEdit) ? $userEdit['capital_price'] : ''?>"/>
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
							value="<?php echo isset($userEdit) ? $userEdit['s_price'] : ''?>"/>
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
							value="<?php echo isset($userEdit) ? $userEdit['a_price'] : ''?>"/>
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
							value="<?php echo isset($userEdit) ? $userEdit['b_price'] : ''?>"/>
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
			<a class="btn btn-default pull-right" href="user.php?MODE=S">ย้อนกลับ</a>
			<button type="button" 
  					class="btn btn-default pull-right"
  					id="reloadPage" 
  					onclick="location.reload();">
  					เริ่มใหม่
  			</button>
  		</div>
  	</div>
	<input type="hidden" name="user_id" value="<?php echo isset($userEdit) ? $userEdit['user_id'] : ''?>"/>
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
