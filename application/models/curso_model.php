<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Curso_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    public function get_info_cursos_actuales() {
        $rut = $this->session->userdata('rut');
        $year = gmdate("Y");
        if (gmdate("n") <= 7) {
            $semestre = 1;
        } else {
            $semestre = 2;
        }
        //$query = $this->db->get_where('Curso_Asignado', array('rut_alumno' => $rut, 'year' => $year, 'semestre' => $semestre));
        $this->db->select('nombre, codigo, seccion, semestre, year');
        $this->db->from('Curso_Asignado')->join('Asignatura', 'Curso_Asignado.codigo_asignatura = Asignatura.codigo');
        $this->db->where(array('rut_alumno' => $rut, 'year' => $year, 'semestre' => $semestre));
        $query = $this->db->get();

        $data = array('cursos' => $query->result_array());

        return $data;
    }

    public function get_noticias_curso_count($year, $semestre, $curso, $seccion) {
        $this->db->select('count(*) as count');
        $this->db->from('Noticias');
        $this->db->where(array('year' => $year, 'semestre' => $semestre, 'seccion' => $seccion, 'codigo_asignatura' => $curso));
        $query = $this->db->get();

        $data = $query->row_array();
        return $data;
    }

    public function get_noticias_curso($year, $semestre, $curso, $seccion, $limit, $start) {
        //$rut = $this->session->userdata('rut');
        $this->db->select('titulo, texto');
        $this->db->from('Noticias');
        $this->db->where(array('year' => $year, 'semestre' => $semestre, 'seccion' => $seccion, 'codigo_asignatura' => $curso));
        $this->db->limit($limit, $start);
        $query = $this->db->get();

        //$data = array('cursos' => $query->result_array());
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            //print_r($data);
            return $data;
        }
        return false;
    }

    public function agregar_noticia($year, $semestre, $curso, $seccion, $titulo, $texto) {
        $rut = $this->session->userdata('rut');
        $data = array(
            'year' => $year,
            'semestre' => $semestre,
            'codigo_asignatura' => $curso,
            'seccion' => $seccion,
            'titulo' => $titulo,
            'texto' => $texto,
            'rut_ingreso' => $rut
        );

        $this->db->insert('Noticias', $data);
    }
    
    public function get_notas($year, $semestre, $curso, $seccion){
        $rut = $this->session->userdata('rut');
        $this->db->select('*');
        $this->db->from('Notas');
        $this->db->where(array('rut_alumno' => $rut, 'year' => $year, 'semestre' => $semestre, 'seccion' => $seccion, 'codigo_asignatura' => $curso));
        $query = $this->db->get();
        
        $data = $query->result_array();
        
        return $data;
    }
    
    public function get_documentos($year, $semestre, $curso, $seccion) {
        $rut = $this->session->userdata('rut');
        $this->db->select('*');
        $this->db->from('Documentos');
        $this->db->where(array('year' => $year, 'semestre' => $semestre, 'seccion' => $seccion, 'codigo_asignatura' => $curso));
        $query = $this->db->get();
        
        $data = $query->result_array();
        
        return $data;
    }

}
