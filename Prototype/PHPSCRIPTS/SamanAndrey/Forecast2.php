<?php
//Connection details
$host="localhost";
$user='root';
$pass='';
$db="rfsa";
//Make a connection profile
$conn = new mysqli($host,$user,$pass,$db); //An instance of a new mysqli database connection

//prepare the PHPExcel

// Include PHPExcel library and create its object

require_once dirname(__FILE__) . '/Classes/PHPExcel.php';

// Load an existing spreadsheet template

$phpExcel = PHPExcel_IOFactory::load('ForecastTemplate.xlsx');

// Get the first sheet

$sheet = $phpExcel ->getActiveSheet();

//Read Date and put them into an array

$sql = "select actual_rns from room_actual where seg_id in ( 'RCK') and date between '2015-1-31' and '2016-12-31' ORDER BY DATE ASC ";

$result = $conn->query($sql);

$x = 2;
while($row = $result->fetch_assoc()){
    $value = $row["actual_rns"];
    $sheet -> setCellValueByColumnAndRow(1, $x, $value);
    $x++;
}
$x = $x - 1;
$sheet -> setCellValueByColumnAndRow(2, $x, $value);
$sheet -> setCellValueByColumnAndRow(3, $x, $value);
$sheet -> setCellValueByColumnAndRow(4, $x, $value);


// We will create xlsx file (Excel 2007 and above)

$writer = PHPExcel_IOFactory::createWriter($phpExcel, "Excel2007");

// Save the spreadsheet: Filename should be dynamic

$writer->save('ForecastResult2017.xlsx');


