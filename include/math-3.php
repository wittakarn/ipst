<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once("../config.php");
?>

<h4>ชั้นประถมศีกษาปีที่ 3</h4>
<h4><u>คณิตศาสตร์</u></h4>
<?php 
	$bookCount = 3;
	$bookNames = array('หนังสือเรียน', 'แบบฝึกทักษะ เล่ม 1', 'แบบฝึกทักษะ เล่ม 2');
	for($i=1;$i<=$bookCount;$i++)
	{
		$modelClass = 'm-m-3-'.$i;
		$imagePath = 'image/m/3/'.$i.'.jpg';
		$bookName = $bookNames[($i - 1)];  /* --- ใช้ ($i-1) เพราะว่า array เริ่มต้นด้วย index ที่ 0 --- */
		$nameOfComponent = array('r_m_3_'.$i.'_1', 'r_m_3_'.$i.'_2', 't_m_3_'.$i.'_3', 'f_m_3_'.$i.'_4', 'h_m_3_'.$i.'_4');
		$collapseSectionId = 'mM3'.$i.'SelectedCollapse';
		$fileUploadId = 'fM3'.$i.'4';
		
		include DOCUMENT_ROOT.'include/book-satisfaction-template.php';
		echo '<hr/>';
	}
	
	if(isset($_REQUEST['type']) && $_REQUEST['type'] === 't'){
		$bookCount = 1;
		$bookNames = array('คู่มือครู');
		for($i=1;$i<=$bookCount;$i++)
		{
			$modelClass = 'm-m-ins-3-'.$i;
			$imagePath = 'image/m/instructor/3/'.$i.'.jpg';
			$bookName = $bookNames[($i - 1)];  /* --- ใช้ ($i-1) เพราะว่า array เริ่มต้นด้วย index ที่ 0 --- */
			$nameOfComponent = array('r_m_ins_3_'.$i.'_1', 'r_m_ins_3_'.$i.'_2', 't_m_ins_3_'.$i.'_3', 'f_m_ins_3_'.$i.'_4', 'h_m_ins_3_'.$i.'_4');
			$collapseSectionId = 'mMIns3'.$i.'SelectedCollapse';
			$fileUploadId = 'fMIns3'.$i.'4';
			
			include DOCUMENT_ROOT.'include/book-satisfaction-template.php';
			echo '<hr/>';
		}
	}
?>