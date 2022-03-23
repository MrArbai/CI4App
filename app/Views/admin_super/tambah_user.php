<script type="text/javascript">
function ubahKode()
{
var data = document.soal.wilayah.value;
document.soal.nama_wil.value=data;

var kode = data.substring(0,3);
var kodewil = "";
if(kode=="kab")
{
	kodewil = "sua";
}
else if(kode=="kec")
{
	kodewil = "akec";
}
else if(kode=="des")
{
	kodewil = "ades";
}
document.soal.kode.value=kodewil;
}

</script>
<div id="isi">
<h1>Tambah User Baru</h1>
<form method="post" action="<?php echo base_url(); ?>index.php/superadmin/simpanuser" name="soal">
<table><tr><td width="100">Nama User</td><td>:</td><td><input type="text" name="nama" size="40" class="input" /></td></tr>
<tr><td>Wilayah</td><td>:</td><td><select class="input" name="wilayah" onChange="javascript:ubahKode();"><option value="" selected="selected">- Pilih -</option>
<?php
foreach($t_wilayah->result_array() as $tw)
{
	echo "<option value='".$tw['kode_wilayah']."'>".$tw['nama_wilayah']."</option>";
}
?>
</select> - <input type="text" name="nama_wil" size="10" class="input" /></td></tr>
<tr><td>Kode User</td><td>:</td><td><input type="text" name="kode" size="10" class="input" />  - <input type="text" name="angka" size="10" class="input" /></td></tr>
<tr><td>Username</td><td>:</td><td><input type="text" name="username" size="40" class="input" /></td></tr>
<tr><td>Password</td><td>:</td><td><input type="password" name="password" size="40" class="input" /></td></tr>
<tr><td></td><td></td><td><input type="submit" class="input" value="Simpan" /> <input type="reset" class="input" value="Hapus" /></td></tr>
</table>
</form>
</div>
</div>
</body>
</html>
