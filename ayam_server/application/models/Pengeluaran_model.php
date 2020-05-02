<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengeluaran_model extends CI_Model
{

    public function getPengeluaran($id = null)
    {
        # code...
        if ($id === null) {
            # code...
            return $this->db->get('pengeluaran')->result_array();
        } else {
            # code...
            return $this->db->get_where('pengeluaran', ['id_pengeluaran' => $id])->result_array();
        }
    }

    public function deletePengeluaran($id)
    {
        # code...
        $this->db->delete('pengeluaran', ['id_pengeluaran' => $id]);
        return $this->db->affected_rows();
    }

    public function createPengeluaran($data)
    {
        # code...
        $this->db->insert('pengeluaran', $data);
        return $this->db->affected_rows();
    }

    public function updatePengeluaran($data, $id)
    {
        # code...
        $this->db->update('pengeluaran', $data, ['id_pengeluaran' => $id]);
        return $this->db->affected_rows();
    }
}

/* End of file Pengeluaran_model.php */
