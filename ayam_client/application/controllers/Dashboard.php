<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    var $API1 = "";
    var $API2 = "";
    var $API3 = "";
    var $API4 = "";
    var $API5 = "";
    var $API6 = "";

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->API1 = "http://localhost:8080/uts_web/ayam_server/api/totalpemasukan";
        $this->API2 = "http://localhost:8080/uts_web/ayam_server/api/totalpengeluaran";
        $this->API3 = "http://localhost:8080/uts_web/ayam_server/api/totalayam";
        $this->API4 = "http://localhost:8080/uts_web/ayam_server/api/pemasukan";
        $this->API5 = "http://localhost:8080/uts_web/ayam_server/api/pengeluaran";
        $this->API6 = "http://localhost:8080/uts_web/ayam_server/api/totalproduksitelur";
        $this->load->library('curl');
        $this->load->helper('form');
        $this->load->helper('url');

        if ($this->session->userdata('level') != "Pegawai" &&
        $this->session->userdata('level') != "Manajer") {
            # code...
            redirect('login','refresh');
        }

    }


    public function index()
    {
        $data['title'] = 'Sistem Manajemen Peternakan Ayam';
        $data['nama'] = $this->session->userdata('username');
        $data['judulHalaman'] = 'Halaman Utama';
        $data['breadcrumbs'] = 'Halaman Utama';

        $respon1 = json_decode($this->curl->simple_get($this->API1 . '/totalpemasukan'));
        $data['datapemasukan'] = $respon1->data;

        $respon2 = json_decode($this->curl->simple_get($this->API2 . '/totalpengeluaran'));
        $data['datapengeluaran'] = $respon2->data;

        $respon3 = json_decode($this->curl->simple_get($this->API3 . '/totalayam'));
        $data['dataayam'] = $respon3->data;

        $respon4 = json_decode($this->curl->simple_get($this->API4 . '/pemasukan'));
        $data['datariwayatpemasukan'] = $respon4->data;
        
        $respon5 = json_decode($this->curl->simple_get($this->API5 . '/pengeluaran'));
        $data['datariwayatpengeluaran'] = $respon5->data;

        $respon6 = json_decode($this->curl->simple_get($this->API6 . '/totalproduksitelur'));
        $data['dataproduksitelur'] = $respon6->data;

        $this->load->view('template/header', $data);
        if ($this->session->userdata('level') == "Pegawai") {
            $this->load->view('template/sidebar_pegawai');
        } elseif ($this->session->userdata('level') == "Manajer") {
            $this->load->view('template/sidebar_manajer');
        } else {
            redirect('login', 'refresh');
        }
        $this->load->view('template/breadcrumbs', $data);
        $this->load->view('dashboard/index', $data);
        $this->load->view('template/footer');
    }
}

/* End of file Dashboard.php */
