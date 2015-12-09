<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once("../config.php");
?>

<h4>ชั้นประถมศีกษาปีที่ 1</h4>
<h4><u>คณิตศาสตร์</u></h4>
<?php 
	$modelClass = 'm-m-1-1';
	$imagePath = 'image/m/1/1.jpg';
	$bookName = 'หนังสือเรียน';
	$nameOfComponent = array('r_m_1_1_1', 'r_m_1_1_2', 't_m_1_1_3', 'f_m_1_1_4', 'h_m_1_1_4');
	$collapseSectionId = 'mM11SelectedCollapse';
	$fileUploadId = 'fM114';
	include DOCUMENT_ROOT.'include/book-satisfaction-template.php';
?>
<hr/>
<?php 
	$modelClass = 'm-m-1-2';
	$imagePath = 'image/m/1/2.jpg';
	$bookName = 'หนังสือเรียน';
	$nameOfComponent = array('r_m_1_2_1', 'r_m_1_2_2', 't_m_1_2_3', 'f_m_1_2_4', 'h_m_1_2_4');
	$collapseSectionId = 'mM12SelectedCollapse';
	$fileUploadId = 'fM124';
	include DOCUMENT_ROOT.'include/book-satisfaction-template.php';
?>
<hr/>