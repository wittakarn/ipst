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
		$modelClass = 'm-s-101112-n-'.$i;
		$imagePath = 'image/s/101112/n/'.$i.'.jpg';
		$bookName = $bookNames[($i - 1)];  /* --- ใช้ ($i-1) เพราะว่า array เริ่มต้นด้วย index ที่ 0 --- */
		$nameOfComponent = array('r_s_101112n_'.$i.'_1', 'r_s_101112n_'.$i.'_2', 't_s_101112n_'.$i.'_3', 'f_s_101112n_'.$i.'_4', 'h_s_101112n_'.$i.'_4');
		$collapseSectionId = 'ms101112n'.$i.'SelectedCollapse';
		$fileUploadId = 'fs101112n'.$i.'4';
		
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
		$modelClass = 'm-s-101112-p-'.$i;
		$imagePath = 'image/s/101112/p/'.$i.'.jpg';
		$bookName = $bookNames[($i - 1)];  /* --- ใช้ ($i-1) เพราะว่า array เริ่มต้นด้วย index ที่ 0 --- */
		$nameOfComponent = array('r_s_101112p_'.$i.'_1', 'r_s_101112p_'.$i.'_2', 't_s_101112p_'.$i.'_3', 'f_s_101112p_'.$i.'_4', 'h_s_101112p_'.$i.'_4');
		$collapseSectionId = 'ms101112p'.$i.'SelectedCollapse';
		$fileUploadId = 'fs101112p'.$i.'4';
		
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
		$modelClass = 'm-s-101112-c-'.$i;
		$imagePath = 'image/s/101112/c/'.$i.'.jpg';
		$bookName = $bookNames[($i - 1)];  /* --- ใช้ ($i-1) เพราะว่า array เริ่มต้นด้วย index ที่ 0 --- */
		$nameOfComponent = array('r_s_101112c_'.$i.'_1', 'r_s_101112c_'.$i.'_2', 't_s_101112c_'.$i.'_3', 'f_s_101112c_'.$i.'_4', 'h_s_101112c_'.$i.'_4');
		$collapseSectionId = 'ms101112c'.$i.'SelectedCollapse';
		$fileUploadId = 'fs101112c'.$i.'4';
		
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
		$modelClass = 'm-s-101112-b-'.$i;
		$imagePath = 'image/s/101112/b/'.$i.'.jpg';
		$bookName = $bookNames[($i - 1)];  /* --- ใช้ ($i-1) เพราะว่า array เริ่มต้นด้วย index ที่ 0 --- */
		$nameOfComponent = array('r_s_101112b_'.$i.'_1', 'r_s_101112b_'.$i.'_2', 't_s_101112b_'.$i.'_3', 'f_s_101112b_'.$i.'_4', 'h_s_101112b_'.$i.'_4');
		$collapseSectionId = 'ms101112b'.$i.'SelectedCollapse';
		$fileUploadId = 'fs101112b'.$i.'4';
		
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
		$modelClass = 'm-s-101112-e-'.$i;
		$imagePath = 'image/s/101112/e/'.$i.'.jpg';
		$bookName = $bookNames[($i - 1)];  /* --- ใช้ ($i-1) เพราะว่า array เริ่มต้นด้วย index ที่ 0 --- */
		$nameOfComponent = array('r_s_101112e_'.$i.'_1', 'r_s_101112e_'.$i.'_2', 't_s_101112e_'.$i.'_3', 'f_s_101112e_'.$i.'_4', 'h_s_101112e_'.$i.'_4');
		$collapseSectionId = 'ms101112e'.$i.'SelectedCollapse';
		$fileUploadId = 'fs101112e'.$i.'4';
		
		include DOCUMENT_ROOT.'include/book-satisfaction-template.php';
		echo '<hr/>';
	}
?>