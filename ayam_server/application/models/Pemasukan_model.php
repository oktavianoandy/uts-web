<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pemasukan_model extends CI_Model
{

    public function getPemasukan($id = null)
    {
        # code...
        if ($id === null) {
            # code...
            return $this->db->get('pemasukan')->result_array();
        } else {
            # code...
            return $this->db->get_where('pemasukan', ['id_pemasukan' => $id])->result_array();
        }
    }

    public function deletePemasukan($id)
    {
        # code...
        $this->db->delete('pemasukan', ['id_pemasukan' => $id]);
        return $this->db->affected_rows();
    }

    public function createPemasukan($data)
    {
        # code...
        $this->db->insert('pemasukan', $data);
        return $this->db->affected_rows();
    }

    public function updatePemasukan($data, $id)
    {
        # code...
        $this->db->update('pemasukan', $data, ['id_pemasukan' => $id]);
        return $this->db->affected_rows();
    }
}

/* End of file Pemasukan_model.php */
