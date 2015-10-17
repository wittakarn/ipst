<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once("config.php");
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

    <title>SEQUOT</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo ROOT; ?>bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo ROOT; ?>/style/sticky-footer-navbar.css" rel="stylesheet">
  </head>

  <body>

    <?php
		include DOCUMENT_ROOT.'include/nav-bar.php';
	?>

    <!-- Begin page content -->
    <div class="container">
      <div class="page-header">
        <h1>ศิริชัยอิเล็คทริค</h1>
      </div>
      <p class="lead">อุปกรณ์ไฟฟ้า สำหรับโรงงานอุตสาหกรรม อาคารตลอดจนที่พักอาศัยทุกประเภท ทั้งทางด้าน ระบบไฟ้ฟ้ากำลัง ระบบไฟฟ้าควบคุม ระบบไฟฟ้าแสงสว่าง</p>
    </div>

    <?php
		include DOCUMENT_ROOT.'include/footer.php';
	?>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo ROOT; ?>lib/jquery/jquery-1.11.3.min.js"></script>
    <script src="<?php echo ROOT; ?>bootstrap/dist/js/bootstrap.min.js"></script>
  </body>
</html>
