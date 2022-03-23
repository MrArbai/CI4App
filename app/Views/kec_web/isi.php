	<div id="templatemo_content">
    	
        <h2><?php echo $nm_site3; ?> - Kacamatan <?php echo $nm_site2; ?></h2>
        
		<?php
			foreach($detail_konten->result_array() as $kk)
			{
				$kd_konten = $kk['kode_konten'];
				echo "<div id='cuplikan_artikel'>";
				echo "<h6>".$kk['judul_konten']."</h6>";
				echo "<h7>Kategori ".$kk['judul_sitemap']." | Diposting pada ".$kk['tgl_posting']." | oleh ".$kk['nama_user']."</h7>";
				echo "<p>".nl2br($kk['isi_konten'])."</p>";
				echo "<div class='cleaner'></div>";
				echo "</div>";
				echo "<div class='cleaner_h10'></div>";
		?>
		<div id="komentar">
		<div id="bar_artikel"><b><?php echo $tot_komentar; ?></b> komentar untuk artikel ini :</div>
			<?php
				foreach($tampil_komentar->result_array() as $tk)
				{
					echo "<div class='cleaner_h10'></div>";
					echo "<div id='sub-komentar'>";
					echo "<div><img src='".base_url()."asset/main_web/images/gravatar.png' width='40' class='image_2'><h6>".$tk['nama_pengirim']."</h6></div>";
					echo "<div>".$tk['komentar']."</div>";
					echo "<div class='cleaner_h10'></div>";
					echo "</div>";
				}
			?>
		</div>
		<div class="cleaner_h10"></div>
		<div id="komentar">
		<div id="bar_artikel">Berikan komentar untuk artikel ini :</div>
		<form method="post" action="<?php echo base_url(); ?>index.php/kab/kirimkomentar">
		<table>
			<tr><td width="80">Nama</td><td width="20">:</td><td><input type="text" name="nama_pengirim" class="input_1" size="80" /></td></tr>
			<tr><td width="80">Email</td><td width="20">:</td><td><input type="text" name="email_pengirim" class="input_1" size="80" /></td></tr>
			<tr><td width="80" valign="top">Komentar</td><td width="20" valign="top">:</td><td><textarea name="komentar_pengirim" class="input_1" cols="80" rows="3"></textarea></td
			></tr>
			<tr><td width="80"></td><td width="20"></td><td><input type="submit" value="Kirim Komentar" class="tombol_1" /> <input type="reset" value="Hapus" class=
			"tombol_1" /><input type="hidden" name="kd_konten" value="<?php echo $kd_konten; ?>" /></td></tr>
			</tr>
		</table>
		</form>
		</div>
		<?php
			}
		?>
 </div>
	<div  class="cleaner"></div>
</div> <!-- end of content wrapper -->