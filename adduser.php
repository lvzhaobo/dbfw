<html>
  <body>
    <form action="db.php?action=adduser" method="post">
    <table>
	  <tr><th>�û���</th><td><input name="username" /></td></tr>
	  <tr><th></th><td></td></tr>
	  <tr><th></th><td></td></tr>
	  <tr><th></th><td></td></tr>
	</table>
	<button type="submit">ȷ��</button>
	</form>
  </body>
</html>
<?php
	$conn = mysql_connect("localhost","root","");
	mysql_select_db("mysql");