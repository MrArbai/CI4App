<div id="isi">
<h1>Edit Data User</h1>
<?php
$i=1;
foreach($komen->result_array() as $k)
{
	$nama_usr = $k['nama_user'];
	$wilayah = $k['nama_wilayah'];
	$username = $k['username'];
	$kd_user = $k['kode_user'];
}
?>
<form method="post" action="<?php echo base_url(); ?>index.php/adminkec/updateakun" name="soal">
<table><tr><td width="100">Nama User</td><td>:</td><td><input type="text" name="nama" size="40" class="input" value="<?php echo $nama_usr; ?>" /></td></tr>
<tr><td>Wilayah</td><td>:</td><td><input type="text" disabled="disabled" name="kode" size="40" class="input" value="<?php echo $wilayah; ?>" /></td></tr>
<tr><td>Username</td><td>:</td><td><input type="text" name="username" size="40" class="input" value="<?php echo $username; ?>" /></td></tr>
<tr><td>Password Lama</td><td>:</td><td><input type="text" name="passwordlama" size="40" class="input" /> *Kosongkan jika tidak dirubah</td></tr>
<tr><td>Password Baru</td><td>:</td><td><input type="text" name="password" size="40" class="input" /> *Kosongkan jika tidak dirubah</td></tr>
<tr><td></td><td></td><td><input type="submit" class="input" value="Simpan" /> <input type="reset" class="input" value="Hapus" /><input type="hidden" class="input" value="<?php echo $kd_user; ?>" name="kd_user" /></td></tr>
</table>
</form>
</div>
</div>
</body>
</html>
