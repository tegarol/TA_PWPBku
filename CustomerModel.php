<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CustomerModel extends CI_Model 
{
    public function Store($data) {
        $this->db->insert('customer', $data);

        return $this->db->affected_rows();
    }

    public function Find($id) {
        return $this->db->where('Id', $id)
            ->get('customer')
            ->row();
    }

    public function Update($id, $data) {
        $this->db->where('id', $id)
            ->update('customer', $data);

        return $this->db->affected_rows();
    }

    public function Destroy($id) {
        $this->db->where('id', $id)
            ->delete('customer');

        return $this->db->affected_rows();
    }
}