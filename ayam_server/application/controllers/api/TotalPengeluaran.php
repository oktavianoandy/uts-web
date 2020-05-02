<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class TotalPengeluaran extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('TotalPengeluaran_model', 'totalpengeluaran');
    }


    public function index_get()
    {
        $TotalPengeluaran = $this->totalpengeluaran->getTotalPengeluaran();
        
        if ($TotalPengeluaran) {
            # code...
            $this->response([
                'status' => true,
                'data' => $TotalPengeluaran
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

/* End of file TotalPengeluaran.php */
