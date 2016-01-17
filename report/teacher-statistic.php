<?php
session_start();
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once("../config.php");
require_once DOCUMENT_ROOT.'/connection.php';
require_once DOCUMENT_ROOT.'/class/class.Participant.php';
require_once DOCUMENT_ROOT.'/report/class.StatisticPDF.php';
require_once(DOCUMENT_ROOT.'lib/tcpdf/tcpdf_config.php');
require_once(DOCUMENT_ROOT.'lib/tcpdf/tcpdf.php');

if (isset($_SESSION['user_id'])){
	
	$conn = DataBaseConnection::createConnect();
	$type = null;
	
	try{
		$sexStatistic = Participant::getSexOfParticipantStatistic($conn, 't');
		$degreeStatistic = Participant::getTeacherDegreeStatistic($conn);
		$subjectStatistic = Participant::getTeacherSubjectStatistic($conn);
		$schoolUnderStatistic = Participant::getTeacherSchoolUnderStatistic($conn);
		$satisfyStatistic = Participant::getSatisfyStatistic($conn);
		$scienceStatistic = Participant::getScienceBookStatistic($conn, 't');
		$scienceInstructorStatistic = Participant::getScienceBookInstructorStatistic($conn);
		$mathStatistic = Participant::getMathBookStatistic($conn, 't');
		$mathInstructorStatistic = Participant::getMathBookInstructorStatistic($conn);
		$technologyStatistic = Participant::getTechnologyBookStatistic($conn, 't');
		$technologyInstructorStatistic = Participant::getTechnologyBookInstructorStatistic($conn);
		$designStatistic = Participant::getDesignBookStatistic($conn, 't');
		$designInstructorStatistic = Participant::getDesignBookInstructorStatistic($conn);
		
		// create new PDF document
		$pdf = new StatisticPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdf->titleHeader = 'สถิติจากแบบประเมินฯของครู';

		// set document information
		$pdf->SetCreator(PDF_CREATOR);
		$pdf->SetAuthor('Wittakarn Keeratichayakorn');
		$pdf->SetTitle('Statistic');
		$pdf->SetSubject('Statistic');

		// set default header data
		$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

		// set header and footer fonts
		$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// add a page
		$pdf->AddPage();

		$pdf->generateSexOfParticipantStatistic($sexStatistic, 50);
		
		$pdf->generateTeacherDegreeStatistic($degreeStatistic, 130);
		
		$pdf->generateTeacherSubjectStatistic($subjectStatistic, 220);
		
		// add a page
		$pdf->AddPage();
		
		$pdf->generateTeacherSchoolUnderStatistic($schoolUnderStatistic, 70);
		
		$pdf->generateSatisfyStatistic($satisfyStatistic, 170);
		
		// add a page
		$pdf->AddPage();
		
		// column titles
		$tableHeader = array('รายชื่อหนังสือ', 'ได้ใช้', 'ไม่ได้ใช้', 'พึงพอใจ', 'เฉยๆ', 'ไม่พึงพอใจ');
		$pdf->statisticTable("วิชาวิทยาศาสตร์", $tableHeader, $scienceStatistic);
		
		$pdf->Ln(20);
		$pdf->statisticTable("คู่มือครูวิชาวิทยาศาสตร์", $tableHeader, $scienceInstructorStatistic);
		
		$pdf->Ln(20);
		$pdf->statisticTable("วิชาคณิตศาสตร์", $tableHeader, $mathStatistic);
		
		$pdf->Ln(20);
		$pdf->statisticTable("คู่มือครูวิชาคณิตศาสตร์", $tableHeader, $mathInstructorStatistic);
		
		$pdf->Ln(20);
		$pdf->statisticTable("วิชาเทคโนโลยี", $tableHeader, $technologyStatistic);
		
		$pdf->Ln(20);
		$pdf->statisticTable("คู่มือครูวิชาเทคโนโลยี", $tableHeader, $technologyInstructorStatistic);
		
		$pdf->Ln(20);
		$pdf->statisticTable("วิชาออกแบบ", $tableHeader, $designStatistic);
		
		$pdf->Ln(20);
		$pdf->statisticTable("คู่มือครูวิชาออกแบบ", $tableHeader, $designInstructorStatistic);
	
		// close and output PDF document
		$pdf->Output('quotation-detail.pdf', 'I');
	} catch (PDOException $e) {
		echo "Failed: " . $e->getMessage();
	}
	$conn = null;
}

?>
