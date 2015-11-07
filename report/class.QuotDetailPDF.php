<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once("../config.php");
require_once(DOCUMENT_ROOT.'lib/tcpdf/tcpdf_config.php');
require_once(DOCUMENT_ROOT.'lib/tcpdf/tcpdf.php');
// extend TCPF columnWidthith custom functions
class QuotDetailPDF extends TCPDF {

	public $columnWidth = array(10, 80, 20, 20, 25, 25);

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
        $this->SetY(-15);
        // Set font
        $this->SetFont('', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
	
	public function generateCustomer($customerData) {
		$this->SetFont('', '', 14);
		$customerDetailheight = 10;
		$customerDetailBorder = 0;
		$customerDetailColumnHeight = 5;
		
		$this->MultiCell(30, 12, 'นามลูกค้า'."\n".'CUSTOMER', $customerDetailBorder, 'L', 0, 0, '', '', true, 0);
		$this->MultiCell(100, 12, $customerData['customer_name'], $customerDetailBorder, 'L', 0, 0, '', '', true, 0);
		$customerDetailheight = $customerDetailheight + 12;
		$this->Ln();
		
		$customerAddress = $customerData['address'];
		if($customerAddress != null && $customerAddress != ''){
			$this->MultiCell(30, $customerDetailColumnHeight, '', $customerDetailBorder, 'L', 0, 0, '', '', true, 0);
			$this->MultiCell(100, $customerDetailColumnHeight, $customerAddress, $customerDetailBorder, 'L', 0, 0, '', '', true, 0);
			$customerDetailheight = $customerDetailheight + $customerDetailColumnHeight;
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
			$this->Ln();
		}
		
		$customerContact = $customerData['contact'];
		if($customerContact != null && $customerContact != ''){
			$this->MultiCell(30, $customerDetailColumnHeight, '', $customerDetailBorder, 'L', 0, 0, '', '', true, 0);
			$this->MultiCell(100, $customerDetailColumnHeight, $customerContact, $customerDetailBorder, 'L', 0, 0, '', '', true, 0);
			$customerDetailheight = $customerDetailheight + $customerDetailColumnHeight;
			$this->Ln();
		}
		
		$customerEmail = $customerData['email'];
		if($customerEmail != null && $customerEmail != ''){
			$this->MultiCell(30, $customerDetailColumnHeight, '', $customerDetailBorder, 'L', 0, 0, '', '', true, 0);
			$this->MultiCell(100, $customerDetailColumnHeight, $customerEmail, $customerDetailBorder, 'L', 0, 0, '', '', true, 0);
			$customerDetailheight = $customerDetailheight + $customerDetailColumnHeight;
			$this->Ln();
		}
		
		$this->Ln();

		// add rectangle
		$this->RoundedRect(15, 25, 100, $customerDetailheight, 3.50, '1111');
	}

    // Colored table
    public function generateQuotationDetailTable($data) {
        // Colors, line columnWidthidth and bold font
        //$this->SetFillColor(255, 0, 0);
        //$this->SetTextColor(255);
        //$this->SetDracolumnWidthColor(128, 0, 0);
        $this->SetLineWidth(0.3);
        $this->SetFont('', 'B', 12);
		
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
            $this->MultiCell($this->columnWidth[0], 6, $rocolumnWidth['sequence'], 'LRB', 'L', $fill, 0, '', '', true, 0);
            $this->MultiCell($this->columnWidth[1], 6, $rocolumnWidth['product_name'], 'LRB', 'L', $fill, 0, '', '', true, 0);
            $this->MultiCell($this->columnWidth[2], 6, number_format($rocolumnWidth['quantity'], 1), 'LRB', 'R', $fill, 0, '', '', true, 0);
			$this->MultiCell($this->columnWidth[3], 6, $rocolumnWidth['unit_name'], 'LRB', 'L', $fill, 0, '', '', true, 0);
            $this->MultiCell($this->columnWidth[4], 6, number_format($rocolumnWidth['price'], 2), 'LRB', 'R', $fill, 0, '', '', true, 0);
			$this->MultiCell($this->columnWidth[5], 6, number_format($rocolumnWidth['summary_price'], 2), 'LRB', 'R', $fill, 0, '', '', true, 0);
            $this->Ln();
        }
		
		
        //$this->Cell(array_sum($this->columnWidth), 0, '', 'T');
    }
	
	public function generateQuotationDetailTableFooter($footerData) {
		$this->SetFont('', 'B', 12);
		$this->MultiCell($this->columnWidth[0], 6, '', 0, 'C', 0, 0, '', '', true, 0);
		$this->MultiCell($this->columnWidth[1], 6, '', 0, 'C', 0, 0, '', '', true, 0);
		$this->MultiCell($this->columnWidth[2], 6, '', 0, 'C', 0, 0, '', '', true, 0);
		$this->MultiCell($this->columnWidth[3], 6, '', 0, 'C', 0, 0, '', '', true, 0);
		$this->MultiCell($this->columnWidth[4], 6, '', 0, 'C', 0, 0, '', '', true, 0);
		$this->MultiCell($this->columnWidth[5], 6, number_format($footerData['total_price'], 2), 'LRB', 'R', 0, 0, '', '', true, 0);
		$this->Ln();
		
		$this->MultiCell($this->columnWidth[0], 6, '', 0, 'C', 0, 0, '', '', true, 0);
		$this->MultiCell($this->columnWidth[1], 6, '', 0, 'C', 0, 0, '', '', true, 0);
		$this->MultiCell($this->columnWidth[2], 6, '', 0, 'C', 0, 0, '', '', true, 0);
		$this->MultiCell($this->columnWidth[3], 6, '', 0, 'C', 0, 0, '', '', true, 0);
		$this->MultiCell($this->columnWidth[4], 6, '', 0, 'C', 0, 0, '', '', true, 0);
		$this->MultiCell($this->columnWidth[5], 6, number_format($footerData['vat_price'], 2), 'LRB', 'R', 0, 0, '', '', true, 0);
		$this->Ln();
		
		$this->MultiCell($this->columnWidth[0], 6, '', 0, 'C', 0, 0, '', '', true, 0);
		$this->MultiCell($this->columnWidth[1], 6, '', 0, 'C', 0, 0, '', '', true, 0);
		$this->MultiCell($this->columnWidth[2], 6, '', 0, 'C', 0, 0, '', '', true, 0);
		$this->MultiCell($this->columnWidth[3], 6, '', 0, 'C', 0, 0, '', '', true, 0);
		$this->MultiCell($this->columnWidth[4], 6, '', 0, 'C', 0, 0, '', '', true, 0);
		$this->MultiCell($this->columnWidth[5], 6, number_format($footerData['net_price'], 2), 'LRB', 'R', 0, 0, '', '', true, 0);
		$this->Ln();
	}
}
?>