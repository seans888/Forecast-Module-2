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

while($segment_sheet != 14){

    $sheet = $phpExcel ->setActiveSheetIndex($segment_sheet);

//Query the 3 subsegments

$sql_rns = "select actual_rns from room_actual where seg_id in ( '$segmentMap[$sm_num]') and date between '2015-1-31' and '2016-12-31' ORDER BY DATE ASC ";
$sql_arr = "select actual_arr from room_actual where seg_id in ( '$segmentMap[$sm_num]') and date between '2015-1-31' and '2016-12-31' ORDER BY DATE ASC ";
$sql_actual_revenue = "select actual_revenue from room_actual where seg_id in ( '$segmentMap[$sm_num]') and date between '2015-1-31' and '2016-12-31' ORDER BY DATE ASC ";

//Insert Values from RNS
$result = $conn->query($sql_rns);
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

//Insert Values from ARR
$result = $conn->query($sql_arr);
$x = 2;
while($row = $result->fetch_assoc()){
    $value = $row["actual_arr"];
    $sheet -> setCellValueByColumnAndRow(7, $x, $value);
    $x++;
}
$x = $x - 1;
$sheet -> setCellValueByColumnAndRow(8, $x, $value);
$sheet -> setCellValueByColumnAndRow(9, $x, $value);
$sheet -> setCellValueByColumnAndRow(10, $x, $value);

//Insert Values from Actual_Revenue
$result = $conn->query($sql_actual_revenue);
$x = 2;
while($row = $result->fetch_assoc()){
    $value = $row["actual_revenue"];
    $sheet -> setCellValueByColumnAndRow(13, $x, $value);
    $x++;
}
$x = $x - 1;
$sheet -> setCellValueByColumnAndRow(14, $x, $value);
$sheet -> setCellValueByColumnAndRow(15, $x, $value);
$sheet -> setCellValueByColumnAndRow(16, $x, $value);

//increment values to stop iteration
    $segment_sheet++;
    $sm_num++;

}
// We will create xlsx file (Excel 2007 and above)

$writer = PHPExcel_IOFactory::createWriter($phpExcel, "Excel2007");

// Save the spreadsheet: Filename should be dynamic

$writer->save('ForecastResult2017.xlsx');


