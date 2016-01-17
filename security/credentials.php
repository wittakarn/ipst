<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
session_start();
require_once("../config.php");
require_once DOCUMENT_ROOT.'/connection.php';
require_once DOCUMENT_ROOT.'/class/class.User.php';
require_once DOCUMENT_ROOT.'/class/class.AuthTokens.php';

require_once DOCUMENT_ROOT.'/lib/Random/random.php';
require_once DOCUMENT_ROOT.'/lib/ReCaptcha/RequestParameters.php';
require_once DOCUMENT_ROOT.'/lib/ReCaptcha/Response.php';
require_once DOCUMENT_ROOT.'/lib/ReCaptcha/ReCaptcha.php';
require_once DOCUMENT_ROOT.'/lib/ReCaptcha/RequestMethod.php';
require_once DOCUMENT_ROOT.'/lib/ReCaptcha/RequestMethod/Post.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$loginMessage = "รหัสผู้ใช้งานหรือรหัสผ่านผิดพลาด";
	$conn = DataBaseConnection::createConnect();
	
	try{
		$conn->beginTransaction();
		$isMatch = false;
  
		if(isset($_POST['user_id']) && isset($_POST['password'])){
			
			if(VERIFY_CAPTCHA){
				
				$loginMessage = "ยืนยัน reCaptcha ผิดพลาด";
				
				if(isset($_POST['g-recaptcha-response'])){
					$secret = SECRET_KEY;
					$recaptcha = new \ReCaptcha\ReCaptcha($secret);
					$resp = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
					
					if($resp->isSuccess()){
						$loginUserId = $_REQUEST['user_id'];
						$loginMessage = verify($conn, $loginUserId);
					}
				}
			}else{
				$loginUserId = $_REQUEST['user_id'];
				$loginMessage = verify($conn, $loginUserId);
			}
		}

		$conn->commit();
	} catch (PDOException $e) {
		$conn->rollBack();
		echo "Failed: " . $e->getMessage();
	}
	$conn = null;
}

function verify($conn, $loginUserId) {
	$user = User::get($conn, $loginUserId);
	
	$loginMessage = "รหัสผู้ใช้งานหรือรหัสผ่านผิดพลาด";
	
	if($user != null){
		
		$loginMessage = "รหัสผู้ใช้งานถูกระงับการใช้งาน กรุณาติดต่อผู้ดูแลระบบ";
		
		if($user['password_inc_count'] < 5){
			$editUser = null;
			if($user['password'] === $_REQUEST['password']){
				$isMatch = true;
				$_SESSION['user_id'] = $loginUserId;
				$_SESSION['role'] = $user['role'];
				$editUser = new User($conn, $user);
				$editUser->updateLastLoginDatetime();
				
				$loginMessage = "ลงชื่อเข้าใช้งานเรียบร้อย";
				
				if (isset($_POST['rememberme']) && $_POST['rememberme'] === 'R') {
					
					$tokenGenerated = bin2hex(random_bytes(32));
					
					$createAuthTokens = array(
												"user_id" => $loginUserId,
												"token" => $tokenGenerated
											);
					
					$authTokens = new AuthTokens($conn, $createAuthTokens);
					$authTokens->create();
					/* Set cookie to last X day */
					setcookie('token', $tokenGenerated, time() + COOKIES_ALIVE, MAIN_APP_ROOT);
				} else {
					/* Cookie expires when browser closes */
					setcookie('token', '', 0, MAIN_APP_ROOT);
				}
			}else{
				$user['password_inc_count'] = $user['password_inc_count'] + 1;
				$editUser = new User($conn, $user);
				$editUser->updatePasswordCount();
				
				$loginMessage = "รหัสผู้ใช้งานหรือรหัสผ่านผิดพลาด";
			}
		}
	}
	
	return $loginMessage;
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
		<H2>
			<?php echo $loginMessage;?>
		</H2>
		<H3>ท่านสามารถกลับหน้าจอด้วยตัวเองได้ ผ่าน  <a href="<?php echo ROOT; ?>">link</a><H3>
    </body>
</html>