<?php
    class Forecast_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }
        public function create_forecast(){
//Connection details
$host="localhost";
$user='root';
$pass='';
$db="rfsa";
//Make a connection profile
$conn = new mysqli($host,$user,$pass,$db); //An instance of a new mysqli database connection


//prepare the PHPExcel

// Include PHPExcel library and create its object

            require_once(APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel.php');

// Load an existing spreadsheet template

            $phpExcel = PHPExcel_IOFactory::load(FCPATH.'forecasttemplate/'.'ForecastTemplate.xlsx');


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

    @$sheet -> setCellValueByColumnAndRow($y + 1, $x, $value);
    @$sheet -> setCellValueByColumnAndRow($y + 2, $x, $value);
    @$sheet -> setCellValueByColumnAndRow($y + 3, $x, $value);
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

            $writer->save(FCPATH.'forecasts/'.'ForecastResult2017.xlsx');

        }
        public function forecast_with_time(){
            //IMPORT PHPEXCEL
            require_once(APPPATH."third_party/PHPExcel-1.8/Classes/PHPExcel.php");

//LOAD EXCEL TEMPLATE
            $phpExcel = PHPExcel_IOFactory::load(FCPATH.'forecasttemplate/'.'ForecastTemplate2.xlsx');
            $sheet = $phpExcel ->setActiveSheetIndex();

//Connection details
            $host="localhost";
            $user='root';
            $pass='';
            $db="rfsa";

//Make a connection profile
            $conn = new mysqli($host,$user,$pass,$db); //An instance of a new mysqli database connection
            $num_data = $conn->query("select * from room_actual where SEG_ID='RCK'")->num_rows;


//check post
            if( isset($_POST['selectTimeSpan']) )
            {
                $timeSpan = $_POST['selectTimeSpan'];
                if($timeSpan==""){
                    $timeSpan=$num_data;
                }
            }
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

            $segments = array('RCK','CORP','CORPO','PKG/PRM','WSOL','WSOF','INDO','INDR','CORPM','CON/ASSOC','GOV/NGO','GRPT','GRPO');

            $ctr = 0;

            while ($ctr != 13){
                //set the designate sheets to go to
                $sheet = $phpExcel ->setActiveSheetIndex($ctr);

                //add defined names to new excel
                $endofrange = $timeSpan+1;
                $phpExcel->addNamedRange(new PHPExcel_NamedRange('timeline', $sheet, 'A2:A'.$endofrange));
                $phpExcel->addNamedRange(new PHPExcel_NamedRange('rns', $sheet, 'B2:B'.$endofrange,true));
                $phpExcel->addNamedRange(new PHPExcel_NamedRange('arr', $sheet, 'C2:C'.$endofrange,true));
                $phpExcel->addNamedRange(new PHPExcel_NamedRange('rev', $sheet, 'D2:D'.$endofrange,true));

                //insert dates on excel
                $date_query = "select date from(select * from room_actual where seg_id='$segments[$ctr]' order by date desc limit $timeSpan) sub order by date asc;";
                $result = $conn->query($date_query);
                $x = 2;
                while($row = $result->fetch_assoc()){
                    $value = changeDashToComma($row["date"]);
                    $sheet -> setCellValueByColumnAndRow(0, $x, '=DATE('.$value.')');
                    $sheet -> setCellValueByColumnAndRow(5, 2,'=EOMONTH(DATE('.$value.'),1)');
                    $x++;
                }

//insert room nights sold on excel
                $rns_query = "select ACTUAL_RNS from(select * from room_actual where seg_id='$segments[$ctr]' order by date desc limit $timeSpan) sub order by date asc;";
                $result = $conn->query($rns_query);
                $x = 2;
                while($row = $result->fetch_assoc()){
                    $value = $row["ACTUAL_RNS"];
                    $sheet -> setCellValueByColumnAndRow(1, $x, $value);
                    $x++;
                }

//insert average room rate on excel
                $rns_query = "select ACTUAL_ARR from(select * from room_actual where seg_id='$segments[$ctr]' order by date desc limit $timeSpan) sub order by date asc;";
                $result = $conn->query($rns_query);
                $x = 2;
                while($row = $result->fetch_assoc()){
                    $value = $row["ACTUAL_ARR"];
                    $sheet -> setCellValueByColumnAndRow(2, $x, $value);
                    $x++;
                }

//insert revenue on excel
                $rns_query = "select ACTUAL_REVENUE from(select * from room_actual where seg_id='$segments[$ctr]' order by date desc limit $timeSpan) sub order by date asc;";
                $result = $conn->query($rns_query);
                $x = 2;
                while($row = $result->fetch_assoc()){
                    $value = $row["ACTUAL_REVENUE"];
                    $sheet -> setCellValueByColumnAndRow(3, $x, $value);
                    $x++;
                }
                $ctr++;
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
            $lastmonth = getMonthOnly($row["ACTUAL_ID"]);
            $forecastYear = getYearOnly($row["ACTUAL_ID"]);
            $forecastMonth = $nextMonth[$lastmonth];
            if($lastmonth == "DEC"){
                $forecastYear = $forecastYear+1;
            }
            $forecastID = $timeSpan.'M-'.$forecastMonth.$forecastYear;

//set xlsx title
            $config['upload_path']=FCPATH.'forecasts/';
            $title = FCPATH.'forecasts/'.'ForecastResults'.$forecastID.'.xlsx';

//save new excel file
            if (!file_exists($title)) {
                $writer = PHPExcel_IOFactory::createWriter($phpExcel, "Excel2007");

                $writer->save($title);
                //@chmod($config['upload_path'],0777);
            }

//readonly the saved file
            $phpExcel = PHPExcel_IOFactory::load($title);
//insert into database forecasted values
            $ctr = 0;

            while ($ctr != 13) {
                //set the designate sheets to go to
                $sheet1 = $phpExcel->setActiveSheetIndex($ctr);
                $date = $date = date('Y-m-d'); //today's date
                $subsegment = $segments[$ctr];
                echo "<pre>";
                echo $forecastrns = $sheet1->getCell('G2')->getOldCalculatedValue() . "  ";
                echo $forecastarr = $sheet1->getCell('H2')->getOldCalculatedValue() . "  ";
                echo $forecastrev = $sheet1->getCell('I2')->getOldCalculatedValue() . "  ";
                echo "<br/></pre>";

                $query = "insert ignore into room_forecast values('$forecastID','$subsegment','$date',$forecastrns,$forecastarr,$forecastrev)";
                if ($conn->query($query) === FALSE) {
                    echo "QUERY FAILED at " . $query;
                    echo "<br/>";
                } else {
                    echo $query . " SUCCESS";
                    echo nl2br("\n");
                }
                echo "<br/></pre>";
                $ctr++;
            }
        }
    }