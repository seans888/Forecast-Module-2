<?php
    class Test_model extends CI_Model{
        public function __construct()
        {
            $this->load->database();
        }
        public function get_select(){
            $query=$this->db->get('room_actual');
            return $query->result_array();

        }
    }