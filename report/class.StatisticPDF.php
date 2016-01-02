<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once("../config.php");
require_once(DOCUMENT_ROOT.'lib/tcpdf/tcpdf_config.php');
require_once(DOCUMENT_ROOT.'lib/tcpdf/tcpdf.php');
// extend TCPF columnWidthith custom functions
class StatisticPDF extends TCPDF {

	//Page header
    public function Header() {
        // Set font
        $this->SetFont('', 'B', 20);
        // Title
        $this->Cell(0, 16, 'สถิติ', 0, 2, 'C', 0, '', 0, false, 'M', 'B');
		
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-10);
        // Set font
        $this->SetFont('', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'หน้า '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
	
	public function generateParticipantStatistic($data) {
		$xc = 105;
        $yc = 50;
        $r = 30;
        
		if(isset($data) && $data != null){
			$allCount = $data['all_count'];
			$teacherCount = $data['t_count'];
			$studentCount = $data['s_count'];
			
			$teacherCountPercent = round(($teacherCount * 100) / 7, 2);;
			$studentCountPercent = 100 - $teacherCountPercent;
			
			$teacherCountRadiant = ($teacherCount * 360) / 7;
			$studentCountRadiant = 360 - $teacherCountRadiant;
			
			$this->SetFillColor(0, 0, 255);
			$this->PieSector($xc, $yc, $r, 0, $teacherCountRadiant, 'FD', false, 0, 2);
			
			$this->SetFillColor(0, 255, 0);
			$this->PieSector($xc, $yc, $r, $teacherCountRadiant, $teacherCountRadiant + $studentCountRadiant, 'FD', false, 0, 2);
			
			$teacherResult = 'ครู : '.$teacherCount.' คน คิดเป็น : '.$teacherCountPercent.' %';
			$studentResult = 'ครู : '.$studentCount.' คน คิดเป็น : '.$studentCountPercent.' %';
			
			$this->SetFillColor(0, 0, 255);
			$fill = 1;
			$this->MultiCell(5, 5, '', 1, 'L', $fill, 0, '', '', true, 0);
			$fill = 0;
			$this->MultiCell(0, 0, $teacherResult, '', 'L', $fill, 0, '', '', true, 0);
			
			$this->Ln();
			$this->Ln();
			
			$this->SetFillColor(0, 255, 0);
			$fill = 1;
			$this->MultiCell(5, 5, '', 1, 'L', $fill, 0, '', '', true, 0);
			$fill = 0;
			$this->MultiCell(0, 0, $studentResult, '', 'L', $fill, 0, '', '', true, 0);
		}
	}
	
}
?>