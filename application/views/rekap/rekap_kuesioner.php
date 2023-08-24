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

    function  bulan($bln){
        switch  ($bln){
            case  'Ya':
            return  1;
            break;
            case  'Tidak':
            return  2;
            break;
        }
    }
}?>


<?php
function bulan($tanggal)
{
    $bulan = array(
        1 =>   'JANUARI',
        'FEBRUARI',
        'MARET',
        'APRIL',
        'MEI',
        'JUNI',
        'JULI',
        'AGUSTUS',
        'SEPTEMBER',
        'OKTOBER',
        'NOVEMBER',
        'DESEMBER'
    );
    $pecahkan = explode('-', $tanggal);

    // variabel pecahkan 0 = tanggal
    // variabel pecahkan 1 = bulan
    // variabel pecahkan 2 = tahun

    return $bulan[(int) $pecahkan[1]];
}?>
<head>
<script>window.print()</script>
    <meta charset="UTF-8">
    <script>window.print()</script>
    <link rel="stylesheet" type="text/css" href="style.css">
    
    <title>Posyandu Desa Lokgabang</title>
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url()?>assets/posyandu.png">
    <style>
    .table1 {
    font-family: sans-serif;
    color: #444;
    border-collapse: collapse;
    width: 100%;
    border: 1px solid #000000;
}
 
.table1 tr th{
    background: #90EE90;
    color: 	#000000;
    font-weight: normal;
}
 
.table1, th, td {
    padding: 8px;
    text-align: center;
}
 
.table1 tr:hover {
    background-color: #E0FFFF;
}
 
.table1 tr:nth-child(even) {
    background-color: #f2f2f2;
}
    </style>


</head>
<img src="<?php echo base_url('assets/kop.png')?>" alt=""style="width :100%" />
<h4><p align="center">LAPORAN REKAPAPITULASI HASIL KUESIONER</p></h4>
<body>
<table border="1" align="center" class="table1">
    <tr>
		<th>No</th>
		<th>Tanggal</th>
		<th>NIK</th>
		<th>Nama</th>
		<th>Alamat</th>
		<th>Status Pelayanan</th>

        <?php $no = 1; foreach ($data as $key):?>
            <tr>
         
            <td><?php echo $no++?></td>
            <td><?php echo tgl_indo($key->tanggal_pengisian) ?></td>
            <td><?php echo $key->nik ?></td>
            <td><?php echo $key->nama ?></td>
            <td><?php echo $key->alamat ?></td>
            <td><?php
                $rekap = $key->rekap;
                if ($rekap == 100) {
                echo 'Sangat Baik';
                } elseif ($rekap == 80) {
                    echo 'Baik';
                } elseif ($rekap == 70) {
                    echo 'Cukup Baik';
                } else {
                    echo 'Tidak Baik';
                }
            ?></td>

            </tr>
            <?php endforeach ?>

            
               
    </table>
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
   
</body>
</body>
</html>
