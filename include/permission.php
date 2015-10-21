<?php                     
session_start();

$userId = null;
$role = null;
if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])) {
	$userId = $_SESSION['user_id'];
}
if(isset($_SESSION['role']) && !empty($_SESSION['role'])) {
	$role = $_SESSION['role'];
}
?>