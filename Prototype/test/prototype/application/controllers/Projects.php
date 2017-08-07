<?php
    class Projects extends CI_Controller{
        public function index(){
            $this->load->view('templates/header');
            $this->load->view('modules/menu');
            $this->load->view('projects/menu');
            $this->load->view('scripts/home');
            $this->load->view('templates/footer');
        }
        public function read_data(){
            require(APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel.php');

        }
        public function import_data(){


            $config=array(
                'upload_path'=>FCPATH.'upload/',
                'allowed_types'=>'xls|xlsx'
            );
            $this->load->library('upload',$config);
            if ($this->upload->do_upload('file')){
                $dummyfile=$this->upload->data();
                @chmod($dummyfile['full_path'],0777);


                require(APPPATH.'third_party/PHPExcel-1.8/Classes/PHPExcel.php');
                $tmpfname=$dummyfile['full_path'];
                $excelReader=PHPExcel_IOFactory::createReaderForFile($tmpfname);
                $excelObj=$excelReader->load($tmpfname);
                $data['worksheet']=$excelObj->getActiveSheet();
                $data['lastRow']=$data['worksheet']->getHighestRow();

                $this->load->view('templates/header');
                $this->load->view('modules/menu');
                $this->load->view('projects/importfile',$data);
                $this->load->view('scripts/home');
                $this->load->view('templates/footer');





            /*
                $this->load->library('Spreadsheet_Excel_Reader');
                $this->spreadsheet_excel_reader->setOutputEncoding('CP1251');

                $this->spreadsheet_excel_reader->read($data['full_path']);
                $sheets=$this->spreadsheet_excel_reader->sheets[0];
                error_reporting(E_ALL ^ E_NOTICE);

                $data_excel=array();
                for ($i = 1; $i <= $data->sheets['numRows']; $i++) {
                    if($sheets['cells'][$i][1]=='')break;
                    $data_excel[$i-1]['X']=$sheets['cells'][$i][1];
                    $data_excel[$i-1]['Y']=$sheets['cells'][$i][2];
                    $data_excel[$i-1]['Z']=$sheets['cells'][$i][3];

                    for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
                        echo "\"".$data->sheets[0]['cells'][$i][$j]."\",";
                    }
                    echo "\n";
                }
                print_r($data_excel);
                die();
            */
            }

        }
    }

