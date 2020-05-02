<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{
    var $API = "";

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

        $respon = json_decode($this->curl->simple_get($this->API . '/pegawai'));
        $data['pegawai'] = $respon->data;

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar_manajer');
        $this->load->view('template/breadcrumbs', $data);
        $this->load->view('pegawai/index', $data);
        $this->load->view('template/footer');
    }

    public function tambahPegawai()
    {
        # code...
        $data['title'] = 'Sistem Manajemen Peternakan Ayam';
        $data['judulHalaman'] = 'Data Pegawai';
        $data['breadcrumbs'] = 'Data Pegawai/ Pegawai / Tambah Pegawai';

        $this->form_validation->set_rules(
            'nama',
            'Nama pegawai',
            'required|min_length[3]|max_length[30]',
            array(
                'required' => '%s masih kosong!',
                'min_lenght' => '%s terlalu pendek. Minimal 2 huruf!',
                'max_lenght' => '%s terlalu panjang. Maksimal 30 huruf!',
            )
        );

        $this->form_validation->set_rules(
            'no_hp',
            'Nomor Handphone',
            'required|numeric|min_length[10]',
            array(
                'required' => '%s masih kosong!',
                'numeric' => '%s harus angka!',
                'min_length' => '%s terlalu pendek. Minimal 10 angka!',
            )
        );

        $this->form_validation->set_rules(
            'alamat',
            'Alamat',
            'required',
            array(
                'required' => '%s masih kosong!',
            )
        );

        $this->form_validation->set_rules(
            'status',
            'Status',
            'required',
            array(
                'required' => '%s belum dipilih!',
            )
        );

        if (empty($_FILES['foto']['name'])) {
            $this->form_validation->set_rules(
                'foto',
                'Foto pegawai',
                'required',
                array(
                    'required' => '%s masih kosong!',
                )
            );
        }

        if (isset($_POST)) {
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
                $this->load->view('pegawai/tambah', $data);
                $this->load->view('template/footer');
            } else {
                $data = array(
                    'id_pegawai' => $this->input->NULL,
                    'nama' => $this->input->post('nama'),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                    'no_hp' => $this->input->post('no_hp'),
                    'alamat' => $this->input->post('alamat'),
                    'status' => $this->input->post('status'),
                    'foto' => $this->uploadFoto(),
                );

                $insert = $this->curl->simple_post($this->API . '/pegawai', $data, array(CURLOPT_BUFFERSIZE => 10));

                if ($insert) {
                    $this->session->set_flashdata('berhasil', 'ditambahkan!');
                } else {
                    $this->session->set_flashdata('gagal', 'ditambahkan!');
                }
                redirect('pegawai');
            }
        } else {
            # code...
            $this->load->view('template/header', $data);
            if ($this->session->userdata('level') == "Pegawai") {
                $this->load->view('template/sidebar_pegawai');
            } elseif ($this->session->userdata('level') == "Manajer") {
                $this->load->view('template/sidebar_manajer');
            } else {
                redirect('login', 'refresh');
            }
            $this->load->view('template/breadcrumbs', $data);
            $this->load->view('pegawai/tambah', $data);
            $this->load->view('template/footer');
        }
    }

    public function detailPegawai()
    {
        $params = array('id_pegawai' => $this->uri->segment(3));
        $respon = json_decode($this->curl->simple_get($this->API . '/pegawai', $params));
        $data['pegawai'] = $respon->data;

        $data['title'] = 'Sistem Manajemen Peternakan Ayam';
        $data['judulHalaman'] = 'Data Pegawai';
        $data['breadcrumbs'] = ' Data Pegawai / Pegawai / Detail Pegawai';
        $this->load->view('template/header', $data);
        if ($this->session->userdata('level') == "Pegawai") {
            $this->load->view('template/sidebar_pegawai');
        } elseif ($this->session->userdata('level') == "Manajer") {
            $this->load->view('template/sidebar_manajer');
        } else {
            redirect('login', 'refresh');
        }
        $this->load->view('template/breadcrumbs', $data);
        $this->load->view('pegawai/detail', $data);
        $this->load->view('template/footer');
    }

    public function editPegawai()
    {
        $data['title'] = 'Sistem Manajemen Peternakan Ayam';
        $data['judulHalaman'] = 'Aktivitas Peternakan';
        $data['breadcrumbs'] = ' Aktivitas Peternakan / Pegawai / Edit Pegawai';
        $data['status'] = ['Manajer','Pegawai'];
        
        $params = array('id_pegawai' => $this->uri->segment(3));
        $respon = json_decode($this->curl->simple_get($this->API . '/pegawai', $params));
        $data['pegawai'] = $respon->data;

        $this->form_validation->set_rules(
            'nama',
            'Nama pegawai',
            'required|min_length[3]|max_length[30]',
            array(
                'required' => '%s masih kosong!',
                'min_lenght' => '%s terlalu pendek. Minimal 2 huruf!',
                'max_lenght' => '%s terlalu panjang. Maksimal 30 huruf!',
            )
        );

        $this->form_validation->set_rules(
            'no_hp',
            'Nomor Handphone',
            'required|numeric|min_length[10]',
            array(
                'required' => '%s masih kosong!',
                'numeric' => '%s harus angka!',
                'min_lenght' => '%s terlalu pendek. Minimal 10 angka!',
            )
        );

        $this->form_validation->set_rules(
            'alamat',
            'Alamat',
            'required',
            array(
                'required' => '%s masih kosong!',
            )
        );

        $this->form_validation->set_rules(
            'status',
            'Status',
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
                $this->load->view('pegawai/edit', $data);
                $this->load->view('template/footer');
            } else {
                $data = array(
                    'id_pegawai' => $this->input->post('id_pegawai'),
                    'nama' => $this->input->post('nama'),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                    'no_hp' => $this->input->post('no_hp'),
                    'alamat' => $this->input->post('alamat'),
                    'status' => $this->input->post('status'),
                    'foto' => $this->ubahFoto(),
                );

                $update = $this->curl->simple_put($this->API . '/pegawai', $data, array(CURLOPT_BUFFERSIZE => 10));

                if ($update) {
                    $this->session->set_flashdata('berhasil', 'diubah!');
                } else {
                    $this->session->set_flashdata('gagal', 'diubah!');
                }
                redirect('pegawai');
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
            $this->load->view('pegawai/edit', $data);
            $this->load->view('template/footer');
        }
    }

    public function hapusPegawai($id)
    {
        if (empty($id)) {
            redirect('pegawai');
        } else {
            $delete = $this->curl->simple_delete($this->API . '/pegawai', array('id_pegawai' => $id), array(CURLOPT_BUFFERSIZE => 10));
            if ($delete) {
                $this->session->set_flashdata('berhasil', 'dihapus!');
            } else {
                $this->session->set_flashdata('gagal', 'dihapus!');
            }
            redirect('pegawai');
        }
    }

    private function uploadFoto()
    {
        $config['upload_path']          = './uploads/pegawai';
        $config['allowed_types']        = 'jpeg|jpg|png|gif|svg';
        $config['max_size']             = '2048';

        $this->upload->initialize($config);

        if ($this->upload->do_upload('foto')) {
            return $this->upload->data('file_name');
        }
    }

    private function ubahFoto()
    {
        if (empty($_FILES['foto']['name'])) {
            $foto = $this->input->post('fotoLama');
        } else {
            $foto = $this->uploadFoto();
        }
        return $foto;
    }
}

/* End of file Pegawai.php */
