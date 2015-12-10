<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once("../config.php");
?>

<h4>ระดับมัธยมศึกษาตอนปลาย วิชาชีววิทยา<span class="glyphicon glyphicon-asterisk"></span></h4>
<h4><u>หนังสือเรียนรู้เพิ่มเติมเพื่อเสริมศักยภาพ</u></h4>
<?php 
	$startBook = 32;
	$endBook = 37;
	$bookNames = array('พื้นฐานชีววิทยา', 'ชีววิทยา เล่ม 1', 'ชีววิทยา เล่ม 2', 'ชีววิทยา เล่ม 3', 'ชีววิทยา เล่ม 4', 'ชีววิทยา เล่ม 5');
	for($i=$startBook;$i<=$endBook;$i++)
	{
		$modelClass = 'm-c-'.$i;
		$imagePath = 'image/c/'.$i.'.jpg';
		$bookName = $bookNames[($i - $startBook)];  /* --- ใช้ ($i-$startBook) เพราะว่า array เริ่มต้นด้วย index ที่ 0 --- */
		$radioValue = $i;
		
		include DOCUMENT_ROOT.'include/contribute-template.php';
		echo '<hr/>';
	}
?>