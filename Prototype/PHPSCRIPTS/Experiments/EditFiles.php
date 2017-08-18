<?php
// Include PHPExcel library and create its object

require_once dirname(__FILE__) . '/../Classes/PHPExcel.php';

// Load an existing spreadsheet template

$phpExcel = PHPExcel_IOFactory::load('RFS2016.xlsx');

// Get the first sheet

$sheet = $phpExcel ->getActiveSheet();

// Edit Cells for Individual

//Rack
$col = 1;
$value = 45;

while($col != 4){
    $row = 8;
    while($row != 10){
        $sheet -> setCellValueByColumnAndRow($col, $row, $value);
        $row++;
    }
    $col++;
}

//



//Edit Cells for Group



// We will create xlsx file (Excel 2007 and above)

$writer = PHPExcel_IOFactory::createWriter($phpExcel, "Excel2007");

// Save the spreadsheet: Filename should be dynamic

$writer->save('Results2016.xlsx');