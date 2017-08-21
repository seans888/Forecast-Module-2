<?php
/**
 * Created by PhpStorm.
 * User: Jade_Ericson
 * Date: 8/22/2017
 * Time: 2:34 AM
 */

require_once("../PHPExcel-1.8/Classes/PHPExcel.php");

$phpExcel = PHPExcel_IOFactory::load('Forecast Results 3M-JAN17.xlsx');
$sheet1 = $phpExcel ->setActiveSheetIndex(0);
echo $forecastrns = $sheet1->getCell('G4')->getFormattedValue();