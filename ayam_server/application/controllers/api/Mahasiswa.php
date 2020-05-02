<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Mahasiswa extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('Mahasiswa_model', 'mahasiswa');
    }


    public function index_get()
    {
        $id = $this->get('id');
        if ($id === null) {
            # code...
            $mahasiswa = $this->mahasiswa->getMahasiswa();
        } else {
            # code...
            $mahasiswa = $this->mahasiswa->getMahasiswa($id);
        }

        if ($mahasiswa) {
            # code...
            $this->response([
                'status' => true,
                'data' => $mahasiswa
            ], REST_Controller::HTTP_OK);
        } else {
            # code...
            $this->response([
                'status' => false,
                'message' => 'id not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_delete()
    {
        # code...
        $id = $this->delete('id');

        if ($id === null) {
            # code...
            $this->response([
                'status' => false,
                'message' => 'provide an id!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            # code...
            if ($this->mahasiswa->deleteMahasiswa($id) > 0) {
                # code...
                //ok
                $this->response([
                    'status' => true,
                    'id' => $id,
                    'message' => 'deleted'
                ], REST_Controller::HTTP_OK);
            }else {
                #code
                //id not found
                $this->response([
                    'status' => false,
                    'message' => 'id not found!'
                ], REST_Controller::HTTP_BAD_REQUEST);
                
            }
        }
    }

    public function index_post()
    {
        # code...
        $data = [
            'nrp' => $this->input->post('nrp'),
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'jurusan' => $this->input->post('jurusan'),
        ];

        if ($this->mahasiswa->createMahasiswa($data) > 0) {
            # code...
            $this->response([
                'status' => true,
                'message' => 'new mahasiswa has been created'
            ], REST_Controller::HTTP_CREATED);
        } else {
            # code...
            //id not found
            $this->response([
                'status' => false,
                'message' => 'failed to create new data!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
        
    }

    public function index_put()
    {
        # code...
        $id = $this->put('id');
        $data = [
            'nrp' => $this->put('nrp'),
            'nama' => $this->put('nama'),
            'email' => $this->put('email'),
            'jurusan' => $this->put('jurusan'),
        ];

        if ($this->mahasiswa->updateMahasiswa($data, $id) > 0) {
            # code...
            $this->response([
                'status' => true,
                'message' => 'new mahasiswa has been updated'
            ], REST_Controller::HTTP_CREATED);
        } else {
            # code...
            //id not found
            $this->response([
                'status' => false,
                'message' => 'failed to update data!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}

/* End of file Mahasiswa.php */
