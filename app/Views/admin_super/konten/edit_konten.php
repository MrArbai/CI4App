<?php echo $scriptmce; ?>
<div id="isi">
    <h1>Manajemen Konten</h1>
    <script type="text/javascript">
        function TabView(id, current) {
            if (typeof(TabView.cnt) == "undefined") {
                TabView.init();
            }
            current = (typeof(current) == "undefined") ? 0 : current;
            this.newTab(id, current);
        }
        TabView.init = function() {
            TabView.cnt = 0;
            TabView.arTabView = new Array();
        }
        TabView.switchTab = function(TabViewIdx, TabIdx) {
            TabView.arTabView[TabViewIdx].TabView.switchTab(TabIdx);
        }
        TabView.prototype.newTab = function(id, current) {
            var TabViewElem, idx = 0,
                el = '',
                elTabs = '',
                elPages = '';
            TabViewElem = document.getElementById(id);
            TabView.arTabView[TabView.cnt] = TabViewElem;
            this.TabElem = TabViewElem;
            this.TabElem.TabView = this;
            this.tabCnt = 0;
            this.arTab = new Array();
            // Loop throught the elements till the object with
            // classname 'Tabs' is obtained
            elTabs = TabViewElem.firstChild;
            while (elTabs.className != "Tabs") elTabs = elTabs.nextSibling;
            el = elTabs.firstChild;
            do {
                if (el.tagName == "A") {
                    el.href = "javascript:TabView.switchTab(" + TabView.cnt + "," + idx + ");";
                    this.arTab[idx] = new Array(el, 0);
                    this.tabCnt = idx++;
                }
            } while (el = el.nextSibling);

            // Loop throught the elements till the object with
            // classname 'Pages' is obtained
            elPages = TabViewElem.firstChild;
            while (elPages.className != "Pages") elPages = elPages.nextSibling;
            el = elPages.firstChild;
            idx = 0;
            do {
                if (el.className == "Page") {
                    this.arTab[idx][1] = el;
                    idx++;
                }
            } while (el = el.nextSibling);
            this.switchTab(current);
            // Update TabView Count
            TabView.cnt++;
        }
        TabView.prototype.switchTab = function(TabIdx) {
            var Tab;
            if (this.TabIdx == TabIdx) return false;
            for (idx in this.arTab) {
                Tab = this.arTab[idx];
                if (idx == TabIdx) {
                    Tab[0].className = "ActiveTab";
                    Tab[1].style.display = "block";
                    Tab[0].blur();
                } else {
                    Tab[0].className = "InactiveTab";
                    Tab[1].style.display = "none";
                }
            }
            this.TabIdx = TabIdx;

        }

        function init() {
            t1 = new TabView('TabView1');
        }

        function filetypechanged(rdo) {
            if (rdo.value == 'pdf')
                document.formupload.file_size.disabled = true;
            else
                document.formupload.file_size.disabled = false;
        }

        function confirmDelete(delUrl) {
            if (confirm("Are you sure you want to delete")) {
                document.location = delUrl;
            }
        }
    </script>
    <style type="text/css">
        .TabView {
            border: 1px #CCC solid;
            overflow-y: scroll;
            margin: 5px;
        }

        .TabView .Tabs {
            height: 40px;
            display: block;
            background: #CCC;
        }

        .TabView .Tabs a {
            display: block;
            float: left;
            width: 150px;
            height: 30px;
            line-height: 25px;
            color: #333;
            text-align: center;
            text-decoration: none;
            font-weight: bold;
            border: 0px #666 dashed;
            margin: 0px 2px;
        }

        .TabView .Tabs a.ActiveTab {
            background: #FFF;
            border: 1px #666 solid;
        }

        .TabView .Tabs a.InactiveTab {}

        .TabView .Pages {
            width: 100%;
        }

        .TabView .Pages .Page {
            border: 1px #CCC solid;
            /*height:400px;*/
        }
    </style>
    <div class="TabView" id="TabView1">
        <!--Tabs-->
        <div class="Tabs"><a>Isi Data Contents</a> <a>Upload File</a> <a>Manajemen File</a> </div>
        <!--Pages-->
        <div class="Pages">
            <!--Page 1-->
            <div class="Page">
                <?php
                foreach ($edit_konten->result_array() as $ek) {
                    $kd_konten = $ek['kode_konten'];
                    $jdl_konten = $ek['judul_konten'];
                    $isi_konten = $ek['isi_konten'];
                    $sitemap_konten = $ek['kode_sitemap'];
                }
                ?>
                <?php echo form_open_multipart('superadmin/updatekonten'); ?>
                <table height="100%">
                    <tr>
                        <td width="100">Judul Konten </td>
                        <td>
                            <input type="text" name="judul" class="input" size="100" value="<?php echo $jdl_konten; ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>Kategori Sitemap</td>
                        <td>
                            <select name="sitemap" class="input">
                                <?php
                                foreach ($menu_induk_db->result_array() as $k) {
                                    if ($k['kode_sitemap'] == $sitemap_konten) {
                                        echo "<option value='" . $k['kode_sitemap'] . "' selected>" . $k['judul_sitemap'] . "</option>";
                                    } else {
                                        echo "<option value='" . $k['kode_sitemap'] . "'>" . $k['judul_sitemap'] . "</option>";
                                    }
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top">Isi Konten </td>
                        <td>
                            <textarea name="isi"><?php echo $isi_konten; ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top"> </td>
                        <td>
                            <input type="submit" value="Simpan" class="input" /> <input type="reset" value="Hapus" class="input" /><input type="hidden" name="kd_konten" value="<?php echo $kd_konten; ?>" />
                        </td>
                    </tr>
                </table>
                </form>
            </div>

            <div class="Page">
                <!--Page 2 -->
                <form name="formupload" enctype="multipart/form-data" action="<?php echo base_url() ?>index.php/superadmin/uploadfile" method="POST"><input type="hidden" name="kd_wil" value="<?php echo $kode_wil; ?>" />
                    <table width="96%" border="0">
                        </tr>
                        <tr>
                            <td>Type File</td>
                            <td>
                                Image <input type="radio" name="filetype" value="image" checked onchange="javascript:filetypechanged(this);""> &nbsp;
	PDF <input type=" radio" name="filetype" value="pdf" onchange="javascript:filetypechanged(this);">
                            </td>
                        </tr>
                        <tr>
                            <td>Title</td>
                            <td><input type="text" name="judul" size="60" class="input" /></td>
                        </tr>
                        <tr>
                            <td>Image Size</td>
                            <td>
                                <select name="file_size">
                                    <option value="72x48">72 x 48 pixel</option>
                                    <option value="144x96">144 x 96 pixel</option>
                                    <option value="230x160">230 x 160 pixel</option>
                                    <option value="460x320">460 x 320 pixel</option>
                                    <option value="original_size">original size</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Upload file</td>
                            <td><input type="file" name="imagefile" size="50" class="input" /></td>
                        </tr>
                    </table>
                    <p><input type="submit" VALUE="Upload File" class="input"></p>

                </form>

            </div>

            <div class="Page">
                <!--Page 2 -->
                <table width="100%">
                    <tr>
                        <td><b>Judul File</b></td>
                        <td><b>Aksi File</b></td>
                    </tr>
                    <?php
                    foreach ($medialist->result_array() as $im) {
                        echo "<tr><td>" . $im['judul_file'] . "</td><td><a href='" . base_url() . "index.php/superadmin/hapusmedia/" . $im['kode_media'] . "'>Hapus</a></td></tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
    </body>

    </html>