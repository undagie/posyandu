<?php 
foreach($css_files as $file): ?>
    <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>

<?php $this->load->view('content_css')?>
<?php $this->load->view('content_header')?>
<?php $this->load->view('content_menu_kader')?>
        
        <div class="page-wrapper">
            
            <div class="container-fluid">

                <div class="row" style="margin-top: 20px;">
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

  <!-- modal -->
<div id="unitPosyandu" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content" style="width:1000px; margin-left: -150px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ambil Data Posyandu</h4>
      </div>
      <div class="modal-body">
                        <table id="pempol1" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Posyandu</th>
                                    <th>Alamat</th>

                                    <th>Pilih</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            $data = $this->db->query(" SELECT * FROM posyandu ORDER BY id ASC")->result();
                             foreach ($data as $key): ?>
                            <tr>
                            <td><?php echo $no++?></td>
                            <td><?php echo $key->nama_posyandu ?></td>
                            <td><?php echo $key->alamat ?></td>
                             
                              <td><button class="unitPosyandu"
                              
                               data-nim1="<?php echo $key->nama_posyandu ?>"

                               >PILIH</button type="button" class="btn btn-primary"></td>

                            </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
      </div>
    </div>

  </div>
</div>
<script>
   $(document).on('click', '.unitPosyandu', function (e) {
        document.getElementById("unit_posyandu").value = $(this).attr('data-nim1');

        $('#unitPosyandu').modal('hide');
       });
</script>
<!-- batas modal -->


  <!-- modal -->
<div id="jadwalPenimbangan" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content" style="width:1000px; margin-left: -150px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ambil Data Posyandu</h4>
      </div>
      <div class="modal-body">
                        <table id="pempol2" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Posyandu</th>
                                    <th>Alamat</th>

                                    <th>Pilih</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            $data = $this->db->query(" SELECT * FROM posyandu ORDER BY id ASC")->result();
                             foreach ($data as $key): ?>
                            <tr>
                            <td><?php echo $no++?></td>
                            <td><?php echo $key->nama_posyandu ?></td>
                            <td><?php echo $key->alamat ?></td>
                             
                              <td><button class="jadwalPenimbangan"
                              
                               data-nim1="<?php echo $key->nama_posyandu ?>"

                               >PILIH</button type="button" class="btn btn-primary"></td>

                            </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
      </div>
    </div>

  </div>
</div>
<script>
   $(document).on('click', '.jadwalPenimbangan', function (e) {
        document.getElementById("tempat").value = $(this).attr('data-nim1');

        $('#jadwalPenimbangan').modal('hide');
       });
</script>
<!-- batas modal -->

<!-- modal -->
<div id="bayiJadwal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content" style="width:1000px; margin-left: -150px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ambil Data Bayi</h4>
      </div>
      <div class="modal-body">
                        <table id="pempol3" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Bayi</th>
                                    <th>Nama Ibu</th>
                                    <th>Nama Ayah</th>

                                    <th>Pilih</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            $data = $this->db->query(" SELECT * FROM bayi where status = 'Aktif' ORDER BY id ASC")->result();
                             foreach ($data as $key): ?>
                            <tr>
                            <td><?php echo $no++?></td>
                            <td><?php echo $key->nama_bayi ?></td>
                            <td><?php echo $key->nama_ibu ?></td>
                            <td><?php echo $key->nama_ayah ?></td>
                             
                              <td><button class="bayiJadwal"
                              
                               data-nim1="<?php echo $key->nama_bayi ?>"
                               data-nim2="<?php echo $key->nama_ibu ?>"
                               data-nim3="<?php echo $key->nama_ayah ?>"
                               data-nim4="<?php echo $key->no_telepon ?>"

                               >PILIH</button type="button" class="btn btn-primary"></td>

                            </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
      </div>
    </div>

  </div>
</div>
<script>
   $(document).on('click', '.bayiJadwal', function (e) {
        document.getElementById("nama_bayi").value = $(this).attr('data-nim1');
        document.getElementById("field-nama_ibu").value = $(this).attr('data-nim2');
        document.getElementById("field-nama_ayah").value = $(this).attr('data-nim3');
        document.getElementById("field-no_telepon").value = $(this).attr('data-nim4');

        $('#bayiJadwal').modal('hide');
       });
</script>
<!-- batas modal -->

<!-- modal -->
<div id="petugasPenimbangan" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content" style="width:1000px; margin-left: -150px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ambil Data Petugas</h4>
      </div>
      <div class="modal-body">
                        <table id="pempol4" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Petugas</th>
                                    <th>Unit Posyandu</th>
                                    <th>Pendidikan</th>

                                    <th>Pilih</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            $data = $this->db->query(" SELECT * FROM pegawai where role = 'petugas' ORDER BY id ASC")->result();
                             foreach ($data as $key): ?>
                            <tr>
                            <td><?php echo $no++?></td>
                            <td><?php echo $key->nama ?></td>
                            <td><?php echo $key->unit_posyandu ?></td>
                            <td><?php echo $key->pendidikan ?></td>
                             
                              <td><button class="petugasPenimbangan"
                              
                               data-nim1="<?php echo $key->nama ?>"

                               >PILIH</button type="button" class="btn btn-primary"></td>

                            </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
      </div>
    </div>

  </div>
</div>
<script>
   $(document).on('click', '.petugasPenimbangan', function (e) {
        document.getElementById("petugas").value = $(this).attr('data-nim1');

        $('#petugasPenimbangan').modal('hide');
       });
</script>
<!-- batas modal -->

<!-- modal -->
<div id="bayiPenimbangan" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content" style="width:1000px; margin-left: -150px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ambil Data Bayi</h4>
      </div>
      <div class="modal-body">
                        <table id="pempol5" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Bayi</th>
                                    <th>Nama Ibu</th>
                                    <th>Nama Ayah</th>
                                    <th>Tempat Posyandu</th>

                                    <th>Pilih</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            $data = $this->db->query(" SELECT * FROM jadwal_penimbangan ORDER BY id ASC")->result();
                             foreach ($data as $key): ?>
                            <tr>
                            <td><?php echo $no++?></td>
                            <td><?php echo $key->nama_bayi ?></td>
                            <td><?php echo $key->nama_ibu ?></td>
                            <td><?php echo $key->nama_ayah ?></td>
                            <td><?php echo $key->tempat ?></td>
                             
                              <td><button class="bayiPenimbangan"
                              
                               data-nim1="<?php echo $key->nama_bayi ?>"
                               data-nim2="<?php echo $key->tempat ?>"

                               >PILIH</button type="button" class="btn btn-primary"></td>

                            </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
      </div>
    </div>

  </div>
</div>
<script>
   $(document).on('click', '.bayiPenimbangan', function (e) {
        document.getElementById("nama_bayi").value = $(this).attr('data-nim1');
        document.getElementById("field-tempat_posyandu").value = $(this).attr('data-nim2');

        $('#bayiPenimbangan').modal('hide');
       });
</script>
<!-- batas modal -->

<!-- modal -->
<div id="obatImunisasi" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content" style="width:1000px; margin-left: -150px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ambil Data Obat</h4>
      </div>
      <div class="modal-body">
                        <table id="pempol6" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Obat</th>
                                    <th>Jenis Obat</th>
                                    <th>Masa Kadaluarsa</th>

                                    <th>Pilih</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            $data = $this->db->query(" SELECT * FROM obat ORDER BY id ASC")->result();
                             foreach ($data as $key): ?>
                            <tr>
                            <td><?php echo $no++?></td>
                            <td><?php echo $key->nama_obat ?></td>
                            <td><?php echo $key->jenis_obat ?></td>
                            <td><?php echo $key->masa_kadaluarsa ?></td>
                             
                              <td><button class="obatImunisasi"
                              
                               data-nim1="<?php echo $key->nama_obat ?>"

                               >PILIH</button type="button" class="btn btn-primary"></td>

                            </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
      </div>
    </div>

  </div>
</div>
<script>
   $(document).on('click', '.obatImunisasi', function (e) {
        document.getElementById("pemberian_obat").value = $(this).attr('data-nim1');

        $('#obatImunisasi').modal('hide');
       });
</script>
<!-- batas modal -->


  <!-- modal -->
<div id="jadwalPemeriksaan" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content" style="width:1000px; margin-left: -150px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ambil Data Posyandu</h4>
      </div>
      <div class="modal-body">
                        <table id="pempol7" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Posyandu</th>
                                    <th>Alamat</th>

                                    <th>Pilih</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            $data = $this->db->query(" SELECT * FROM posyandu ORDER BY id ASC")->result();
                             foreach ($data as $key): ?>
                            <tr>
                            <td><?php echo $no++?></td>
                            <td><?php echo $key->nama_posyandu ?></td>
                            <td><?php echo $key->alamat ?></td>
                             
                              <td><button class="jadwalPemeriksaan"
                              
                               data-nim1="<?php echo $key->nama_posyandu ?>"

                               >PILIH</button type="button" class="btn btn-primary"></td>

                            </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
      </div>
    </div>

  </div>
</div>
<script>
   $(document).on('click', '.jadwalPemeriksaan', function (e) {
        document.getElementById("tempat").value = $(this).attr('data-nim1');

        $('#jadwalPemeriksaan').modal('hide');
       });
</script>
<!-- batas modal -->

<!-- modal -->
<div id="ibuJadwal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content" style="width:1000px; margin-left: -150px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ambil Data Ibu Hamil</h4>
      </div>
      <div class="modal-body">
                        <table id="pempol8" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Nama Suami</th>
                                    <th>Alamat</th>

                                    <th>Pilih</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            $data = $this->db->query(" SELECT * FROM ibu_hamil where status = 'Aktif' ORDER BY id ASC")->result();
                             foreach ($data as $key): ?>
                            <tr>
                            <td><?php echo $no++?></td>
                            <td><?php echo $key->nama ?></td>
                            <td><?php echo $key->nama_suami ?></td>
                            <td><?php echo $key->alamat ?></td>
                             
                              <td><button class="ibuJadwal"
                              
                               data-nim1="<?php echo $key->nama ?>"
                               data-nim2="<?php echo $key->no_telepon ?>"

                               >PILIH</button type="button" class="btn btn-primary"></td>

                            </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
      </div>
    </div>

  </div>
</div>
<script>
   $(document).on('click', '.ibuJadwal', function (e) {
        document.getElementById("nama").value = $(this).attr('data-nim1');
        document.getElementById("field-no_telepon").value = $(this).attr('data-nim2');

        $('#ibuJadwal').modal('hide');
       });
</script>
<!-- batas modal -->

<!-- modal -->
<div id="petugasPemeriksaan" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content" style="width:1000px; margin-left: -150px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ambil Data Petugas</h4>
      </div>
      <div class="modal-body">
                        <table id="pempol9" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Petugas</th>
                                    <th>Unit Posyandu</th>
                                    <th>Pendidikan</th>

                                    <th>Pilih</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            $data = $this->db->query(" SELECT * FROM pegawai where role = 'petugas' ORDER BY id ASC")->result();
                             foreach ($data as $key): ?>
                            <tr>
                            <td><?php echo $no++?></td>
                            <td><?php echo $key->nama ?></td>
                            <td><?php echo $key->unit_posyandu ?></td>
                            <td><?php echo $key->pendidikan ?></td>
                             
                              <td><button class="petugasPemeriksaan"
                              
                               data-nim1="<?php echo $key->nama ?>"

                               >PILIH</button type="button" class="btn btn-primary"></td>

                            </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
      </div>
    </div>

  </div>
</div>
<script>
   $(document).on('click', '.petugasPemeriksaan', function (e) {
        document.getElementById("petugas").value = $(this).attr('data-nim1');

        $('#petugasPemeriksaan').modal('hide');
       });
</script>
<!-- batas modal -->

<!-- modal -->
<div id="ibuPemeriksaan" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content" style="width:1000px; margin-left: -150px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ambil Data Ibu Hamil</h4>
      </div>
      <div class="modal-body">
                        <table id="pempol10" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Tempat Posyandu</th>

                                    <th>Pilih</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            $data = $this->db->query(" SELECT * FROM jadwal_pemeriksaan ORDER BY id ASC")->result();
                             foreach ($data as $key): ?>
                            <tr>
                            <td><?php echo $no++?></td>
                            <td><?php echo $key->nama ?></td>
                            <td><?php echo $key->tempat ?></td>
                             
                              <td><button class="ibuPemeriksaan"
                              
                               data-nim1="<?php echo $key->nama ?>"
                               data-nim2="<?php echo $key->tempat ?>"

                               >PILIH</button type="button" class="btn btn-primary"></td>

                            </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
      </div>
    </div>

  </div>
</div>
<script>
   $(document).on('click', '.ibuPemeriksaan', function (e) {
        document.getElementById("nama").value = $(this).attr('data-nim1');
        document.getElementById("field-tempat_posyandu").value = $(this).attr('data-nim2');

        $('#ibuPemeriksaan').modal('hide');
       });
</script>
<!-- batas modal -->

<!-- modal -->
<div id="jenisImunisasi" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <div class="modal-content" style="width:1100px; margin-left: -250px;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ambil Data Jenis Imunisasi</h4>
      </div>
      <div class="modal-body">
                        <table id="pempol11" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Jenis Imunisasi</th>
                                    <th>usia</th>
                                    <th>Keterangan</th>

                                    <th>Pilih</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $no = 1;
                            $data = $this->db->query(" SELECT * FROM jenis_imunisasi ORDER BY id ASC")->result();
                             foreach ($data as $key): ?>
                            <tr>
                            <td><?php echo $no++?></td>
                            <td><?php echo $key->jenis_imunisasi ?></td>
                            <td><?php echo $key->usia ?></td>
                            <td><?php echo $key->keterangan ?></td>
                             
                              <td><button class="jenisImunisasi"
                              
                               data-nim1="<?php echo $key->jenis_imunisasi ?>"

                               >PILIH</button type="button" class="btn btn-primary"></td>

                            </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table> 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
      </div>
    </div>

  </div>
</div>
<script>
   $(document).on('click', '.jenisImunisasi', function (e) {
        document.getElementById("jenis_imunisasi").value = $(this).attr('data-nim1');

        $('#jenisImunisasi').modal('hide');
       });
</script>
<!-- batas modal -->
