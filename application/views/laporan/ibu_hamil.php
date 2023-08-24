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
					Laporan Data Ibu Hamil
					</h4>
				<br>
				<div class="col-md-12 col-8 align-self-center">
					<form action="<?= site_url('laporan/rekap_ibu_hamil') ?>" method="post" target="_blank">
						<div class="input-group ">
                    		
							<button type="button" style="font-weight: bold; background-color: #000000; color: #fff;" class="btn">RT</button>
						 
							<select name="filter" required class="form-control col-md-4">
							<option value="">Pilih RT</option>
							<option value="semua">Pilih RT</option>
							<?php
								$tes = $this->db->query("SELECT * from ibu_hamil group by rt")->result();
							?>
							<?php foreach ( $tes as $i) : ?>
							<option value="<?php echo $i->rt;?>"><?php echo $i->rt;?></option>
							<?php endforeach; ?>
							
							</select>

							<span>
							&nbsp;<button type="submit" style=" font-weight: bold; background-color: #000000; color: #fff;" class="btn"><i class="mdi mdi-24px mdi-printer"></i>Cetak</button>
							</span>
						</div>        
					</form>

        </div>
			</div>
        
            <div class="row">
	            <?php 
								$header = base_url('assets/kop.png'); echo "<center><img src='".$header."' width=0 ></center>";
							?>
              <?php echo $output?>
            </div>
            </div>
            </div>

		<?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>
    
    <?php $this->load->view('content_footer2')?>
