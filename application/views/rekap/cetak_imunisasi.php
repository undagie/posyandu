<!DOCTYPE html>
<html lang="en">
<?php
function tgl_indo($tanggal)
{
    $bulan = array(
        1 =>   'Januari',
        'Februari',
        'Maret',
        'April',
        'Mei',
        'Juni',
        'Juli',
        'Agustus',
        'September',
        'Oktober',
        'November',
        'Desember'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
}?>
<head>
	<meta charset="UTF-8">
	<title>Posyandu Desa Lokgabang</title>
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url()?>assets/posyandu.png">
	<script>window.print();</script>
	<style>
	#wrapper {
     width: 800px;
     margin: 0 auto;
	 }
	 #judul {
		 text-align: center;
		 font-size: 25px;
		 font-weight: bold;
		 text-decoration: underline;
		 padding-top: 20px;
	 }
	 #judul1 {
		 text-align: center;
		 font-size: 20px;
		 font-weight: bold;
		 padding-bottom: 20px;
	 }
	 .isi {
		 font-size: 20px;
		 padding: 20px;
		 text-align: justify;
		 line-height : 1.5;
	 }

	 .table {
		text-align: justify;
    	margin:0 20px 0 60px;
		font-size: 20px;
	}

	.tes{
		height: 30px;
		font-size: 20px;
		text-align: justify;
    	width: 80%;
    	margin:0 100px;
	}
	</style>
</head>
<body>
	<div id="wrapper">
	<img style="margin:0 auto; width: 100%;" src="<?php echo base_url('assets/kop.png')?>" alt="">

      <div id="judul">BERITA ACARA IMUNISASI</div>
	
   		<div class="isi">
		   Yang bertanda tangan dibawah ini Kepala Puskesmas Desa Lokgabang, Menerangkan bahwa telah dilakukan imunisasi dengan jenis <b><?php echo $data['jenis_imunisasi'];?></b> pada tanggal <b><?php echo tgl_indo($data['jadwal_imunisasi']);?></b> dan dengan durasi waktu pukul <b><?php echo $data['pukul'];?></b> bertempat di <b><?php echo $data['rt'];?> </b> dan dilaksanakan pada <b><?php echo $data['tempat_posyandu'];?></b>, dengan data bayi sebagai berikut :
		  </div>
		  
		<table class="table">
	 		<tbody>
			 <tr>
 					<td>Nama Bayi</td>
 					<td>:</td>
 					<td><?php echo $data['nama_bayi'];?></td>
 				</tr>
 				<tr>
 					<td>Berat Badan</td>
 					<td>:</td>
 					<td><?php echo $data['berat_badan'];?></td>
                 </tr>
 				<tr>
 					<td>Panjang badan</td>
 					<td>:</td>
 					<td><?php echo $data['panjang_badan'];?></td>
                 </tr>
 				<tr>
 					<td>Lingkar Kepala</td>
 					<td>:</td>
 					<td><?php echo $data['lingkar_kepala'];?></td>
                 </tr>
 				<tr>
 					<td>Lingkar Tangan</td>
 					<td>:</td>
 					<td><?php echo  $data['lingkar_tangan'];?></td>
                 </tr>
 				
 			</tbody>
 		</table>

		 <?php 
$date = strtotime("+7 day");
?>
<div class="isi">
		 Demikian berita acara ini dibuat agar dapat dipergunakan sebagaimana mestinya. <br>
		Atas segala perhatiannya kami ucapkan terima kasih.
		  </div>
		  <br>
		  <br>

		  <table align="right" border="0">
		    <tr>
		        <td></td>
		        <td style="font-size: 20px" align="center">Lokgabang, <?php echo tgl_indo(date('Y-m-d'));?><br>
                <?php
                $ttd = $this->db->query("SELECT * FROM ttd")->result();
                foreach ($ttd as $key2):?>
                <?php echo $key2->jabatan ?>,
                <br>
                <img src="<?php echo base_url().'assets/uploads/images/'.$key2->tanda_tangan;?>" alt="" width="100px"> <br>
                <u><?php echo $key2->nama ?></u> <br>
                NIP. <?php echo $key2->nip ?>
                <?php endforeach ?>
				</td>
		    </tr>
		</table>
	</div>
</body>
</html>
