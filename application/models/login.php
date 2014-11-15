<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Pablo
 * Date: 15-11-14
 * Time: 13:21
 */

class Login extends CI_Model{

    var $user = '';
    var $pass = '';
    var $rut = 0;

    function __construct()
    {
        parent::__construct();
    }

    function get_login($user, $pass){
        $query = $this->db->get_where('login', array('usuario'=>$user, 'password'=>$pass));
        return $query->result_array();
    }

}