<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once("../config.php");
require_once DOCUMENT_ROOT.'/connection.php';
require_once DOCUMENT_ROOT.'/class/class.Participant.php';
require_once DOCUMENT_ROOT.'/class/class.Contribution.php';
require_once DOCUMENT_ROOT.'/class/class.ScienceBook.php';
require_once DOCUMENT_ROOT.'/class/class.ScienceBookInstructor.php';
require_once DOCUMENT_ROOT.'/class/class.MathBook.php';
require_once DOCUMENT_ROOT.'/class/class.MathBookInstructor.php';
require_once DOCUMENT_ROOT.'/class/class.TechnologyBook.php';
require_once DOCUMENT_ROOT.'/class/class.TechnologyBookInstructor.php';
require_once DOCUMENT_ROOT.'/class/class.DesignBook.php';
require_once DOCUMENT_ROOT.'/class/class.DesignBookInstructor.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	$conn = DataBaseConnection::createConnect();
	
	try{
		$conn->beginTransaction();
		
		if(isset($_REQUEST['type'])){
			$participant = new Participant($conn, $_REQUEST);
			$createId = $participant->create();
			
			$scienceBook = new ScienceBook($conn, $_REQUEST);
			$scienceBook->create($createId);
			
			$mathBook = new MathBook($conn, $_REQUEST);
			$mathBook->create($createId);
			
			$technologyBook = new TechnologyBook($conn, $_REQUEST);
			$technologyBook->create($createId);
			
			$designBook = new DesignBook($conn, $_REQUEST);
			$designBook->create($createId);
			
			if($_REQUEST['type'] === 't'){
				$scienceBookInstructor = new ScienceBookInstructor($conn, $_REQUEST);
				$scienceBookInstructor->create($createId);
				
				$mathBookInstructor = new MathBookInstructor($conn, $_REQUEST);
				$mathBookInstructor->create($createId);
				
				$technologyBookInstructor = new TechnologyBookInstructor($conn, $_REQUEST);
				$technologyBookInstructor->create($createId);
				
				$designBookInstructor = new DesignBookInstructor($conn, $_REQUEST);
				$designBookInstructor->create($createId);
			}
			
			if(isset($_REQUEST['r_receive_contribute_book']) && $_REQUEST['r_receive_contribute_book'] == '1'){
				$contribution = new Contribution($conn, $_REQUEST);
				$contribution->create($createId);
			}
		}
  
		$conn->commit();
	} catch (PDOException $e) {
		$conn->rollBack();
		$error = " Failed: " . $e->getMessage();
		echo $error;
		error_log(date('Y/m/d H:i:s').$error.PHP_EOL, 3, APP_LOG);
	}
	$conn = null;
}

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