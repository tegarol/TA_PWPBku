<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index() {
        // Pengecekan apakah user sudah melakukan login atau belum
        isAuth();

        // Validasi Input
        $this->form_validation->set_rules('Email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('Password', 'Password', 'trim|required');

        // Jika Validasi Gagal
        if($this->form_validation->run() == false) {
            $data['title'] = 'Admin Login';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            // Jika Validasinya Sukses
            $this->_login();
        }
    }

    private function _login() {
        $Email = $this->input->post('Email');
        $Password = $this->input->post('Password');

        $user = $this->db->get_where('kelas', ['Email' => $Email])->row_array();

        // Jika User Ada
        if($user) {
            // Cek Password
            if(password_verify($Password, $user['Password'])) {
                $data = [
                    'Email' => $user['Email'],
                    'Role' => $user['Role']
                ];
                $this->session->set_userdata($data);
                redirect('home');
            } else { // Jika Password Salah
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password yang anda masukkan salah!</div>');
                redirect('auth');
            }
        } else { // Jika User Tidak Ada
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email belum terdaftar!</div>');
            redirect('auth');
        }
    }

    public function registration() {
        // Pengecekan apakah user sudah melakukan login atau belum
        isAuth();

        $this->form_validation->set_rules('Username', 'Username', 'required|trim');
        $this->form_validation->set_rules('Email', 'Email', 'required|trim|valid_email|is_unique[kelas.Email]', [
            'is_unique' => 'Email telah pernah digunakan!'
        ]);
        $this->form_validation->set_rules('Password1', 'Password', 'required|trim|min_length[3]|matches[Password2]', [
            'matches' => 'Password tidak cocok!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('Password2', 'Password', 'required|trim|matches[Password1]');

        if($this->form_validation->run() == false) {
            $data['title'] = 'SI-Klinik User Registration';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'Username' => htmlspecialchars($this->input->post('Username', true)),
                'Email' => htmlspecialchars($this->input->post('Email', true)),
                'Password' => password_hash($this->input->post('Password1'), PASSWORD_DEFAULT)
            ];

            $this->db->insert('kelas', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Selamat akun ada telah berhasil dibuat.</div>');
            redirect('auth', 'refresh');
        }
    }

    public function logout() {
        // Menghapus Session
        $this->session->unset_userdata('Email');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda telah Log Out!</div>');
        redirect('auth');
    }
}