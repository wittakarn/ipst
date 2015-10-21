<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
session_start();
require_once("../config.php");
require_once DOCUMENT_ROOT.'/connection.php';
require_once DOCUMENT_ROOT.'/class/class.User.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	
	$conn = DataBaseConnection::createConnect();
	
	try{
		$conn->beginTransaction();
		$isMatch = false;
  
		if(isset($_REQUEST['user_id']) && isset($_REQUEST['password'])){
			$loginUserId = $_REQUEST['user_id'];
			$user = User::get($conn, $loginUserId);
			
			if($user != null){
				$editUser = null;
				if($user['password'] === $_REQUEST['password']){
					$isMatch = true;
					$_SESSION['user_id'] = $loginUserId;
					$_SESSION['role'] = $user['role'];
					$editUser = new User($conn, $user);
					$editUser->updateLastLoginDatetime();
				}else{
					$user['password_inc_count'] = $user['password_inc_count'] + 1;
					$editUser = new User($conn, $user);
					$editUser->updatePasswordCount();
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
        <meta http-equiv="refresh" content="<?php echo REFRESH_DELAY.';url='.ROOT; ?>">
        <title>Page Redirection</title>
    </head>
    <body>
		<H3>ท่านสามารถกลับหน้าจอด้วยตัวเองได้ ผ่าน  <a href="<?php echo ROOT; ?>">link</a><H3>
    </body>
</html>