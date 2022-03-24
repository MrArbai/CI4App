<script type="text/javascript">
	function ubahKode() {
		var data = document.soal.wilayah.value;
		var kode = data.substring(0, 3);
		var kodewil = "";
		if (kode == "kab") {
			kodewil = "kec";
		} else if (kode == "kec") {
			kodewil = "des";
		}
		document.soal.kode.value = kodewil;
	}
</script>
<div id="isi">
	<h1>Tambah Wilayah</h1>
	<form method="post" action="<?php echo base_url(); ?>index.php/superadmin/simpanwilayah" name="soal">
		<table>
			<tr>
				<td width="150">Wilayah Induk</td>
				<td>:</td>
				<td><select name="wilayah" class="input" onChange="javascript:ubahKode();">
						<option selected="selected">- Pilih -</option>
						<?php
						foreach ($menu_parent->result_array() as $mp) {
							echo "<option value='" . $mp['kode_wilayah'] . "'>" . $mp['nama_wilayah'] . "</option>";
						}
						?>
					</select></td>
			</tr>
			<tr>
				<td>Kode Wilayah</td>
				<td>:</td>
				<td><input type="text" name="kode" class="input" size="5" /> - <input type="text" name="angka" class="input" size="5" /></td>
			</tr>
			<tr>
				<td>Nama Wilayah</td>
				<td>:</td>
				<td><input type="text" name="namawil" class="input" size="40" /></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
				<td><input type="submit" value="Simpan" class="input" /> <input type="reset" value="Hapus" class="input" /></td>
			</tr>
		</table>
	</form>
</div>
</div>
</body>

</html>