<?php

defined('BASEPATH') or exit('No direct script access allowed');

class user_model extends CI_Model
{

    public function getAllUser()
    {
        $query = $this->db->get('user');
        return $query->result_array();
    }

    public function tambahUser()
    {
        $data = [
            "username" => $this->input->post('username', true), // ini sama dengan htmlspecalchars($_POST['nama'])
            "password" => $this->input->post('password', true),
            "level" => $this->input->post('level', true),
        ];
        // $this->db->insert('Table', $object);
        $this->db->insert('user', $data);
    }

    public function ubahUser()
    {
        # code...
        $data = [
            "username" => $this->input->post('username', true), // ini sama dengan htmlspecalchars($_POST['nama'])
            "password" => $this->input->post('password', true),
            "level" => $this->input->post('level', true)
        ];
        $this->db->where('id_user', $this->input->post('id_user'));
        $this->db->update('user', $data);
    }

    public function hapusUser($id)
    {
        # code...
        $this->db->where('id_user', $id);
        $this->db->delete('user');
    }

    public function getUserByID($id)
    {
        # code...
        return $this->db->get_where('user', ['id_user' => $id])->row_array();
    }

}

/* End of file User_mode.php */
