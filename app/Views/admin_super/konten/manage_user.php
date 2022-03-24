<div id="isi">
	<h1>Manajemen User</h1>
	<a href="<?php echo base_url(); ?>index.php/superadmin/tambahuser">
		<div class="input">Tambah Data User</div>
	</a><br />
	<table width="100%" class="tabel" cellpadding="5" cellspacing="1">
		<tr bgcolor="#A1C442">
			<td>No.</td>
			<td>Nama User</td>
			<td>Username</td>
			<td>Wilayah</td>
			<td colspan="2" align="center">Aksi</td>
		</tr>
		<?php
		$i = 1;
		foreach ($user->result_array() as $u) {
			echo "<tr><td>" . $i . "</td><td>" . $u['nama_user'] . "</td><td>" . $u['username'] . "</td><td>" . $u['nama_wilayah'] . "</td>";
			echo "<td align='center'><a href='" . base_url() . "index.php/superadmin/edituser/" . $u['kode_user'] . "'><div class='input'>Edit</div></a></td>";
			echo "<td align='center'><a href='" . base_url() . "index.php/superadmin/hapususer/" . $u['kode_user'] . "'";
		?> onClick="return confirm('Anda yakin ingin menghapus data ini?')"
		<?php echo "><div class='input'>Hapus</div></a></td></tr>";
			$i++;
		}
		?>
	</table>
</div>
</div>
</body>

</html>