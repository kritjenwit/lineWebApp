<?php

/**
 * Created by PhpStorm.
 * User: AI System
 * Date: 17-Jul-18
 * Time: 9:42 AM
 */
class Work_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_work($id = FALSE){
        if($id ===  FALSE){
            $query = $this->db->get('works');
            return $query->result_array();
        }
        $query = $this->db->get_where('works', array('id'=>$id ));
        return $query->row_array();
    }

    public function get_undone_work(){
        $query = $this->db->get_where('works', array('done'=>0,'sent'=>0));
        return $query->result_array();
    }

    public function get_unsent_work(){
        $query = $this->db->get_where('works', array('done'=>1,'sent'=>0));
        return $query->result_array();
    }

    public function delete_work($id){
        $this->db->where('id',$id);
        $this->db->delete('works');
        return true;
    }

    public function update_work(){
        $data = array(
            'name' => $this->input->post('name'),
            'done' => $this->input->post('done'),
            'sent' => $this->input->post('sent'),
        );
        $this->db->set('updated_at', 'NOW()', FALSE);
        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('works', $data);
    }
}