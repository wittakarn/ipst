<script src='https://www.google.com/recaptcha/api.js'></script>
<script type="text/javascript">
	$(document)
			.ready(
					function() {
          
								$("#nigol")
								  .click(
										function() {
											if (!isInvalidateForm()) {                        
												$("#signInForm").submit();
											}
										}
								);
								
								function isInvalidateForm() {
									$("#nigol").validate({
										ignore : ""
									});
									return !$("#nigol").valid();
								}
            
          }
      );
</script>
<div 
id="sign-in-model"
class="modal fade bs-example-modal-sm" 
role="dialog"
aria-hidden="true">
  <div class="modal-dialog modal-sm">
	<div class="modal-content">
		<form id="signInForm" class="form-signin" action="<?php echo ROOT.'security/credentials.php'?>" method="post">
			<div class="modal-header">
				<h2 class="form-signin-heading">ลงชื่อเข้าใช้งาน</h2>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="userId" class="sr-only">รหัสผู้ใช้</label>
					<input type="text" name="user_id" class="form-control" placeholder="รหัสผู้ใช้" required autofocus>
					<label for="password" class="sr-only">รหัสผ่าน</label>
					<input type="password" name="password" class="form-control" placeholder="รหัสผ่าน" required>
					<label class="checkbox-inline"><input type="checkbox" value="R" name="rememberme" checked>จดจำฉันไว้ในระบบ</label>
				</div>
				<?php
					if(VERIFY_CAPTCHA){
						echo '<div class="g-recaptcha" 
									data-sitekey="'. SITE_KEY .'"
									style="transform:scale(0.88);-webkit-transform:scale(0.88);transform-origin:0 0;-webkit-transform-origin:0 0;">
								</div>';
					}
				?>
			</div>
			<div class="modal-footer">
				<button class="btn btn-primary btn-block" name="nigol" id="nigol" type="button">เข้าสู่ระบบ</button>
			</div>
		  </form>
	</div>
  </div>
</div>