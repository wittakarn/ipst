<div 
id="sign-in-model"
class="modal fade bs-example-modal-sm" 
role="dialog"
aria-labelledby="mySmallModalLabel" 
aria-hidden="true">
  <div class="modal-dialog modal-sm">
	<div class="modal-content">
		<form class="form-signin" action="<?php echo ROOT.'security/credentials.php'?>" method="post">
			<div class="modal-header">
				<h2 class="form-signin-heading">ลงชื่อเข้าใช้งาน</h2>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="userId" class="sr-only">รหัสผู้ใช้</label>
					<input type="text" name="user_id" class="form-control" placeholder="รหัสผู้ใช้" required autofocus>
					<label for="password" class="sr-only">รหัสผ่าน</label>
					<input type="password" name="password" class="form-control" placeholder="รหัสผ่าน" required>
				</div>
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary btn-block" name="nigol" type="submit">เข้าสู่ระบบ</button>
			</div>
		  </form>
	</div>
  </div>
</div>