<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class homekader extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        //load model m_login
        $this->load->model('m_login');
        //cek session dan level user
        if($this->m_login->is_role() != 'kader'){
            redirect('login/');
        }
	}
	
	public function index()
	{
		$this->load->view('content_home_kader');
	}

	public function logout()
  {
   $this->session->sess_destroy();
   
   redirect('login');
  }
}
