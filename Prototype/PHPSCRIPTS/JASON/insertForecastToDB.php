<?php
/**
 * Created by PhpStorm.
 * User: Jade_Ericson
 * Date: 8/20/2017
 * Time: 11:55 PM
 */

//extend PHPExcel Library
require_once("../PHPExcel-1.8/Classes/PHPExcel.php");

//Establish DB Connection
$host="localhost";
$user="root";
$pass="";
$database="rfsa";

$conn = new mysqli($host,$user,$pass,$database);

//array for subsegments
$individual = array('RCK','CORP','CORPO','PKG/PRM','WSOL','WSOF','INDO','INDR');
$group = array('CORPM','CON/ASSOC','GOV/NGO','GRPT','GRPO');

//loads saved forecast from drey's method.
$phpExcel = PHPExcel_IOFactory::load('ForecastResult2017.xlsx');

//query
function query($query,$conn){
    if($conn -> query($query) === FALSE)
    {
        echo "QUERY FAILED at " . $query;
        echo "<br/>";
    }
    else
    {
        echo $query . " SUCCESS";
        echo nl2br("\n");
    }
}

//insert individual
for($ss=0;$ss<8;$ss++){
    $sheet = $phpExcel ->setActiveSheetIndex($ss);

    $excel_arr = $sheet->toArray(null,true,true,false);
    $id = $sheet[25][0];
    $subsegment =  $sheet->getTitle();
    $date = $date = date('Y-m-d'); //today's date


    $query1 = "insert ignore into room_forecast values('$id','$subsegment','$date',$forecastrns,$forecastarr,$forecastrev)";
    $query2 = "insert ignore into room_forecast values('$id','$subsegment','$date',$forecastrns,$forecastarr,$forecastrev)";
    $query3 = "insert ignore into room_forecast values('$id','$subsegment','$date',$forecastrns,$forecastarr,$forecastrev)";
    query($query1,$conn);
    query($query2,$conn);
    query($query3,$conn);
}

//insert group
for($ss=8;$ss<13;$ss++){
    $sheet = $phpExcel ->setActiveSheetIndex($ss);

    $excel_arr = $sheet->toArray(null,true,true,false);
    $id = $sheet[25][0];
    $subsegment =  $sheet->getTitle();
    $date = $date = date('Y-m-d'); //today's date


    $query1 = "insert ignore into room_forecast values('$id','$subsegment','$date',$forecastrns,$forecastarr,$forecastrev)";
    $query2 = "insert ignore into room_forecast values('$id','$subsegment','$date',$forecastrns,$forecastarr,$forecastrev)";
    $query3 = "insert ignore into room_forecast values('$id','$subsegment','$date',$forecastrns,$forecastarr,$forecastrev)";
    query($query1,$conn);
    query($query2,$conn);
    query($query3,$conn);
}