<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <link rel="stylesheet" type="text/css" href="../src/main.css" />
	<title>数据库防火墙--DBFW</title>
  </head>
  <body>
    <?php include '../web/_header.php'?>
	<?php include "../web/_nav.php"?>
	<div id="content">
	  <div id="main" style="padding:10px 0;">
	  <div style="margin:20px 40px;">
	  <fieldset>
	  <legend>添加用户</legend>
	  <div>
    <form action="../db_src/dispatch.php?action=adduser" method="post">
    <table>
	  <tr><th>用户名</th><td><input name="username" value=""/></td></tr>
	  <tr><th>密码</th><td><input name="password" type="password" value=""/></td></tr>
	  <tr><th>权限</th><td>
	    <input type="checkbox" name="auth[1]" id="auth_1" value="SELECT" /><label for="auth_1">SELECT</label><br />
		<input type="checkbox" name="auth[2]" id="auth_2" value="INSERT" /><label for="auth_2">INSERT</label><br />
		<input type="checkbox" name="auth[3]" id="auth_3" value="UPDATE" /><label for="auth_3">UPDATE</label><br />
		<input type="checkbox" name="auth[4]" id="auth_4" value="DELETE" /><label for="auth_4">DELETE</label><br />
	  </td></tr>
	  <tr><th></th><td></td></tr>
	</table>
	<button type="submit">确定</button><a href="index.php">取消</a>
	</form>
	</div>
	</fieldset>
<?php
	$conn = mysql_connect("localhost","root","");
	mysql_select_db("mysql");
?>
</div>
</div>
	  <div class="clearfloat"></div>
	</div>
	<?php include "../web/_footer.php"?>
	<div class="clearfloat"></div>
  </body>
</html>