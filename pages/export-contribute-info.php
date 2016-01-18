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

    <title>พิมพ์รายการแจกหนังสือ</title>
	
	<link rel='shortcut icon' href='<?php echo ROOT; ?>favicon.ico' type='image/x-icon'/ >
	<link rel="icon" href="<?php echo ROOT; ?>favicon.ico" type="image/x-icon">

    <!-- Bootstrap core CSS -->
    <link href="<?php echo ROOT; ?>bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>

    <!-- Custom styles for this template -->
	<link href="<?php echo ROOT; ?>style/template.css" rel="stylesheet">
    <link href="<?php echo ROOT; ?>style/jquery-ui.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo ROOT; ?>style/error.message.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo ROOT; ?>style/custom.datepicker.css" />
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="<?php echo ROOT; ?>lib/jquery/jquery-1.11.3.min.js"></script>
	<script src="<?php echo ROOT; ?>lib/jquery/jquery-ui-1.11.3.min.js"></script>
    <script src="<?php echo ROOT; ?>bootstrap/dist/js/bootstrap.min.js"></script>
    
    <script src="<?php echo ROOT; ?>lib/jquery/jquery.validate.min.js" type="text/javascript"></script>
	<script src="<?php echo ROOT; ?>lib/jquery/additional-methods.min.js" type="text/javascript"></script>
    <script src="<?php echo ROOT; ?>lib/jquery/jquery.validate.custom.message.js" type="text/javascript"></script>
    <script src="<?php echo ROOT; ?>lib/jquery/jquery.blockUI.js" type="text/javascript"></script>
    <script src="<?php echo ROOT; ?>lib/jquery/jquery.blockUI.custom.message.js" type="text/javascript"></script>
	<script src="<?php echo ROOT; ?>lib/jquery/jquery.datepicker.custom.js" type="text/javascript"></script>
  </head>

  <body>

    <?php
		include DOCUMENT_ROOT.'include/nav-bar.php';
	?>

    <!-- Begin page content -->
                                  
    <?php
	
		if($userId != null){
			include(DOCUMENT_ROOT."/include/export-contribute-info-q.php");
		}
		
	?>
	
  </body>
</html>
