<?php
	include 'db_mysql.php';
	$action = $_GET["action"];
	$conn_file = "conn_file.txt";
	
	if($action == "create"){
		$conn_content = file_get_contents($conn_file);
		$tmp_conn = $_POST["host"].",".$_POST["username"].",".$_POST["password"];
		file_put_contents($conn_file,$conn_content." ".$tmp_conn);
		
		$db_type = "mysql";
		if($db_type == "mysql"){
			$config = array("username"=>$_POST["username"],"password"=>$_POST["password"],"host"=>$_POST["host"]);
		}
		else if($db_type == "sqlite"){
			$config = array("path"=>"D://test.db");
		}
		$data = array("db_type"=>$db_type,"config"=>$config);
		file_put_contents("conn_info.conf",json_encode($data));
		
		try{
			$db_mysql = new db_mysql($_POST["username"],$_POST["password"],$_POST["host"]);
		}catch(Exception $e){
			var_dump($e->getMessage());die;
		}
	}