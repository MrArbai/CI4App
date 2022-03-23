<?php
class Admindesa_model extends Model
	{
		function Admindesa_model()
		{
			parent::Model();
		}
		
		function Identitas_User($kd_user)
		{
			$query=$this->db->query("select * from tbl_user left join tbl_wilayah on tbl_user.kode_wilayah=tbl_wilayah.kode_wilayah where kode_user='$kd_user'");
			return $query;
		}
		function Semua_Menu_Induk($id_wil)
		{
			$q=$this->db->query("select * from tbl_sitemap where parent='induk'");
			return $q;
		}
		function Semua_Menu_Anak($kd_parent)
		{
			$q=$this->db->query("select * from tbl_sitemap where parent='$kd_parent'");
			return $q;
		}
		function Menu_Induk_Database($kd_wil)
		{
			$q=$this->db->query("select * from tbl_menu_per_daerah left join (tbl_wilayah,tbl_sitemap) on tbl_menu_per_daerah.kode_wilayah=tbl_wilayah.kode_wilayah and 
			tbl_menu_per_daerah.kode_sitemap=tbl_sitemap.kode_sitemap where status=1 and tbl_menu_per_daerah.kode_wilayah='$kd_wil' and tbl_sitemap.parent='induk'
			order by tbl_menu_per_daerah.kode_sitemap ASC");
			return $q;
		}
		function Semua_Sitemap()
		{
			$q=$this->db->query("select * from tbl_sitemap");
			return $q;
		}
		function Update_Menu($query,$query_delete)
		{
			$this->db->query($query_delete);
			$this->db->query($query);
		}
		function Total_Konten_Per_Kat($kd_wil)
		{
			$q=$this->db->query("select * from tbl_konten left join (tbl_wilayah,tbl_sitemap,tbl_user) on tbl_konten.kode_wilayah=tbl_wilayah.kode_wilayah and 
			tbl_konten.kode_sitemap=tbl_sitemap.kode_sitemap and tbl_konten.kode_user=tbl_user.kode_user where tbl_konten.kode_wilayah='$kd_wil'");
			return $q;
		}
		function Konten_Per_Kat($kd_wil,$limit,$offset)
		{
			$q=$this->db->query("select * from tbl_konten left join (tbl_wilayah,tbl_sitemap,tbl_user) on tbl_konten.kode_wilayah=tbl_wilayah.kode_wilayah and 
			tbl_konten.kode_sitemap=tbl_sitemap.kode_sitemap and tbl_konten.kode_user=tbl_user.kode_user where tbl_konten.kode_wilayah='$kd_wil' LIMIT $offset,$limit");
			return $q;
		}	
			
		function getDataMedia($kd_wil) 
		{
			$query=$this->db->query("select * from tbl_media where kode_wilayah='$kd_wil'");
			return $query;
		}
		function Input_Konten($tabel,$data)
		{
			$s=$this->db->insert($tabel,$data);
			return $s;
		}
		
		function Simpan_Gambar($datainsert)
		{
			$this->db->insert('tbl_media',$datainsert);
		}
		
		function Hapus_Media($id)
		{
			$this->db->where('kode_media',$id );
			$this->db->delete('tbl_media');
		}
		function Edit_Konten($kd_konten)
		{
			$q=$this->db->query("select * from tbl_konten left join (tbl_wilayah,tbl_sitemap,tbl_user) on tbl_konten.kode_wilayah=tbl_wilayah.kode_wilayah and 
			tbl_konten.kode_sitemap=tbl_sitemap.kode_sitemap and tbl_konten.kode_user=tbl_user.kode_user where tbl_konten.kode_konten='$kd_konten'");
			return $q;
		}
		
		function Update_Konten($tabel,$isi,$seleksi)
		{
			$this->db->where($seleksi,$isi[$seleksi]);
			$this->db->update($tabel,$isi);
		}
		
		function Hapus_Konten($id,$seleksi,$tabel)
		{
			$this->db->where($seleksi,$id);
			$this->db->delete($tabel);
		}
		function Hitung_Komentar($kd_konten)
		{
			$q=$this->db->query("select count(kode_konten) as jum from tbl_komentar where kode_konten='$kd_konten'");
			return $q;
		}
		function Tampil_Konten_Komentar($tabel,$kd_konten)
		{
			$q=$this->db->query("select * from $tabel where kode_konten='$kd_konten'");
			return $q;
		}
		function Tampil_Detail_Komentar($tabel,$kd_komentar)
		{
			$q=$this->db->query("select * from tbl_komentar where kode_komentar='$kd_komentar'");
			return $q;
		}
		function Update_Akun_Password($in)
		{
			$q=$this->db->query("update tbl_user set nama_user='".$in['nama_user']."', username='".$in['username']."', password=md5( '".$in['password']."') where kode_user='".$in[
			'kode_user']."'");
			return $q;
		}
		function Update_Akun($in)
		{
			$q=$this->db->query("update tbl_user set nama_user='".$in['nama_user']."', username='".$in['username']."' where kode_user='".$in['kode_user']."'");
			return $q;
		}	
		function Edit_User($kd_user)
		{
			$q=$this->db->query("select * from tbl_user left join tbl_wilayah on tbl_user.kode_wilayah=tbl_wilayah.kode_wilayah where kode_user='$kd_user'");
			return $q;
		}
	}
?>
