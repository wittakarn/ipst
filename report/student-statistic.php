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
		$sexStatistic = Participant::getSexOfParticipantStatistic($conn, 's');
		
		// create new PDF document
		$pdf = new StatisticPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdf->titleHeader = 'สถิติจากการประเมินของนักเรียน';

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
	
		// close and output PDF document
		$pdf->Output('quotation-detail.pdf', 'I');
	} catch (PDOException $e) {
		echo "Failed: " . $e->getMessage();
	}
	$conn = null;
}

?>
