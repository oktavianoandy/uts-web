<?php

defined('BASEPATH') or exit('No direct script access allowed');

class TotalPemasukan_model extends CI_Model
{

    public function getTotalPemasukan($id = null)
    {
        $this->db->select('SUM(harga) as total FROM pemasukan');
        $query = $this->db->get();
        return $query->result_array();
    }
}

/* End of file TotalPemasukan_model.php */
