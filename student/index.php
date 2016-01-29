<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once("../config.php");
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
	
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	
	  ga('create', 'UA-73011114-2', 'auto');
	  ga('send', 'pageview');
	
	</script>
  </head>

  <body>

	<?php
		include DOCUMENT_ROOT.'student/include/header.php';
	?>

    <!-- Begin page content -->
    <div class="container">
		<div class="jumbotron">
			<h2 class="text-center">คำชี้แจง</h2>
			<h3 style="text-indent: 50px;">
			     เนื่องด้วย สถาบันส่งเสริมการสอนวิทยาศาสตร์และเทคโนโลยี (สสวท.) มีความประสงค์จะสำรวจข้อมูลเกี่ยวกับการใช้สื่อการเรียนรู้วิชาวิทยาศาสตร์ คณิตศาสตร์ และเทคโนโลยี เพื่อนำไปใช้พัฒนา
สื่อการเรียนรู้ของ สสวท. จึงขอความร่วมมือจากนักเรียนตอบแบบสอบถามฉบับนี้ให้ครบถ้วน ตรงกับ
ความเป็นจริง
			</h3>
			<h3 style="text-indent: 50px;">
				<strong>ข้อมูลที่ถูกต้อง ตรงตามสภาพความเป็นจริง มีคุณค่าอย่างยิ่งต่อการวางแผนดำเนินงานในอนาคต</strong>
			</h3>
			<br/>
			<p class="text-center">
				<a class="btn btn-primary btn-lg" 
					href="<?php echo ROOT; ?>student/questionnaire.php" 
					target="_blank"
					role="button">
					เริ่มทำแบบสอบถาม
				</a>
			</p>
		</div>
    </div>

    <?php
		include DOCUMENT_ROOT.'include/footer.php';
	?>
  </body>
</html>
