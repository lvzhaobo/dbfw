<?php
	include 'db_mysql.php';
	
	$db_mysql = new db_mysql();
	$output = $db_mysql->getProcesslist();
	
	$db_mysql = new db_mysql("a1");
	
	$data = array('page'=>1,'total'=>count($output));
	foreach($output as $key=>$item){
		$data['rows'][] = array("id"=>$key,"cell"=>array("id"=>$item["Id"],"user"=>$item["User"],"host"=>$item["Host"],"db"=>$item["db"]));
	}
	echo json_encode($data);