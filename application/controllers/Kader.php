<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Kader extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');

		$this->load->library('grocery_CRUD','email');
		
	}

	public function _example_output($output = null)
	{
		$this->load->view('content_crud_kader',(array)$output);
	}
	

	public function index()
	{
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}

	public function ttd(){
		$crud = new grocery_CRUD();
		$crud->set_table('ttd');
		 $crud->set_subject('Setting Tanda Tangan');	

		 $crud->required_fields('nama','nip','jabatan');

		 $crud->set_field_upload('tanda_tangan','assets/uploads/images');
 
		 $crud->unset_add();
		 $crud->unset_delete();
		 $crud->unset_print();
		 $crud->unset_clone();
		 $crud->unset_export();
		 $crud->unset_simpan();
				 
		 $output = $crud->render();
		 $this->_example_output($output);
	}

	public function pengguna(){
		$crud = new grocery_CRUD();

		$crud->set_table('pegawai');
		$crud->where("pegawai.role = 'admin'");
		 $crud->set_subject('Data Pengguna');	
		 $crud->required_fields('username','password','nama','role');
		 $crud->columns('username','password','nama','role','no_telepon','email');

		$crud->change_field_type('password', 'password');

		// $crud->field_type('role','enum',array('admin','kepala dinas'));
		$crud->field_type('role','hidden','admin');
		
		$crud->field_type('nik','hidden');
		$crud->field_type('tempat_lahir','hidden');
		$crud->field_type('tanggal_lahir','hidden');
		$crud->field_type('jenis_kelamin','hidden');
		$crud->field_type('agama','hidden');
		$crud->field_type('alamat','hidden');
		$crud->field_type('jabatan','hidden');
		$crud->field_type('foto','hidden');
		$crud->field_type('status','hidden');
		$crud->field_type('pendidikan','hidden');
		$crud->field_type('unit_posyandu','hidden');
		$crud->field_type('tanggal_penempatan','hidden');
 
		$crud->unset_add();
		$crud->unset_edit();
		$crud->unset_delete();
		$crud->unset_print();
		 $crud->unset_clone();
		 $crud->unset_export();
		 $crud->unset_simpan();
				 
		 $output = $crud->render();
		 $this->_example_output($output);
	}

	
	public function jenis_imunisasi(){
		$crud = new grocery_CRUD();
		 $crud->set_table('jenis_imunisasi');
		 $crud->set_subject('Data Jenis Imunisasi');	
		 $crud->required_fields('jenis_imunisasi','usia','keterangan');

		 $crud->unset_add();
		 $crud->unset_edit();
		 $crud->unset_delete();
		 $crud->unset_print();
		 $crud->unset_clone();
		 $crud->unset_export();
		 $crud->unset_simpan();
				 
		 $output = $crud->render();
		 $this->_example_output($output);
	}


	public function posyandu(){
		$crud = new grocery_CRUD();
		 $crud->set_table('posyandu');
		 $crud->set_subject('Data Posyandu');	
		 $crud->required_fields('kode_posyandu','nama_posyandu','no_telepon','email','alamat','kelurahan','kecamatan','kabupaten');

		 $crud->callback_add_field('kode_posyandu',function(){
			$data=$this->db->query("SELECT MAX(id) as kd FROM posyandu")->row_array();
			$data2=$data['kd']+1;
			$fzeropadded = sprintf("%03d", $data2);
			$now = date('Y'); 
			$nosurat2 = $fzeropadded."/POS"."/".$now;
			return '<input type="text" style="height: 40px" readonly value="'.$nosurat2.'" name="kode_posyandu" id="kode_posyandu">';});
		
		$crud->callback_edit_field('kode_posyandu',function($value, $primary_key){
			return '<input type="text" style="height: 40px" readonly value="'.$value.'" name="kode_posyandu" id="kode_posyandu"> ';});

		$crud->unset_texteditor('alamat');

		 $crud->set_field_upload('foto','assets/uploads/images');

		 $crud->unset_add();
		 $crud->unset_edit();
		 $crud->unset_delete();
		 $crud->unset_print();
		 $crud->unset_clone();
		 $crud->unset_export();
		 $crud->unset_simpan();
				 
		 $output = $crud->render();
		 $this->_example_output($output);
	}

	public function obat(){
		$crud = new grocery_CRUD();
		 $crud->set_table('obat');
		 $crud->set_subject('Data Obat');	
		 $crud->required_fields('tanggal_input','kode_obat','nama_nama','jenis_obat','fungsi_obat','masa_kadaluarsa','untuk_usia');

		 $timezone="Asia/Makassar";
		date_default_timezone_set($timezone);
		$crud->change_field_type('tanggal_input', 'hidden', date('Y-m-d'));

		 $crud->callback_add_field('kode_obat',function(){
			$data=$this->db->query("SELECT MAX(id) as kd FROM obat")->row_array();
			$data2=$data['kd']+1;
			$fzeropadded = sprintf("%03d", $data2);
			$now = date('Y'); 
			$nosurat2 = $fzeropadded."/OBT"."/".$now;
			return '<input type="text" style="height: 40px" readonly value="'.$nosurat2.'" name="kode_obat" id="kode_obat">';});
		
		$crud->callback_edit_field('kode_obat',function($value, $primary_key){
			return '<input type="text" style="height: 40px" readonly value="'.$value.'" name="kode_obat" id="kode_obat"> ';});

		$crud->unset_texteditor('fungsi_obat');

		$crud->field_type('jenis_obat','enum',array('Serbuk','Tablet','Pil','Kapsul','Larutan','Sirup','Salep','Tetes'));

		 $crud->set_field_upload('foto','assets/uploads/images');

		 $crud->unset_add();
		 $crud->unset_edit();
		 $crud->unset_delete();
		 $crud->unset_print();
		 $crud->unset_clone();
		 $crud->unset_export();
		 $crud->unset_simpan();
				 
		 $output = $crud->render();
		 $this->_example_output($output);
	}

	
	public function _usia_ibu($value, $row){
		$data = array();
		$cab=$this->db->query("SELECT * FROM ibu_hamil")->result_array();
		foreach ($cab as $value) {
			if ($value['kode_sensus']==$row->kode_sensus) {
				$tanggal_lahir = $value['tanggal_lahir'];
				$date2 = date("Y-m-d");

				$date_diff = abs(strtotime($date2) - strtotime($tanggal_lahir));

				$years = floor($date_diff / (365*60*60*24));
				$months = floor(($date_diff - $years * 365*60*60*24) / (30*60*60*24));
				$days = floor(($date_diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

		}
		
		}

		if (($years >= 1) && ($months >= 0) && ($days >= 0)) {
			return $years. ' Tahun, '.$months. ' Bulan, '.$days. ' Hari';
		} elseif (($years <= 0) && ($months >= 1) && ($days >= 1)) {
			return $months. ' Bulan, '.$days. ' Hari';
		} elseif (($years <= 0) && ($months >= 1) && ($days <= 0)) {
			return $months. ' Bulan';
		} else {
			return $days. ' Hari';
		}
	
	}

	public function ibu_hamil(){
		$crud = new grocery_CRUD();
		 $crud->set_table('ibu_hamil');
		 $crud->set_subject('Data Ibu Hamil');	
		 $crud->required_fields('kode_sensus','tanggal_sensus','nama','jenis_kelamin','nama_suami','nama_ayah','alamat','kelurahan','kecamatan','kabupaten','no_telepon');

		 $crud->field_type('jenis_kelamin','enum',array('Laki-Laki','Perempuan'));
		 $crud->field_type('status','enum',array('Aktif','Non Aktif'));

		 $crud->field_type('usia','hidden');

		 $crud->callback_column('usia',array($this,'_usia_ibu'));

		 $crud->unset_texteditor('alamat');

		 $crud->set_field_upload('foto','assets/uploads/images');

		 $crud->unset_add();
		 $crud->unset_edit();
		 $crud->unset_delete();
		 $crud->unset_print();
		 $crud->unset_clone();
		 $crud->unset_export();
		 $crud->unset_simpan();
				 
		 $output = $crud->render();
		 $this->_example_output($output);
	}

	public function _usia_balita($value, $row){
		$data = array();
		$cab=$this->db->query("SELECT * FROM bayi")->result_array();
		foreach ($cab as $value) {
			if ($value['kode_sensus']==$row->kode_sensus) {
				$tanggal_lahir = $value['tanggal_lahir'];
				$date2 = date("Y-m-d");

				$date_diff = abs(strtotime($date2) - strtotime($tanggal_lahir));

				$years = floor($date_diff / (365*60*60*24));
				$months = floor(($date_diff - $years * 365*60*60*24) / (30*60*60*24));
				$days = floor(($date_diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));

		}
		
		}

		if (($years >= 1) && ($months >= 0) && ($days >= 0)) {
			return $years. ' Tahun, '.$months. ' Bulan, '.$days. ' Hari';
		} elseif (($years <= 0) && ($months >= 1) && ($days >= 1)) {
			return $months. ' Bulan, '.$days. ' Hari';
		} elseif (($years <= 0) && ($months >= 1) && ($days <= 0)) {
			return $months. ' Bulan';
		} else {
			return $days. ' Hari';
		}
	
	}

	public function bayi(){
		$crud = new grocery_CRUD();
		 $crud->set_table('bayi');
		 $crud->set_subject('Data Balita');	
		 $crud->required_fields('kode_sensus','tanggal_sensus','nama_bayi','jenis_kelamin','tanggal_lahir','nama_ibu','nama_ayah','alamat','kelurahan','kecamatan','kabupaten','no_telepon');

		 $crud->field_type('jenis_kelamin','enum',array('Laki-Laki','Perempuan'));
		 $crud->field_type('status','enum',array('Aktif','Non Aktif'));

		 $crud->field_type('usia','hidden');

		 $crud->callback_column('usia',array($this,'_usia_balita'));

		 $crud->unset_texteditor('alamat');

		 $crud->set_field_upload('foto','assets/uploads/images');

		 $crud->unset_add();
		 $crud->unset_edit();
		 $crud->unset_delete();
		 $crud->unset_print();
		 $crud->unset_clone();
		 $crud->unset_export();
		 $crud->unset_simpan();
				 
		 $output = $crud->render();
		 $this->_example_output($output);
	}

	public function petugas(){
		$crud = new grocery_CRUD();
		// $crud->set_model('Custom_grocery_crud_model');
		// $crud->basic_model->set_custom_query("SELECT * FROM pegawai where role = 'petugas'");

		$crud->set_table('pegawai');
		$crud->where("pegawai.role = 'petugas'");
		 $crud->set_subject('Data Petugas');	
		 $crud->required_fields('nik','nama','tempat_lahir','tanggal_lahir','jenis_kelamin','agama','no_telepon','alamat','pendidikan','email','unit_posyandu','status','unit_kerja','tanggal_penempatan');


		 $crud->set_field_upload('foto','assets/uploads/images');

		$crud->field_type('jenis_kelamin','enum',array('Laki-Laki','Perempuan'));
		$crud->field_type('pendidikan','enum',array('SMP','SMA','D3','S1','S2','S3'));
		$crud->field_type('agama','enum',array('Islam','Kristen','Budha','Hindu','Khonghucu'));
		$crud->field_type('status','enum',array('PNS','Honorer','Kontrak'));

		$crud->field_type('role','hidden','petugas');
		$crud->field_type('username','hidden','-');
		$crud->field_type('password','hidden','-');
		
		 $crud->unset_columns('username','password','role');

		 $crud->display_as('nik','NIK');

		 $crud->unset_texteditor('alamat');

		 $crud->callback_add_field('unit_posyandu',function(){
			return '  <input type="text" id="unit_posyandu" readonly name="unit_posyandu"  style="height: 40px; width: 400px;">&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#unitPosyandu"><b>Cari Data</b></button>';});
			
		$crud->callback_edit_field('unit_posyandu',function($value, $primary_key){
			return '  <input type="text" id="unit_posyandu" readonly value="'.$value.'" name="unit_posyandu"  style="height: 40px; width: 400px;" >&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#unitPosyandu"><b>Cari Data</b></button>';});


			$crud->unset_add();
			$crud->unset_edit();
			$crud->unset_delete();
			$crud->unset_print();
		 $crud->unset_clone();
		 $crud->unset_export();
		 $crud->unset_simpan();
				 
		 $output = $crud->render();
		 $this->_example_output($output);
	}

	public function bidan(){
		$crud = new grocery_CRUD();

		$crud->set_table('pegawai');
		$crud->where("pegawai.role = 'bidan'");
		 $crud->set_subject('Data Bidan');	
		 $crud->required_fields('nik','nama','tempat_lahir','tanggal_lahir','jenis_kelamin','agama','no_telepon','alamat','pendidikan','email','unit_posyandu','status','unit_kerja','tanggal_penempatan');
		 
		$crud->callback_add_field('username',function(){
			$data=$this->db->query("SELECT MAX(id) as kd FROM pegawai")->row_array();
			$data2=$data['kd']+1;
			$fzeropadded = sprintf("%03d", $data2);
			$now = date('Y'); 
			$acak = rand(10,100);
			$nosurat2 = $acak."/BDN"."/".$now;
			return '<input type="text" style="height: 40px" readonly value="'.$nosurat2.'" name="username" id="username">';});
		
		$crud->callback_edit_field('username',function($value, $primary_key){
			return '<input type="text" style="height: 40px" readonly value="'.$value.'" name="username" id="username"> ';});

		$crud->change_field_type('password', 'password');

		 $crud->set_field_upload('foto','assets/uploads/images');

		$crud->field_type('jenis_kelamin','enum',array('Laki-Laki','Perempuan'));
		$crud->field_type('pendidikan','enum',array('SMP','SMA','D3','S1','S2','S3'));
		$crud->field_type('agama','enum',array('Islam','Kristen','Budha','Hindu','Khonghucu'));
		$crud->field_type('status','enum',array('PNS','Honorer','Kontrak'));

		$crud->field_type('role','hidden','bidan');
		// $crud->field_type('username','hidden','-');
		// $crud->field_type('password','hidden','-');
		
		 $crud->unset_columns('username','password','role');

		 $crud->display_as('nik','NIK');

		 $crud->unset_texteditor('alamat');

		 $crud->callback_add_field('unit_posyandu',function(){
			return '  <input type="text" id="unit_posyandu" readonly name="unit_posyandu"  style="height: 40px; width: 400px;">&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#unitPosyandu"><b>Cari Data</b></button>';});
			
		$crud->callback_edit_field('unit_posyandu',function($value, $primary_key){
			return '  <input type="text" id="unit_posyandu" readonly value="'.$value.'" name="unit_posyandu"  style="height: 40px; width: 400px;" >&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#unitPosyandu"><b>Cari Data</b></button>';});

			$crud->unset_add();
			$crud->unset_edit();
			$crud->unset_delete();
			$crud->unset_print();
		 $crud->unset_clone();
		 $crud->unset_export();
		 $crud->unset_simpan();
				 
		 $output = $crud->render();
		 $this->_example_output($output);
	}
	

	public function kader(){
		$crud = new grocery_CRUD();

		$crud->set_table('pegawai');
		$crud->where("pegawai.role = 'kader'");
		 $crud->set_subject('Data kader');	
		 $crud->required_fields('nik','nama','tempat_lahir','tanggal_lahir','jenis_kelamin','agama','no_telepon','alamat','pendidikan','email','unit_posyandu','status','unit_kerja');

		 
		 $timezone="Asia/Makassar";
		date_default_timezone_set($timezone);
		$crud->change_field_type('tanggal_penempatan', 'hidden', date('Y-m-d'));
		 
		$crud->callback_add_field('username',function(){
			$data=$this->db->query("SELECT MAX(id) as kd FROM pegawai")->row_array();
			$data2=$data['kd']+1;
			$fzeropadded = sprintf("%03d", $data2);
			$now = date('Y'); 
			$acak = rand(10,100);
			$nosurat2 = $acak."/KADER"."/".$now;
			return '<input type="text" style="height: 40px" readonly value="'.$nosurat2.'" name="username" id="username">';});
		
		$crud->callback_edit_field('username',function($value, $primary_key){
			return '<input type="text" style="height: 40px" readonly value="'.$value.'" name="username" id="username"> ';});

		$crud->change_field_type('password', 'password');

		 $crud->set_field_upload('foto','assets/uploads/images');

		$crud->field_type('jenis_kelamin','enum',array('Laki-Laki','Perempuan'));
		$crud->field_type('pendidikan','enum',array('SMP','SMA','D3','S1','S2','S3'));
		$crud->field_type('agama','enum',array('Islam','Kristen','Budha','Hindu','Khonghucu'));
		$crud->field_type('status','hidden','-');

		$crud->field_type('role','hidden','kader');
		// $crud->field_type('username','hidden','-');
		// $crud->field_type('password','hidden','-');
		
		 $crud->unset_columns('username','password','role','status','tanggal_penempatan');

		 $crud->display_as('nik','NIK');

		 $crud->unset_texteditor('alamat');

		 $crud->callback_add_field('unit_posyandu',function(){
			return '  <input type="text" id="unit_posyandu" readonly name="unit_posyandu"  style="height: 40px; width: 400px;">&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#unitPosyandu"><b>Cari Data</b></button>';});
			
		$crud->callback_edit_field('unit_posyandu',function($value, $primary_key){
			return '  <input type="text" id="unit_posyandu" readonly value="'.$value.'" name="unit_posyandu"  style="height: 40px; width: 400px;" >&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#unitPosyandu"><b>Cari Data</b></button>';});

			$crud->unset_add();
			$crud->unset_edit();
			$crud->unset_delete();
			$crud->unset_print();
		 $crud->unset_clone();
		 $crud->unset_export();
		 $crud->unset_simpan();
				 
		 $output = $crud->render();
		 $this->_example_output($output);
	}
	
	public function jadwal_pemeriksaan(){
		$crud = new grocery_CRUD();

		$crud->set_table('jadwal_pemeriksaan');
		$crud->set_subject('Data Jadwal Pemeriksaan Ibu Hamil');	
		$crud->required_fields('kode_pemeriksaan','nama_kegiatan','tanggal','tempat','nama','nama_ibu','nama_ayah','no_telepon');

		$crud->callback_add_field('kode_pemeriksaan',function(){
			$data=$this->db->query("SELECT MAX(id) as kd FROM jadwal_pemeriksaan")->row_array();
			$data2=$data['kd']+1;
			$fzeropadded = sprintf("%03d", $data2);
			$now = date('Y'); 
			$nosurat2 = $fzeropadded."/CHECK"."/".$now;
			return '<input type="text" style="height: 40px" readonly value="'.$nosurat2.'" name="kode_pemeriksaan" id="kode_pemeriksaan">';});
		
		$crud->callback_edit_field('kode_pemeriksaan',function($value, $primary_key){
			return '<input type="text" style="height: 40px" readonly value="'.$value.'" name="kode_pemeriksaan" id="kode_pemeriksaan"> ';});

		 $crud->callback_add_field('tempat',function(){
			return '  <input type="text" id="tempat" readonly name="tempat"  style="height: 40px; width: 400px;">&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#jadwalPemeriksaan"><b>Cari Data</b></button>';});
			
		$crud->callback_edit_field('tempat',function($value, $primary_key){
			return '  <input type="text" id="tempat" readonly value="'.$value.'" name="tempat"  style="height: 40px; width: 400px;" >&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#jadwalPemeriksaan"><b>Cari Data</b></button>';});

		 $crud->callback_add_field('nama',function(){
			return '  <input type="text" id="nama" readonly name="nama"  style="height: 40px; width: 400px;">&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ibuJadwal"><b>Cari Data</b></button>';});
			
		$crud->callback_edit_field('nama',function($value, $primary_key){
			return '  <input type="text" id="nama" readonly value="'.$value.'" name="nama"  style="height: 40px; width: 400px;" >&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ibuJadwal"><b>Cari Data</b></button>';});

			$crud->unset_add();
			$crud->unset_edit();
			$crud->unset_delete();
			$crud->unset_print();
		 $crud->unset_clone();
		 $crud->unset_export();
		 $crud->unset_simpan();
				 
		 $output = $crud->render();
		 $this->_example_output($output);
	}
	
	public function jadwal_penimbangan(){
		$crud = new grocery_CRUD();

		$crud->set_table('jadwal_penimbangan');
		$crud->set_subject('Data Jadwal Penimbangan');	
		$crud->required_fields('kode_kegiatan','nama_kegiatan','tanggal','tempat','nama_bayi','nama_ibu','nama_ayah','no_telepon');

		$crud->callback_add_field('kode_kegiatan',function(){
			$data=$this->db->query("SELECT MAX(id) as kd FROM jadwal_penimbangan")->row_array();
			$data2=$data['kd']+1;
			$fzeropadded = sprintf("%03d", $data2);
			$now = date('Y'); 
			$nosurat2 = $fzeropadded."/ACT"."/".$now;
			return '<input type="text" style="height: 40px" readonly value="'.$nosurat2.'" name="kode_kegiatan" id="kode_kegiatan">';});
		
		$crud->callback_edit_field('kode_kegiatan',function($value, $primary_key){
			return '<input type="text" style="height: 40px" readonly value="'.$value.'" name="kode_kegiatan" id="kode_kegiatan"> ';});

		 $crud->callback_add_field('tempat',function(){
			return '  <input type="text" id="tempat" readonly name="tempat"  style="height: 40px; width: 400px;">&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#jadwalPenimbangan"><b>Cari Data</b></button>';});
			
		$crud->callback_edit_field('tempat',function($value, $primary_key){
			return '  <input type="text" id="tempat" readonly value="'.$value.'" name="tempat"  style="height: 40px; width: 400px;" >&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#jadwalPenimbangan"><b>Cari Data</b></button>';});

		 $crud->callback_add_field('nama_bayi',function(){
			return '  <input type="text" id="nama_bayi" readonly name="nama_bayi"  style="height: 40px; width: 400px;">&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bayiJadwal"><b>Cari Data</b></button>';});
			
		$crud->callback_edit_field('nama_bayi',function($value, $primary_key){
			return '  <input type="text" id="nama_bayi" readonly value="'.$value.'" name="nama_bayi"  style="height: 40px; width: 400px;" >&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bayiJadwal"><b>Cari Data</b></button>';});

			$crud->unset_add();
			$crud->unset_edit();
			$crud->unset_delete();
			$crud->unset_print();
		 $crud->unset_clone();
		 $crud->unset_export();
		 $crud->unset_simpan();
				 
		 $output = $crud->render();
		 $this->_example_output($output);
	}
	
	public function jadwal_imunisasi(){
		$crud = new grocery_CRUD();

		$crud->set_table('jadwal_imunisasi');
		$crud->set_subject('Data Jadwal Imunisasi');	
		$crud->required_fields('kode_kegiatan','nama_kegiatan','tanggal','tempat','nama_bayi','nama_ibu','nama_ayah','no_telepon');

		$crud->callback_add_field('kode_kegiatan',function(){
			$data=$this->db->query("SELECT MAX(id) as kd FROM jadwal_imunisasi")->row_array();
			$data2=$data['kd']+1;
			$fzeropadded = sprintf("%03d", $data2);
			$now = date('Y'); 
			$nosurat2 = $fzeropadded."/IMN"."/".$now;
			return '<input type="text" style="height: 40px" readonly value="'.$nosurat2.'" name="kode_kegiatan" id="kode_kegiatan">';});
		
		$crud->callback_edit_field('kode_kegiatan',function($value, $primary_key){
			return '<input type="text" style="height: 40px" readonly value="'.$value.'" name="kode_kegiatan" id="kode_kegiatan"> ';});

		 $crud->callback_add_field('tempat',function(){
			return '  <input type="text" id="tempat" readonly name="tempat"  style="height: 40px; width: 400px;">&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#jadwalPenimbangan"><b>Cari Data</b></button>';});
			
		$crud->callback_edit_field('tempat',function($value, $primary_key){
			return '  <input type="text" id="tempat" readonly value="'.$value.'" name="tempat"  style="height: 40px; width: 400px;" >&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#jadwalPenimbangan"><b>Cari Data</b></button>';});

		 $crud->callback_add_field('nama_bayi',function(){
			return '  <input type="text" id="nama_bayi" readonly name="nama_bayi"  style="height: 40px; width: 400px;">&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bayiJadwal"><b>Cari Data</b></button>';});
			
		$crud->callback_edit_field('nama_bayi',function($value, $primary_key){
			return '  <input type="text" id="nama_bayi" readonly value="'.$value.'" name="nama_bayi"  style="height: 40px; width: 400px;" >&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bayiJadwal"><b>Cari Data</b></button>';});

			$crud->unset_add();
			$crud->unset_edit();
			$crud->unset_delete();
			$crud->unset_print();
		 $crud->unset_clone();
		 $crud->unset_export();
		 $crud->unset_simpan();
				 
		 $output = $crud->render();
		 $this->_example_output($output);
	}
	
	public function pemeriksaan(){
		$crud = new grocery_CRUD();

		$crud->set_table('pemeriksaan');
		$crud->set_subject('Data Pemeriksaan Ibu Hamil');	
		$crud->required_fields('tanggal','petugas','nama','tempat_posyandu','berat_badan','panjang_badan','lingkar_kepala','lingkar_tangan','catatan_petugas');

		 $crud->callback_add_field('petugas',function(){
			return '  <input type="text" id="petugas" readonly name="petugas"  style="height: 40px; width: 400px;">&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#petugasPemeriksaan"><b>Cari Data</b></button>';});
			
		$crud->callback_edit_field('petugas',function($value, $primary_key){
			return '  <input type="text" id="petugas" readonly value="'.$value.'" name="petugas"  style="height: 40px; width: 400px;" >&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#petugasPemeriksaan"><b>Cari Data</b></button>';});

		 $crud->callback_add_field('nama',function(){
			return '  <input type="text" id="nama" readonly name="nama"  style="height: 40px; width: 400px;">&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ibuPemeriksaan"><b>Cari Data</b></button>';});
			
		$crud->callback_edit_field('nama',function($value, $primary_key){
			return '  <input type="text" id="nama" readonly value="'.$value.'" name="nama"  style="height: 40px; width: 400px;" >&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ibuPemeriksaan"><b>Cari Data</b></button>';});

		$crud->set_field_upload('foto','assets/uploads/images');

		$crud->unset_texteditor('catatan_petugas');

		$crud->unset_add();
		$crud->unset_edit();
		$crud->unset_delete();
		$crud->unset_print();
		 $crud->unset_clone();
		 $crud->unset_export();
		 $crud->unset_simpan();
				 
		 $output = $crud->render();
		 $this->_example_output($output);
	}
	
	
	public function penimbangan(){
		$crud = new grocery_CRUD();

		$crud->set_table('penimbangan');
		$crud->set_subject('Data Pelaksanaan Penimbangan Balita');	
		$crud->required_fields('tanggal','petugas','nama_bayi','tempat_posyandu','berat_badan','panjang_badan','lingkar_kepala','lingkar_tangan','catatan_petugas');

		 $crud->callback_add_field('petugas',function(){
			return '  <input type="text" id="petugas" readonly name="petugas"  style="height: 40px; width: 400px;">&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#petugasPenimbangan"><b>Cari Data</b></button>';});
			
		$crud->callback_edit_field('petugas',function($value, $primary_key){
			return '  <input type="text" id="petugas" readonly value="'.$value.'" name="petugas"  style="height: 40px; width: 400px;" >&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#petugasPenimbangan"><b>Cari Data</b></button>';});

		 $crud->callback_add_field('nama_bayi',function(){
			return '  <input type="text" id="nama_bayi" readonly name="nama_bayi"  style="height: 40px; width: 400px;">&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bayiPenimbangan"><b>Cari Data</b></button>';});
			
		$crud->callback_edit_field('nama_bayi',function($value, $primary_key){
			return '  <input type="text" id="nama_bayi" readonly value="'.$value.'" name="nama_bayi"  style="height: 40px; width: 400px;" >&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bayiPenimbangan"><b>Cari Data</b></button>';});

		$crud->set_field_upload('foto','assets/uploads/images');

		$crud->unset_texteditor('catatan_petugas');

		$crud->unset_add();
		$crud->unset_edit();
		$crud->unset_delete();
		$crud->unset_print();
		 $crud->unset_clone();
		 $crud->unset_export();
		 $crud->unset_simpan();
				 
		 $output = $crud->render();
		 $this->_example_output($output);
	}
	
	public function imunisasi(){
		$crud = new grocery_CRUD();

		$crud->set_table('imunisasi');
		$crud->set_subject('Data Pelaksanaan Imunisasi Balita');	
		$crud->required_fields('tanggal','jenis_imunisasi','petugas','nama_bayi','tempat_posyandu','berat_badan','panjang_badan','lingkar_kepala','lingkar_tangan','catatan_petugas','dosis');

		 $crud->callback_add_field('jenis_imunisasi',function(){
			return '  <input type="text" id="jenis_imunisasi" readonly name="jenis_imunisasi"  style="height: 40px; width: 400px;">&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#jenisImunisasi"><b>Cari Data</b></button>';});
			
		$crud->callback_edit_field('jenis_imunisasi',function($value, $primary_key){
			return '  <input type="text" id="jenis_imunisasi" readonly value="'.$value.'" name="jenis_imunisasi"  style="height: 40px; width: 400px;" >&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#jenisImunisasi"><b>Cari Data</b></button>';});

		 $crud->callback_add_field('petugas',function(){
			return '  <input type="text" id="petugas" readonly name="petugas"  style="height: 40px; width: 400px;">&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#petugasPenimbangan"><b>Cari Data</b></button>';});
			
		$crud->callback_edit_field('petugas',function($value, $primary_key){
			return '  <input type="text" id="petugas" readonly value="'.$value.'" name="petugas"  style="height: 40px; width: 400px;" >&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#petugasPenimbangan"><b>Cari Data</b></button>';});

		 $crud->callback_add_field('nama_bayi',function(){
			return '  <input type="text" id="nama_bayi" readonly name="nama_bayi"  style="height: 40px; width: 400px;">&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bayiPenimbangan"><b>Cari Data</b></button>';});
			
		$crud->callback_edit_field('nama_bayi',function($value, $primary_key){
			return '  <input type="text" id="nama_bayi" readonly value="'.$value.'" name="nama_bayi"  style="height: 40px; width: 400px;" >&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bayiPenimbangan"><b>Cari Data</b></button>';});

		 $crud->callback_add_field('pemberian_obat',function(){
			return '  <input type="text" id="pemberian_obat" readonly name="pemberian_obat"  style="height: 40px; width: 400px;">&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#obatImunisasi"><b>Cari Data</b></button>';});
			
		$crud->callback_edit_field('pemberian_obat',function($value, $primary_key){
			return '  <input type="text" id="pemberian_obat" readonly value="'.$value.'" name="pemberian_obat"  style="height: 40px; width: 400px;" >&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#obatImunisasi"><b>Cari Data</b></button>';});

		$crud->set_field_upload('foto','assets/uploads/images');

		$crud->unset_texteditor('catatan_petugas');

		$crud->unset_add();
		$crud->unset_edit();
		$crud->unset_delete();
		$crud->unset_print();
		 $crud->unset_clone();
		 $crud->unset_export();
		 $crud->unset_simpan();
				 
		 $output = $crud->render();
		 $this->_example_output($output);
	}

	public function logout()
	{
	 $this->session->sess_destroy();
	 
	 redirect('login');
	}
  


}
