<?php

class Kab extends Controller {

	function Kab()
	{
		parent::Controller();
		$this->load->helper(array('form','url', 'text_helper','date'));
		$this->load->database();
		$this->load->library(array('breadcrumb','user_agent'));
		$this->load->model('Web_model');
		session_start();	
	}
	
	function index()
	{
		$data=array();
		
		$data["counter_pengunjung"] = $this->Web_model->Counter_Pengunjung();
		setcookie("blog_desa", "blog_desa_dikunjungi", time() + 900 * 24);
		if (!isset($_COOKIE["blog_desa"])) {
			$this->Web_model->Update_Counter_Pengunjung();
		}
		$data["browser"] = $this->agent->browser().' '.$this->agent->version();
		$data["os"] = $this->agent->platform();
		
		$data['hal_aktif']=$this->uri->segment(4);
		$this->breadcrumb->add('Beranda','pages/manage/add');
		$data['nm_site'] = "Beranda";
		$data["menu_default"] = $this->Web_model->Menu_Default('kab01');
		$data['sub_menu'] = $this->Web_model->Sub_Menu_Default($data['hal_aktif'],'kab01');
		$data["wil_kec"] = $this->Web_model->Data_Wilayah('kab01');
		$this->load->view('main_web/bg_atas',$data);
		$this->load->view('main_web/bg_kiri');
		$this->load->view('main_web/bg_kanan',$data);
		$this->load->view('main_web/bg_bawah');
	}
	
	function subkonten()
	{
		$data=array();
		$hal_aktif=$this->uri->segment(4);
		$hal_aktif2=$this->uri->segment(3);
		$data["counter_pengunjung"] = $this->Web_model->Counter_Pengunjung();
		setcookie("blog_desa", "blog_desa_dikunjungi", time() + 900 * 24);
		if (!isset($_COOKIE["blog_desa"])) {
			$this->Web_model->Update_Counter_Pengunjung();
		}
		$data["browser"] = $this->agent->browser().' '.$this->agent->version();
		$data["os"] = $this->agent->platform();
		
		$data2=array();
		$pecah=array();
		$data['hal_aktif']=$this->uri->segment(4);
		$pecah=explode("_",$data['hal_aktif']);
		$data2['hal0'] = $pecah[0];
		$data['sub_menu'] = $this->Web_model->Sub_Menu_Default($data['hal_aktif'],'kab01');
		$q = $this->Web_model->Sitemap_Aktif($data2['hal0']);
		foreach($q->result() as $m)
		{
			$nm_site2 = $m->judul_sitemap;
			$id_site = $m->kode_sitemap;
			$link_seo = str_replace(" ","-",$nm_site2);
		}
			
		$q2 = $this->Web_model->Sitemap_Aktif($data['hal_aktif']);
		foreach($q2->result() as $m2)
		{
			$data['nm_site'] = $m2->judul_sitemap;
			$id_site2 = $m2->kode_sitemap;
		}
		
		$kd_map = $pecah[0].'_'.$pecah[1];
		$q3 = $this->Web_model->Sitemap_Aktif($kd_map);
		foreach($q3->result() as $m3)
		{
			$nm_site3 = $m3->judul_sitemap;
			$id_site3 = $m3->kode_sitemap;
			$link_seo2 = str_replace(" ","-",$nm_site3);
		}
		$this->breadcrumb->add($nm_site2,'kab/mainkonten/kab01/'.$id_site.'/'.$link_seo)->add($nm_site3,'kab/konten/kab01/'.$kd_map.'/'.$link_seo2)->add($data['nm_site'],
		'pages/manage/add');
		$data['kumpulan_konten'] = $this->Web_model->Kumpulan_Konten_Kec_Mainkonten($hal_aktif2,$hal_aktif);
		$data["menu_default"] = $this->Web_model->Menu_Default('kab01');
		$data["wil_kec"] = $this->Web_model->Data_Wilayah('kab01');
		$this->load->view('main_web/bg_atas',$data);
		$this->load->view('main_web/bg_kiri');
		$this->load->view('main_web/subkonten',$data);
		$this->load->view('main_web/bg_bawah');
	}
	
	function konten()
	{
		$data=array();
		$hal_aktif=$this->uri->segment(4);
		$hal_aktif2=$this->uri->segment(3);
		$data["counter_pengunjung"] = $this->Web_model->Counter_Pengunjung();
		setcookie("blog_desa", "blog_desa_dikunjungi", time() + 900 * 24);
		if (!isset($_COOKIE["blog_desa"])) {
			$this->Web_model->Update_Counter_Pengunjung();
		}
		$data["browser"] = $this->agent->browser().' '.$this->agent->version();
		$data["os"] = $this->agent->platform();
		
		$data2=array();
		$pecah=array();
		$data['hal_aktif']=$this->uri->segment(4);
		$pecah=explode("_",$data['hal_aktif']);
		$data2['hal0'] = $pecah[0];
		$data['sub_menu'] = $this->Web_model->Sub_Menu_Default($data['hal_aktif'],'kab01');
		$q = $this->Web_model->Sitemap_Aktif($data2['hal0']);
		foreach($q->result() as $m)
		{
			$nm_site2 = $m->judul_sitemap;
			$id_site = $m->kode_sitemap;
			$link_seo = str_replace(" ","-",$nm_site2);
		}
			
		$q2 = $this->Web_model->Sitemap_Aktif($data['hal_aktif']);
		foreach($q2->result() as $m2)
		{
			$data['nm_site'] = $m2->judul_sitemap;
			$id_site2 = $m2->kode_sitemap;
		}
		$data['kumpulan_konten'] = $this->Web_model->Kumpulan_Konten_Kec_Mainkonten($hal_aktif2,$hal_aktif);
		$this->breadcrumb->add($nm_site2,'kab/mainkonten/kab01/'.$id_site.'/'.$link_seo)->add($data['nm_site'],'pages/manage/add');
		$data["menu_default"] = $this->Web_model->Menu_Default('kab01');
		$data["wil_kec"] = $this->Web_model->Data_Wilayah('kab01');
		$this->load->view('main_web/bg_atas',$data);
		$this->load->view('main_web/bg_kiri');
		$this->load->view('main_web/konten',$data);
		$this->load->view('main_web/bg_bawah');
	}
	
	function mainkonten()
	{
		$data=array();
		$hal_aktif=$this->uri->segment(4);
		$hal_aktif2=$this->uri->segment(3);
		$data["counter_pengunjung"] = $this->Web_model->Counter_Pengunjung();
		setcookie("blog_desa", "blog_desa_dikunjungi", time() + 900 * 24);
		if (!isset($_COOKIE["blog_desa"])) {
			$this->Web_model->Update_Counter_Pengunjung();
		}
		$data["browser"] = $this->agent->browser().' '.$this->agent->version();
		$data["os"] = $this->agent->platform();
		
		$data3=array();
		$pecah=array();
		$data['hal_aktif']=$this->uri->segment(4);
		$q = $this->Web_model->Sitemap_Aktif($data['hal_aktif']);
		foreach($q->result() as $m)
		{
			$data['nm_site'] = $m->judul_sitemap;
		}
		$data['kumpulan_konten'] = $this->Web_model->Kumpulan_Konten_Kec_Mainkonten($hal_aktif2,$hal_aktif);
		$data['sub_menu'] = $this->Web_model->Sub_Menu_Default($data['hal_aktif'],'kab01');
		$this->breadcrumb->add($data['nm_site'],'pages/manage/add');
		$data["menu_default"] = $this->Web_model->Menu_Default('kab01');
		$data["wil_kec"] = $this->Web_model->Data_Wilayah('kab01');
		$this->load->view('main_web/bg_atas',$data);
		$this->load->view('main_web/bg_kiri');
		$this->load->view('main_web/mainkonten',$data);
		$this->load->view('main_web/bg_bawah');
	}
	
	function isi()
	{
		$data=array();
		$hal_aktif=$this->uri->segment(4);
		$hal_aktif2=$this->uri->segment(3);
		$hal_aktif3=$this->uri->segment(5);
		$data["counter_pengunjung"] = $this->Web_model->Counter_Pengunjung();
		setcookie("blog_desa", "blog_desa_dikunjungi", time() + 900 * 24);
		if (!isset($_COOKIE["blog_desa"])) {
			$this->Web_model->Update_Counter_Pengunjung();
		}
		$data["browser"] = $this->agent->browser().' '.$this->agent->version();
		$data["os"] = $this->agent->platform();
		
		$data3=array();
		$pecah=array();
		$data['hal_aktif']=$this->uri->segment(4);
		$q = $this->Web_model->Sitemap_Aktif($data['hal_aktif']);
		foreach($q->result() as $m)
		{
			$data['nm_site'] = $m->judul_sitemap;
		}
		$data['detail_konten'] = $this->Web_model->Detail_Konten($hal_aktif2,$hal_aktif,$hal_aktif3);
		$data["tampil_komentar"] = $this->Web_model->Tampil_Komentar_Per_Konten($hal_aktif3);
		$data['tot_komentar'] = $data["tampil_komentar"]->num_rows();
		$data['sub_menu'] = $this->Web_model->Sub_Menu_Default($data['hal_aktif'],'kab01');
		$this->breadcrumb->add($data['nm_site'],'pages/manage/add');
		$data["menu_default"] = $this->Web_model->Menu_Default('kab01');
		$data["wil_kec"] = $this->Web_model->Data_Wilayah('kab01');
		$this->load->view('main_web/bg_atas',$data);
		$this->load->view('main_web/bg_kiri');
		$this->load->view('main_web/isi',$data);
		$this->load->view('main_web/bg_bawah');
	}
	
	function kirimkomentar()
	{
		$data=array();
		$tgl = " %d-%m-%Y";
		$time = time();
		$data['kode_konten'] = $this->input->post('kd_konten');
		$data['nama_pengirim'] = $this->input->post('nama_pengirim');
		$data['komentar'] = $this->input->post('komentar_pengirim');
		$data['email'] = $this->input->post('email_pengirim');
		$data['tgl_posting'] = mdate($tgl,$time);
		$data['status'] = "0";
		$q = $this->Web_model->Input_Data_Biasa('tbl_komentar',$data);?>
		<script type="text/javascript">
			alert('Komentar anda telah terkirim.\nKomentar anda akan kami proses terlebih dahulu sebelum ditampilkan.');
			javascript:history.go(-1);
		</script>
		<?php
	}
}