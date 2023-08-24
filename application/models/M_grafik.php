<?php
class M_grafik extends CI_Model{
 
 
	function get_data_penimbangan(){
        $query = $this->db->query("SELECT Count(id) AS jumlah, nama_bayi From hasil_penimbangan GROUP BY nama_bayi");

        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
 
	function get_data_penimbangan_filter(){
		$filter=$this->input->post('filter');
        $query = $this->db->query("SELECT nama_bayi, berat_badan, MONTH(jadwal_penimbangan) AS bulan From hasil_penimbangan where nama_bayi = '$filter'");

        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
 
 
	function get_data_pemeriksaan_filter(){
		$filter=$this->input->post('filter');
        $query = $this->db->query("SELECT nama, berat_badan, MONTH(jadwal_pemeriksaan) AS bulan From pemeriksaan where nama = '$filter'");

        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
 
	function get_data_pemeriksaan(){
        $query = $this->db->query("SELECT Count(id) AS jumlah, nama From pemeriksaan GROUP BY nama");

        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
 
}