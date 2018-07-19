<?php

/**
 * Created by PhpStorm.
 * User: AI System
 * Date: 18-Jul-18
 * Time: 9:26 AM
 */
class Line_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_user($id = FALSE){
        if($id === FALSE){
            $query = $this->db->get('users');
            return $query->result_array();
        }
        $query = $this->db->get_where('users', array('id' => $id));
        return $query->row_array();
    }

    public function get_work($id = FALSE){
        if($id === FALSE){
            $query = $this->db->get('works');
            return $query->result_array();
        }
        $query = $this->db->get_where('users', array('id' => $id));
        return $query->row_array();
    }

    public function get_done_work($id){
        $query = $this->db->get_where('works', array('user_id'=>$id,'done'=>1,'sent'=>0));
        return $query->result_array();
    }
}