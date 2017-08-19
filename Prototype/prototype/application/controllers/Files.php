<?php
    class Files extends CI_Controller{
        public function index(){
            $data['title']='Files';

            $data['activeTab'] = 'index';


            $this->load->view('templates/header');
            $this->load->view('modules/menu');
            $this->load->view('projects/menu',$data);
            $this->load->view('scripts/home');
            $this->load->view('templates/footer');
        }
        public function test(){
            $data['title']='test';
            $data['activeTab'] = 'test';
            $this->load->view('templates/header');
            $this->load->view('modules/menu');
            $this->load->view('test/test0',$data);
            $this->load->view('scripts/home');
            $this->load->view('templates/footer');
        }
    }