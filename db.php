<?php
	$conn = mysql_connect("localhost","root","");
	mysql_select_db("mysql");
	
	$username = $_POST["username"];
	$password = $_POST["password"];
	//$result = mysql_query("insert into user (user)values('".$_POST["username"]."');");
	
	
	$sql = "CREATE USER '".$username."'@'%' IDENTIFIED BY '".$password."';";
	$sql1 = "GRANT USAGE ON * . * TO '".$username."'@'%' IDENTIFIED BY '".$password."' WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0 ;";
	
	mysql_query($sql);
	mysql_query($sql1);
	
	var_dump(mysql_error());