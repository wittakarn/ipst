<?php                     
session_start();

$userId = null;
$role = null;

if(isset($_COOKIE['token']) && !isset($_SESSION['user_id'])) {
	require_once DOCUMENT_ROOT.'/connection.php';
	require_once DOCUMENT_ROOT.'/class/class.User.php';
	require_once DOCUMENT_ROOT.'/class/class.AuthTokens.php';
	$conn = DataBaseConnection::createConnect();
	$escapeTokenString = $_COOKIE['token'];
	$userCookie = AuthTokens::getUserByToken($conn, $escapeTokenString);
	
	if($userCookie != null){
		$editUser = new User($conn, $userCookie);
		$editUser->updateLastLoginDatetimeByToken();
		
		$_SESSION['user_id'] = $userCookie['user_id'];
		$_SESSION['role'] = $userCookie['role'];
	}
	$conn = null;
}

if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
	$userId = $_SESSION['user_id'];
}
if(isset($_SESSION['role']) && !empty($_SESSION['role'])) {
	$role = $_SESSION['role'];
}

/*
if($userId == null){
	$requestUri = $_SERVER['REQUEST_URI'];
	$indexOfPhpPage = strpos($requestUri, '.php');
	if($indexOfPhpPage > 0)
		echo '<script type="text/javascript">location.replace("'.ROOT.'");</script>';
}
*/
?>