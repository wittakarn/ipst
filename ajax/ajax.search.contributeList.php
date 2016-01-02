<?php                     
	ini_set('display_errors', 1); 
	error_reporting(E_ALL);
	require_once '../config.php';
	require_once DOCUMENT_ROOT.'/connection.php';
	require_once DOCUMENT_ROOT.'/class/class.ContributionList.php';
	
	$response = null;
	try{
		$conn = DataBaseConnection::createConnect();	  
		$results = ContributionList::getAll($conn);
		$response = $results;
	}catch(Exception $e) {
		echo "Error: " . $e->getMessage();
	}
	
	echo json_encode($response);
?>