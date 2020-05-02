<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->API = "http://localhost:8080/uts_web/ayam_server/api/pegawai";
        $this->load->library('curl');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('login_model');
        $this->load->model('user_model');

        if (
            $this->session->userdata('level') != "Pegawai" &&
            $this->session->userdata('level') != "Manajer"
        ) {
            redirect('login', 'refresh');
        }
        
    }


    public function index()
    {
        $data['title'] = 'Sistem Manajemen Peternakan Ayam';
        $data['judulHalaman'] = 'Data Pegawai';
        $data['breadcrumbs'] = ' Data Pegawai / User';
        $data['user'] = $this->user_model->getAllUser();
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar_manajer');
        $this->load->view('template/breadcrumbs', $data);
        $this->load->view('user/index', $data);
        $this->load->view('template/footer');
    }

    public function pilihPegawai()
    {
        $data['title'] = 'Sistem Manajemen Peternakan Ayam';
        $data['judulHalaman'] = 'Data Pegawai';
        $data['breadcrumbs'] = ' Data Pegawai / User / Tambah User';

        $respon = json_decode($this->curl->simple_get($this->API . '/pegawai'));
        $data['pegawai'] = $respon->data;
        
        $data['user'] = $this->user_model->getAllUser();

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar_manajer');
        $this->load->view('template/breadcrumbs', $data);
        $this->load->view('user/pilih_pegawai', $data);
        $this->load->view('template/footer');
    }

    public function tambahUser($id)
    {
        $data['title'] = 'Sistem Manajemen Peternakan Ayam';
        $data['judulHalaman'] = 'Data Pegawai';
        $data['breadcrumbs'] = ' Data Pegawai / User / Tambah User';
        $data['level'] = ['Manajer','Pegawai'];
        
        $params = array('id_pegawai' => $this->uri->segment(3));
        $respon = json_decode($this->curl->simple_get($this->API . '/pegawai', $params));
        $data['pegawai'] = $respon->data;
        $this->form_validation->set_rules(
            'username',
            'Username',
            'required|is_unique[user.username]',
            array(
                'required' => '%s masih kosong!',
                'is_unique' => '%s sudah terdaftar'
            )
        );

        $this->form_validation->set_rules(
            'password',
            'Password',
            'required',
            array(
                'required' => '%s masih kosong!',
            )
        );

        $this->form_validation->set_rules(
            'confirm_password',
            'Konfrimasi password',
            'required|matches[password]',
            array(
                'required' => '%s masih kosong!',
                'matches' => '%s tidak sama'
            )
        );

        $this->form_validation->set_rules(
            'level',
            'Level',
            'required',
            array(
                'required' => '%s masih kosong!',
            )
        );

        if ($this->form_validation->run() == FALSE) {
            # code...
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar_manajer');
            $this->load->view('template/breadcrumbs', $data);
            $this->load->view('user/tambah', $data);
            $this->load->view('template/footer');
        } else {
            # code...
            $this->user_model->tambahUser();
            // untuk flashdata mempunyai 2 paramenter(nama flashdata/alias, isi dari flashdatanya)
            $this->session->set_flashdata('berhasil', 'ditambahkan');
            redirect('user', 'refresh');
        }
    }

    public function detailUser($id)
    {
        # code...
        $data['title'] = 'Sistem Manajemen Peternakan Ayam';
        $data['judulHalaman'] = 'Data Pegawai';
        $data['breadcrumbs'] = ' Data Pegawai / User / Tambah User';
        $data['user'] = $this->user_model->getUserByID($id);
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar_manajer');
        $this->load->view('template/breadcrumbs', $data);
        $this->load->view('user/detail', $data);
        $this->load->view('template/footer');
    }

    public function editUser($id)
    {
        $data['title'] = 'Sistem Manajemen Peternakan Ayam';
        $data['judulHalaman'] = 'Data Pegawai';
        $data['breadcrumbs'] = ' Data Pegawai / User / Edit User';
        $data['user'] = $this->user_model->getUserByID($id);
        $data['level'] = ['Manajer','Pegawai'];

        $this->form_validation->set_rules(
            'username',
            'Username',
            'required',
            array(
                'required' => '%s masih kosong!',
            )
        );

        $this->form_validation->set_rules(
            'password',
            'Password',
            'required',
            array(
                'required' => '%s masih kosong!',
            )
        );

        $this->form_validation->set_rules(
            'confirm_password',
            'Konfrimasi password',
            'required|matches[password]',
            array(
                'required' => '%s masih kosong!',
                'matches' => '%s tidak sama'
            )
        );

        $this->form_validation->set_rules(
            'level',
            'Level',
            'required',
            array(
                'required' => '%s masih kosong!',
            )
        );

        if ($this->form_validation->run() == FALSE) {
            # code...
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar_manajer');
            $this->load->view('template/breadcrumbs', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('template/footer');
        } else {
            # code...
            $this->user_model->ubahUser();
            // untuk flashdata mempunyai 2 paramenter(nama flashdata/alias, isi dari flashdatanya)
            $this->session->set_flashdata('berhasil', 'diedit');
            redirect('user', 'refresh');
        }
    }

    public function hapusUser($id)
    {
        # code...
        $this->user_model->hapusUser($id);
        $this->session->set_flashdata('berhasil', 'dihapus');
        redirect('user', 'refresh');
    }
}

/* End of file Pengeluaran.php */
