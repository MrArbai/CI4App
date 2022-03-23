<?php
class Admin_model extends Model
	{
		function Admin_model()
		{
			parent::Model();
		}
		
		function Data_Login($user,$pass)
		{
			$user_bersih=mysqli_real_escape_string($user);
			$pass_bersih=mysqli_real_escape_string($pass);
			$query=$this->db->query("select * from tbl_user where username='$user_bersih' and password=md5('$pass_bersih')");
			return $query;
		}
	}
