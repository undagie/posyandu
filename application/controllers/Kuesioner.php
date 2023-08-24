<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kuesioner extends CI_Controller {

	public function __construct() {
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD','email');
	}

	public function _example_output($output = null) {
		$this->load->view('content_kuesioner',(array)$output);
	}

	public function index() {
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}

	public function kuesioner(){
		$crud = new grocery_CRUD();

		$crud->set_table('kuesioner');
		$crud->set_subject('Pengisian Kuesioner');	
		$crud->required_fields('tanggal_pengisian','nama','alamat','pertanyaan1','pertanyaan2','pertanyaan3','pertanyaan4','pertanyaan5','pertanyaan6','pertanyaan7','pertanyaan8','pertanyaan9','pertanyaan10');

		$timezone="Asia/Makassar";
		date_default_timezone_set($timezone);
		$crud->change_field_type('tanggal_pengisian', 'hidden', date('Y-m-d h:i:s', time()));

		$crud->field_type('pertanyaan1','enum',array('Sangat Baik','Baik','Kurang Baik','Tidak Baik'));
		$crud->field_type('pertanyaan2','enum',array('Sangat Baik','Baik','Kurang Baik','Tidak Baik'));
		$crud->field_type('pertanyaan3','enum',array('Sangat Baik','Baik','Kurang Baik','Tidak Baik'));
		$crud->field_type('pertanyaan4','enum',array('Sangat Baik','Baik','Kurang Baik','Tidak Baik'));
		$crud->field_type('pertanyaan5','enum',array('Sangat Baik','Baik','Kurang Baik','Tidak Baik'));
		$crud->field_type('pertanyaan6','enum',array('Sangat Baik','Baik','Kurang Baik','Tidak Baik'));
		$crud->field_type('pertanyaan7','enum',array('Sangat Baik','Baik','Kurang Baik','Tidak Baik'));

		$crud->display_as('pertanyaan1','Bagaimana pendapat Anda tentang pelayanan pemberian obat ?');
		$crud->display_as('pertanyaan2','Bagaimana pendapat Anda tentang perlakuan yang sama (keadilan) dalam mendapatkan pelayanan ?');
		$crud->display_as('pertanyaan3','Bagaimana pendapat Anda tentang keramahan petugas ?');
		$crud->display_as('pertanyaan4','Bagaimana pendapat Anda tentang biaya yang dikenakan di posyandu ?');
		$crud->display_as('pertanyaan5','Bagaimana pendapat Anda tentang waktu pelayanan di Posyandu ?');
		$crud->display_as('pertanyaan6','Bagaimana pendapat Anda tentang kenyamanan dan kebersihan di Posyandu ?');
		$crud->display_as('pertanyaan7','Bagaimana pendapat Anda tentang keamanan di Posyandu ?');
		
		$crud->unset_edit();
		$crud->unset_read();
		$crud->unset_delete();
		$crud->unset_print();
		$crud->unset_clone();
		$crud->unset_export();
		$crud->unset_back_to_list();
		$output = $crud->render();
		
		$this->_example_output($output);
		 
	}

	
	public function riwayat_pemeriksaan(){
		$crud = new grocery_CRUD();
		$crud->set_table('penimbangan');
		$crud->set_subject('Data Riwayat Penimbangan Balita');

		$crud->set_field_upload('foto','assets/uploads/images');

		$crud->unset_operations();

		$output = $crud->render();
		$this->load->view('riwayat_pemeriksaan',(array)$output);
	}
	
	public function survei_layanan(){
		$crud = new grocery_CRUD();
		$crud->set_table('survei_layanan');
		$crud->set_subject('Data Survei Layanan Masyarakat');
		$crud->required_fields('tanggal','jenis_layanan','catatan');

		$crud->set_field_upload('dokumentasi','assets/uploads/images');

		$crud->unset_edit();
		$crud->unset_read();
		$crud->unset_delete();
		$crud->unset_print();
		$crud->unset_clone();
		$crud->unset_export();
		$crud->unset_back_to_list();

		$output = $crud->render();
		$this->load->view('survei_layanan',(array)$output);
	}

	// batas

}
