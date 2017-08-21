<?php
/**
 * Created by PhpStorm.
 * User: Jade_Ericson
 * Date: 8/21/2017
 * Time: 5:51 PM
 */

require_once("../PHPExcel-1.8/Classes/PHPExcel.php");
$phpExcel = PHPExcel_IOFactory::load('calc.xlsx');
$sheet=$phpExcel->getActiveSheet();
$value = '=SUM(A1:A10)';

$sheet -> setCellValueByColumnAndRow(0, 12, $value);

$objWriter = PHPExcel_IOFactory::createWriter($phpExcel, 'Excel2007');
$objWriter->save('calc1.xlsx');

