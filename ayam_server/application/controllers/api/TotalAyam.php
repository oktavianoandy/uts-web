<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class TotalAyam extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('TotalAyam_model', 'totalayam');
    }


    public function index_get()
    {
        $TotalAyam = $this->totalayam->getTotalAyam();
        
        if ($TotalAyam) {
            # code...
            $this->response([
                'status' => true,
                'data' => $TotalAyam
            ], REST_Controller::HTTP_OK);
        } else {
            # code...
            $this->response([
                'status' => false,
                'message' => 'Id tidak ditemukan/salah!'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}

/* End of file TotalAyam.php */
