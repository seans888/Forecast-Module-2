<?php
/**
 * Created by PhpStorm.
 * User: Jade_Ericson
 * Date: 8/14/2017
 * Time: 11:55 AM
 */

require_once("../PHPExcel-1.8/Classes/PHPExcel.php");

$fileName = "2015 Rooms Segmentation.xlsx";
$excelReader = PHPExcel_IOFactory::createReaderForFile($fileName);
$excelObject = $excelReader->load($fileName);
$workSheet = $excelObject->getActiveSheet();
//$lastrow = $excelObject->getHighestRow();
$excel_arr = $workSheet->toArray(null,true,true,false);

/*$multiplicand = $workSheet->getCell('F8')->getValue();
$multiplier = $workSheet->getCell('I13')->getValue();
$product = $multiplicand*$multiplier;

echo $multiplicand." * ".$multiplier." = ".$product;*/

$group = array(12);

$individual = array
(
    $rack = array(
        $jan = array(3),
        $feb = array(3),
        $mar = array(3),
        $apr = array(3),
        $may = array(3),
        $jun = array(3),
        $jul = array(3),
        $aug = array(3),
        $sep = array(3),
        $oct = array(3),
        $nov = array(3),
        $dec = array(3),
    ),
    $corp = array(
        $jan = array(3),
        $feb = array(3),
        $mar = array(3),
        $apr = array(3),
        $may = array(3),
        $jun = array(3),
        $jul = array(3),
        $aug = array(3),
        $sep = array(3),
        $oct = array(3),
        $nov = array(3),
        $dec = array(3),
    ),
    $corpOth = array(
        $jan = array(3),
        $feb = array(3),
        $mar = array(3),
        $apr = array(3),
        $may = array(3),
        $jun = array(3),
        $jul = array(3),
        $aug = array(3),
        $sep = array(3),
        $oct = array(3),
        $nov = array(3),
        $dec = array(3),
    ),
    $pack = array(
        $jan = array(3),
        $feb = array(3),
        $mar = array(3),
        $apr = array(3),
        $may = array(3),
        $jun = array(3),
        $jul = array(3),
        $aug = array(3),
        $sep = array(3),
        $oct = array(3),
        $nov = array(3),
        $dec = array(3),
    ),
    $wholeOn = array(
        $jan = array(3),
        $feb = array(3),
        $mar = array(3),
        $apr = array(3),
        $may = array(3),
        $jun = array(3),
        $jul = array(3),
        $aug = array(3),
        $sep = array(3),
        $oct = array(3),
        $nov = array(3),
        $dec = array(3),
    ),
    $wholeOff = array(
        $jan = array(3),
        $feb = array(3),
        $mar = array(3),
        $apr = array(3),
        $may = array(3),
        $jun = array(3),
        $jul = array(3),
        $aug = array(3),
        $sep = array(3),
        $oct = array(3),
        $nov = array(3),
        $dec = array(3),
    ),
    $indOth = array(
        $jan = array(3),
        $feb = array(3),
        $mar = array(3),
        $apr = array(3),
        $may = array(3),
        $jun = array(3),
        $jul = array(3),
        $aug = array(3),
        $sep = array(3),
        $oct = array(3),
        $nov = array(3),
        $dec = array(3),
    ),
    $industry = array(
        $jan = array(3),
        $feb = array(3),
        $mar = array(3),
        $apr = array(3),
        $may = array(3),
        $jun = array(3),
        $jul = array(3),
        $aug = array(3),
        $sep = array(3),
        $oct = array(3),
        $nov = array(3),
        $dec = array(3),
    ),
);

$group = array
(
    $corpMeet = array(
        $jan = array(3),
        $feb = array(3),
        $mar = array(3),
        $apr = array(3),
        $may = array(3),
        $jun = array(3),
        $jul = array(3),
        $aug = array(3),
        $sep = array(3),
        $oct = array(3),
        $nov = array(3),
        $dec = array(3),
    ),
    $conven = array(
        $jan = array(3),
        $feb = array(3),
        $mar = array(3),
        $apr = array(3),
        $may = array(3),
        $jun = array(3),
        $jul = array(3),
        $aug = array(3),
        $sep = array(3),
        $oct = array(3),
        $nov = array(3),
        $dec = array(3),
    ),
    $govt = array(
        $jan = array(3),
        $feb = array(3),
        $mar = array(3),
        $apr = array(3),
        $may = array(3),
        $jun = array(3),
        $jul = array(3),
        $aug = array(3),
        $sep = array(3),
        $oct = array(3),
        $nov = array(3),
        $dec = array(3),
    ),
    $groupTour = array(
        $jan = array(3),
        $feb = array(3),
        $mar = array(3),
        $apr = array(3),
        $may = array(3),
        $jun = array(3),
        $jul = array(3),
        $aug = array(3),
        $sep = array(3),
        $oct = array(3),
        $nov = array(3),
        $dec = array(3),
    ),
    $groupOth = array(
        $jan = array(3),
        $feb = array(3),
        $mar = array(3),
        $apr = array(3),
        $may = array(3),
        $jun = array(3),
        $jul = array(3),
        $aug = array(3),
        $sep = array(3),
        $oct = array(3),
        $nov = array(3),
        $dec = array(3),
    ),
);

//echo $excel_arr[7][3];
$row=7;
$col=3;
for($ss=0;$ss<count($individual);$ss++){
    for($m=0;$m<count($individual[0]);$m++){
		echo "[".$row."]"."[".$col."] month#: ".$m." subsegment#: ".$ss."<br/>";
        $individual[$ss][$m][0] = $excel_arr[$row][$col];
        $individual[$ss][$m][1] = $excel_arr[$row][$col+1];
        $individual[$ss][$m][2] = $excel_arr[$row][$col+2];
        $row+=4;
    }
    $row=7;
    $col+=3;
	echo $col."<br/>";
}

echo '<pre>'; print_r($individual); echo '</pre>';
?>