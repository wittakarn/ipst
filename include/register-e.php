<?php
require_once DOCUMENT_ROOT.'/connection.php';
require_once DOCUMENT_ROOT.'/class/class.User.php';

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
						
						$("#registerForm").validate({
							rules: {
								passwordConfirmation: {
									equalTo: "#password"
								}  
							},
							messages: {
								passwordConfirmation: {
									equalTo: "รหัสผ่านไม่ตรงกัน"
								}  
							}  
						});
          
						$("#createButton")
						  .click(
								function() {
									if (!isInvalidateForm()){
										var form = $("#registerForm");
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
									if (!isInvalidateForm()){                             
										var form = $("#registerForm");
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
									var form = $("#registerForm");
									var action = "<?php echo ROOT."crud/delete-user.php" ?>";

									form.attr('action', action);
									form.attr('target', '_self');
									form.submit();
								});
						
						function isInvalidateForm() {
							$("#registerForm").validate({
								ignore : ""
							});
							return !$("#registerForm").valid();
						}
            
          }
      );
</script>
<div class="container">
  <form id="registerForm" method="post" enctype="multipart/form-data">
    <div class="row">
  		<div class="panel panel-primary">
  			<div class="panel-heading">เพิ่ม/แก้ไข ผู้ใช้งาน</div>
  			<div class="panel-body">
  				<div class="row">
  					<div class="col-md-2">รหัสผู้ใช้ (User ID)</div>
  					<div class="col-md-4">
  						<input class="form-control" 
  							type="text"
  							id="userId" 
  							name="user_id"
							required
							autofocus
							value="<?php echo isset($userEdit) ? $userEdit['user_id'] : ''?>"/>
  					</div>
  				</div>
  				<div class="row">
  					<div class="col-md-2">รหัสผ่าน</div>
  					<div class="col-md-4">
  						<input class="form-control" 
  							type="password"
  							id="password" 
  							name="password"
							required/>
  					</div>
  				</div>
				<div class="row">
  					<div class="col-md-2">ยืนยันรหัสผ่าน</div>
  					<div class="col-md-4">
  						<input class="form-control" 
  							type="password"
  							id="passwordConfirmation"
							name="passwordConfirmation"
							required/>
  					</div>
  				</div>
  				<div class="row">
  					<div class="col-md-2">สิทธิ</div>
  					<div class="col-md-3">
						<div class="radio">
							<label><input type="radio" name="role" value="N" required>ผู้ใช้งานทั่วไป</label>
						</div>
						<div class="radio">
							<label><input type="radio" name="role" value="A" required>ผู้ดูแลระบบ</label>
						</div>
  					</div>
  				</div>
				<div class="row">
  					<div class="col-md-2">จำนวนครั้งที่ใส่รหัสผ่านผิด</div>
  					<div class="col-md-3">
  						<input class="form-control" 
  							type="text"
  							id="passwordIncCount" 
  							name="password_inc_count"
							number="true"
							value="<?php echo isset($userEdit) ? $userEdit['password_inc_count'] : ''?>"/>
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
