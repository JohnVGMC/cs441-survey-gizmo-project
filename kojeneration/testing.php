<?php
require_once 'PHPExcel.php"';

$objReader = PHPExcel_IOFactory::createReader('Excel2007');
$objReader->setIncludeCharts(TRUE);
$objPHPExcel = $objReader->load('Conscious Success Report template.xlsx');


$objPHPExcel->setActiveSheetIndex(14)
    ->setCellValue('F3', 1)
    ->setCellValue('G3' , 2 );

PHPExcel_Settings::setZipClass(PHPExcel_Settings::PCLZIP);
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel , 'Excel2007');
$objWriter->setIncludeCharts(TRUE);
$objWriter->save('ExcelSheets/testsda.xlsx');

?>