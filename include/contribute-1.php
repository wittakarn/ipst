<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once("../config.php");
?>

<h4>ระดับประถมศึกษา วิชาวิทยาศาสตร์<span class="glyphicon glyphicon-asterisk"></span></h4>
<h4><u>หนังสือเรียนรู้เพิ่มเติมเพื่อเสริมศักยภาพ</u></h4>
<?php 
	$startBook = 1;
	$endBook = 5;
	$bookNames = array('หนังสือเรียนรู้เพิ่มเติมเพื่อเสริมศักยภาพ ชั้นประถมศึกษาปีที่ 1 ', 'หนังสือเรียนรู้เพิ่มเติมเพื่อเสริมศักยภาพ ชั้นประถมศึกษาปีที่ 2', 'หนังสือเรียนรู้เพิ่มเติมเพื่อเสริมศักยภาพ ชั้นประถมศึกษาปีที่ 3', 'หนังสือเรียนรู้เพิ่มเติมเพื่อเสริมศักยภาพ ชั้นประถมศึกษาปีที่ 4','หนังสือเรียนรู้เพิ่มเติมเพื่อเสริมศักยภาพ ชั้นประถมศึกษาปีที่ 5');
	for($i=$startBook;$i<=$endBook;$i++)
	{
		$modelClass = 'm-c-'.$i;
		$imagePath = 'image/c/'.$i.'.jpg';
		$bookName = $bookNames[($i - $startBook)];  /* --- ใช้ ($i-$startBook) เพราะว่า array เริ่มต้นด้วย index ที่ 0 --- */
		$radioValue = $i;
		
		include DOCUMENT_ROOT.'include/contribute-template.php';
		echo '<hr/>';
	}

	echo '<h4><u>วีดิทัศน์ (DVD) ประกอบการเรียนรู้ </u></h4>';
	$startBook = 6;
	$endBook = 11;
	$bookNames = array('วีดิทัศน์ (DVD) ประกอบการเรียนรู้  ชั้นประถมศึกษาปีที่ 1', 'วีดิทัศน์ (DVD) ประกอบการเรียนรู้  ชั้นประถมศึกษาปีที่ 2', 'วีดิทัศน์ (DVD) ประกอบการเรียนรู้  ชั้นประถมศึกษาปีที่ 3', 'วีดิทัศน์ (DVD) ประกอบการเรียนรู้  ชั้นประถมศึกษาปีที่ 4','วีดิทัศน์ (DVD) ประกอบการเรียนรู้  ชั้นประถมศึกษาปีที่ 5', 'วีดิทัศน์ (DVD) ประกอบการเรียนรู้  ชั้นประถมศึกษาปีที่ 6');
	for($i=$startBook;$i<=$endBook;$i++)
	{
		$modelClass = 'm-c-'.$i;
		$imagePath = 'image/c/'.$i.'.jpg';
		$bookName = $bookNames[($i - $startBook)];
		$radioValue = $i;
		
		include DOCUMENT_ROOT.'include/contribute-template.php';
		echo '<hr/>';
	}
?>