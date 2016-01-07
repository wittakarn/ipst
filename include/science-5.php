<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once("../config.php");
?>

<h4>ชั้นประถมศีกษาปีที่ 5</h4>
<h4><u>วิทยาศาสตร์</u></h4>
<?php 
	$bookCount = 2;
	$bookNames = array('หนังสือเรียน', 'แบบบันทึกกิจกรรม');
	for($i=1;$i<=$bookCount;$i++)
	{
		$modelClass = 'm-s-5-'.$i;
		$imagePath = 'image/s/5/'.$i.'.jpg';
		$bookName = $bookNames[($i - 1)];  /* --- ใช้ ($i-1) เพราะว่า array เริ่มต้นด้วย index ที่ 0 --- */
		$nameOfComponent = array('r_s_5_'.$i.'_1', 'r_s_5_'.$i.'_2', 't_s_5_'.$i.'_3', 'f_s_5_'.$i.'_4', 'h_s_5_'.$i.'_4');
		$collapseSectionId = 'ms5'.$i.'SelectedCollapse';
		$fileUploadId = 'fs5'.$i.'4';
		
		include DOCUMENT_ROOT.'include/book-satisfaction-template.php';
		echo '<hr/>';
	}
	
	if(isset($_REQUEST['type']) && $_REQUEST['type'] === 't'){
		$bookCount = 1;
		$bookNames = array('คู่มือครู รายวิชาพื้นฐาน');
		for($i=1;$i<=$bookCount;$i++)
		{
			$modelClass = 'm-s-ins-5-'.$i;
			$imagePath = 'image/s/instructor/5/'.$i.'.jpg';
			$bookName = $bookNames[($i - 1)];  /* --- ใช้ ($i-1) เพราะว่า array เริ่มต้นด้วย index ที่ 0 --- */
			$nameOfComponent = array('r_s_ins_5_'.$i.'_1', 'r_s_ins_5_'.$i.'_2', 't_s_ins_5_'.$i.'_3', 'f_s_ins_5_'.$i.'_4', 'h_s_ins_5_'.$i.'_4');
			$collapseSectionId = 'msIns5'.$i.'SelectedCollapse';
			$fileUploadId = 'fsIns5'.$i.'4';
			
			include DOCUMENT_ROOT.'include/book-satisfaction-template.php';
			echo '<hr/>';
		}
	}
?>