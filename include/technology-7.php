<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once("../config.php");
?>

<h4>ชั้นมัธยมศึกษาปีที่ 1</h4>
<h4><u>เทคโนโลยีสารสนเทศและการสื่อสาร</u></h4>
<?php 
	$bookCount = 1;
	$bookNames = array('หนังสือเรียน รายวิชาพื้นฐาน');
	for($i=1;$i<=$bookCount;$i++)
	{
		$modelClass = 'm-t-7-'.$i;
		$imagePath = 'image/t/7/'.$i.'.jpg';
		$bookName = $bookNames[($i - 1)];  /* --- ใช้ ($i-1) เพราะว่า array เริ่มต้นด้วย index ที่ 0 --- */
		$nameOfComponent = array('r_t_7_'.$i.'_1', 'r_t_7_'.$i.'_2', 't_t_7_'.$i.'_3', 'f_t_7_'.$i.'_4', 'h_t_7_'.$i.'_4');
		$collapseSectionId = 'mt7'.$i.'SelectedCollapse';
		$fileUploadId = 'ft7'.$i.'4';
		
		include DOCUMENT_ROOT.'include/book-satisfaction-template.php';
		echo '<hr/>';
	}
	
	if(isset($_REQUEST['type']) && $_REQUEST['type'] === 't'){
		$bookCount = 1;
		$bookNames = array('คู่มือครู รายวิชาพื้นฐาน');
		for($i=1;$i<=$bookCount;$i++)
		{
			$modelClass = 'm-t-ins-7-'.$i;
			$imagePath = 'image/t/instructor/7/'.$i.'.jpg';
			$bookName = $bookNames[($i - 1)];  /* --- ใช้ ($i-1) เพราะว่า array เริ่มต้นด้วย index ที่ 0 --- */
			$nameOfComponent = array('r_t_ins_7_'.$i.'_1', 'r_t_ins_7_'.$i.'_2', 't_t_ins_7_'.$i.'_3', 'f_t_ins_7_'.$i.'_4', 'h_t_ins_7_'.$i.'_4');
			$collapseSectionId = 'mtIns7'.$i.'SelectedCollapse';
			$fileUploadId = 'ftIns7'.$i.'4';
			
			include DOCUMENT_ROOT.'include/book-satisfaction-template.php';
			echo '<hr/>';
		}
	}
?>