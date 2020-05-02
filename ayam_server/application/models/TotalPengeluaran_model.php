<?php

defined('BASEPATH') or exit('No direct script access allowed');

class TotalPengeluaran_model extends CI_Model
{

    public function getTotalPengeluaran($id = null)
    {
        $this->db->select('SUM(harga) as total FROM pengeluaran');
        $query = $this->db->get();
        return $query->result_array();
    }
}

/* End of file TotalPengeluaran_model.php */
