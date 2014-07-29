<?php
	$action = $_GET["action"];
	
	if($action=="list"){
		exec("python2.7 test.py ".$action,$output,$result);
		
		$data = array('page'=>1,'total'=>10);
		foreach($output as $key=>$item){
			list($host,$username,$priv) = explode("\t",$item);
			//var_dump(json_decode($priv));
			$priv = join("<br />",json_decode($priv));
			$data['rows'][] = array("id"=>$key,"cell"=>array("id"=>"<input type='checkbox' value='".$username."@".$host."' name='id' id='user_select'/>","host"=>$host,"username"=>$username,"priv"=>$priv));
		}
		echo json_encode($data);
	}