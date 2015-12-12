<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once("../config.php");
?>

<h4>ชั้นประถมศีกษาปีที่ 2</h4>
<h4><u>วิทยาศาสตร์</u></h4>
<?php 
	$bookCount = 2;
	$bookNames = array('หนังสือเรียน', 'แบบบันทึกกิจกรรม');
	for($i=1;$i<=$bookCount;$i++)
	{
		$modelClass = 'm-s-2-'.$i;
		$imagePath = 'image/s/2/'.$i.'.jpg';
		$bookName = $bookNames[($i - 1)];  /* --- ใช้ ($i-1) เพราะว่า array เริ่มต้นด้วย index ที่ 0 --- */
		$nameOfComponent = array('r_s_2_'.$i.'_1', 'r_s_2_'.$i.'_2', 't_s_2_'.$i.'_3', 'f_s_2_'.$i.'_4', 'h_s_2_'.$i.'_4');
		$collapseSectionId = 'ms2'.$i.'SelectedCollapse';
		$fileUploadId = 'fs2'.$i.'4';
		
		include DOCUMENT_ROOT.'include/book-satisfaction-template.php';
		echo '<hr/>';
	}
?>