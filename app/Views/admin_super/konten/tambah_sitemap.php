<script type="text/javascript">
	function ubahKode() {
		var data = document.soal.wilayah.value;
		var kode1 = data.substring(0, 4);
		var kodewil = "";
		if (data.length > 7) {
			document.soal.kode.disabled = true;
			document.soal.angka1.disabled = true;
			document.soal.angka2.disabled = true;
			document.soal.namawil.disabled = true;
			document.soal.kirim.disabled = true;
			document.soal.hapus.disabled = true;
		} else {
			document.soal.kode.disabled = false;
			document.soal.angka1.disabled = false;
			document.soal.angka2.disabled = false;
			document.soal.namawil.disabled = false;
			document.soal.kirim.disabled = false;
			document.soal.hapus.disabled = false;
		}
		if (kode1 == "pm01") {
			kodewil = "pm01";
		} else if (kode1 == "pm02") {
			kodewil = "pm02";
		} else if (kode1 == "pm03") {
			kodewil = "pm03";
		} else if (kode1 == "pm04") {
			kodewil = "pm04";
		}
		document.soal.kode.value = kodewil;
	}
</script>
<div id="isi">
	<h1>Tambah Sitemap</h1>
	<form method="post" action="<?php echo base_url(); ?>index.php/superadmin/simpansitemap" name="soal">
		<table>
			<tr>
				<td width="150">Sitemap Induk</td>
				<td>:</td>
				<td><select name="wilayah" class="input" onChange="javascript:ubahKode();">
						<option selected="selected">- Pilih -</option>
						<?php
						foreach ($menu_parent->result_array() as $mp) {
							echo "<option value='" . $mp['kode_sitemap'] . "'>" . $mp['judul_sitemap'] . "</option>";
						}
						?>
					</select></td>
			</tr>
			<tr>
				<td>Kode Sitemap</td>
				<td>:</td>
				<td><input type="text" name="kode" class="input" size="5" /> - <input type="text" name="angka1" class="input" size="5" /> - <input type="text" name="angka2" class="input" size="5" /></td>
			</tr>
			<tr>
				<td>Nama Wilayah</td>
				<td>:</td>
				<td><input type="text" name="namawil" class="input" size="40" /></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input name="kirim" type="submit" value="Simpan" class="input" /> <input name="hapus" type="reset" value="Hapus" class="input" /></td>
			</tr>
		</table>
	</form>
</div>
</div>
</body>

</html>