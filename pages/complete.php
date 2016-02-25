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

    <title>ขอบคุณที่ท่านให้ความร่วมมือ</title>

	<link rel='shortcut icon' href='<?php echo ROOT; ?>favicon.ico' type='image/x-icon'/ >
	<link rel="icon" href="<?php echo ROOT; ?>favicon.ico" type="image/x-icon">
	
    <!-- Bootstrap core CSS -->
    <link href="<?php echo ROOT; ?>bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="<?php echo ROOT; ?>lib/jquery/jquery-1.11.3.min.js"></script>
    <script src="<?php echo ROOT; ?>bootstrap/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(document)
				.ready(
						function() {
							$("#closePage").click(function (e) {
								window.close();
							});
						}
				);
	</script>
  </head>

  <body>
    <!-- Begin page content -->
    <div class="container">
		<div class="jumbotron">
			<h2 class="text-center">ส่งแบบประเมินเรียบร้อยแล้ว ขอบคุณที่ท่านให้ความร่วมมือ</h2>
			<br/>
			<p class="text-center">
				<button id="closePage"
						class="btn btn-warning btn-lg">
					ปิดหน้าจอ
				</button>
			</p>
		</div>
    </div>

    
  </body>
</html>