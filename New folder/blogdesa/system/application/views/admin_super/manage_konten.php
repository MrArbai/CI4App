
<div id="isi">
<h1>Konten-Konten Daerah <?php echo $wilayah; ?></h1>
<a href="<?php echo base_url(); ?>index.php/superadmin/tambahkonten"><div class="input">Tambah Konten</div></a><br />
<table width="100%" class="tabel" cellpadding="5" cellspacing="1">
<tr bgcolor="#A1C442"><td>No.</td><td>Judul Konten</td><td>Wilayah</td><td>Kategori</td><td colspan="2" align="center">Aksi</td></tr>
<?php
$i=1;
foreach($konten->result_array() as $k)
{
	echo "<tr><td>".$i."</td><td>".$k['judul_konten']."</td><td>".$k['nama_wilayah']."</td><td>".$k['judul_sitemap']."</td>";
	echo "<td align='center'><a href='".base_url()."index.php/superadmin/editkonten/".$k['kode_konten']."'><div class='input'>Edit</div></a></td>";
	echo "<td align='center'><a href='".base_url()."index.php/superadmin/hapuskonten/".$k['kode_konten']."'"; 
	?> onClick="return confirm('Anda yakin ingin menghapus data ini?')" 
	<?php echo "><div class='input'>Hapus</div></a></td></tr>";
	$i++;
}
?>
</table>
<?php
echo $paginator;
?>
</div>
</div>
</body>
</html>
