<?php
	$a = "{username:b,password:b,auth:{1:SELECT,2:INSERT}}";
	//var_dump($_POST,json_encode($_POST),$a,json_decode($a));die;
	$action = $_GET['action'];
	$value = json_encode($_POST);
	exec("python2.7 test.py ".$action." ".addslashes($value),$output,$result);
	
	?>
	<script type="text/javascript">
	    location="../priv/index.php";
	</script>
<?
	var_dump($output);
	die;
	exec("python2.7 test.py list",$output,$result);
	//var_dump($output);
	$data = array('page'=>1,'total'=>10);
	foreach($output as $key=>$item){
		list($host,$username) = explode("\t",$item);
		$data['rows'][] = array("id"=>$key,"cell"=>array("id"=>"<input type='checkbox' value='".$username."@".$host."' name='id'/>","host"=>$host,"username"=>$username,"priv"=>""));
	}
	echo json_encode($data);