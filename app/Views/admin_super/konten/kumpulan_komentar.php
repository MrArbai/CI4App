<div id="isi">
	<h1>Manajemen Komentar Konten Daerah <?php echo $wilayah; ?></h1>
	<?php
	$i = 1;
	foreach ($konten->result_array() as $k) {
		echo "<div id='artikel'><h2>" . $k['judul_konten'] . "</h2>" . substr($k['isi_konten'], 0, 200) . "....<div class='cleaner_h10'></div><div id='bar_artikel'>
	<div><a href='" . base_url() . "index.php/superadmin/editkonten/" . $k['kode_konten'] . "'>Edit Konten</a></div></div></div>";
		foreach ($komentar->result_array() as $km) {
			echo "<div id='komentar'><b>" . $km['nama_pengirim'] . "</b> - " . $km['email'] . "<br>" . $km['komentar'] . "<div class='cleaner_h10'></div><div id='bar_artikel'><a href='" . base_url()
				. "index.php/superadmin/editkomentar/" . $km['kode_komentar'] . "'>Edit Komentar</a> | <a href='" . base_url() . "index.php/superadmin/hapuskomentar/" . $km['kode_komentar'] . "'";
	?>
			onClick="return confirm('Anda yakin ingin menghapus data ini?')"
	<?php
			echo ">Hapus Komentar</a></div></div>";
		}
		$i++;
	}
	?>
</div>
</div>
</body>

</html>