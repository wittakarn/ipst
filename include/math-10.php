<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once("../config.php");
?>

<h4>ชั้นมัธยมศึกษาปีที่ 4</h4>
<h4><u>คณิตศาสตร์</u></h4>
<?php 
	$bookCount = 9;
	$bookNames = array('หนังสือเรียน รายวิชาพื้นฐาน เล่ม 1', 'หนังสือเรียน รายวิชาพื้นฐาน เล่ม 2', 'หนังสือเรียน รายวิชาพื้นฐาน เล่ม 3', 'หนังสือเรียน รายวิชาเพิ่มเติม เล่ม 1', 'หนังสือเรียน รายวิชาเพิ่มเติม เล่ม 2', 'หนังสือเรียน รายวิชาเพิ่มเติม เล่ม 3', 'หนังสือเรียน รายวิชาเพิ่มเติม เล่ม 4', 'หนังสือเรียน รายวิชาเพิ่มเติม เล่ม 5', 'หนังสือเรียน รายวิชาเพิ่มเติม เล่ม 6');
	for($i=1;$i<=$bookCount;$i++)
	{
		$modelClass = 'm-m-10-'.$i;
		$imagePath = 'image/m/10/'.$i.'.jpg';
		$bookName = $bookNames[($i - 1)];  /* --- ใช้ ($i-1) เพราะว่า array เริ่มต้นด้วย index ที่ 0 --- */
		$nameOfComponent = array('r_m_10_'.$i.'_1', 'r_m_10_'.$i.'_2', 't_m_10_'.$i.'_3', 'f_m_10_'.$i.'_4', 'h_m_10_'.$i.'_4');
		$collapseSectionId = 'mM10'.$i.'SelectedCollapse';
		$fileUploadId = 'fM10'.$i.'4';
		
		include DOCUMENT_ROOT.'include/book-satisfaction-template.php';
		echo '<hr/>';
	}
?>