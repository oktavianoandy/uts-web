<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Kandang extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('Kandang_model', 'kandang');
    }


    public function index_get()
    {
        $id = $this->get('id_kandang');
        if ($id === null) {
            # code...
            $kandang = $this->kandang->getKandang();
        } else {
            # code...
            $kandang = $this->kandang->getKandang($id);
        }

        if ($kandang) {
            # code...
            $this->response([
                'status' => true,
                'data' => $kandang
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
        $id = $this->delete('id_kandang');

        if ($id === null) {
            # code...
            $this->response([
                'status' => false,
                'message' => 'provide an id!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            # code...
            if ($this->kandang->deleteKandang($id) > 0) {
                # code...
                //ok
                $this->response([
                    'status' => true,
                    'id_kandang' => $id,
                    'message' => 'Data Kandang berhasil dihapus'
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
            'kapasitas' => $this->input->post('kapasitas'),
        ];

        if ($this->kandang->createKandang($data) > 0) {
            # code...
            $this->response([
                'status' => true,
                'message' => 'Data Kandang berhasil diinputkan!'
            ], REST_Controller::HTTP_CREATED);
        } else {
            # code...
            //id not found
            $this->response([
                'status' => false,
                'message' => 'Gagal memasukkan data Kandang!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
        
    }

    public function index_put()
    {
        # code...
        $id = $this->put('id_kandang');
        $data = [
            'id_kandang' => $this->put('id_kandang'),
            'nama' => $this->put('nama'),
            'kapasitas' => $this->put('kapasitas'),
        ];

        if ($this->kandang->updateKandang($data, $id) > 0) {
            # code...
            $this->response([
                'status' => true,
                'message' => 'Data kandang berhasil diupdate'
            ], REST_Controller::HTTP_CREATED);
        } else {
            # code...
            //id not found
            $this->response([
                'status' => false,
                'message' => 'Gagal mengupdate data Kandang!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}

/* End of file Kandang.php */
