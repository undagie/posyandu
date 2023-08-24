<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" >
				<li>
					<a class="waves-effect waves-dark" href="<?php echo site_url('homebidan')?>" 
					aria-expanded="false"><i class="mdi mdi-home"></i><span class="hide-menu" 
					style="color:white;">Halaman Utama</span></a>
				</li>

				
				<li> <a style="color:white;" class="waves-effect waves-dark dropdown-toggle" aria-expanded="false"><i class="mdi mdi-checkerboard"></i><span class="hide-menu">Managemen Data</span></a>
					<ul>
				
						<li>
							<a style="color:white;" class=" waves-effect waves-dark" href="<?php echo site_url('bidan/pemeriksaan')?>" aria-expanded="false"><i class="mdi mdi-checkbox-blank-circle"></i><span class=" p-2">Pemeriksaan Ibu Hamil</span></a>
                		</li>

						<li>
							<a style="color:white;" class=" waves-effect waves-dark" href="<?php echo site_url('bidan/penimbangan')?>" aria-expanded="false"><i class="mdi mdi-checkbox-blank-circle"></i><span class=" p-2">Penimbangan Balita</span></a>
                		</li>

						<li>
							<a style="color:white;" class=" waves-effect waves-dark" href="<?php echo site_url('bidan/imunisasi')?>" aria-expanded="false"><i class="mdi mdi-checkbox-blank-circle"></i><span class=" p-2">Imunisasi Balita</span></a>
                		</li>
						
					</ul>
				</li>

				<li> <a style="color:white;" class="waves-effect waves-dark dropdown-toggle" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">Laporan</span></a>
					<ul>

						<!-- <li>
							<a style="color:white;" class=" waves-effect waves-dark" href="<?php echo site_url('laporan/obat')?>" aria-expanded="false"><i class="mdi mdi-checkbox-blank-circle"></i><span class=" p-2">Data Obat</span></a>
                		</li> -->

						<!-- <li>
							<a style="color:white;" class=" waves-effect waves-dark" href="<?php echo site_url('laporan/petugas')?>" aria-expanded="false"><i class="mdi mdi-checkbox-blank-circle"></i><span class=" p-2">Data Petugas</span></a>
                		</li> -->
				
						<!-- <li>
							<a style="color:white;" class=" waves-effect waves-dark" href="<?php echo site_url('laporan/bidan')?>" aria-expanded="false"><i class="mdi mdi-checkbox-blank-circle"></i><span class=" p-2">Data Bidan</span></a>
                		</li> -->

						<li>
							<a style="color:white;" class=" waves-effect waves-dark" href="<?php echo site_url('laporan/jadwal_penimbangan')?>" aria-expanded="false"><i class="mdi mdi-checkbox-blank-circle"></i><span class=" p-2">Jadwal Penimbangan</span></a>
                		</li>

						<li>
							<a style="color:white;" class=" waves-effect waves-dark" href="<?php echo site_url('laporan/daftar_penimbangan')?>" aria-expanded="false"><i class="mdi mdi-checkbox-blank-circle"></i><span class=" p-2">Daftar Penimbangan</span></a>
                		</li>

						<li>
							<a style="color:white;" class=" waves-effect waves-dark" href="<?php echo site_url('laporan/penimbangan')?>" aria-expanded="false"><i class="mdi mdi-checkbox-blank-circle"></i><span class=" p-2">Riwayat Penimbangan</span></a>
                		</li>

						<li>
							<a style="color:white;" class=" waves-effect waves-dark" href="<?php echo site_url('grafik/grafik_penimbangan')?>" aria-expanded="false"><i class="mdi mdi-checkbox-blank-circle"></i><span class=" p-2">Grafik Penimbangan Balita</span></a>
                		</li>

						<li>
							<a style="color:white;" class=" waves-effect waves-dark" href="<?php echo site_url('laporan/jadwal_imunisasi')?>" aria-expanded="false"><i class="mdi mdi-checkbox-blank-circle"></i><span class=" p-2">Jadwal Imunisasi Balita</span></a>
                		</li>
						

						<li>
							<a style="color:white;" class=" waves-effect waves-dark" href="<?php echo site_url('laporan/imunisasi')?>" aria-expanded="false"><i class="mdi mdi-checkbox-blank-circle"></i><span class=" p-2">Riwayat Imunisasi Balita</span></a>
                		</li>

						 <!-- <li>
							<a style="color:white;" class=" waves-effect waves-dark" href="<?php echo site_url('laporan/posyandu')?>" aria-expanded="false"><i class="mdi mdi-checkbox-blank-circle"></i><span class=" p-2">Data Posyandu</span></a>
                		</li>

						<li>
							<a style="color:white;" class=" waves-effect waves-dark" href="<?php echo site_url('laporan/bayi')?>" aria-expanded="false"><i class="mdi mdi-checkbox-blank-circle"></i><span class=" p-2">Data Balita</span></a>
                		</li> -->

						<li>
							<a style="color:white;" class=" waves-effect waves-dark" href="<?php echo site_url('laporan/jadwal_pemeriksaan')?>" aria-expanded="false"><i class="mdi mdi-checkbox-blank-circle"></i><span class=" p-2">Jadwal Periksa Ibu Hamil</span></a>
                		</li>

						<li>
							<a style="color:white;" class=" waves-effect waves-dark" href="<?php echo site_url('laporan/daftar_pemeriksaan')?>" aria-expanded="false"><i class="mdi mdi-checkbox-blank-circle"></i><span class=" p-2">Daftar Pemeriksaan Ibu</span></a>
                		</li>
						
						<li>
							<a style="color:white;" class=" waves-effect waves-dark" href="<?php echo site_url('laporan/pemeriksaan')?>" aria-expanded="false"><i class="mdi mdi-checkbox-blank-circle"></i><span class=" p-2">Riwayat Pemeriksaan</span></a>
                		</li>

						<li>
							<a style="color:white;" class=" waves-effect waves-dark" href="<?php echo site_url('grafik/grafik_pemeriksaan')?>" aria-expanded="false"><i class="mdi mdi-checkbox-blank-circle"></i><span class=" p-2">Grafik Pemeriksaan Ibu</span></a>
                		</li>

						<li>
							<a style="color:white;" class=" waves-effect waves-dark" href="<?php echo site_url('laporan/kuesioner')?>" aria-expanded="false"><i class="mdi mdi-checkbox-blank-circle"></i><span class=" p-2">Hasil Kuesioner</span></a>
                		</li>

					</ul>
				</li>



            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
  
</aside>
