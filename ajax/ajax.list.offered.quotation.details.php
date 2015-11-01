<?php                     
	ini_set('display_errors', 1); 
	error_reporting(E_ALL);
	require_once '../config.php';
	require_once DOCUMENT_ROOT.'/connection.php';
	require_once DOCUMENT_ROOT.'/class/class.QuotDetail.php';
	
	$response = null;
	try{
		$conn = DataBaseConnection::createConnect();	  
		$results = QuotDetail::getQuotationDetailByQuotNo($conn, $_REQUEST['quot_no']);
		$response = $results;
	}catch(Exception $e) {
		echo "Error: " . $e->getMessage();
	}
	
	echo json_encode($response);
?>