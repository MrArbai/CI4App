<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Administrator Log In</title>
<link href="<?php echo base_url();?>asset/admin/css/style.css" rel="stylesheet" type="text/css" />
</head>
<body><br /><br /><br /><br /><br />
<form method="POST" action="<?php echo base_url();?>index.php/admin/login">
<div id="box-login">
<table width="100%">
<tr><td width="100" colspan="3" align="center"><h2><a href="<?php echo base_url(); ?>">Blog Desa Kabupaten Banyuwangi</a></h2></td></tr>
<tr><td width="100" colspan="3" align="center"><h2>Repost by <a href='https://stokcoding.com/' title='StokCoding.com' target='_blank'>StokCoding.com</a>
</h2></td></tr>
<tr><td width="100">Username</td><td width="20">:</td><td><input type="text" name="username" class="input" size="40"/></td></tr>
<tr><td width="100">Password</td><td width="20">:</td><td><input type="password" name="password" class="input" size="40"/></td></tr>
<tr><td width="100"></td><td width="20"></td><td><input type="submit" class="tombol" value="Masuk" /> <input type="reset" class="tombol" value="Hapus" /></td></tr>
</table>
</div>
</form>
</body>
</html>
