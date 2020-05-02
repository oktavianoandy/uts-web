<?php

defined('BASEPATH') or exit('No direct script access allowed');

class login_model extends CI_Model
{
    function login($username, $password)
    {
        # code...
        $this->db->select('username,password,level');
        $this->db->from('user');
        $this->db->where('username', $username); //maksudnya adalah selama inputan user yang disiman pada prameter $user sama dengan username
        $this->db->where('password', $password);
        $this->db->limit(1);


        $query = $this->db->get();
        if ($query->num_rows() == 1) //jika ditemukan
        {
            # code...
            return $query->result();
        } else {
            # code...
            return false;
        }
    }
}

/* End of file login_model.php */
