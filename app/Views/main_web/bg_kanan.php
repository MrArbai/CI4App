	<div id="templatemo_content">

		<h2>Selamat Datang di Blog Desa Kabupaten Banyuwangi</h2>

		<p>Kabupaten Banyuwangi yang terletak Propinsi Jawa Timur mempunyai wilayah yang sangat luas. Kabupaten Banyuwangi mempunyai 24 Kecamatan serta 217 Desa dan Kelurahan. Wilayah Kabupaten Banyuwangi secara keseluruhan sebenarnya mempunyai potensi yang sangat banyak, mulai dari obyek wisata, kesenian, budaya, ekonomi masyarakat dan lain sebagainya. </p>
		<p>Dengan adanya blog desa ini, diharapkan pengaksesan terhadap informasi dan potensi-potensi yang terdapat di masing-masing daerah di Banyuwangi menjadi lebih mudah. Sehingga ke depannya tidak hanya mempermudah wisatawan yang ingin mendapatkan informasi tentang potensi-potensi dan objek wisata yang terdapat di Banyuwangi, tetapi juga membantu pemerintah daerah maupun pusat untuk mengolah dan menganalisa data yang pada akhirnya dapat mendukung pemerintah dalam mengambil arah kebijakan pembangunan daerah. </p>

		<div class="tab-pane" id="tabPane1">
			<?php
			$i = 2;
			echo "<div class='tab-page' id='tabPage1'>";
			echo "<h7 class='tab'>Wilayah</h7>";
			?>
			<script type="text/javascript">
				tp1.addTabPage(document.getElementById("tabPage1"));
			</script>
			<?php
			$no = 1;
			echo "<div id='wilayah_home'>";
			foreach ($wil_kec->result_array() as $wil) {
				$link_seo_wil = str_replace(" ", "-", $wil['nama_wilayah']);
				echo "<a href='" . base_url() . "index.php/kec/home/" . $wil['kode_wilayah'] . "/" . $link_seo_wil . "'><div id='sub_wilayah_home'>" . $no . ". " . $wil['nama_wilayah'] . "</div></a>";
				$no++;
			}
			echo "</div>";
			echo "</div>";

			foreach ($menu_default->result_array() as $md) {
				echo "<div class='tab-page' id='tabPage" . $i . "'>";
				echo "<h7 class='tab'>" . $md['judul_sitemap'] . "</h7>";
			?>
				<script type="text/javascript">
					tp1.addTabPage(document.getElementById("tabPage<?php echo $i; ?>"));
				</script>
			<?php
				$kumpulan_konten = $this->Web_model->Kumpulan_Konten_Kec_Mainkonten($md['kode_wilayah'], $md['kode_sitemap']);
				foreach ($kumpulan_konten->result_array() as $kk) {
					echo "<div id='cuplikan_artikel_tab'>";
					echo "<a href='" . base_url() . "index.php/desa/isi/" . $kk['kode_wilayah'] . "/" . $kk['kode_sitemap'] . "/" . $kk['kode_konten'] . "'><h6>" . $kk['judul_konten'] . "</h6></a>";
					echo "<h7>Kategori " . $kk['judul_sitemap'] . " | Diposting pada " . $kk['tgl_posting'] . " | oleh " . $kk['nama_user'] . "</h7>";
					echo "<div class='cleaner_h10'></div>";
					$isi = strip_tags(substr($kk['isi_konten'], 0, 100));
					echo "<p>" . $isi . "...<b>(Baca selengkapnya)</b></p>";
					echo "<div class='cleaner'></div>";
					echo "<div id='bar_artikel'><a href='" . base_url() . "index.php/desa/isi/" . $kk['kode_wilayah'] . "/" . $kk['kode_sitemap'] . "/" . $kk['kode_konten'] . "'><span class='baca'>
				Baca Selengkapnya</span></a> <a href='" . base_url() . "index.php/desa/isi/" . $kk['kode_wilayah'] . "/" . $kk['kode_sitemap'] . "/" . $kk['kode_konten'] .
						"'><span class='komentar'>Berikan Komentar</span></a></div>";
					echo "</div>";
					echo "<div class='cleaner_h10'></div>";
				}
				echo "</div>";
				$i++;
			}

			?>
		</div>

		<div class="cleaner_h30"></div>

		<h2>Peta Wilayah Banyuwangi</h2>
		<p> Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illovitae dicta sunt explicabo.</p>
		<div id="imgmapdiv">
			<map name="imgmap">
				<area shape="poly" coords="432,156,439,131,434,125,432,108,431,94,426,81,430,68,418,65,409,58,395,59,389,53,379,54,366,48,357,38,352,32,343,29,335,38,325,49,323,57,308,71,301,82,295,94,301,121,299,137,305,141,320,144,362,145,393,147,411,153,423,155,435,160" href="<?php echo base_url(); ?>index.php/kec/home/kec24/Wongsorejo" alt="1" title="Wongsorejo" class="vtip">
				<area shape="poly" coords="402,242,384,237,362,232,342,227,333,219,336,211,332,205,325,196,317,189,308,178,301,170,291,163,301,159,302,142,317,145,335,146,363,148,388,149,411,155,429,162,426,172,422,183,417,189,416,201,419,209,412,218,416,226,404,244" href="<?php echo base_url(); ?>index.php/kec/home/kec11/Kalipuro" alt="2" title="Kalipuro" class="vtip">
				<area shape="poly" coords="386,256,373,251,358,239,338,228,370,234,387,239,393,244,388,253" href="<?php echo base_url(); ?>index.php/kec/home/kec06/Giri" alt="3" title="Giri" class="vtip">
				<area shape="poly" coords="374,270,364,266,355,274,344,273,334,279,325,273,309,274,291,268,285,255,278,242,286,234,281,229,274,219,272,207,274,195,279,185,283,176,286,165,294,163,314,185,324,200,334,209,332,216,337,223,340,232,370,251,382,258,385,265,376,271" href="<?php echo base_url(); ?>index.php/kec/home/kec07/Glagah" alt="4" title="Glagah" class="vtip">
				<area shape="poly" coords="396,324,394,313,398,306,403,288,396,283,383,277,371,271,366,268,362,275,340,279,329,280,324,275,296,273,313,281,316,290,312,297,318,311,329,314,345,316,359,313,368,312,375,320,384,323,396,326" href="<?php echo base_url(); ?>index.php/kec/home/kec09/Kabat" alt="5" title="Kabat" class="vtip">
				<area shape="poly" coords="384,375,389,360,388,351,393,343,391,336,396,327,387,326,374,320,368,316,360,315,347,322,334,329,322,334,320,343,314,349,320,357,333,358,344,356,353,361,363,360,372,366,385,373,386,374" href="<?php echo base_url(); ?>index.php/kec/home/kec16/Rogojampi" alt="6" title="Rogojampi" class="vtip">
				<area shape="poly" coords="314,303,304,307,296,313,285,306,281,299,280,293,273,291,265,296,268,302,271,312,275,323,288,330,289,339,292,346,308,350,315,353,319,344,323,334,330,328,337,326,345,321,359,317,343,318,326,316,316,312" href="<?php echo base_url(); ?>index.php/kec/home/kec19/Singojuruh" alt="7" title="Singojuruh" class="vtip">
				<area shape="poly" coords="282,180,264,188,248,191,238,189,225,191,220,187,211,193,200,196,190,199,181,196,187,208,196,215,198,224,209,233,212,242,219,259,221,270,240,263,249,270,256,282,260,293,264,294,278,292,285,300,288,308,299,309,312,303,314,298,315,290,311,283,302,279,293,275,288,267,282,251,278,241,284,233,278,229,272,219,271,206,274,193,281,185,276,182" href="<?php echo base_url(); ?>index.php/kec/home/kec20/Songgon" alt="8" title="Songgon" class="vtip">
				<area shape="poly" coords="124,348,130,332,133,324,146,321,150,310,159,304,156,290,161,267,156,250,157,238,163,209,149,212,140,226,134,235,124,245,113,252,112,263,110,271,107,288,98,296,90,304,85,315,99,340,112,342,121,343,123,350" href="<?php echo base_url(); ?>index.php/kec/home/kec10/Kalibaru" alt="9" title="Kalibaru" class="vtip">
				<area shape="poly" coords="182,198,170,206,166,212,161,225,159,242,161,262,159,284,162,304,154,311,148,322,141,327,133,332,131,341,127,351,119,359,114,370,113,386,120,393,130,400,143,408,153,403,161,408,173,397,182,402,192,395,207,397,212,390,216,370,212,357,213,343,211,327,209,320,208,308,209,297,221,290,226,281,222,272,219,263,215,250,209,239,202,232,196,224,195,214,188,210,182,201" href="<?php echo base_url(); ?>index.php/kec/home/kec08/Glenmore" alt="10" title="Glenmore" class="vtip">
				<area shape="poly" coords="274,356,281,345,287,330,278,327,273,314,266,301,261,291,254,279,232,267,225,271,226,289,215,299,211,301,217,311,228,323,235,333,243,339,255,337,264,347,274,357" href="<?php echo base_url(); ?>index.php/kec/home/kec17/Sempu" alt="11" title="Sempu" class="vtip">
				<area shape="poly" coords="280,376,281,365,274,359,258,339,249,340,238,336,228,325,223,317,218,311,212,304,215,327,216,343,215,353,217,362,230,364,242,366,255,367,266,368,278,376,281,378" href="<?php echo base_url(); ?>index.php/kec/home/kec05/Genteng" alt="12" title="Genteng" class="vtip">
				<area shape="poly" coords="284,380,297,383,311,386,326,388,335,380,339,372,341,360,311,354,299,350,290,345,289,331,281,347,275,357,281,363,284,377,286,381" href="<?php echo base_url(); ?>index.php/kec/home/kec21/WSrono" alt="13" title="Srono" class="vtip">
				<area shape="poly" coords="346,440,357,442,372,445,385,447,395,450,392,436,387,427,386,422,383,414,380,403,383,391,385,375,373,369,361,362,347,360,342,373,329,389,318,393,317,398,330,399,337,410,332,419,334,426,340,427,343,436,349,443" href="<?php echo base_url(); ?>index.php/kec/home/kec13/Muncar" alt="14" title="Muncar" class="vtip">
				<area shape="poly" coords="286,383,280,386,265,393,275,401,273,414,272,426,281,436,293,434,300,425,307,422,318,429,320,437,330,445,342,444,345,439,338,428,334,422,337,412,332,405,319,399,321,393,323,389,314,387,305,386,288,383,279,388,268,387" href="<?php echo base_url(); ?>index.php/kec/home/kec03/Cluring" alt="15" title="Cluring" class="vtip">
				<area shape="poly" coords="394,453,391,466,392,481,403,480,406,473,412,459,413,447,415,429,411,419,422,422,426,460,428,474,426,485,431,495,434,507,442,526,451,542,464,557,473,541,484,537,497,551,518,564,541,563,549,573,557,586,562,598,558,622,544,638,527,646,514,647,496,643,474,632,459,629,432,628,400,625,388,620,366,617,386,611,405,607,409,591,404,574,398,561,384,550,370,541,360,534,343,533,346,521,349,515,343,506,336,499,335,491,337,473,330,463,327,453,330,448,340,443,353,445,376,447,394,452" href="<?php echo base_url(); ?>index.php/kec/home/kec22/Tegaldlimo" alt="16" title="Tegaldlimo" class="vtip">
				<area shape="poly" coords="297,542,284,536,286,524,284,504,288,493,291,483,290,451,283,455,272,448,271,437,277,434,296,436,301,429,309,427,322,434,326,444,330,448,334,466,339,475,336,489,339,499,343,509,348,522,343,530,337,522,317,516,304,517,297,523,300,529,299,544" href="<?php echo base_url(); ?>index.php/kec/home/kec15/Purwoharjo" alt="17" title="Purwoharjo" class="vtip">
				<area shape="poly" coords="300,549,292,555,281,552,248,544,232,539,236,525,253,519,262,509,268,490,269,470,265,467,238,466,220,468,214,465,218,453,222,444,226,434,221,432,234,426,248,424,262,427,278,434,271,437,278,454,291,452,289,464,291,476,289,490,284,503,302,551,297,552" href="<?php echo base_url(); ?>index.php/kec/home/kec01/Bangorejo" alt="18" title="Bangorejo" class="vtip">
				<area shape="poly" coords="225,537,234,529,246,517,262,510,265,493,266,472,265,466,251,468,233,465,221,473,215,467,214,456,220,440,212,431,207,421,210,403,209,394,199,392,186,398,175,400,163,404,152,402,135,404,123,395,115,390,101,391,95,400,88,410,78,415,71,408,58,401,44,403,31,421,25,428,27,444,34,457,40,471,22,488,34,487,44,493,51,494,69,504,73,503,87,499,94,494,114,502,117,517,106,522,107,530,123,526,130,524,136,527,145,515,154,518,161,523,160,536,163,545,173,548,177,546,190,538,203,532,215,535,225,537" href="<?php echo base_url(); ?>index.php/kec/home/kec14/Pesanggaran" alt="1" title="Pesanggaran" class="vtip">
				<area shape="poly" coords="217,429,227,432,233,428,235,422,248,428,273,431,274,420,268,412,273,402,264,397,260,386,269,385,280,375,265,373,251,367,237,366,223,364,212,369,216,378,211,391,212,400,213,428,220,430" href="<?php echo base_url(); ?>index.php/kec/home/kec04/Gambiran" alt="2" title="Gambiran" class="vtip">
			</map>
		</div>

		<p>
			<img src="<?php echo base_url(); ?>asset/main_web/images/peta_bwi.jpg" alt="Move mouse over image" usemap="#imgmap">
		</p>

	</div>
	<div class="cleaner"></div>
	</div> <!-- end of content wrapper -->