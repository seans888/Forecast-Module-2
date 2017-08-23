<?php
    class Test extends CI_Controller{
        public function select(){
            $data['store']=$this->test_model->get_select();
            $this->load->view('test/test3',$data);


        }
        public function open_close(){

            $file=FCPATH."forecasts/"."ForecastResult2017.xlsx";
            $data['datum']=file_get_contents($file);
            $this->load->view('test/test4',$data);
        }
    }