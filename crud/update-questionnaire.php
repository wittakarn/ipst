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
			$createId = $participant->update();
			
			$scienceBook = new ScienceBook($conn, $_REQUEST);
			$scienceBook->update();
			
			$mathBook = new MathBook($conn, $_REQUEST);
			$mathBook->update();
			
			$technologyBook = new TechnologyBook($conn, $_REQUEST);
			$technologyBook->update();
			
			$designBook = new DesignBook($conn, $_REQUEST);
			$designBook->update();
			
			if($_REQUEST['type'] === 't'){
				$scienceBookInstructor = new ScienceBookInstructor($conn, $_REQUEST);
				$scienceBookInstructor->update();
				
				$mathBookInstructor = new MathBookInstructor($conn, $_REQUEST);
				$mathBookInstructor->update();
				
				$technologyBookInstructor = new TechnologyBookInstructor($conn, $_REQUEST);
				$technologyBookInstructor->update();
				
				$designBookInstructor = new DesignBookInstructor($conn, $_REQUEST);
				$designBookInstructor->update();
			}
			
			if(isset($_REQUEST['r_receive_contribute_book']) && $_REQUEST['r_receive_contribute_book'] == '1'){
				$contribution = new Contribution($conn, $_REQUEST);
				$contribution = $contribution->update();
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
<!DOCTYPE HTML>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="refresh" content="<?php echo REFRESH_DELAY.';url='.ROOT.'pages/manage-questionnaire.php?MODE=S' ?>">
        <title>Page Redirection</title>
    </head>
    <body>
		<H2>
			แก้ไขข้อมูลเรียบร้อยแล้ว หน้าจอจะทำการกลับไปหน้าค้นหาข้อมูลโดยอัตโนมัติ
		</H2>
		<H3>ท่านสามารถกลับหน้าจอด้วยตัวเองได้ ผ่าน  <a href="<?php echo ROOT.'pages/manage-questionnaire.php?MODE=S' ?>">link</a><H3>
    </body>
</html>