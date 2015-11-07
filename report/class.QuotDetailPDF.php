<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once("../config.php");
require_once(DOCUMENT_ROOT.'lib/tcpdf/tcpdf_config.php');
require_once(DOCUMENT_ROOT.'lib/tcpdf/tcpdf.php');
// extend TCPF columnWidthith custom functions
class QuotDetailPDF extends TCPDF {

	public $columnWidth = array(10, 80, 20, 15, 25, 30);

	//Page header
    public function Header() {
        // Logo
        $image_file = K_PATH_IMAGES.'se-logo.png';
        $this->Image($image_file, 10, 10, 50, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('', 'B', 20);
        // Title
        $this->Cell(0, 0, 'ใบเสนอราคา', 0, 2, 'R', 0, '', 0, false, 'M', 'M');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-10);
        // Set font
        $this->SetFont('', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
	
	public function generateQuotationMaster($customerData, $quotMast) {

		$this->SetFont('', '', 14);
		$customerDetailheight = 8;
		$customerDetailBorder = 0;
		$customerDetailColumnHeight = 5;
		$isAddYourRef = false;
		$isAddDate = false;
		$strDate = $quotMast['date'];
		
		$this->MultiCell(30, 12, 'นามลูกค้า'."\n".'CUSTOMER', $customerDetailBorder, 'L', 0, 0, '', '', true, 0);
		$this->MultiCell(100, 12, $customerData['customer_name'], $customerDetailBorder, 'L', 0, 0, '', '', true, 0);
		$customerDetailheight = $customerDetailheight + 12;
		$this->MultiCell(8, 12, '', $customerDetailBorder, 'L', 0, 0, '', '', true, 0);
		$this->MultiCell(12, 12, 'เลขที่', $customerDetailBorder, 'R', 0, 0, '', '', true, 0);
		$this->MultiCell(25, 12, '.....'.$quotMast['quot_no'].'.....', $customerDetailBorder, 'L', 0, 0, '', '', true, 0);
		$this->Ln();
		
		$customerAddress = $customerData['address'];
		if($customerAddress != null && $customerAddress != ''){
			$this->MultiCell(30, $customerDetailColumnHeight, '', $customerDetailBorder, 'L', 0, 0, '', '', true, 0);
			$this->MultiCell(100, $customerDetailColumnHeight, $customerAddress, $customerDetailBorder, 'L', 0, 0, '', '', true, 0);
			$customerDetailheight = $customerDetailheight + $customerDetailColumnHeight;
			
			if(!$isAddYourRef){
				$this->MultiCell(8, $customerDetailColumnHeight, '', $customerDetailBorder, 'L', 0, 0, '', '', true, 0);
				$this->MultiCell(12, $customerDetailColumnHeight, 'อ้างถึง', $customerDetailBorder, 'R', 0, 0, '', '', true, 0);
				$this->MultiCell(25, $customerDetailColumnHeight, '.........................', $customerDetailBorder, 'L', 0, 0, '', '', true, 0);
				$isAddYourRef = true;
			}
			
			$this->Ln();
		}
		
		$customerTel = $customerData['tel'];
		$customerFax = $customerData['fax'];
		$haveACustomerTel = ($customerTel != null && $customerTel != '');
		$haveACustomerFax = ($customerFax != null && $customerFax != '');
		if($haveACustomerTel || $haveACustomerFax){
			
			$textTelAndFax = "";
			
			if($haveACustomerTel)
				$textTelAndFax = $textTelAndFax.'โทรศัพท์ : '.$customerTel.'  ';
			
			if($haveACustomerFax)
				$textTelAndFax = $textTelAndFax.'โทรสาร : '.$customerFax;
			
			$this->MultiCell(30, $customerDetailColumnHeight, '', $customerDetailBorder, 'L', 0, 0, '', '', true, 0);
			$this->MultiCell(100, $customerDetailColumnHeight, $textTelAndFax, $customerDetailBorder, 'L', 0, 0, '', '', true, 0);
			$customerDetailheight = $customerDetailheight + $customerDetailColumnHeight;
			
			$this->printRefAndDate($strDate, $isAddYourRef, $isAddDate, $customerDetailColumnHeight, $customerDetailBorder);
			
			$this->Ln();
		}
		
		$customerContact = $customerData['contact'];
		if($customerContact != null && $customerContact != ''){
			$this->MultiCell(30, $customerDetailColumnHeight, '', $customerDetailBorder, 'L', 0, 0, '', '', true, 0);
			$this->MultiCell(100, $customerDetailColumnHeight, $customerContact, $customerDetailBorder, 'L', 0, 0, '', '', true, 0);
			$customerDetailheight = $customerDetailheight + $customerDetailColumnHeight;
			
			$this->printRefAndDate($strDate, $isAddYourRef, $isAddDate, $customerDetailColumnHeight, $customerDetailBorder);
			
			$this->Ln();
		}
		
		$customerEmail = $customerData['email'];
		if($customerEmail != null && $customerEmail != ''){
			$this->MultiCell(30, $customerDetailColumnHeight, '', $customerDetailBorder, 'L', 0, 0, '', '', true, 0);
			$this->MultiCell(100, $customerDetailColumnHeight, $customerEmail, $customerDetailBorder, 'L', 0, 0, '', '', true, 0);
			$customerDetailheight = $customerDetailheight + $customerDetailColumnHeight;
			
			$this->printRefAndDate($strDate, $isAddYourRef, $isAddDate, $customerDetailColumnHeight, $customerDetailBorder);
			
			$this->Ln();
		}
		
		$this->Ln();

		// add rectangle
		$this->RoundedRect(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, 130, $customerDetailheight, 3.50, '1111');
	}

    // Colored table
    public function generateQuotationDetailTable($data) {
		$rowLimit = 30;
		$columnWidth = 4;
        // Colors, line columnWidthidth and bold font
        //$this->SetFillColor(255, 0, 0);
        //$this->SetTextColor(255);
        //$this->SetDracolumnWidthColor(128, 0, 0);
        $this->SetLineWidth(0.3);
        $this->SetFont('', 'B', 11);
		
		// Header
		// MultiCell($columnWidth, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0)
		$this->MultiCell($this->columnWidth[0], 7, 'ลำดับ'."\n".'ITEM', 1, 'C', 0, 0, '', '', true, 0);
		$this->MultiCell($this->columnWidth[1], 7, 'รายการ'."\n".'DESCRIPTION', 1, 'C', 0, 0, '', '', true, 0);
		$this->MultiCell($this->columnWidth[2], 7, 'จำนวน'."\n".'QUANTITY', 1, 'C', 0, 0, '', '', true, 0);
		$this->MultiCell($this->columnWidth[3], 7, 'หน่วย'."\n".'UNIT', 1, 'C', 0, 0, '', '', true, 0);
		$this->MultiCell($this->columnWidth[4], 7, 'ราคา/หน่วย'."\n".'UNIT PRICE', 1, 'C', 0, 0, '', '', true, 0);
		$this->MultiCell($this->columnWidth[5], 7, 'รวมเงิน'."\n".'AMOUNT', 1, 'C', 0, 0, '', '', true, 0);
		
        $this->Ln();
        // Color and font restoration
        //$this->SetFillColor(255, 255, 255);
        //$this->SetTextColor(0);
        $this->SetFont('');
        // Data
        $fill = 0;
        foreach($data as $rocolumnWidth) {
            $this->MultiCell($this->columnWidth[0], $columnWidth, $rocolumnWidth['sequence'], 'LRB', 'L', $fill, 0, '', '', true, 0);
            $this->MultiCell($this->columnWidth[1], $columnWidth, $rocolumnWidth['product_name'], 'LRB', 'L', $fill, 0, '', '', true, 0);
            $this->MultiCell($this->columnWidth[2], $columnWidth, number_format($rocolumnWidth['quantity'], 1), 'LRB', 'R', $fill, 0, '', '', true, 0);
			$this->MultiCell($this->columnWidth[3], $columnWidth, $rocolumnWidth['unit_name'], 'LRB', 'L', $fill, 0, '', '', true, 0);
            $this->MultiCell($this->columnWidth[4], $columnWidth, number_format($rocolumnWidth['price'], 2), 'LRB', 'R', $fill, 0, '', '', true, 0);
			$this->MultiCell($this->columnWidth[5], $columnWidth, number_format($rocolumnWidth['summary_price'], 2), 'LRB', 'R', $fill, 0, '', '', true, 0);
            $this->Ln();
			$rowLimit--;
        }
		
		while($rowLimit > 0) {
			$this->MultiCell($this->columnWidth[0], $columnWidth, '', 'LRB', 'L', $fill, 0, '', '', true, 0);
            $this->MultiCell($this->columnWidth[1], $columnWidth, '', 'LRB', 'L', $fill, 0, '', '', true, 0);
            $this->MultiCell($this->columnWidth[2], $columnWidth, '', 'LRB', 'R', $fill, 0, '', '', true, 0);
			$this->MultiCell($this->columnWidth[3], $columnWidth, '', 'LRB', 'L', $fill, 0, '', '', true, 0);
            $this->MultiCell($this->columnWidth[4], $columnWidth, '', 'LRB', 'R', $fill, 0, '', '', true, 0);
			$this->MultiCell($this->columnWidth[5], $columnWidth, '', 'LRB', 'R', $fill, 0, '', '', true, 0);
            $this->Ln();
			$rowLimit--;
		} 
		
		
        //$this->Cell(array_sum($this->columnWidth), 0, '', 'T');
    }
	
	public function generateQuotationDetailTableFooter($footerData) {
		$columnWidth = 5;
		$this->SetFont('', 'B', 12);
		$this->MultiCell($this->columnWidth[0], $columnWidth, '', 0, 'C', 0, 0, '', '', true, 0);
		$this->MultiCell($this->columnWidth[1], $columnWidth, '', 0, 'C', 0, 0, '', '', true, 0);
		$this->MultiCell($this->columnWidth[2], $columnWidth, '', 0, 'C', 0, 0, '', '', true, 0);
		$this->MultiCell($this->columnWidth[3], $columnWidth, '', 0, 'C', 0, 0, '', '', true, 0);
		$this->MultiCell($this->columnWidth[4], $columnWidth, '', 0, 'C', 0, 0, '', '', true, 0);
		$this->MultiCell($this->columnWidth[5], $columnWidth, number_format($footerData['total_price'], 2), 'LRB', 'R', 0, 0, '', '', true, 0);
		$this->Ln();
		
		$this->MultiCell($this->columnWidth[0] + $this->columnWidth[1], $columnWidth, 'กำหนดชำระเงิน...........................................................................................'."\n".'TERM OF PAYMENT.', 0, 'L', 0, 0, '', '', true, 0);
		$this->MultiCell($this->columnWidth[2], $columnWidth, '', 0, 'C', 0, 0, '', '', true, 0);
		$this->MultiCell($this->columnWidth[3], $columnWidth, '', 0, 'C', 0, 0, '', '', true, 0);
		$this->MultiCell($this->columnWidth[4], $columnWidth, 'VAT '.THAI_VAT.' %', 0, 'R', 0, 0, '', '', true, 0);
		$this->MultiCell($this->columnWidth[5], $columnWidth, number_format($footerData['vat_price'], 2), 'LRB', 'R', 0, 0, '', '', true, 0);
		$this->Ln();
		
		$this->SetFont('', 'B', 15);
		$this->MultiCell($this->columnWidth[0], $columnWidth, '', 0, 'C', 0, 0, '', '', true, 0);
		$this->MultiCell($this->columnWidth[1], $columnWidth, '', 0, 'C', 0, 0, '', '', true, 0);
		$this->MultiCell($this->columnWidth[2], $columnWidth, '', 0, 'C', 0, 0, '', '', true, 0);
		$this->MultiCell($this->columnWidth[3] + $this->columnWidth[4], $columnWidth, 'รวมจำนวนเงิน(บาท)', 0, 'R', 0, 0, '', '', true, 0);
		$this->MultiCell($this->columnWidth[5], $columnWidth, number_format($footerData['net_price'], 2), 'LRB', 'R', 0, 0, '', '', true, 0);
		$this->Ln();
		
		$this->SetFont('', '', 12);
		$this->MultiCell($this->columnWidth[0] + $this->columnWidth[1], $columnWidth, 'กำหนดส่งของ.....................................................................................................', 0, 'L', 0, 0, '', '', true, 0);
		$this->Ln();
		$this->MultiCell($this->columnWidth[0] + $this->columnWidth[1], $columnWidth, 'หมายเหตุ', 0, 'L', 0, 0, '', '', true, 0);
		$this->Ln();
		$this->MultiCell($this->columnWidth[0] + $this->columnWidth[1], $columnWidth, '............................................................................................................................', 0, 'L', 0, 0, '', '', true, 0);
		$this->Ln();
		$this->Cell(array_sum($this->columnWidth), 0, '', 'T');
		$this->Ln();
		$this->SetFont('', 'B', 13);
		$this->MultiCell($this->columnWidth[0], $columnWidth, '', 0, 'C', 0, 0, '', '', true, 0);
		$this->MultiCell($this->columnWidth[1], $columnWidth, '', 0, 'C', 0, 0, '', '', true, 0);
		$this->MultiCell($this->columnWidth[2], $columnWidth, '', 0, 'C', 0, 0, '', '', true, 0);
		$this->MultiCell($this->columnWidth[3], $columnWidth, '', 0, 'C', 0, 0, '', '', true, 0);
		$this->MultiCell($this->columnWidth[4] + $this->columnWidth[5], $columnWidth, 'บจ.ธนพรอิเล็คทริค', 0, 'L', 0, 0, '', '', true, 0);
		$this->Ln();
		$this->MultiCell($this->columnWidth[0], $columnWidth, '', 0, 'C', 0, 0, '', '', true, 0);
		$this->MultiCell($this->columnWidth[1], $columnWidth, '', 0, 'C', 0, 0, '', '', true, 0);
		$this->MultiCell($this->columnWidth[2], $columnWidth, '', 0, 'C', 0, 0, '', '', true, 0);
		$this->MultiCell($this->columnWidth[3], $columnWidth, '', 0, 'C', 0, 0, '', '', true, 0);
		$this->MultiCell($this->columnWidth[4] + $this->columnWidth[5], $columnWidth, 'TanapondElectric Co,Ltd.', 0, 'L', 0, 0, '', '', true, 0);
		$this->Ln();
		$this->MultiCell($this->columnWidth[0], $columnWidth, '', 0, 'C', 0, 0, '', '', true, 0);
		$this->MultiCell($this->columnWidth[1], $columnWidth, '', 0, 'C', 0, 0, '', '', true, 0);
		$this->MultiCell($this->columnWidth[2], $columnWidth, '', 0, 'C', 0, 0, '', '', true, 0);
		$this->MultiCell($this->columnWidth[3], $columnWidth, '', 0, 'C', 0, 0, '', '', true, 0);
		$this->MultiCell($this->columnWidth[4] + $this->columnWidth[5], $columnWidth, 'By : ', 0, 'L', 0, 0, '', '', true, 0);
	}
	
	public function printRefAndDate($strDate, &$isAddYourRef, &$isAddDate, $customerDetailColumnHeight, $customerDetailBorder){
		if(!$isAddYourRef){
			$this->MultiCell(8, $customerDetailColumnHeight, '', $customerDetailBorder, 'L', 0, 0, '', '', true, 0);
			$this->MultiCell(12, $customerDetailColumnHeight, 'อ้างถึง', $customerDetailBorder, 'R', 0, 0, '', '', true, 0);
			$this->MultiCell(25, $customerDetailColumnHeight, '.........................', $customerDetailBorder, 'L', 0, 0, '', '', true, 0);
			$isAddYourRef = true;
		}
		
		if($isAddYourRef && !$isAddDate){
			$this->MultiCell(8, $customerDetailColumnHeight, '', $customerDetailBorder, 'L', 0, 0, '', '', true, 0);
			$this->MultiCell(12, $customerDetailColumnHeight, 'วันที่', $customerDetailBorder, 'R', 0, 0, '', '', true, 0);
			$this->MultiCell(25, $customerDetailColumnHeight, '..'.self::formatDateThai($strDate).'..', $customerDetailBorder, 'L', 0, 0, '', '', true, 0);
			$isAddDate = true;
		}
	}
	
	public static function formatDateThai($strDate){
		$dmy = explode("-", $strDate);
		$y = $dmy[0];
		$m = $dmy[1];
		$d = $dmy[2];
		return $d.'/'.$m.'/'.$y;
	}
}
?>