<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inicio extends CI_Controller {

    public function index() {

        $this->load->view('template/header');
        $this->load->view('login_view');
        $this->load->view('template/footer');
    }

    public function login() {
        $this->form_validation->set_message('required', 'El campo %s es obligatorio');
        $this->form_validation->set_rules('username', 'Usuario', 'required');
	$this->form_validation->set_rules('password', 'Contraseņa', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('login_view');
            $this->load->view('template/footer');
        } else {
            $this->load->model('login_model');
            if($this->login_model->get_login($_POST["username"], $_POST["password"])){
                if($this->session->userdata('tipo')==3){
                    redirect('administrador');
                }else{
                    redirect('alumno');
                }
                
            }else{
                redirect('');
            }
        }
    }

}

/* End of file inicio.php */
/* Location: ./application/controllers/inicio.php */