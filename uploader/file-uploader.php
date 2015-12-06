<?php                     
	ini_set('display_errors', 1); 
	error_reporting(E_ALL);
	require_once("../config.php");
	$success = false;
	$isOverlimit = false;
	$maxsize = 1048576;
	if(isset($_REQUEST['name'])){
		$file = $_FILES[$_REQUEST['name']];
		if(($_FILES[$_REQUEST['name']]['size'] >= $maxsize)) {
			$isOverlimit = true;
		}
		$fileType = "";
		if(!$isOverlimit){
			$uploaddir = DOCUMENT_ROOT.'/fileupload/';
			$fileName = basename($file['name']);
			$partNames = explode('.', $fileName);
			if(count($partNames) > 1){
				$fileType = $partNames[count($partNames) - 1];
			}
			$hostname = php_uname('n').'.';
			$uid = uniqid($hostname, true);
			$fileName = $uid . '.' . $fileType;
			echo $fileName; 
			$uploadfile = $uploaddir . $fileName;
			
			if(move_uploaded_file($file['tmp_name'], $uploadfile)){
				$success = true;
			} 
		}
	}
	
	echo "<script src='".ROOT."lib/jquery/jquery-1.11.3.min.js' type='text/javascript'></script>"
?>

<script type="text/javascript">
	$( document ).ready(function() {
		<?php
			$fileSizeErrorMessage = 'ขนาดไฟล์ใหญ่เกิดกว่าที่กำหนด กรุณาอัพโหลดไฟล์ขนาดไม่เกิน 1MB.';
			echo "var link = $('#link_".$_REQUEST['id']."', window.parent.document);";
			echo "var hidden = $('#hidden_".$_REQUEST['id']."', window.parent.document);";
			echo "var remover = $('#remove_".$_REQUEST['id']."', window.parent.document);";
			echo "var errorMessage = $('#error_".$_REQUEST['id']."', window.parent.document);";
			if(!$isOverlimit && $success){
				echo "link.attr('href', '".ROOT."/downloader/file-viewer.php?file=".$fileName."');";
				echo "link.attr('style', 'display:inline;');";
				echo "hidden.val('".$fileName."');";
				echo "remover.attr('style', 'display:inline;');";
				echo "errorMessage.html('');";
			}else{
				echo "link.attr('href', '');";
				echo "link.attr('style', 'display:none;');";
				echo "hidden.val('');";
				echo "remover.attr('style', 'display:none;');";
				echo "errorMessage.html('".$fileSizeErrorMessage."');";
			}
		?>
		window.parent.$.unblockUI();
	});
</script>