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
        //$querystring = "SELECT * FROM Login WHERE usuario=? and pass=?";
        //$query = $this->db->query($querystring, array($user, $pass));
        $where = array('usuario' => $user, 'pass' => $pass);
        $query = $this->db->get_where('Login', $where);
        //$query->result_array();
        
        //print_r($query);
        if ($query->num_rows() == 1) {
            $row = $query->row();
            $usuario = array('user'=>$row->usuario, 'pass'=>$row->password, 'tipo'=>$row->tipo, 'logged'=>true, 'rut'=>$row->rut, 'dv'=>$row->dv);
            $this->session->set_userdata($usuario);
            return true;
        } else {
            return false;
        }
    }

}