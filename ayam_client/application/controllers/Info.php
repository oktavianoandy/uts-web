<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Info extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->API = "http://localhost:8080/uts_web/ayam_server/api/pegawai";
        $this->load->library('curl');
        $this->load->library('form_validation');
        $this->load->library('upload');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('Login_model');

        if (
            $this->session->userdata('level') != "Pegawai" &&
            $this->session->userdata('level') != "Manajer"
        ) {
            # code...
            redirect('login', 'refresh');
        }
    }


    public function index()
    {
        $data['title'] = 'Sistem Manajemen Peternakan Ayam';
        $data['judulHalaman'] = 'Data Pegawai';
        $data['breadcrumbs'] = ' Data Pegawai / Pegawai';
        $data['nama'] = $this->session->userdata('username');
        
        $respon = json_decode($this->curl->simple_get($this->API . '/pegawai'));
        $data['pegawai'] = $respon->data;

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar_pegawai');
        $this->load->view('template/breadcrumbs', $data);
        $this->load->view('info/index', $data);
        $this->load->view('template/footer');
    }
}

/* End of file Info.php */
