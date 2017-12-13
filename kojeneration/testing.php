<?php
$x = urlencode($_POST['response_id']);

session_start();
if ($_SESSION['status'] != 'logged-in') {
    header("Location: index.php");
} else {
    $_SESSION['api_token'] = "8cbe8639e1ea286f2e655c5e0be541ef2f0ada7907c185c849";
    $_SESSION['api_token_secret'] = "A9GzZ2qU53Xlc";
    $survey_id = strip_tags(trim($_POST['survey_id']));
	$response_list_url = "https://restapi.surveygizmo.com/v4/survey/" . $survey_id . "/surveyresponse?api_token=".$_SESSION['api_token']."&api_token_secret=".$_SESSION['api_token_secret'];
    $response_list_json = json_decode(file_get_contents($response_list_url), true);
    $response_data = $response_list_json['data'];
    $response_count = $response_list_json['total_count'];
}

//ENABLE PHP EXCEL EDITOR
require_once 'PHPExcel.php"';


//OPEN AND COPY ASSESSMENT TEMPLATE
$objReader = PHPExcel_IOFactory::createReader('Excel2007');
$objReader->setIncludeCharts(TRUE);
$objPHPExcel = $objReader->load('Conscious Success Report template.xlsx');


//MODIFY WITH CONTENTS FROM JSON FILE
$objPHPExcel->setActiveSheetIndex(14)
    ->setCellValue('E2', $response_data[$x-1]['[question(80)]'])
    ->setCellValue('F3', $response_data[$x-1]['[question(9)]'])
    ->setCellValue('G3' ,  $response_data[$x-1]['[question(10)]'])
    ->setCellValue('H3' ,  $response_data[$x-1]['[question(11)]'])
    ->setCellValue('I3' ,  $response_data[$x-1]['[question(12)]'])
    ->setCellValue('J3' ,  $response_data[$x-1]['[question(13)]'])
    ->setCellValue('K3' ,  $response_data[$x-1]['[question(14)]'])
    ->setCellValue('L3' ,  $response_data[$x-1]['[question(16)]'])
    ->setCellValue('M3' ,  $response_data[$x-1]['[question(17)]'])
    ->setCellValue('N3' ,  $response_data[$x-1]['[question(18)]'])
    ->setCellValue('O3' ,  $response_data[$x-1]['[question(19)]'])
    ->setCellValue('P3' ,  $response_data[$x-1]['[question(20)]'])
    ->setCellValue('Q3' ,  $response_data[$x-1]['[question(21)]'])
    ->setCellValue('R3' ,  $response_data[$x-1]['[question(23)]'])
    ->setCellValue('S3' ,  $response_data[$x-1]['[question(24)]'])
    ->setCellValue('T3' ,  $response_data[$x-1]['[question(25)]'])
    ->setCellValue('U3' ,  $response_data[$x-1]['[question(26)]'])
    ->setCellValue('V3' ,  $response_data[$x-1]['[question(27)]'])
    ->setCellValue('W3' ,  $response_data[$x-1]['[question(28)]'])
    ->setCellValue('X3' ,  $response_data[$x-1]['[question(30)]'])
    ->setCellValue('Y3' ,  $response_data[$x-1]['[question(31)]'])
    ->setCellValue('Z3' ,  $response_data[$x-1]['[question(32)]'])
    ->setCellValue('AA3' ,  $response_data[$x-1]['[question(33)]'])
    ->setCellValue('AB3' ,  $response_data[$x-1]['[question(34)]'])
    ->setCellValue('AC3' ,  $response_data[$x-1]['[question(35)]'])
    ->setCellValue('AD3' ,  $response_data[$x-1]['[question(37)]'])
    ->setCellValue('AE3' ,  $response_data[$x-1]['[question(38)]'])
    ->setCellValue('AF3' ,  $response_data[$x-1]['[question(39)]'])
    ->setCellValue('AG3' ,  $response_data[$x-1]['[question(40)]'])
    ->setCellValue('AH3' ,  $response_data[$x-1]['[question(41)]'])
    ->setCellValue('AI3' ,  $response_data[$x-1]['[question(42)]'])
    ->setCellValue('AJ3' ,  $response_data[$x-1]['[question(44)]'])
    ->setCellValue('AK3' ,  $response_data[$x-1]['[question(45)]'])
    ->setCellValue('AL3' ,  $response_data[$x-1]['[question(46)]'])
    ->setCellValue('AM3' ,  $response_data[$x-1]['[question(47)]'])
    ->setCellValue('AN3' ,  $response_data[$x-1]['[question(48)]'])
    ->setCellValue('AO3' ,  $response_data[$x-1]['[question(49)]'])
    ->setCellValue('AP3' ,  $response_data[$x-1]['[question(51)]'])
    ->setCellValue('AQ3' ,  $response_data[$x-1]['[question(52)]'])
    ->setCellValue('AR3' ,  $response_data[$x-1]['[question(53)]'])
    ->setCellValue('AS3' ,  $response_data[$x-1]['[question(54)]'])
    ->setCellValue('AT3' ,  $response_data[$x-1]['[question(55)]'])
    ->setCellValue('AU3' ,  $response_data[$x-1]['[question(56)]'])
    ->setCellValue('AV3' ,  $response_data[$x-1]['[question(58)]'])
    ->setCellValue('AW3' ,  $response_data[$x-1]['[question(59)]'])
    ->setCellValue('AX3' ,  $response_data[$x-1]['[question(60)]'])
    ->setCellValue('AY3' ,  $response_data[$x-1]['[question(61)]'])
    ->setCellValue('AZ3' ,  $response_data[$x-1]['[question(62)]'])
    ->setCellValue('BA3' ,  $response_data[$x-1]['[question(63)]'])
    ->setCellValue('BB3' ,  $response_data[$x-1]['[question(65)]'])
    ->setCellValue('BC3' ,  $response_data[$x-1]['[question(66)]'])
    ->setCellValue('BD3' ,  $response_data[$x-1]['[question(67)]'])
    ->setCellValue('BE3' ,  $response_data[$x-1]['[question(68)]'])
    ->setCellValue('BF3' ,  $response_data[$x-1]['[question(69)]'])
    ->setCellValue('BG3' ,  $response_data[$x-1]['[question(70)]']);



//$objPHPExcel->getSheetByName('Sheet 4')
 //   ->setSheetState(PHPExcel_Worksheet::SHEETSTATE_VERYHIDDEN);

//SAVE FILE TO FOLDER IN HTDOCS
//PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP);
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel , 'Excel2007');
$objWriter->setIncludeCharts(TRUE);

$objWriter->save('ExcelSheets/'.$response_data[$x-1]['[question(80)]'].'.xlsx');

header('Location: surveys.php');
?>