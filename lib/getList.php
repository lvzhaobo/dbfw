<?php
	include 'db_mysql.php';
	//$action = $_GET["action"];
	$db_mysql = new db_mysql();
	$output = $db_mysql->getUserList();
	//exec("python2.7 test.py ".$action,$output,$result);
	$data = array('page'=>1,'total'=>count($output));
	foreach($output as $key=>$item){
		//var_dump($item);
		//list($host,$username,$priv) = explode("\t",$item);
		//var_dump(json_decode($priv));
		$username = $item["USER"];
		$host = $item["HOST"];
		$priv = $db_mysql->getGrantByUserHost($username,$host);
		$data['rows'][] = array("id"=>$key,"cell"=>array("id"=>"<input type='checkbox' value='".$username."@".$host."' name='id' id='user_select'/>","host"=>$host,"username"=>$username,"priv"=>$priv));
	}
	echo json_encode($data);