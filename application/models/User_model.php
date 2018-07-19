<?php

/**
 * Created by PhpStorm.
 * User: AI System
 * Date: 17-Jul-18
 * Time: 9:42 AM
 */
class User_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_user($id = FALSE){
        if($id ===  FALSE){
            $query = $this->db->get('users');
            return $query->result_array();
        }
        $query = $this->db->get_where('users', array('id'=>$id ));
        return $query->row_array();
    }

    public function insert_user($id,$display_name,$status){
        $data = array(
            'id' => $id,
            'display_name' => $display_name,
            'status_message' => $status
        );
        $this->db->insert('users', $data);
    }
}