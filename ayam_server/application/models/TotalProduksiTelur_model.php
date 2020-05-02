<?php

defined('BASEPATH') or exit('No direct script access allowed');

class TotalProduksiTelur_model extends CI_Model
{

    public function getTotalProduksiTelur($id = null)
    {
        $this->db->select('SUM(jumlah) as total FROM produksi');
        $query = $this->db->get();
        return $query->result_array();
    }
}

/* End of file TotalJualTelur_model.php */
