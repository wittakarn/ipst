<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once("../config.php");
require_once DOCUMENT_ROOT.'/connection.php';
require_once DOCUMENT_ROOT.'/class/class.Participant.php';
require_once DOCUMENT_ROOT.'/class/class.Contribution.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	$conn = DataBaseConnection::createConnect();
	
	try{
		$conn->beginTransaction();
		
		if(isset($_REQUEST['type'])){
			$participant = new Participant($conn, $_REQUEST);
			$createId = $participant->update();
			
			if(isset($_REQUEST['r_receive_contribute_book']) && $_REQUEST['r_receive_contribute_book'] == '1'){
				$contribution = new Contribution($conn, $_REQUEST);
				$contribution = $contribution->update();
			}
		}
  
		$conn->commit();
	} catch (PDOException $e) {
		$conn->rollBack();
		echo "Failed: " . $e->getMessage();
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