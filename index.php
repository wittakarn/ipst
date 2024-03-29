<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once("config.php");
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

    <title>สสวท.</title>

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
  </head>

  <body>

    <?php
		include DOCUMENT_ROOT.'include/nav-bar.php';
	?>

    <!-- Begin page content -->
    <div class="container">
      <div class="page-header">
        <h1>สถาบันส่งเสริมการสอนวิทยาศาสตร์และเทคโนโลยี (สสวท.)</h1>
      </div>
      <p class="lead">สสวท. เป็นองค์กรหลักของประเทศที่พัฒนาให้นักเรียนมีความรู้ความสามารถด้านวิทยาศาสตร์ คณิตศาสตร์และเทคโนโลยีทัดเทียมนานาชาติ</p>
    </div>

    <?php
		include DOCUMENT_ROOT.'include/footer.php';
	?>
  </body>
</html>
