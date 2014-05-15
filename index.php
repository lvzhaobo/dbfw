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
	
	while($row = mysql_fetch_array($result1)){
		var_dump($row);
		echo "<hr />";
	}
  
	//var_dump($data);