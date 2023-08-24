<?php $this->load->view('content_css')?>
<?php $this->load->view('content_header')?>
<?php $this->load->view('content_menu_admin')?>

  <?php
  if ($data != '') {
    foreach($data as $data){
            $nama_bayi[] = $data->nama_bayi;
            $jumlah[] = $data->jumlah;
        }
  } else {
   
  }
    ?>
    <div class="page-wrapper">
    	<div class="container-fluid">
        <div class="row page-titles">

					<h3 style="color: red; text-align: center;" class="text-themecolor">
					GRAFIK RIWAYAT PENIMBANGAN BAYI
					</h3>
			</div>
      <div class="col-md-12 col-12 align-self-center">
					<form action="<?= site_url('laporan/rekap_grafik_penimbangan') ?>" method="post" target="_blank">
						<div class="input-group ">
                    		
							<button type="button" style="font-weight: bold; background-color: #000000; color: #fff;" class="btn">Nama Bayi</button>
						 
							<select name="filter" required class="form-control col-md-4">
							<option value="">Pilih Nama Bayi</option>
							<!-- <option value="semua">Semua</option> -->
							<?php
								$tes = $this->db->query("SELECT * from penimbangan group by nama_bayi")->result();
							?>
							<?php foreach ( $tes as $i) : ?>
							<option value="<?php echo $i->nama_bayi;?>"><?php echo $i->nama_bayi;?></option>
							<?php endforeach; ?>
							</select>

							<span>
							&nbsp;<button type="submit" style=" font-weight: bold; background-color: #000000; color: #fff;" class="btn"><i class="mdi mdi-24px mdi-printer"></i>Cetak</button>
							</span>
						</div>        
					</form>

        </div>
        <br>
        	
			<div class="row page-titles">
    <canvas id="myChart"></canvas>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.2/Chart.min.js"></script>
<script type="text/javascript">var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels : <?php echo json_encode($nama_bayi);?>,
    datasets: [{
		label: 'Riwayat Penimbangan',
      	data : <?php echo json_encode($jumlah);?>,
     	backgroundColor: ['red', 'red', 'red','red','red','red', 'red', 'red','red','red','red', 'red', 'red','red','red']
    }]
  },
  options: {
    responsive: true,
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true,
        }
      }]
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
           </div>
          
           </div>
<?php $this->load->view('content_footer')?>
