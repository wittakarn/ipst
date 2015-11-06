<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once("../config.php");
require_once(DOCUMENT_ROOT.'lib/tcpdf/tcpdf_config.php');
require_once(DOCUMENT_ROOT.'lib/tcpdf/tcpdf.php');
// extend TCPF with custom functions
class QuotDetailPDF extends TCPDF {


    // Colored table
    public function generateQuotationDetailTable($data) {
        // Colors, line width and bold font
        $this->SetFillColor(255, 0, 0);
        $this->SetTextColor(255);
        $this->SetDrawColor(128, 0, 0);
        $this->SetLineWidth(0.3);
        $this->SetFont('', 'B');
        
		$w = array(10, 80, 10, 20, 20, 20);
		// Header
		$this->Cell($w[0], 7, 'ลำดับ', 1, 0, 'C', 1);
		$this->Cell($w[1], 7, 'ชื่อสินค้า', 1, 0, 'C', 1);
		$this->Cell($w[2], 7, 'จำนวน', 1, 0, 'C', 1);
		$this->Cell($w[3], 7, 'หน่วย', 1, 0, 'C', 1);
		$this->Cell($w[4], 7, 'ราคา/หน่วย', 1, 0, 'C', 1);
		$this->Cell($w[5], 7, 'ราคารวม', 1, 0, 'C', 1);
		
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Data
        $fill = 0;
        foreach($data as $row) {
            $this->Cell($w[0], 6, $row['sequence'], 'LR', 0, 'L', $fill);
            $this->Cell($w[1], 6, $row['product_name'], 'LR', 0, 'L', $fill);
            $this->Cell($w[2], 6, number_format($row['quantity'], 1), 'LR', 0, 'R', $fill);
			$this->Cell($w[3], 6, $row['unit_name'], 'LR', 0, 'L', $fill);
            $this->Cell($w[4], 6, number_format($row['price'], 2), 'LR', 0, 'R', $fill);
			$this->Cell($w[5], 6, number_format($row['summary_price'], 2), 'LR', 0, 'R', $fill);
            $this->Ln();
            $fill=!$fill;
        }
        $this->Cell(array_sum($w), 0, '', 'T');
    }
}
?>