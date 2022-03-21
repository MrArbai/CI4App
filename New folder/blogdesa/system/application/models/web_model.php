<?php
class Web_model extends Model
	{
		function Web_model()
		{
			parent::Model();
		}
		function Menu_Default($id_wil)
		{
			$q=$this->db->query("select * from tbl_menu_per_daerah left join (tbl_wilayah,tbl_sitemap) on tbl_menu_per_daerah.kode_wilayah=tbl_wilayah.kode_wilayah and 
			tbl_menu_per_daerah.kode_sitemap=tbl_sitemap.kode_sitemap where tbl_menu_per_daerah.status='1' and tbl_sitemap.parent='induk' and 
			tbl_menu_per_daerah.kode_wilayah='$id_wil' order by tbl_menu_per_daerah.kode_sitemap ASC");
			return $q;
		}
		function Sub_Menu_Default($parent_induk,$kode_wil)
		{
			$q=$this->db->query("select * from tbl_menu_per_daerah left join (tbl_wilayah,tbl_sitemap) on tbl_menu_per_daerah.kode_wilayah=tbl_wilayah.kode_wilayah and 
			tbl_menu_per_daerah.kode_sitemap=tbl_sitemap.kode_sitemap where status=1 and tbl_sitemap.parent='$parent_induk' and tbl_menu_per_daerah.kode_wilayah='$kode_wil'");
			return $q;
		}
		function Menu_Opsional($kd_wil)
		{
			$q=$this->db->query("select * from tbl_menu_per_daerah left join (tbl_wilayah,tbl_sitemap) on tbl_menu_per_daerah.kode_wilayah=tbl_wilayah.kode_wilayah and 
			tbl_menu_per_daerah.kode_sitemap=tbl_sitemap.kode_sitemap where status=1 and tbl_menu_per_daerah.kode_wilayah='$kd_wil' and tbl_sitemap.parent='induk'
			order by tbl_menu_per_daerah.kode_sitemap ASC");
			return $q;
		}
		function Sub_Menu_Opsional($parent_induk,$kode_wil)
		{
			$q=$this->db->query("select * from tbl_menu_per_daerah left join (tbl_wilayah,tbl_sitemap) on tbl_menu_per_daerah.kode_wilayah=tbl_wilayah.kode_wilayah and 
			tbl_menu_per_daerah.kode_sitemap=tbl_sitemap.kode_sitemap where status=1 and tbl_sitemap.parent='$parent_induk' and tbl_menu_per_daerah.kode_wilayah='$kode_wil'
			order by tbl_menu_per_daerah.kode_sitemap ASC");
			return $q;
		}
		function Data_Wilayah($parent_induk)
		{
			$q=$this->db->query("select * from tbl_wilayah where parent='$parent_induk'");
			return $q;
		}
		function Sitemap_Aktif($id_sitemap)
		{
			$q=$this->db->query("select * from tbl_sitemap where kode_sitemap='$id_sitemap'");
			return $q;
		}
		function Wilayah_Aktif($id_wil)
		{
			$q=$this->db->query("select * from tbl_wilayah where kode_wilayah='$id_wil'");
			return $q;
		}
		
		/* diblok dulu
		function Kumpulan_Konten_Subkonten($kode_wil,$kode_sitemap)
		{
			$q=$this->db->query("select * from tbl_konten left join (tbl_wilayah,tbl_sitemap,tbl_user) on tbl_konten.kode_wilayah=tbl_wilayah.kode_wilayah 
			and tbl_konten.kode_sitemap=tbl_sitemap.kode_sitemap and 
			tbl_konten.kode_user=tbl_user.kode_user where tbl_konten.kode_wilayah='$kode_wil' and tbl_konten.kode_sitemap='$kode_sitemap'");
			return $q;
		}
		*/
		
		function Kumpulan_Konten_Mainkonten($kode_sitemap)
		{
			$q=$this->db->query("select * from tbl_konten left join (tbl_wilayah,tbl_sitemap,tbl_user) on tbl_konten.kode_wilayah=tbl_wilayah.kode_wilayah and 
			tbl_konten.kode_sitemap=tbl_sitemap.kode_sitemap and tbl_konten.kode_user=tbl_user.kode_user where tbl_konten.kode_sitemap like '%$kode_sitemap%'");
			return $q;
		}
		function Kumpulan_Konten_Kec_Mainkonten($kode_parent,$kode_sitemap)
		{
			$q=$this->db->query("SELECT * FROM `tbl_konten` left join (tbl_wilayah,tbl_sitemap,tbl_user) on tbl_konten.kode_wilayah=tbl_wilayah.kode_wilayah and 
			tbl_konten.kode_sitemap=tbl_sitemap.kode_sitemap and tbl_konten.kode_user=tbl_user.kode_user where tbl_konten.kode_wilayah='$kode_parent' and tbl_konten.kode_sitemap like 
			'%$kode_sitemap%'");
			return $q;
		}
		function Detail_Konten($kode_wil,$kode_sitemap,$kode_konten)
		{
			$q=$this->db->query("select * from tbl_konten left join (tbl_sitemap,tbl_user) on tbl_konten.kode_sitemap=tbl_sitemap.kode_sitemap and 
			tbl_konten.kode_user=tbl_user.kode_user where tbl_konten.kode_wilayah='$kode_wil' and tbl_konten.kode_sitemap='$kode_sitemap' and kode_konten='$kode_konten'");
			return $q;
		}
		function Tampil_Komentar_Per_Konten($kode_konten)
		{
			$q=$this->db->query("select * from tbl_komentar where kode_konten='$kode_konten' and status='1'");
			return $q;
		}
		function Input_Data_Biasa($tabel,$data)
		{
			$s=$this->db->insert($tabel,$data);
			return $s;
		}
		function Update_Counter_Pengunjung()
		{
			$query_update=$this->db->query("update tbl_setting set isi_setting=isi_setting+1 where tipe_setting='counter'");
			return $query_update;
		}
		function Counter_Pengunjung()
		{
			$q=$this->db->query("select * from tbl_setting where tipe_setting='counter'");
			return $q;
		}
		
		
	}
?>
