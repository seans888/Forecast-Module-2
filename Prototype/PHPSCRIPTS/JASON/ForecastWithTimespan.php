<?php
/**
 * Created by PhpStorm.
 * User: Jade_Ericson
 * Date: 8/21/2017
 * Time: 5:51 PM
 */

//IMPORT PHPEXCEL
require_once("../PHPExcel-1.8/Classes/PHPExcel.php");

//LOAD EXCEL TEMPLATE
$phpExcel = PHPExcel_IOFactory::load('ForecastTemplate.xlsx');
$sheet = $phpExcel ->setActiveSheetIndex();

//Connection details
$host="localhost";
$user='root';
$pass='';
$db="rfsa";

//Make a connection profile
$conn = new mysqli($host,$user,$pass,$db); //An instance of a new mysqli database connection

//check post
if( isset($_POST['selectTimeSpan']) )
{
    $timeSpan = $_POST['selectTimeSpan'];
}

//insert dates on excel
$date_query = "select date from(select * from room_actual where seg_id='rck' order by date desc limit $timeSpan) sub order by date asc;";
$result = $conn->query($date_query);
$x = 2;
while($row = $result->fetch_assoc()){
    $value = changeDashToComma($row["date"]);
    $sheet -> setCellValueByColumnAndRow(0, $x, '=DATE('.$value.')');
    $sheet -> setCellValueByColumnAndRow(5, 2, '=EOMONTH(DATE('.$value.'),1)');
    $x++;
}

//insert room nights sold on excel
$rns_query = "select ACTUAL_RNS from(select * from room_actual where seg_id='rck' order by date desc limit $timeSpan) sub order by date asc;";
$result = $conn->query($rns_query);
$x = 2;
while($row = $result->fetch_assoc()){
    $value = $row["ACTUAL_RNS"];
    $sheet -> setCellValueByColumnAndRow(1, $x, $value);
    $x++;
}

//insert average room rate on excel
$rns_query = "select ACTUAL_ARR from(select * from room_actual where seg_id='rck' order by date desc limit $timeSpan) sub order by date asc;";
$result = $conn->query($rns_query);
$x = 2;
while($row = $result->fetch_assoc()){
    $value = $row["ACTUAL_ARR"];
    $sheet -> setCellValueByColumnAndRow(2, $x, $value);
    $x++;
}

//insert revenue on excel
$rns_query = "select ACTUAL_REVENUE from(select * from room_actual where seg_id='rck' order by date desc limit $timeSpan) sub order by date asc;";
$result = $conn->query($rns_query);
$x = 2;
while($row = $result->fetch_assoc()){
    $value = $row["ACTUAL_REVENUE"];
    $sheet -> setCellValueByColumnAndRow(3, $x, $value);
    $x++;
}

//add defined names to new excel
$endofrange = $timeSpan+1;
$phpExcel->addNamedRange(new PHPExcel_NamedRange('timeline', $sheet, 'A2:A'.$endofrange));
$phpExcel->addNamedRange(new PHPExcel_NamedRange('rns', $sheet, 'B2:B'.$endofrange));
$phpExcel->addNamedRange(new PHPExcel_NamedRange('arr', $sheet, 'C2:C'.$endofrange));
$phpExcel->addNamedRange(new PHPExcel_NamedRange('rev', $sheet, 'D2:D'.$endofrange));


//functions
function changeDashToComma($date)
{
    $date = str_replace("-",",",$date);
    return $date;
}
function getMonthOnly($date){
    $date = substr($date,0,3);
    return $date;
}
function getYearOnly($date){
    $date = substr($date,-2);
    $year = (int) $date;
    return $year;
}

//hashmap for next month
$nextMonth =
    [
        "JAN" => "FEB",
        "FEB" =>"MAR",
        "MAR" =>"APR",
        "APR" =>"MAY",
        "MAY" =>"JUN",
        "JUN" =>"JUL",
        "JUL" =>"AUG",
        "AUG" =>"SEPT",
        "SEP" =>"OCT",
        "OCT" =>"NOV",
        "NOV" =>"DEC",
        "DEC" =>"JAN"
    ];

//get next month based on hashmap
$query = "select ACTUAL_ID from room_actual where seg_id='rck' order by date desc limit 1";
$result = $conn->query($query);
$row = $result->fetch_assoc();
echo $lastmonth = getMonthOnly($row["ACTUAL_ID"]);
$forecastYear = getYearOnly($row["ACTUAL_ID"]);
$forecastMonth = $nextMonth[$lastmonth];
if($lastmonth = "DEC"){
   echo $forecastYear = $forecastYear+1;
}

//save new excel file
$writer = PHPExcel_IOFactory::createWriter($phpExcel, "Excel2007");
$writer->save('ForecastResult2017.xlsx');