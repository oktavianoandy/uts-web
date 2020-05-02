<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Pemasukan extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('Pemasukan_model', 'pemasukan');
    }


    public function index_get()
    {
        $id = $this->get('id_pemasukan');
        if ($id === null) {
            # code...
            $pemasukan = $this->pemasukan->getPemasukan();
        } else {
            # code...
            $pemasukan = $this->pemasukan->getPemasukan($id);
        }

        if ($pemasukan) {
            # code...
            $this->response([
                'status' => true,
                'data' => $pemasukan
            ], REST_Controller::HTTP_OK);
        } else {
            # code...
            $this->response([
                'status' => false,
                'message' => 'Id tidak ditemukan/salah!'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_delete()
    {
        # code...
        $id = $this->delete('id_pemasukan');

        if ($id === null) {
            # code...
            $this->response([
                'status' => false,
                'message' => 'provide an id!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            # code...
            if ($this->pemasukan->deletePemasukan($id) > 0) {
                # code...
                //ok
                $this->response([
                    'status' => true,
                    'id_pemasukan' => $id,
                    'message' => 'Data Pemasukan berhasil dihapus'
                ], REST_Controller::HTTP_OK);
            }else {
                #code
                //id not found
                $this->response([
                    'status' => false,
                    'message' => 'Id tidak ditemukan/salah!'
                ], REST_Controller::HTTP_BAD_REQUEST);
                
            }
        }
    }

    public function index_post()
    {
        # code...
        $data = [
            'nama' => $this->input->post('nama'),
            'keterangan' => $this->input->post('keterangan'),
            'harga' => $this->input->post('harga'),
            'foto' => $this->input->post('foto'),
            'tanggal' => $this->input->post('tanggal'),
            'waktu' => $this->input->post('waktu'),
            'oleh' => $this->input->post('oleh'),
        ];

        if ($this->pemasukan->createPemasukan($data) > 0) {
            # code...
            $this->response([
                'status' => true,
                'message' => 'Data Pemasukan berhasil diinputkan!'
            ], REST_Controller::HTTP_CREATED);
        } else {
            # code...
            //id not found
            $this->response([
                'status' => false,
                'message' => 'Gagal memasukkan data Pemasukan!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
        
    }

    public function index_put()
    {
        # code...
        $id = $this->put('id_pemasukan');
        $data = [
            'nama' => $this->put('nama'),
            'keterangan' => $this->put('keterangan'),
            'harga' => $this->put('harga'),
            'foto' => $this->put('foto'),
            'tanggal' => $this->put('tanggal'),
            'waktu' => $this->put('waktu'),
            'oleh' => $this->put('oleh'),
        ];
        
        if ($this->pemasukan->updatePemasukan($data, $id) > 0) {
            # code...
            $this->response([
                'status' => true,
                'message' => 'Data pemasukan berhasil diupdate'
            ], REST_Controller::HTTP_CREATED);
        } else {
            # code...
            //id not found
            $this->response([
                'status' => false,
                'message' => 'Gagal mengupdate data Pemasukan!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}

/* End of file Pemasukan.php */
