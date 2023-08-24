<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class homebidan extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        //load model m_login
        $this->load->model('m_login');
        //cek session dan level user
        if($this->m_login->is_role() != 'bidan'){
            redirect('login/');
        }
	}
	
	public function index()
	{
		$this->load->view('content_home_bidan');
	}

	public function logout()
  {
   $this->session->sess_destroy();
   
   redirect('login');
  }
}
