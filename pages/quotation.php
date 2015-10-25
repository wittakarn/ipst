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

    <title>ใบเสนอราคา</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo ROOT; ?>bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"/>

    <!-- Custom styles for this template -->
    <link href="<?php echo ROOT; ?>/style/sticky-footer-navbar.css" rel="stylesheet"/>
	<link href="<?php echo ROOT; ?>/style/jquery-ui.min.css" rel="stylesheet"/>
	<link href="<?php echo ROOT; ?>/style/bootstrap-table.css" rel="stylesheet"/>
    
    
    <link rel="stylesheet" type="text/css" href="<?php echo ROOT; ?>style/error.message.css" />
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="<?php echo ROOT; ?>lib/jquery/jquery-1.11.3.min.js"></script>
	<script src="<?php echo ROOT; ?>lib/jquery/jquery-ui-1.11.3.min.js"></script>
    <script src="<?php echo ROOT; ?>bootstrap/dist/js/bootstrap.min.js"></script>
    
    <script src="<?php echo ROOT; ?>lib/jquery/jquery.validate.min.js" type="text/javascript"></script>
    <script src="<?php echo ROOT; ?>lib/jquery/jquery.validate.custom.message.js" type="text/javascript"></script>
    <script src="<?php echo ROOT; ?>lib/jquery/jquery.blockUI.js" type="text/javascript"></script>
    <script src="<?php echo ROOT; ?>lib/jquery/jquery.blockUI.custom.message.js" type="text/javascript"></script>
	
	<style>
		.ui-autocomplete {
			max-height: 300px;
			overflow-y: auto;
			/* prevent horizontal scrollbar */
			overflow-x: hidden;
		}
	</style>
  </head>

  <body>

    <?php
		include DOCUMENT_ROOT.'include/nav-bar.php';
	?>

    <!-- Begin page content -->
                                  
    <?php
	
		if(isset($_REQUEST['MODE']) && $userId != null){
			if($_REQUEST['MODE'] === 'S'){
				include(DOCUMENT_ROOT."/include/quotation-s.php");
			}else{
				include(DOCUMENT_ROOT."/include/quotation-c.php");
			}
		}
		
	?>

    <?php
		include DOCUMENT_ROOT.'include/footer.php';
	?>
  
  </body>
</html>
