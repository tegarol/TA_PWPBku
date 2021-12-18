<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Antrian extends CI_Controller {
    public function __construct() {
        parent::__construct();
        // Load Model AntrianModel dengan nama alias Antrian
        $this->load->model('AntrianModel', 'Antrian');
    }
    
    public function Create() 
    {

        // Menyimpan data inputan kedalam array asosiatif
        $data = array(
            'NIK' => $this->input->post('NIK'),
            'Nama' => $this->input->post('Nama'),
            'Kendala' => $this->input->post('Kendala')
        );

        // Memanggil fungsi Store pada model Antrian untuk menyimpan data
        $this->Antrian->Store($data);

        // Membuat flashdata sebagai notifikasi untuk menandakan bahwa proses insert berhasil
        $this->session->set_flashdata(array(
            'type' => 'success',
            'msg' => 'Tambah Data Antrian Berhasil!'
        ));

        redirect('home');
    }

    public function Index() {
        // Mendapatkan data antrian customer dari database
        $data['Antrian'] = $this->db
            ->join('antrian', 'customer.NIK = antrian.NIK')
            ->where('Status', 0)
            ->get('customer')
            ->row();

        // Memanggil view serta mengirimkan data
        $this->load->view('antrian/index', $data);
    }

}