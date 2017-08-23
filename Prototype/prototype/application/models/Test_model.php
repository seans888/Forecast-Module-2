<?php
    class Test_model extends CI_Model{
        public function __construct()
        {
            $this->load->database();
        }
        public function get_select(){
            $this->load->library('table');
            $query=$this->db->get('room_actual');
            $query->result_array();
            echo $this->table->generate($query);
            /*
            $row=$query->num_rows();
            $res=array('WTF');
            for($i=0;$i<$row;$i++) {
                array_push($res,$query->row($i));
            }
            return $res;
            */
        }

    }