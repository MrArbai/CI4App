<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="<?php echo base_url(); ?>asset/admin/css/style-admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>asset/admin/js/simpletreemenu.js"></script>
<title>Administrator Area</title>
</head>

<body onload="init()">
<div id="menu-atas">
<div id="atas"><div class="logo">Kecamatan <?php echo $wilayah; ?> <br /><span>Administrator Area - Kecamatan</span></div>
<div class="menu" id="nav">
	<ul>
    	<li><a href="<?php echo base_url(); ?>index.php/adminkec">Beranda</a></li>
    	<li><a href="<?php echo base_url(); ?>index.php/adminkec/managemenu">Manajemen Menu</a></li>
    	<li><a href="<?php echo base_url(); ?>index.php/adminkec/managekonten">Manajemen Konten</a></li>
    	<li><a href="<?php echo base_url(); ?>index.php/adminkec/managekomentar">Manajemen Komentar</a></li>
    	<li><a href="<?php echo base_url(); ?>index.php/adminkec/manageakun">Atur Akun</a></li>
    	<li><a href="<?php echo base_url(); ?>index.php/admin/logout">Log Out</a></li>
	</ul>
</div>
</div>
</div>