<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kandang extends CI_Controller
{
    var $API1 = "";
    var $API2 = "";

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->API1 = "http://localhost:8080/uts_web/ayam_server/api/ayam";
        $this->API2 = "http://localhost:8080/uts_web/ayam_server/api/kandang";
        $this->load->library('curl');
        $this->load->library('form_validation');
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
        $data['judulHalaman'] = 'Data Peternakan';
        $data['breadcrumbs'] = 'Data Peternakan / Kandang';

        $respon2 = json_decode($this->curl->simple_get($this->API2 . '/kandang'));
        $data['kandang'] = $respon2->data;

        $this->load->view('template/header', $data);

        if ($this->session->userdata('level') == "Pegawai") {
            $this->load->view('template/sidebar_pegawai');
        } elseif ($this->session->userdata('level') == "Manajer") {
            $this->load->view('template/sidebar_manajer');
        } else {
            redirect('login', 'refresh');
        }
        $this->load->view('template/breadcrumbs', $data);
        $this->load->view('kandang/index', $data);
        $this->load->view('template/footer');
    }


    public function tambahKandang()
    {
        $data['title'] = 'Sistem Manajemen Peternakan Ayam';
        $data['judulHalaman'] = 'Data Peternakan';
        $data['breadcrumbs'] = 'Data Peternakan / Kandang / Tambah Kandang';
        $this->form_validation->set_rules(
            'nama',
            'Nama kandang',
            'required',
            array(
                'required' => '%s masih kosong!'
            )
        );

        $this->form_validation->set_rules(
            'kapasitas',
            'Kapasitas kandang',
            'required|numeric',
            array(
                'required' => '%s masih kosong!',
                'numeric' => '%s diisi angka!',
            )
        );

        if (isset($_POST['submit'])) {
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('template/header', $data);
                if ($this->session->userdata('level') == "Pegawai") {
                    $this->load->view('template/sidebar_pegawai');
                } elseif ($this->session->userdata('level') == "Manajer") {
                    $this->load->view('template/sidebar_manajer');
                } else {
                    redirect('login', 'refresh');
                }
                $this->load->view('template/breadcrumbs', $data);
                $this->load->view('kandang/tambah', $data);
                $this->load->view('template/footer');
            } else {
                $data = array(
                    'id_kandang' => $this->input->NULL,
                    'nama' => $this->input->post('nama'),
                    'kapasitas' => $this->input->post('kapasitas')
                );

                $insert = $this->curl->simple_post($this->API2 . '/kandang', $data, array(CURLOPT_BUFFERSIZE => 10));

                if ($insert) {
                    $this->session->set_flashdata('berhasil', 'ditambahkan!');
                } else {
                    $this->session->set_flashdata('gagal', 'ditambahkan!');
                }
                redirect('kandang');
            }
        } else {

            $this->load->view('template/header', $data);
            if ($this->session->userdata('level') == "Pegawai") {
                $this->load->view('template/sidebar_pegawai');
            } elseif ($this->session->userdata('level') == "Manajer") {
                $this->load->view('template/sidebar_manajer');
            } else {
                redirect('login', 'refresh');
            }
            $this->load->view('template/breadcrumbs', $data);
            $this->load->view('kandang/tambah', $data);
            $this->load->view('template/footer');
        }
    }

    public function detailKandang()
    {
        # code...
        $params = array('id_kandang' => $this->uri->segment(3));
        $respon = json_decode($this->curl->simple_get($this->API2 . '/kandang', $params));
        $data['kandang'] = $respon->data;

        $respon2 = json_decode($this->curl->simple_get($this->API1 . '/ayam'));
        $data['ayam'] = $respon2->data;

        $data['title'] = 'Sistem Manajemen Peternakan Ayam';
        $data['judulHalaman'] = 'Data Peternakan';
        $data['breadcrumbs'] = 'Data Peternakan / Kandang / Detail Kandang';

        $this->load->view('template/header', $data);
        if ($this->session->userdata('level') == "Pegawai") {
            $this->load->view('template/sidebar_pegawai');
        } elseif ($this->session->userdata('level') == "Manajer") {
            $this->load->view('template/sidebar_manajer');
        } else {
            redirect('login', 'refresh');
        }
        $this->load->view('template/breadcrumbs', $data);
        $this->load->view('kandang/detail', $data);
        $this->load->view('template/footer');
    }

    public function editKandang()
    {
        $data['title'] = 'Sistem Manajemen Peternakan Ayam';
        $data['judulHalaman'] = 'Data Peternakan';
        $data['breadcrumbs'] = 'Data Peternakan / Kandang / Edit Kandang';
        
        $params = array('id_kandang' => $this->uri->segment(3));
        $respon = json_decode($this->curl->simple_get($this->API2 . '/kandang', $params));
        $data['kandang'] = $respon->data;

        $this->form_validation->set_rules(
            'nama',
            'Nama kandang',
            'required',
            array(
                'required' => '%s masih kosong!'
            )
        );

        $this->form_validation->set_rules(
            'kapasitas',
            'Kapasitas kandang',
            'required|numeric',
            array(
                'required' => '%s masih kosong!',
                'numeric' => '%s diisi angka!',
            )
        );

        if (isset($_POST['submit'])) {
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('template/header', $data);
                if ($this->session->userdata('level') == "Pegawai") {
                    $this->load->view('template/sidebar_pegawai');
                } elseif ($this->session->userdata('level') == "Manajer") {
                    $this->load->view('template/sidebar_manajer');
                } else {
                    redirect('login', 'refresh');
                }
                $this->load->view('template/breadcrumbs', $data);
                $this->load->view('kandang/edit', $data);
                $this->load->view('template/footer');
            } else {
                $data = array(
                    'id_kandang' => $this->input->post('id_kandang'),
                    'nama' => $this->input->post('nama'),
                    'kapasitas' => $this->input->post('kapasitas')
                );

                $update = $this->curl->simple_put($this->API2 . '/kandang', $data, array(CURLOPT_BUFFERSIZE => 10));

                if ($update) {
                    $this->session->set_flashdata('berhasil', 'diupdate!');
                } else {
                    $this->session->set_flashdata('gagal', 'diupdate!');
                }
                redirect('kandang');
            }
        } else {
            $this->load->view('template/header', $data);
            if ($this->session->userdata('level') == "Pegawai") {
                $this->load->view('template/sidebar_pegawai');
            } elseif ($this->session->userdata('level') == "Manajer") {
                $this->load->view('template/sidebar_manajer');
            } else {
                redirect('login', 'refresh');
            }
            $this->load->view('template/breadcrumbs', $data);
            $this->load->view('kandang/edit', $data);
            $this->load->view('template/footer');
        }
    }

    public function hapusKandang($id)
    {
        # code...
        if (empty($id)) {
            redirect('kandang');
        } else {
            $delete = $this->curl->simple_delete($this->API2 . '/kandang', array('id_kandang' => $id), array(CURLOPT_BUFFERSIZE => 10));
            if ($delete) {
                $this->session->set_flashdata('berhasil', 'dihapus!');
            } else {
                $this->session->set_flashdata('gagal', 'dihapus!');
            }
            redirect('kandang');
        }
    }
}

/* End of file Kandang.php */
