<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kandang_model extends CI_Model
{

    public function getKandang($id = null)
    {
        # code...
        if ($id === null) {
            # code...
            $this->db->select('kandang.*,count(ayam.id_kandang) as "jumlah"');
            $this->db->from('kandang');
            $this->db->join('ayam', 'ayam.id_kandang = kandang.id_kandang','left');
            $this->db->group_by('kandang.id_kandang');
            $query = $this->db->get();
            return $query->result_array();
        } else {
            # code...

            $this->db->select('kandang.*,count(ayam.id_kandang) as "jumlah ayam"');
            $this->db->from('kandang');
            $this->db->join('ayam', 'ayam.id_kandang = kandang.id_kandang','left');
            $this->db->where('kandang.id_kandang', $id);
            $this->db->group_by('kandang.id_kandang');
            $query = $this->db->get();
            return $query->result_array();
        }
    }

    public function deleteKandang($id)
    {
        # code...
        $this->db->delete('kandang', ['id_kandang' => $id]);
        return $this->db->affected_rows();
    }

    public function createKandang($data)
    {
        # code...
        $this->db->insert('kandang', $data);
        return $this->db->affected_rows();
    }

    public function updateKandang($data, $id)
    {
        # code...
        $this->db->update('kandang', $data, ['id_kandang' => $id]);
        return $this->db->affected_rows();
    }
    
}

/* End of file Kandang_model.php */
