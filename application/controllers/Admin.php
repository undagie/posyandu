<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
		$this->load->model('m_login');

		$this->load->library('grocery_CRUD', 'email');

		$cab = $this->db->query("SELECT * FROM kuesioner GROUP BY nik")->result();

		foreach ($cab as $key) {
			$nik = $key->nik;

			$p1 = $key->pertanyaan1;
			$p2 = $key->pertanyaan2;
			$p3 = $key->pertanyaan3;
			$p4 = $key->pertanyaan4;
			$p5 = $key->pertanyaan5;
			$p6 = $key->pertanyaan6;
			$p7 = $key->pertanyaan7;

			if ($p1 == 'Sangat Baik') {
				$p1 = 4;
			} elseif ($p1 == 'Baik') {
				$p1 = 3;
			} elseif ($p1 == 'Kurang Baik') {
				$p1 = 2;
			} else {
				$p1 = 1;
			}

			if ($p2 == 'Sangat Baik') {
				$p2 = 4;
			} elseif ($p2 == 'Baik') {
				$p2 = 3;
			} elseif ($p2 == 'Kurang Baik') {
				$p2 = 2;
			} else {
				$p2 = 1;
			}

			if ($p3 == 'Sangat Baik') {
				$p3 = 4;
			} elseif ($p3 == 'Baik') {
				$p3 = 3;
			} elseif ($p3 == 'Kurang Baik') {
				$p3 = 2;
			} else {
				$p3 = 1;
			}

			if ($p4 == 'Sangat Baik') {
				$p4 = 4;
			} elseif ($p4 == 'Baik') {
				$p4 = 3;
			} elseif ($p4 == 'Kurang Baik') {
				$p4 = 2;
			} else {
				$p4 = 1;
			}

			if ($p5 == 'Sangat Baik') {
				$p5 = 4;
			} elseif ($p5 == 'Baik') {
				$p5 = 3;
			} elseif ($p5 == 'Kurang Baik') {
				$p5 = 2;
			} else {
				$p5 = 1;
			}

			if ($p6 == 'Sangat Baik') {
				$p6 = 4;
			} elseif ($p6 == 'Baik') {
				$p6 = 3;
			} elseif ($p6 == 'Kurang Baik') {
				$p6 = 2;
			} else {
				$p6 = 1;
			}

			if ($p7 == 'Sangat Baik') {
				$p7 = 4;
			} elseif ($p7 == 'Baik') {
				$p7 = 3;
			} elseif ($p7 == 'Kurang Baik') {
				$p7 = 2;
			} else {
				$p7 = 1;
			}

			$hasil = $p1 + $p2 + $p3 + $p4 + $p5 + $p6 + $p7;

			if (($hasil >= 24)) {
				$this->db->query("UPDATE kuesioner SET rekap = '4' WHERE nik = '$nik'");
				// return 'Sangat Baik';
			} elseif (($hasil <= 23) && ($hasil >= 18)) {
				$this->db->query("UPDATE kuesioner SET rekap = '3' WHERE nik = '$nik'");
				// return 'Baik';
			} elseif (($hasil <= 17) && ($hasil >= 12)) {
				$this->db->query("UPDATE kuesioner SET rekap = '2' WHERE nik = '$nik'");
				// return 'Cukup Baik';
			} else {
				$this->db->query("UPDATE kuesioner SET rekap = '1' WHERE nik = '$nik'");
				// return 'Tidak Baik';
			}
		}
	}

	public function _example_output($output = null)
	{
		$this->load->view('content_crud_admin', (array)$output);
	}


	public function index()
	{
		$this->_example_output((object)array('output' => '', 'js_files' => array(), 'css_files' => array()));
	}

	public function ttd()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('ttd');
		$crud->set_subject('Setting Tanda Tangan');

		$crud->required_fields('nama', 'nip', 'jabatan');

		$crud->set_field_upload('tanda_tangan', 'assets/uploads/images');

		$crud->unset_add();
		$crud->unset_delete();
		$crud->unset_print();
		$crud->unset_clone();
		$crud->unset_export();
		$crud->unset_simpan();

		$output = $crud->render();
		$this->_example_output($output);
	}

	public function pengguna()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('pegawai');
		$crud->where("pegawai.role = 'admin'");
		$crud->set_subject('Data Pengguna');
		$crud->required_fields('username', 'password', 'nama', 'role');
		$crud->columns('username', 'password', 'nama', 'role', 'no_telepon', 'email');

		$crud->change_field_type('password', 'password');

		// $crud->field_type('role','enum',array('admin','kepala dinas'));
		$crud->field_type('role', 'hidden', 'admin');

		$crud->field_type('nik', 'hidden');
		$crud->field_type('tempat_lahir', 'hidden');
		$crud->field_type('tanggal_lahir', 'hidden');
		$crud->field_type('jenis_kelamin', 'hidden');
		$crud->field_type('agama', 'hidden');
		$crud->field_type('alamat', 'hidden');
		$crud->field_type('jabatan', 'hidden');
		$crud->field_type('foto', 'hidden');
		$crud->field_type('status', 'hidden');
		$crud->field_type('pendidikan', 'hidden');
		$crud->field_type('unit_posyandu', 'hidden');
		$crud->field_type('tanggal_penempatan', 'hidden');

		$crud->unset_print();
		$crud->unset_clone();
		$crud->unset_export();
		$crud->unset_simpan();

		$output = $crud->render();
		$this->_example_output($output);
	}


	public function jenis_imunisasi()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('jenis_imunisasi');
		$crud->set_subject('Data Jenis Imunisasi');
		$crud->required_fields('jenis_imunisasi', 'usia', 'keterangan');

		$crud->unset_print();
		$crud->unset_clone();
		$crud->unset_export();
		$crud->unset_simpan();

		$output = $crud->render();
		$this->_example_output($output);
	}


	public function posyandu()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('posyandu');
		$crud->set_subject('Data Posyandu');
		$crud->required_fields('kode_posyandu', 'nama_posyandu', 'no_telepon', 'email', 'alamat', 'kelurahan', 'kecamatan', 'kabupaten');

		$crud->callback_add_field('kode_posyandu', function () {
			$data = $this->db->query("SELECT MAX(id) as kd FROM posyandu")->row_array();
			$data2 = $data['kd'] + 1;
			$fzeropadded = sprintf("%03d", $data2);
			$now = date('Y');
			$nosurat2 = $fzeropadded . "/POS" . "/" . $now;
			return '<input type="text" style="height: 40px" readonly value="' . $nosurat2 . '" name="kode_posyandu" id="kode_posyandu">';
		});

		$crud->callback_edit_field('kode_posyandu', function ($value, $primary_key) {
			return '<input type="text" style="height: 40px" readonly value="' . $value . '" name="kode_posyandu" id="kode_posyandu"> ';
		});

		$crud->unset_texteditor('alamat');

		$crud->set_field_upload('foto', 'assets/uploads/images');

		$crud->unset_print();
		$crud->unset_clone();
		$crud->unset_export();
		$crud->unset_simpan();

		$output = $crud->render();
		$this->_example_output($output);
	}

	public function obat()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('obat');
		$crud->set_subject('Data Obat');
		$crud->required_fields('tanggal_input', 'kode_obat', 'nama_nama', 'jenis_obat', 'fungsi_obat', 'masa_kadaluarsa', 'untuk_usia');

		$timezone = "Asia/Makassar";
		date_default_timezone_set($timezone);
		$crud->change_field_type('tanggal_input', 'hidden', date('Y-m-d'));

		$crud->callback_add_field('kode_obat', function () {
			$data = $this->db->query("SELECT MAX(id) as kd FROM obat")->row_array();
			$data2 = $data['kd'] + 1;
			$fzeropadded = sprintf("%03d", $data2);
			$now = date('Y');
			$nosurat2 = $fzeropadded . "/OBT" . "/" . $now;
			return '<input type="text" style="height: 40px" readonly value="' . $nosurat2 . '" name="kode_obat" id="kode_obat">';
		});

		$crud->callback_edit_field('kode_obat', function ($value, $primary_key) {
			return '<input type="text" style="height: 40px" readonly value="' . $value . '" name="kode_obat" id="kode_obat"> ';
		});

		$crud->unset_texteditor('fungsi_obat');

		$crud->field_type('jenis_obat', 'enum', array('Serbuk', 'Tablet', 'Pil', 'Kapsul', 'Larutan', 'Sirup', 'Salep', 'Tetes'));

		$crud->set_field_upload('foto', 'assets/uploads/images');

		$crud->unset_print();
		$crud->unset_clone();
		$crud->unset_export();
		$crud->unset_simpan();

		$output = $crud->render();
		$this->_example_output($output);
	}


	public function _usia_ibu($value, $row)
	{
		$data = array();
		$cab = $this->db->query("SELECT * FROM ibu_hamil")->result_array();
		foreach ($cab as $value) {
			if ($value['kode_sensus'] == $row->kode_sensus) {
				$tanggal_lahir = $value['tanggal_lahir'];
				$date2 = date("Y-m-d");

				$date_diff = abs(strtotime($date2) - strtotime($tanggal_lahir));

				$years = floor($date_diff / (365 * 60 * 60 * 24));
				$months = floor(($date_diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
				$days = floor(($date_diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
			}
		}

		if (($years >= 1) && ($months >= 0) && ($days >= 0)) {
			return $years . ' Tahun, ' . $months . ' Bulan, ' . $days . ' Hari';
		} elseif (($years <= 0) && ($months >= 1) && ($days >= 1)) {
			return $months . ' Bulan, ' . $days . ' Hari';
		} elseif (($years <= 0) && ($months >= 1) && ($days <= 0)) {
			return $months . ' Bulan';
		} else {
			return $days . ' Hari';
		}
	}

	public function ibu_hamil()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('ibu_hamil');
		$crud->set_subject('Data Ibu Hamil');
		$crud->required_fields('kode_sensus', 'tanggal_sensus', 'nama', 'jenis_kelamin', 'nama_suami', 'nama_ayah', 'alamat', 'kelurahan', 'rt', 'kecamatan', 'kabupaten', 'no_telepon');

		$crud->field_type('jenis_kelamin', 'enum', array('Laki-Laki', 'Perempuan'));
		$crud->field_type('status', 'enum', array('Aktif', 'Non Aktif'));
		$crud->field_type('rt', 'enum', array('RT 1', 'RT 2', 'RT 3', 'RT 4'));

		$crud->display_as('rt', 'RT');

		$crud->field_type('usia', 'hidden');

		$crud->callback_column('usia', array($this, '_usia_ibu'));

		$crud->unset_texteditor('alamat');

		$crud->set_field_upload('foto', 'assets/uploads/images');

		$crud->unset_print();
		$crud->unset_clone();
		$crud->unset_export();
		$crud->unset_simpan();
		$crud->unset_columns(array('tanggal_lahir', 'kelurahan', 'kecamatan', 'kabupaten', 'foto'));

		$output = $crud->render();
		$this->_example_output($output);
	}

	public function _usia_balita($value, $row)
	{
		$data = array();
		$cab = $this->db->query("SELECT * FROM bayi")->result_array();
		foreach ($cab as $value) {
			if ($value['kode_sensus'] == $row->kode_sensus) {
				$tanggal_lahir = $value['tanggal_lahir'];
				$date2 = date("Y-m-d");

				$date_diff = abs(strtotime($date2) - strtotime($tanggal_lahir));

				$years = floor($date_diff / (365 * 60 * 60 * 24));
				$months = floor(($date_diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
				$days = floor(($date_diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
			}
		}

		if (($years >= 1) && ($months >= 0) && ($days >= 0)) {
			return $years . ' Tahun, ' . $months . ' Bulan, ' . $days . ' Hari';
		} elseif (($years <= 0) && ($months >= 1) && ($days >= 1)) {
			return $months . ' Bulan, ' . $days . ' Hari';
		} elseif (($years <= 0) && ($months >= 1) && ($days <= 0)) {
			return $months . ' Bulan';
		} else {
			return $days . ' Hari';
		}
	}

	public function bayi()
	{
		$crud = new grocery_CRUD();
		$crud->set_table('bayi');
		$crud->set_subject('Data Balita');
		$crud->required_fields('kode_sensus', 'tanggal_sensus', 'nama_bayi', 'jenis_kelamin', 'tanggal_lahir',  'nama_ibu', 'nama_ayah', 'alamat', 'rt', 'kelurahan', 'kecamatan', 'kabupaten', 'no_telepon');

		$crud->field_type('jenis_kelamin', 'enum', array('Laki-Laki', 'Perempuan'));
		$crud->field_type('status', 'enum', array('Aktif', 'Non Aktif'));
		$crud->field_type('rt', 'enum', array('RT 1', 'RT 2', 'RT 3', 'RT 4'));

		$crud->display_as('rt', 'RT');

		$crud->field_type('usia', 'hidden');

		$crud->callback_column('usia', array($this, '_usia_balita'));

		$crud->unset_texteditor('alamat');

		$crud->set_field_upload('foto', 'assets/uploads/images');

		$crud->unset_print();
		$crud->unset_clone();
		$crud->unset_export();
		$crud->unset_simpan();
		$crud->unset_columns(array('tanggal_lahir', 'nama_ayah', 'kelurahan', 'kecamatan', 'kabupaten', 'foto'));

		$output = $crud->render();
		$this->_example_output($output);
	}

	public function petugas()
	{
		$crud = new grocery_CRUD();
		// $crud->set_model('Custom_grocery_crud_model');
		// $crud->basic_model->set_custom_query("SELECT * FROM pegawai where role = 'petugas'");

		$crud->set_table('pegawai');
		$crud->where("pegawai.role = 'petugas'");
		$crud->set_subject('Data Petugas');
		$crud->required_fields('nik', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'agama', 'no_telepon', 'alamat', 'pendidikan', 'email', 'unit_posyandu', 'status', 'unit_kerja', 'tanggal_penempatan');


		$crud->set_field_upload('foto', 'assets/uploads/images');

		$crud->field_type('jenis_kelamin', 'enum', array('Laki-Laki', 'Perempuan'));
		$crud->field_type('pendidikan', 'enum', array('SMP', 'SMA', 'D3', 'S1', 'S2', 'S3'));
		$crud->field_type('agama', 'enum', array('Islam', 'Kristen', 'Budha', 'Hindu', 'Khonghucu'));
		$crud->field_type('status', 'enum', array('PNS', 'Honorer', 'Kontrak'));

		$crud->field_type('role', 'hidden', 'petugas');
		$crud->field_type('username', 'hidden', '-');
		$crud->field_type('password', 'hidden', '-');

		$crud->unset_columns('username', 'password', 'role');

		$crud->display_as('nik', 'NIK');

		$crud->unset_texteditor('alamat');

		$crud->callback_add_field('unit_posyandu', function () {
			return '  <input type="text" id="unit_posyandu" readonly name="unit_posyandu"  style="height: 40px; width: 400px;">&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#unitPosyandu"><b>Cari Data</b></button>';
		});

		$crud->callback_edit_field('unit_posyandu', function ($value, $primary_key) {
			return '  <input type="text" id="unit_posyandu" readonly value="' . $value . '" name="unit_posyandu"  style="height: 40px; width: 400px;" >&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#unitPosyandu"><b>Cari Data</b></button>';
		});


		$crud->unset_print();
		$crud->unset_clone();
		$crud->unset_export();
		$crud->unset_simpan();

		$output = $crud->render();
		$this->_example_output($output);
	}

	public function bidan()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('pegawai');
		$crud->where("pegawai.role = 'bidan'");
		$crud->set_subject('Data Bidan');
		$crud->required_fields('nik', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'agama', 'no_telepon', 'alamat', 'pendidikan', 'email', 'unit_posyandu', 'status', 'unit_kerja', 'tanggal_penempatan');


		$crud->change_field_type('password', 'password');

		$crud->set_field_upload('foto', 'assets/uploads/images');

		$crud->field_type('jenis_kelamin', 'enum', array('Laki-Laki', 'Perempuan'));
		$crud->field_type('pendidikan', 'enum', array('SMP', 'SMA', 'D3', 'S1', 'S2', 'S3'));
		$crud->field_type('agama', 'enum', array('Islam', 'Kristen', 'Budha', 'Hindu', 'Khonghucu'));
		$crud->field_type('status', 'enum', array('PNS', 'Honorer', 'Kontrak'));

		$crud->field_type('role', 'hidden', 'bidan');
		// $crud->field_type('username','hidden','-');
		// $crud->field_type('password','hidden','-');

		$crud->unset_columns('username', 'password', 'role');

		$crud->display_as('nik', 'NIK');

		$crud->unset_texteditor('alamat');

		$crud->callback_add_field('unit_posyandu', function () {
			return '  <input type="text" id="unit_posyandu" readonly name="unit_posyandu"  style="height: 40px; width: 400px;">&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#unitPosyandu"><b>Cari Data</b></button>';
		});

		$crud->callback_edit_field('unit_posyandu', function ($value, $primary_key) {
			return '  <input type="text" id="unit_posyandu" readonly value="' . $value . '" name="unit_posyandu"  style="height: 40px; width: 400px;" >&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#unitPosyandu"><b>Cari Data</b></button>';
		});

		$crud->unset_print();
		$crud->unset_clone();
		$crud->unset_export();
		$crud->unset_simpan();
		$crud->unset_columns(array('tempat_lahir', 'jenis_kelamin', 'agama', 'tanggal_penepatan', 'status', 'foto'));

		$output = $crud->render();
		$this->_example_output($output);
	}


	public function kader()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('pegawai');
		$crud->where("pegawai.role = 'kader'");
		$crud->set_subject('Data kader');
		$crud->required_fields('nik', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'agama', 'no_telepon', 'alamat', 'pendidikan', 'email', 'unit_posyandu', 'status', 'unit_kerja');


		$timezone = "Asia/Makassar";
		date_default_timezone_set($timezone);
		$crud->change_field_type('tanggal_penempatan', 'hidden', date('Y-m-d'));

		$crud->callback_add_field('username', function () {
			$data = $this->db->query("SELECT MAX(id) as kd FROM pegawai")->row_array();
			$data2 = $data['kd'] + 1;
			$fzeropadded = sprintf("%03d", $data2);
			$now = date('Y');
			$acak = rand(10, 100);
			$nosurat2 = $acak . "/KADER" . "/" . $now;
			return '<input type="text" style="height: 40px" readonly value="' . $nosurat2 . '" name="username" id="username">';
		});

		$crud->callback_edit_field('username', function ($value, $primary_key) {
			return '<input type="text" style="height: 40px" readonly value="' . $value . '" name="username" id="username"> ';
		});

		$crud->change_field_type('password', 'password');

		$crud->set_field_upload('foto', 'assets/uploads/images');

		$crud->field_type('jenis_kelamin', 'enum', array('Laki-Laki', 'Perempuan'));
		$crud->field_type('pendidikan', 'enum', array('SMP', 'SMA', 'D3', 'S1', 'S2', 'S3'));
		$crud->field_type('agama', 'enum', array('Islam', 'Kristen', 'Budha', 'Hindu', 'Khonghucu'));
		$crud->field_type('status', 'hidden', '-');

		$crud->field_type('role', 'hidden', 'kader');
		// $crud->field_type('username','hidden','-');
		// $crud->field_type('password','hidden','-');

		$crud->unset_columns('username', 'password', 'role', 'status', 'tanggal_penempatan');

		$crud->display_as('nik', 'NIK');

		$crud->unset_texteditor('alamat');

		$crud->callback_add_field('unit_posyandu', function () {
			return '  <input type="text" id="unit_posyandu" readonly name="unit_posyandu"  style="height: 40px; width: 400px;">&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#unitPosyandu"><b>Cari Data</b></button>';
		});

		$crud->callback_edit_field('unit_posyandu', function ($value, $primary_key) {
			return '  <input type="text" id="unit_posyandu" readonly value="' . $value . '" name="unit_posyandu"  style="height: 40px; width: 400px;" >&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#unitPosyandu"><b>Cari Data</b></button>';
		});

		$crud->unset_print();
		$crud->unset_clone();
		$crud->unset_export();
		$crud->unset_simpan();

		$output = $crud->render();
		$this->_example_output($output);
	}

	public function jadwal_pemeriksaan()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('jadwal_pemeriksaan');
		$crud->set_subject('Data Jadwal Pemeriksaan Ibu Hamil');
		$crud->required_fields('kode_pemeriksaan', 'nama_kegiatan', 'tanggal', 'tempat', 'rt', 'pukul', 'kegiatan', 'pelaksanaan');

		$crud->order_by('tanggal', 'desc');

		$crud->callback_add_field('kode_pemeriksaan', function () {
			$data = $this->db->query("SELECT MAX(id) as kd FROM jadwal_pemeriksaan")->row_array();
			$data2 = $data['kd'] + 1;
			$fzeropadded = sprintf("%03d", $data2);
			$now = date('Y');
			$nosurat2 = $fzeropadded . "/CHECK" . "/" . $now;
			return '<input type="text" style="height: 40px" readonly value="' . $nosurat2 . '" name="kode_pemeriksaan" id="kode_pemeriksaan">';
		});

		$crud->callback_edit_field('kode_pemeriksaan', function ($value, $primary_key) {
			return '<input type="text" style="height: 40px" readonly value="' . $value . '" name="kode_pemeriksaan" id="kode_pemeriksaan"> ';
		});

		$crud->callback_add_field('tempat', function () {
			return '  <input type="text" id="tempat" readonly name="tempat"  style="height: 40px; width: 400px;">&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#jadwalPemeriksaan"><b>Cari Data</b></button>';
		});

		$crud->callback_edit_field('tempat', function ($value, $primary_key) {
			return '  <input type="text" id="tempat" readonly value="' . $value . '" name="tempat"  style="height: 40px; width: 400px;" >&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#jadwalPemeriksaan"><b>Cari Data</b></button>';
		});

		$crud->callback_add_field('nama', function () {
			return '  <input type="text" id="nama" readonly name="nama"  style="height: 40px; width: 400px;">&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ibuJadwal"><b>Cari Data</b></button>';
		});

		$crud->callback_edit_field('nama', function ($value, $primary_key) {
			return '  <input type="text" id="nama" readonly value="' . $value . '" name="nama"  style="height: 40px; width: 400px;" >&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ibuJadwal"><b>Cari Data</b></button>';
		});

		$crud->field_type('rt', 'enum', array('RT 1', 'RT 2', 'RT 3', 'RT 4'));

		$crud->display_as('rt', 'RT');
		$crud->display_as('pelaksanaan', 'Tempat');
		$crud->display_as('tempat', 'Pelaksanaan');

		$crud->unset_print();
		$crud->unset_clone();
		$crud->unset_export();
		$crud->unset_simpan();

		$output = $crud->render();
		$this->_example_output($output);
	}

	public function jadwal_penimbangan()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('jadwal_penimbangan');
		$crud->set_subject('Data Jadwal Penimbangan');
		$crud->required_fields('kode_kegiatan', 'nama_kegiatan', 'tanggal', 'tempat', 'rt', 'pukul', 'kegiatan', 'pelaksanaan');

		$crud->order_by('tanggal', 'desc');

		$crud->callback_add_field('kode_kegiatan', function () {
			$data = $this->db->query("SELECT MAX(id) as kd FROM jadwal_penimbangan")->row_array();
			$data2 = $data['kd'] + 1;
			$fzeropadded = sprintf("%03d", $data2);
			$now = date('Y');
			$nosurat2 = $fzeropadded . "/ACT" . "/" . $now;
			return '<input type="text" style="height: 40px" readonly value="' . $nosurat2 . '" name="kode_kegiatan" id="kode_kegiatan">';
		});

		$crud->callback_edit_field('kode_kegiatan', function ($value, $primary_key) {
			return '<input type="text" style="height: 40px" readonly value="' . $value . '" name="kode_kegiatan" id="kode_kegiatan"> ';
		});

		$crud->callback_add_field('tempat', function () {
			return '<input type="text" id="tempat" readonly name="tempat"  style="height: 40px; width: 400px;">&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#jadwalPenimbangan"><b>Cari Data</b></button>';
		});

		$crud->callback_edit_field('tempat', function ($value, $primary_key) {
			return '<input type="text" id="tempat" readonly value="' . $value . '" name="tempat"  style="height: 40px; width: 400px;" >&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#jadwalPenimbangan"><b>Cari Data</b></button>';
		});

		$crud->callback_add_field('nama_bayi', function () {
			return '<input type="text" id="nama_bayi" readonly name="nama_bayi"  style="height: 40px; width: 400px;">&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bayiJadwal"><b>Cari Data</b></button>';
		});

		$crud->callback_edit_field('nama_bayi', function ($value, $primary_key) {
			return '<input type="text" id="nama_bayi" readonly value="' . $value . '" name="nama_bayi"  style="height: 40px; width: 400px;" >&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bayiJadwal"><b>Cari Data</b></button>';
		});

		$crud->field_type('rt', 'enum', array('RT 1', 'RT 2', 'RT 3', 'RT 4'));

		$crud->display_as('rt', 'RT');
		$crud->display_as('pelaksanaan', 'Tempat');
		$crud->display_as('tempat', 'Pelaksanaan');

		$crud->unset_print();
		$crud->unset_clone();
		$crud->unset_export();
		$crud->unset_simpan();

		$crud->callback_after_insert(array($this, 'send_notification_after_insert'));

		$output = $crud->render();
		$this->_example_output($output);
	}

	public function jadwal_imunisasi()
	{
		$crud = new grocery_CRUD();

		$crud->set_table('jadwal_imunisasi');
		$crud->set_subject('Data Jadwal Imunisasi');
		$crud->required_fields('kode_kegiatan', 'nama_kegiatan', 'tanggal', 'tempat', 'nama_bayi', 'nama_ibu', 'nama_ayah', 'no_telepon');

		$crud->order_by('tanggal', 'desc');

		$crud->callback_add_field('kode_kegiatan', function () {
			$data = $this->db->query("SELECT MAX(id) as kd FROM jadwal_imunisasi")->row_array();
			$data2 = $data['kd'] + 1;
			$fzeropadded = sprintf("%03d", $data2);
			$now = date('Y');
			$nosurat2 = $fzeropadded . "/IMN" . "/" . $now;
			return '<input type="text" style="height: 40px" readonly value="' . $nosurat2 . '" name="kode_kegiatan" id="kode_kegiatan">';
		});

		$crud->callback_edit_field('kode_kegiatan', function ($value, $primary_key) {
			return '<input type="text" style="height: 40px" readonly value="' . $value . '" name="kode_kegiatan" id="kode_kegiatan"> ';
		});

		$crud->callback_add_field('tempat', function () {
			return '  <input type="text" id="tempat" readonly name="tempat"  style="height: 40px; width: 400px;">&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#jadwalPenimbangan"><b>Cari Data</b></button>';
		});

		$crud->callback_edit_field('tempat', function ($value, $primary_key) {
			return '  <input type="text" id="tempat" readonly value="' . $value . '" name="tempat"  style="height: 40px; width: 400px;" >&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#jadwalPenimbangan"><b>Cari Data</b></button>';
		});

		$crud->callback_add_field('nama_bayi', function () {
			return '  <input type="text" id="nama_bayi" readonly name="nama_bayi"  style="height: 40px; width: 400px;">&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bayiJadwal"><b>Cari Data</b></button>';
		});

		$crud->callback_edit_field('nama_bayi', function ($value, $primary_key) {
			return '  <input type="text" id="nama_bayi" readonly value="' . $value . '" name="nama_bayi"  style="height: 40px; width: 400px;" >&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bayiJadwal"><b>Cari Data</b></button>';
		});


		$crud->field_type('rt', 'enum', array('RT 1', 'RT 2', 'RT 3', 'RT 4'));

		$crud->display_as('rt', 'RT');
		$crud->display_as('pelaksanaan', 'Tempat');
		$crud->display_as('tempat', 'Pelaksanaan');

		$crud->unset_print();
		$crud->unset_clone();
		$crud->unset_export();
		$crud->unset_simpan();

		$output = $crud->render();
		$this->_example_output($output);
	}

	public function pemeriksaan()
	{
		$crud = new grocery_CRUD();
		$crud->set_model('Custom_grocery_crud_model');
		$crud->basic_model->set_custom_query("SELECT * FROM ibu_hamil, pemeriksaan where pemeriksaan.nama = ibu_hamil.nama AND ibu_hamil.status = 'Aktif'");

		$crud->set_table('pemeriksaan');
		$crud->set_subject('Data Pemeriksaan Ibu Hamil');
		$crud->required_fields('jadwal_pemeriksaan', 'petugas', 'nama', 'tempat_posyandu', 'berat_badan', 'panjang_badan', 'lingkar_kepala', 'lingkar_tangan', 'catatan_petugas');

		$crud->callback_add_field('petugas', function () {
			return '  <input type="text" id="petugas" readonly name="petugas"  style="height: 40px; width: 400px;">&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#petugasPemeriksaan"><b>Cari Data</b></button>';
		});

		$crud->callback_edit_field('petugas', function ($value, $primary_key) {
			return '  <input type="text" id="petugas" readonly value="' . $value . '" name="petugas"  style="height: 40px; width: 400px;" >&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#petugasPemeriksaan"><b>Cari Data</b></button>';
		});

		$crud->callback_add_field('nama', function () {
			return '  <input type="text" id="nama" readonly name="nama"  style="height: 40px; width: 400px;">&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ibuPemeriksaan"><b>Cari Data</b></button>';
		});

		$crud->callback_edit_field('nama', function ($value, $primary_key) {
			return '  <input type="text" id="nama" readonly value="' . $value . '" name="nama"  style="height: 40px; width: 400px;" >&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ibuPemeriksaan"><b>Cari Data</b></button>';
		});


		$crud->callback_add_field('jadwal_pemeriksaan', function () {
			return '  <input type="text" id="jadwal_pemeriksaan" readonly name="jadwal_pemeriksaan"  style="height: 40px; width: 400px;">&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#jadwalPeriksa"><b>Cari Data</b></button>';
		});

		$crud->callback_edit_field('jadwal_pemeriksaan', function ($value, $primary_key) {
			return '  <input type="text" id="jadwal_pemeriksaan" readonly value="' . $value . '" name="jadwal_pemeriksaan"  style="height: 40px; width: 400px;" >&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#jadwalPeriksa"><b>Cari Data</b></button>';
		});


		$crud->set_field_upload('foto', 'assets/uploads/images');

		$crud->display_as('rt', 'RT');

		$crud->unset_texteditor('catatan_petugas');

		$crud->unset_print();
		$crud->unset_clone();
		$crud->unset_export();
		$crud->unset_simpan();

		$crud->add_action('Berita Acara Pemeriksaan Ibu Hamil', base_url('/assets/print.png'), 'admin/cetak_pemeriksaan');

		$output = $crud->render();
		$output->output = str_replace('title="Berita Acara Pemeriksaan Ibu Hamil"', 'title ="Berita Acara Pemeriksaan Ibu Hamil" target="_blank"', $output->output);
		$this->_example_output($output);
	}

	public function cetak_pemeriksaan()
	{
		$data['data'] = $this->m_login->cetak_pemeriksaan($this->uri->segment(3));
		$this->load->view('rekap/cetak_pemeriksaan', $data);
	}


	function cek_nama_bayi($post_array)
	{
		$nama_bayi = $post_array['nama_bayi'];
		$i = $this->db->query("SELECT * FROM penimbangan where nama_bayi = '$nama_bayi'")->num_rows();
		if ($i == 0) {
			return true;
		} else {
			return false;
		}
	}


	public function penimbangan()
	{
		$crud = new grocery_CRUD();
		$crud->set_model('Custom_grocery_crud_model');
		$crud->basic_model->set_custom_query("SELECT * FROM bayi, penimbangan where penimbangan.nama_bayi = bayi.nama_bayi AND bayi.status = 'Aktif'");

		$crud->set_table('penimbangan');
		$crud->set_subject('Data Pelaksanaan Penimbangan Balita');
		$crud->required_fields('tanggal', 'petugas', 'nama_bayi', 'tempat_posyandu');

		$crud->callback_add_field('jadwal_penimbangan', function () {
			return '&nbsp;&nbsp; Jadwal Penimbangan <input type="text" id="jadwal_penimbangan" readonly name="jadwal_penimbangan" style="height: 40px; width: 400px; margin-left:15px;"> &nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#jadwalPeriksa2"><b>Cari Data</b></button><br/><br/>';
		});

		$crud->callback_add_field('pukul', function () {
			return '&nbsp;&nbsp; Pukul <input type="text" id="pukul" readonly name="pukul"  style="height: 40px; width: 400px; margin-left: 121px;"><br/><br/>';
		});

		$crud->callback_add_field('rt', function () {
			return '&nbsp;&nbsp; RT <input type="text" id="rt" readonly name="rt"  style="height: 40px; width: 400px; margin-left: 138px;"><br/><br/>';
		});

		$crud->callback_add_field('tempat_posyandu', function () {
			return '&nbsp;&nbsp; Tempat Posyandu <input type="text" id="tempat_posyandu" readonly name="tempat_posyandu"  style="height: 40px; width: 400px; margin-left: 43px;"><br/><br/>';
		});

		$crud->field_type('jadwal_penimbangan', 'hidden');
		$crud->field_type('pukul', 'hidden');
		$crud->field_type('rt', 'hidden');
		$crud->field_type('tempat_posyandu', 'hidden');

		$crud->callback_add_field('petugas', function () {
			return '&nbsp;&nbsp; Petugas <input type="text" id="petugas" readonly name="petugas"  style="height: 40px; width: 400px; margin-left: 108px;">&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#petugasPenimbangan"><b>Cari Data</b></button><br/><br/>';
		});


		$crud->callback_add_field('nama_bayi', function () {
			return '&nbsp;&nbsp; Nama Bayi <input type="text" id="nama_bayi" readonly name="nama_bayi"  style="height: 40px; width: 400px; margin-left: 90px;">&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bayiPenimbangan"><b>Cari Data</b></button><br/><br/>';
		});

		$crud->callback_edit_field('nama_bayi', function ($value, $primary_key) {
			return ' &nbsp;&nbsp; Nama Bayi <input type="text" id="nama_bayi" value="' . $value . '"  readonly name="nama_bayi"  style="height: 40px; width: 400px; margin-left: 120px;"><br/><br/>';
		});

		$crud->callback_edit_field('berat_badan', function ($value, $primary_key) {
			return '&nbsp;&nbsp; Berat Badan <input type="number" id="berat_badan" name="berat_badan"  style="height: 40px; width: 400px; margin-left: 110px;"><br/><br/>';
		});

		$crud->callback_edit_field('panjang_badan', function ($value, $primary_key) {
			return '&nbsp;&nbsp; Panjang Badan <input type="number" id="panjang_badan" name="panjang_badan"  style="height: 40px; width: 400px; margin-left: 90px;"><br/><br/>';
		});

		$crud->callback_edit_field('lingkar_kepala', function ($value, $primary_key) {
			return '&nbsp;&nbsp; Lingkar Kepala <input type="number" id="lingkar_kepala" name="lingkar_kepala"  style="height: 40px; width: 400px; margin-left: 90px;"><br/><br/>';
		});

		$crud->callback_edit_field('lingkar_tangan', function ($value, $primary_key) {
			return '&nbsp;&nbsp; Lingkar Tangan <input type="number" id="lingkar_tangan" name="lingkar_tangan"  style="height: 40px; width: 400px; margin-left: 90px;"><br/><br/>';
		});


		$crud->field_type('nama_bayi', 'hidden');
		$crud->field_type('petugas', 'hidden');


		$crud->field_type('berat_badan', 'hidden');
		$crud->field_type('panjang_badan', 'hidden');
		$crud->field_type('lingkar_kepala', 'hidden');
		$crud->field_type('lingkar_tangan', 'hidden');

		$crud->unset_columns('berat_badan', 'panjang_badan', 'lingkar_kepala', 'lingkar_tangan');

		$crud->display_as('rt', 'RT');

		$crud->unset_read();
		$crud->unset_print();
		$crud->unset_clone();
		$crud->unset_export();
		$crud->unset_simpan();

		$output = $crud->render();
		$this->_example_output($output);
	}

	public function nambah_hasil()
	{
		$crud = new grocery_CRUD();
		$crud->set_model('Custom_grocery_crud_model');
		// $crud->basic_model->set_custom_query("SELECT * FROM hasil_penimbangan where id = '$id'");

		$crud->set_table('hasil_penimbangan');
		$crud->set_subject('Data Hasil Penimbangan Balita');
		$crud->required_fields('tanggal', 'petugas', 'nama_bayi', 'tempat_posyandu', 'berat_badan', 'panjang_badan', 'lingkar_kepala', 'lingkar_tangan', 'catatan_petugas');

		$crud->callback_add_field('id_penimbangan', function () {
			$id = $_GET('id');
			return '  <input type="text" id="id_penimbangan" value="' . $id . '" readonly name="id_penimbangan"  style="height: 40px; width: 400px;">';
		});

		$crud->callback_edit_field('id_penimbangan', function ($value, $primary_key) {
			return '  <input type="text" id="id_penimbangan" readonly value="' . $value . '" name="id_penimbangan"  style="height: 40px; width: 400px;" >';
		});

		$crud->set_field_upload('foto', 'assets/uploads/images');

		$crud->unset_texteditor('catatan_petugas');

		$crud->unset_print();
		$crud->unset_clone();
		$crud->unset_export();
		$crud->unset_simpan();

		$output = $crud->render();
		$this->_example_output($output);
	}


	public function imunisasi()
	{
		$crud = new grocery_CRUD();
		$crud->set_model('Custom_grocery_crud_model');
		$crud->basic_model->set_custom_query("SELECT * FROM bayi, imunisasi where imunisasi.nama_bayi = bayi.nama_bayi AND bayi.status = 'Aktif'");

		$crud->set_table('imunisasi');
		$crud->set_subject('Data Pelaksanaan Imunisasi Balita');
		$crud->required_fields('tanggal', 'jenis_imunisasi', 'petugas', 'nama_bayi', 'tempat_posyandu', 'berat_badan', 'panjang_badan', 'lingkar_kepala', 'lingkar_tangan', 'catatan_petugas', 'dosis');

		$crud->callback_add_field('jenis_imunisasi', function () {
			return '  <input type="text" id="jenis_imunisasi" readonly name="jenis_imunisasi"  style="height: 40px; width: 400px;">&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#jenisImunisasi"><b>Cari Data</b></button>';
		});

		$crud->callback_edit_field('jenis_imunisasi', function ($value, $primary_key) {
			return '  <input type="text" id="jenis_imunisasi" readonly value="' . $value . '" name="jenis_imunisasi"  style="height: 40px; width: 400px;" >&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#jenisImunisasi"><b>Cari Data</b></button>';
		});

		$crud->callback_add_field('petugas', function () {
			return '  <input type="text" id="petugas" readonly name="petugas"  style="height: 40px; width: 400px;">&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#petugasPenimbangan"><b>Cari Data</b></button>';
		});

		$crud->callback_edit_field('petugas', function ($value, $primary_key) {
			return '  <input type="text" id="petugas" readonly value="' . $value . '" name="petugas"  style="height: 40px; width: 400px;" >&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#petugasPenimbangan"><b>Cari Data</b></button>';
		});

		$crud->callback_add_field('nama_bayi', function () {
			return '  <input type="text" id="nama_bayi" readonly name="nama_bayi"  style="height: 40px; width: 400px;">&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bayiPenimbangan"><b>Cari Data</b></button>';
		});

		$crud->callback_edit_field('nama_bayi', function ($value, $primary_key) {
			return '  <input type="text" id="nama_bayi" readonly value="' . $value . '" name="nama_bayi"  style="height: 40px; width: 400px;" >&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#bayiPenimbangan"><b>Cari Data</b></button>';
		});

		$crud->callback_add_field('pemberian_obat', function () {
			return '  <input type="text" id="pemberian_obat" readonly name="pemberian_obat"  style="height: 40px; width: 400px;">&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#obatImunisasi"><b>Cari Data</b></button>';
		});

		$crud->callback_edit_field('pemberian_obat', function ($value, $primary_key) {
			return '  <input type="text" id="pemberian_obat" readonly value="' . $value . '" name="pemberian_obat"  style="height: 40px; width: 400px;" >&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#obatImunisasi"><b>Cari Data</b></button>';
		});


		$crud->callback_add_field('jadwal_imunisasi', function () {
			return '  <input type="text" id="jadwal_imunisasi" readonly name="jadwal_imunisasi"  style="height: 40px; width: 400px;">&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#jadwalImun"><b>Cari Data</b></button>';
		});


		$crud->callback_edit_field('jadwal_imunisasi', function ($value, $primary_key) {
			return '  <input type="text" id="jadwal_imunisasi" readonly value="' . $value . '" name="jadwal_imunisasi"  style="height: 40px; width: 400px;" >&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#jadwalImun"><b>Cari Data</b></button>';
		});

		$crud->set_field_upload('foto', 'assets/uploads/images');

		$crud->unset_texteditor('catatan_petugas');

		$crud->display_as('rt', 'RT');

		$crud->unset_print();
		$crud->unset_clone();
		$crud->unset_export();
		$crud->unset_simpan();
		$crud->add_action('Berita Acara Imunisasi', base_url('/assets/print.png'), 'admin/cetak_imunisasi');

		$output = $crud->render();
		$output->output = str_replace('title="Berita Acara Imunisasi"', 'title ="Berita Acara Imunisasi" target="_blank"', $output->output);
		$this->_example_output($output);
	}

	public function cetak_imunisasi()
	{
		$data['data'] = $this->m_login->cetak_imunisasi($this->uri->segment(3));
		$this->load->view('rekap/cetak_imunisasi', $data);
	}

	public function logout()
	{
		$this->session->sess_destroy();

		redirect('login');
	}

	public function send_notification_after_insert($post_array, $primary_key)
	{
		$this->send_notification($post_array);
		return true;
	}

	public function send_notification($post_array)
	{
		$rt = $post_array['rt']; // Sesuaikan dengan nama kolom di tabel Anda
		$nama_bayi = $post_array['nama_bayi']; // Sesuaikan
		$tanggal = $post_array['tanggal']; // Sesuaikan
		$tempat = $post_array['tempat']; // Sesuaikan

		$this->db->select('nama_ibu, no_telepon');
		$this->db->from('bayi');
		$this->db->where('rt', $rt);
		$query = $this->db->get();
		$bayi_data = $query->result_array();

		$userkey = '557c1b512b1c';
		$passkey = '7bf0738e4dc285e3a51e35dd';
		$url = 'https://console.zenziva.net/wareguler/api/sendWA/';

		foreach ($bayi_data as $data) {
			$nama_ibu = $data['nama_ibu'];
			$telepon = $data['no_telepon'];
			$message = "Halo Ibu $nama_ibu, bunda $nama_bayi, ada jadwal penimbangan pada $tanggal di $tempat. Mohon untuk dapat hadir. Terima kasih.";

			$curlHandle = curl_init();
			curl_setopt($curlHandle, CURLOPT_URL, $url);
			curl_setopt($curlHandle, CURLOPT_HEADER, 0);
			curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curlHandle, CURLOPT_SSL_VERIFYHOST, 2);
			curl_setopt($curlHandle, CURLOPT_SSL_VERIFYPEER, 0);
			curl_setopt($curlHandle, CURLOPT_TIMEOUT, 30);
			curl_setopt($curlHandle, CURLOPT_POST, 1);
			curl_setopt($curlHandle, CURLOPT_POSTFIELDS, array(
				'userkey' => $userkey,
				'passkey' => $passkey,
				'to' => $telepon,
				'message' => $message
			));
			$results = json_decode(curl_exec($curlHandle), true);
			curl_close($curlHandle);
		}
	}
}
