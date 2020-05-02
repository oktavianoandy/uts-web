<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai_model extends CI_Model
{

    public function getPegawai($id = null)
    {
        # code...
        if ($id === null) {
            # code...
            return $this->db->get('pegawai')->result_array();
        } else {
            # code...
            return $this->db->get_where('pegawai', ['id_pegawai' => $id])->result_array();
        }
    }

    public function deletePegawai($id)
    {
        # code...
        $this->db->delete('pegawai', ['id_pegawai' => $id]);
        return $this->db->affected_rows();
    }

    public function createPegawai($data)
    {
        # code...
        $this->db->insert('pegawai', $data);
        return $this->db->affected_rows();
    }

    public function updatePegawai($data, $id)
    {
        # code...
        $this->db->update('pegawai', $data, ['id_pegawai' => $id]);
        return $this->db->affected_rows();
    }
}

/* End of file Pegawai_model.php */
