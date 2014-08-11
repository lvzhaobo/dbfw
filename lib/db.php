<?php
	include 'db_mysql.php';
	include 'db_sqlite.php';
	$action = $_GET["action"];
	
	$conn_info_tmp = file_get_contents("conn_info.conf");
	$conn_info = (array)json_decode($conn_info_tmp);
	//var_dump($conn_info);
	if($conn_info["db_type"]=="mysql"){
		$db = new db_mysql();
	}
	else if($conn_info["db_type"]=="sqlite"){
		$db = new db_sqlite($conn_info["config"]->path);
	}
	
	if($action == "list"){
		$output = $db->getDbList();
		$data = array('page'=>1,'total'=>count($output));
		foreach($output as $key=>$item){
			$data['rows'][] = array("id"=>$key,"cell"=>array("db"=>"<a href='index.php?db=".$item["Database"]."'>".$item["Database"]."</a>"));
		}
		echo json_encode($data);
	}
	
	if($action == "listTable"){
		if(empty($_GET["db"]))
			echo json_encode(array('page'=>1,'total'=>0));
		
		$output = $db->getTableList($_GET["db"]);
		$data = array('page'=>1,'total'=>count($output));
		foreach($output as $key=>$item){
			$data['rows'][] = array("id"=>$key,"cell"=>array("table"=>$item[0]));
		}
		echo json_encode($data);
	}