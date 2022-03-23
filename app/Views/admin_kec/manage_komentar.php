
<div id="isi">
<h1>Manajemen Komentar Konten Daerah <?php echo $wilayah; ?></h1>
<table width="100%" class="tabel" cellpadding="5" cellspacing="1">
<tr bgcolor="#A1C442"><td>No.</td><td>Judul Konten</td><td>Wilayah</td><td>Kategori</td><td>Komentar</td><td>Aksi</td></tr>
<?php
$i=1;
foreach($konten->result_array() as $k)
{
	echo "<tr><td>".$i."</td><td>".$k['judul_konten']."</td><td>".$k['nama_wilayah']."</td><td>".$k['judul_sitemap']."</td>";
	$hit_komen = $this->Adminkecamatan_model->Hitung_Komentar($k['kode_konten']);
	foreach($hit_komen->result() as $hk)
	{
		echo "<td>".$hk->jum."</td><td><a href='".base_url()."index.php/adminkec/kumkomentar/".$k['kode_konten']."'>Lihat Komentar</a></td></tr>";
	}
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
