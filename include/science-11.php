<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once("../config.php");
?>

<h4>ชั้นมัธยมศึกษาปีที่ 5</h4>
<h4><u>วิทยาศาสตร์ สำหรับนักเรียนที่ไม่เน้นวิทยาศาสตร์ </u></h4>
<?php 
	$bookCount = 6;
	$bookNames = array('หนังสือเรียน การเคลื่อนที่และแรงในธรรมชาติ', 'หนังสือเรียน ดวงดาวและโลกของเรา', 'หนังสือเรียน พลังงาน', 'หนังสือเรียน พันธุกรรมและสิ่งแวดล้อม', 'หนังสือเรียน สารและสมบัติของสาร', 'หนังสือเรียน ดุลยภาพของสิ่งมีชีวิต');
	for($i=1;$i<=$bookCount;$i++)
	{
		$modelClass = 'm-s-10-n-'.$i;
		$imagePath = 'image/s/10/n/'.$i.'.jpg';
		$bookName = $bookNames[($i - 1)];  /* --- ใช้ ($i-1) เพราะว่า array เริ่มต้นด้วย index ที่ 0 --- */
		$nameOfComponent = array('r_s_11n_'.$i.'_1', 'r_s_11n_'.$i.'_2', 't_s_11n_'.$i.'_3', 'f_s_11n_'.$i.'_4', 'h_s_11n_'.$i.'_4');
		$collapseSectionId = 'ms11n'.$i.'SelectedCollapse';
		$fileUploadId = 'fs11n'.$i.'4';
		
		include DOCUMENT_ROOT.'include/book-satisfaction-template.php';
		echo '<hr/>';
	}
?>

<h4><u>ฟิสิกส์ สำหรับนักเรียนที่เน้นวิทยาศาสตร์</u></h4>
<?php 
	$bookCount = 6;
	$bookNames = array('หนังสือเรียน รายวิชาพื้นฐาน', 'หนังสือเรียน รายวิชาเพิ่มเติม เล่ม 1', 'หนังสือเรียน รายวิชาเพิ่มเติม เล่ม 2', 'หนังสือเรียน รายวิชาเพิ่มเติม เล่ม 3 ', 'หนังสือเรียน รายวิชาเพิ่มเติม เล่ม 4 ', 'หนังสือเรียน รายวิชาเพิ่มเติม เล่ม 5 ');
	for($i=1;$i<=$bookCount;$i++)
	{
		$modelClass = 'm-s-10-p-'.$i;
		$imagePath = 'image/s/10/p/'.$i.'.jpg';
		$bookName = $bookNames[($i - 1)];  /* --- ใช้ ($i-1) เพราะว่า array เริ่มต้นด้วย index ที่ 0 --- */
		$nameOfComponent = array('r_s_11p_'.$i.'_1', 'r_s_11p_'.$i.'_2', 't_s_11p_'.$i.'_3', 'f_s_11p_'.$i.'_4', 'h_s_11p_'.$i.'_4');
		$collapseSectionId = 'ms11p'.$i.'SelectedCollapse';
		$fileUploadId = 'fs11p'.$i.'4';
		
		include DOCUMENT_ROOT.'include/book-satisfaction-template.php';
		echo '<hr/>';
	}
?>

<h4><u>เคมี สำหรับนักเรียนที่เน้นวิทยาศาสตร์</u></h4>
<?php 
	$bookCount = 6;
	$bookNames = array('หนังสือเรียน รายวิชาพื้นฐาน', 'หนังสือเรียน รายวิชาเพิ่มเติม เล่ม 1', 'หนังสือเรียน รายวิชาเพิ่มเติม เล่ม 2', 'หนังสือเรียน รายวิชาเพิ่มเติม เล่ม 3 ', 'หนังสือเรียน รายวิชาเพิ่มเติม เล่ม 4 ', 'หนังสือเรียน รายวิชาเพิ่มเติม เล่ม 5 ');
	for($i=1;$i<=$bookCount;$i++)
	{
		$modelClass = 'm-s-10-c-'.$i;
		$imagePath = 'image/s/10/c/'.$i.'.jpg';
		$bookName = $bookNames[($i - 1)];  /* --- ใช้ ($i-1) เพราะว่า array เริ่มต้นด้วย index ที่ 0 --- */
		$nameOfComponent = array('r_s_11c_'.$i.'_1', 'r_s_11c_'.$i.'_2', 't_s_11c_'.$i.'_3', 'f_s_11c_'.$i.'_4', 'h_s_11c_'.$i.'_4');
		$collapseSectionId = 'ms11c'.$i.'SelectedCollapse';
		$fileUploadId = 'fs11c'.$i.'4';
		
		include DOCUMENT_ROOT.'include/book-satisfaction-template.php';
		echo '<hr/>';
	}
?>

<h4><u>ชีววิทยา สำหรับนักเรียนที่เน้นวิทยาศาสตร์</u></h4>
<?php 
	$bookCount = 6;
	$bookNames = array('หนังสือเรียน รายวิชาพื้นฐาน', 'หนังสือเรียน รายวิชาเพิ่มเติม เล่ม 1', 'หนังสือเรียน รายวิชาเพิ่มเติม เล่ม 2', 'หนังสือเรียน รายวิชาเพิ่มเติม เล่ม 3 ', 'หนังสือเรียน รายวิชาเพิ่มเติม เล่ม 4 ', 'หนังสือเรียน รายวิชาเพิ่มเติม เล่ม 5 ');
	for($i=1;$i<=$bookCount;$i++)
	{
		$modelClass = 'm-s-10-b-'.$i;
		$imagePath = 'image/s/10/b/'.$i.'.jpg';
		$bookName = $bookNames[($i - 1)];  /* --- ใช้ ($i-1) เพราะว่า array เริ่มต้นด้วย index ที่ 0 --- */
		$nameOfComponent = array('r_s_11b_'.$i.'_1', 'r_s_11b_'.$i.'_2', 't_s_11b_'.$i.'_3', 'f_s_11b_'.$i.'_4', 'h_s_11b_'.$i.'_4');
		$collapseSectionId = 'ms11b'.$i.'SelectedCollapse';
		$fileUploadId = 'fs11b'.$i.'4';
		
		include DOCUMENT_ROOT.'include/book-satisfaction-template.php';
		echo '<hr/>';
	}
?>

<h4><u>โลก ดาราศาสตร์ และอวกาศ สำหรับนักเรียนที่เน้นวิทยาศาสตร์</u></h4>
<?php 
	$bookCount = 4;
	$bookNames = array('หนังสือเรียน รายวิชาพื้นฐาน', 'หนังสือเรียน รายวิชาเพิ่มเติม เล่ม 1', 'หนังสือเรียน รายวิชาเพิ่มเติม เล่ม 2', 'หนังสือเรียน รายวิชาเพิ่มเติม เล่ม 3 ');
	for($i=1;$i<=$bookCount;$i++)
	{
		$modelClass = 'm-s-10-e-'.$i;
		$imagePath = 'image/s/10/e/'.$i.'.jpg';
		$bookName = $bookNames[($i - 1)];  /* --- ใช้ ($i-1) เพราะว่า array เริ่มต้นด้วย index ที่ 0 --- */
		$nameOfComponent = array('r_s_11e_'.$i.'_1', 'r_s_11e_'.$i.'_2', 't_s_11e_'.$i.'_3', 'f_s_11e_'.$i.'_4', 'h_s_11e_'.$i.'_4');
		$collapseSectionId = 'ms11e'.$i.'SelectedCollapse';
		$fileUploadId = 'fs11e'.$i.'4';
		
		include DOCUMENT_ROOT.'include/book-satisfaction-template.php';
		echo '<hr/>';
	}
?>