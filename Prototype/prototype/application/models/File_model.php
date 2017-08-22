<?php
    class File_model extends CI_Model
    {
        public function __construct()
        {
            $this->load->database();
        }

        public function get_files()
        {
            $query = $this->db->get('files');
            return $query->result_array();
        }

        public function get_file($id)
        {
            $query = $this->db->get_where('files', array('id' => $id));
            return $query->row();
        }
        public function delete_file($id){
            $this->db->where('id',$id);
            $this->db->delete('files');
            return true;
        }
        public function insert_data()
        {
            $fileName = FCPATH.'upload/'.(string)$_POST['file_name'];
            $longYear = $_POST['year'];
            $year = substr($_POST['year'], -2);
            $month = $_POST['month'];
            /*echo  $year;
            echo "<br/>";
            echo $month;*/

            echo $fileName;
            $actual_id = $month . "" . $year;
            $individual = array('RCK', 'CORP', 'CORPO', 'PKG/PRM', 'WSOL', 'WSOF', 'INDO', 'INDR');
            $group = array('CORPM', 'CON/ASSOC', 'GOV/NGO', 'GRPT', 'GRPO');
            /*echo $actual_id;*/


            $dateFormat =
                [
                    "JAN" => "31",
                    "FEB" => "28",
                    "MAR" => "31",
                    "APR" => "30",
                    "MAY" => "31",
                    "JUN" => "30",
                    "JUL" => "31",
                    "AUG" => "31",
                    "SEPT" => "30",
                    "OCT" => "31",
                    "NOV" => "30",
                    "DEC" => "31"
                ];
            $dateNum =
                [
                    "JAN" => "01",
                    "FEB" => "02",
                    "MAR" => "03",
                    "APR" => "04",
                    "MAY" => "05",
                    "JUN" => "06",
                    "JUL" => "07",
                    "AUG" => "08",
                    "SEPT" => "09",
                    "OCT" => "10",
                    "NOV" => "11",
                    "DEC" => "12"
                ];
            $actualRow =
                [
                    "JAN" => 7,
                    "FEB" => 11,
                    "MAR" => 15,
                    "APR" => 19,
                    "MAY" => 23,
                    "JUN" => 27,
                    "JUL" => 31,
                    "AUG" => 35,
                    "SEPT" => 39,
                    "OCT" => 43,
                    "NOV" => 47,
                    "DEC" => 51
                ];
            $day = $dateFormat[$month];
            $m = $dateNum[$month];
            /*
            $host = "localhost";
            $user = "root";
            $pass = "";
            $database = "rfsa";

            $conn = new mysqli($host, $user, $pass, $database);
               */
            require_once(APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel.php');

            /*$fileName = "2015 Rooms Segmentation.xlsx";*/
            $excelReader = PHPExcel_IOFactory::createReaderForFile($fileName);
            $excelObject = $excelReader->load($fileName);
            $workSheet = $excelObject->getActiveSheet();
//$lastrow = $excelObject->getHighestRow();
            $excel_arr = $workSheet->toArray(null, true, true, false);

            $indcol = 3;
            $grpcol = 30;
            $row = $actualRow[$month];

            function removeComma($number)
            {
                $number = str_replace(",", "", $number);
                $number = (double)$number;
                return $number;
            }

            for ($ss = 0; $ss < 8; $ss++) {
                $dateForDatabase = $longYear . "-" . $m . "-" . $day;
                $actualrns = removeComma($excel_arr[$row][$indcol]);
                $actualarr = removeComma($excel_arr[$row][$indcol + 1]);
                $actualrev = removeComma($excel_arr[$row][$indcol + 2]);
                $budgetrns = removeComma($excel_arr[$row + 1][$indcol]);
                $budgetarr = removeComma($excel_arr[$row + 1][$indcol + 1]);
                $budgetrev = removeComma($excel_arr[$row + 1][$indcol + 2]);
                $query = "insert ignore into room_actual values('$actual_id','$individual[$ss]','$dateForDatabase',
                                                         $budgetrns,$budgetarr,$budgetrev,$actualrns,
                                                         $actualarr,$actualrev)";
                $indcol += 3;
                if ($this->db->query($query) === FALSE) {
                    echo "QUERY FAILED at " . $query;
                    echo "<br/>";
                } else {
                    echo " ".$query . " SUCCESS";
                    echo nl2br("\n");
                }


            }

            for ($ss = 0; $ss < 5; $ss++) {
                $dateForDatabase = $longYear . "-" . $m . "-" . $day;
                $actualrns = removeComma($excel_arr[$row][$grpcol]);
                $actualarr = removeComma($excel_arr[$row][$grpcol + 1]);
                $actualrev = removeComma($excel_arr[$row][$grpcol + 2]);
                $budgetrns = removeComma($excel_arr[$row + 1][$grpcol]);
                $budgetarr = removeComma($excel_arr[$row + 1][$grpcol + 1]);
                $budgetrev = removeComma($excel_arr[$row + 1][$grpcol + 2]);
                $query = "insert ignore into room_actual values('$actual_id','$group[$ss]','$dateForDatabase',
                                                         $budgetrns,$budgetarr,$budgetrev,$actualrns,
                                                         $actualarr,$actualrev)";
                $grpcol += 3;
                if ($this->db->query($query) === FALSE) {
                    echo "QUERY FAILED at " . $query;
                    echo "<br/>";
                } else {
                    echo " ".$query . " SUCCESS";
                    echo nl2br("\n");
                }
            }
        }
        public function select_data()
        {
            function setDataString($desiredDataArray,$desiredDataMap)
            {
                $dataString = "";
                foreach($desiredDataArray as $desiredData)
                {
                    $singleDesiredData = $desiredDataMap[$desiredData];
                    $dataString = $dataString . "" . $singleDesiredData . ",";
                }
                return substr($dataString,0,-1)."";
            }
            function setSegmentString($segmentArray,$segmentMap)
            {
                $segmentString = "seg_id in (";

                foreach($segmentArray as $segment)
                {   $singleSegment = $segmentMap[$segment];
                    $segmentString = $segmentString . " " . "'$singleSegment'". " ,";
                }
                return substr($segmentString,0,-1).")";
            }
            //Data Maps for Conversion
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
            $desiredDataMap =
                [
                    "1" => "budget_rns",
                    "2" => "budget_arr",
                    "3" => "budget_revenue",
                    "4" => "actual_rns",
                    "5" => "actual_arr",
                    "6" => "actual_revenue"
                ];
            $dayMap = [
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
            $monthMap = [
                "JAN" => "1",
                "FEB" => "2",
                "MAR" => "3",
                "APR" => "4",
                "MAY" => "5",
                "JUN" => "6",
                "JUL" => "7",
                "AUG" => "8",
                "SEPT"=> "9",
                "OCT" => "10",
                "NOV" => "11",
                "DEC" => "12",

            ];
            $table = $this->input->post('data-set');
            $startYear = $this->input->post('start-year');
            $startMonth = $monthMap[$this->input->post('start-month')];
            $startDay = $dayMap[$this->input->post('start-month')];
            $endYear = $this->input->post('end-year');
            $endMonth = $monthMap[$this->input->post('end-month')];
            $endDay = $dayMap[$this->input->post('end-month')];
            $desiredDataArray = $this->input->post('data-desired');
            $segmentArray = $this->input->post('segment-desired');

            $startDate = $startYear . "-" . $startMonth . "-" . $startDay;
            $endDate = $endYear . "-" . $endMonth . "-" . $endDay;

            $dataString = setDataString($desiredDataArray,$desiredDataMap);
            $segmentString = setSegmentString($segmentArray,$segmentMap);

            $query = "select actual_id, seg_id, " . $dataString . " from " . $table . " where " . $segmentString . " and date between " . "'$startDate'" . " and " . "'$endDate'";
            echo $query;
            return $this->db->query($query);
        }
    }