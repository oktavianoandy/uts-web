<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Produksi extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('Produksi_model', 'produksi');
    }


    public function index_get()
    {
        $id = $this->get('id_produksi');
        if ($id === null) {
            # code...
            $produksi = $this->produksi->getProduksi();
        } else {
            # code...
            $produksi = $this->produksi->getProduksi($id);
        }

        if ($produksi) {
            # code...
            $this->response([
                'status' => true,
                'data' => $produksi
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
        $id = $this->delete('id_produksi');

        if ($id === null) {
            # code...
            $this->response([
                'status' => false,
                'message' => 'provide an id!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            # code...
            if ($this->produksi->deleteProduksi($id) > 0) {
                # code...
                //ok
                $this->response([
                    'status' => true,
                    'id_produksi' => $id,
                    'message' => 'Data Produksi berhasil dihapus'
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
            'id_ayam' => $this->input->post('id_ayam'),
            'jumlah' => $this->input->post('jumlah'),
            'tanggal' => $this->input->post('tanggal'),
            'waktu' => $this->input->post('waktu'),
            'oleh' => $this->input->post('oleh'),
        ];

        if ($this->produksi->createProduksi($data) > 0) {
            # code...
            $this->response([
                'status' => true,
                'message' => 'Data Produksi berhasil diinputkan!'
            ], REST_Controller::HTTP_CREATED);
        } else {
            # code...
            //id not found
            $this->response([
                'status' => false,
                'message' => 'Gagal memasukkan data Produksi!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
        
    }

    public function index_put()
    {
        # code...
        $id = $this->put('id_produksi');
        $data = [
            'jumlah' => $this->put('jumlah'),
            'tanggal' => $this->put('tanggal'),
            'waktu' => $this->put('waktu'),
            'oleh' => $this->put('oleh'),
        ];
        
        if ($this->produksi->updateProduksi($data, $id) > 0) {
            # code...
            $this->response([
                'status' => true,
                'message' => 'Data produksi berhasil diupdate'
            ], REST_Controller::HTTP_CREATED);
        } else {
            # code...
            //id not found
            $this->response([
                'status' => false,
                'message' => 'Gagal mengupdate data Produksi!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}

/* End of file Produksi.php */
