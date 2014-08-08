<?php
	include 'db_mysql.php';
	$action = $_GET["action"];
	
	if($action == "list"){
		$db_mysql = new db_mysql();
		$output = $db_mysql->getDbList();
		$data = array('page'=>1,'total'=>count($output));
		foreach($output as $key=>$item){
			$data['rows'][] = array("id"=>$key,"cell"=>array("db"=>"<a href='index.php?db=".$item["Database"]."'>".$item["Database"]."</a>"));
		}
		echo json_encode($data);
	}
	
	if($action == "listTable"){
		if(empty($_GET["db"]))
			echo json_encode(array('page'=>1,'total'=>0);
		
		$db_mysql = new db_mysql();
		$output = $db_mysql->getTableList($_GET["db"]);
		$data = array('page'=>1,'total'=>count($output));
		foreach($output as $key=>$item){
			$data['rows'][] = array("id"=>$key,"cell"=>array("table"=>$item[0]));
		}
		echo json_encode($data);
	}