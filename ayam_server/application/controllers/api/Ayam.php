<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Ayam extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('Ayam_model', 'ayam');
    }


    public function index_get()
    {
        $id = $this->get('id_ayam');
        if ($id === null) {
            # code...
            $ayam = $this->ayam->getAyam();
        } else {
            # code...
            $ayam = $this->ayam->getAyam($id);
        }

        if ($ayam) {
            # code...
            $this->response([
                'status' => true,
                'data' => $ayam
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
        $id = $this->delete('id_ayam');

        if ($id === null) {
            # code...
            $this->response([
                'status' => false,
                'message' => 'provide an id!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            # code...
            if ($this->ayam->deleteAyam($id) > 0) {
                # code...
                //ok
                $this->response([
                    'status' => true,
                    'id_ayam' => $id,
                    'message' => 'Data Ayam berhasil dihapus'
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
            'usia' => $this->input->post('usia'),
            'produksi' => $this->input->post('produksi'),
            'id_kandang' => $this->input->post('id_kandang'),
            'kondisi' => $this->input->post('kondisi'),
        ];

        if ($this->ayam->createAyam($data) > 0) {
            # code...
            $this->response([
                'status' => true,
                'message' => 'Data Ayam berhasil diinputkan!'
            ], REST_Controller::HTTP_CREATED);
        } else {
            # code...
            //id not found
            $this->response([
                'status' => false,
                'message' => 'Gagal memasukkan data Ayam!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
        
    }

    public function index_put()
    {
        # code...
        $id = $this->put('id_ayam');
        $data = [
            'nama' => $this->put('nama'),
            'usia' => $this->put('usia'),
            'produksi' => $this->put('produksi'),
            'id_kandang' => $this->put('id_kandang'),
            'kondisi' => $this->put('kondisi'),
        ];
        
        if ($this->ayam->updateAyam($data, $id) > 0) {
            # code...
            $this->response([
                'status' => true,
                'message' => 'Data ayam berhasil diupdate'
            ], REST_Controller::HTTP_CREATED);
        } else {
            # code...
            //id not found
            $this->response([
                'status' => false,
                'message' => 'Gagal mengupdate data Ayam!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}

/* End of file Ayam.php */
