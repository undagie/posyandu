<?php 
foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>

<?php $this->load->view('content_css_kuesioner')?>
<?php $this->load->view('content_header')?>
<?php $this->load->view('content_menu_admin')?>
	
	<div class="page-wrapper">
        <div class="container-fluid">
<br>
            <div class="row" style="float: right;">
			<a target="_blank" class="float-right" style="padding: 5px 10px; background-color: #000; color: #fff; border-radius: 10px;" href="<?php echo base_url();?>laporan/rekap_kuesioner">Cetak</a>
            </div>
			<br>
			<br>
            <div class="row">
	        	<?php 
					$header = base_url('assets/kopSurat.png'); echo "<center><img src='".$header."' width=0 ></center>";
				?>
                <?php echo $output?>
        </div>
    </div>

	<?php foreach($js_files as $file): ?>
    <script src="<?php echo $file; ?>"></script>
    <?php endforeach; ?>
    
    <?php $this->load->view('content_footer2')?>
