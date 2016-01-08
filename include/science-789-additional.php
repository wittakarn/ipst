<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once("../config.php");
?>

<h4><u>วิทยาศาสตร์ รายวิชาเพิ่มเติม</u></h4>
<?php 
	$bookCount = 5;
	$bookNames = array('หนังสือเรียน เชื้อเพลิงเพื่อการคมนาคม', 'หนังสือเรียน ของเล่นเชิงวิทยาศาสตร์', 'หนังสือเรียน วิทยาศาสตร์กับความงาม', 'หนังสือเรียน สนุกกับโครงงานวิทยาศาสตร์', 'หนังสือเรียน พลังงานทดแทนกับการใช้ประโยชน์');
	for($i=1;$i<=$bookCount;$i++)
	{
		$modelClass = 'm-s-789-additional-'.$i;
		$imagePath = 'image/s/789-additional/'.$i.'.jpg';
		$bookName = $bookNames[($i - 1)];  /* --- ใช้ ($i-1) เพราะว่า array เริ่มต้นด้วย index ที่ 0 --- */
		$nameOfComponent = array('r_s_789_additional_'.$i.'_1', 'r_s_789_additional_'.$i.'_2', 't_s_789_additional_'.$i.'_3', 'f_s_789_additional_'.$i.'_4', 'h_s_789_additional_'.$i.'_4');
		$collapseSectionId = 'ms789Additional'.$i.'SelectedCollapse';
		$fileUploadId = 'fs789Additional'.$i.'4';
		
		include DOCUMENT_ROOT.'include/book-satisfaction-template.php';
		echo '<hr/>';
	}
	
	if(isset($_REQUEST['type']) && $_REQUEST['type'] === 't'){
		$bookCount = 5;
		$bookNames = array('คู่มือครู เชื้อเพลิงเพื่อการคมนาคม', 'คู่มือครู ของเล่นเชิงวิทยาศาสตร์', 'คู่มือครู วิทยาศาสตร์กับความงาม', 'คู่มือครู สนุกกับโครงงานวิทยาศาสตร์', 'คู่มือครู พลังงานทดแทนกับการใช้ประโยชน์');
		for($i=1;$i<=$bookCount;$i++)
		{
			$modelClass = 'm-s-ins-789-additional-'.$i;
			$imagePath = 'image/s/instructor/789-additional/'.$i.'.jpg';
			$bookName = $bookNames[($i - 1)];  /* --- ใช้ ($i-1) เพราะว่า array เริ่มต้นด้วย index ที่ 0 --- */
			$nameOfComponent = array('r_s_ins_789_additional_'.$i.'_1', 'r_s_ins_789_additional_'.$i.'_2', 't_s_ins_789_additional_'.$i.'_3', 'f_s_ins_789_additional_'.$i.'_4', 'h_s_ins_789_additional_'.$i.'_4');
			$collapseSectionId = 'msIns789Additional'.$i.'SelectedCollapse';
			$fileUploadId = 'fsIns789Additional'.$i.'4';
			
			include DOCUMENT_ROOT.'include/book-satisfaction-template.php';
			echo '<hr/>';
		}
	}
?>