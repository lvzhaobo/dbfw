<?php
class db_sqlite
{
	private $conn = "";
	private $sqlite;
	private $_db_file;
	
	public function __construct($path){
		$this->sqlite = new Sqlite3($path);
		$this->_db_file = $path;
	}
	
	public function getUserList(){
		$sql = "SELECT USER,HOST FROM user ORDER BY USER;";
		$result = mysql_query($sql);
		$data = array();
		while($row = mysql_fetch_array($result)){
			$data[] = $row;
		}
		return $data;
	}
	
	public function getUserByName($username){
		$result = mysql_query("select * from user where User='".$username."';");
		$data = mysql_fetch_assoc($result);
		//var_dump($data);
		return $data;
	}
	
	public function getGrantByUserHost($username = "",$host = ""){
		$username = empty($username)?"*":$username;
		$host = empty($host)?"%":$host;
		$str = $username."@'".$host."'";
		$sql = "SHOW GRANTS FOR ".$str;
		//var_dump($sql);
		$result = mysql_query($sql);
		if($result!=false){
			$data = mysql_fetch_assoc($result);
			$value = array_values($data);
		}
		else
			return "";
		//var_dump($data);
		return $value[0];
	}
	
	public function getProcesslist(){
		$sql = "SHOW PROCESSLIST";
		$result = mysql_query($sql);
		while($row = mysql_fetch_array($result)){
			$data[] = $row;
		}
		return $data;
	}
	
	public function adduser($host,$username,$password,$priv){
		$sql = "CREATE USER '".$username."'@'".$host."' IDENTIFIED BY '".$password."';";
		$sql1 = "GRANT ".$priv." ON * . * TO '".$username."'@'".$host."' IDENTIFIED BY '".$password."';";
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
	
	public function getDbList(){
		return array(array("Database"=>$this->_db_file));
	}
	
	public function getTableList($db){
		$db = new Sqlite3($db);
		//$a = $db->exec("create table lv_2 (id integer, name varchar(128))");
		$b = $db->exec("select * from lv_2;");
		$c = $db->query("select * from sqlite_master where type='table';");
		//var_dump($a,$b,$c->fetchArray());
		$data = array();
		while($row = $c->fetchArray()){
			$data[] = array($row["name"]);
		}
		//var_dump($data);
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
?>
