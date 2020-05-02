<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Produksi_model extends CI_Model
{

    public function getProduksi($id = null)
    {
        # code...
        if ($id === null) {
            # code...
            $this->db->select(
                'produksi.id_produksi,
                produksi.id_ayam, 
                ayam.nama,
                produksi.jumlah,
                produksi.tanggal,
                produksi.waktu,
                produksi.oleh'
            );
            $this->db->from('produksi');
            $this->db->join('ayam', 'ayam.id_ayam = produksi.id_ayam');
            $query = $this->db->get();
            return $query->result_array();
        } else {
            # code...
            $this->db->select(
                'produksi.id_produksi, 
                produksi.id_ayam,
                ayam.nama,
                produksi.jumlah,
                produksi.tanggal,
                produksi.waktu,
                produksi.oleh'
            );
            $this->db->from('produksi');
            $this->db->join('ayam', 'ayam.id_ayam = produksi.id_ayam');
            $this->db->where('id_produksi', $id);
            $query = $this->db->get();
            return $query->result_array();
        }
    }

    public function deleteProduksi($id)
    {
        # code...
        $this->db->delete('produksi', ['id_produksi' => $id]);
        return $this->db->affected_rows();
    }

    public function createProduksi($data)
    {
        # code...
        $this->db->insert('produksi', $data);
        return $this->db->affected_rows();
    }

    public function updateProduksi($data, $id)
    {
        # code...
        $this->db->update('produksi', $data, ['id_produksi' => $id]);
        return $this->db->affected_rows();
    }
}

/* End of file Produksi_model.php */
