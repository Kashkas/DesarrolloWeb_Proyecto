<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Documento extends CI_Controller {

    public function index() {
        
    }

    public function download($year, $semestre, $curso, $seccion, $pagina) {
        error_reporting(E_ERROR | E_PARSE);
        $file = $this->input->post('files');
        //print_r($file);
        $download_path = 'files/' . $curso . '/' . $year . '/' . $semestre . '/' . $seccion . '/';
        $this->load->helper('download');
        $this->load->library('zip');

        //print_r($file);

        $zip = new ZipArchive;
        
        if ($zip->open($download_path . $curso . '_' . $pagina . '-' . $fecha . '.zip', ZipArchive::CREATE)) {
            //$zip->addFile('zip/test.txt', 'newname.txt');
            //$zip->addFile('zip/test2.txt', 'newname2.txt');
            
            foreach ($file as $archivo) {
                $zip->addFile($download_path . $archivo, $archivo);
            }
            $zip->close();
            
        }else{
            redirect('alumno/curso/' . $year . '/' . $semestre . '/' . $curso . '/' . $seccion . '/' . $pagina);
        }
        /*foreach ($file as $archivo) {
            $this->zip->add_data($archivo, $download_path . $archivo);
        }*/
        $fecha = gmdate('d-m-Y');
        //echo $download_path;
        //$this->zip->archive($download_path . $curso . '-' . $pagina . '-' . $fecha . '.zip');
        $data = file_get_contents(base_url() . $download_path . $curso . '_' . $pagina . '-' . $fecha . '.zip');
        //$data = base_url().$download_path . $curso . '_material_docente-' . $fecha . '.zip';
        $name = $curso . '-' . $pagina . '-' . $fecha . '.zip';
        
        force_download($name, $data);

        //redirect('alumno/curso/' . $year . '/' . $semestre . '/' . $curso . '/' . $seccion . '/' . $pagina);
    }

    public function upload($year, $semestre, $curso, $seccion) {
        error_reporting(E_ERROR | E_PARSE);
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
            if (!is_dir('./files')) {
                mkdir('./files', 0777, true);
            }
            if (!is_dir('./files/' . $curso)) {
                mkdir('./files/' . $curso, 0777, true);
            }
            if (!is_dir('./files/' . $curso . '/' . $year)) {
                mkdir('./files/' . $curso . '/' . $year, 0777, true);
            }
            if (!is_dir('./files/' . $curso . '/' . $year . '/' . $semestre)) {
                mkdir('./files/' . $curso . '/' . $year . '/' . $semestre, 0777, true);
            }
            if (!is_dir('./files/' . $curso . '/' . $year . '/' . $semestre . '/' . $seccion)) {
                mkdir('./files/' . $curso . '/' . $year . '/' . $semestre . '/' . $seccion, 0777, true);
            }

            $upload_data = $this->upload->data();
            //print_r($upload_data);
            $this->load->model('documento_model');
            $this->documento_model->upload($year, $semestre, $curso, $seccion, $upload_data['file_name']);
        }

        $this->load->model('curso_model');
        $cursos = $this->curso_model->get_info_cursos_actuales();
        $this->load->view('template/header_alumno', $cursos);

        //echo $this->session->userdata['tipo'];
        $data['info'] = array('year' => $year, 'semestre' => $semestre, 'seccion' => $seccion, 'codigo_asignatura' => $curso);
        $data['results'] = $this->curso_model->get_documentos($year, $semestre, $curso, $seccion, 1);
        $this->load->view('alumno/alumno_material_alumnos_view', $data);

        $this->load->view('template/footer');

        /* if ($this->session->userdata['tipo'] == 1) {
          redirect('alumno/curso/' . $year . '/' . $semestre . '/', $curso . '/' . $seccion . 'material_alumnos');
          } else {
          redirect('alumno/curso/' . $year . '/' . $semestre . '/', $curso . '/' . $seccion . 'material_docente');
          } */
    }

}
