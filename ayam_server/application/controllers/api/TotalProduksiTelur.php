<?php
defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class TotalProduksiTelur extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('TotalProduksiTelur_model', 'totalproduksitelur');
    }


    public function index_get()
    {
        $TotalJualTelur = $this->totalproduksitelur->getTotalProduksiTelur();
        
        if ($TotalJualTelur) {
            # code...
            $this->response([
                'status' => true,
                'data' => $TotalJualTelur
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

/* End of file TotalJualTelur.php */
