<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Pablo
 * Date: 15-11-14
 * Time: 13:21
 */
class login_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_login($user, $pass) {
        
        $this->db->select('*');
        $this->db->from('Login');
        $this->db->where(array('usuario' => $user, 'pass' => $pass));
        $query = $this->db->get();
        
        if ($query->num_rows() == 1) {
            $row = $query->row();
            $usuario = array('user'=>$row->usuario, 'pass'=>$row->pass, 'tipo'=>$row->tipo, 'logged'=>true, 'rut'=>$row->rut, 'dv'=>$row->dv, );
            $this->session->set_userdata($usuario);
            return true;
        } else {
            return false;
        }
    }

}