<html>
  <body>
    <form action="db.php?action=adduser" method="post">
    <table>
	  <tr><th>用户名</th><td><input name="username" /></td></tr>
	  <tr><th></th><td></td></tr>
	  <tr><th></th><td></td></tr>
	  <tr><th></th><td></td></tr>
	</table>
	<button type="submit">确定</button>
	</form>
  </body>
</html>
<?php
	$conn = mysql_connect("localhost","root","");
	mysql_select_db("mysql");