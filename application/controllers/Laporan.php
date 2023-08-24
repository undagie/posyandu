<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Laporan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->database();
		$this->load->helper('url');
		$this->load->model('m_grafik');

		$this->load->library('grocery_CRUD','pdf');
		// $this->load->library('pdf');

		$cab=$this->db->query("SELECT * FROM kuesioner GROUP BY nik")->result();

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
				$this->db->query("UPDATE kuesioner SET rekap = '100' WHERE nik = '$nik'");
                // return 'Sangat Baik';
            } elseif (($hasil <= 23) && ($hasil >= 18)){
				$this->db->query("UPDATE kuesioner SET rekap = '80' WHERE nik = '$nik'");
                // return 'Baik';
            } elseif (($hasil <= 17) && ($hasil >= 12)){
				$this->db->query("UPDATE kuesioner SET rekap = '70' WHERE nik = '$nik'");
                // return 'Cukup Baik';
            } else {
				$this->db->query("UPDATE kuesioner SET rekap = '50' WHERE nik = '$nik'");
				// return 'Tidak Baik';
			}
		}
		
	}

	public function _example_output($output = null)
	{
		$this->load->view('content_crud_admin',(array)$output);
	}
	

	public function index()
	{
		$this->_example_output((object)array('output' => '' , 'js_files' => array() , 'css_files' => array()));
	}

	function format_num($value, $row){
		return 'Rp' .number_format($value, 0,",",".");
	}

	public function grafik_penimbangan()
	{
		$this->load->view('grafik_penimbangan');
	}
	
	public function rekap_grafik_penimbangan(){
		$data = array();

		$data['data']=$this->m_grafik->get_data_penimbangan_filter();
    	// $this->load->view('content_grafik_penimbangan',$data);
			
		$this->load->view('rekap/rekap_grafik_penimbangan',$data);

	}

	public function posyandu(){
		$crud = new grocery_CRUD();
		$crud->set_table('posyandu');
		$crud->set_subject('Laporan Data Posyandu');	

		$crud->set_field_upload('foto','assets/uploads/images');

		$crud->unset_operations();

		$output = $crud->render();
		$this->load->view('laporan/posyandu',(array)$output);
	}

	public function rekap_posyandu(){
		$data = array();
		$filter=$this->input->post('filter');
	
		if ($filter == 'semua') {
			$data['data']=$this->db->query("SELECT * from posyandu ORDER BY id ASC")->result();
		}else {
			$data['data']=$this->db->query("SELECT * from posyandu where nama_posyandu = '$filter' ORDER BY id ASC")->result();
		}

		$this->load->view('rekap/rekap_posyandu',$data);

	}

	public function obat(){
		$crud = new grocery_CRUD();
		$crud->set_table('obat');
		$crud->set_subject('Laporan Data Obat');	

		$crud->set_field_upload('foto','assets/uploads/images');

		$crud->unset_operations();

		$output = $crud->render();
		$this->load->view('laporan/obat',(array)$output);
	}

	public function rekap_obat(){
		$data = array();
		$filter=$this->input->post('filter');
	
		if ($filter == 'semua') {
			$data['data']=$this->db->query("SELECT * from obat ORDER BY id ASC")->result();
		}else {
			$data['data']=$this->db->query("SELECT * from obat where jenis_obat = '$filter' ORDER BY id ASC")->result();
		}

		$this->load->view('rekap/rekap_obat',$data);

	}

	
	public function ibu_hamil(){
		$crud = new grocery_CRUD();
		 $crud->set_table('ibu_hamil');
		 $crud->set_subject('Data Ibu Hamil');	
		 $crud->required_fields('kode_sensus','tanggal_sensus','nama','jenis_kelamin','nama_suami','nama_ayah','alamat','kelurahan','rt','kecamatan','kabupaten','no_telepon');

		 $crud->field_type('jenis_kelamin','enum',array('Laki-Laki','Perempuan'));
		 $crud->field_type('status','enum',array('Aktif','Non Aktif'));
		 $crud->field_type('rt','enum',array('RT 1','RT 2','RT 3','RT 4'));

		  $crud->display_as('rt','RT');

		 $crud->field_type('usia','hidden');

		//  $crud->callback_column('usia',array($this,'_usia_ibu'));

		 $crud->unset_columns('usia');
		 $crud->unset_texteditor('alamat');

		 $crud->set_field_upload('foto','assets/uploads/images');

		 $crud->unset_operations();

		$output = $crud->render();
		$this->load->view('laporan/ibu_hamil',(array)$output);
	}

	public function rekap_ibu_hamil(){
		$data = array();
		$filter=$this->input->post('filter');
	
		if ($filter == 'semua') {
			$data['data']=$this->db->query("SELECT * from ibu_hamil ORDER BY id ASC")->result();
		}else {
			$data['data']=$this->db->query("SELECT * from ibu_hamil where rt = '$filter' ORDER BY id ASC")->result();
		}

		$this->load->view('rekap/rekap_ibu_hamil',$data);

	}

	

	public function bayi(){
		$crud = new grocery_CRUD();
		$crud->set_table('bayi');
		$crud->set_subject('Laporan Data Bayi');	

		$crud->set_field_upload('foto','assets/uploads/images');

		$crud->unset_columns('usia');
		$crud->unset_operations();

		$output = $crud->render();
		$this->load->view('laporan/bayi',(array)$output);
	}

	public function rekap_bayi(){
		$data = array();
		$filter=$this->input->post('filter');
	
		if ($filter == 'semua') {
			$data['data']=$this->db->query("SELECT * from bayi ORDER BY id ASC")->result();
		}else {
			$data['data']=$this->db->query("SELECT * from bayi where jenis_kelamin = '$filter' ORDER BY id ASC")->result();
		}

		$this->load->view('rekap/rekap_bayi',$data);

	}

	
	public function jenis_imunisasi(){
		$crud = new grocery_CRUD();
		 $crud->set_table('jenis_imunisasi');
		 $crud->set_subject('Data Jenis Imunisasi');	
		$crud->unset_operations();

		$output = $crud->render();
		$this->load->view('laporan/jenis_imunisasi',(array)$output);
	}

	public function rekap_jenis_imunisasi(){
		$data = array();
		$filter=$this->input->post('filter');
	
		if ($filter == 'semua') {
			$data['data']=$this->db->query("SELECT * from jenis_imunisasi ORDER BY id ASC")->result();
		}else {
			$data['data']=$this->db->query("SELECT * from jenis_imunisasi where usia = '$filter' ORDER BY id ASC")->result();
		}

		$this->load->view('rekap/rekap_jenis_imunisasi',$data);

	}
	

	public function petugas(){
		$crud = new grocery_CRUD();
		$crud->set_table('pegawai');
		$crud->where("pegawai.role = 'petugas'");
		$crud->set_subject('Laporan Data Petugas');	

		$crud->unset_columns('username','password','role');

		$crud->display_as('nik','NIK');

		$crud->set_field_upload('foto','assets/uploads/images');

		$crud->unset_operations();

		$output = $crud->render();
		$this->load->view('laporan/petugas',(array)$output);
	}

	public function rekap_petugas(){
		$data = array();
		$filter=$this->input->post('filter');
	
		if ($filter == 'semua') {
			$data['data']=$this->db->query("SELECT * from pegawai where role = 'petugas' ORDER BY id ASC")->result();
		}else {
			$data['data']=$this->db->query("SELECT * from pegawai where role = 'petugas' AND unit_posyandu = '$filter' ORDER BY id ASC")->result();
		}

		$this->load->view('rekap/rekap_petugas',$data);

	}
	

	public function bidan(){
		$crud = new grocery_CRUD();
		$crud->set_table('pegawai');
		$crud->where("pegawai.role = 'bidan'");
		$crud->set_subject('Laporan Data Bidan');	

		$crud->unset_columns('username','password','role');

		$crud->display_as('nik','NIK');

		$crud->set_field_upload('foto','assets/uploads/images');

		$crud->unset_operations();

		$output = $crud->render();
		$this->load->view('laporan/bidan',(array)$output);
	}

	public function rekap_bidan(){
		$data = array();
		$filter=$this->input->post('filter');
	
		if ($filter == 'semua') {
			$data['data']=$this->db->query("SELECT * from pegawai where role = 'bidan' ORDER BY id ASC")->result();
		}else {
			$data['data']=$this->db->query("SELECT * from pegawai where role = 'bidan' AND unit_posyandu = '$filter' ORDER BY id ASC")->result();
		}

		$this->load->view('rekap/rekap_bidan',$data);

	}
	
	public function jadwal_pemeriksaan(){
		$crud = new grocery_CRUD();
		$crud->set_table('jadwal_pemeriksaan');
		$crud->set_subject('Laporan Data Jadwal Pemeriksaan Ibu Hamil');

		$crud->display_as('rt','RT');
		$crud->display_as('pelaksanaan','Tempat');
		$crud->display_as('tempat','Pelaksanaan');

		$crud->unset_operations();

		$output = $crud->render();
		$this->load->view('laporan/jadwal_pemeriksaan',(array)$output);
	}

	public function rekap_jadwal_pemeriksaan(){
		$data = array();
		$bulan=$this->input->post('bulan');
		$filter=$this->input->post('filter');
	
		if ($filter == 'semua') {
			$data['data']=$this->db->query("SELECT * from jadwal_pemeriksaan where tanggal LIKE '$bulan-%' ORDER BY id ASC")->result();
		}else {
		$data['data']=$this->db->query("SELECT * from jadwal_pemeriksaan where tempat = '$filter' AND tanggal LIKE '$bulan-%' ORDER BY id ASC")->result();
		}

		$this->load->view('rekap/rekap_jadwal_pemeriksaan',$data);

	}
	
	public function daftar_pemeriksaan(){
		$crud = new grocery_CRUD();
		$crud->set_model('Custom_grocery_crud_model');
		$crud->basic_model->set_custom_query("SELECT * FROM pemeriksaan GROUP BY nama");
		$crud->set_table('pemeriksaan');
		$crud->set_subject('Laporan Daftar Pemeriksaan Ibu Hamil');

		$crud->set_field_upload('foto','assets/uploads/images');

		$crud->columns('jadwal_pemeriksaan','petugas','nama','tempat_posyandu');
		$crud->unset_operations();

		$output = $crud->render();
		$this->load->view('laporan/daftar_pemeriksaan',(array)$output);
	}

	public function rekap_daftar_pemeriksaan(){
		$data = array();
		$bulan=$this->input->post('bulan');
		$filter=$this->input->post('filter');
	
		if ($filter == 'semua') {
			$data['data']=$this->db->query("SELECT * from pemeriksaan GROUP BY nama ORDER BY tempat_posyandu ASC")->result();
			$data['data1']=$this->db->query("SELECT *, COUNT(id) AS jumlah from pemeriksaan GROUP BY nama ORDER BY tempat_posyandu ASC LIMIT 1")->result();
		}else {
		$data['data']=$this->db->query("SELECT * from pemeriksaan where tempat_posyandu = '$filter' GROUP BY nama ORDER BY tempat_posyandu ASC")->result();
		$data['data1']=$this->db->query("SELECT *, COUNT(id) AS jumlah from pemeriksaan where tempat_posyandu = '$filter' GROUP BY nama ORDER BY tempat_posyandu ASC LIMIT 1")->result();
		}

		$this->load->view('rekap/rekap_daftar_pemeriksaan',$data);

	}

	
	public function pemeriksaan(){
		$crud = new grocery_CRUD();
		$crud->set_table('pemeriksaan');
		$crud->set_subject('Laporan Data Riwayat Pemeriksaan Ibu Hamil');

		$crud->callback_column('berat_badan',array($this,'_kg'));
		$crud->callback_column('panjang_badan',array($this,'_cm'));

		$crud->set_field_upload('foto','assets/uploads/images');

		$crud->unset_operations();

		 $crud->add_action('Berita Acara Pemeriksaan Ibu Hamil',base_url('/assets/print.png'),'admin/cetak_pemeriksaan');
				 
		 $output = $crud->render();
		 $output->output = str_replace('title="Berita Acara Pemeriksaan Ibu Hamil"', 'title ="Berita Acara Pemeriksaan Ibu Hamil" target="_blank"', $output->output);
		$this->load->view('laporan/pemeriksaan',(array)$output);
	}

	public function rekap_pemeriksaan(){
		$data = array();
		$bulan=$this->input->post('bulan');
		$filter=$this->input->post('filter');
	
		if ($filter == 'semua') {
			$data['data']=$this->db->query("SELECT * from pemeriksaan ORDER BY id ASC")->result();
		}else {
		$data['data']=$this->db->query("SELECT * from pemeriksaan where nama = '$filter' ORDER BY id ASC")->result();
		}

		$this->load->view('rekap/rekap_pemeriksaan',$data);

	}
	
	public function rekap_grafik_pemeriksaan(){
		$data = array();

		$data['data']=$this->m_grafik->get_data_pemeriksaan_filter();
    	// $this->load->view('content_grafik_pemeriksaan',$data);
			
		$this->load->view('rekap/rekap_grafik_pemeriksaan',$data);

	}
	
	public function jadwal_penimbangan(){
		$crud = new grocery_CRUD();
		$crud->set_table('jadwal_penimbangan');
		$crud->set_subject('Laporan Data Jadwal Penimbangan');

		$crud->display_as('rt','RT');
		$crud->display_as('pelaksanaan','Tempat');
		$crud->display_as('tempat','Pelaksanaan');

		$crud->unset_operations();

		$output = $crud->render();
		$this->load->view('laporan/jadwal_penimbangan',(array)$output);
	}

	public function rekap_jadwal_penimbangan(){
		$data = array();
		$bulan=$this->input->post('bulan');
		$filter=$this->input->post('filter');
	
		if ($filter == 'semua') {
			$data['data']=$this->db->query("SELECT * from jadwal_penimbangan where tanggal LIKE '$bulan-%' ORDER BY id ASC")->result();
		}else {
		$data['data']=$this->db->query("SELECT * from jadwal_penimbangan where tempat = '$filter' AND tanggal LIKE '$bulan-%' ORDER BY id ASC")->result();
		}

		$this->load->view('rekap/rekap_jadwal_penimbangan',$data);

	}
	
	public function daftar_penimbangan(){
		$crud = new grocery_CRUD();
		$crud->set_model('Custom_grocery_crud_model');
		$crud->basic_model->set_custom_query("SELECT * FROM penimbangan GROUP BY nama_bayi");
		$crud->set_table('penimbangan');
		$crud->set_subject('Laporan Daftar Penimbangan Bayi');

		$crud->set_field_upload('foto','assets/uploads/images');

		$crud->columns('jadwal_penimbangan','petugas','nama_bayi','tempat_posyandu');

		$crud->display_as('tempat_posyandu','Tempat');

		$crud->unset_operations();

		$output = $crud->render();
		$this->load->view('laporan/daftar_penimbangan',(array)$output);
	}

	public function rekap_daftar_penimbangan(){
		$data = array();
		$bulan=$this->input->post('bulan');
		$filter=$this->input->post('filter');
	
		if ($filter == 'semua') {
			$data['data']=$this->db->query("SELECT * from penimbangan GROUP BY nama_bayi ORDER BY tempat_posyandu ASC")->result();
			$data['data1']=$this->db->query("SELECT *, COUNT(id) AS jumlah from penimbangan GROUP BY jadwal_penimbangan ORDER BY tempat_posyandu ASC LIMIT 1")->result();
		}else {
		$data['data']=$this->db->query("SELECT * from penimbangan where tempat_posyandu = '$filter' GROUP BY nama_bayi ORDER BY tempat_posyandu ASC")->result();
		$data['data1']=$this->db->query("SELECT *, COUNT(id) AS jumlah from penimbangan where tempat_posyandu = '$filter' GROUP BY jadwal_penimbangan ORDER BY tempat_posyandu ASC LIMIT 1")->result();
		}

		$this->load->view('rekap/rekap_daftar_penimbangan',$data);

	}

	
	public function _kg($value, $row){
		return $value.' Kg';
	}

	public function _cm($value, $row){
		return $value.' Cm';
	}
	
	public function penimbangan(){
		$crud = new grocery_CRUD();
		$crud->set_table('hasil_penimbangan');
		$crud->set_subject('Laporan Data Riwayat Penimbangan');

		$crud->set_field_upload('foto','assets/uploads/images');
		$crud->callback_column('berat_badan',array($this,'_kg'));
		$crud->callback_column('panjang_badan',array($this,'_cm'));
		$crud->callback_column('lingkar_kepala',array($this,'_cm'));
		$crud->callback_column('lingkar_tangan',array($this,'_cm'));

		$crud->unset_columns('id');
		$crud->unset_operations();

		$output = $crud->render();
		$this->load->view('laporan/penimbangan',(array)$output);
	}

	public function rekap_penimbangan(){
		$data = array();
		$bulan=$this->input->post('bulan');
		$filter=$this->input->post('filter');
	
		if ($filter == 'semua') {
			$data['data']=$this->db->query("SELECT * from penimbangan ORDER BY id ASC")->result();
		}else {
		$data['data']=$this->db->query("SELECT * from penimbangan where nama_bayi = '$filter' ORDER BY id ASC")->result();
		}

		$this->load->view('rekap/rekap_penimbangan',$data);

	}

	
	public function jadwal_imunisasi(){
		$crud = new grocery_CRUD();
		$crud->set_table('jadwal_imunisasi');
		$crud->set_subject('Laporan Data Jadwal Imunisasi');

		$crud->display_as('pelaksanaan','Tempat');
		$crud->display_as('tempat','Pelaksanaan');

		$crud->unset_operations();

		$output = $crud->render();
		$this->load->view('laporan/jadwal_imunisasi',(array)$output);
	}

	public function rekap_jadwal_imunisasi(){
		$data = array();
		$bulan=$this->input->post('bulan');
		$filter=$this->input->post('filter');
	
		if ($filter == 'semua') {
			$data['data']=$this->db->query("SELECT * from jadwal_imunisasi where tanggal LIKE '$bulan-%' ORDER BY id ASC")->result();
		}else {
		$data['data']=$this->db->query("SELECT * from jadwal_imunisasi where tempat = '$filter' AND tanggal LIKE '$bulan-%' ORDER BY id ASC")->result();
		}

		$this->load->view('rekap/rekap_jadwal_imunisasi',$data);

	}
	
	public function imunisasi(){
		$crud = new grocery_CRUD();
		$crud->set_table('imunisasi');
		$crud->set_subject('Laporan Data Riwayat Imunisasi Bayi');

		$crud->set_field_upload('foto','assets/uploads/images');

		$crud->unset_operations();

		 $crud->add_action('Berita Acara Imunisasi',base_url('/assets/print.png'),'admin/cetak_imunisasi');
				 
		 $output = $crud->render();
		 $output->output = str_replace('title="Berita Acara Imunisasi"', 'title ="Berita Acara Imunisasi" target="_blank"', $output->output);
		$this->load->view('laporan/imunisasi',(array)$output);
	}

	public function rekap_imunisasi(){
		$data = array();
		$bulan=$this->input->post('bulan');
		$filter=$this->input->post('filter');
	
		if ($filter == 'semua') {
			$data['data']=$this->db->query("SELECT * from imunisasi")->result();
		}else {
		$data['data']=$this->db->query("SELECT * from imunisasi where nama_bayi = '$filter' ORDER BY id ASC")->result();
		}

		$this->load->view('rekap/rekap_imunisasi',$data);

	}

	
	// public function _status_pelayanan($value, $row){
	// 	$data = array();
	// 	$cab=$this->db->query("SELECT * FROM kuesioner")->result();
	// 	foreach ($cab as $value) {
	// 		if ($value['nik'] == $row->nik) {
	// 			$tes=$value['nik'];
	// 		}
	// 	}
	// 	if(empty($tes)){
	// 		$tes='';
	// 	}
	// 	return $tes;
	// }
	
	
	public function _status_pelayanan($value, $row){
		$data = array();
		$cab=$this->db->query("SELECT * FROM kuesioner GROUP BY nik")->result();

		foreach ($cab as $key) {
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
                return 'Sangat Baik';
            } elseif (($hasil <= 23) && ($hasil >= 18)){
                return 'Baik';
            } elseif (($hasil <= 17) && ($hasil >= 12)){
                return 'Cukup Baik';
            } else {
				return 'Tidak Baik';
			}
		}
	
	}
	
	public function kuesioner(){
		$crud = new grocery_CRUD();

		$crud->set_table('kuesioner');
		$crud->set_subject('Data Pengisian Kuesioner');	
		$crud->required_fields('tanggal_pengisian','nama','alamat','pertanyaan1','pertanyaan2','pertanyaan3','pertanyaan4','pertanyaan5','pertanyaan6','pertanyaan7','pertanyaan8','pertanyaan9','pertanyaan10');

		$crud->callback_column('status_pelayanan', array($this,'_status_pelayanan'));

		$crud->field_type('pertanyaan1','enum',array('Sangat Baik','Baik','Kurang Baik','Tidak Baik'));
		$crud->field_type('pertanyaan2','enum',array('Sangat Baik','Baik','Kurang Baik','Tidak Baik'));
		$crud->field_type('pertanyaan3','enum',array('Sangat Baik','Baik','Kurang Baik','Tidak Baik'));
		$crud->field_type('pertanyaan4','enum',array('Sangat Baik','Baik','Kurang Baik','Tidak Baik'));
		$crud->field_type('pertanyaan5','enum',array('Sangat Baik','Baik','Kurang Baik','Tidak Baik'));
		$crud->field_type('pertanyaan6','enum',array('Sangat Baik','Baik','Kurang Baik','Tidak Baik'));
		$crud->field_type('pertanyaan7','enum',array('Sangat Baik','Baik','Kurang Baik','Tidak Baik'));

		$crud->display_as('pertanyaan1','Bagaimana pendapat Anda tentang pelayanan obat ?');
		$crud->display_as('pertanyaan2','Bagaimana pendapat Anda tentang perlakuan yang sama (keadilan) dalam mendapatkan pelayanan ?');
		$crud->display_as('pertanyaan3','Bagaimana pendapat Anda tentang keramahan petugas ?');
		$crud->display_as('pertanyaan4','Bagaimana pendapat Anda tentang biaya yang dikenakan di posyandu ?');
		$crud->display_as('pertanyaan5','Bagaimana pendapat Anda tentang waktu pelayanan di Posyandu ?');
		$crud->display_as('pertanyaan6','Bagaimana pendapat Anda tentang kenyamanan dan kebersihan di Posyandu ?');
		$crud->display_as('pertanyaan7','Bagaimana pendapat Anda tentang keamanan di Posyandu ?');
		
		$crud->columns('tanggal_pengisian','nik','nama','alamat','rekap');

		$crud->display_as('rekap','Status Pelayanan');
		$crud->callback_column('rekap',array($this,'_rekap'));
		$crud->field_type('rekap','hidden');

		$crud->unset_add();
		$crud->unset_edit();
		$crud->unset_delete();
		$crud->unset_print();
		$crud->unset_clone();
		$crud->unset_export();
		$crud->unset_back_to_list();
		$output = $crud->render();
		
		$this->load->view('laporan/kuesioner',(array)$output);
		 
	}

	public function _rekap($value, $row)
	{
		if ($value == 100) {
			return 'Sangat Baik';
		} elseif ($value == 80) {
			return 'Baik';
		} elseif ($value == 70) {
			return 'Cukup Baik';
		} else {
			return 'Tidak Baik';
		}
	return $value;
	}
	

	
	public function rekap_kuesioner(){
		$data = array();
		$data['data']=$this->db->query("SELECT * from kuesioner")->result();
		$data['data1']=$this->db->query("SELECT *, SUM(rekap) AS rekap, COUNT(id) AS jumlah from kuesioner LIMIT 1")->result();
		
		$this->load->view('rekap/rekap_kuesioner',$data);

	}

	public function surat_keluar(){
		$crud = new grocery_CRUD();
		$crud->set_table('surat_keluar');
		$crud->set_subject('Data Surat Keluar');

		$crud->set_field_upload('lampiran','assets/uploads/images');

		$crud->unset_operations();
		$crud->unset_add();
		$crud->unset_delete();
		$crud->unset_edit();
		$crud->unset_print();
		$crud->unset_clone();
		$crud->unset_export();

		$output = $crud->render();
		$this->load->view('laporan/surat_keluar',(array)$output);
	}

	public function rekap_surat_keluar(){
		$data = array();
		$bulan=$this->input->post('bulan');
	
		if ($bulan == 'Semua') {
			$data['data']=$this->db->query("SELECT * from surat_keluar")->result();
		}else {
		$data['data']=$this->db->query("SELECT * from surat_keluar where tanggal_surat LIKE '$bulan-%'")->result();
		}

		$this->load->view('rekap/rekap_surat_keluar',$data);

	}

	
	public function surat_tugas(){
		$crud = new grocery_CRUD();
		$crud->set_table('surat_tugas');
		$crud->set_subject('Data Surat Tugas');

		$crud->set_field_upload('lampiran','assets/uploads/images');

		$crud->display_as('nik','NIP/NIK');
		
		$crud->add_action('Cetak Surat Perintah Tugas',base_url('/assets/print.png'),'laporan/tugas');

		// $crud->columns('no_surat','tanggal_surat','nik','nama','no_telepon','jabatan','tujuan','tanggal_berangkat','tanggal_kembali','keperluan','lampiran','verifikasi');

		$crud->unset_operations();
		$crud->unset_add();
		$crud->unset_delete();
		$crud->unset_edit();
		$crud->unset_print();
		$crud->unset_clone();
		$crud->unset_export();

		$output = $crud->render();
		$output->output = str_replace('title="Cetak Surat Perintah Tugas"', 'title ="Cetak Surat Perintah Tugas" target="_blank"', $output->output);
		$this->load->view('laporan/surat_tugas',(array)$output);
	}

	public function tugas(){
        $data['data']=$this->m_login->tugas($this->uri->segment(3));
        $this->load->view('rekap/tugas',$data);
	}


	public function rekap_surat_tugas(){
		$data = array();
		$bulan=$this->input->post('bulan');
	
		if ($bulan == 'Semua') {
			$data['data']=$this->db->query("SELECT * from surat_tugaS")->result();
		}else {
		$data['data']=$this->db->query("SELECT * from surat_tugas WHERE tanggal_surat LIKE '$bulan-%'")->result();
		}

		$this->load->view('rekap/rekap_surat_tugas',$data);

	}

	
	public function surat_izin(){
		$crud = new grocery_CRUD();
		$crud->set_table('surat_izin');
		$crud->set_subject('Data Surat Izin Tidak Masuk Kerja');

		$crud->set_field_upload('lampiran','assets/uploads/images');
		$crud->display_as('nip','NIP/NIK');
		
		$crud->unset_operations();
		$crud->unset_add();
		$crud->unset_delete();
		$crud->unset_edit();
		$crud->unset_print();
		$crud->unset_clone();
		$crud->unset_export();
		
		$crud->add_action('Cetak Surat Izin Tidak Masuk Kerja',base_url('/assets/print.png'),'laporan/izin');

		$output = $crud->render();
		$output->output = str_replace('title="Cetak Surat Izin Tidak Masuk Kerja"', 'title ="Cetak Surat Izin Tidak Masuk Kerja" target="_blank"', $output->output);
		$this->load->view('laporan/surat_izin',(array)$output);
	}

	public function izin(){
        $data['data']=$this->m_login->izin($this->uri->segment(3));
        $this->load->view('rekap/izin',$data);
	}

	public function rekap_surat_izin(){
		$data = array();
		$bulan=$this->input->post('bulan');
	
		if ($bulan == 'Semua') {
			$data['data']=$this->db->query("SELECT * from surat_izin")->result();
		}else {
		$data['data']=$this->db->query("SELECT * from surat_izin WHERE tanggal_surat LIKE '$bulan-%'")->result();
		}

		$this->load->view('rekap/rekap_surat_izin',$data);

	}
	
	public function surat_cuti(){
		$crud = new grocery_CRUD();
		$crud->set_table('surat_cuti');
		$crud->set_subject('Data Surat Cuti Pegawai');

		$crud->set_field_upload('lampiran','assets/uploads/images');
		$crud->display_as('nip','NIP/NIK');
		
		$crud->unset_operations();
		$crud->unset_add();
		$crud->unset_delete();
		$crud->unset_edit();
		$crud->unset_print();
		$crud->unset_clone();
		$crud->unset_export();
		
		$crud->add_action('Cetak Surat Cuti Pegawai',base_url('/assets/print.png'),'laporan/cuti');

		$output = $crud->render();
		$output->output = str_replace('title="Cetak Surat Cuti Pegawai"', 'title ="Cetak Surat Cuti Pegawai" target="_blank"', $output->output);
		$this->load->view('laporan/surat_cuti',(array)$output);
	}

	public function cuti(){
        $data['data']=$this->m_login->cuti($this->uri->segment(3));
        $this->load->view('rekap/cuti',$data);
	}

	public function rekap_surat_cuti(){
		$data = array();
		$bulan=$this->input->post('bulan');
	
		if ($bulan == 'Semua') {
			$data['data']=$this->db->query("SELECT * from surat_cuti")->result();
		}else {
		$data['data']=$this->db->query("SELECT * from surat_cuti WHERE tanggal_surat LIKE '$bulan-%'")->result();
		}

		$this->load->view('rekap/rekap_surat_cuti',$data);

	}


	
	public function pegawai(){
		$crud = new grocery_CRUD();
		$crud->set_model('Custom_grocery_crud_model');
		$crud->basic_model->set_custom_query("SELECT * FROM pegawai where role = 'pegawai'");

		 $crud->set_table('pegawai');
		 $crud->set_subject('Data Pegawai');	
		 $crud->required_fields('username','password','nik','nama','tempat_lahir','tanggal_lahir','jenis_kelamin','agama','no_telepon','alamat','jabatan');

		$crud->change_field_type('password', 'password');
		
		 $crud->set_field_upload('foto','assets/uploads/images');

		$crud->field_type('role','hidden','pegawai');
 
		 $crud->unset_columns('role');
		 $crud->unset_operations();
				 
		 $output = $crud->render();
		$this->load->view('laporan/pegawai',(array)$output);
	}

	
	public function rekap_pegawai(){
		$data = array();
		$filter=$this->input->post('filter');
	
		if ($filter == 'semua') {
			$data['data']=$this->db->query("SELECT * from pegawai where role = 'pegawai' ORDER BY id ASC")->result();
		}else {
			$data['data']=$this->db->query("SELECT * from pegawai where role = 'pegawai' AND jabatan = '$filter' ORDER BY id ASC")->result();
		}

		$this->load->view('rekap/rekap_pegawai',$data);

	}
	public function _nama($value, $row){
		$data = array();
		$cab=$this->db->query("SELECT * FROM pegawai")->result_array();
		foreach ($cab as $value) {
			if ($value['nik']==$row->nik) {
				$tes=$value['nama'];
			}
		}
		if(empty($tes)){
			$tes='';
		}
		return $tes;
	}
	
	public function _no_telepon($value, $row){
		$data = array();
		$cab=$this->db->query("SELECT * FROM pegawai")->result_array();
		foreach ($cab as $value) {
			if ($value['nik']==$row->nik) {
				$tes=$value['no_telepon'];
			}
		}
		if(empty($tes)){
			$tes='';
		}
		return $tes;
	}
	
	public function _jabatan($value, $row){
		$data = array();
		$cab=$this->db->query("SELECT * FROM pegawai")->result_array();
		foreach ($cab as $value) {
			if ($value['nik']==$row->nik) {
				$tes=$value['jabatan'];
			}
		}
		if(empty($tes)){
			$tes='';
		}
		return $tes;
	}

	

}
