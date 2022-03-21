<?php

class Admin extends Controller {

	function Admin()
	{
		parent::Controller();
		$this->load->helper(array('form','url', 'text_helper','date'));
		$this->load->database();
		$this->load->library(array('Pagination','image_lib'));
		$this->load->plugin();
		$this->load->model(array('Web_model', 'Admin_model'));
		session_start();
	}
	function index()
	{
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!=""){
		$pecah=explode("|",$session);
		$kd_wil=$pecah[3];
			if($kd_wil=="kab")
			{
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/superadmin'>";
			}
			else if($kd_wil=="kec")
			{
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/adminkec'>";
			}
			else if($kd_wil=="des")
			{
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admindes'>";
			}
			else{
			?>
			<script type="text/javascript" language="javascript">
			alert("Anda tidak berhak masuk ke Control Panel Admin...!!!");
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/loginpage'>";
			}
		}
		else{
			?>
			<script type="text/javascript" language="javascript">
				alert("Anda belum Log In...!!!\nAnda harus Log In untuk mengakses halaman ini...!!!");
			</script>
		<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/loginpage'>";
		}
	}
	
	function loginpage()
	{
		$data = array();
		$session=isset($_SESSION['username_belajar']) ? $_SESSION['username_belajar']:'';
		if($session!="")
		{
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin'>";
		}
		else
		{
			$this->load->view('admin/bg_login');
		}
	}
	
	function login()
	{
		$username = $this->input->post('username');
		$pwd = $this->input->post('password');
		$hasil = $this->Admin_model->Data_Login($username,$pwd);
		if (count($hasil->result_array())>0){
			foreach($hasil->result() as $items)
			{
				$kd_wil = substr($items->kode_wilayah,0,3);
				$session_username=$items->username."|".$items->nama_user."|".$items->kode_wilayah."|".$kd_wil."|".$items->kode_user;
			}
			$_SESSION['username_belajar']=$session_username;
			if($kd_wil=="kab")
			{
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/superadmin'>";
			}
			else if($kd_wil=="kec")
			{
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/adminkec'>";
			}
			else if($kd_wil=="des")
			{
				echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admindes'>";
			}
		}
		else{
			?>
			<script type="text/javascript">
			alert("Username atau Password Yang Anda Masukkan Salah..!!!");			
			</script>
			<?php
			echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/loginpage'>";
		}
	}
	
	function logout()
	{
		session_destroy();
		echo "<meta http-equiv='refresh' content='0; url=".base_url()."index.php/admin/loginpage'>";
	}
}









?>
