<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index() {
        $this->form_validation->set_message('required', 'El campo %s es obligatorio');
        $this->form_validation->set_rules('username', 'Usuario', 'required');
	$this->form_validation->set_rules('password', 'Contraseña', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('login_view');
            $this->load->view('template/footer');
        } else {
            
            redirect('');
        }
    }

}

/* End of file inicio.php */
/* Location: ./application/controllers/inicio.php */