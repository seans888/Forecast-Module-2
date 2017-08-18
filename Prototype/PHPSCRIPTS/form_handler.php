<?php
$longYear = $_POST['year'];
$year = substr($_POST['year'],-2);
$month = $_POST['month'];
/*echo  $year;
echo "<br/>";
echo $month;*/
$actual_id = $month ."".$year;
$individual = array('RCK','CORP','CORPO','PKG/PRM','WSOL','WSOF','INDO','INDR');
$group = array('CORPM','CON/ASSOC','GOV/NGO','GRPT','GRPO');
/*echo $actual_id;*/

$dateFormat =
    [
        "JAN" => "31",
        "FEB" =>"28",
        "MAR" =>"31",
        "APR" =>"30",
        "MAY" =>"31",
        "JUN" =>"30",
        "JUL" =>"31",
        "AUG" =>"31",
        "SEPT" =>"30",
        "OCT" =>"31",
        "NOV" =>"30",
        "DEC" =>"31"
    ];
$dateNum =
    [
        "JAN" => "01",
        "FEB" =>"02",
        "MAR" =>"03",
        "APR" =>"04",
        "MAY" =>"05",
        "JUN" =>"06",
        "JUL" =>"07",
        "AUG" =>"08",
        "SEPT" =>"09",
        "OCT" =>"10",
        "NOV" =>"11",
        "DEC" =>"12"
    ];
$actualRow =
    [
        "JAN" => 7,
        "FEB" =>11,
        "MAR" =>15,
        "APR" =>19,
        "MAY" =>23,
        "JUN" =>27,
        "JUL" =>31,
        "AUG" =>35,
        "SEPT" =>39,
        "OCT" =>43,
        "NOV" =>47,
        "DEC" =>51
    ];
$day = $dateFormat[$month];
$m = $dateNum[$month];

$host="localhost";
$user="root";
$pass="";
$database="rfsa";

$conn = new mysqli($host,$user,$pass,$database);

require_once("PHPExcel-1.8/Classes/PHPExcel.php");

$fileName = "2015 Rooms Segmentation.xlsx";
$excelReader = PHPExcel_IOFactory::createReaderForFile($fileName);
$excelObject = $excelReader->load($fileName);
$workSheet = $excelObject->getActiveSheet();
//$lastrow = $excelObject->getHighestRow();
$excel_arr = $workSheet->toArray(null,true,true,false);

$indcol=3;
$grpcol=30;
$row = $actualRow[$month];

function removeComma($number)
{
    $number = str_replace(",","",$number);
    $number = (double) $number;
    return $number;
}

for($ss=0;$ss<8;$ss++)
{
    $dateForDatabase = $longYear. "-". $m . "-". $day;
    $actualrns = removeComma($excel_arr[$row][$indcol]);
    $actualarr = removeComma($excel_arr[$row][$indcol+1]);
    $actualrev = removeComma($excel_arr[$row][$indcol+2]);
    $budgetrns = removeComma($excel_arr[$row+1][$indcol]);
    $budgetarr = removeComma($excel_arr[$row+1][$indcol+1]);
    $budgetrev = removeComma($excel_arr[$row+1][$indcol+2]);
    $query = "insert ignore into room_actual values('$actual_id','$individual[$ss]','$dateForDatabase',
                                                         $budgetrns,$budgetarr,$budgetrev,$actualrns,
                                                         $actualarr,$actualrev)";
    $indcol+=3;
    if($conn -> query($query) === FALSE)
    {
        echo "QUERY FAILED at " . $query;
        echo "<br/>";
    }
    else
    {
        continue;
    }


}

for($ss=0;$ss<5;$ss++)
{
    $dateForDatabase = $longYear. "-". $m . "-". $day;
    $actualrns = removeComma($excel_arr[$row][$grpcol]);
    $actualarr = removeComma($excel_arr[$row][$grpcol+1]);
    $actualrev = removeComma($excel_arr[$row][$grpcol+2]);
    $budgetrns = removeComma($excel_arr[$row+1][$grpcol]);
    $budgetarr = removeComma($excel_arr[$row+1][$grpcol+1]);
    $budgetrev = removeComma($excel_arr[$row+1][$grpcol+2]);
    $query = "insert ignore into room_actual values('$actual_id','$group[$ss]','$dateForDatabase',
                                                         $budgetrns,$budgetarr,$budgetrev,$actualrns,
                                                         $actualarr,$actualrev)";
    $grpcol+=3;
    if($conn -> query($query) === FALSE)
    {
        echo "QUERY FAILED at " . $query;
        echo "<br/>";
    }
    else
    {
        continue;
    }


}
/**
 * Created by PhpStorm.
 * User: Parado
 * Date: 18/8/2017
 * Time: 2:32 PM*/
 ?>
