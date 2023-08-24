<?php 
foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>

<?php $this->load->view('content_css')?>
<?php $this->load->view('content_header')?>
<?php $this->load->view('content_menu_admin')?>
        
<div class="page-wrapper">
    	<div class="container-fluid">
        	<div class="row page-titles">
					<h4 style="color: red" class="text-themecolor">
					Laporan Jadwal Pemeriksaan Ibu Hamil Perbulan
					</h4>
				<br>
				<br>
            <div class="col-md-12 col-8 align-self-center">
					<form action="<?= site_url('laporan/rekap_jadwal_pemeriksaan') ?>" method="post" target="_blank">
					<div class="input-group ">
					
            				<button type="button" style=" font-weight: bold; background-color: #000000; color: #fff;" class="btn">Bulan, Tahun</button>
          					<input type="month" class="col-md-3" name="bulan" required>&nbsp;&nbsp;
					
            				<button type="button" style=" font-weight: bold; background-color: #000000; color: #fff;" class="btn">Unit Posyandu</button>
							<select name="filter" required class="form-control col-md-4">
							<option value="">Pilih Unit Posyandu</option>
							<option value="semua">Semua</option>
							<?php
								$tes = $this->db->query("SELECT * from jadwal_pemeriksaan group by tempat")->result();
							?>
							<?php foreach ( $tes as $i) : ?>
							<option value="<?php echo $i->tempat;?>"><?php echo $i->tempat;?></option>
							<?php endforeach; ?>
							</select>

						<span>
           				<button style="font-weight: bold; background-color: #000000; color: #fff;" type="submit" class="btn ml-2">Cetak</button>
						</span>
					</div>        
					</form>
				<div>
			</div>
        </div>
	</div>
            <div class="row">
	            <?php 
								$header = base_url('assets/kop.png'); echo "<center><img src='".$header."' width=0 ></center>";
							?>
              <?php echo $output?>
            </div>
          </div>

		<?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>
    
    <?php $this->load->view('content_footer2')?>
