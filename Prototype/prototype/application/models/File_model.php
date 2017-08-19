<?php
    class File_model extends CI_Model{
        public function __construct(){
            $this->load->database();
        }
        public function get_files(){
            $query=$this->db->get('files');
            return $query->result_array();
        }
    }