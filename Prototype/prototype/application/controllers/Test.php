<?php
    class Test extends CI_Controller{
        public function select(){
            $data['store']=$this->test_model->get_select();
            $this->load->view('test/test3',$data);


        }
    }