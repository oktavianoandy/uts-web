<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pemasukan extends CI_Controller
{
    var $API = "";

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->API1 = "http://localhost:8080/uts_web/ayam_server/api/pemasukan";
        $this->API2 = "http://localhost:8080/uts_web/ayam_server/api/pegawai";
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
        $data['judulHalaman'] = 'Aktivitas Peternakan';
        $data['breadcrumbs'] = ' Aktivitas Peternakan / Pemasukan';
        $data['nama'] = $this->session->userdata('username');

        $respon = json_decode($this->curl->simple_get($this->API1 . '/pemasukan'));
        $data['pemasukan'] = $respon->data;

        $this->load->view('template/header', $data);
        if ($this->session->userdata('level') == "Pegawai") {
            $this->load->view('template/sidebar_pegawai');
        } elseif ($this->session->userdata('level') == "Manajer") {
            $this->load->view('template/sidebar_manajer');
        } else {
            redirect('login', 'refresh');
        }
        $this->load->view('template/breadcrumbs', $data);
        $this->load->view('pemasukan/index', $data);
        $this->load->view('template/footer');
    }

    public function tambahPemasukan()
    {
        $data['title'] = 'Sistem Manajemen Peternakan Ayam';
        $data['judulHalaman'] = 'Aktivitas Peternakan';
        $data['breadcrumbs'] = ' Aktivitas Peternakan / Pemasukan / Tambah Pemasukan';
        $data['nama'] = $this->session->userdata('username');
        $data['tanggal'] = date("Y-m-d");
        date_default_timezone_set("Asia/Jakarta");
        $data['waktu'] = date("H:i");
        
        $respon = json_decode($this->curl->simple_get($this->API2 . '/pegawai'));
        $data['pegawai'] = $respon->data;

        $this->form_validation->set_rules(
            'nama',
            'Nama Pemasukan',
            'required',
            array(
                'required' => '%s masih kosong!',
            )
        );

        $this->form_validation->set_rules(
            'keterangan',
            'Keterangan',
            'required',
            array(
                'required' => '%s masih kosong!',
            )
        );

        $this->form_validation->set_rules(
            'harga',
            'Nominal pemasukan',
            'required|numeric',
            array(
                'required' => '%s masih kosong!',
                'numeric' => '%s diisi angka!',
            )
        );

        $this->form_validation->set_rules(
            'tanggal',
            'Tanggal pemasukan',
            'required',
            array(
                'required' => '%s masih kosong!',
            )
        );

        $this->form_validation->set_rules(
            'waktu',
            'Waktu pemasukan',
            'required',
            array(
                'required' => '%s masih kosong!',
            )
        );

        $this->form_validation->set_rules(
            'oleh',
            'Pegawai yang melakukan transaksi',
            'required',
            array(
                'required' => '%s masih kosong!',
            )
        );

        if (empty($_FILES['foto']['name'])) {
            $this->form_validation->set_rules(
                'foto',
                'Foto Kwitansi',
                'required',
                array(
                    'required' => '%s masih kosong!',
                )
            );
        }

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
                $this->load->view('pemasukan/tambah', $data);
                $this->load->view('template/footer');
            } else {
                $data = array(
                    'id_pemasukan' => $this->input->NULL,
                    'nama' => $this->input->post('nama'),
                    'keterangan' => $this->input->post('keterangan'),
                    'harga' => $this->input->post('harga'),
                    'tanggal' => $this->input->post('tanggal'),
                    'waktu' => $this->input->post('waktu'),
                    'oleh' => $this->input->post('oleh'),
                    'foto' => $this->uploadFoto(),
                );

                $insert = $this->curl->simple_post($this->API1 . '/pemasukan', $data, array(CURLOPT_BUFFERSIZE => 10));

                if ($insert) {
                    $this->session->set_flashdata('berhasil', 'ditambahkan!');
                } else {
                    $this->session->set_flashdata('gagal', 'ditambahkan!');
                }
                redirect('pemasukan');
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
            $this->load->view('pemasukan/tambah', $data);
            $this->load->view('template/footer');
        }
    }

    public function detailPemasukan()
    {
        $params = array('id_pemasukan' => $this->uri->segment(3));
        $respon = json_decode($this->curl->simple_get($this->API1 . '/pemasukan', $params));
        $data['pemasukan'] = $respon->data;

        $data['title'] = 'Sistem Manajemen Peternakan Ayam';
        $data['judulHalaman'] = 'Aktivitas Peternakan';
        $data['breadcrumbs'] = ' Aktivitas Peternakan / Pemasukan / Detail Pemasukan';
        $this->load->view('template/header', $data);
        if ($this->session->userdata('level') == "Pegawai") {
            $this->load->view('template/sidebar_pegawai');
        } elseif ($this->session->userdata('level') == "Manajer") {
            $this->load->view('template/sidebar_manajer');
        } else {
            redirect('login', 'refresh');
        }
        $this->load->view('template/breadcrumbs', $data);
        $this->load->view('pemasukan/detail', $data);
        $this->load->view('template/footer');
    }

    public function editPemasukan()
    {
        $data['title'] = 'Sistem Manajemen Peternakan Ayam';
        $data['judulHalaman'] = 'Aktivitas Peternakan';
        $data['breadcrumbs'] = ' Aktivitas Peternakan / Pemasukan / Edit Pemasukan';

        $params = array('id_pemasukan' => $this->uri->segment(3));
        $respon = json_decode($this->curl->simple_get($this->API1 . '/pemasukan', $params));
        $data['pemasukan'] = $respon->data;

        $respon2 = json_decode($this->curl->simple_get($this->API2 . '/pegawai'));
        $data['pegawai'] = $respon2->data;

        $this->form_validation->set_rules(
            'nama',
            'Nama Pemasukan',
            'required',
            array(
                'required' => '%s masih kosong!',
            )
        );

        $this->form_validation->set_rules(
            'keterangan',
            'Keterangan',
            'required',
            array(
                'required' => '%s masih kosong!',
            )
        );

        $this->form_validation->set_rules(
            'harga',
            'Nominal pemasukan',
            'required|numeric',
            array(
                'required' => '%s masih kosong!',
                'numeric' => '%s diisi angka!',
            )
        );

        $this->form_validation->set_rules(
            'tanggal',
            'Tanggal pemasukan',
            'required',
            array(
                'required' => '%s masih kosong!',
            )
        );

        $this->form_validation->set_rules(
            'waktu',
            'Waktu pemasukan',
            'required',
            array(
                'required' => '%s masih kosong!',
            )
        );

        $this->form_validation->set_rules(
            'oleh',
            'Pegawai yang melakukan transaksi',
            'required',
            array(
                'required' => '%s masih kosong!',
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
                $this->load->view('pemasukan/edit', $data);
                $this->load->view('template/footer');
            } else {
                $data = array(
                    'id_pemasukan' => $this->input->post('id_pemasukan'),
                    'nama' => $this->input->post('nama'),
                    'keterangan' => $this->input->post('keterangan'),
                    'harga' => $this->input->post('harga'),
                    'tanggal' => $this->input->post('tanggal'),
                    'waktu' => $this->input->post('waktu'),
                    'oleh' => $this->input->post('oleh'),
                    'foto' => $this->ubahFoto(),
                );

                $update = $this->curl->simple_put($this->API1 . '/pemasukan', $data, array(CURLOPT_BUFFERSIZE => 10));

                if ($update) {
                    $this->session->set_flashdata('berhasil', 'diubah!');
                } else {
                    $this->session->set_flashdata('gagal', 'diubah!');
                }
                redirect('pemasukan');
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
            $this->load->view('pemasukan/edit', $data);
            $this->load->view('template/footer');
        }
    }

    public function hapusPemasukan($id)
    {
        if (empty($id)) {
            redirect('pemasukan');
        } else {
            $delete = $this->curl->simple_delete($this->API1 . '/pemasukan', array('id_pemasukan' => $id), array(CURLOPT_BUFFERSIZE => 10));
            if ($delete) {
                $this->session->set_flashdata('berhasil', 'dihapus!');
            } else {
                $this->session->set_flashdata('gagal', 'dihapus!');
            }
            redirect('pemasukan');
        }
    }

    private function uploadFoto()
    {
        $config['upload_path']          = './uploads/pemasukan';
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

    public function laporan_pdf()
    {
        # code...
        $this->load->library('pdf');
        $respon = json_decode($this->curl->simple_get($this->API1 . '/pemasukan'));
        $data['pemasukan'] = $respon->data;
        $data['judul'] = 'Laporan pemasukan keseluruhan';
        $this->load->library('pdf');

        $this->pdf->setPaper('A4','potrait');
        $this->pdf->filename = "laporan-pemasukan.pdf";
        $this->pdf->load_view('pemasukan/laporanAll',$data);
        
    }

    public function laporan_pdf2()
    {
        # code...
        $this->load->library('pdf');
        $respon = json_decode($this->curl->simple_get($this->API1 . '/pemasukan'));
        $data['pemasukan'] = $respon->data;
        $data['judul'] = 'Laporan pemasukan hari ini';
        $data['tanggal'] = date("Y-m-d");
        $this->load->library('pdf');

        $this->pdf->setPaper('A4','potrait');
        $this->pdf->filename = "laporan-pemasukan.pdf";
        $this->pdf->load_view('pemasukan/laporan_today',$data);
    }
}

/* End of file Pemasukan.php */
