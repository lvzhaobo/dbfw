<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <link rel="stylesheet" type="text/css" href="../src/main.css" />
	<title>���ݿ����ǽ--DBFW</title>
	<style type="text/css">
	  table td {
		border: 0.1em solid #000000;
	  }
	  table {
	    border-collapse: collapse;
	  }
	</style>
  </head>
  <body>
    <?php include '../web/_header.php'?>
	<?php include "../web/_nav.php"?>
	<div id="content">
	  <div id="main" style="padding:10px 0;">
		<p>
		  1.���Կ��ƶ����ݿ⡢���еȵĿ���
		  2.���Ը�������IP��ʱ��Ƚ��п���
		  3.���Զ��û����裨GRANT����ȡ����REVOKE��Ȩ��
		  4.���ڽ�ɫ��Ȩ�޿���
		</p>
		<?php
			$conn = mysql_connect("localhost","root","");
			mysql_select_db("mysql");
			$result = mysql_query("select * from user;");
			$data = array();
			while($row = mysql_fetch_array($result)){
				//var_dump($row);
				//echo "<hr />";
				$data[] = array('host'=>$row["Host"],'user'=>$row["User"],'password'=>$row["Password"]);
			}
			
		?>
		<div style="height:24px;padding:5px 2%;">
		  <div style="float:left;">
		    <span style="font-weight:bold;">�û�Ȩ��</span>
		  </div>
		  <div style="float:right;">
		    <a href="adduser.php">����û�</a>
		  </div>
		</div>
		<table style="margin:0 2% 10px 2%;width:96%;">
		  <thead style="background-color:#E5E5E5;">
	        <tr><td width="140px;">�û�</td><td width="200px;">����</td><td width="280px;">Ȩ��</td><td width="100px;">����</td></tr>
		  </thead>
		  <tbody>
			<?php
				foreach($data as $item){
					$user_host = "'".$item['user']."'@'".$item['host']."'";
					if(empty($item['user']))
						$item['user'] = "����";
					//var_dump($user_host);
					$grant = mysql_query("show grants for ".$user_host.";");
					//if(!$grant)
						//var_dump("show grants for ".$user_host.";");echo "-----------------------------";
					$tmp_grant_str = "";
					while($row = mysql_fetch_array($grant)){
						$tmp_grant_str .= $row[0]."<br />";
					}
					echo "<tr><td>".$item['user']."</td><td>".$item["host"]."</td><td>".$tmp_grant_str."</td><td><a href='edituser.php?user=".$item['user']."'>�༭</a></td></tr>";
				}
			?>
			</tbody>
		  </table>
		</div>
	  <div class="clearfloat"></div>
	</div>
	<?php include "../web/_footer.php"?>
	<div class="clearfloat"></div>
  </body>
</html>