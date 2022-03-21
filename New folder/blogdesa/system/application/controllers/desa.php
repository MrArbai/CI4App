<?php

class Desa extends Controller {

	function Desa()
	{
		parent::Controller();
		$this->load->helper(array('form','url', 'text_helper','date'));
		$this->load->database();
		$this->load->library(array('breadcrumb','user_agent'));
		$this->load->model('Web_model');
		session_start();	
	}
	
	function mainkonten()
	{
		$data=array();
		
		$data["counter_pengunjung"] = $this->Web_model->Counter_Pengunjung();
		setcookie("blog_desa", "blog_desa_dikunjungi", time() + 900 * 24);
		if (!isset($_COOKIE["blog_desa"])) {
			$this->Web_model->Update_Counter_Pengunjung();
		}
		$data["browser"] = $this->agent->browser().' '.$this->agent->version();
		$data["os"] = $this->agent->platform();
		
		$data2=array();
		$pecah=array();
		$hal_aktif=$this->uri->segment(4);
		$hal_aktif2=$this->uri->segment(3);
		$pecah=explode("_",$hal_aktif);
		$data2['hal0'] = $pecah[0];
		$q = $this->Web_model->Sitemap_Aktif($data2['hal0']);
		foreach($q->result() as $m)
		{
			$data['nm_site'] = $m->judul_sitemap;
			$id_site = $m->kode_sitemap;
			$data['link_seo'] = str_replace(" ","-",$data['nm_site']);
		}
			
		$q3 = $this->Web_model->Sitemap_Aktif($hal_aktif);
		foreach($q3->result() as $m3)
		{
			$data['nm_site3'] = $m3->judul_sitemap;
			$id_site3 = $m3->kode_sitemap;
		}
		
		$q2 = $this->Web_model->Wilayah_Aktif($hal_aktif2);
		foreach($q2->result() as $m2)
		{
			$data['nm_site2'] = $m2->nama_wilayah;
			$data['kode_wil'] = $m2->kode_wilayah;
			$id_site2 = $m2->kode_wilayah;
			$data['link_seo2'] = str_replace(" ","-",$data['nm_site2']);
			$data['kode_parent'] = $m2->parent;
		}
		
		$q4 = $this->Web_model->Wilayah_Aktif($data['kode_parent']);
		foreach($q4->result() as $m4)
		{
			$nm_site4 = $m4->nama_wilayah;
			$kode_wil4 = $m4->kode_wilayah;
			$id_site4 = $m4->kode_wilayah;
			$link_seo4 = str_replace(" ","-",$nm_site4);
		}
		
		$data['kumpulan_konten'] = $this->Web_model->Kumpulan_Konten_Kec_Mainkonten($hal_aktif2,$hal_aktif);
		$this->breadcrumb->add($nm_site4,'kec/home/'.$id_site4.'/'.$data['link_seo2'])->add($data['nm_site2'],'desa/home/'.$id_site2.'/'.$data['link_seo2'])->add($data['nm_site'],
		'desa/mainkonten/'.$id_site2.'/'.$id_site.'/'.$data['link_seo']);
		$data["menu_default"] = $this->Web_model->Menu_Opsional($hal_aktif2);
		$data["wil_kec"] = $this->Web_model->Data_Wilayah('kab01');
		$this->load->view('desa_web/bg_atas',$data);
		$this->load->view('desa_web/bg_kiri');
		$this->load->view('desa_web/mainkonten',$data);
		$this->load->view('desa_web/bg_bawah');
	}
	
	function konten()
	{
		$data=array();
		
		$data["counter_pengunjung"] = $this->Web_model->Counter_Pengunjung();
		setcookie("blog_desa", "blog_desa_dikunjungi", time() + 900 * 24);
		if (!isset($_COOKIE["blog_desa"])) {
			$this->Web_model->Update_Counter_Pengunjung();
		}
		$data["browser"] = $this->agent->browser().' '.$this->agent->version();
		$data["os"] = $this->agent->platform();
		
		$data2=array();
		$pecah=array();
		$hal_aktif=$this->uri->segment(4);
		$hal_aktif2=$this->uri->segment(3);
		$pecah=explode("_",$hal_aktif);
		$data2['hal0'] = $pecah[0];
		$q = $this->Web_model->Sitemap_Aktif($data2['hal0']);
		foreach($q->result() as $m)
		{
			$data['nm_site'] = $m->judul_sitemap;
			$id_site = $m->kode_sitemap;
			$data['link_seo'] = str_replace(" ","-",$data['nm_site']);
		}
			
		$q3 = $this->Web_model->Sitemap_Aktif($hal_aktif);
		foreach($q3->result() as $m3)
		{
			$data['nm_site3'] = $m3->judul_sitemap;
			$id_site3 = $m3->kode_sitemap;
		}
		
		$q2 = $this->Web_model->Wilayah_Aktif($hal_aktif2);
		foreach($q2->result() as $m2)
		{
			$data['nm_site2'] = $m2->nama_wilayah;
			$data['kode_wil'] = $m2->kode_wilayah;
			$id_site2 = $m2->kode_wilayah;
			$data['link_seo2'] = str_replace(" ","-",$data['nm_site2']);
			$data['kode_parent'] = $m2->parent;
		}
		
		$q4 = $this->Web_model->Wilayah_Aktif($data['kode_parent']);
		foreach($q4->result() as $m4)
		{
			$nm_site4 = $m4->nama_wilayah;
			$kode_wil4 = $m4->kode_wilayah;
			$id_site4 = $m4->kode_wilayah;
			$link_seo4 = str_replace(" ","-",$nm_site4);
		}
		
		$this->breadcrumb->add($nm_site4,'kec/home/'.$id_site4.'/'.$link_seo4)->add($data['nm_site2'],'desa/home/'.$id_site2.'/'.$data['link_seo2'])->add($data['nm_site'],
		'desa/mainkonten/'.$id_site2.'/'.$id_site.'/'.$data['link_seo'])->add($data['nm_site3'],'pages/manage/add');
		$data["menu_default"] = $this->Web_model->Menu_Opsional($hal_aktif2);
		$data["wil_kec"] = $this->Web_model->Data_Wilayah('kab01');
		
		$data['kumpulan_konten'] = $this->Web_model->Kumpulan_Konten_Kec_Mainkonten($hal_aktif2,$hal_aktif);
		$this->load->view('desa_web/bg_atas',$data);
		$this->load->view('desa_web/bg_kiri');
		$this->load->view('desa_web/konten',$data);
		$this->load->view('desa_web/bg_bawah');
	}
	
	function subkonten()
	{
		$data=array();
		
		$data["counter_pengunjung"] = $this->Web_model->Counter_Pengunjung();
		setcookie("blog_desa", "blog_desa_dikunjungi", time() + 900 * 24);
		if (!isset($_COOKIE["blog_desa"])) {
			$this->Web_model->Update_Counter_Pengunjung();
		}
		$data["browser"] = $this->agent->browser().' '.$this->agent->version();
		$data["os"] = $this->agent->platform();
		
		$data2=array();
		$pecah=array();
		$hal_aktif=$this->uri->segment(4);
		$hal_aktif2=$this->uri->segment(3);
		$pecah=explode("_",$hal_aktif);
		$data2['hal0'] = $pecah[0];
		$q = $this->Web_model->Sitemap_Aktif($data2['hal0']);
		foreach($q->result() as $m)
		{
			$data['nm_site'] = $m->judul_sitemap;
			$id_site = $m->kode_sitemap;
			$data['link_seo'] = str_replace(" ","-",$data['nm_site']);
		}
			
		$q3 = $this->Web_model->Sitemap_Aktif($hal_aktif);
		foreach($q3->result() as $m3)
		{
			$data['nm_site3'] = $m3->judul_sitemap;
			$id_site3 = $m3->kode_sitemap;
		}
		
		$kd_map = $pecah[0].'_'.$pecah[1];
		$q4 = $this->Web_model->Sitemap_Aktif($kd_map);
		foreach($q4->result() as $m4)
		{
			$data['nm_site4'] = $m4->judul_sitemap;
			$id_site4 = $m4->kode_sitemap;
			$data['link_seo3'] = str_replace(" ","-",$data['nm_site4']);
		}
		
		$q2 = $this->Web_model->Wilayah_Aktif($hal_aktif2);
		foreach($q2->result() as $m2)
		{
			$data['nm_site2'] = $m2->nama_wilayah;
			$data['kode_wil'] = $m2->kode_wilayah;
			$id_site2 = $m2->kode_wilayah;
			$data['link_seo2'] = str_replace(" ","-",$data['nm_site2']);
			$data['kode_parent'] = $m2->parent;
		}
		
		$q5 = $this->Web_model->Wilayah_Aktif($data['kode_parent']);
		foreach($q5->result() as $m5)
		{
			$data['nm_site5'] = $m5->nama_wilayah;
			$kode_wil5 = $m5->kode_wilayah;
			$id_site5 = $m5->kode_wilayah;
			$data['link_seo5'] = str_replace(" ","-",$data['nm_site5']);
		}
		
		$data['kumpulan_konten'] = $this->Web_model->Kumpulan_Konten_Kec_Mainkonten($hal_aktif2,$hal_aktif);
		$this->breadcrumb->add($data['nm_site5'],'kec/home/'.$id_site5.'/'.$data['link_seo5'])->add($data['nm_site2'],'desa/home/'.$id_site2.'/'.$data['link_seo2'])->add($data[
		'nm_site'],'desa/mainkonten/'.$id_site2.'/'.$id_site.'/'.$data['link_seo'])
		->add($data['nm_site4'],'desa/konten/'.$id_site2.'/'.$id_site4.'/'.$data['link_seo3'])->add($data['nm_site3'],'pages/manage/add');
		$data["menu_default"] = $this->Web_model->Menu_Opsional($hal_aktif2);
		$data["wil_kec"] = $this->Web_model->Data_Wilayah('kab01');
		$this->load->view('desa_web/bg_atas',$data);
		$this->load->view('desa_web/bg_kiri');
		$this->load->view('desa_web/subkonten',$data);
		$this->load->view('desa_web/bg_bawah');
	}
	
	function home()
	{
		$data=array();
		
		$data["counter_pengunjung"] = $this->Web_model->Counter_Pengunjung();
		setcookie("blog_desa", "blog_desa_dikunjungi", time() + 900 * 24);
		if (!isset($_COOKIE["blog_desa"])) {
			$this->Web_model->Update_Counter_Pengunjung();
		}
		$data["browser"] = $this->agent->browser().' '.$this->agent->version();
		$data["os"] = $this->agent->platform();
		
		$data3=array();
		$pecah=array();
		$hal_aktif=$this->uri->segment(3);
		$q = $this->Web_model->Wilayah_Aktif($hal_aktif);
		foreach($q->result() as $m)
		{
			$data['nm_site2'] = $m->nama_wilayah;
			$data['kode_wil'] = $m->kode_wilayah;
			$data['kode_parent'] = $m->parent;
			$id_site = $m->kode_wilayah;
			$data['link_seo'] = str_replace(" ","-",$data['nm_site2']);
		}
		$q2 = $this->Web_model->Wilayah_Aktif($data['kode_parent']);
		foreach($q2->result() as $m2)
		{
			$nm_site = $m2->nama_wilayah;
			$kode_wil = $m2->kode_wilayah;
			$id_site2 = $m2->kode_wilayah;
			$link_seo = str_replace(" ","-",$nm_site);
		}
		$data['nm_site3'] = "Beranda";
		$this->breadcrumb->add($nm_site,'kec/home/'.$id_site2.'/'.$link_seo)->add($data['nm_site2'],'desa/home/'.$id_site.'/'.$data['link_seo'])->add('Beranda',
		'pages/manage/add');
		$data["menu_default"] = $this->Web_model->Menu_Opsional($hal_aktif);
		$data["wil_kec"] = $this->Web_model->Data_Wilayah($hal_aktif);
		$tot_desa = $this->Web_model->Data_Wilayah($id_site2);
		$data["tot_wil"] = $tot_desa->num_rows();
		$data['jml_desa'] = $data["wil_kec"]->num_rows;
		$this->load->view('desa_web/bg_atas',$data);
		$this->load->view('desa_web/bg_kiri',$data);
		$this->load->view('desa_web/bg_kanan',$data);
		$this->load->view('desa_web/bg_bawah');
	}
	
	function isi()
	{
		$data=array();
		
		$data["counter_pengunjung"] = $this->Web_model->Counter_Pengunjung();
		setcookie("blog_desa", "blog_desa_dikunjungi", time() + 900 * 24);
		if (!isset($_COOKIE["blog_desa"])) {
			$this->Web_model->Update_Counter_Pengunjung();
		}
		$data["browser"] = $this->agent->browser().' '.$this->agent->version();
		$data["os"] = $this->agent->platform();
		
		$data2=array();
		$pecah=array();
		$hal_aktif=$this->uri->segment(4);
		$hal_aktif2=$this->uri->segment(3);
		$hal_aktif3=$this->uri->segment(5);
		$pecah=explode("_",$hal_aktif);
		$data2['hal0'] = $pecah[0];
		$q = $this->Web_model->Sitemap_Aktif($data2['hal0']);
		foreach($q->result() as $m)
		{
			$data['nm_site'] = $m->judul_sitemap;
			$id_site = $m->kode_sitemap;
			$data['link_seo'] = str_replace(" ","-",$data['nm_site']);
		}
			
		$q3 = $this->Web_model->Sitemap_Aktif($hal_aktif);
		foreach($q3->result() as $m3)
		{
			$data['nm_site3'] = $m3->judul_sitemap;
			$id_site3 = $m3->kode_sitemap;
		}
		
		$q2 = $this->Web_model->Wilayah_Aktif($hal_aktif2);
		foreach($q2->result() as $m2)
		{
			$data['nm_site2'] = $m2->nama_wilayah;
			$data['kode_wil'] = $m2->kode_wilayah;
			$id_site2 = $m2->kode_wilayah;
			$data['link_seo2'] = str_replace(" ","-",$data['nm_site2']);
			$data['kode_parent'] = $m2->parent;
		}
		
		$q4 = $this->Web_model->Wilayah_Aktif($data['kode_parent']);
		foreach($q4->result() as $m4)
		{
			$nm_site4 = $m4->nama_wilayah;
			$kode_wil4 = $m4->kode_wilayah;
			$id_site4 = $m4->kode_wilayah;
			$link_seo4 = str_replace(" ","-",$nm_site4);
		}
		
		$data['detail_konten'] = $this->Web_model->Detail_Konten($hal_aktif2,$hal_aktif,$hal_aktif3);
		$this->breadcrumb->add($nm_site4,'kec/home/'.$id_site4.'/'.$data['link_seo2'])->add($data['nm_site2'],'desa/home/'.$id_site2.'/'.$data['link_seo2'])->add($data['nm_site'],
		'desa/mainkonten/'.$id_site2.'/'.$id_site.'/'.$data['link_seo']);
		$data["menu_default"] = $this->Web_model->Menu_Opsional($hal_aktif2);
		$data["wil_kec"] = $this->Web_model->Data_Wilayah('kab01');
		$data["tampil_komentar"] = $this->Web_model->Tampil_Komentar_Per_Konten($hal_aktif3);
		$data['tot_komentar'] = $data["tampil_komentar"]->num_rows();
		$this->load->view('desa_web/bg_atas',$data);
		$this->load->view('desa_web/bg_kiri');
		$this->load->view('desa_web/isi',$data);
		$this->load->view('desa_web/bg_bawah');
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */