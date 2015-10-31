<?php
session_start();
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once("../config.php");
require_once DOCUMENT_ROOT.'/connection.php';
require_once DOCUMENT_ROOT.'/class/class.QuotNo.php';
require_once DOCUMENT_ROOT.'/class/class.QuotMast.php';
require_once DOCUMENT_ROOT.'/class/class.QuotDetail.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user_id'])){
	
	$conn = DataBaseConnection::createConnect();
	
	try{
		$conn->beginTransaction();
  
		$quotNo = QuotNo::getMaxSequence($conn);
		$year = $quotNo['year'];
		$sequence = $quotNo['sequence'];
  
		$addition = [];
		$addition['quot_no'] = $year.'/'.$sequence;
		$addition['year'] = $year;
		$addition['sequence'] = $sequence;
		$addition['user_id'] = $_SESSION['user_id'];
		
		print_r($addition);
		print_r($_REQUEST);
		if(isset($_REQUEST['customer_id']) && isset($_REQUEST['sequence']) && count($_REQUEST['sequence']) > 0){
			$quotMast = new QuotMast($conn, $_REQUEST);
			$quotMast->create($addition);
			
			$quotDetail = new QuotDetail($conn, $_REQUEST);
			$quotDetail->create($addition);
		}
		
		QuotNo::updateSequence($conn);
		
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
        <meta http-equiv="refresh" content="<?php echo REFRESH_DELAY.';url='.ROOT.'pages/quotation.php?MODE=S&customer_id='.$_REQUEST['customer_id'] ?>">
        <title>Page Redirection</title>
    </head>
    <body>
		<H2>
			บันทึกข้อมูลเรียบร้อยแล้ว หน้าจอจะทำการกลับไปหน้าก่อนหน้าโดยอัตโนมัติ
		</H2>
		<H3>ท่านสามารถกลับหน้าจอด้วยตัวเองได้ ผ่าน  <a href="<?php echo ROOT.'pages/quotation.php?MODE=S&customer_id='.$_REQUEST['customer_id'] ?>">link</a><H3>
    </body>
</html>