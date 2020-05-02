<?php

defined('BASEPATH') or exit('No direct script access allowed');

class TotalAyam_model extends CI_Model
{

    public function getTotalAyam($id = null)
    {
        $this->db->select('COUNT(id_ayam) as total FROM ayam');
        $query = $this->db->get();
        return $query->result_array();
    }
}

/* End of file TotalAyam_model.php */
