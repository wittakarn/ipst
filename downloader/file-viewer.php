<?php                     
	ini_set('display_errors', 1); 
	error_reporting(E_ALL);
	require_once('../config.php');
	require_once DOCUMENT_ROOT.'/connection.php';
	require_once DOCUMENT_ROOT.'/class/class.FileStorage.php';
	
	//print_r($_REQUEST);
	
	$conn = DataBaseConnection::createConnect();
	$file = FileStorage::get($conn, $_REQUEST['customer_id'], $_REQUEST['ref_table'], $_REQUEST['sequence']);
	//print_r($file);
	if (is_array($file)) {
		$fileType = strtolower($file['file_type']);
		$fileName = 'download.'.$fileType;
		
		if($fileType == "pdf"){
			header("Content-Type: application/pdf");
			header('Content-Disposition: inline; filename=' . $fileName);
		}else if($fileType == "jpg" || $fileType == "png" || $fileType == "tif"){
			header('Content-Type: image/'.$fileType);
			header('Content-Disposition: inline; filename=' . $fileName);
		}else{
			header('Content-Type: application/octet-stream');
			header("Content-Type: application/force-download");
			header('Content-Disposition: attachment; filename=' . $fileName);
		}
		
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: no-cache, no-store, must-revalidate');
		header('no-cache');
		//header('Content-Length: ' . filesize($file));
		flush();
		echo $file['file_blob'];
		exit;
	}
?>