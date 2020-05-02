<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Ayam extends CI_Controller
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
        $data['breadcrumbs'] = 'Data Peternakan / Ayam';

        $respon1 = json_decode($this->curl->simple_get($this->API1 . '/ayam'));
        $data['ayam'] = $respon1->data;

        $this->load->view('template/header', $data);
        if ($this->session->userdata('level') == "Pegawai") {
            $this->load->view('template/sidebar_pegawai');
        } elseif ($this->session->userdata('level') == "Manajer") {
            $this->load->view('template/sidebar_manajer');
        } else {
            redirect('login', 'refresh');
        }
        $this->load->view('template/breadcrumbs', $data);
        $this->load->view('ayam/index', $data);
        $this->load->view('template/footer');
    }

    public function tambahAyam()
    {
        $data['title'] = 'Sistem Manajemen Peternakan Ayam';
        $data['judulHalaman'] = 'Data Peternakan';
        $data['breadcrumbs'] = 'Data Peternakan / Ayam / Tambah Ayam';

        $respon2 = json_decode($this->curl->simple_get($this->API2 . '/kandang'));
        $data['kandang'] = $respon2->data;

        $this->form_validation->set_rules(
            'nama',
            'Nama ayam',
            'required|min_length[3]|max_length[12]',
            array(
                'required' => '%s masih kosong!',
                'min_length' => '%s terlalu pendek, minimal 3 huruf!',
                'max_length' => '%s terlalu panjang, maksimal 12 huruf!'
            )
        );

        $this->form_validation->set_rules(
            'usia',
            'Usia ayam',
            'required|numeric',
            array(
                'required' => '%s masih kosong!',
                'numeric' => '%s diisi angka!',
            )
        );

        $this->form_validation->set_rules(
            'produksi',
            'Rata-rata produksi telur ayam',
            'required|numeric',
            array(
                'required' => '%s masih kosong!',
                'numeric' => '%s diisi angka!',
            )
        );

        $this->form_validation->set_rules(
            'id_kandang',
            'Kandang Ayam',
            'required',
            array(
                'required' => '%s belum dipilih!',
            )
        );

        $this->form_validation->set_rules(
            'kondisi',
            'Kondisi ayam',
            'required',
            array(
                'required' => '%s belum dipilih!',
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
                $this->load->view('ayam/tambah', $data);
                $this->load->view('template/footer');
            } else {
                $data = array(
                    'id_ayam' => $this->input->NULL,
                    'nama' => $this->input->post('nama'),
                    'usia' => $this->input->post('usia'),
                    'produksi' => $this->input->post('produksi'),
                    'id_kandang' => $this->input->post('id_kandang'),
                    'kondisi' => $this->input->post('kondisi'),
                );

                $insert = $this->curl->simple_post($this->API1 . '/ayam', $data, array(CURLOPT_BUFFERSIZE => 10));

                if ($insert) {
                    $this->session->set_flashdata('berhasil', 'ditambahkan!');
                } else {
                    $this->session->set_flashdata('gagal', 'ditambahkan!');
                }
                redirect('ayam');
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
            $this->load->view('ayam/tambah', $data);
            $this->load->view('template/footer');
        }
    }

    public function detailAyam()
    {
        $params = array('id_ayam' => $this->uri->segment(3));
        $respon = json_decode($this->curl->simple_get($this->API1 . '/ayam', $params));
        $data['ayam'] = $respon->data;

        $respon2 = json_decode($this->curl->simple_get($this->API2 . '/kandang'));
        $data['kandang'] = $respon2->data;

        $data['title'] = 'Sistem Manajemen Peternakan Ayam';
        $data['judulHalaman'] = 'Data Peternakan';
        $data['breadcrumbs'] = 'Data Peternakan / Ayam / Detail Ayam';
        $this->load->view('template/header', $data);
        if ($this->session->userdata('level') == "Pegawai") {
            $this->load->view('template/sidebar_pegawai');
        } elseif ($this->session->userdata('level') == "Manajer") {
            $this->load->view('template/sidebar_manajer');
        } else {
            redirect('login', 'refresh');
        }
        $this->load->view('template/breadcrumbs', $data);
        $this->load->view('ayam/detail', $data);
        $this->load->view('template/footer');
    }

    public function editAyam()
    {
        $data['title'] = 'Sistem Manajemen Peternakan Ayam';
        $data['judulHalaman'] = 'Data Peternakan';
        $data['breadcrumbs'] = 'Data Peternakan / Ayam / Edit Ayam';
        $data['kondisi'] = ['sehat', 'sakit'];

        $params = array('id_ayam' => $this->uri->segment(3));
        $respon = json_decode($this->curl->simple_get($this->API1 . '/ayam', $params));
        $data['ayam'] = $respon->data;

        $respon2 = json_decode($this->curl->simple_get($this->API2 . '/kandang'));
        $data['kandang'] = $respon2->data;

        $this->form_validation->set_rules(
            'nama',
            'Nama ayam',
            'required|min_length[3]|max_length[12]',
            array(
                'required' => '%s masih kosong!',
                'min_length' => '%s terlalu pendek, minimal 3 huruf!',
                'max_length' => '%s terlalu panjang, maksimal 12 huruf!'
            )
        );

        $this->form_validation->set_rules(
            'usia',
            'Usia ayam',
            'required|numeric',
            array(
                'required' => '%s masih kosong!',
                'numeric' => '%s diisi angka!',
            )
        );

        $this->form_validation->set_rules(
            'produksi',
            'Rata-rata produksi telur ayam',
            'required|numeric',
            array(
                'required' => '%s masih kosong!',
                'numeric' => '%s diisi angka!',
            )
        );

        $this->form_validation->set_rules(
            'id_kandang',
            'Kandang Ayam',
            'required',
            array(
                'required' => '%s belum dipilih!',
            )
        );

        $this->form_validation->set_rules(
            'kondisi',
            'Kondisi ayam',
            'required',
            array(
                'required' => '%s belum dipilih!',
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
                $this->load->view('ayam/edit', $data);
                $this->load->view('template/footer');
            } else {
                $data = array(
                    'id_ayam' => $this->input->post('id_ayam'),
                    'nama' => $this->input->post('nama'),
                    'usia' => $this->input->post('usia'),
                    'produksi' => $this->input->post('produksi'),
                    'id_kandang' => $this->input->post('id_kandang'),
                    'kondisi' => $this->input->post('kondisi'),
                );

                $update = $this->curl->simple_put($this->API1 . '/ayam', $data, array(CURLOPT_BUFFERSIZE => 10));

                if ($update) {
                    $this->session->set_flashdata('berhasil', 'diupdate!');
                } else {
                    $this->session->set_flashdata('gagal', 'diupdate!');
                }
                redirect('ayam');
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
            $this->load->view('ayam/edit', $data);
            $this->load->view('template/footer');
        }
    }

    public function hapusAyam($id)
    {
        if (empty($id)) {
            redirect('ayam');
        } else {
            $delete = $this->curl->simple_delete($this->API1 . '/ayam', array('id_ayam' => $id), array(CURLOPT_BUFFERSIZE => 10));
            if ($delete) {
                $this->session->set_flashdata('berhasil', 'dihapus!');
            } else {
                $this->session->set_flashdata('gagal', 'dihapus!');
            }
            redirect('ayam');
        }
    }
}

/* End of file Ayam.php */
