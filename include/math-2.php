<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once("../config.php");
?>

<h4>ชั้นประถมศีกษาปีที่ 2</h4>
<h4><u>คณิตศาสตร์</u></h4>
<?php 
	$bookCount = 3;
	$bookNames = array('หนังสือเรียน', 'แบบฝึกทักษะ เล่ม 1', 'แบบฝึกทักษะ เล่ม 2');
	for($i=1;$i<=$bookCount;$i++)
	{
		$modelClass = 'm-m-2-'.$i;
		$imagePath = 'image/m/2/'.$i.'.jpg';
		$bookName = $bookNames[($i - 1)];  /* --- ใช้ ($i-1) เพราะว่า array เริ่มต้นด้วย index ที่ 0 --- */
		$nameOfComponent = array('r_m_2_'.$i.'_1', 'r_m_2_'.$i.'_2', 't_m_2_'.$i.'_3', 'f_m_2_'.$i.'_4', 'h_m_2_'.$i.'_4');
		$collapseSectionId = 'mM2'.$i.'SelectedCollapse';
		$fileUploadId = 'fM2'.$i.'4';
		
		include DOCUMENT_ROOT.'include/book-satisfaction-template.php';
		echo '<hr/>';
	}
	
	if(isset($_REQUEST['type']) && $_REQUEST['type'] === 't'){
		$bookCount = 1;
		$bookNames = array('คู่มือครู');
		for($i=1;$i<=$bookCount;$i++)
		{
			$modelClass = 'm-m-ins-2-'.$i;
			$imagePath = 'image/m/instructor/2/'.$i.'.jpg';
			$bookName = $bookNames[($i - 1)];  /* --- ใช้ ($i-1) เพราะว่า array เริ่มต้นด้วย index ที่ 0 --- */
			$nameOfComponent = array('r_m_ins_2_'.$i.'_1', 'r_m_ins_2_'.$i.'_2', 't_m_ins_2_'.$i.'_3', 'f_m_ins_2_'.$i.'_4', 'h_m_ins_2_'.$i.'_4');
			$collapseSectionId = 'mMIns2'.$i.'SelectedCollapse';
			$fileUploadId = 'fMIns2'.$i.'4';
			
			include DOCUMENT_ROOT.'include/book-satisfaction-template.php';
			echo '<hr/>';
		}
	}
?>