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
	  <legend>编辑用户</legend>
	  <div>
    <?php
		include 'db.php';
		$user = new my_user();
		$data = $user->getUserByName($_GET["user"]);
	?>
    <form action="db.php?action=edituser" method="post">
    <table>
	  <tr><th>用户名</th><td><input name="username" value="<?php echo $data["User"]?>"/></td></tr>
	  <tr><th>密码</th><td><input name="password" type="password" /></td></tr>
	  <tr><th>权限</th><td>
	    <input type="checkbox" name="auth[1]" id="auth_1" value="SELECT" <?php echo $data["Select_priv"]=="Y"?"checked='checked'":""?>/><label for="auth_1">SELECT</label><br />
		<input type="checkbox" name="auth[2]" id="auth_2" value="INSERT" <?php echo $data["Insert_priv"]=="Y"?"checked='checked'":""?>/><label for="auth_2">INSERT</label><br />
		<input type="checkbox" name="auth[3]" id="auth_3" value="UPDATE" <?php echo $data["Update_priv"]=="Y"?"checked='checked'":""?>/><label for="auth_3">UPDATE</label><br />
		<input type="checkbox" name="auth[4]" id="auth_4" value="DELETE" <?php echo $data["Delete_priv"]=="Y"?"checked='checked'":""?>/><label for="auth_4">DELETE</label><br />
	  </td></tr>
	  <tr><th></th><td></td></tr>
	</table>
	<button type="submit">确定</button><a href="index.php">取消</a>
	</form>
  </div>
	</fieldset>
</div>
</div>
	  <div class="clearfloat"></div>
	</div>
	<?php include "../web/_footer.php"?>
	<div class="clearfloat"></div>
  </body>
</html>