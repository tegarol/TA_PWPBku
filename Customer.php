<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller 
{
    public function __construct() {
        parent::__construct();
        $this->load->model('CustomerModel', 'Customer');
        $this->form_validation->set_error_delimiters('<small class="text-danger">','</small>');
       
    }

    public function Index() {
        $data['Customer'] = $this->db->get('customer')->result();

        $this->load->view('templates/admin_header');
        $this->load->view('customer/index', $data);
        $this->load->view('templates/admin_footer');
    }

    public function Create() 
    {
        // Config form validation
        $config = array(
            array(
                'field' => 'NIK',
                'label' => 'No Rekap Customer',
                'rules' => 'trim|required|max_length[36]|is_unique[customer.NIK]',
            ),
            array(
                'field' => 'Nama',
                'label' => 'Nama',
                'rules' => 'trim|required|min_length[5]',
            ),
        );

        // Set rules of form validation libraries
        $this->form_validation->set_rules($config);

        // Jika form_validation bernilai false 
        if($this->form_validation->run() == FALSE) {
            $this->load->view('templates/admin_header');
            $this->load->view('customer/create');
            $this->load->view('templates/admin_footer');
        } 
        else { // jika form_validation bernilai benar
            $data = array(
                'NIK' => $this->input->post('NIK', TRUE),
                'Nama' => $this->input->post('Nama', TRUE)
            );

            // Memanggil fungsi store pada model customer dengan data hasil inputan form
            $this->Customer->Store($data);

            // Set flashdata yang berisi keterangan daa berhasil ditambahkan
            $this->session->set_flashdata(array(
                'type' => 'success',
                'msg' => 'Data Customer Berhasil Ditambah!'
            ));

            redirect('customer');
        }
    }

    public function Edit($id = NULL) {
        // Cek apakah id == NULL atau tidak
        if($id == NULL) {
            redirect('customer');
        }

        // Mendapatkan data customer dengan id yang sama dengan parameter $id
        $customer = $this->Customer->Find($id);

        // Cek apakah data ditemukan
        if($customer) {
            // Konfigurasi form validation
            $config = array(
                array(
                    'field' => 'NIK',
                    'label' => 'No Rekap Customer',
                    'rules' => 'trim|required|max_length[36]',
                ),
                array(
                    'field' => 'Nama',
                    'label' => 'Nama',
                    'rules' => 'trim|required|min_length[5]',
                ),
            );

            // Set aturan form validation
            $this->form_validation->set_rules($config);

            // Jika aturannya tidak terpenuhi panggil view dan parsing data hasil query 
            if($this->form_validation->run() == FALSE) {
                $this->load->view('templates/admin_header');
                // Memanggil view customer/edit dengan data customer
                $this->load->view(
                    'customer/edit',
                    array(
                        'data' => $customer
                    )
                );
                $this->load->view('templates/admin_footer');
            } else { // jika validation benar
                // Mendapatkan data inputan form 
                $data = array(
                    'NIK' => $this->input->post('NIK', TRUE),
                    'Nama' => $this->input->post('Nama', TRUE)
                );

                // Update data customer dengan memanggil fungsi di model customer
                $this->Customer->Update($id, $data);

                // Tambahkan flash data dengan pesan berhasil update data
                $this->session->set_flashdata(array(
                    'type' => 'success',
                    'msg' => 'Data Customer Berhasil Diubah!'
                ));

                redirect('customer');
            }
        } else { // Jika data customer tidak ada
            // Tambahkan flashdata dengan pesan data tidak ditemukan
            $this->session->set_flashdata(array(
                'type' => 'success',
                'msg' => 'Data Customer Tidak Ditemukan!'
            ));

            redirect('customer');
        }
    }

    public function Delete($id = NULL) {
        // Cek id apakah tidak sama dengan NULL
        if($id == NULL) {
            redirect('customer');
        }

        // Panggil fungsi destroy pada model Customer denga parameter $id
        $this->Customer->Destroy($id);

        // Tambahkan flashdata dengan pesan data berhasil dihapus
        $this->session->set_flashdata(array(
            'type' => 'success',
            'msg' => 'Data Customer Berhasil Dihapus!'
        ));

        redirect('customer');
    }
}