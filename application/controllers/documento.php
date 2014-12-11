<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Documento extends CI_Controller {

    public function index() {
        
    }

    public function download($year, $semestre, $curso, $seccion) {
        //$rut = $this->session->userdata('rut');
        $file = $this->input->post('archivo');
        $download_path = './files/' . $curso . '/' . $year . '/' . $semestre . '/' . $seccion;
        $this->load->helper('download');
        $data = file_get_contents($download_path.'/'.$file);
        force_download($file, $data);
    }

    public function upload($year, $semestre, $curso, $seccion) {
        $upload_config = array(
            'upload_path' => './files/' . $curso . '/' . $year . '/' . $semestre . '/' . $seccion,
            'allowed_types' => '*',
            'max_size' => '5000'
        );
        $this->load->library('upload', $upload_config);

        if (!$this->upload->do_upload()) {
            // upload failed
            return array('error' => $this->upload->display_errors('<span>', '</span>'));
        } else {
            if (!is_dir('files')) {
                mkdir('./files', 0777, true);
            }
            if (!is_dir('/files/' . $curso)) {
                mkdir('./files/' . $curso, 0777, true);
            }
            if (!is_dir('/files/' . $curso . '/' . $year)) {
                mkdir('./files/' . $curso . '/' . $year, 0777, true);
            }
            if (!is_dir('/files/' . $curso . '/' . $year . '/' . $semestre)) {
                mkdir('./files/' . $curso . '/' . $year . '/' . $semestre, 0777, true);
            }
            if (!is_dir('/files/' . $curso . '/' . $year . '/' . $semestre . '/' . $seccion)) {
                mkdir('./files/' . $curso . '/' . $year . '/' . $semestre . '/' . $seccion, 0777, true);
            }
            $upload_data = $this->upload->data();
        }
        if($this->session->userdata['tipo']==1){
            redirect('alumno/curso/'.$year.'/'.$semestre.'/',$curso.'/'.$seccion.'material_alumnos');
        }else{
            redirect('alumno/curso/'.$year.'/'.$semestre.'/',$curso.'/'.$seccion.'material_docente');
        }
    }

}
