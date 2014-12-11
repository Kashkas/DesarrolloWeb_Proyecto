<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Documento extends CI_Controller {

    public function index() {
        
    }

    public function download($year, $semestre, $curso, $seccion) {
        $file = $this->input->post('files');
        //print_r($file);
        $download_path = 'files/' . $curso . '/' . $year . '/' . $semestre . '/' . $seccion . '/';
        $this->load->helper('download');
        $this->load->library('zip');
        foreach ($file as $archivo) {
            $this->zip->add_data($archivo, $download_path . $archivo);
        }
        $fecha = gmdate('d-m-Y');
        //echo $download_path;
        $this->zip->archive($download_path . $curso . '-material_docente-' . $fecha . '.zip');
        $data = file_get_contents(base_url().$download_path . $curso . '_material_docente-' . $fecha . '.zip');
        //$data = base_url().$download_path . $curso . '_material_docente-' . $fecha . '.zip';
        $name = $curso . '-material_docente-' . $fecha . '.zip';
        force_download($name, $data);
    }

    public function upload($year, $semestre, $curso, $seccion) {
        $upload_config = array(
            'upload_path' => './files/' . $curso . '/' . $year . '/' . $semestre . '/' . $seccion,
            'allowed_types' => '*',
            'max_size' => '5000'
        );
        $this->load->library('upload', $upload_config);
        $this->upload->initialize($upload_config);

        if (!$this->upload->do_upload('archivo')) {
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
            //print_r($upload_data);
            $this->load->model('documento_model');
            $this->documento_model->upload($year, $semestre, $curso, $seccion, $upload_data['file_name']);
               
        }
        if ($this->session->userdata['tipo'] == 1) {
            redirect('alumno/curso/' . $year . '/' . $semestre . '/', $curso . '/' . $seccion . 'material_alumnos');
        } else {
            redirect('alumno/curso/' . $year . '/' . $semestre . '/', $curso . '/' . $seccion . 'material_docente');
        }
    }

}
