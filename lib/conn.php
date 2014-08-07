<?php
	include 'db_mysql.php';
	$action = $_GET["action"];
	$conn_file = "conn_file.txt";
	
	if($action == "create"){
		$conn_content = file_get_contents($conn_file);
		$tmp_conn = $_POST["host"].",".$_POST["username"].",".$_POST["password"];
		file_put_contents($conn_file,$conn_content." ".$tmp_conn);
		
		try{
			$db_mysql = new db_mysql($_POST["username"],$_POST["password"],$_POST["host"]);
		}catch(Exception $e){
			var_dump($e->getMessage());die;
		}
	}