<script type="text/javascript">
	function lihatObjek() {
		var data = "";
		document.soal.simpan.value = "";
		for (i = 0; i < document.soal.length; i++) {
			if (document.soal.elements[i].type == 'checkbox') {
				if (document.soal.elements[i].checked == true) {
					if (data == "")
						data = document.soal.elements[i].value;
					else
						data += '|' + document.soal.elements[i].value;
				}
			}
		}
		document.soal.simpan.value = data;
	}
</script>
<div id="isi">
	<h1>Manajemen Sitemap Menu</h1>
	<a href="<?php echo base_url(); ?>index.php/superadmin/tambahsitemap">
		<div class="input">Tambah Data Sitemap</div>
	</a>
	<form method="post" action="#" name="soal">
		<ul id="treemenu1" class="treeview">
			<?php
			$i = 1;
			foreach ($wilayah_kab->result_array() as $md) {
				echo "<li><input type='checkbox' onclick='javascript:lihatObjek();' name='pilihan-" . $i . "' value='" . $kode_wil . "-" . $md['kode_sitemap'] . "'>" . $md['judul_sitemap'] . "";
				echo " | <a href='" . base_url() . "index.php/superadmin/hapussitemap/" . $md['kode_sitemap'] . "'";
			?>
				onClick="return confirm('Anda yakin ingin menghapus data ini?')"
				<?php
				echo ">Hapus</a><ul>";
				$sm = $this->Superadmin_model->Semua_Sitemap_Anak($md['kode_sitemap']);
				foreach ($sm->result() as $sma) {
					echo "<li><input type='checkbox' onclick='javascript:lihatObjek();' name='pilihan-" . $i . "' value='" . $kode_wil . "-" . $sma->kode_sitemap . "'>" . $sma->judul_sitemap . " | ";
					echo "<a href='" . base_url() . "index.php/superadmin/hapussitemap/" . $sma->kode_sitemap . "'";
				?>
					onClick="return confirm('Anda yakin ingin menghapus data ini?')"
					<?php
					echo ">Hapus</a><ul>";
					$sm2 = $this->Superadmin_model->Semua_Sitemap_Anak($sma->kode_sitemap);
					foreach ($sm2->result() as $sma2) {
						echo "<li><input type='checkbox' onclick='javascript:lihatObjek();' name='pilihan-" . $i . "' value='" . $kode_wil . "-" . $sma2->kode_sitemap . "'>" . $sma2->judul_sitemap . " | ";
						echo " <a href='" . base_url() . "index.php/superadmin/hapussitemap/" . $sma2->kode_sitemap . "'";
					?>
						onClick="return confirm('Anda yakin ingin menghapus data ini?')"
			<?php
						echo ">Hapus</a></li>";
					}
					echo "</ul></li>";
				}
				echo "</ul></li>";
				$i++;
			}
			?>
		</ul>
	</form>
	<script type="text/javascript">
		ddtreemenu.createTree("treemenu1", true);
	</script>
</div>
</div>
</body>

</html>