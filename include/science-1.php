<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once("../config.php");
?>

<h4>ชั้นประถมศีกษาปีที่ 1</h4>
<h4><u>วิทยาศาสตร์</u></h4>
<?php 
	$bookCount = 4;
	$bookNames = array('หนังสือเรียน', 'หนังสือเรียน ฉบับปรับปรุง', 'แบบบันทึกกิจกรรม', 'แบบบันทึกกิจกรรม ฉบับปรับปรุง');
	for($i=1;$i<=$bookCount;$i++)
	{
		$modelClass = 'm-s-1-'.$i;
		$imagePath = 'image/s/1/'.$i.'.jpg';
		$bookName = $bookNames[($i - 1)];  /* --- ใช้ ($i-1) เพราะว่า array เริ่มต้นด้วย index ที่ 0 --- */
		$nameOfComponent = array('r_s_1_'.$i.'_1', 'r_s_1_'.$i.'_2', 't_s_1_'.$i.'_3', 'f_s_1_'.$i.'_4', 'h_s_1_'.$i.'_4');
		$collapseSectionId = 'ms1'.$i.'SelectedCollapse';
		$fileUploadId = 'fs1'.$i.'4';
		
		include DOCUMENT_ROOT.'include/book-satisfaction-template.php';
		echo '<hr/>';
	}
	
	if(isset($_REQUEST['type']) && $_REQUEST['type'] === 't'){
		$bookCount = 1;
		$bookNames = array('คู่มือครู รายวิชาพื้นฐาน');
		for($i=1;$i<=$bookCount;$i++)
		{
			$modelClass = 'm-s-ins-1-'.$i;
			$imagePath = 'image/s/instructor/1/'.$i.'.jpg';
			$bookName = $bookNames[($i - 1)];  /* --- ใช้ ($i-1) เพราะว่า array เริ่มต้นด้วย index ที่ 0 --- */
			$nameOfComponent = array('r_s_ins_1_'.$i.'_1', 'r_s_ins_1_'.$i.'_2', 't_s_ins_1_'.$i.'_3', 'f_s_ins_1_'.$i.'_4', 'h_s_ins_1_'.$i.'_4');
			$collapseSectionId = 'msIns1'.$i.'SelectedCollapse';
			$fileUploadId = 'fsIns1'.$i.'4';
			
			include DOCUMENT_ROOT.'include/book-satisfaction-template.php';
			echo '<hr/>';
		}
	}
?>