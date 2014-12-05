<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Alumno_model extends CI_Model {


    function __construct() {
        parent::__construct();
    }
    
    public function get_info_alumno(){
        $rut = $this->session->userdata('rut');
        $query = $this->db->get_where('Usuario', array('rut' => $rut));
        $query2 = $this->db->get_where('Curso_Asignado', array('rut_alumno' => $rut));
        $data = array('usuario'=>$query->row_array(), 'cursos' => $query2->result_array());
        return $data;
    }
    
    public function get_info_alumno_cursos_actuales(){
        $rut = $this->session->userdata('rut');
        $year = date("Y");
        if(date("n")<=7){
            $semestre = 1;
        }else{
            $semestre = 2;
        }
        //$query = $this->db->get_where('Curso_Asignado', array('rut_alumno' => $rut, 'year' => $year, 'semestre' => $semestre));
        $this->db->select('nombre, codigo, seccion, year');
        $this->db->from('Curso_Asignado')->join('Asignatura', 'Curso_Asignado.codigo_asignatura = Asignatura.codigo');
        $this->db->where(array('rut_alumno' => $rut, 'year' => $year, 'semestre' => $semestre));
        $query = $this->db->get();
        
        $data = array('cursos' => $query->result_array());
        
        //print_r($data);
        return $data;
    }
    
    
}