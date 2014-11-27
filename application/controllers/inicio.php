<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/inicio
	 *	- or -  
	 * 		http://example.com/index.php/inicio/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
            $this->load->view('template/header');
            $this->load->view('login_view');
            $this->load->view('template/footer');
	}
        
        public function login(){
            
        }
}

/* End of file inicio.php */
/* Location: ./application/controllers/inicio.php */