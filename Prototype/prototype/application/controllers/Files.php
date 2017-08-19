<?php
    class Files extends CI_Controller{
        public function index(){
            $data['title']="HAHAHA";

            $this->load->view('templates/header');
            $this->load->view('modules/menu');
            $this->load->view('projects/menu',$data);
            $this->load->view('scripts/home');
            $this->load->view('templates/footer');
        }
        public function manipulate($id){
            $data['title']="File Manipulation of " . $this->file_model->get_file($id)->file_name;

            $this->load->view('templates/header');
            $this->load->view('modules/menu');
            $this->load->view('files/manipulate',$data);
            $this->load->view('scripts/home');
            $this->load->view('templates/footer');
        }
    }