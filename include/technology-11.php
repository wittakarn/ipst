<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once("../config.php");
?>

<h4>ชั้นมัธยมศึกษาปีที่ 5</h4>
<h4><u>เทคโนโลยีสารสนเทศและการสื่อสาร</u></h4>
<?php 
	$bookCount = 5;
	$bookNames = array('หนังสือเรียน รายวิชาพื้นฐาน', 'หนังสือเรียนรายวิชาเพิ่มเติม คณิตศาสตร์สำหรับคอมพิวเตอร์', 'หนังสือเรียน รายวิชาเพิ่มเติม ภาษาจาวา', 'หนังสือเรียน รายวิชาเพิ่มเติม ภาษาซี', 'หนังสือเรียน รายวิชาเพิ่มเติม ภาษาไพทอน');
	for($i=1;$i<=$bookCount;$i++)
	{
		$modelClass = 'm-t-10-'.$i;
		$imagePath = 'image/t/10/'.$i.'.jpg';
		$bookName = $bookNames[($i - 1)];  /* --- ใช้ ($i-1) เพราะว่า array เริ่มต้นด้วย index ที่ 0 --- */
		$nameOfComponent = array('r_t_11_'.$i.'_1', 'r_t_11_'.$i.'_2', 't_t_11_'.$i.'_3', 'f_t_11_'.$i.'_4', 'h_t_11_'.$i.'_4');
		$collapseSectionId = 'mt11'.$i.'SelectedCollapse';
		$fileUploadId = 'ft11'.$i.'4';
		
		include DOCUMENT_ROOT.'include/book-satisfaction-template.php';
		echo '<hr/>';
	}
?>