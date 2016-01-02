<?php
ini_set('display_errors', 1); 
error_reporting(E_ALL);
require_once("../config.php");
require_once(DOCUMENT_ROOT.'lib/tcpdf/tcpdf_config.php');
require_once(DOCUMENT_ROOT.'lib/tcpdf/tcpdf.php');
require_once(DOCUMENT_ROOT.'lib/SVGGraph2.20/SVGGraph.php');
// extend TCPF columnWidthith custom functions
class StatisticPDF extends TCPDF {
	
	public $titleHeader;
	public static $horizontalOfPie = 120;
	public static $radiantOfPie = 30;
	public static $horizontalPadding = 60;
	
	public static $svgSettings = array(
										'back_colour' => '#eee',  'stroke_colour' => '#000',
										'back_stroke_width' => 0, 'back_stroke_colour' => '#eee',
										'axis_colour' => '#333',  'axis_overlap' => 2,
										'axis_font' => 'Georgia', 'axis_font_size' => 16,
										'grid_colour' => '#666',  'label_colour' => '#000',
										'pad_right' => 20,        'pad_left' => 20,
										'link_base' => '/',       'link_target' => '_top',
										'minimum_grid_spacing' => 20
									  );

	//Page header
    public function Header() {
        // Set font
        $this->SetFont('', 'B', 20);
        // Title
        $this->Cell(0, 16, $this->titleHeader, 0, 2, 'C', 0, '', 0, false, 'M', 'B');
		
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
	
	public function generateSexOfParticipantStatistic($data, $verticalLength) {
		$xc = self::$horizontalOfPie;
        $yc = $verticalLength;
        $r = self::$radiantOfPie;
        
		if(isset($data) && $data != null){
			$allCount = $data['all_count'];
			$maleCount = $data['male_count'];
			$femaleCount = $data['female_count'];
			
			$maleCountPercent = static::generatePercent($maleCount, $allCount);
			$femaleCountPercent = 100 - $maleCountPercent;
			
			$maleCountDegree = static::generateDegree($maleCount, $allCount);
			$femaleCountDegree = 360 - $maleCountDegree;
			
			$this->SetFillColor(0, 0, 255);
			$this->PieSector($xc, $yc, $r, 0, $maleCountDegree, 'FD', false, 0, 2);
			
			$this->SetFillColor(0, 255, 0);
			$this->PieSector($xc, $yc, $r, $maleCountDegree, $maleCountDegree + $femaleCountDegree, 'FD', false, 0, 2);
			
			$maleResult = 'ชาย : '.$maleCount.' คน คิดเป็น : '.$maleCountPercent.' %';
			$femaleResult = 'หญิง : '.$femaleCount.' คน คิดเป็น : '.$femaleCountPercent.' %';
			
			$this->SetFillColor(0, 0, 255);
			$fill = 1;
			$this->MultiCell(5, 5, '', 1, 'L', $fill, 0, '', '', true, 0);
			$fill = 0;
			$this->MultiCell(0, 0, $maleResult, '', 'L', $fill, 0, '', '', true, 0);
			
			$this->Ln();
			$this->Ln();
			
			$this->SetFillColor(0, 255, 0);
			$fill = 1;
			$this->MultiCell(5, 5, '', 1, 'L', $fill, 0, '', '', true, 0);
			$fill = 0;
			$this->MultiCell(0, 0, $femaleResult, '', 'L', $fill, 0, '', '', true, 0);
			
			$this->Ln(self::$horizontalPadding);
		}
	}

	public function generateTeacherDegreeStatistic($data, $verticalLength) {
		$xc = self::$horizontalOfPie;
        $yc = $verticalLength;
        $r = self::$radiantOfPie;
        
		if(isset($data) && $data != null){
			$allCount = $data['all_count'];
			$degree1Count = $data['1_count'];
			$degree2Count = $data['2_count'];
			$degree3Count = $data['3_count'];
			$degree4Count = $data['4_count'];
			
			$degree1Percent = static::generatePercent($degree1Count, $allCount);
			$degree2Percent = static::generatePercent($degree2Count, $allCount);
			$degree3Percent = static::generatePercent($degree3Count, $allCount);
			$degree4Percent = 100 - $degree1Percent - $degree2Percent - $degree3Percent;
			
			$degree1Degree = static::generateDegree($degree1Count, $allCount);
			$degree2Degree = static::generateDegree($degree2Count, $allCount);
			$degree3Degree = static::generateDegree($degree3Count, $allCount);
			$degree4Degree = 360 - $degree1Degree - $degree2Degree - $degree3Degree;
			
			$this->SetFillColor(0, 0, 255);
			$this->PieSector($xc, $yc, $r, 0, $degree1Degree, 'FD', false, 0, 2);
			
			$degree2Degree += $degree1Degree;
			
			$this->SetFillColor(0, 255, 0);
			$this->PieSector($xc, $yc, $r, $degree1Degree, $degree2Degree, 'FD', false, 0, 2);
			
			$degree3Degree += $degree2Degree;
			
			$this->SetFillColor(255, 0, 0);
			$this->PieSector($xc, $yc, $r, $degree2Degree, $degree3Degree, 'FD', false, 0, 2);
			
			$degree4Degree += $degree3Degree;
			
			$this->SetFillColor(240, 80, 240);
			$this->PieSector($xc, $yc, $r, $degree3Degree, $degree4Degree, 'FD', false, 0, 2);
			
			$degree1Result = 'ต่ำกว่าปริญญาตรี : '.$degree1Count.' คน คิดเป็น : '.$degree1Percent.' %';
			$degree2Result = 'ปริญญาตรี : '.$degree2Count.' คน คิดเป็น : '.$degree2Percent.' %';
			$degree3Result = 'ปริญญาโท : '.$degree3Count.' คน คิดเป็น : '.$degree3Percent.' %';
			$degree4Result = 'ปริญญาเอก : '.$degree4Count.' คน คิดเป็น : '.$degree4Percent.' %';
			
			$this->SetFillColor(0, 0, 255);
			$fill = 1;
			$this->MultiCell(5, 5, '', 1, 'L', $fill, 0, '', '', true, 0);
			$fill = 0;
			$this->MultiCell(0, 0, $degree1Result, '', 'L', $fill, 0, '', '', true, 0);
			
			$this->Ln();
			$this->Ln();
			
			$this->SetFillColor(0, 255, 0);
			$fill = 1;
			$this->MultiCell(5, 5, '', 1, 'L', $fill, 0, '', '', true, 0);
			$fill = 0;
			$this->MultiCell(0, 0, $degree2Result, '', 'L', $fill, 0, '', '', true, 0);
			
			$this->Ln();
			$this->Ln();
			
			$this->SetFillColor(255, 0, 0);
			$fill = 1;
			$this->MultiCell(5, 5, '', 1, 'L', $fill, 0, '', '', true, 0);
			$fill = 0;
			$this->MultiCell(0, 0, $degree3Result, '', 'L', $fill, 0, '', '', true, 0);
			
			$this->Ln();
			$this->Ln();
			
			$this->SetFillColor(240, 80, 240);
			$fill = 1;
			$this->MultiCell(5, 5, '', 1, 'L', $fill, 0, '', '', true, 0);
			$fill = 0;
			$this->MultiCell(0, 0, $degree4Result, '', 'L', $fill, 0, '', '', true, 0);
			
			$this->Ln(self::$horizontalPadding);
		}
	}
	
	public function generateTeacherSubjectStatistic($data, $verticalLength) {
		$xc = self::$horizontalOfPie;
        $yc = $verticalLength;
        $r = self::$radiantOfPie;
        
		if(isset($data) && $data != null){
			$allCount = $data['all_count'];
			$scienceCount = $data['s_count'];
			$mathCount = $data['m_count'];
			$technologyCount = $data['t_count'];
			$designCount = $data['d_count'];
			
			$sciencePercent = static::generatePercent($scienceCount, $allCount);
			$mathPercent = static::generatePercent($mathCount, $allCount);
			$technologyPercent = static::generatePercent($technologyCount, $allCount);
			$designPercent = static::generatePercent($designCount, $allCount);
			
			$scienceResult = 'สอนวิทยาศาสตร์ : '.$scienceCount.' คน คิดเป็น : '.$sciencePercent.' %';
			$mathResult = 'สอนคณิตศาสตร์ : '.$mathCount.' คน คิดเป็น : '.$mathPercent.' %';
			$technologyResult = 'สอนเทคโนโลยี : '.$technologyCount.' คน คิดเป็น : '.$technologyPercent.' %';
			$designResult = 'สอนออกแบบ : '.$designCount.' คน คิดเป็น : '.$designPercent.' %';
			
			$colours = array('#0000FF', '#00FF00', '#FF0000', '#F050F0');
			$graph = new SVGGraph(400, 300, self::$svgSettings);
			$graph->colours = $colours;
			 
			$values = array('วิทยศาสตร์' => $sciencePercent, 'คณิตศาสตร์' => $mathPercent, 'เทคโนโลยี' => $technologyPercent, 'ออกแบบ' => $designPercent);
			 
			$graph->Values($values);
			$outputSvg = $graph->fetch('BarGraph');
			
			$this->ImageSVG('@'.$outputSvg, $x=80, $y=180, $w='', $h='', $link='', $align='', $palign='', $border=0, $fitonpage=false);
			
			$this->SetFillColor(0, 0, 255);
			$fill = 1;
			$this->MultiCell(5, 5, '', 1, 'L', $fill, 0, '', '', true, 0);
			$fill = 0;
			$this->MultiCell(0, 0, $scienceResult, '', 'L', $fill, 0, '', '', true, 0);
			
			$this->Ln();
			$this->Ln();
			
			$this->SetFillColor(0, 255, 0);
			$fill = 1;
			$this->MultiCell(5, 5, '', 1, 'L', $fill, 0, '', '', true, 0);
			$fill = 0;
			$this->MultiCell(0, 0, $mathResult, '', 'L', $fill, 0, '', '', true, 0);
			
			$this->Ln();
			$this->Ln();
			
			$this->SetFillColor(255, 0, 0);
			$fill = 1;
			$this->MultiCell(5, 5, '', 1, 'L', $fill, 0, '', '', true, 0);
			$fill = 0;
			$this->MultiCell(0, 0, $technologyResult, '', 'L', $fill, 0, '', '', true, 0);
			
			$this->Ln();
			$this->Ln();
			
			$this->SetFillColor(240, 80, 240);
			$fill = 1;
			$this->MultiCell(5, 5, '', 1, 'L', $fill, 0, '', '', true, 0);
			$fill = 0;
			$this->MultiCell(0, 0, $designResult, '', 'L', $fill, 0, '', '', true, 0);
			
			$this->Ln(self::$horizontalPadding);
		}
	}
	
	public static function generatePercent($count, $total){
		return round(($count * 100) / $total, 2);
	}
	
	public static function generateDegree($count, $total){
		return round(($count * 360) / $total, 2);
	}
}
?>