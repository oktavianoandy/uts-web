<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Produksi extends CI_Controller
{
    var $API1 = "";
    var $API2 = "";

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->API1 = "http://localhost:8080/uts_web/ayam_server/api/ayam";
        $this->API2 = "http://localhost:8080/uts_web/ayam_server/api/produksi";
        $this->API3 = "http://localhost:8080/uts_web/ayam_server/api/kandang";
        $this->API4 = "http://localhost:8080/uts_web/ayam_server/api/pegawai";
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
        $data['breadcrumbs'] = ' Aktivitas Peternakan / Produksi';
        $data['nama'] = $this->session->userdata('username');
        $respon1 = json_decode($this->curl->simple_get($this->API1 . '/ayam'));
        $data['ayam'] = $respon1->data;

        $respon2 = json_decode($this->curl->simple_get($this->API2 . '/produksi'));
        $data['produksi'] = $respon2->data;

        $this->load->view('template/header', $data);

        if ($this->session->userdata('level') == "Pegawai") {
            $this->load->view('template/sidebar_pegawai');
        } elseif ($this->session->userdata('level') == "Manajer") {
            $this->load->view('template/sidebar_manajer');
        } else {
            redirect('login', 'refresh');
        }
        $this->load->view('template/breadcrumbs', $data);
        $this->load->view('produksi/index', $data);
        $this->load->view('template/footer');
    }

    public function pilihKandang()
    {
        $data['title'] = 'Sistem Manajemen Peternakan Ayam';
        $data['judulHalaman'] = 'Aktivitas Peternakan';
        $data['breadcrumbs'] = ' Aktivitas Peternakan / Produksi / Tambah Produksi';

        $respon1 = json_decode($this->curl->simple_get($this->API3 . '/kandang'));
        $data['kandang'] = $respon1->data;

        $this->load->view('template/header', $data);

        if ($this->session->userdata('level') == "Pegawai") {
            $this->load->view('template/sidebar_pegawai');
        } elseif ($this->session->userdata('level') == "Manajer") {
            $this->load->view('template/sidebar_manajer');
        } else {
            redirect('login', 'refresh');
        }
        $this->load->view('template/breadcrumbs', $data);
        $this->load->view('produksi/pilih_kandang', $data);
        $this->load->view('template/footer');
    }

    public function pilihAyam()
    {
        $data['title'] = 'Sistem Manajemen Peternakan Ayam';
        $data['judulHalaman'] = 'Aktivitas Peternakan';
        $data['breadcrumbs'] = ' Aktivitas Peternakan / Produksi / Tambah Produksi';

        $respon1 = json_decode($this->curl->simple_get($this->API1 . '/ayam'));
        $data['ayam'] = $respon1->data;

        $params = array('id_kandang' => $this->uri->segment(3));
        $respon = json_decode($this->curl->simple_get($this->API3 . '/kandang', $params));
        $data['kandang'] = $respon->data;

        $this->load->view('template/header', $data);

        if ($this->session->userdata('level') == "Pegawai") {
            $this->load->view('template/sidebar_pegawai');
        } elseif ($this->session->userdata('level') == "Manajer") {
            $this->load->view('template/sidebar_manajer');
        } else {
            redirect('login', 'refresh');
        }
        $this->load->view('template/breadcrumbs', $data);
        $this->load->view('produksi/pilih_ayam', $data);
        $this->load->view('template/footer');
    }

    public function tambahProduksi($id)
    {
        $data['title'] = 'Sistem Manajemen Peternakan Ayam';
        $data['judulHalaman'] = 'Aktivitas Peternakan';
        $data['breadcrumbs'] = ' Aktivitas Peternakan / Produksi / Tambah Produksi';
        $data['nama'] = $this->session->userdata('username');

        $data['tanggal'] = date("Y-m-d");
        date_default_timezone_set("Asia/Jakarta");
        $data['waktu'] = date("H:i");

        $params = array('id_ayam' => $this->uri->segment(3));
        $respon = json_decode($this->curl->simple_get($this->API1 . '/ayam', $params));
        $data['ayam'] = $respon->data;

        $respon1 = json_decode($this->curl->simple_get($this->API4 . '/pegawai'));
        $data['pegawai'] = $respon1->data;

        $this->form_validation->set_rules(
            'jumlah',
            'Jumlah Telur',
            'required|numeric',
            array(
                'required' => '%s masih kosong!',
                'numeric' => '%s diisi angka!',
            )
        );

        $this->form_validation->set_rules(
            'tanggal',
            'Tanggal pengeluaran',
            'required',
            array(
                'required' => '%s masih kosong!',
            )
        );

        $this->form_validation->set_rules(
            'waktu',
            'Waktu pengeluaran',
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
                $this->load->view('produksi/tambah', $data);
                $this->load->view('template/footer');
            } else {
                $data = array(
                    'id_pemasukan' => $this->input->NULL,
                    'id_ayam' => $this->input->post('id_ayam'),
                    'jumlah' => $this->input->post('jumlah'),
                    'tanggal' => $this->input->post('tanggal'),
                    'waktu' => $this->input->post('waktu'),
                    'oleh' => $this->input->post('oleh'),
                );

                $insert = $this->curl->simple_post($this->API2 . '/produksi', $data, array(CURLOPT_BUFFERSIZE => 10));

                if ($insert) {
                    $this->session->set_flashdata('berhasil', 'ditambahkan!');
                } else {
                    $this->session->set_flashdata('gagal', 'ditambahkan!');
                }
                redirect('produksi/pilihAyam/' . $id);
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
            $this->load->view('produksi/tambah', $data);
            $this->load->view('template/footer');
        }
    }

    public function detailProduksi()
    {
        $data['title'] = 'Sistem Manajemen Peternakan Ayam';
        $data['judulHalaman'] = 'Aktivitas Peternakan';
        $data['breadcrumbs'] = ' Aktivitas Peternakan / Produksi / Detail Produksi';

        $params = array('id_produksi' => $this->uri->segment(3));
        $respon = json_decode($this->curl->simple_get($this->API2 . '/produksi', $params));
        $data['produksi'] = $respon->data;

        $respon = json_decode($this->curl->simple_get($this->API2 . '/produksi'));
        $data['produksiAll'] = $respon->data;

        $this->load->view('template/header', $data);
        if ($this->session->userdata('level') == "Pegawai") {
            $this->load->view('template/sidebar_pegawai');
        } elseif ($this->session->userdata('level') == "Manajer") {
            $this->load->view('template/sidebar_manajer');
        } else {
            redirect('login', 'refresh');
        }

        $this->load->view('template/breadcrumbs', $data);
        $this->load->view('produksi/detail', $data);
        $this->load->view('template/footer');
    }

    public function editProduksi()
    {
        $data['title'] = 'Sistem Manajemen Peternakan Ayam';
        $data['judulHalaman'] = 'Aktivitas Peternakan';
        $data['breadcrumbs'] = ' Aktivitas Peternakan / Produksi / Detail Produksi';

        $params = array('id_produksi' => $this->uri->segment(3));
        $respon = json_decode($this->curl->simple_get($this->API2 . '/produksi', $params));
        $data['produksi'] = $respon->data;
        
        $respon1 = json_decode($this->curl->simple_get($this->API4 . '/pegawai'));
        $data['pegawai'] = $respon1->data;

        $this->form_validation->set_rules(
            'jumlah',
            'Jumlah Telur',
            'required|numeric',
            array(
                'required' => '%s masih kosong!',
                'numeric' => '%s diisi angka!',
            )
        );

        $this->form_validation->set_rules(
            'tanggal',
            'Tanggal pengeluaran',
            'required',
            array(
                'required' => '%s masih kosong!',
            )
        );

        $this->form_validation->set_rules(
            'waktu',
            'Waktu pengeluaran',
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
                $this->load->view('produksi/edit', $data);
                $this->load->view('template/footer');
            } else {
                $data = array(
                    'id_produksi' => $this->input->post('id_produksi'),
                    'jumlah' => $this->input->post('jumlah'),
                    'tanggal' => $this->input->post('tanggal'),
                    'waktu' => $this->input->post('waktu'),
                    'oleh' => $this->input->post('oleh'),
                );

                $update = $this->curl->simple_put($this->API2 . '/produksi', $data, array(CURLOPT_BUFFERSIZE => 10));

                if ($update) {
                    $this->session->set_flashdata('berhasil', 'diubah!');
                } else {
                    $this->session->set_flashdata('gagal', 'diubah!');
                }
                redirect('produksi');
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
            $this->load->view('produksi/edit', $data);
            $this->load->view('template/footer');
        }
    }

    public function hapusProduksi($id)
    {
        if (empty($id)) {
            redirect('produksi');
        } else {
            $delete = $this->curl->simple_delete($this->API2 . '/produksi', array('id_produksi' => $id), array(CURLOPT_BUFFERSIZE => 10));
            if ($delete) {
                $this->session->set_flashdata('berhasil', 'dihapus!');
            } else {
                $this->session->set_flashdata('gagal', 'dihapus!');
            }
            redirect('produksi');
        }
    }

    public function laporan_pdf()
    {
        # code...
        $this->load->library('pdf');
        $respon2 = json_decode($this->curl->simple_get($this->API2 . '/produksi'));
        $data['produksi'] = $respon2->data;
        $data['judul'] = 'Laporan produksi keseluruhan';
        $this->load->library('pdf');

        $this->pdf->setPaper('A4','potrait');
        $this->pdf->filename = "laporan-produksi.pdf";
        $this->pdf->load_view('produksi/laporanAll',$data);
        
    }

    public function laporan_pdf2()
    {
        # code...
        $this->load->library('pdf');
        $respon2 = json_decode($this->curl->simple_get($this->API2 . '/produksi'));
        $data['produksi'] = $respon2->data;
        $data['judul'] = 'Laporan produksi hari ini';
        $data['tanggal'] = date("Y-m-d");
        $this->load->library('pdf');

        $this->pdf->setPaper('A4','potrait');
        $this->pdf->filename = "laporan-produksi.pdf";
        $this->pdf->load_view('produksi/laporan_today',$data);
        
    }

}

/* End of file Kandang.php */
