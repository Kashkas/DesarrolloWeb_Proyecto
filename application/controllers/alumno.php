<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Alumno extends CI_Controller {

    public function index() {

        $this->load->view('template/header');
        $this->load->view('alumno');
        $this->load->view('template/footer');
    }
    
}

?>