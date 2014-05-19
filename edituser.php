<html>
  <body>
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
	<button type="submit">确定</button>
	</form>
  </body>
</html>