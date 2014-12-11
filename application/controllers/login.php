<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index() {
        $data = array('error' => true);
        
        $this->load->view('template/header');
        $this->load->view('login/login_view', $data);
        $this->load->view('template/footer');
    }

}

/* End of file inicio.php */
/* Location: ./application/controllers/inicio.php */