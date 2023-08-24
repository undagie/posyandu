<?php
class Grafik extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('m_login');
		$this->load->model('m_grafik');
    }
   
	public function grafik_penimbangan()
	{
		$data['data']=$this->m_grafik->get_data_penimbangan();
    	$this->load->view('content_grafik_penimbangan',$data);
	}
	
   
	public function grafik_pemeriksaan()
	{
		$data['data']=$this->m_grafik->get_data_pemeriksaan();
    	$this->load->view('content_grafik_pemeriksaan',$data);
	}
	
}