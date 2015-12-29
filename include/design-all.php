<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once("../config.php");
?>

<h4><u>หนังสือเสริมการเรียนรู้</u></h4>
<?php 
	$bookCount = 1;
	$bookNames = array('หนังสือเสริมการเรียนรู้');
	for($i=1;$i<=$bookCount;$i++)
	{
		$modelClass = 'm-d-all-'.$i;
		$imagePath = 'image/d/all/'.$i.'.jpg';
		$bookName = $bookNames[($i - 1)];  /* --- ใช้ ($i-1) เพราะว่า array เริ่มต้นด้วย index ที่ 0 --- */
		$nameOfComponent = array('r_d_all_'.$i.'_1', 'r_d_all_'.$i.'_2', 't_d_all_'.$i.'_3', 'f_d_all_'.$i.'_4', 'h_d_all_'.$i.'_4');
		$collapseSectionId = 'mdAll'.$i.'SelectedCollapse';
		$fileUploadId = 'fdAll'.$i.'4';
		
		include DOCUMENT_ROOT.'include/book-satisfaction-template.php';
		echo '<hr/>';
	}
?>