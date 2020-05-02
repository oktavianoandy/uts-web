<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Pegawai extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('Pegawai_model', 'pegawai');
    }


    public function index_get()
    {
        $id = $this->get('id_pegawai');
        if ($id === null) {
            # code...
            $pegawai = $this->pegawai->getPegawai();
        } else {
            # code...
            $pegawai = $this->pegawai->getPegawai($id);
        }

        if ($pegawai) {
            # code...
            $this->response([
                'status' => true,
                'data' => $pegawai
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
        $id = $this->delete('id_pegawai');

        if ($id === null) {
            # code...
            $this->response([
                'status' => false,
                'message' => 'Id tidak ditemukan/salah!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            # code...
            if ($this->pegawai->deletePegawai($id) > 0) {
                # code...
                //ok
                $this->response([
                    'status' => true,
                    'id_pegawai' => $id,
                    'message' => 'Data Pegawai berhasil dihapus'
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
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'no_hp' => $this->input->post('no_hp'),
            'alamat' => $this->input->post('alamat'),
            'foto' => $this->input->post('foto'),
            'status' => $this->input->post('status'),
        ];

        if ($this->pegawai->createPegawai($data) > 0) {
            # code...
            $this->response([
                'status' => true,
                'message' => 'Data Pegawai berhasil diinputkan!'
            ], REST_Controller::HTTP_CREATED);
        } else {
            # code...
            //id not found
            $this->response([
                'status' => false,
                'message' => 'Gagal memasukkan data Pegawai!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
        
    }

    public function index_put()
    {
        # code...
        $id = $this->put('id_pegawai');
        $data = [
            'nama' => $this->put('nama'),
            'jenis_kelamin' => $this->put('jenis_kelamin'),
            'no_hp' => $this->put('no_hp'),
            'alamat' => $this->put('alamat'),
            'foto' => $this->put('foto'),
            'status' => $this->put('status'),
        ];
        
        if ($this->pegawai->updatePegawai($data, $id) > 0) {
            # code...
            $this->response([
                'status' => true,
                'message' => 'Data pegawai berhasil diupdate'
            ], REST_Controller::HTTP_CREATED);
        } else {
            # code...
            //id not found
            $this->response([
                'status' => false,
                'message' => 'Gagal mengupdate data Pegawai!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}

/* End of file Pegawai.php */
