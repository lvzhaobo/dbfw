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
	  <a href="adduser.php">����û�</a>
	</div>
	<table>
	  <thead style="background-color:#E5E5E5;">
	    <tr><td width="140px;">�û�</td><td width="200px;">����</td><td width="280px;">Ȩ��</td><td width="100px;">����</td></tr>
	  </thead>
	  <tbody>
	<?php
		foreach($data as $item){
			$user_host = "'".$item['user']."'@'".$item['host']."'";
			if(empty($item['user']))
				$item['user'] = "����";
			//var_dump($user_host);
			$grant = mysql_query("show grants for ".$user_host.";");
			if(!$grant)
			var_dump("show grants for ".$user_host.";");echo "-----------------------------";
			$tmp_grant_str = "";
			while($row = mysql_fetch_array($grant)){
				$tmp_grant_str .= $row[0];
			}
			echo "<tr><td>".$item['user']."</td><td>".$item["host"]."</td><td>".$tmp_grant_str."</td><td><a href='edit.php?user=".$item['user']."'>�༭</a></td></tr>";
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