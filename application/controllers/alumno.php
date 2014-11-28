<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Alumno extends CI_Controller {

    public function index() {
        
        $this->load->model('alumno_model');
        $data = $this->alumno_model->get_info();
        
        $this->load->view('template/header_alumno');
        $this->load->view('alumno_view', $data);
        $this->load->view('template/footer');
    }
    
}