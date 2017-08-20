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


//Initialize Segments
$segmentMap=
    [
        "1" => "RCK",
        "2" => "CORP",
        "3" => "CORPO",
        "4" => "INDO",
        "5" => "INDR",
        "6" => "PKG/PRM",
        "7" => "QD",
        "8" => "WSOL",
        "9" => "WSOF",
        "10" => "CON/ASSOC",
        "11" => "CORPM",
        "12" => "GOV/NG0",
        "13" => "GRPO",
        "14" => "GRPT",
    ];

//Create a Query for each segments
$sm_num = 1;
$segment_sheet = 0;

//Create a function

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

while($segment_sheet != 14){

    $sheet = $phpExcel ->setActiveSheetIndex($segment_sheet);

//Query the 3 subsegments

    $sql_rns = "select actual_rns from room_actual where seg_id in ( '$segmentMap[$sm_num]') and date between '2015-1-31' and '2016-12-31' ORDER BY DATE ASC ";
    $sql_arr = "select actual_arr from room_actual where seg_id in ( '$segmentMap[$sm_num]') and date between '2015-1-31' and '2016-12-31' ORDER BY DATE ASC ";
    $sql_actual_revenue = "select actual_revenue from room_actual where seg_id in ( '$segmentMap[$sm_num]') and date between '2015-1-31' and '2016-12-31' ORDER BY DATE ASC ";

//Insert Values from RNS

    subsegment($sql_rns,1,"actual_rns",$sheet,$conn);

//Insert Values from ARR

    subsegment($sql_arr,7,"actual_arr",$sheet,$conn);

//Insert Values from Actual_Revenue
    subsegment($sql_actual_revenue,13,"actual_revenue",$sheet,$conn);

//increment values to stop iteration
    $segment_sheet++;
    $sm_num++;

}
// We will create xlsx file (Excel 2007 and above)

$writer = PHPExcel_IOFactory::createWriter($phpExcel, "Excel2007");

// Save the spreadsheet: Filename should be dynamic

$writer->save('ForecastResult2017.xlsx');


