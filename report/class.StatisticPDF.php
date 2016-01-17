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
	public static $horizontalPadding = 55;
	public static $svgGraphPadding = 45;
	public static $horizontalOfBarGraph = 80;
	
	public static $svgSettings = array(
										'back_colour' => '#eee',  'stroke_colour' => '#000',
										'back_stroke_width' => 0, 'back_stroke_colour' => '#eee',
										'axis_colour' => '#333',  'axis_overlap' => 2,
										'axis_font' => 'thsarabun', 'axis_font_size' => 16,
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
			$this->SetFont('', 'B', 16);
			$fill = 0;
			$this->MultiCell(0, 0, 'สถิติ ชาย : หญิง', '', 'L', $fill, 0, '', '', true, 0);
			$this->SetFont('', '', 12);
			$this->Ln();
			
			$allCount = $data['all_count'];
			$maleCount = $data['male_count'];
			$femaleCount = $data['female_count'];
			
			$maleCountPercent = static::generatePercent($maleCount, $allCount);
			$femaleCountPercent = self::getRemainResult(100, $maleCountPercent);
			
			$maleCountDegree = static::generateDegree($maleCount, $allCount);
			$femaleCountDegree = self::getRemainResult(360, $maleCountDegree);
			
			$this->SetFillColor(0, 0, 255);
			$this->PieSector($xc, $yc, $r, 0, $maleCountDegree, 'FD', false, 0, 2);
			
			$this->SetFillColor(0, 255, 0);
			$this->PieSector($xc, $yc, $r, $maleCountDegree, $maleCountDegree + $femaleCountDegree, 'FD', false, 0, 2);
			
			$maleResult = 'ชาย : '.$maleCount.' คน จาก '.$allCount.' คน คิดเป็น : '.$maleCountPercent.' %';
			$femaleResult = 'หญิง : '.$femaleCount.' คน จาก '.$allCount.' คน คิดเป็น : '.$femaleCountPercent.' %';
			
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
			$this->SetFont('', 'B', 16);
			$fill = 0;
			$this->MultiCell(0, 0, 'สถิติการศีกษา', '', 'L', $fill, 0, '', '', true, 0);
			$this->SetFont('', '', 12);
			$this->Ln();
			
			$allCount = $data['all_count'];
			$degree1Count = $data['1_count'];
			$degree2Count = $data['2_count'];
			$degree3Count = $data['3_count'];
			$degree4Count = $data['4_count'];
			
			$degree1Percent = static::generatePercent($degree1Count, $allCount);
			$degree2Percent = static::generatePercent($degree2Count, $allCount);
			$degree3Percent = static::generatePercent($degree3Count, $allCount);
			$degree4Percent = self::getRemainResult(100, $degree1Percent + $degree2Percent + $degree3Percent);
			
			$degree1Degree = static::generateDegree($degree1Count, $allCount);
			$degree2Degree = static::generateDegree($degree2Count, $allCount);
			$degree3Degree = static::generateDegree($degree3Count, $allCount);
			$degree4Degree = self::getRemainResult(360, $degree1Degree + $degree2Degree + $degree3Degree);
			
			$this->SetFillColor(0, 0, 255);
			$this->PieSector($xc, $yc, $r, 0, $degree1Degree, 'FD', false, 0, 2);
			
			$degree2Degree += $degree1Degree;
			
			$this->SetFillColor(0, 255, 0);
			$this->PieSector($xc, $yc, $r, $degree1Degree, $degree2Degree, 'FD', false, 0, 2);
			
			$degree3Degree += $degree2Degree;
			
			$this->SetFillColor(255, 0, 0);
			$this->PieSector($xc, $yc, $r, $degree2Degree, $degree3Degree, 'FD', false, 0, 2);
			
			$degree4Degree += $degree3Degree;
			
			$this->SetFillColor(255, 0, 255);
			$this->PieSector($xc, $yc, $r, $degree3Degree, $degree4Degree, 'FD', false, 0, 2);
			
			$degree1Result = 'ต่ำกว่าปริญญาตรี : '.$degree1Count.' คน จาก '.$allCount.' คน คิดเป็น : '.$degree1Percent.' %';
			$degree2Result = 'ปริญญาตรี : '.$degree2Count.' คน จาก '.$allCount.' คน คิดเป็น : '.$degree2Percent.' %';
			$degree3Result = 'ปริญญาโท : '.$degree3Count.' คน จาก '.$allCount.' คน คิดเป็น : '.$degree3Percent.' %';
			$degree4Result = 'ปริญญาเอก : '.$degree4Count.' คน จาก '.$allCount.' คน คิดเป็น : '.$degree4Percent.' %';
			
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
			
			$this->SetFillColor(255, 0, 255);
			$fill = 1;
			$this->MultiCell(5, 5, '', 1, 'L', $fill, 0, '', '', true, 0);
			$fill = 0;
			$this->MultiCell(0, 0, $degree4Result, '', 'L', $fill, 0, '', '', true, 0);
			
			$this->Ln(self::$horizontalPadding);
		}
	}
	
	public function generateStudentDegreeStatistic($data, $verticalLength) {
		$xc = self::$horizontalOfPie;
        $yc = $verticalLength;
        $r = self::$radiantOfPie;
        
		if(isset($data) && $data != null){
			$this->SetFont('', 'B', 16);
			$fill = 0;
			$this->MultiCell(0, 0, 'สถิติการศีกษา', '', 'L', $fill, 0, '', '', true, 0);
			$this->SetFont('', '', 12);
			$this->Ln();
			
			$allCount = $data['all_count'];
			$degree1Count = $data['1_count'];
			$degree2Count = $data['2_count'];
			$degree3Count = $data['3_count'];
			$degree4Count = $data['4_count'];
			$degree5Count = $data['5_count'];
			$degree6Count = $data['6_count'];
			$degree7Count = $data['7_count'];
			$degree8Count = $data['8_count'];
			$degree9Count = $data['9_count'];
			$degree10Count = $data['10_count'];
			$degree11Count = $data['11_count'];
			$degree12Count = $data['12_count'];
			
			$degree1Percent = static::generatePercent($degree1Count, $allCount);
			$degree2Percent = static::generatePercent($degree2Count, $allCount);
			$degree3Percent = static::generatePercent($degree3Count, $allCount);
			$degree4Percent = static::generatePercent($degree4Count, $allCount);
			$degree5Percent = static::generatePercent($degree5Count, $allCount);
			$degree6Percent = static::generatePercent($degree6Count, $allCount);
			$degree7Percent = static::generatePercent($degree7Count, $allCount);
			$degree8Percent = static::generatePercent($degree8Count, $allCount);
			$degree9Percent = static::generatePercent($degree9Count, $allCount);
			$degree10Percent = static::generatePercent($degree10Count, $allCount);
			$degree11Percent = static::generatePercent($degree11Count, $allCount);
			$degree12Percent = self::getRemainResult(100, $degree1Percent + $degree2Percent + $degree3Percent + $degree4Percent + $degree5Percent + $degree6Percent + $degree7Percent + $degree8Percent + $degree9Percent + $degree10Percent + $degree11Percent);
			
			$degree1Degree = static::generateDegree($degree1Count, $allCount);
			$degree2Degree = static::generateDegree($degree2Count, $allCount);
			$degree3Degree = static::generateDegree($degree3Count, $allCount);
			$degree4Degree = static::generateDegree($degree4Count, $allCount);
			$degree5Degree = static::generateDegree($degree5Count, $allCount);
			$degree6Degree = static::generateDegree($degree6Count, $allCount);
			$degree7Degree = static::generateDegree($degree7Count, $allCount);
			$degree8Degree = static::generateDegree($degree8Count, $allCount);
			$degree9Degree = static::generateDegree($degree9Count, $allCount);
			$degree10Degree = static::generateDegree($degree10Count, $allCount);
			$degree11Degree = static::generateDegree($degree11Count, $allCount);
			$degree12Degree = self::getRemainResult(360, $degree1Degree + $degree2Degree + $degree3Degree + $degree4Degree + $degree5Degree + $degree6Degree + $degree7Degree + $degree8Degree + $degree9Degree + $degree10Degree + $degree11Degree);
			
			$this->SetFillColor(0, 0, 255);
			$this->PieSector($xc, $yc, $r, 0, $degree1Degree, 'FD', false, 0, 2);
			
			$degree2Degree += $degree1Degree;
			
			$this->SetFillColor(255, 0, 255);
			$this->PieSector($xc, $yc, $r, $degree1Degree, $degree2Degree, 'FD', false, 0, 2);
			
			$degree3Degree += $degree2Degree;
			
			$this->SetFillColor(255, 0, 128);
			$this->PieSector($xc, $yc, $r, $degree2Degree, $degree3Degree, 'FD', false, 0, 2);
			
			$degree4Degree += $degree3Degree;
			
			$this->SetFillColor(0, 128, 255);
			$this->PieSector($xc, $yc, $r, $degree3Degree, $degree4Degree, 'FD', false, 0, 2);
			
			$degree5Degree += $degree4Degree;
			
			$this->SetFillColor(61, 61, 255);
			$this->PieSector($xc, $yc, $r, $degree4Degree, $degree5Degree, 'FD', false, 0, 2);
			
			$degree6Degree += $degree5Degree;
			
			$this->SetFillColor(255, 0, 0);
			$this->PieSector($xc, $yc, $r, $degree5Degree, $degree6Degree, 'FD', false, 0, 2);
			
			$degree7Degree += $degree6Degree;
			
			$this->SetFillColor(0, 255, 255);
			$this->PieSector($xc, $yc, $r, $degree6Degree, $degree7Degree, 'FD', false, 0, 2);
			
			$degree8Degree += $degree7Degree;
			
			$this->SetFillColor(255, 255, 112);
			$this->PieSector($xc, $yc, $r, $degree7Degree, $degree8Degree, 'FD', false, 0, 2);
			
			$degree9Degree += $degree8Degree;
			
			$this->SetFillColor(255, 128, 0);
			$this->PieSector($xc, $yc, $r, $degree8Degree, $degree9Degree, 'FD', false, 0, 2);
			
			$degree10Degree += $degree9Degree;
			
			$this->SetFillColor(0, 255, 128);
			$this->PieSector($xc, $yc, $r, $degree9Degree, $degree10Degree, 'FD', false, 0, 2);
			
			$degree11Degree += $degree10Degree;
			
			$this->SetFillColor(128, 255, 0);
			$this->PieSector($xc, $yc, $r, $degree10Degree, $degree11Degree, 'FD', false, 0, 2);
			
			$degree12Degree += $degree11Degree;
			
			$this->SetFillColor(255, 255, 0);
			$this->PieSector($xc, $yc, $r, $degree11Degree, $degree12Degree, 'FD', false, 0, 2);
			
			$degree1Result = 'ป.1 : '.$degree1Count.' คน จาก '.$allCount.' คน คิดเป็น : '.$degree1Percent.' %';
			$degree2Result = 'ป.2 : '.$degree2Count.' คน จาก '.$allCount.' คน คิดเป็น : '.$degree2Percent.' %';
			$degree3Result = 'ป.3 : '.$degree3Count.' คน จาก '.$allCount.' คน คิดเป็น : '.$degree3Percent.' %';
			$degree4Result = 'ป.4 : '.$degree4Count.' คน จาก '.$allCount.' คน คิดเป็น : '.$degree4Percent.' %';
			$degree5Result = 'ป.5 : '.$degree5Count.' คน จาก '.$allCount.' คน คิดเป็น : '.$degree5Percent.' %';
			$degree6Result = 'ป.6 : '.$degree6Count.' คน จาก '.$allCount.' คน คิดเป็น : '.$degree6Percent.' %';
			$degree7Result = 'ม.1 : '.$degree7Count.' คน จาก '.$allCount.' คน คิดเป็น : '.$degree7Percent.' %';
			$degree8Result = 'ม.2 : '.$degree8Count.' คน จาก '.$allCount.' คน คิดเป็น : '.$degree8Percent.' %';
			$degree9Result = 'ม.3 : '.$degree9Count.' คน จาก '.$allCount.' คน คิดเป็น : '.$degree9Percent.' %';
			$degree10Result = 'ม.4 : '.$degree10Count.' คน จาก '.$allCount.' คน คิดเป็น : '.$degree10Percent.' %';
			$degree11Result = 'ม.5 : '.$degree11Count.' คน จาก '.$allCount.' คน คิดเป็น : '.$degree11Percent.' %';
			$degree12Result = 'ม.6 : '.$degree12Count.' คน จาก '.$allCount.' คน คิดเป็น : '.$degree12Percent.' %';
			
			$this->SetFillColor(0, 0, 255);
			$fill = 1;
			$this->MultiCell(5, 5, '', 1, 'L', $fill, 0, '', '', true, 0);
			$fill = 0;
			$this->MultiCell(0, 0, $degree1Result, '', 'L', $fill, 0, '', '', true, 0);
			
			$this->Ln();
			
			$this->SetFillColor(255, 0, 255);
			$fill = 1;
			$this->MultiCell(5, 5, '', 1, 'L', $fill, 0, '', '', true, 0);
			$fill = 0;
			$this->MultiCell(0, 0, $degree2Result, '', 'L', $fill, 0, '', '', true, 0);
			
			$this->Ln();
			
			$this->SetFillColor(255, 0, 128);
			$fill = 1;
			$this->MultiCell(5, 5, '', 1, 'L', $fill, 0, '', '', true, 0);
			$fill = 0;
			$this->MultiCell(0, 0, $degree3Result, '', 'L', $fill, 0, '', '', true, 0);
			
			$this->Ln();
			
			$this->SetFillColor(0, 128, 255);
			$fill = 1;
			$this->MultiCell(5, 5, '', 1, 'L', $fill, 0, '', '', true, 0);
			$fill = 0;
			$this->MultiCell(0, 0, $degree4Result, '', 'L', $fill, 0, '', '', true, 0);
			
			$this->Ln();
			
			$this->SetFillColor(61, 61, 255);
			$fill = 1;
			$this->MultiCell(5, 5, '', 1, 'L', $fill, 0, '', '', true, 0);
			$fill = 0;
			$this->MultiCell(0, 0, $degree5Result, '', 'L', $fill, 0, '', '', true, 0);
			
			$this->Ln();
			
			$this->SetFillColor(255, 0, 0);
			$fill = 1;
			$this->MultiCell(5, 5, '', 1, 'L', $fill, 0, '', '', true, 0);
			$fill = 0;
			$this->MultiCell(0, 0, $degree6Result, '', 'L', $fill, 0, '', '', true, 0);
			
			$this->Ln();
			
			$this->SetFillColor(0, 255, 255);
			$fill = 1;
			$this->MultiCell(5, 5, '', 1, 'L', $fill, 0, '', '', true, 0);
			$fill = 0;
			$this->MultiCell(0, 0, $degree7Result, '', 'L', $fill, 0, '', '', true, 0);
			
			$this->Ln();
			
			$this->SetFillColor(255, 255, 112);
			$fill = 1;
			$this->MultiCell(5, 5, '', 1, 'L', $fill, 0, '', '', true, 0);
			$fill = 0;
			$this->MultiCell(0, 0, $degree8Result, '', 'L', $fill, 0, '', '', true, 0);
			
			$this->Ln();
			
			$this->SetFillColor(255, 128, 0);
			$fill = 1;
			$this->MultiCell(5, 5, '', 1, 'L', $fill, 0, '', '', true, 0);
			$fill = 0;
			$this->MultiCell(0, 0, $degree9Result, '', 'L', $fill, 0, '', '', true, 0);
			
			$this->Ln();
			
			$this->SetFillColor(0, 255, 128);
			$fill = 1;
			$this->MultiCell(5, 5, '', 1, 'L', $fill, 0, '', '', true, 0);
			$fill = 0;
			$this->MultiCell(0, 0, $degree10Result, '', 'L', $fill, 0, '', '', true, 0);
			
			$this->Ln();
			
			$this->SetFillColor(128, 255, 0);
			$fill = 1;
			$this->MultiCell(5, 5, '', 1, 'L', $fill, 0, '', '', true, 0);
			$fill = 0;
			$this->MultiCell(0, 0, $degree11Result, '', 'L', $fill, 0, '', '', true, 0);
			
			$this->Ln();
			
			$this->SetFillColor(255, 255, 0);
			$fill = 1;
			$this->MultiCell(5, 5, '', 1, 'L', $fill, 0, '', '', true, 0);
			$fill = 0;
			$this->MultiCell(0, 0, $degree12Result, '', 'L', $fill, 0, '', '', true, 0);
			
			$this->Ln(self::$horizontalPadding);
		}
	}
	
	public function generateTeacherSubjectStatistic($data, $verticalLength) {
		$xc = self::$horizontalOfPie;
        $yc = $verticalLength;
        $r = self::$radiantOfPie;
        
		if(isset($data) && $data != null){
			$this->SetFont('', 'B', 16);
			$fill = 0;
			$this->MultiCell(0, 0, 'สถิติวิชาที่สอน', '', 'L', $fill, 0, '', '', true, 0);
			$this->SetFont('', '', 12);
			$this->Ln();
			
			$allCount = $data['all_count'];
			$scienceCount = $data['s_count'];
			$mathCount = $data['m_count'];
			$technologyCount = $data['t_count'];
			$designCount = $data['d_count'];
			
			$sciencePercent = static::generatePercent($scienceCount, $allCount);
			$mathPercent = static::generatePercent($mathCount, $allCount);
			$technologyPercent = static::generatePercent($technologyCount, $allCount);
			$designPercent = static::generatePercent($designCount, $allCount);
			
			$scienceResult = 'สอนวิทยาศาสตร์ : '.$scienceCount.' คน จาก '.$allCount.' คน คิดเป็น : '.$sciencePercent.' %';
			$mathResult = 'สอนคณิตศาสตร์ : '.$mathCount.' คน จาก '.$allCount.' คน คิดเป็น : '.$mathPercent.' %';
			$technologyResult = 'สอนเทคโนโลยี : '.$technologyCount.' คน จาก '.$allCount.' คน คิดเป็น : '.$technologyPercent.' %';
			$designResult = 'สอนออกแบบ : '.$designCount.' คน จาก '.$allCount.' คน คิดเป็น : '.$designPercent.' %';
			
			$colours = array('#0000FF', '#00FF00', '#FF0000', '#FF00FF');
			$graph = new SVGGraph(400, 300, self::$svgSettings);
			$graph->colours = $colours;
			 
			$values = array('วิทยศาสตร์' => $sciencePercent, 'คณิตศาสตร์' => $mathPercent, 'เทคโนโลยี' => $technologyPercent, 'ออกแบบ' => $designPercent);
			 
			$graph->Values($values);
			$outputSvg = $graph->fetch('BarGraph');
			
			$this->ImageSVG('@'.$outputSvg, $x=self::$horizontalOfBarGraph, $y=$verticalLength - self::$svgGraphPadding, $w='', $h='', $link='', $align='', $palign='', $border=0, $fitonpage=false);
			
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
			
			$this->SetFillColor(255, 0, 255);
			$fill = 1;
			$this->MultiCell(5, 5, '', 1, 'L', $fill, 0, '', '', true, 0);
			$fill = 0;
			$this->MultiCell(0, 0, $designResult, '', 'L', $fill, 0, '', '', true, 0);
			
			$this->Ln(self::$horizontalPadding);
		}
	}
	
	public function generateTeacherSchoolUnderStatistic($data, $verticalLength) {
		$xc = self::$horizontalOfPie;
        $yc = $verticalLength;
        $r = self::$radiantOfPie;
        
		if(isset($data) && $data != null){
			$this->SetFont('', 'B', 16);
			$fill = 0;
			$this->MultiCell(0, 0, 'สถิติสังกัดโรงเรียน', '', 'L', $fill, 0, '', '', true, 0);
			$this->SetFont('', '', 12);
			$this->Ln();
			
			$allCount = self::convertNullToZero($data['all_count']);
			$degree1Count = self::convertNullToZero($data['1_count']);
			$degree2Count = self::convertNullToZero($data['2_count']);
			$degree3Count = self::convertNullToZero($data['3_count']);
			$degree4Count = self::convertNullToZero($data['4_count']);
			$degree5Count = self::convertNullToZero($data['5_count']);
			$degree6Count = self::convertNullToZero($data['6_count']);
			$degree7Count = self::convertNullToZero($data['7_count']);
			$degree8Count = self::convertNullToZero($data['8_count']);
			
			$degree1Percent = static::generatePercent($degree1Count, $allCount);
			$degree2Percent = static::generatePercent($degree2Count, $allCount);
			$degree3Percent = static::generatePercent($degree3Count, $allCount);
			$degree4Percent = static::generatePercent($degree4Count, $allCount);
			$degree5Percent = static::generatePercent($degree5Count, $allCount);
			$degree6Percent = static::generatePercent($degree6Count, $allCount);
			$degree7Percent = static::generatePercent($degree7Count, $allCount);
			$degree8Percent = static::generatePercent($degree8Count, $allCount);
			
			$degree1Result = 'สพป. : '.$degree1Count.' คน จาก '.$allCount.' คน คิดเป็น : '.$degree1Percent.' %';
			$degree2Result = 'สพม. : '.$degree2Count.' คน จาก '.$allCount.' คน คิดเป็น : '.$degree2Percent.' %';
			$degree3Result = 'สช. : '.$degree3Count.' คน จาก '.$allCount.' คน คิดเป็น : '.$degree3Percent.' %';
			$degree4Result = 'สกอ. : '.$degree4Count.' คน จาก '.$allCount.' คน คิดเป็น : '.$degree4Percent.' %';
			$degree5Result = 'กรุงเทพมหานคร : '.$degree5Count.' คน จาก '.$allCount.' คน คิดเป็น : '.$degree5Percent.' %';
			$degree6Result = 'อบจ. : '.$degree6Count.' คน จาก '.$allCount.' คน คิดเป็น : '.$degree6Percent.' %';
			$degree7Result = 'เทศบาล : '.$degree7Count.' คน จาก '.$allCount.' คน คิดเป็น : '.$degree7Percent.' %';
			$degree8Result = 'อื่นๆ : '.$degree8Count.' คน จาก '.$allCount.' คน คิดเป็น : '.$degree8Percent.' %';
			
			$colours = array('#0000FF', '#FF00FF', '#FF0080', '#0080FF', '#FF0000', '#00FFFF', '#FFFF7A', '#FF8000');
			$graph = new SVGGraph(450, 330, self::$svgSettings);
			$graph->colours = $colours;
			 
			$values = array('สพป.' => $degree1Percent, 'สพม.' => $degree2Percent, 'สช.' => $degree3Percent, 'สกอ.' => $degree4Percent, 'กทม.' => $degree5Percent, 'อบจ.' => $degree6Percent, 'เทศบาล' => $degree7Percent, 'อื่นๆ' => $degree8Percent);
			 
			$graph->Values($values);
			$outputSvg = $graph->fetch('BarGraph');
			
			$this->ImageSVG('@'.$outputSvg, $x=self::$horizontalOfBarGraph, $y=$verticalLength - self::$svgGraphPadding, $w='', $h='', $link='', $align='', $palign='', $border=0, $fitonpage=false);
			
			$this->SetFillColor(0, 0, 255);
			$fill = 1;
			$this->MultiCell(5, 5, '', 1, 'L', $fill, 0, '', '', true, 0);
			$fill = 0;
			$this->MultiCell(0, 0, $degree1Result, '', 'L', $fill, 0, '', '', true, 0);
			
			$this->Ln();
			$this->Ln();
			
			$this->SetFillColor(255, 0, 255);
			$fill = 1;
			$this->MultiCell(5, 5, '', 1, 'L', $fill, 0, '', '', true, 0);
			$fill = 0;
			$this->MultiCell(0, 0, $degree2Result, '', 'L', $fill, 0, '', '', true, 0);
			
			$this->Ln();
			$this->Ln();
			
			$this->SetFillColor(255, 0, 128);
			$fill = 1;
			$this->MultiCell(5, 5, '', 1, 'L', $fill, 0, '', '', true, 0);
			$fill = 0;
			$this->MultiCell(0, 0, $degree3Result, '', 'L', $fill, 0, '', '', true, 0);
			
			$this->Ln();
			$this->Ln();
			
			$this->SetFillColor(0, 128, 255);
			$fill = 1;
			$this->MultiCell(5, 5, '', 1, 'L', $fill, 0, '', '', true, 0);
			$fill = 0;
			$this->MultiCell(0, 0, $degree4Result, '', 'L', $fill, 0, '', '', true, 0);
			
			$this->Ln();
			$this->Ln();
			
			$this->SetFillColor(255, 0, 0);
			$fill = 1;
			$this->MultiCell(5, 5, '', 1, 'L', $fill, 0, '', '', true, 0);
			$fill = 0;
			$this->MultiCell(0, 0, $degree5Result, '', 'L', $fill, 0, '', '', true, 0);
			
			$this->Ln();
			$this->Ln();
			
			$this->SetFillColor(0, 255, 255);
			$fill = 1;
			$this->MultiCell(5, 5, '', 1, 'L', $fill, 0, '', '', true, 0);
			$fill = 0;
			$this->MultiCell(0, 0, $degree6Result, '', 'L', $fill, 0, '', '', true, 0);
			
			$this->Ln();
			$this->Ln();
			
			$this->SetFillColor(255, 255, 112);
			$fill = 1;
			$this->MultiCell(5, 5, '', 1, 'L', $fill, 0, '', '', true, 0);
			$fill = 0;
			$this->MultiCell(0, 0, $degree7Result, '', 'L', $fill, 0, '', '', true, 0);
			
			$this->Ln();
			$this->Ln();
			
			$this->SetFillColor(255, 128, 0);
			$fill = 1;
			$this->MultiCell(5, 5, '', 1, 'L', $fill, 0, '', '', true, 0);
			$fill = 0;
			$this->MultiCell(0, 0, $degree8Result, '', 'L', $fill, 0, '', '', true, 0);
			
			$this->Ln(self::$horizontalPadding);
		}
	}
	
	public function generateSatisfyStatistic($data, $verticalLength) {
		$xc = self::$horizontalOfPie;
        $yc = $verticalLength;
        $r = self::$radiantOfPie;
		
		/*
		 *
		 *	#0000FF=0.0.255
		 *	#FF00FF=255.0.255
		 *	#FF0080=255.0.128
		 *	#0080FF=0.128.255
		 *	#FF0000=255.0.0
		 *	#00FFFF=0.255.255
		 *	#FFFF7A=255.255.122
		 *	#FF8000=255.128.0
		 *	
		 */
        
		if(isset($data) && $data != null){
			$this->Ln(60);
			$this->SetFont('', 'B', 16);
			$fill = 0;
			$this->MultiCell(0, 0, 'สถิติของความพึ่งพอใจในการใช้หนังสือเรียน', '', 'L', $fill, 0, '', '', true, 0);
			$this->SetFont('', '', 12);
			$this->Ln();
			
			$allCount = self::convertNullToZero($data['all_count']);
			$degree1Count = self::convertNullToZero($data['1_count']);
			$degree2Count = self::convertNullToZero($data['2_count']);
			$degree3Count = self::convertNullToZero($data['3_count']);
			$degree4Count = self::convertNullToZero($data['4_count']);
			$degree5Count = self::convertNullToZero($data['5_count']);
			
			$degree1Percent = static::generatePercent($degree1Count, $allCount);
			$degree2Percent = static::generatePercent($degree2Count, $allCount);
			$degree3Percent = static::generatePercent($degree3Count, $allCount);
			$degree4Percent = static::generatePercent($degree4Count, $allCount);
			$degree5Percent = static::generatePercent($degree5Count, $allCount);
			
			$degree1Result = '1 หนังสือเรียนมีคู่มือหรือคำแนะนำสำหรับครูในการจัดการเรียนรู้ : '.$degree1Count.' คน จาก '.$allCount.' คน คิดเป็น : '.$degree1Percent.' %';
			$degree2Result = '2 หนังสือเรียนมีคำแนะนำสำหรับนักเรียนในการเรียนรู้ด้วยตนเอง. : '.$degree2Count.' คน จาก '.$allCount.' คน คิดเป็น : '.$degree2Percent.' %';
			$degree3Result = '3 หนังสือเรียนช่วยสร้างความสนใจในการเรียนรู้ของนักเรียน : '.$degree3Count.' คน จาก '.$allCount.' คน คิดเป็น : '.$degree3Percent.' %';
			$degree4Result = '4 หนังสือเรียนมีเทคนิคและรูปแบบการนำเสนอที่น่าสนใจ : '.$degree4Count.' คน จาก '.$allCount.' คน คิดเป็น : '.$degree4Percent.' %';
			$degree5Result = '5 อื่นๆ : '.$degree5Count.' คน จาก '.$allCount.' คน คิดเป็น : '.$degree5Percent.' %';
			
			$colours = array('#0000FF', '#FF00FF', '#FF0080', '#0080FF', '#FF0000');
			$graph = new SVGGraph(550, 350, self::$svgSettings);
			$graph->colours = $colours;
			 
			$values = array('1' => $degree1Percent, '2' => $degree2Percent, '3' => $degree3Percent, '4' => $degree4Percent, '5' => $degree5Percent);
			 
			$graph->Values($values);
			$outputSvg = $graph->fetch('BarGraph');
			
			$this->ImageSVG('@'.$outputSvg, $x=20, $y=$verticalLength - self::$svgGraphPadding, $w='', $h='', $link='', $align='', $palign='', $border=0, $fitonpage=false);
			
			$this->SetFillColor(0, 0, 255);
			$fill = 1;
			$this->MultiCell(5, 5, '', 1, 'L', $fill, 0, '', '', true, 0);
			$fill = 0;
			$this->MultiCell(0, 0, $degree1Result, '', 'L', $fill, 0, '', '', true, 0);
			
			$this->Ln();
			$this->Ln();
			
			$this->SetFillColor(255, 0, 255);
			$fill = 1;
			$this->MultiCell(5, 5, '', 1, 'L', $fill, 0, '', '', true, 0);
			$fill = 0;
			$this->MultiCell(0, 0, $degree2Result, '', 'L', $fill, 0, '', '', true, 0);
			
			$this->Ln();
			$this->Ln();
			
			$this->SetFillColor(255, 0, 128);
			$fill = 1;
			$this->MultiCell(5, 5, '', 1, 'L', $fill, 0, '', '', true, 0);
			$fill = 0;
			$this->MultiCell(0, 0, $degree3Result, '', 'L', $fill, 0, '', '', true, 0);
			
			$this->Ln();
			$this->Ln();
			
			$this->SetFillColor(0, 128, 255);
			$fill = 1;
			$this->MultiCell(5, 5, '', 1, 'L', $fill, 0, '', '', true, 0);
			$fill = 0;
			$this->MultiCell(0, 0, $degree4Result, '', 'L', $fill, 0, '', '', true, 0);
			
			$this->Ln();
			$this->Ln();
			
			$this->SetFillColor(255, 0, 0);
			$fill = 1;
			$this->MultiCell(5, 5, '', 1, 'L', $fill, 0, '', '', true, 0);
			$fill = 0;
			$this->MultiCell(0, 0, $degree5Result, '', 'L', $fill, 0, '', '', true, 0);
			
			$this->Ln(self::$horizontalPadding);
		}
	}
	
	// Colored table
    public function statisticTable($titleTable, $header,$data) {
		
		$this->SetFont('', 'B', 16);
		$this->Cell(0, 14, $titleTable, 0, 2, 'C', 0, '', 0, false, 'B', 'C');
		
        // Colors, line width and bold font
        $this->SetFillColor(255, 0, 0);
        $this->SetTextColor(255);
        $this->SetDrawColor(128, 0, 0);
        $this->SetLineWidth(0.3);
        $this->SetFont('', 'B');
        // Header
        $w = array(80, 20, 20, 20, 20, 20);
        $num_headers = count($header);
        for($i = 0; $i < $num_headers; ++$i) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
        }
		
        // Color and font restoration
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('', '', 12);
        // Data
        $fill = 0;
		
		$bookName;
		$participantBookUsage;
		$participantBookSatisfy;
		$usage;
		$notUsage;
		$like;
		$indifferent;
		$dislike;
		$pos = 0;
		
		$bookName = array_keys($data);
		
		$this->Ln();
		
		$fill=!$fill;
		$this->Cell($w[0], 6, substr($bookName[0], 11), 'LR', 0, 'L', $fill);
		$dataSize = count($data);
        foreach($data as $key => $value) {
			
			if($pos > 0 && $pos % 5 == 0){
				
				$usage = self::convertNullToZero($temp[0]);
				$notUsage = self::convertNullToZero($temp[1]);
				$like = self::convertNullToZero($temp[2]);
				$indifferent = self::convertNullToZero($temp[3]);
				$dislike = self::convertNullToZero($temp[4]);
				
				$participantBookUsage = $usage + $notUsage;
				$participantBookSatisfy = $like + $indifferent + $dislike;
				
				$this->Cell($w[1], 6, $usage . ':' . $participantBookUsage . ' = ' . self::generatePercent($usage, $participantBookUsage).'%', 'LR', 0, 'R', $fill);
				$this->Cell($w[2], 6, $notUsage . ':' . $participantBookUsage . ' = ' . self::generatePercent($notUsage, $participantBookUsage).'%', 'LR', 0, 'R', $fill);
				$this->Cell($w[3], 6, $like . ':' . $participantBookSatisfy . ' = ' . self::generatePercent($like, $participantBookSatisfy).'%', 'LR', 0, 'R', $fill);
				$this->Cell($w[4], 6, $indifferent . ':' . $participantBookSatisfy . ' = ' . self::generatePercent($indifferent, $participantBookSatisfy).'%', 'LR', 0, 'R', $fill);
				$this->Cell($w[5], 6, $dislike . ':' . $participantBookSatisfy . ' = ' . self::generatePercent($dislike, $participantBookSatisfy).'%', 'LR', 0, 'R', $fill);
				
				$this->Ln();
				$fill=!$fill;
				
				$borderStyle = 'LR';
				if($dataSize - 5 === $pos){
					$borderStyle = 'LRB';
				}
				
				$this->Cell($w[0], 6, substr($key, 11), $borderStyle, 0, 'L', $fill);
			}
            
            $temp[$pos % 5] = $value;
			
			$pos++;
        }
		
		$usage = self::convertNullToZero($temp[0]);
		$notUsage = self::convertNullToZero($temp[1]);
		$like = self::convertNullToZero($temp[2]);
		$indifferent = self::convertNullToZero($temp[3]);
		$dislike = self::convertNullToZero($temp[4]);
		
		$participantBookUsage = $usage + $notUsage;
		$participantBookSatisfy = $like + $indifferent + $dislike;
		
		$this->Cell($w[1], 6, $usage . ':' . $participantBookUsage . ' = ' . self::generatePercent($usage, $participantBookUsage).'%', 'LRB', 0, 'R', $fill);
		$this->Cell($w[2], 6, $notUsage . ':' . $participantBookUsage . ' = ' . self::generatePercent($notUsage, $participantBookUsage).'%', 'LRB', 0, 'R', $fill);
		$this->Cell($w[3], 6, $like . ':' . $participantBookSatisfy . ' = ' . self::generatePercent($like, $participantBookSatisfy).'%', 'LRB', 0, 'R', $fill);
		$this->Cell($w[4], 6, $indifferent . ':' . $participantBookSatisfy . ' = ' . self::generatePercent($indifferent, $participantBookSatisfy).'%', 'LRB', 0, 'R', $fill);
		$this->Cell($w[5], 6, $dislike . ':' . $participantBookSatisfy . ' = ' . self::generatePercent($dislike, $participantBookSatisfy).'%', 'LRB', 0, 'R', $fill);
		
		$this->Ln();
		$fill=!$fill;
    }
	
	public static function generatePercent($count, $total){
		$percent = 0;
		
		if($total > 0){
			$percent = round(($count * 100) / $total, 2);
		}
		
		return $percent;
	}
	
	public static function generateDegree($count, $total){
		$degree = 0;
		
		if($total > 0){
			$degree = round(($count * 360) / $total, 2);
		}
		
		return $degree;
	}
	
	public static function getRemainResult($total, $theRest){
		$resultVal = $total - $theRest;
		if($resultVal < 0){
			$resultVal = 0;
		}
		
		return $resultVal;
	}
	
	public static function convertNullToZero($data){
		$convertVal = $data;
		if(!isset($data) || $data == null){
			$convertVal = 0;
		}
		return $convertVal;
	}
}
?>