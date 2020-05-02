<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class TotalPemasukan extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('TotalPemasukan_model', 'totalpemasukan');
    }


    public function index_get()
    {
        $totalPemasukan = $this->totalpemasukan->getTotalPemasukan();
        
        if ($totalPemasukan) {
            # code...
            $this->response([
                'status' => true,
                'data' => $totalPemasukan
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

/* End of file TotalPemasukan.php */
