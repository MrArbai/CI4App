
<!-- end of feature warpper -->

<div id="templatemo_content_wrapper">
<div id="templatemo_sidebar_luar"> 
    <div id="templatemo_sidebar">
        <h2><span>Potensi Daerah Banyuwangi</span></h2>
        <div class="newsbox">
        	<img src="<?php echo base_url(); ?>asset/main_web/images/pelengkung.jpg" class="image_1" width="260" />
            Plengkung atau yang dikenal oleh wisatawan mancanegara dengan nama G-Land merupakan surga bagi para peselancar profesional dari dalam negeri ataupun...[Lanjut baca]
        </div>
	</div>
	
	<div id="templatemo_sidebar">
		<h2><span>Artikel Terpopuler</span></h2>
        <div class="newsbox">
		<ul class="li-class">
        	<li class="li-class"> Sumber Daya Alam - Bangorejo (53)</li>
			<li class="li-class"> Obyek Wisata - Glenmore (48)</li>
			<li class="li-class"> Ekonomi Masyarakat - Glagah (40)</li>
			<li class="li-class"> Kinerja Pemerintahan - Wongsorejo (35)</li>
			<li class="li-class"> Visi dan Misi - Wongsorejo (29)</li>
		</ul>
            <div class="cleaner"></div>
        </div>
	</div>	
	
	<div id="templatemo_sidebar">
		<h2><span>Data Statistik Kunjungan</span></h2>
        <div class="newsbox">
		<ul class="li-class">
		<li class="li-class">
<?php
	foreach($counter_pengunjung->result_array() as $c)
	{
		echo "Dikunjungi oleh : <b>".$c['isi_setting']."</b> user";
	}
?>
</li>
<?php
$ip = $_SERVER['REMOTE_ADDR'];
?>
<li class="li-class">IP address :  <b><?php echo $ip; ?></b></li>
<li class="li-class">OS : <b><?php echo $os; ?></b></li>
<li class="li-class">Browser : <b><?php echo $browser; ?></b></li>
		</ul>
        </div>
	</div>
	
	<div id="templatemo_sidebar">
		<h2><span>Tautan Terkait</span></h2>
        <div class="newsbox">
        	<ul class="li-class">
			<li class="li-class">Pariwisata Banyuwangi</li>
			<li class="li-class">Dinas Pendidikan Banyuwangi</li>
			<li class="li-class">Kabupaten Banyuwangi</li>
			<li class="li-class">Provinsi Jawa Timur</li>
			</ul>
        </div>
    </div>
</div>	