<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Alumno_model extends CI_Model {


    function __construct() {
        parent::__construct();
    }
    
    public function get_info_alumno(){
        $rut = $this->session->userdata('rut');
        
        $this->db->select('*');
        $this->db->from('Usuario')->join('Matricula', 'Usuario.rut = Matricula.rut_alumno')->join('Carrera', 'Carrera.codigo = Matricula.codigo_carrera');
        $this->db->where(array('rut' => $rut));
        $query = $this->db->get();
        
        $usuario = $query->row_array();
        //print_r($usuario);
        $data = array('usuario'=>$usuario);
        return $data;
    }
      
}