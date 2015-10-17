<?php                     
	ini_set('display_errors', 1); 
	error_reporting(E_ALL);
	require_once("../config.php");
	$file = DOCUMENT_ROOT . "/fileupload/" . $_GET["file"];
	if (file_exists($file)) {
		
		$fileName = basename($_GET["file"]);
		$dotPosition = strrpos($fileName, '.', 0);
		$fileType = "";
		if(!empty($dotPosition)){
			$fileNameLength = strlen($fileName);
			$fileType = substr($fileName, $dotPosition + 1, $fileNameLength);
		}
		
		if($fileType == "pdf"){
			header("Content-Type: application/pdf");
			header('Content-Disposition: inline; filename=' . urlencode(basename($file)));
		}else if($fileType == "jpg" || $fileType == "png" || $fileType == "tif"){
			header('Content-Type: image/'.$fileType);
			header('Content-Disposition: inline; filename=' . urlencode(basename($file)));
		}else{
			header('Content-Type: application/octet-stream');
			header("Content-Type: application/force-download");
			header('Content-Disposition: attachment; filename=' . urlencode(basename($file)));
		}
		
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: no-cache, no-store, must-revalidate');
		header('no-cache');
		header('Content-Length: ' . filesize($file));
		flush();
		readfile($file);
		exit;
	}
?>