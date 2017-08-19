<?php
    class File_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }
        public function get_files(){
            $query=$this->db->get('files');
            return $query->result_array();
        }
        public function get_file($id){
            $query=$this->db->get_where('files',array('id'=>$id));
            return $query->row();
        }
        public function insert_data(){
            $data=array(

            );
        }
    }