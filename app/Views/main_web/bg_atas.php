<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $nm_site; ?> | Blog Desa Kabupaten Banyuwangi</title>
<meta name="keywords" content="blog desa, banyuwangi" />
<meta name="description" content="Blog Desa Kabupaten Banyuwangi oleh Gede Lumbung" />
<link href="<?php echo base_url(); ?>asset/main_web/css/templatemo_style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>asset/main_web/js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/main_web/js/jquerycssmenu.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/main_web/js/vtip.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/main_web/js/tabpane.js"></script>
</head>
<body>
<div id="templatemo_header_wrapper">
	<div id="templatemo_header">
    
        <div id="site_title">
            <a href="<?php echo base_url(); ?>" target="_parent">
                Blog Desa Kabupaten Banyuwangi
                <span>Informasi Seputar Potensi Wilayah di Daerah Banyuwangi</span>
            </a>
      </div>
            
            
        <div id="templatemo_menu">
        
	<div id="myjquerymenu" class="jquerycssmenu">	
    
		<ul>
			<li><a href="<?php echo base_url(); ?>"><span>Beranda</span></a><ul></ul></li>
			<?php
				$i = 1;
				foreach($menu_default->result_array() as $md)
				{
					$link_seo_md = str_replace(" ","-",$md['judul_sitemap']);
					echo "<li><a href='".base_url()."index.php/kab/mainkonten/".$md['kode_wilayah']."/".$md['kode_sitemap']."/".$link_seo_md."'><span>".$md['judul_sitemap']."</span>
					</a>";
					$sub_menu_default = $this->Web_model->Sub_Menu_Default($md['kode_sitemap'],'kab01');
					echo "<ul>";
					foreach($sub_menu_default->result_array() as $smd)
						{
							$link_seo_smd = str_replace(" ","-",$smd['judul_sitemap']);
							echo "<li><a href='".base_url()."index.php/kab/konten/".$smd['kode_wilayah']."/".$smd['kode_sitemap']."/".$link_seo_smd."'>".$smd['judul_sitemap']."
							</a>";
							echo "<ul>";
							$sub_sub_menu_default = $this->Web_model->Sub_Menu_Default($smd['kode_sitemap'],'kab01');
							foreach($sub_sub_menu_default->result_array() as $ssmd)
							{
								$link_seo_smd = str_replace(" ","-",$ssmd['judul_sitemap']);
								echo "<li><a href='".base_url()."index.php/kab/subkonten/".$ssmd['kode_wilayah']."/".$ssmd['kode_sitemap']."/".$link_seo_smd."'>".$ssmd[
								'judul_sitemap']."</a></li>";
							}
							echo "</ul></li>";
						}
					echo "</ul></li>";
					$i++;
				}
				?>
			

			</ul></div>  	
        
        </div> <!-- end of templatemo_menu -->
    
    </div>
</div>

<div id="templatemo_feature_wrapper">
	<div id="templatemo_feature">

		<div id="feature_left">
        
        <img src="<?php echo base_url(); ?>asset/main_web/images/banner.png" />
        
        </div>
        
  </div>
	<!-- end of feature -->
</div> 
<div id="templatemo_feature_wrapper_medium">
<div id="templatemo_feature_wrapper_medium_mid">
<div id="templatemo_feature_wrapper_medium_box_left">
<?php echo $this->breadcrumb->show(); ?>
</div>
<div id="templatemo_feature_wrapper_medium_box_right">
<input type="text" size="25" class="input_1" value="Pencarian"  onfocus="this.value=(this.value=='Pencarian')? '' : this.value ;"  /> <input type="submit" value="Cari" class="tombol_1" />
</div>
</div>
</div>
