<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link href="<?php echo base_url(); ?>asset/admin/css/style-admin.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="<?php echo base_url(); ?>asset/admin/js/simpletreemenu.js"></script>
    <title>Administrator Area</title>
</head>

<body onload="init()">

<?= $this->include('layout2/navbar') ?>

<?= $this->rendersection('content'); ?>

<?= $this->include('layout2/footer') ?>

<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="/js/template.js"></script>
</body>

</html>