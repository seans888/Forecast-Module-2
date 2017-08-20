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
            $data['title']="Insert to DB from " . $this->file_model->get_file($id)->file_name;

            $this->load->view('templates/header');
            $this->load->view('modules/menu');
            $this->load->view('files/manipulate',$data);
            $this->load->view('scripts/home');
            $this->load->view('templates/footer');
        }
        public function insert(){
            $this->file_model->insert_data();
        }
        public function delete($id){
            $this->file_model->delete_file($id);
            redirect('projects');
        }
        public function select(){
            $this->file_model->select_data();
        }
    }