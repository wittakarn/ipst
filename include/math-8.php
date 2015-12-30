<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once("../config.php");
?>

<h4>ชั้นมัธยมศึกษาปีที่ 2</h4>
<h4><u>คณิตศาสตร์</u></h4>
<?php 
	$bookCount = 4;
	$bookNames = array('หนังสือเรียน รายวิชาพื้นฐาน เล่ม 1', 'หนังสือเรียน รายวิชาพื้นฐาน เล่ม 2', 'หนังสือเรียน รายวิชาเพิ่มเติม เล่ม 1', 'หนังสือเรียน รายวิชาเพิ่มเติม เล่ม 2');
	for($i=1;$i<=$bookCount;$i++)
	{
		$modelClass = 'm-m-8-'.$i;
		$imagePath = 'image/m/8/'.$i.'.jpg';
		$bookName = $bookNames[($i - 1)];  /* --- ใช้ ($i-1) เพราะว่า array เริ่มต้นด้วย index ที่ 0 --- */
		$nameOfComponent = array('r_m_8_'.$i.'_1', 'r_m_8_'.$i.'_2', 't_m_8_'.$i.'_3', 'f_m_8_'.$i.'_4', 'h_m_8_'.$i.'_4');
		$collapseSectionId = 'mM8'.$i.'SelectedCollapse';
		$fileUploadId = 'fM8'.$i.'4';
		
		include DOCUMENT_ROOT.'include/book-satisfaction-template.php';
		echo '<hr/>';
	}
	
	if(isset($_REQUEST['type']) && $_REQUEST['type'] === 't'){
		$bookCount = 4;
		$bookNames = array('คู่มือครู รายวิชาพื้นฐาน เล่ม 1', 'คู่มือครู รายวิชาพื้นฐาน เล่ม 2', 'คู่มือครู รายวิชาเพิ่มเติม เล่ม 1', 'คู่มือครู รายวิชาเพิ่มเติม เล่ม 2');
		for($i=1;$i<=$bookCount;$i++)
		{
			$modelClass = 'm-m-ins-8-'.$i;
			$imagePath = 'image/m/instructor/8/'.$i.'.jpg';
			$bookName = $bookNames[($i - 1)];  /* --- ใช้ ($i-1) เพราะว่า array เริ่มต้นด้วย index ที่ 0 --- */
			$nameOfComponent = array('r_m_ins_8_'.$i.'_1', 'r_m_ins_8_'.$i.'_2', 't_m_ins_8_'.$i.'_3', 'f_m_ins_8_'.$i.'_4', 'h_m_ins_8_'.$i.'_4');
			$collapseSectionId = 'mMIns8'.$i.'SelectedCollapse';
			$fileUploadId = 'fMIns8'.$i.'4';
			
			include DOCUMENT_ROOT.'include/book-satisfaction-template.php';
			echo '<hr/>';
		}
	}
?>