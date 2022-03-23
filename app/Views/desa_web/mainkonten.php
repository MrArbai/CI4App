	<div id="templatemo_content">
    	
        <h2><?php echo $nm_site3; ?> - Kacamatan <?php echo $nm_site2; ?></h2>
        
		<?php
			foreach($kumpulan_konten->result_array() as $kk)
			{
				echo "<div id='cuplikan_artikel'>";
				echo "<a href='".base_url()."index.php/desa/isi/".$kk['kode_wilayah']."/".$kk['kode_sitemap']."/".$kk['kode_konten']."'><h6>".$kk['judul_konten']."</h6></a>";
				echo "<h7>Kategori ".$kk['judul_sitemap']." - ".$kk['nama_wilayah']." | Diposting pada ".$kk['tgl_posting']." | oleh ".$kk['nama_user']."</h7>";
				echo "<div class='cleaner_h10'></div>";
				$isi = strip_tags(substr($kk['isi_konten'],0,100));
				echo "<p>".$isi."...<b>(Baca selengkapnya)</b></p>";
				echo "<div class='cleaner'></div>";
				echo "<div id='bar_artikel'><a href='".base_url()."index.php/desa/isi/".$kk['kode_wilayah']."/".$kk['kode_sitemap']."/".$kk['kode_konten']."'><span class='baca'>
				Baca Selengkapnya</span></a> <a href='".base_url()."index.php/desa/isi/".$kk['kode_wilayah']."/".$kk['kode_sitemap']."/".$kk['kode_konten'].
				"'><span class='komentar'>Berikan Komentar</span></a></div>";
				echo "</div>";
				echo "<div class='cleaner_h10'></div>";
			}
		?>
 </div>
	<div  class="cleaner"></div>
</div> <!-- end of content wrapper -->