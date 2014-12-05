<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Alumno extends CI_Controller {

    public function index() {
        
        $this->load->model('alumno_model');
        $data = $this->alumno_model->get_info_alumno();
        $data2 = $this->alumno_model->get_info_alumno_cursos_actuales();
        
        //print_r($data2);
        $this->load->view('template/header_alumno', $data2);
        $this->load->view('alumno_view', $data);
        $this->load->view('template/footer');
    }
    
    public function curso($year, $seccion, $curso){
        echo $seccion;
    }
    
}