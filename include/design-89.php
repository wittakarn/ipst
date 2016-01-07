<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once("../config.php");
?>

<h4><u>หนังสือรายวิชาเพิ่มเติม</u></h4>
<?php 
	$bookCount = 1;
	$bookNames = array('หนังสือรายวิชาเพิ่มเติม พลังงานหมุนเวียน');
	for($i=1;$i<=$bookCount;$i++)
	{
		$modelClass = 'm-d-89-'.$i;
		$imagePath = 'image/d/89/'.$i.'.jpg';
		$bookName = $bookNames[($i - 1)];  /* --- ใช้ ($i-1) เพราะว่า array เริ่มต้นด้วย index ที่ 0 --- */
		$nameOfComponent = array('r_d_89_'.$i.'_1', 'r_d_89_'.$i.'_2', 't_d_89_'.$i.'_3', 'f_d_89_'.$i.'_4', 'h_d_89_'.$i.'_4');
		$collapseSectionId = 'md89'.$i.'SelectedCollapse';
		$fileUploadId = 'fd89'.$i.'4';
		
		include DOCUMENT_ROOT.'include/book-satisfaction-template.php';
		echo '<hr/>';
	}
	

?>