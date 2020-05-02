<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Pengeluaran extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('Pengeluaran_model', 'pengeluaran');
    }


    public function index_get()
    {
        $id = $this->get('id_pengeluaran');
        if ($id === null) {
            # code...
            $pengeluaran = $this->pengeluaran->getPengeluaran();
        } else {
            # code...
            $pengeluaran = $this->pengeluaran->getPengeluaran($id);
        }

        if ($pengeluaran) {
            # code...
            $this->response([
                'status' => true,
                'data' => $pengeluaran
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
        $id = $this->delete('id_pengeluaran');

        if ($id === null) {
            # code...
            $this->response([
                'status' => false,
                'message' => 'provide an id!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            # code...
            if ($this->pengeluaran->deletePengeluaran($id) > 0) {
                # code...
                //ok
                $this->response([
                    'status' => true,
                    'id_pengeluaran' => $id,
                    'message' => 'Data Pengeluaran berhasil dihapus'
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

        if ($this->pengeluaran->createPengeluaran($data) > 0) {
            # code...
            $this->response([
                'status' => true,
                'message' => 'Data Pengeluaran berhasil diinputkan!'
            ], REST_Controller::HTTP_CREATED);
        } else {
            # code...
            //id not found
            $this->response([
                'status' => false,
                'message' => 'Gagal memasukkan data Pengeluaran!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
        
    }

    public function index_put()
    {
        # code...
        $id = $this->put('id_pengeluaran');
        $data = [
            'nama' => $this->put('nama'),
            'keterangan' => $this->put('keterangan'),
            'harga' => $this->put('harga'),
            'foto' => $this->put('foto'),
            'tanggal' => $this->put('tanggal'),
            'waktu' => $this->put('waktu'),
            'oleh' => $this->put('oleh'),
        ];
        
        if ($this->pengeluaran->updatePengeluaran($data, $id) > 0) {
            # code...
            $this->response([
                'status' => true,
                'message' => 'Data pengeluaran berhasil diupdate'
            ], REST_Controller::HTTP_CREATED);
        } else {
            # code...
            //id not found
            $this->response([
                'status' => false,
                'message' => 'Gagal mengupdate data Pengeluaran!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}

/* End of file Pengeluaran.php */
