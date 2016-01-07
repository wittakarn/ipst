<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once("../config.php");
?>

<h4><u>เทคโนโลยีสารสนเทศและการสื่อสาร รายวิชาเพิ่มเติม</u></h4>
<?php 
	$bookCount = 3;
	$bookNames = array('หนังสือเรียน รายวิชาเพิ่มเติม กราฟิกและเทคโนโลยีสื่อประสม', 'หนังสือเรียน รายวิชาเพิ่มเติม การจัดการข้อมูลเบื้องต้น', 'หนังสือเรียน รายวิชาเพิ่มเติม การโปรแกรมเบื้องต้น');
	for($i=1;$i<=$bookCount;$i++)
	{
		$modelClass = 'm-t-789-additional-'.$i;
		$imagePath = 'image/t/789-additional/'.$i.'.jpg';
		$bookName = $bookNames[($i - 1)];  /* --- ใช้ ($i-1) เพราะว่า array เริ่มต้นด้วย index ที่ 0 --- */
		$nameOfComponent = array('r_t_789_additional_'.$i.'_1', 'r_t_789_additional_'.$i.'_2', 't_t_789_additional_'.$i.'_3', 'f_t_789_additional_'.$i.'_4', 'h_t_789_additional_'.$i.'_4');
		$collapseSectionId = 'mt789Additional'.$i.'SelectedCollapse';
		$fileUploadId = 'ft789Additional'.$i.'4';
		
		include DOCUMENT_ROOT.'include/book-satisfaction-template.php';
		echo '<hr/>';
	}
	
	if(isset($_REQUEST['type']) && $_REQUEST['type'] === 't'){
		$bookCount = 3;
		$bookNames = array('คู่มือครู รายวิชาเพิ่มเติม กราฟิกและเทคโนโลยีสื่อประสม', 'คู่มือครู รายวิชาเพิ่มเติม การจัดการข้อมูลเบื้องต้น', 'คู่มือครู รายวิชาเพิ่มเติม การโปรแกรมเบื้องต้น');
		for($i=1;$i<=$bookCount;$i++)
		{
			$modelClass = 'm-t-ins-789-'.$i;
			$imagePath = 'image/t/instructor/789/'.$i.'.jpg';
			$bookName = $bookNames[($i - 1)];  /* --- ใช้ ($i-1) เพราะว่า array เริ่มต้นด้วย index ที่ 0 --- */
			$nameOfComponent = array('r_t_ins_789_'.$i.'_1', 'r_t_ins_789_'.$i.'_2', 't_t_ins_789_'.$i.'_3', 'f_t_ins_789_'.$i.'_4', 'h_t_ins_789_'.$i.'_4');
			$collapseSectionId = 'mtIns789'.$i.'SelectedCollapse';
			$fileUploadId = 'ftIns789'.$i.'4';
			
			include DOCUMENT_ROOT.'include/book-satisfaction-template.php';
			echo '<hr/>';
		}
	}
?>