<?php
	
	/*$conn = mysql_connect("localhost","root","");
	mysql_select_db("mysql");
	
	$username = $_POST["username"];
	$password = $_POST["password"];
	//$result = mysql_query("insert into user (user)values('".$_POST["username"]."');");
	
	$auth = join($_POST["auth"],",");
	$sql = "CREATE USER '".$username."'@'%' IDENTIFIED BY '".$password."';";
	$sql1 = "GRANT ".$auth." ON * . * TO '".$username."'@'%' IDENTIFIED BY '".$password."' WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0 ;";
	
	mysql_query($sql);
	mysql_query($sql1);
	
	var_dump(mysql_error());*/
	
class my_user
{
	private $conn = "";
	
	public function __construct(){
		$this->conn = mysql_connect("localhost","root","");
		mysql_select_db("mysql");
	}
	
	public function getUserByName($username){
		$result = mysql_query("select * from user where User='".$username."';");
		$data = mysql_fetch_assoc($result);
		var_dump($data);
		return $data;
	}
	
	public function adduser($username,$password,$priv){
		$sql = "CREATE USER '".$username."'@'%' IDENTIFIED BY '".$password."';";
		$sql1 = "GRANT ".$priv." ON * . * TO '".$username."'@'%' IDENTIFIED BY '".$password."';";
		mysql_query($sql);
		mysql_query($sql1);
	}
	
	public function getStatus(){
		$sql = "SHOW STATUS;";
		$result = mysql_query($sql);
		while($row = mysql_fetch_array($result)){
			$data[] = $row;
		}
		return $data;
	}
	
	public function close(){
		mysql_close($this->conn);
	}
}
	$action = @$_GET["action"];
	if($action=="adduser"){
		$user = new my_user();
		$username = $_POST["username"];
		$password = $_POST["password"];
		$priv = join($_POST["auth"],",");
		$user->adduser($username,$password,$priv);
		
		redirect();
	}

	if($action=="edituser"){
		$user = new my_user();
		$username = $_POST["username"];
		$password = $_POST["password"];
		$priv = join($_POST["auth"],",");
		
		$sql_update_item = array();
		foreach($_POST["auth"] as $item){
			$sql_update_item[] = $item."='Y'";
		}
		$sql_update = "UPDATE mysql.user SET ".join(",",$sql_update_item)." WHERE User='".$username."';";
		var_dump($sql_update);//die;
		$sql = "REVOKE ALL ON *.* FROM '".$username."'@'%'";
		$sql1 = "GRANT ".$priv." ON user.* TO '".$username."'@'%' IDENTIFIED BY '".$password."' WITH MAX_QUERIES_PER_HOUR 0 MAX_CONNECTIONS_PER_HOUR 0 MAX_UPDATES_PER_HOUR 0 MAX_USER_CONNECTIONS 0 ;";
		mysql_query($sql);
		mysql_query($sql_update);
		
		mysql_query($sql1);
		//var_dump(mysql_error(),$sql,$sql1);
		
		//$user->close();
		redirect();
	}
	
	function redirect(){
		echo <<<EOF
<script language='javascript' type='text/javascript'>
alert("²Ù×÷³É¹¦");
window.location.href='index.php';
</script>	
EOF;
	}
?>
