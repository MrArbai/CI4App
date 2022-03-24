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
	<h1>Manajemen Wilayah</h1>
	<a href="<?php echo base_url(); ?>index.php/superadmin/tambahwilayah">
		<div class="input">Tambah Data Wilayah</div>
	</a>
	<form method="post" action="#" name="soal">
		<ul id="treemenu1" class="treeview">
			<?php
			$i = 1;
			foreach ($wilayah_kab->result_array() as $md) {
				echo "<li><input type='checkbox' onclick='javascript:lihatObjek();' name='pilihan-" . $i . "' value='" . $kode_wil . "-" . $md['kode_wilayah'] . "'>" . $md['nama_wilayah'] . "<ul>";
				$sm = $this->Superadmin_model->Semua_Wilayah_Anak($md['kode_wilayah']);
				foreach ($sm->result() as $sma) {
					echo "<li><input type='checkbox' onclick='javascript:lihatObjek();' name='pilihan-" . $i . "' value='" . $kode_wil . "-" . $sma->kode_wilayah . "'>" . $sma->nama_wilayah . " | ";
					echo "<a href='" . base_url() . "index.php/superadmin/hapuswilayah/" . $sma->kode_wilayah . "'";
			?>
					onClick="return confirm('Anda yakin ingin menghapus data ini?')"
					<?php
					echo ">Hapus</a><ul>";
					$sm2 = $this->Superadmin_model->Semua_Wilayah_Anak($sma->kode_wilayah);
					foreach ($sm2->result() as $sma2) {
						echo "<li><input type='checkbox' onclick='javascript:lihatObjek();' name='pilihan-" . $i . "' value='" . $kode_wil . "-" . $sma2->kode_wilayah . "'>" . $sma2->nama_wilayah . " | ";
						echo " <a href='" . base_url() . "index.php/superadmin/hapuswilayah/" . $sma2->kode_wilayah . "'";
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