<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Alumno_model extends CI_Model {


    function __construct() {
        parent::__construct();
    }
    
    public function get_info(){
        $rut = $this->session->userdata('rut');
        $query = $this->db->get_where('Usuario', array('rut' => $rut));
        $data = array('datos'=>$query->row_array());
        return $data;
    }
    
}