<html>
  <body>
    <form action="db.php?action=adduser" method="post">
    <table>
	  <tr><th>用户名</th><td><input name="username" /></td></tr>
	  <tr><th>密码</th><td><input name="password" type="password" /></td></tr>
	  <tr><th>权限</th><td>
	    <input type="checkbox" name="auth[1]" id="auth_1" value="SELECT" /><label for="auth_1">SELECT</label><br />
		<input type="checkbox" name="auth[2]" id="auth_2" value="INSERT" /><label for="auth_2">INSERT</label><br />
		<input type="checkbox" name="auth[3]" id="auth_3" value="UPDATE" /><label for="auth_3">UPDATE</label><br />
		<input type="checkbox" name="auth[4]" id="auth_4" value="DELETE" /><label for="auth_4">DELETE</label><br />
	  </td></tr>
	  <tr><th></th><td></td></tr>
	</table>
	<button type="submit">确定</button>
	</form>
  </body>
</html>
<?php
	$conn = mysql_connect("localhost","root","");
	mysql_select_db("mysql");