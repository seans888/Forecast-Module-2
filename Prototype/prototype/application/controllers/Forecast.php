<?php
    class Forecast extends CI_Controller{
        public function get_forecast(){

            $this->forecast_model->create_forecast();
            redirect('projects/index');
        }
        public function del_forecast($name){
            unlink(urldecode(FCPATH.'forecasts/'.$name));
            redirect('projects/index');
        }
        public function download($name){
            force_download(FCPATH.'/forecasts/'.$name,NULL);
        }
}