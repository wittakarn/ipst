<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once("../config.php");
require_once(DOCUMENT_ROOT.'lib/tcpdf/tcpdf_config.php');
require_once(DOCUMENT_ROOT.'lib/tcpdf/tcpdf.php');
// extend TCPF columnWidthith custom functions
class ReceiverContributeInfoPDF extends TCPDF {

	//Page header
    public function Header() {
        // Logo
		/*
        $image_file = K_PATH_IMAGES.'te-logo.jpg';
        $this->Image($image_file, PDF_MARGIN_LEFT, 8, 115, '', 'JPEG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('', 'B', 20);
        // Title
        $this->Cell(0, 16, 'ใบเสนอราคา', 0, 2, 'R', 0, '', 0, false, 'M', 'B');
		*/
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
	
	public function generateContributeInfo($contributionInfo, $type) {
//		$image_file = K_PATH_IMAGES.$contributionInfo['id'].'.jpg';
//        $this->Image($image_file, PDF_MARGIN_LEFT, 8, 35, '', 'JPEG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		
		if($type != null){
			$this->Cell(0, 0, $type==='t' ? 'ครู' : 'นักเรียน', 0, 2, 'R', 0, '', 0, false, 'M', 'B');	
		}
		
        // Set font
        $this->SetFont('', 'B', 18);
        // Title
        $this->Cell(0, 0, $contributionInfo['name'], 0, 2, 'L', 0, '', 0, false, 'M', 'B');
		$this->Ln();
		$this->MultiCell(220, 0, '', 'B', 'L', 0, 0, 0, '', '', '', true, 0);
		$this->Ln(13);
		//$lineStyleBlack = array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0));
		//$this->Line(220, 70, 0, 70, $lineStyleBlack);
	}

    public function generateReceiverInfo($datas) {
		
        //$this->Ln();
        // Color and font restoration
		$this->SetFont('', '', 17);
        // Data
        $fill = 0;
		$count = 0;
        foreach($datas as $data) {
			$count++;
			if($count > 6){
				$count = 0;
				$this->AddPage();
			}
            $this->Cell(0, 0, 'ชื่อ-นามสกุล :  '.$data['i_receiver_fullname'], '', 0, 'L', $fill);
            $this->Ln();
			
			$address = str_replace("\n", " ", $data['t_receiver_address']);
			$address = str_replace("\r", " ", $address);
			
			$this->Cell(0, 0, 'ที่อยู่ :  '.$address, '', 0, 'L', $fill);
            $this->Ln();
			$this->Cell(0, 0, 'รหัสไปรษณีย์ :  '.$data['i_receiver_postcode'], '', 0, 'L', $fill);
//            $this->Ln();
//			$this->Cell(0, 0, 'สื่อเสริมการเรียนรู้ :  '.$data['book_name'], '', 0, 'L', $fill);
            $this->Ln();
			$this->MultiCell(220, 0, '', 'B', 'L', $fill, 0, 0, '', '', '', true, 0);
			$this->Ln(13);
        }
    }
	
	public function generateReceiverName($datas) {
		
        //$this->Ln();
        // Color and font restoration
		$this->SetFont('', '', 17);
		$this->SetLineWidth(0.1);
		$this->SetFillColor(224, 235, 255);
        // Data
        $fill = 0;
		$count = 1;
        foreach($datas as $data) {
            $this->Cell(0, 0, 'ลำดับที่ '.$count.'.    '.$data['i_receiver_fullname'], 'LTRB', 0, 'L', $fill);
            $this->Ln();
			$fill=!$fill;
			$count++;
        }
    }
	
	public static function formatDateThai($strDate){
		$dmy = explode('-', $strDate);
		$y = $dmy[0];
		$m = $dmy[1];
		$d = $dmy[2];
		return $d.'/'.$m.'/'.$y;
	}
}
?>