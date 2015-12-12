<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once("../config.php");
?>

<h4>ชั้นประถมศีกษาปีที่ 5</h4>
<h4><u>คณิตศาสตร์</u></h4>
<?php 
	$bookCount = 3;
	$bookNames = array('หนังสือเรียน', 'แบบฝึกทักษะ เล่ม 1', 'แบบฝึกทักษะ เล่ม 2');
	for($i=1;$i<=$bookCount;$i++)
	{
		$modelClass = 'm-m-5-'.$i;
		$imagePath = 'image/m/5/'.$i.'.jpg';
		$bookName = $bookNames[($i - 1)];  /* --- ใช้ ($i-1) เพราะว่า array เริ่มต้นด้วย index ที่ 0 --- */
		$nameOfComponent = array('r_m_5_'.$i.'_1', 'r_m_5_'.$i.'_2', 't_m_5_'.$i.'_3', 'f_m_5_'.$i.'_4', 'h_m_5_'.$i.'_4');
		$collapseSectionId = 'mM5'.$i.'SelectedCollapse';
		$fileUploadId = 'fM5'.$i.'4';
		
		include DOCUMENT_ROOT.'include/book-satisfaction-template.php';
		echo '<hr/>';
	}
?>