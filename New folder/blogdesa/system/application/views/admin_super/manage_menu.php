<script type="text/javascript">
function lihatObjek()
{
var data="";
document.soal.simpan.value="";
	for(i=0;i<document.soal.length;i++)
	{
		if(document.soal.elements[i].type=='checkbox')
		{
			if(document.soal.elements[i].checked==true)
			{
				if(data=="")
				data=document.soal.elements[i].value;
				else
				data+='|'+document.soal.elements[i].value;
			}
		}
	}
	document.soal.simpan.value=data;
}

</script>
<div id="isi">
<h1>Menu Yang Sedang Tampil</h1>
        <div id="templatemo_menu">
        
		<div id="myjquerymenu" class="jquerycssmenu">	
    
		<ul>
			<li>Beranda<ul></ul></li>
			<?php
				$i = 1;
				foreach($menu_default->result_array() as $md)
				{
					$link_seo_md = str_replace(" ","-",$md['judul_sitemap']);
					echo "<li><span>".$md['judul_sitemap']."</span>";
					$sub_menu_default = $this->Web_model->Sub_Menu_Opsional($md['kode_sitemap'],$kode_wil);
					echo "<ul>";
					foreach($sub_menu_default->result_array() as $smd)
						{
							$link_seo_smd = str_replace(" ","-",$smd['judul_sitemap']);
							echo "<li>".$smd['judul_sitemap']."";
							echo "<ul>";
							$sub_sub_menu_default = $this->Web_model->Sub_Menu_Default($smd['kode_sitemap'],$kode_wil);
							foreach($sub_sub_menu_default->result_array() as $ssmd)
							{
								$link_seo_smd = str_replace(" ","-",$ssmd['judul_sitemap']);
								echo "<li>".$ssmd['judul_sitemap']."</li>";
							}
							echo "</ul></li>";
						}
					echo "</ul></li>";
					$i++;
				}
				?>
			

			</ul></div> 
        </div>
		<hr />
<h1>Edit Tampilan Menu</h1>
<form method="post" action="<?php echo base_url(); ?>index.php/superadmin/updatemenu" name="soal">
<ul id="treemenu1" class="treeview">
<?php
$i=1;
foreach($menu_default->result_array() as $md)
{
	echo "<li><input type='checkbox' onclick='javascript:lihatObjek();' name='pilihan-".$i."' value='".$kode_wil."-".$md['kode_sitemap']."'>".$md['judul_sitemap']."<ul>";
	$sm = $this->Superadmin_model->Semua_Menu_Anak($md['kode_sitemap']);
	foreach($sm->result() as $sma)
	{
	echo"<li><input type='checkbox' onclick='javascript:lihatObjek();' name='pilihan-".$i."' value='".$kode_wil."-".$sma->kode_sitemap."'>".$sma->judul_sitemap."<ul>";
	$sm2 = $this->Superadmin_model->Semua_Menu_Anak($sma->kode_sitemap);
		foreach($sm2->result() as $sma2)
		{
			echo"<li><input type='checkbox' onclick='javascript:lihatObjek();' name='pilihan-".$i."' value='".$kode_wil."-".$sma2->kode_sitemap."'>".$sma2->judul_sitemap."</li>";
		}
	echo"</ul></li>";
	}
	echo"</ul></li>";
	$i++;
}
?>
</ul>
<input type="submit" class="input" value="Simpan" />
<input type="reset" class="input" value="Hapus" />
<input type="hidden" name="simpan" size="100">
</form>
<script type="text/javascript">
ddtreemenu.createTree("treemenu1", true);
</script>
</div>
</div>
</body>
</html>
