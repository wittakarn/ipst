<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);

require_once('../config.php');
require_once(DOCUMENT_ROOT.'lib/ReCaptchaPHP1.11/recaptchalib.php');

ini_set('session.gc_maxlifetime', SESSION_MAX_LIFE_TIME);
session_set_cookie_params(SESSION_MAX_LIFE_TIME);
session_start();

if(!isset($_SESSION['POST_QUESTION'])){
	$_SESSION['POST_QUESTION'] = $_POST;
}
print_r($_SESSION['POST_QUESTION']);
$privatekey = '6LcTdRITAAAAAJZo35cxJYRUuC40UWDqod3rbJT-';
$resp = recaptcha_check_answer ($privatekey, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);
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

    <title>แบบสอบถามสื่อการเรียนรู้</title>
	
	<link rel='shortcut icon' href='<?php echo ROOT; ?>favicon.ico' type='image/x-icon'/ >
	<link rel="icon" href="<?php echo ROOT; ?>favicon.ico" type="image/x-icon">

    <!-- Bootstrap core CSS -->
    <link href="<?php echo ROOT; ?>bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo ROOT; ?>style/header-template.css" rel="stylesheet">
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
	
	<script language="javascript" type="text/javascript">
		var contextRoot = "<?php echo ROOT; ?>";
		var RecaptchaOptions = {
			theme : 'custom',
			custom_theme_widget: 'recaptcha_widget'
		};
		$(document)
					.ready(
							function() {
										$('#submitButton').click(function (e) {
											var reCaptchaForm = $("#reCaptchaForm");
											if (reCaptchaForm.valid()){
												$.blockUI();
												reCaptchaForm.submit();
												$.unblockUI();
											}
										});
							}
					);
	</script>
  </head>

  <body>

	<?php
		include DOCUMENT_ROOT.'teacher/include/header.php';
	?>
	
	<form id="reCaptchaForm" method="POST">
		<div class="container">
			<?php
				if (!$resp->is_valid) {
					// What happens when the CAPTCHA was entered incorrectly
					include DOCUMENT_ROOT.'include/resubmit-recaptcha.php';
				} else {
					// Your code here to handle a successful verification
					echo "Submittion complete";
				}
			?>
		</div>
	</form>
    
  </body>
</html>
