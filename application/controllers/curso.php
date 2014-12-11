<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Curso extends CI_Controller {

    public function index() {
        
    }

    public function agregar_noticia($year, $semestre, $curso, $seccion) {
        $titulo = $this->input->post('titulo');
        $texto = $this->input->post('texto');
        if ($titulo != null && $texto != null) {
            $this->load->model('curso_model');
            $this->curso_model->agregar_noticia($year, $semestre, $curso, $seccion, $titulo, $texto);
        }
        redirect('alumno/curso/' . $year . '/' . $semestre . '/' . $curso . '/' . $seccion . '/noticias');
    }

    public function get_notas($year, $semestre, $curso, $seccion) {
        $this->load->model('curso_model');
        $data = $this->curso_model->get_notas($year, $semestre, $curso, $seccion);
        $this->output->set_header('Content-Type: application/json');
        $arr = json_encode($data);
        echo $arr;
    }
    
    
}
