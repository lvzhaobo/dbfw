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
	<table style="border:1px dashed #0099FF;">
	  <tr style="border:1px dashed #0099FF;"><td width="140px;">用户</td><td width="200px;">主机</td><td width="280px;">权限</td><td width="100px;">操作</td></tr>
	<?php
		foreach($data as $item){
			$user_host = "'".$item['user']."'@'".$item['host']."'";
			if(empty($item['user']))
				$item['user'] = "任意";
			//var_dump($user_host);
			$grant = mysql_query("show grants for ".$user_host.";");
			//var_dump($item['user'],$grant);echo "-----------------------------";
			$tmp_grant_str = "";
			while($row = mysql_fetch_array($grant)){
				$tmp_grant_str .= $row[0];
			}
			echo "<tr><td>".$item['user']."</td><td>".$item["host"]."</td><td>".$tmp_grant_str."</td><td></td></tr>";
		}
	?>
	</table>
	<?php
		while($row = mysql_fetch_array($result1)){
		var_dump($row);
		echo "<hr />";
	}
  
	//var_dump($data);