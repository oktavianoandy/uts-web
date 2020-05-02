<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Ayam_model extends CI_Model
{

    public function getAyam($id = null)
    {
        # code...
        if ($id === null) {
            # code...
            $this->db->select('ayam.*, kandang.nama as kandang');
            $this->db->from('ayam');
            $this->db->join('kandang', 'ayam.id_kandang = kandang.id_kandang');
            $query = $this->db->get();
            return $query->result_array();
        } else {
            # code...
            $this->db->select('ayam.*, kandang.nama as kandang');
            $this->db->from('ayam');
            $this->db->join('kandang', 'ayam.id_kandang = kandang.id_kandang');
            $this->db->where('id_ayam', $id);
            $query = $this->db->get();
            return $query->result_array();
        }
    }

    public function deleteAyam($id)
    {
        # code...
        $this->db->delete('ayam', ['id_ayam' => $id]);
        return $this->db->affected_rows();
    }

    public function createAyam($data)
    {
        # code...
        $this->db->insert('ayam', $data);
        return $this->db->affected_rows();
    }

    public function updateAyam($data, $id)
    {
        # code...
        $this->db->update('ayam', $data, ['id_ayam' => $id]);
        return $this->db->affected_rows();
    }
}

/* End of file Ayam_model.php */
