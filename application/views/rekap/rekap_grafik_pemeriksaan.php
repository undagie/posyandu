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

<?php


function  getBulan($bln){
        switch  ($bln){
            case  1:
            return  "Januari";
            break;
            case  2:
            return  "Februari";
            break;
            case  3:
            return  "Maret";
            break;
            case  4:
            return  "April";
            break;
            case  5:
            return  "Mei";
            break;
            case  6:
            return  "Juni";
            break;
            case  7:
            return  "Juli";
            break;
            case  8:
            return  "Agustus";
            break;
            case  9:
            return  "September";
            break;
            case  10:
            return  "Oktober";
            break;
            case  11:
            return  "November";
            break;
            case  12:
            return  "Desember";
            break;
        }
    }

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

<?php
  if ($data != '') {
    foreach($data as $data){
            $nama[0] = 'Berat Badan '.$data->nama;
            $berat_badan[] = $data->berat_badan;
            $bulan[] = getBulan($data->bulan);
        }
  } else {
   
  }
?>

<img src="<?php echo base_url('assets/kop.png')?>" alt=""style="width :100%" />
<h4><p align="center">GRAFIK PEMERIKSAAN IBU HAMIL</p></h4>
<body>
<div class="row page-titles">
    <canvas id="myChart"></canvas>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.2/Chart.min.js"></script>
<script type="text/javascript">var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels : <?php echo json_encode($bulan);?>,
    datasets: [{
		label: <?php echo json_encode($nama);?>,
      	data : <?php echo json_encode($berat_badan);?>,
     	backgroundColor: ['red', 'red', 'red','red','red','red', 'red', 'red','red','red','red', 'red', 'red','red','red']
    }]
  },
  options: {
    responsive: true,
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true,
          fontSize: 20
        }
      }],
      xAxes: [{
        ticks: {
          beginAtZero: true,
          fontSize: 20
        }
      }],
    },
   
    plugins: {
      datalabels: {
        anchor: 'end',
        align: 'top',
        formatter: Math.round,
        font: {
          weight: 'bold'
        }
      }
    }
  },
  
});</script>
   
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
   
</body>
</body>
</html>
