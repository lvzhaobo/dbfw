<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <link rel="stylesheet" type="text/css" href="../src/main.css" />
	<title>DBFW</title>
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
		//exec("python2.7 ../db_src/test.py list",$output,$result);
		//var_dump($output);
		//include 'db.php';
		//$user = new my_user();
		//$data = $user->getUserByName($_GET["user"]);
		list($user,$host) = explode("@",$_GET["id"]);
		$id = array("User"=>$user,"Host"=>$host);
		//var_dump(json_encode($id));
		exec("python2.7 ../db_src/test.py getGrants ".addslashes(json_encode($id)),$output,$result);
		var_dump($output,$result);
	?>
    <form action="db.php?action=edituser" method="post">
    <table>
	  <tr><th>用户名</th><td><input name="username" value="<?php echo $user?>"/></td></tr>
	  <tr><th>密码</th><td><input name="password" type="password" /></td></tr>
	  <tr><th>权限</th><td>
	    <fieldset style="float:left;">
	      <input type="checkbox" name="auth['Select_priv']" id="auth_1" value="Select_priv" <?php echo $data["Select_priv"]=="Y"?"checked='checked'":""?>/><label for="auth_1">SELECT</label><br />
		  <input type="checkbox" name="auth['Insert_priv']" id="auth_2" value="Insert_priv" <?php echo $data["Insert_priv"]=="Y"?"checked='checked'":""?>/><label for="auth_2">INSERT</label><br />
		  <input type="checkbox" name="auth['Update_priv']" id="auth_3" value="Update_priv" <?php echo $data["Update_priv"]=="Y"?"checked='checked'":""?>/><label for="auth_3">UPDATE</label><br />
		  <input type="checkbox" name="auth['Delete_priv']" id="auth_4" value="Delete_priv" <?php echo $data["Delete_priv"]=="Y"?"checked='checked'":""?>/><label for="auth_4">DELETE</label><br />
		  <input type="checkbox" name="auth['File_priv']" id="auth_5" value="File_priv" <?php echo $data["File_priv"]=="Y"?"checked='checked'":""?>/><label for="auth_5">FILE</label><br />
		</fieldset>
		<fieldset style="float:left;">
	      <input type="checkbox" name="auth['Create_priv']" id="auth_6" value="Create_priv" <?php echo $data["Create_priv"]=="Y"?"checked='checked'":""?>/><label for="auth_6">CREATE</label><br />
		  <input type="checkbox" name="auth['Alter_priv']" id="auth_7" value="Alter_priv" <?php echo $data["Alter_priv"]=="Y"?"checked='checked'":""?>/><label for="auth_7">ALTER</label><br />
		  <input type="checkbox" name="auth['Index_priv']" id="auth_8" value="Index_priv" <?php echo $data["Index_priv"]=="Y"?"checked='checked'":""?>/><label for="auth_8">INDEX</label><br />
		  <input type="checkbox" name="auth['Drop_priv']" id="auth_9" value="Drop_priv" <?php echo $data["Drop_priv"]=="Y"?"checked='checked'":""?>/><label for="auth_9">DROP</label><br />
		  <input type="checkbox" name="auth['Create_tmp_table_priv']" id="auth_10" value="Create_tmp_table_priv" <?php echo $data["Create_tmp_table_priv"]=="Y"?"checked='checked'":""?>/><label for="auth_10">CREATE TEMPORARY TABLES</label><br />
		</fieldset>
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