<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model
{

    public function getMahasiswa($id = null)
    {
        # code...
        if ($id === null) {
            # code...
            return $this->db->get('mahasiswa')->result_array();
        } else {
            # code...
            return $this->db->get_where('mahasiswa', ['id' => $id])->result_array();
        }
    }

    public function deleteMahasiswa($id)
    {
        # code...
        $this->db->delete('mahasiswa', ['id' => $id]);
        return $this->db->affected_rows();
    }

    public function createMahasiswa($data)
    {
        # code...
        $this->db->insert('mahasiswa', $data);
        return $this->db->affected_rows();
    }

    public function updateMahasiswa($data, $id)
    {
        # code...
        $this->db->update('mahasiswa', $data, ['id' => $id]);
        return $this->db->affected_rows();
    }
}

/* End of file Mahasiswa_model.php */
