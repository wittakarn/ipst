<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once("../config.php");
?>

<h4>ชั้นประถมศีกษาปีที่ 2</h4>
<h4><u>การออกแบบและเทคโนโลยี</u></h4>
<?php 
	$bookCount = 1;
	$bookNames = array('หนังสือเรียน');
	for($i=1;$i<=$bookCount;$i++)
	{
		$modelClass = 'm-d-2-'.$i;
		$imagePath = 'image/d/2/'.$i.'.jpg';
		$bookName = $bookNames[($i - 1)];  /* --- ใช้ ($i-1) เพราะว่า array เริ่มต้นด้วย index ที่ 0 --- */
		$nameOfComponent = array('r_d_2_'.$i.'_1', 'r_d_2_'.$i.'_2', 't_d_2_'.$i.'_3', 'f_d_2_'.$i.'_4', 'h_d_2_'.$i.'_4');
		$collapseSectionId = 'md2'.$i.'SelectedCollapse';
		$fileUploadId = 'fd2'.$i.'4';
		
		include DOCUMENT_ROOT.'include/book-satisfaction-template.php';
		echo '<hr/>';
	}
?>