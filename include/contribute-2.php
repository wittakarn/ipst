<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once("../config.php");
?>

<h4>ระดับประถมศึกษา วิชาคณิตศาสตร์<span class="glyphicon glyphicon-asterisk"></span></h4>
<h4><u>หนังสือเรียนรู้เพิ่มเติมเพื่อเสริมศักยภาพ</u></h4>
<?php 
	$startBook = 12;
	$endBook = 17;
	$bookNames = array('ชั้นประถมศึกษาปีที่ 1 ', 'ชั้นประถมศึกษาปีที่ 2', 'ชั้นประถมศึกษาปีที่ 3', 'ชั้นประถมศึกษาปีที่ 4','ชั้นประถมศึกษาปีที่ 5','ชั้นประถมศึกษาปีที่ 6');
	for($i=$startBook;$i<=$endBook;$i++)
	{
		$modelClass = 'm-c-'.$i;
		$imagePath = 'image/c/'.$i.'.jpg';
		$bookName = $bookNames[($i - $startBook)];  /* --- ใช้ ($i-$startBook) เพราะว่า array เริ่มต้นด้วย index ที่ 0 --- */
		$radioValue = $i;
		
		include DOCUMENT_ROOT.'include/contribute-template.php';
		echo '<hr/>';
	}
	
	if(isset($_REQUEST['type']) && $_REQUEST['type'] === 't'){
		echo '<h4><u>วีดิทัศน์ (DVD) ประกอบการเรียนรู้ </u></h4>';
		$startBook = 51;
		$endBook = 56;
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
	}
?>