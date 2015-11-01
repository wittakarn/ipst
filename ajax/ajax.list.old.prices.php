<?php                     
	ini_set('display_errors', 1); 
	error_reporting(E_ALL);
	require_once '../config.php';
	require_once DOCUMENT_ROOT.'/connection.php';
	require_once DOCUMENT_ROOT.'/class/class.QuotMast.php';
	
	$response = null;
	try{
		$conn = DataBaseConnection::createConnect();	  
		$results = QuotMast::getOldPrices($conn, $_REQUEST['customer_id'], $_REQUEST['product_id']);
		$response = $results;
	}catch(Exception $e) {
		echo "Error: " . $e->getMessage();
	}
	
	echo json_encode($response);
?>