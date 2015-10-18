<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once("../config.php");
require_once DOCUMENT_ROOT.'/connection.php';
require_once DOCUMENT_ROOT.'/class/class.Customer.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	$conn = DataBaseConnection::createConnect();
	
	try{
		$conn->beginTransaction();
		
		if(isset($_REQUEST['customer_id'])){
			$customer = new Customer($conn, $_REQUEST);
			$customer->delete();
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
        <meta http-equiv="refresh" content="<?php echo '3;url='.ROOT.'pages/customer.php?MODE=S' ?>">
        <title>Page Redirection</title>
    </head>
    <body>
		<H2>
			ลบข้อมูลเรียบร้อยแล้ว หน้าจอจะทำการกลับไปหน้าค้นหาข้อมูลโดยอัตโนมัติ
		</H2>
		<H3>ท่านสามารถกลับหน้าจอด้วยตัวเองได้ ผ่าน  <a href="<?php echo ROOT.'pages/customer.php?MODE=S' ?>">link</a><H3>
    </body>
</html>