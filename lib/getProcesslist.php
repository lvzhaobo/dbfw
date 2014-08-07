<?php
	include 'db_mysql.php';
	
	$db_mysql = new db_mysql();
	$output = $db_mysql->getProcesslist();
	
	$db_mysql = new db_mysql("a1");
	
	$rows = array();
	
	$conn_content = file_get_contents("conn_file.txt");
	$conn_content_array = explode(" ",$conn_content);
	
	foreach($output as $key=>$item){
		$rows[$item["User"]."@".$item["Host"]] = array("id"=>$key,"cell"=>array("id"=>$item["Id"],"user"=>$item["User"],"host"=>$item["Host"],"db"=>$item["db"]));
	}
	foreach($conn_content_array as $k=>$conn){
		if(empty($conn))
			continue;
		list($host,$user,$password) = explode(",",$conn);
		if(empty($host)&&empty($user))
			continue;
		if(!array_key_exists($user."@".$host,$rows))
			$rows[$user."@".$host] = array("id"=>$k+$key,"cell"=>array("id"=>"No Conn","user"=>$user,"host"=>$host,"db"=>""));
	}
	
	$data = array('page'=>1,'total'=>count($rows));
	$data['rows'] = array_values($rows);
	echo json_encode($data);