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

$phpExcel = PHPExcel_IOFactory::load('ForecastTemplate2.xlsx');

function subsegment($sql_rns, $y, $sub, $sheet, $conn){
    $result = $conn->query($sql_rns);
    $x = 2;
    while($row = $result->fetch_assoc()){
        $value = $row[$sub];
        $sheet -> setCellValueByColumnAndRow($y, $x, $value);
        $x++;
    }
    $x = $x - 1;
    $sheet -> setCellValueByColumnAndRow($y + 1, $x, $value);
    $sheet -> setCellValueByColumnAndRow($y + 2, $x, $value);
    $sheet -> setCellValueByColumnAndRow($y + 3, $x, $value);
}

$sql_date = "select date from room_actual where seg_id = \"rck\" order by date asc";

$sql_value = "select ACTUAL_RNS from room_actual where seg_id = \"rck\" order by date asc";

$sheet = $phpExcel ->setActiveSheetIndex();

function insert_values($data,$y,$query,$conn,$sheet){
    $result = $conn->query($query);
    $x = 2;
    while($row = $result->fetch_assoc()){
        $value = $row[$data];
        $sheet -> setCellValueByColumnAndRow($y, $x, $value);
        $x++;
    }
}
$result = $conn->query($sql_date);
$x = 2;
while($row = $result->fetch_assoc()){
    $value = $row["date"];
    $sheet -> setCellValueByColumnAndRow(1, $x, $value);
    $x++;
}

$result = $conn->query($sql_value);
$x = 2;
while($row = $result->fetch_assoc()){
    $value = $row["ACTUAL_RNS"];
    $sheet -> setCellValueByColumnAndRow(2, $x, $value);
    $x++;
}




// We will create xlsx file (Excel 2007 and above)

$writer = PHPExcel_IOFactory::createWriter($phpExcel, "Excel2007");

// Save the spreadsheet: Filename should be dynamic

$writer->save('ForecastResult2017.xlsx');