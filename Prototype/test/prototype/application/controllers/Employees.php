<?php
    class Employees extends CI_Controller{
        public function login(){
            $this->load->view('templates/header');
            $this->load->view('pages/login');
            $this->load->view('scripts/home');
            $this->load->view('templates/footer');
        }
    }