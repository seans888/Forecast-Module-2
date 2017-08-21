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

$sql_date = "select date from room_actual where seg_id = \"rck\" order by date DESC ";

$sql_value = "select ACTUAL_RNS from room_actual where seg_id = \"rck\" order by date asc";

$sheet = $phpExcel ->getActiveSheet();

/*function insert_values($string,$string2,$query,$query2,$conn,$sheet){
    $result = $conn->query($query);
    $result2 = $conn->query($query2);
    while($row = $result->fetch_assoc() && $row = $result2->fetch_assoc()){
        $value = $row[$string];
        $value2 = $row[$string2];
        $sheet -> setCellValueByColumnAndRow(1, 2, $value);
        $sheet -> setCellValueByColumnAndRow(2, 2, $value2);
        $sheet -> insertNewRowBefore(2,1);
    }
}*/
function removeComma($number)
{
    $number = str_replace("-",",",$number);
    return $number;
}


$result = $conn->query($sql_date);
$result2 = $conn->query($sql_value);
//$x = 2;
while($row = $result->fetch_assoc()){
    $value = removeComma($row["date"]);
    $sheet -> setCellValueByColumnAndRow(1, 2, '=DATE('.$value.')');
    $value = $row["ACTUAL_RNS"];
    $sheet -> setCellValueByColumnAndRow(2, 2, $value2);
    //$x++;
    $sheet -> insertNewRowBefore(2,1);
}

//$sheet -> setCellValueByColumnAndRow(1, $x, '=EOMONTH(DATE('.$value.'),1)');
/*$result = $conn->query($sql_value);
$x = 2;
while($row = $result->fetch_assoc()){
    $value = $row["ACTUAL_RNS"];
    $sheet -> setCellValueByColumnAndRow(2, $x, $value);
    $x++;
}*/


// We will create xlsx file (Excel 2007 and above)

$writer = PHPExcel_IOFactory::createWriter($phpExcel, "Excel2007");
//$writer->setPreCalculateFormulas(true);
// Save the spreadsheet: Filename should be dynamic

$writer->save('ForecastResult2017.xlsx');