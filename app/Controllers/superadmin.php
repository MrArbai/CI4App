<?php

class Superadmin extends Controller
{

	function Superadmin()
	{
		parent::Controller();
		$this->load->helper(array('form', 'url', 'text_helper', 'date'));
		$this->load->database();
		$this->load->library(array('Pagination'));
		$this->load->plugin();
		$this->load->model(array('Web_model', 'Superadmin_model'));
		session_start();
	}
	function index()
	{
		$data = array();
		$session = isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar'] : '';
		if ($session != "") {
			$pecah = explode("|", $session);
			$data['nama_user'] = $pecah[1];
			$data['username'] = $pecah[0];
			$identitas = $this->Superadmin_model->Identitas_User($pecah[4]);
			foreach ($identitas->result() as $ids) {
				$data['wilayah'] = $ids->nama_wilayah;
			}
			$kd_wil = $pecah[3];
			if ($kd_wil != "kab") {
?>
				<script type="text/javascript" language="javascript">
					alert("Autentikasi Gagal...!!!");
				</script>
			<?php
				echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
			} else {
				$this->load->view('admin_super/bg_atas', $data);
				$this->load->view('admin_super/isi_home', $data);
			}
		} else {
			?>
			<script type="text/javascript" language="javascript">
				alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
		}
	}

	function managemenu()
	{
		$data = array();
		$session = isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar'] : '';
		if ($session != "") {
			$pecah = explode("|", $session);
			$data['nama_user'] = $pecah[1];
			$data['username'] = $pecah[0];
			$data['kode_wil'] = $pecah[2];
			$identitas = $this->Superadmin_model->Identitas_User($pecah[4]);
			foreach ($identitas->result() as $ids) {
				$data['wilayah'] = $ids->nama_wilayah;
			}
			$kd_wil = $pecah[3];
			if ($kd_wil != "kab") {
			?>
				<script type="text/javascript" language="javascript">
					alert("Autentikasi Gagal...!!!");
				</script>
			<?php
				echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
			} else {
				$data["menu_tampil"] = $this->Web_model->Menu_Opsional($pecah[2]);
				$data["menu_default"] = $this->Superadmin_model->Semua_Menu_Induk($pecah[2]);
				$data["menu_induk_db"] = $this->Superadmin_model->Menu_Induk_Database($pecah[2]);
				$this->load->view('admin_super/bg_atas', $data);
				$this->load->view('admin_super/manage_menu', $data);
			}
		} else {
			?>
			<script type="text/javascript" language="javascript">
				alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
		}
	}

	function updatemenu()
	{
		$data = array();
		$session = isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar'] : '';
		if ($session != "") {
			$pecah = explode("|", $session);
			$data['nama_user'] = $pecah[1];
			$data['username'] = $pecah[0];
			$data['kode_wil'] = $pecah[2];
			$identitas = $this->Superadmin_model->Identitas_User($pecah[4]);
			foreach ($identitas->result() as $ids) {
				$data['wilayah'] = $ids->nama_wilayah;
			}
			$kd_wil = $pecah[3];
			if ($kd_wil != "kab") {
			?>
				<script type="text/javascript" language="javascript">
					alert("Autentikasi Gagal...!!!");
				</script>
			<?php
				echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
			} else {
				$simpan = $this->input->post('simpan');
				$pecah1 = explode("|", $simpan);
				$jumlah = count($pecah1);
				for ($i = 0; $i < count($pecah1); $i++) {
					$pecah2 = explode("-", $pecah1[$i]);
					$data2['kode_wilayah'][] = $pecah2[0];
					$data2['kode_sitemap'][] = $pecah2[1];
					$data2['status'][] = "1";
				}
				$string = "insert into tbl_menu_per_daerah (kode_wilayah,kode_sitemap,status) values";
				$akhir = "";
				for ($i = 0; $i < $jumlah; $i++) {
					if ($akhir == "") {
						$akhir = "('" . $data2['kode_wilayah'][$i] . "','" . $data2['kode_sitemap'][$i] . "','" . $data2['status'][$i] . "')";
					} else {
						$akhir .= ",('" . $data2['kode_wilayah'][$i] . "','" . $data2['kode_sitemap'][$i] . "','" . $data2['status'][$i] . "')";
					}
				}
				$query = $string . $akhir . ';';
				$query_delete = "delete from tbl_menu_per_daerah where kode_wilayah='" . $data['kode_wil'] . "'";
				$this->Superadmin_model->Update_Menu($query, $query_delete);
				echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/superadmin/managemenu'>";
			}
		} else {
			?>
			<script type="text/javascript" language="javascript">
				alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
		}
	}

	function managekonten()
	{
		$data = array();
		$session = isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar'] : '';
		if ($session != "") {
			$pecah = explode("|", $session);
			$data['nama_user'] = $pecah[1];
			$data['username'] = $pecah[0];
			$data['kode_wil'] = $pecah[2];
			$identitas = $this->Superadmin_model->Identitas_User($pecah[4]);
			foreach ($identitas->result() as $ids) {
				$data['wilayah'] = $ids->nama_wilayah;
			}
			$kd_wil = $pecah[3];
			if ($kd_wil != "kab") {
			?>
				<script type="text/javascript" language="javascript">
					alert("Autentikasi Gagal...!!!");
				</script>
			<?php
				echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
			} else {
				$page = $this->uri->segment(3);
				$limit_konten = 10;
				if (!$page) :
					$ofset_konten = 0;
				else :
					$ofset_konten = $page;
				endif;
				$data["menu_induk_db"] = $this->Superadmin_model->Menu_Induk_Database($pecah[2]);
				$data["konten"] = $this->Superadmin_model->Konten_Per_Kat($pecah[2], $limit_konten, $ofset_konten);
				$tot_hal = $this->Superadmin_model->Total_Konten_Per_Kat($pecah[2]);
				$config['per_page'] = $limit_konten;
				$config['base_url'] = base_url() . '/index.php/superadmin/managekonten';
				$config['total_rows'] = $tot_hal->num_rows();
				$config['uri_segment'] = 3;
				$config['first_link'] = 'Awal';
				$config['last_link'] = 'Akhir';
				$config['next_link'] = 'Selanjutnya';
				$config['prev_link'] = 'Sebelumnya';
				$this->pagination->initialize($config);
				$data["paginator"] = $this->pagination->create_links();
				$this->load->view('admin_super/bg_atas', $data);
				$this->load->view('admin_super/manage_konten', $data);
			}
		} else {
			?>
			<script type="text/javascript" language="javascript">
				alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
		}
	}

	function tambahkonten()
	{
		$data = array();
		$session = isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar'] : '';
		if ($session != "") {
			$pecah = explode("|", $session);
			$data['nama_user'] = $pecah[1];
			$data['username'] = $pecah[0];
			$data['kode_wil'] = $pecah[2];
			$identitas = $this->Superadmin_model->Identitas_User($pecah[4]);
			foreach ($identitas->result() as $ids) {
				$data['wilayah'] = $ids->nama_wilayah;
			}
			$kd_wil = $pecah[3];
			if ($kd_wil != "kab") {
			?>
				<script type="text/javascript" language="javascript">
					alert("Autentikasi Gagal...!!!");
				</script>
			<?php
				echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
			} else {
				$data['scriptmce'] = $this->scripttiny_mce($pecah[2]);
				$data["menu_induk_db"] = $this->Superadmin_model->Semua_Sitemap();
				$data["medialist"] = $this->Superadmin_model->getDataMedia($pecah[2]);
				$this->load->view('admin_super/bg_atas', $data);
				$this->load->view('admin_super/tambah_konten', $data);
			}
		} else {
			?>
			<script type="text/javascript" language="javascript">
				alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
		}
	}

	function simpankonten()
	{
		$data = array();
		$datainput = array();
		$session = isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar'] : '';
		if ($session != "") {
			$pecah = explode("|", $session);
			$data['nama_user'] = $pecah[1];
			$data['username'] = $pecah[0];
			$data['kode_wil'] = $pecah[2];
			$identitas = $this->Superadmin_model->Identitas_User($pecah[4]);
			foreach ($identitas->result() as $ids) {
				$data['wilayah'] = $ids->nama_wilayah;
			}
			$kd_wil = $pecah[3];
			if ($kd_wil != "kab") {
			?>
				<script type="text/javascript" language="javascript">
					alert("Autentikasi Gagal...!!!");
				</script>
			<?php
				echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
			} else {
				$tgl = " %d/%m/%Y";
				$time = time();
				$datainput["kode_wilayah"] = $this->input->post('kd_wil');
				$datainput["kode_sitemap"] = $this->input->post('sitemap');
				$datainput["kode_user"] = $pecah[4];
				$datainput["judul_konten"] = $this->input->post('judul');
				$datainput["isi_konten"] = $this->input->post('isi');
				$datainput['tgl_posting'] = mdate($tgl, $time);
				$this->Superadmin_model->Input_Konten('tbl_konten', $datainput);
				echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/superadmin/managekonten'>";
			}
		} else {
			?>
			<script type="text/javascript" language="javascript">
				alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
			</script>
		<?php
			echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
		}
	}

	function media_list()
	{
		$session = isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar'] : '';
		$pecah = explode("|", $session);
		$imglist = $this->Superadmin_model->getDataMedia($pecah[2]);
		$js = 'var tinyMCEImageList = new Array(';
		foreach ($imglist->result_array() as $row) {
			$js .= '["' . $row['judul_file'] . '", "' . base_url() . $row['nama_file'] . '"],';
		}
		$js .= ');';
		echo str_replace(',);', ');', $js);
	}

	function uploadfile()
	{
		$title = $this->input->post('judul');
		$kd_wil = $this->input->post('kd_wil');
		$filetype = $this->input->post('filetype');
		$filesize = $this->input->post('file_size');
		if ($filetype == "pdf")
			$ori_src = "media/pdf/" . strtolower(str_replace(' ', '_', $_FILES['imagefile']['name']));
		else
			$ori_src = "media/image/imgoriginal/" . strtolower(str_replace(' ', '_', $_FILES['imagefile']['name']));

		if (move_uploaded_file($_FILES['imagefile']['tmp_name'], $ori_src)) {
			chmod("$ori_src", 0777);
		} else {
			echo "Gagal melakukan proses upload file.Hal ini biasanya disebabkan ukuran file yang terlalu besar atau koneksi jaringan anda sedang bermasalah";
			exit;
		}

		if ($filetype == "pdf") {
			$thumb_src = "media/pdf/" . strtolower(str_replace(' ', '_', $_FILES['imagefile']['name']));
		} else {
			$thumb_src = "media/image/imgthumb/" . strtolower(str_replace(' ', '_', $_FILES['imagefile']['name']));

			switch ($filesize) {
				case "72x48":
					$n_width = 72;
					$n_height = 48;
					break;
				case "144x96":
					$n_width = 144;
					$n_height = 96;
					break;
				case "230x160":
					$n_width = 230;
					$n_height = 160;
					break;
				case "460x320":
					$n_width = 460;
					$n_height = 320;
					break;
				case "original_size":
					$n_width = 0;
					$n_height = 0;
					break;
			}

			if (($_FILES['imagefile']['type'] == "image/jpeg") ||
				($_FILES['imagefile']['type'] == "image/png") ||
				($_FILES['imagefile']['type'] == "image/gif")
			) {
				$im = @ImageCreateFromJPEG($ori_src) or // Read JPEG Image
					$im = @ImageCreateFromPNG($ori_src) or // or PNG Image
					$im = @ImageCreateFromGIF($ori_src) or // or GIF Image
					$im = false; // If image is not JPEG, PNG, or GIF

				//$im=ImageCreateFromJPEG($ori_src); 
				$width = ImageSx($im);              // Original picture width is stored
				$height = ImageSy($im);             // Original picture height is stored
				if (($n_height == 0) && ($n_width == 0)) {
					$n_height = $height;
					$n_width = $width;
				}

				if (!$im) {
					echo '<p>Gagal membuat thumnail</p>';
					exit;
				} else {
					$newimage = @imagecreatetruecolor($n_width, $n_height);
					@imageCopyResized($newimage, $im, 0, 0, 0, 0, $n_width, $n_height, $width, $height);
					@ImageJpeg($newimage, $thumb_src);
					chmod("$thumb_src", 0777);
				}
			}
		}

		$data = array();
		$data["judul_file"] = $title;
		$data["kode_wilayah"] = $kd_wil;
		$data["tipe_file"] = $filetype;
		$data["nama_file"] = $thumb_src;
		$this->Superadmin_model->Simpan_Gambar($data);
		?>
		<script type="text/javascript">
			javascript: history.go(-1);
		</script>
	<?php
	}

	function hapusmedia()
	{
		$session = isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar'] : '';
		$pecah = explode("|", $session);
		$id = '';
		if ($this->uri->segment(3) === FALSE) {
			$id = $id;
		} else {
			$id = $this->uri->segment(3);
		}
		$imgdb =  $this->Superadmin_model->getDataMedia($pecah[2]);

		foreach ($imgdb->result_array() as $row) {
			$filename = $row['nama_file'];
			$filetype = $row['tipe_file'];
		}
		if (file_exists($filename)) {
			if (@unlink($filename)) {
				if ($filetype == "image")
					@unlink(str_replace('imgthumb', 'imgoriginal', $filename));
			}
		}
		$this->Superadmin_model->Hapus_Media($id);
	?>
		<script type="text/javascript">
			javascript: history.go(-1);
		</script>
		<?php
	}

	function editkonten()
	{
		$data = array();
		$id = '';
		if ($this->uri->segment(3) === FALSE) {
			$id = $id;
		} else {
			$id = $this->uri->segment(3);
		}
		$session = isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar'] : '';
		if ($session != "") {
			$pecah = explode("|", $session);
			$data['nama_user'] = $pecah[1];
			$data['username'] = $pecah[0];
			$data['kode_wil'] = $pecah[2];
			$identitas = $this->Superadmin_model->Identitas_User($pecah[4]);
			foreach ($identitas->result() as $ids) {
				$data['wilayah'] = $ids->nama_wilayah;
			}
			$kd_wil = $pecah[3];
			if ($kd_wil != "kab") {
		?>
				<script type="text/javascript" language="javascript">
					alert("Autentikasi Gagal...!!!");
				</script>
			<?php
				echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
			} else {
				$data['scriptmce'] = $this->scripttiny_mce($pecah[2]);
				$data["menu_induk_db"] = $this->Superadmin_model->Semua_Sitemap();
				$data["medialist"] = $this->Superadmin_model->getDataMedia($pecah[2]);
				$data["edit_konten"] = $this->Superadmin_model->Edit_Konten($id);
				$this->load->view('admin_super/bg_atas', $data);
				$this->load->view('admin_super/edit_konten', $data);
			}
		} else {
			?>
			<script type="text/javascript" language="javascript">
				alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
		}
	}

	function updatekonten()
	{
		$data = array();
		$session = isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar'] : '';
		if ($session != "") {
			$pecah = explode("|", $session);
			$data['nama_user'] = $pecah[1];
			$data['username'] = $pecah[0];
			$data['kode_wil'] = $pecah[2];
			$identitas = $this->Superadmin_model->Identitas_User($pecah[4]);
			foreach ($identitas->result() as $ids) {
				$data['wilayah'] = $ids->nama_wilayah;
			}
			$kd_wil = $pecah[3];
			if ($kd_wil != "kab") {
			?>
				<script type="text/javascript" language="javascript">
					alert("Autentikasi Gagal...!!!");
				</script>
			<?php
				echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
			} else {
				$datainput['judul_konten'] = $this->input->post('judul');
				$datainput['kode_sitemap'] = $this->input->post('sitemap');
				$datainput['isi_konten'] = $this->input->post('isi');
				$datainput['kode_konten'] = $this->input->post('kd_konten');
				$this->Superadmin_model->Update_Konten('tbl_konten', $datainput, 'kode_konten');
			?>
				<script type="text/javascript">
					javascript: history.go(-1);
				</script>
			<?php
			}
		} else {
			?>
			<script type="text/javascript" language="javascript">
				alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
		}
	}

	function hapuskonten()
	{
		$data = array();
		$id = '';
		if ($this->uri->segment(3) === FALSE) {
			$id = $id;
		} else {
			$id = $this->uri->segment(3);
		}
		$session = isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar'] : '';
		if ($session != "") {
			$pecah = explode("|", $session);
			$data['nama_user'] = $pecah[1];
			$data['username'] = $pecah[0];
			$data['kode_wil'] = $pecah[2];
			$identitas = $this->Superadmin_model->Identitas_User($pecah[4]);
			foreach ($identitas->result() as $ids) {
				$data['wilayah'] = $ids->nama_wilayah;
			}
			$kd_wil = $pecah[3];
			if ($kd_wil != "kab") {
			?>
				<script type="text/javascript" language="javascript">
					alert("Autentikasi Gagal...!!!");
				</script>
			<?php
				echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
			} else {
				$this->Superadmin_model->Hapus_Konten($id, 'kode_konten', 'tbl_konten');
			?>
				<script type="text/javascript">
					javascript: history.go(-1);
				</script>
			<?php
			}
		} else {
			?>
			<script type="text/javascript" language="javascript">
				alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
		}
	}

	function managekomentar()
	{
		$data = array();
		$session = isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar'] : '';
		if ($session != "") {
			$pecah = explode("|", $session);
			$data['nama_user'] = $pecah[1];
			$data['username'] = $pecah[0];
			$data['kode_wil'] = $pecah[2];
			$identitas = $this->Superadmin_model->Identitas_User($pecah[4]);
			foreach ($identitas->result() as $ids) {
				$data['wilayah'] = $ids->nama_wilayah;
			}
			$kd_wil = $pecah[3];
			if ($kd_wil != "kab") {
			?>
				<script type="text/javascript" language="javascript">
					alert("Autentikasi Gagal...!!!");
				</script>
			<?php
				echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
			} else {
				$page = $this->uri->segment(3);
				$limit_konten = 10;
				if (!$page) :
					$ofset_konten = 0;
				else :
					$ofset_konten = $page;
				endif;
				$data["menu_induk_db"] = $this->Superadmin_model->Menu_Induk_Database($pecah[2]);
				$data["konten"] = $this->Superadmin_model->Konten_Per_Kat($pecah[2], $limit_konten, $ofset_konten);
				$tot_hal = $this->Superadmin_model->Total_Konten_Per_Kat($pecah[2]);
				$config['per_page'] = $limit_konten;
				$config['base_url'] = base_url() . '/index.php/superadmin/managekonten';
				$config['total_rows'] = $tot_hal->num_rows();
				$config['uri_segment'] = 3;
				$config['first_link'] = 'Awal';
				$config['last_link'] = 'Akhir';
				$config['next_link'] = 'Selanjutnya';
				$config['prev_link'] = 'Sebelumnya';
				$this->pagination->initialize($config);
				$data["paginator"] = $this->pagination->create_links();
				$this->load->view('admin_super/bg_atas', $data);
				$this->load->view('admin_super/manage_komentar', $data);
			}
		} else {
			?>
			<script type="text/javascript" language="javascript">
				alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
		}
	}

	function kumkomentar()
	{
		$data = array();
		$id = '';
		if ($this->uri->segment(3) === FALSE) {
			$id = $id;
		} else {
			$id = $this->uri->segment(3);
		}
		$session = isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar'] : '';
		if ($session != "") {
			$pecah = explode("|", $session);
			$data['nama_user'] = $pecah[1];
			$data['username'] = $pecah[0];
			$data['kode_wil'] = $pecah[2];
			$identitas = $this->Superadmin_model->Identitas_User($pecah[4]);
			foreach ($identitas->result() as $ids) {
				$data['wilayah'] = $ids->nama_wilayah;
			}
			$kd_wil = $pecah[3];
			if ($kd_wil != "kab") {
			?>
				<script type="text/javascript" language="javascript">
					alert("Autentikasi Gagal...!!!");
				</script>
			<?php
				echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
			} else {
				$data["konten"] = $this->Superadmin_model->Tampil_Konten_Komentar('tbl_konten', $id);
				$data["komentar"] = $this->Superadmin_model->Tampil_Konten_Komentar('tbl_komentar', $id);
				$this->load->view('admin_super/bg_atas', $data);
				$this->load->view('admin_super/kumpulan_komentar', $data);
			}
		} else {
			?>
			<script type="text/javascript" language="javascript">
				alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
		}
	}

	function editkomentar()
	{
		$data = array();
		$id = '';
		if ($this->uri->segment(3) === FALSE) {
			$id = $id;
		} else {
			$id = $this->uri->segment(3);
		}
		$session = isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar'] : '';
		if ($session != "") {
			$pecah = explode("|", $session);
			$data['nama_user'] = $pecah[1];
			$data['username'] = $pecah[0];
			$data['kode_wil'] = $pecah[2];
			$identitas = $this->Superadmin_model->Identitas_User($pecah[4]);
			foreach ($identitas->result() as $ids) {
				$data['wilayah'] = $ids->nama_wilayah;
			}
			$kd_wil = $pecah[3];
			if ($kd_wil != "kab") {
			?>
				<script type="text/javascript" language="javascript">
					alert("Autentikasi Gagal...!!!");
				</script>
			<?php
				echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
			} else {
				$data['scriptmce'] = $this->scripttiny_mce($pecah[2]);
				$data["komen"] = $this->Superadmin_model->Tampil_Detail_Komentar('tbl_komentar', $id);
				$this->load->view('admin_super/bg_atas', $data);
				$this->load->view('admin_super/edit_komentar', $data);
			}
		} else {
			?>
			<script type="text/javascript" language="javascript">
				alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
		}
	}

	function updatekomentar()
	{
		$data = array();
		$session = isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar'] : '';
		if ($session != "") {
			$pecah = explode("|", $session);
			$data['nama_user'] = $pecah[1];
			$data['username'] = $pecah[0];
			$data['kode_wil'] = $pecah[2];
			$identitas = $this->Superadmin_model->Identitas_User($pecah[4]);
			foreach ($identitas->result() as $ids) {
				$data['wilayah'] = $ids->nama_wilayah;
			}
			$kd_wil = $pecah[3];
			if ($kd_wil != "kab") {
			?>
				<script type="text/javascript" language="javascript">
					alert("Autentikasi Gagal...!!!");
				</script>
			<?php
				echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
			} else {
				$datainput['nama_pengirim'] = $this->input->post('nama');
				$datainput['komentar'] = $this->input->post('isi');
				$datainput['email'] = $this->input->post('email');
				$datainput['status'] = $this->input->post('status');
				$datainput['kode_komentar'] = $this->input->post('kd_konten');
				$this->Superadmin_model->Update_Konten('tbl_komentar', $datainput, 'kode_komentar');
			?>
				<script type="text/javascript">
					javascript: history.go(-2);
				</script>
			<?php
			}
		} else {
			?>
			<script type="text/javascript" language="javascript">
				alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
		}
	}

	function hapuskomentar()
	{
		$data = array();
		$id = '';
		if ($this->uri->segment(3) === FALSE) {
			$id = $id;
		} else {
			$id = $this->uri->segment(3);
		}
		$session = isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar'] : '';
		if ($session != "") {
			$pecah = explode("|", $session);
			$data['nama_user'] = $pecah[1];
			$data['username'] = $pecah[0];
			$data['kode_wil'] = $pecah[2];
			$identitas = $this->Superadmin_model->Identitas_User($pecah[4]);
			foreach ($identitas->result() as $ids) {
				$data['wilayah'] = $ids->nama_wilayah;
			}
			$kd_wil = $pecah[3];
			if ($kd_wil != "kab") {
			?>
				<script type="text/javascript" language="javascript">
					alert("Autentikasi Gagal...!!!");
				</script>
			<?php
				echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
			} else {
				$this->Superadmin_model->Hapus_Konten($id, 'kode_komentar', 'tbl_komentar');
			?>
				<script type="text/javascript">
					javascript: history.go(-1);
				</script>
			<?php
			}
		} else {
			?>
			<script type="text/javascript" language="javascript">
				alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
		}
	}

	function managewilayah()
	{
		$data = array();
		$session = isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar'] : '';
		if ($session != "") {
			$pecah = explode("|", $session);
			$data['nama_user'] = $pecah[1];
			$data['username'] = $pecah[0];
			$data['kode_wil'] = $pecah[2];
			$identitas = $this->Superadmin_model->Identitas_User($pecah[4]);
			foreach ($identitas->result() as $ids) {
				$data['wilayah'] = $ids->nama_wilayah;
			}
			$kd_wil = $pecah[3];
			if ($kd_wil != "kab") {
			?>
				<script type="text/javascript" language="javascript">
					alert("Autentikasi Gagal...!!!");
				</script>
			<?php
				echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
			} else {
				$data["wilayah_kab"] = $this->Superadmin_model->Semua_Wilayah_Induk($pecah[2]);
				$this->load->view('admin_super/bg_atas', $data);
				$this->load->view('admin_super/manage_wilayah', $data);
			}
		} else {
			?>
			<script type="text/javascript" language="javascript">
				alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
		}
	}

	function tambahwilayah()
	{
		$data = array();
		$session = isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar'] : '';
		if ($session != "") {
			$pecah = explode("|", $session);
			$data['nama_user'] = $pecah[1];
			$data['username'] = $pecah[0];
			$data['kode_wil'] = $pecah[2];
			$identitas = $this->Superadmin_model->Identitas_User($pecah[4]);
			foreach ($identitas->result() as $ids) {
				$data['wilayah'] = $ids->nama_wilayah;
			}
			$kd_wil = $pecah[3];
			if ($kd_wil != "kab") {
			?>
				<script type="text/javascript" language="javascript">
					alert("Autentikasi Gagal...!!!");
				</script>
			<?php
				echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
			} else {
				$data["menu_parent"] = $this->Superadmin_model->Menu_Parent();
				$this->load->view('admin_super/bg_atas', $data);
				$this->load->view('admin_super/tambah_wilayah', $data);
			}
		} else {
			?>
			<script type="text/javascript" language="javascript">
				alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
		}
	}

	function simpanwilayah()
	{
		$data = array();
		$session = isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar'] : '';
		if ($session != "") {
			$pecah = explode("|", $session);
			$data['nama_user'] = $pecah[1];
			$data['username'] = $pecah[0];
			$data['kode_wil'] = $pecah[2];
			$identitas = $this->Superadmin_model->Identitas_User($pecah[4]);
			foreach ($identitas->result() as $ids) {
				$data['wilayah'] = $ids->nama_wilayah;
			}
			$kd_wil = $pecah[3];
			if ($kd_wil != "kab") {
			?>
				<script type="text/javascript" language="javascript">
					alert("Autentikasi Gagal...!!!");
				</script>
			<?php
				echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
			} else {
				$kd =  $this->input->post('kode');
				$angka =  $this->input->post('angka');
				$datainput["kode_wilayah"] = $kd . '' . $angka;
				$datainput["parent"] = $this->input->post('wilayah');
				$datainput["nama_wilayah"] = $this->input->post('namawil');
				$this->Superadmin_model->Input_Konten('tbl_wilayah', $datainput);
			?>
				<script type="text/javascript">
					javascript: history.go(-2);
				</script>
			<?php
			}
		} else {
			?>
			<script type="text/javascript" language="javascript">
				alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
		}
	}

	function hapuswilayah()
	{
		$data = array();
		$id = '';
		if ($this->uri->segment(3) === FALSE) {
			$id = $id;
		} else {
			$id = $this->uri->segment(3);
		}
		$session = isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar'] : '';
		if ($session != "") {
			$pecah = explode("|", $session);
			$data['nama_user'] = $pecah[1];
			$data['username'] = $pecah[0];
			$data['kode_wil'] = $pecah[2];
			$identitas = $this->Superadmin_model->Identitas_User($pecah[4]);
			foreach ($identitas->result() as $ids) {
				$data['wilayah'] = $ids->nama_wilayah;
			}
			$kd_wil = $pecah[3];
			if ($kd_wil != "kab") {
			?>
				<script type="text/javascript" language="javascript">
					alert("Autentikasi Gagal...!!!");
				</script>
			<?php
				echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
			} else {
				$this->Superadmin_model->Hapus_Konten($id, 'kode_wilayah', 'tbl_wilayah');
			?>
				<script type="text/javascript">
					javascript: history.go(-1);
				</script>
			<?php
			}
		} else {
			?>
			<script type="text/javascript" language="javascript">
				alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
		}
	}

	function manageuser()
	{
		$data = array();
		$session = isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar'] : '';
		if ($session != "") {
			$pecah = explode("|", $session);
			$data['nama_user'] = $pecah[1];
			$data['username'] = $pecah[0];
			$data['kode_wil'] = $pecah[2];
			$identitas = $this->Superadmin_model->Identitas_User($pecah[4]);
			foreach ($identitas->result() as $ids) {
				$data['wilayah'] = $ids->nama_wilayah;
			}
			$kd_wil = $pecah[3];
			if ($kd_wil != "kab") {
			?>
				<script type="text/javascript" language="javascript">
					alert("Autentikasi Gagal...!!!");
				</script>
			<?php
				echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
			} else {
				$page = $this->uri->segment(3);
				$limit_konten = 10;
				if (!$page) :
					$ofset_konten = 0;
				else :
					$ofset_konten = $page;
				endif;
				$data["user"] = $this->Superadmin_model->Tampil_User($limit_konten, $ofset_konten);
				$tot_hal = $this->Superadmin_model->Total_User();
				$config['per_page'] = $limit_konten;
				$config['base_url'] = base_url() . '/index.php/superadmin/manageuser';
				$config['total_rows'] = $tot_hal->num_rows();
				$config['uri_segment'] = 3;
				$config['first_link'] = 'Awal';
				$config['last_link'] = 'Akhir';
				$config['next_link'] = 'Selanjutnya';
				$config['prev_link'] = 'Sebelumnya';
				$this->pagination->initialize($config);
				$data["paginator"] = $this->pagination->create_links();
				$this->load->view('admin_super/bg_atas', $data);
				$this->load->view('admin_super/manage_user', $data);
			}
		} else {
			?>
			<script type="text/javascript" language="javascript">
				alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
		}
	}

	function tambahuser()
	{
		$data = array();
		$session = isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar'] : '';
		if ($session != "") {
			$pecah = explode("|", $session);
			$data['nama_user'] = $pecah[1];
			$data['username'] = $pecah[0];
			$data['kode_wil'] = $pecah[2];
			$identitas = $this->Superadmin_model->Identitas_User($pecah[4]);
			foreach ($identitas->result() as $ids) {
				$data['wilayah'] = $ids->nama_wilayah;
			}
			$kd_wil = $pecah[3];
			if ($kd_wil != "kab") {
			?>
				<script type="text/javascript" language="javascript">
					alert("Autentikasi Gagal...!!!");
				</script>
			<?php
				echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
			} else {
				$data["t_wilayah"] = $this->Superadmin_model->Tampil_Wilayah();
				$this->load->view('admin_super/bg_atas', $data);
				$this->load->view('admin_super/tambah_user', $data);
			}
		} else {
			?>
			<script type="text/javascript" language="javascript">
				alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
		}
	}

	function simpanuser()
	{
		$data = array();
		$datainput = array();
		$session = isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar'] : '';
		if ($session != "") {
			$pecah = explode("|", $session);
			$data['nama_user'] = $pecah[1];
			$data['username'] = $pecah[0];
			$data['kode_wil'] = $pecah[2];
			$identitas = $this->Superadmin_model->Identitas_User($pecah[4]);
			foreach ($identitas->result() as $ids) {
				$data['wilayah'] = $ids->nama_wilayah;
			}
			$kd_wil = $pecah[3];
			if ($kd_wil != "kab") {
			?>
				<script type="text/javascript" language="javascript">
					alert("Autentikasi Gagal...!!!");
				</script>
			<?php
				echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
			} else {
				$kd =  $this->input->post('kode');
				$angka =  $this->input->post('angka');
				$datainput["kode_user"] = $kd . '' . $angka;
				$datainput["kode_wilayah"] = $this->input->post('wilayah');
				$datainput["nama_user"] =  $this->input->post('nama');
				$datainput["username"] = $this->input->post('username');
				$datainput["password"] = $this->input->post('password');
				$this->Superadmin_model->Input_User($datainput);
			?>
				<script type="text/javascript">
					javascript: history.go(-2);
				</script>
			<?php
			}
		} else {
			?>
			<script type="text/javascript" language="javascript">
				alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
		}
	}

	function edituser()
	{
		$data = array();
		$id = '';
		if ($this->uri->segment(3) === FALSE) {
			$id = $id;
		} else {
			$id = $this->uri->segment(3);
		}
		$session = isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar'] : '';
		if ($session != "") {
			$pecah = explode("|", $session);
			$data['nama_user'] = $pecah[1];
			$data['username'] = $pecah[0];
			$data['kode_wil'] = $pecah[2];
			$identitas = $this->Superadmin_model->Identitas_User($pecah[4]);
			foreach ($identitas->result() as $ids) {
				$data['wilayah'] = $ids->nama_wilayah;
			}
			$kd_wil = $pecah[3];
			if ($kd_wil != "kab") {
			?>
				<script type="text/javascript" language="javascript">
					alert("Autentikasi Gagal...!!!");
				</script>
			<?php
				echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
			} else {
				$data["komen"] = $this->Superadmin_model->Edit_User($id);
				$this->load->view('admin_super/bg_atas', $data);
				$this->load->view('admin_super/edit_user', $data);
			}
		} else {
			?>
			<script type="text/javascript" language="javascript">
				alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
		}
	}

	function updateuser()
	{
		$data = array();
		$session = isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar'] : '';
		if ($session != "") {
			$pecah = explode("|", $session);
			$data['nama_user'] = $pecah[1];
			$data['username'] = $pecah[0];
			$data['kode_wil'] = $pecah[2];
			$identitas = $this->Superadmin_model->Identitas_User($pecah[4]);
			foreach ($identitas->result() as $ids) {
				$data['wilayah'] = $ids->nama_wilayah;
			}
			$kd_wil = $pecah[3];
			if ($kd_wil != "kab") {
			?>
				<script type="text/javascript" language="javascript">
					alert("Autentikasi Gagal...!!!");
				</script>
			<?php
				echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
			} else {
				$pass = $this->input->post('password');
				if ($pass == "") {
					$datainput['nama_user'] = $this->input->post('nama');
					$datainput['username'] = $this->input->post('username');
					$datainput['kode_user'] = $this->input->post('kd_user');
					$this->Superadmin_model->Update_User($datainput);
				} else {
					$datainput['nama_user'] = $this->input->post('nama');
					$datainput['username'] = $this->input->post('username');
					$datainput['kode_user'] = $this->input->post('kd_user');
					$datainput['password'] = $this->input->post('password');
					$this->Superadmin_model->Update_User_Password($datainput);
				}
			?>
				<script type="text/javascript">
					javascript: history.go(-2);
				</script>
			<?php
			}
		} else {
			?>
			<script type="text/javascript" language="javascript">
				alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
		}
	}

	function hapususer()
	{
		$data = array();
		$id = '';
		if ($this->uri->segment(3) === FALSE) {
			$id = $id;
		} else {
			$id = $this->uri->segment(3);
		}
		$session = isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar'] : '';
		if ($session != "") {
			$pecah = explode("|", $session);
			$data['nama_user'] = $pecah[1];
			$data['username'] = $pecah[0];
			$data['kode_wil'] = $pecah[2];
			$identitas = $this->Superadmin_model->Identitas_User($pecah[4]);
			foreach ($identitas->result() as $ids) {
				$data['wilayah'] = $ids->nama_wilayah;
			}
			$kd_wil = $pecah[3];
			if ($kd_wil != "kab") {
			?>
				<script type="text/javascript" language="javascript">
					alert("Autentikasi Gagal...!!!");
				</script>
			<?php
				echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
			} else {
				$this->Superadmin_model->Hapus_Konten($id, 'kode_user', 'tbl_user');
			?>
				<script type="text/javascript">
					javascript: history.go(-1);
				</script>
			<?php
			}
		} else {
			?>
			<script type="text/javascript" language="javascript">
				alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
		}
	}

	function managesitemap()
	{
		$data = array();
		$session = isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar'] : '';
		if ($session != "") {
			$pecah = explode("|", $session);
			$data['nama_user'] = $pecah[1];
			$data['username'] = $pecah[0];
			$data['kode_wil'] = $pecah[2];
			$identitas = $this->Superadmin_model->Identitas_User($pecah[4]);
			foreach ($identitas->result() as $ids) {
				$data['wilayah'] = $ids->nama_wilayah;
			}
			$kd_wil = $pecah[3];
			if ($kd_wil != "kab") {
			?>
				<script type="text/javascript" language="javascript">
					alert("Autentikasi Gagal...!!!");
				</script>
			<?php
				echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
			} else {
				$data["wilayah_kab"] = $this->Superadmin_model->Semua_Sitemap_Induk($pecah[2]);
				$this->load->view('admin_super/bg_atas', $data);
				$this->load->view('admin_super/manage_sitemap', $data);
			}
		} else {
			?>
			<script type="text/javascript" language="javascript">
				alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
		}
	}

	function tambahsitemap()
	{
		$data = array();
		$session = isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar'] : '';
		if ($session != "") {
			$pecah = explode("|", $session);
			$data['nama_user'] = $pecah[1];
			$data['username'] = $pecah[0];
			$data['kode_wil'] = $pecah[2];
			$identitas = $this->Superadmin_model->Identitas_User($pecah[4]);
			foreach ($identitas->result() as $ids) {
				$data['wilayah'] = $ids->nama_wilayah;
			}
			$kd_wil = $pecah[3];
			if ($kd_wil != "kab") {
			?>
				<script type="text/javascript" language="javascript">
					alert("Autentikasi Gagal...!!!");
				</script>
			<?php
				echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
			} else {
				$data["menu_parent"] = $this->Superadmin_model->Sitemap_Parent();
				$this->load->view('admin_super/bg_atas', $data);
				$this->load->view('admin_super/tambah_sitemap', $data);
			}
		} else {
			?>
			<script type="text/javascript" language="javascript">
				alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
		}
	}

	function simpansitemap()
	{
		$data = array();
		$datainput = array();
		$session = isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar'] : '';
		if ($session != "") {
			$pecah = explode("|", $session);
			$data['nama_user'] = $pecah[1];
			$data['username'] = $pecah[0];
			$data['kode_wil'] = $pecah[2];
			$identitas = $this->Superadmin_model->Identitas_User($pecah[4]);
			foreach ($identitas->result() as $ids) {
				$data['wilayah'] = $ids->nama_wilayah;
			}
			$kd_wil = $pecah[3];
			if ($kd_wil != "kab") {
			?>
				<script type="text/javascript" language="javascript">
					alert("Autentikasi Gagal...!!!");
				</script>
			<?php
				echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
			} else {
				$kd = $this->input->post('kode');
				$angka1 = $this->input->post('angka1');
				$angka2 = $this->input->post('angka2');
				if ($angka1 == "") {
					$datainput["kode_sitemap"] = $kd;
				} else if ($angka2 == "") {
					$datainput["kode_sitemap"] = $kd . '_' . $angka1;
				} else {
					$datainput["kode_sitemap"] = $kd . '_' . $angka1 . '_' . $angka2;
				}
				$datainput["parent"] = $this->input->post('wilayah');
				$datainput["judul_sitemap"] = $this->input->post('namawil');
				$this->Superadmin_model->Input_Konten('tbl_sitemap', $datainput);
			?>
				<script type="text/javascript">
					javascript: history.go(-2);
				</script>
			<?php
			}
		} else {
			?>
			<script type="text/javascript" language="javascript">
				alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
		}
	}

	function hapussitemap()
	{
		$data = array();
		$id = '';
		if ($this->uri->segment(3) === FALSE) {
			$id = $id;
		} else {
			$id = $this->uri->segment(3);
		}
		$session = isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar'] : '';
		if ($session != "") {
			$pecah = explode("|", $session);
			$data['nama_user'] = $pecah[1];
			$data['username'] = $pecah[0];
			$data['kode_wil'] = $pecah[2];
			$identitas = $this->Superadmin_model->Identitas_User($pecah[4]);
			foreach ($identitas->result() as $ids) {
				$data['wilayah'] = $ids->nama_wilayah;
			}
			$kd_wil = $pecah[3];
			if ($kd_wil != "kab") {
			?>
				<script type="text/javascript" language="javascript">
					alert("Autentikasi Gagal...!!!");
				</script>
			<?php
				echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
			} else {
				$this->Superadmin_model->Hapus_Konten($id, 'kode_sitemap', 'tbl_sitemap');
			?>
				<script type="text/javascript">
					javascript: history.go(-1);
				</script>
			<?php
			}
		} else {
			?>
			<script type="text/javascript" language="javascript">
				alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
			</script>
<?php
			echo "<meta http-equiv='refresh' content='0; url=" . base_url() . "index.php/admin/loginpage'>";
		}
	}

	//Function TinyMce------------------------------------------------------------------
	private function scripttiny_mce($selectcategory = null)
	{
		return '
<!-- TinyMCE -->
<script type="text/javascript" src="' . base_url() . 'jscripts/tiny_mce/tiny_mce_src.js"></script>
<script type="text/javascript">
	tinyMCE.init({
		// General options
		mode : "textareas",
		theme : "advanced",
		plugins : "pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave",

		// Theme options
		theme_advanced_buttons1 : "save,newdocument,|,bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
		theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,anchor,image,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",
		theme_advanced_buttons3 : "tablecontrols,|,hr,removeformat,visualaid,|,sub,sup,|,charmap,emotions,iespell,media,advhr,|,print,|,ltr,rtl,|,fullscreen",
		theme_advanced_buttons4 : "insertlayer,moveforward,movebackward,absolute,|,styleprops,|,cite,abbr,acronym,del,ins,attribs,|,visualchars,nonbreaking,template,pagebreak,restoredraft",
		theme_advanced_toolbar_location : "top",
		theme_advanced_toolbar_align : "left",
		theme_advanced_statusbar_location : "bottom",
		theme_advanced_resizing : true,

		// Example content CSS (should be your site CSS)
		//content_css : "' . base_url() . 'system/application/views/themes/css/BrightSide.css",

		// Drop lists for link/image/media/template dialogs
		//"' . base_url() . 'media/lists/image_list.js"
		template_external_list_url : "lists/template_list.js",
		external_link_list_url : "lists/link_list.js",
		external_image_list_url : "' . base_url() . 'index.php/superadmin/media_list/' . $selectcategory . '",
		media_external_list_url : "lists/media_list.js",

		// Style formats
		style_formats : [
			{title : \'Bold text\', inline : \'b\'},
			{title : \'Red text\', inline : \'span\', styles : {color : \'#ff0000\'}},
			{title : \'Red header\', block : \'h1\', styles : {color : \'#ff0000\'}},
			{title : \'Example 1\', inline : \'span\', classes : \'example1\'},
			{title : \'Example 2\', inline : \'span\', classes : \'example2\'},
			{title : \'Table styles\'},
			{title : \'Table row 1\', selector : \'tr\', classes : \'tablerow1\'}
		],
		//disabled relative urls
		relative_urls : false,
		
		// Replace values for the template plugin
		template_replace_values : {
			username : "Some User",
			staffid : "991234"
		}
	});
</script>';
	}
}
?>