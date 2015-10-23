<?php 
require_once "../config.php";

session_start();

if(isset($_COOKIE['token'])) {
	require_once DOCUMENT_ROOT.'/connection.php';
	require_once DOCUMENT_ROOT.'/class/class.AuthTokens.php';
	$conn = DataBaseConnection::createConnect();

	$deleteAuthTokens = array("token" => $_COOKIE['token']);
	$authTokens = new AuthTokens($conn, $deleteAuthTokens);
	$authTokens->delete();
	
	$conn = null;
}

session_destroy();

setcookie('token', '', time() - COOKIES_ALIVE, MAIN_APP_ROOT);

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