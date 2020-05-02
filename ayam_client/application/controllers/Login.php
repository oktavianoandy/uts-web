<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        //Do your magic here
        $this->load->model('login_model');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('form');
        $this->load->helper('url');
        
    }
    

    public function index()
    {
        $data['title'] = 'Halaman Login';
        $this->load->view('login/header', $data);
        $data['pesan'] = '';
        $this->load->view('login/index',$data);
        $this->load->view('login/footer');
    }

    public function proses_login()
    {
        # code...
        $username = htmlspecialchars($this->input->post('username'));
        $password = htmlspecialchars($this->input->post('password'));

        $ceklogin = $this->login_model->login($username, $password);

        if ($ceklogin) {
            # code...
            foreach ($ceklogin as $row);
            $this->session->set_userdata('username', $row->username);
            $this->session->set_userdata('level', $row->level);
            redirect('dashboard/index','refresh');
        } else {
            # code...
            //redirect('login/index','refresh');
            $data['pesan'] = 'Login gagal';
            $data['title'] = 'Halaman login';
            $this->load->view('login/header', $data);
            $this->load->view('login/index');
            $this->load->view('login/footer');
        }
    }

    public function logout()
    {
        # code...
        $this->session->sess_destroy();
        redirect('login', 'refresh');
    }

}

/* End of file Login.php */
