<?php
/**
 * Created by PhpStorm.
 * User: Jade_Ericson
 * Date: 8/22/2017
 * Time: 4:57 AM
 */
/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

define('EOL', (PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

/** Include PHPExcel */
require_once("../PHPExcel-1.8/Classes/PHPExcel.php");


// Create new PHPExcel object
echo date('H:i:s') , " Create new PHPExcel object" , EOL;
$objPHPExcel = PHPExcel_IOFactory::load('Forecast Results 3M-JAN17.xlsx');

// Add some data
echo date('H:i:s') , " Add some data" , EOL;
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1', 5)
    ->setCellValue('B1', 6)
    ->setCellValue('C1', "=A1-B1");

// Rename worksheet
echo date('H:i:s') , " Rename worksheet" , EOL;
$objPHPExcel->getActiveSheet()->setTitle('Simple');


function testFormula($sheet,$cell) {
    $formulaValue = $sheet->getCell($cell)->getValue();
    echo 'Formula Value is' , $formulaValue , PHP_EOL;
    $expectedValue = $sheet->getCell($cell)->getOldCalculatedValue();
    echo 'Expected Value is '  ,
    ((!is_null($expectedValue)) ?
        $expectedValue :
        'UNKNOWN'
    ) ,
    PHP_EOL;

    $calculate = false;
    try {
        $tokens = PHPExcel_Calculation::getInstance(
            $sheet->getParent()
        )->parseFormula(
            $formulaValue,
            $sheet->getCell($cell)
        );
        echo 'Parser Stack :-' , PHP_EOL;
        print_r($tokens);
        echo PHP_EOL;
        $calculate = true;
    } catch (Exception $e) {
        echo 'PARSER ERROR: ' , $e->getMessage() , PHP_EOL;

        echo 'Parser Stack :-' , PHP_EOL;
        print_r($tokens);
        echo PHP_EOL;
    }

    if ($calculate) {
        PHPExcel_Calculation::getInstance(
            $sheet->getParent()
        )->getDebugLog()
            ->setWriteDebugLog(true);
        try {
            $cellValue = $sheet->getCell($cell)->getCalculatedValue();
            echo 'Calculated Value is ' , $cellValue , PHP_EOL;

            echo 'Evaluation Log:' , PHP_EOL;
            print_r(
                PHPExcel_Calculation::getInstance(
                    $sheet->getParent()
                )->getDebugLog()
                    ->getLog()
            );
            echo PHP_EOL;
        } catch (Exception $e) {
            echo 'CALCULATION ENGINE ERROR: ' , $e->getMessage() , PHP_EOL;

            echo 'Evaluation Log:' , PHP_EOL;
            print_r(
                PHPExcel_Calculation::getInstance(
                    $sheet->getParent()
                )->getDebugLog()
                    ->getLog()
            );
            echo PHP_EOL;
        }
    }
}


$sheet = $objPHPExcel->getActiveSheet();
testFormula($sheet,'G2');