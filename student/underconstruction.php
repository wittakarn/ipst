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
    
    <link rel="stylesheet" type="text/css" href="<?php echo ROOT; ?>style/error.message.css" />
    
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <script src="<?php echo ROOT; ?>lib/jquery/jquery-1.11.3.min.js"></script>
    <script src="<?php echo ROOT; ?>bootstrap/dist/js/bootstrap.min.js"></script>
	
	<style>
		body {
			padding-top: 50px;
		}
	</style>
  </head>

  <body>
  
    <!-- Begin page content -->
    <div class="container">
		<div class="jumbotron">
			<h3 class="text-center">ร่วมตอบแบบสอบถามความคิดเห็นเกี่ยวกับการใช้สื่อการเรียนรู้ สสวท.</h3>
			<br/>
			<br/>
			<h4 style="text-indent: 50px;">
			     สสวท. ขอเชิญนักเรียนและครูที่สอนวิชาวิทยาศาสตร์ คณิตศาสตร์ และเทคโนโลยี ระดับประถมศึกษาและมัธยมศึกษา ร่วมตอบแบบสอบถามความคิดเห็นเกี่ยวกับการใช้สื่อการเรียนรู้ สสวท. พร้อมลุ้นรับรางวัลสื่อเสริมการเรียนรู้ สสวท. จำนวน 1,000 รางวัล ตั้งแต่วันที่ 1 กุมภาพันธ์ – 31 มีนาคม 2559
			</h4>
			<br/>
			<h4>
			     เว็บไซต์แบบสอบถามความคิดเห็นของครู    <a href="http://ipst.research-education.com/teacher">http://ipst.research-education.com/teacher</a>
			</h4>
			<h4>
			     เว็บไซต์แบบสอบถามความคิดเห็นของนักเรียน    <a href="http://ipst.research-education.com/student">http://ipst.research-education.com/student</a>
			</h4>
			<br/>
			<h4 style="text-indent: 50px;">
				ประกาศรายชื่อผู้ได้รับรางวัลในวันที่ 1 พฤษภาคม 2559 ที่เว็บไซต์  <a href="https://research.ipst.ac.th">https://research.ipst.ac.th</a>
			</h4>
		</div>
    </div>
	<img src="<?php echo ROOT; ?>image/constuction_bar.gif" class="img-responsive" style="margin:0 auto;" alt="อยู่ระหว่างการปรับปรุง" />
  </body>
</html>
