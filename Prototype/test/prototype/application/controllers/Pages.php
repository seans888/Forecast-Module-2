<?php
    class Pages extends CI_Controller{
        public function view($page='home'){
            if(!file_exists(APPPATH.'views/pages/'.$page.'.php')){
                show_404();
            }
            $data['title']=ucfirst($page);

            $this->load->view('templates/header');
            $this->load->view('modules/menu');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('scripts/home');
            $this->load->view('templates/footer');
        }
    }