<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Documento_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }
    
    public function upload($year, $semestre, $curso, $seccion, $file){
        $rut = $this->session->userdata('rut');
        $tipo = $this->session->userdata('tipo');
        $data = array(
            'year' => $year,
            'semestre' => $semestre,
            'codigo_asignatura' => $curso,
            'seccion' => $seccion,
            'nombre_documento' => $file,
            'tipo_usuario_ingreso' => $tipo,
            'rut_ingreso' => $rut
        );
        $this->db->insert('Documentos', $data);
    }
}