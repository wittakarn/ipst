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
		
		if(isset($_REQUEST['updateId'])){
			$participant = new Participant($conn, $_REQUEST);
			$createId = $participant->updateStatus();
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
			แก้ไขสถานะการประมวลผลเรียบร้อยแล้ว หน้าจอจะทำการกลับไปหน้าค้นหาข้อมูลโดยอัตโนมัติ
		</H2>
		<H3>ท่านสามารถกลับหน้าจอด้วยตัวเองได้ ผ่าน  <a href="<?php echo ROOT.'pages/manage-questionnaire.php?MODE=S' ?>">link</a><H3>
    </body>
</html>