	<div id="templatemo_content">
    	
        <h2>Selamat Datang di Kecamatan <?php echo $nm_site2; ?></h2>
        
      <p>Kecamatan <?php echo $nm_site2; ?> adalah salah satu dari 24 kecamatan yang terdapat di kabupaten Banyuwangi. Kecamatan <?php echo $nm_site2; ?> mempunyai potensi-potensi dan objek wisata yang bisa dijadikan tujuan wisata maupun tempat untuk investasi bagi para investor.</p>
	  <p>Kecamatan <?php echo $nm_site2; ?> mempunyai <?php echo $jml_desa; ?> desa dengan keunikan masing-masing potensi dan keanekaragaman daerahnya. Berikut ini adalah desa-desa yang terdapat di kecamatan <?php echo $nm_site2; ?> : </p>
	  <div class="tab-pane" id="tabPane1">
	  <?php
	  $i = 2;
		echo "<div class='tab-page' id='tabPage1'>";
		echo "<h7 class='tab'>Wilayah</h7>";
		?>
			<script type="text/javascript">tp1.addTabPage( document.getElementById( "tabPage1" ) );</script>
		<?php
	  $no = 1;
	  echo "<div id='wilayah_home'>";
	  foreach($wil_kec->result_array() as $wil)
	  {
	  	$link_seo_wil = str_replace(" ","-",$wil['nama_wilayah']);
	  	echo "<a href='".base_url()."index.php/desa/home/".$wil['kode_wilayah']."/".$link_seo_wil."'><div id='sub_wilayah_home'>".$no.". ".$wil['nama_wilayah']."</div></a>";
		$no++;
	  }
	  echo "</div>";
	  echo "</div>";
	  
	  foreach($menu_default->result_array() as $md)
		{
			echo "<div class='tab-page' id='tabPage".$i."'>";
			echo "<h7 class='tab'>".$md['judul_sitemap']."</h7>";
			?>
			<script type="text/javascript">tp1.addTabPage( document.getElementById( "tabPage<?php echo $i; ?>" ) );</script>
			<?php
			$kumpulan_konten = $this->Web_model->Kumpulan_Konten_Kec_Mainkonten($md['kode_wilayah'],$md['kode_sitemap']);
			foreach($kumpulan_konten->result_array() as $kk)
			{
				echo "<div id='cuplikan_artikel_tab'>";
				echo "<a href='".base_url()."index.php/kec/isi/".$md['kode_wilayah']."/".$kk['kode_sitemap']."/".$kk['kode_konten']."'><h6>".$kk['judul_konten']."</h6></a>";
				echo "<h7>Kategori ".$kk['judul_sitemap']." - ".$kk['nama_wilayah']."  | Diposting pada ".$kk['tgl_posting']." | oleh ".$kk['nama_user']."</h7>";
				echo "<div class='cleaner_h10'></div>";
				$isi = strip_tags(substr($kk['isi_konten'],0,100));
				echo "<p>".$isi."...<b>(Baca selengkapnya)</b></p>";
				echo "<div class='cleaner'></div>";
				echo "<div id='bar_artikel'><a href='".base_url()."index.php/kec/isi/".$md['kode_wilayah']."/".$kk['kode_sitemap']."/".$kk['kode_konten']."'><span class='baca'>
				Baca Selengkapnya</span></a> <a href='".base_url()."index.php/kec/isi/".$md['kode_wilayah']."/".$kk['kode_sitemap']."/".$kk['kode_konten'].
				"'><span class='komentar'>Berikan Komentar</span></a></div>";
				echo "</div>";
				echo "<div class='cleaner_h10'></div>";
			}
			echo "</div>";
			$i++;
		}
	  
	  ?>
	  </div>
        
        <div class="cleaner_h30"></div>
        
        
        
  </div>
	<div  class="cleaner"></div>
</div> <!-- end of content wrapper -->