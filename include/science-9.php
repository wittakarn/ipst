<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once("../config.php");
?>

<h4>ชั้นมัธยมศึกษาปีที่ 3</h4>
<h4><u>วิทยาศาสตร์</u></h4>
<?php 
	$bookCount = 2;
	$bookNames = array('หนังสือเรียน เล่ม 1', 'หนังสือเรียน เล่ม 2');
	for($i=1;$i<=$bookCount;$i++)
	{
		$modelClass = 'm-s-9-'.$i;
		$imagePath = 'image/s/9/'.$i.'.jpg';
		$bookName = $bookNames[($i - 1)];  /* --- ใช้ ($i-1) เพราะว่า array เริ่มต้นด้วย index ที่ 0 --- */
		$nameOfComponent = array('r_s_9_'.$i.'_1', 'r_s_9_'.$i.'_2', 't_s_9_'.$i.'_3', 'f_s_9_'.$i.'_4', 'h_s_9_'.$i.'_4');
		$collapseSectionId = 'ms9'.$i.'SelectedCollapse';
		$fileUploadId = 'fs9'.$i.'4';
		
		include DOCUMENT_ROOT.'include/book-satisfaction-template.php';
		echo '<hr/>';
	}
	
	if(isset($_REQUEST['type']) && $_REQUEST['type'] === 't'){
		$bookCount = 2;
		$bookNames = array('คู่มือครู รายวิชาพื้นฐาน เล่ม 1', 'คู่มือครู รายวิชาพื้นฐาน เล่ม 2');
		for($i=1;$i<=$bookCount;$i++)
		{
			$modelClass = 'm-s-ins-9-'.$i;
			$imagePath = 'image/s/instructor/9/'.$i.'.jpg';
			$bookName = $bookNames[($i - 1)];  /* --- ใช้ ($i-1) เพราะว่า array เริ่มต้นด้วย index ที่ 0 --- */
			$nameOfComponent = array('r_s_ins_9_'.$i.'_1', 'r_s_ins_9_'.$i.'_2', 't_s_ins_9_'.$i.'_3', 'f_s_ins_9_'.$i.'_4', 'h_s_ins_9_'.$i.'_4');
			$collapseSectionId = 'msIns9'.$i.'SelectedCollapse';
			$fileUploadId = 'fsIns9'.$i.'4';
			
			include DOCUMENT_ROOT.'include/book-satisfaction-template.php';
			echo '<hr/>';
		}
	}
?>