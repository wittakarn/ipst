<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once("../config.php");
require_once DOCUMENT_ROOT.'/connection.php';
require_once DOCUMENT_ROOT.'/class/class.Customer.php';
require_once DOCUMENT_ROOT.'/class/class.FileStorage.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	$conn = DataBaseConnection::createConnect();
	
	try{
		$conn->beginTransaction();
  
		$insFileupload = null;
  
		if(isset($_REQUEST['customer_name'])){
			$customer = new Customer($conn, $_REQUEST);
			$customerId = $customer->create();
			$refTable = 'customer';
			
			if(isset($_FILES['file_blob'])){
				$fileStorage = new FileStorage($conn, null);
				$fp = null;
				$path_parts = null;
				$fileType = '';
				$fileName = '';
				if($_FILES['file_blob']['size'][0] > 0){ 
					$path_parts = pathinfo($_FILES['file_blob']['name'][0]);
					$fileType = $path_parts['extension'];
					
					$tmpName = $_FILES['file_blob']['tmp_name'][0];
					$fp = fopen($tmpName, 'rb'); // read binary
					
					$fileStorage->create($customerId, $refTable, 1, $fp, $fileType);
				}
				
				if($_FILES['file_blob']['size'][1] > 0){ 
					$path_parts = pathinfo($_FILES['file_blob']['name'][1]);
					$fileType = $path_parts['extension'];
				
					$tmpName = $_FILES['file_blob']['tmp_name'][1];
					$fp = fopen($tmpName, 'rb');
					
					$fileStorage->create($customerId, $refTable, 2, $fp, $fileType);
				} 
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
        <meta http-equiv="refresh" content="<?php echo REFRESH_DELAY.';url='.ROOT.'pages/customer.php?MODE=A' ?>">
        <title>Page Redirection</title>
    </head>
    <body>
		<H2>
			บันทึกข้อมูลเรียบร้อยแล้ว หน้าจอจะทำการกลับไปหน้าก่อนหน้าโดยอัตโนมัติ
		</H2>
		<H3>ท่านสามารถกลับหน้าจอด้วยตัวเองได้ ผ่าน  <a href="<?php echo ROOT.'pages/customer.php?MODE=A' ?>">link</a><H3>
    </body>
</html>