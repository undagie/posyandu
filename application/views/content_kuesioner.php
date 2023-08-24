<?php 
foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>

<?php $this->load->view('content_css_kuesioner')?>
<?php $this->load->view('content_header_dashboard')?>
        
			<div class="container-fluid" style="margin-top: 40px;">
			<center>
				<h3 style="color: red; text-transform: uppercase;" class="text-themecolor">
				Kuesioner Pelayanan Puskesmas

				</h3>
			</center>
		</div>
            <div class="container-fluid">

                <div class="row">
	                <?php 
										$header = base_url('assets/kop.png'); echo "<center><img src='".$header."' width=0 ></center>";
									?>
                  <?php echo $output?>
            	</div>

		<?php foreach($js_files as $file): ?>
        <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>
    
    <?php $this->load->view('content_footer2')?>

