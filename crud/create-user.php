<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once("../config.php");
require_once DOCUMENT_ROOT.'/connection.php';
require_once DOCUMENT_ROOT.'/class/class.User.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	$conn = DataBaseConnection::createConnect();
	
	try{
		$conn->beginTransaction();
  
		$insFileupload = null;
  
		if(isset($_REQUEST['user_id'])){
			$user = new User($conn, $_REQUEST);
			$user->create();
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
        <meta http-equiv="refresh" content="<?php echo REFRESH_DELAY.';url='.ROOT.'pages/register.php?MODE=A' ?>">
        <title>Page Redirection</title>
    </head>
    <body>
		<H2>
			บันทึกข้อมูลเรียบร้อยแล้ว หน้าจอจะทำการกลับไปหน้าก่อนหน้าโดยอัตโนมัติ
		</H2>
		<H3>ท่านสามารถกลับหน้าจอด้วยตัวเองได้ ผ่าน  <a href="<?php echo ROOT.'pages/register.php?MODE=A' ?>">link</a><H3>
    </body>
</html>