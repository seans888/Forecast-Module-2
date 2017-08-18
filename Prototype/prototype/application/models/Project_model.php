<?php
    class Project_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }
        public function upload_file($file_data){
            $data=array(
                'file_name'=>$file_data
            );
            return $this->db->insert('files',$data);
        }

    }