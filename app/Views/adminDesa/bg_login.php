<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>Administrator Log In</title>
    <link href=" /css/style.css" rel="stylesheet" type="text/css" />
</head>

<body><br /><br /><br /><br /><br />
    <form method="POST" action="/admin/login">
        <div id="box-login">
            <table width="100%">
                <tr>
                    <td width="100" colspan="3" align="center">
                        <img src="/images/inhil-badge.png" alt="">
                        <h2><a href="">Blog Desa</a></h2>
                    </td>
                </tr>
                <tr>
                    <td width="100" colspan="3" align="center">
                    </td>
                </tr>
                <tr>
                    <td width="100">Username</td>
                    <td width="20">:</td>
                    <td><input type="text" name="username" class="input" size="40" /></td>
                </tr>
                <tr>
                    <td width="100">Password</td>
                    <td width="20">:</td>
                    <td><input type="password" name="password" class="input" size="40" /></td>
                </tr>
                <tr>
                    <td width="100"></td>
                    <td width="20"></td>
                    <td><input type="submit" class="tombol" value="Masuk" /> <input type="reset" class="tombol" value="Hapus" /></td>
                </tr>
            </table>
        </div>
    </form>
</body>

</html>