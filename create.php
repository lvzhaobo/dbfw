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
    <form action="../db_src/dispatch.php" method="post">
    <table>
	  <tr><th><label for="host">主机</label></th><td><input name="host" value="" id="host"/></td></tr>
	  <tr><th><label for="username">用户名</label></th><td><input name="username" value="" id="username"/></td></tr>
	  <tr><th><label for="password">密码</label></th><td><input name="password" type="password" value="" id="password"/></td></tr>
	  <tr><th><label for="">权限</label></th><td>
	    <fieldset style="float:left;">
		  <?php 
				$i = 0;
				$priv_data = array("SELECT","INSERT","UPDATE","DELETE","FILE");
				foreach($priv_data as $priv_item){
					$i++;
					echo '<input type="checkbox" name="auth['.$i.']" id="auth_'.$i.'" value="'.$priv_item.'" /><label for="auth_'.$i.'">'.$priv_item.'</label><br />';
				}
		  ?>
		</fieldset>
		<fieldset style="float:left;">
		  <?php 
				$priv_data = array("CREATE","ALTER","INDEX","DROP","CREATE_TMP_TABLE");
				foreach($priv_data as $key=>$priv_item){
					$i++;
					echo '<input type="checkbox" name="auth['.$i.']" id="auth_'.$i.'" value="'.$priv_item.'" /><label for="auth_'.$i.'">'.$priv_item.'</label><br />';
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