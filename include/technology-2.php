<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once("../config.php");
?>

<h4>ชั้นประถมศีกษาปีที่ 2</h4>
<h4><u>เทคโนโลยีสารสนเทศและการสื่อสาร</u></h4>
<?php 
	$bookCount = 2;
	$bookNames = array('หนังสือเรียน', 'แบบฝึกทักษะ');
	for($i=1;$i<=$bookCount;$i++)
	{
		$modelClass = 'm-t-2-'.$i;
		$imagePath = 'image/t/2/'.$i.'.jpg';
		$bookName = $bookNames[($i - 1)];  /* --- ใช้ ($i-1) เพราะว่า array เริ่มต้นด้วย index ที่ 0 --- */
		$nameOfComponent = array('r_t_2_'.$i.'_1', 'r_t_2_'.$i.'_2', 't_t_2_'.$i.'_3', 'f_t_2_'.$i.'_4', 'h_t_2_'.$i.'_4');
		$collapseSectionId = 'mt2'.$i.'SelectedCollapse';
		$fileUploadId = 'ft2'.$i.'4';
		
		include DOCUMENT_ROOT.'include/book-satisfaction-template.php';
		echo '<hr/>';
	}
	
	if(isset($_REQUEST['type']) && $_REQUEST['type'] === 't'){
		$bookCount = 1;
		$bookNames = array('คู่มือครู รายวิชาพื้นฐาน');
		for($i=1;$i<=$bookCount;$i++)
		{
			$modelClass = 'm-t-ins-2-'.$i;
			$imagePath = 'image/t/instructor/2/'.$i.'.jpg';
			$bookName = $bookNames[($i - 1)];  /* --- ใช้ ($i-1) เพราะว่า array เริ่มต้นด้วย index ที่ 0 --- */
			$nameOfComponent = array('r_t_ins_2_'.$i.'_1', 'r_t_ins_2_'.$i.'_2', 't_t_ins_2_'.$i.'_3', 'f_t_ins_2_'.$i.'_4', 'h_t_ins_2_'.$i.'_4');
			$collapseSectionId = 'mtIns2'.$i.'SelectedCollapse';
			$fileUploadId = 'ftIns2'.$i.'4';
			
			include DOCUMENT_ROOT.'include/book-satisfaction-template.php';
			echo '<hr/>';
		}
	}
?>