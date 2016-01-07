<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once("../config.php");
?>

<h4>ชั้นมัธยมศึกษาปีที่ 3</h4>
<h4><u>การออกแบบและเทคโนโลยี</u></h4>
<?php 
	$bookCount = 1;
	$bookNames = array('หนังสือเรียน');
	for($i=1;$i<=$bookCount;$i++)
	{
		$modelClass = 'm-d-9-'.$i;
		$imagePath = 'image/d/9/'.$i.'.jpg';
		$bookName = $bookNames[($i - 1)];  /* --- ใช้ ($i-1) เพราะว่า array เริ่มต้นด้วย index ที่ 0 --- */
		$nameOfComponent = array('r_d_9_'.$i.'_1', 'r_d_9_'.$i.'_2', 't_d_9_'.$i.'_3', 'f_d_9_'.$i.'_4', 'h_d_9_'.$i.'_4');
		$collapseSectionId = 'md9'.$i.'SelectedCollapse';
		$fileUploadId = 'fd9'.$i.'4';
		
		include DOCUMENT_ROOT.'include/book-satisfaction-template.php';
		echo '<hr/>';
	}
	
	if(isset($_REQUEST['type']) && $_REQUEST['type'] === 't'){
		$bookCount = 1;
		$bookNames = array('คู่มือครู รายวิชาพื้นฐาน');
		for($i=1;$i<=$bookCount;$i++)
		{
			$modelClass = 'm-d-ins-9-'.$i;
			$imagePath = 'image/d/instructor/9/'.$i.'.jpg';
			$bookName = $bookNames[($i - 1)];  /* --- ใช้ ($i-1) เพราะว่า array เริ่มต้นด้วย index ที่ 0 --- */
			$nameOfComponent = array('r_d_ins_9_'.$i.'_1', 'r_d_ins_9_'.$i.'_2', 't_d_ins_9_'.$i.'_3', 'f_d_ins_9_'.$i.'_4', 'h_d_ins_9_'.$i.'_4');
			$collapseSectionId = 'mdIns9'.$i.'SelectedCollapse';
			$fileUploadId = 'fdIns9'.$i.'4';
			
			include DOCUMENT_ROOT.'include/book-satisfaction-template.php';
			echo '<hr/>';
		}
	}
?>