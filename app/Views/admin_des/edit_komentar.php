<?php echo $scriptmce; ?>
<div id="isi">
<h1>Manajemen Komentar Konten Daerah <?php echo $wilayah; ?></h1>
<?php
echo form_open_multipart('admindes/updatekomentar');
foreach($komen->result_array() as $k)
{
	echo "<table>";
	echo "<tr><td width='100'>Nama Pengirim</td><td width='20'> : </td><td><input type='text' name='nama' value='".$k['nama_pengirim']."' class='input' size='90'></td></tr>";
	echo "<tr><td>Email Pengirim</td><td> : </td><td><input type='text' name='email' value='".$k['email']."' class='input' size='90'></td></tr>";
	echo "<tr><td valign='top'>Komentar</td><td valign='top'> : </td><td><textarea name='isi'>".$k['komentar']."</textarea></td></tr>";
	echo "<tr><td>Status Komentar</td><td> : </td><td>";
	echo "<select name='status' class='input'>";
	if($k['status']=='0')
	{
		echo "<option value='0' selected>Tidak Aktif</option>";
		echo "<option value='1' >Aktif</option>";
	}
	else{
		echo "<option value='1' selected>Aktif</option>";
		echo "<option value='0'>Tidak Aktif</option>";
	}
	echo "</select></td></tr>";
	echo "<tr><td valign='top'></td><td valign='top'></td><td><input type='submit' value='Update' class='input'><input type='hidden' value='".$k['kode_komentar']."' name='kd_konten'></td></tr>";
	echo "</table>";
}
echo "</form>";
?>
</div>
</div>
</body>
</html>
