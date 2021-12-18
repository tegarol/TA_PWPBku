<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('AntrianModel', 'Antrian');
    }

    public function index() {
        // Melakukan pengecekan apakah user yang mengakses memiliki ijin atau tidak
        isRole();
        
        $data['DataCustomer'] = $this->db
            ->join('antrian', 'customer.NIK = antrian.NIK')
            ->where('Status', 0)
            ->get('customer')
            ->result();

        $this->load->view('templates/admin_header');
        $this->load->view('admin/index', $data);
        $this->load->view('templates/admin_footer');
    }

    public function Antrian() {

        // Dapatkan data hasil inputan form
        $data = [
            'Id' => $this->input->post('id', TRUE),
            'Status' => $this->input->post('status', TRUE)
        ];

        // Set status antrian apakah customer datang atau tidak
        $status = $data['Status'] == '1' ? 'Ada Dalam Antrian' : 'Tidak Dalam Antrian';

        // Panggil fungsi ChangeStatus pada model Antrian dengan parameter $data
        $this->Antrian->ChangeStatus($data);

        // Set Flashdata dengan pesan nomor antrian sukses diubah statusnya
        $this->session->set_flashdata(array(
            'type' => 'success',
            'msg' => "Nomor Antrian {$data['Id']} {$status}!",
        ));

        redirect('home');
    }
}