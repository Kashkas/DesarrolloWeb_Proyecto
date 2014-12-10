<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Inicio extends CI_Controller {

    public function index() {

        $this->load->view('template/header');
        $this->load->view('login/login_view');
        $this->load->view('template/footer');
    }

    public function salir() {
        $this->session->sess_destroy();
        redirect(base_url());
    }

    public function login() {
        $this->form_validation->set_message('required', 'El campo %s es obligatorio');
        $this->form_validation->set_rules('username', 'Usuario', 'required');
        $this->form_validation->set_rules('password', 'Contraseña', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('login/login_view');
            $this->load->view('template/footer');
        } else {
            $this->load->model('login_model');
            $user = $this->input->post('username', true);
            $pass = $this->input->post('password', true);
            $validate = $this->login_model->get_login($user, $pass);
            if ($validate) {
                if ($this->session->userdata('tipo') == 3) {
                    redirect('administrador');
                } else {
                    redirect('alumno');
                }
            } else {
                redirect('login');
            }
        }
    }

}

/* End of file inicio.php */
/* Location: ./application/controllers/inicio.php */