<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once("../config.php");
include DOCUMENT_ROOT.'include/permission.php';
?>
                      
<!DOCTYPE html>
<html lang="th">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ลงชื่อเข้าใช้งาน</title>

    <link rel='shortcut icon' href='<?php echo ROOT; ?>favicon.ico' type='image/x-icon'/ >
	<link rel="icon" href="<?php echo ROOT; ?>favicon.ico" type="image/x-icon">
	
    <!-- Bootstrap core CSS -->
    <link href="<?php echo ROOT; ?>bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
	<link href="<?php echo ROOT; ?>style/template.css" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href="<?php echo ROOT; ?>style/error.message.css" />
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="<?php echo ROOT; ?>lib/jquery/jquery-1.11.3.min.js"></script>
    <script src="<?php echo ROOT; ?>bootstrap/dist/js/bootstrap.min.js"></script>
    
    <script src="<?php echo ROOT; ?>lib/jquery/jquery.validate.min.js" type="text/javascript"></script>
    <script src="<?php echo ROOT; ?>lib/jquery/jquery.validate.custom.message.js" type="text/javascript"></script>
	<script src="<?php echo ROOT; ?>lib/jquery/additional-methods.min.js"></script>
    <script src="<?php echo ROOT; ?>lib/jquery/jquery.blockUI.js" type="text/javascript"></script>
    <script src="<?php echo ROOT; ?>lib/jquery/jquery.blockUI.custom.message.js" type="text/javascript"></script>
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
  </head>

  <body>

    <?php
		include DOCUMENT_ROOT.'include/nav-bar.php';
	?>

    <!-- Begin page content -->
                                  
    <div class="container">
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-6">
				<form id="signInForm" class="form-signin" action="<?php echo ROOT.'security/credentials.php'?>" method="post">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="form-signin-heading">ลงชื่อเข้าใช้งาน</h3>
					</div>
					<div class="panel-body">
						<div class="form-group">
							<label for="userId">รหัสผู้ใช้</label>
							<input type="text" name="user_id" class="form-control" required autofocus>
							<br/>
							<label for="password">รหัสผ่าน</label>
							<input type="password" name="password" class="form-control" required>
							<br/>
							<label class="checkbox-inline"><input type="checkbox" value="R" name="rememberme" checked>จดจำฉันไว้ในระบบ</label>
						</div>
						<?php
							if(VERIFY_CAPTCHA){
								echo '<div class="g-recaptcha" 
											data-sitekey="'.SITE.KEY.'">
										</div>';
							}
						?>
						<br/>
						<button class="btn btn-primary btn-block" name="nigol" id="nigol" type="button">เข้าสู่ระบบ</button>
					</div>
				</div>
			</div>
			<div class="col-md-3"></div>
		</div>
	</div>
  </body>
</html>
