<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Alumno extends CI_Controller {

    public function index() {
        
        $this->load->model('alumno_model');
        $this->load->model('curso_model');
        $data = $this->alumno_model->get_info_alumno();
        $data2 = $this->curso_model->get_info_cursos_actuales();

        //print_r($data);
        $this->load->view('template/header_alumno', $data2);
        $this->load->view('alumno/alumno_view', $data);
        $this->load->view('template/footer');
    }

    public function curso($year, $semestre, $curso, $seccion, $tipo = null) {
        $this->load->model('curso_model');
        $cursos = $this->curso_model->get_info_cursos_actuales();
        $this->load->view('template/header_alumno', $cursos);
        
        if($tipo==null || $tipo=="noticias"){
            $this->noticias($year, $semestre, $curso, $seccion);
        }
        if($tipo=="foro"){
            $this->foro($year, $semestre, $curso, $seccion);
        }
        if($tipo=="notas"){
            $this->notas($year, $semestre, $curso, $seccion);
        }
        if($tipo=="material_docente"){
            $this->material_docente($year, $semestre, $curso, $seccion);
        }
        if($tipo=="material_alumnos"){
            $this->material_alumnos($year, $semestre, $curso, $seccion);
        }
        
        $this->load->view('template/footer');
    }
    
    public function noticias($year, $semestre, $curso, $seccion) {
        
        $this->load->library('pagination');
        $config = array();
        $config["base_url"] = base_url()."alumno/curso/$year/$semestre/$curso/$seccion/noticias";
        $count = $this->curso_model->get_noticias_curso_count($year, $semestre, $curso, $seccion);
        $config['total_rows'] = $count['count'];
        $config["per_page"] = 5;
        $config["uri_segment"] = 8;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        // twitter bootstrap markup 
        $config['full_tag_open'] = '<ul class="pagination pagination-sm">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><span>';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></span></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['first_link'] = '&laquo;';
        $config['prev_link'] = '&lsaquo;';
        $config['last_link'] = '&raquo;';
        $config['next_link'] = '&rsaquo;';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        
        $this->pagination->initialize($config); // pass the parameters for per_page, page number, order by, sort, etc here 
        // generate links
        $page = ($this->uri->segment(7)) ? $this->uri->segment(7) : 0;
        $data['results'] = $this->curso_model->get_noticias_curso($year, $semestre, $curso, $seccion, $config['per_page'], $page);
        $data['links'] = $this->pagination->create_links();
        //print_r($data);
        // pass the data to the view 
        //$this->load->view('alumno/alumno_curso_view', $data);
        $data['info'] = array('year' => $year, 'semestre' => $semestre, 'seccion' => $seccion, 'codigo_asignatura' => $curso);

        $this->load->view('alumno/alumno_noticias_view', $data);
    }
    
    public function foro($year, $semestre, $curso, $seccion) {
        $data['info'] = array('year' => $year, 'semestre' => $semestre, 'seccion' => $seccion, 'codigo_asignatura' => $curso);
        $this->load->view('alumno/alumno_foro_view', $data);
        
    }
    
    public function notas($year, $semestre, $curso, $seccion) {
        $data['info'] = array('year' => $year, 'semestre' => $semestre, 'seccion' => $seccion, 'codigo_asignatura' => $curso);
        $data['results'] = $this->curso_model->get_notas($year, $semestre, $curso, $seccion);
        //print_r($data);
        $this->load->view('alumno/alumno_notas_view', $data);
        
    }
    
    public function material_docente($year, $semestre, $curso, $seccion) {
        $data['info'] = array('year' => $year, 'semestre' => $semestre, 'seccion' => $seccion, 'codigo_asignatura' => $curso);
        $data['results'] = $this->curso_model->get_documentos($year, $semestre, $curso, $seccion, 2);
        $this->load->view('alumno/alumno_material_docente_view', $data);
        
    }
    
    public function material_alumnos($year, $semestre, $curso, $seccion) {
        $data['info'] = array('year' => $year, 'semestre' => $semestre, 'seccion' => $seccion, 'codigo_asignatura' => $curso);
        $data['results'] = $this->curso_model->get_documentos($year, $semestre, $curso, $seccion, 1);
        $this->load->view('alumno/alumno_material_alumnos_view', $data);
        
    }

}
