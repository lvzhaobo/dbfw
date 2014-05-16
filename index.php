<?php
	$conn = mysql_connect("localhost","root","");
	mysql_select_db("mysql");
	$result = mysql_query("select * from user;");
	$result1 = mysql_query("show grants for 'dbfw1'@'%';");
	$result2 = mysql_query("grant delete on user to dbfw1;");
	//var_dump(mysql_error());
	$data = array();
	while($row = mysql_fetch_array($result)){
		//var_dump($row);
		//echo "<hr />";
		$data[] = array('host'=>$row["Host"],'user'=>$row["User"],'password'=>$row["Password"]);
	}
	
?>
<html>
  <head>
	<style type="text/css">
	  table td {
		border: 0.1em solid #000000;
	  }
	  table {
	    border-collapse: collapse;
	  }
	</style>
  </head>
  <body>
    <div>
	  <a href="adduser.php">添加用户</a>
	</div>
	<table>
	  <thead style="background-color:#E5E5E5;">
	    <tr><td width="140px;">用户</td><td width="200px;">主机</td><td width="280px;">权限</td><td width="100px;">操作</td></tr>
	  </thead>
	  <tbody>
	<?php
		foreach($data as $item){
			$user_host = "'".$item['user']."'@'".$item['host']."'";
			if(empty($item['user']))
				$item['user'] = "任意";
			//var_dump($user_host);
			$grant = mysql_query("show grants for ".$user_host.";");
			if(!$grant)
			var_dump("show grants for ".$user_host.";");echo "-----------------------------";
			$tmp_grant_str = "";
			while($row = mysql_fetch_array($grant)){
				$tmp_grant_str .= $row[0];
			}
			echo "<tr><td>".$item['user']."</td><td>".$item["host"]."</td><td>".$tmp_grant_str."</td><td><a href='edit.php?user=".$item['user']."'>编辑</a></td></tr>";
		}
	?>
	  </tbody>
	</table>
  </body>
	<?php
		while($row = mysql_fetch_array($result1)){
		//var_dump($row);
		//echo "<hr />";
	}
  
	//var_dump($data);