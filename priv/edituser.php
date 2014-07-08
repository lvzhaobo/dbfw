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
		exec("python2.7 ../db_src/test.py getGrants ".addslashes(json_encode($id)),$data,$result);
		var_dump($data);
	?>
    <form action="db.php?action=edituser" method="post">
    <table>
	  <tr><th>用户名</th><td><input name="username" value="<?php echo $user?>"/></td></tr>
	  <tr><th>密码</th><td><input name="password" type="password" /></td></tr>
	  <tr><th>权限</th><td>
	    <fieldset style="float:left;">
		  <?php 
				$priv_data = array("SELECT","INSERT","UPDATE","DELETE","FILE");
				foreach($priv_data as $key=>$priv_item){
					echo '<input type="checkbox" name="auth['.$key.']" id="auth_'.$key.'" value="'.$priv_item.'" '. (preg_match("/".$priv_item."/",$data[0])?"checked='checked'":"").'/><label for="auth_'.$key.'">'.$priv_item.'</label><br />';
				}
		  ?>
		</fieldset>
		<fieldset style="float:left;">
		  <?php 
				$priv_data = array("CREATE","ALERT","INDEX","DROP","CREATE_TMP_TABLE");
				foreach($priv_data as $key=>$priv_item){
					echo '<input type="checkbox" name="auth['.$key.']" id="auth_'.$key.'" value="'.$priv_item.'" '. (preg_match("/".$priv_item."/",$data[0])?"checked='checked'":"").'/><label for="auth_'.$key.'">'.$priv_item.'</label><br />';
				}
		  ?>
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