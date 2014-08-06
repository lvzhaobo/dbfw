<?php
	include '../lib/db_mysql.php';
	//$action = $_GET["action"];
	$db_mysql = new db_mysql();
	$host = empty($_POST["host"])?"%":$_POST["host"];
	$output = $db_mysql->adduser($host,$_POST["username"],$_POST["password"],join(",",$_POST["auth"]));
	?>
	<script type="text/javascript">
	    location="../priv/index.php";
	</script>
	<?php 
	var_dump($output);
	die;
	$a = "{username:b,password:b,auth:{1:SELECT,2:INSERT}}";
	//var_dump($_POST,json_encode($_POST),$a,json_decode($a));die;
	$action = $_GET['action'];
	$value = json_encode($_POST);
	exec("python2.7 test.py ".$action." ".addslashes($value),$output,$result);
	
	?>
	<script type="text/javascript">
	    //location="../priv/index.php";
	</script>
<?
	var_dump($action,$output,$result);
	die;
	exec("python2.7 test.py list",$output,$result);
	//var_dump($output);
	$data = array('page'=>1,'total'=>10);
	foreach($output as $key=>$item){
		list($host,$username) = explode("\t",$item);
		$data['rows'][] = array("id"=>$key,"cell"=>array("id"=>"<input type='checkbox' value='".$username."@".$host."' name='id'/>","host"=>$host,"username"=>$username,"priv"=>""));
	}
	echo json_encode($data);