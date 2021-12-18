<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AntrianModel extends CI_Model {
    public function Store($data) 
    {
        // Cek apakah customer yang sudah didaftarkan sudah terdaftar atau tidak
        $customer = $this->db->where('NIK', $data['NIK'])->get('customer')->row();

        // Jika belum maka tambahkan data baru di tabel customer
        if(empty($customer)) {
            $this->db->insert('customer', array(
                'NIK' => $data['NIK'],
                'Nama' => $data['Nama'],
            ));
        }

        // Tambah data baru di tabel antrian
        $this->db->insert('antrian', array(
            'NIK' => $data['NIK'],
            'Kendala' => $data['Kendala']
        ));

        return $this->db->affected_rows();
    }

    public function ChangeStatus($data) {
        $this->db->where('Id', $data['Id'])
            ->update('antrian', array(
                'Status' => $data['Status']
            ));

        return $this->db->affected_rows();
    }
}