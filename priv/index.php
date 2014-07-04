<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <link rel="stylesheet" type="text/css" href="../src/main.css" />
    <title>DBFW</title>
    <link rel="stylesheet" href="../web/flexigrid-1.1/css/flexigrid.css" type="text/css"></link>  
    <script src="//code.jquery.com/jquery-1.8.0.min.js"></script>
    <script type="text/javascript" src="../web/flexigrid-1.1/js/flexigrid.pack.js"></script>  
  </head>
  <body>
    <?php include '../web/_header.php'?>
    <?php include "../web/_nav.php"?>
    <div id="content">
      <div id="main" style="">
	    <div style="padding:10px 20px;">
		  <div id="title">
		    <span style="line-height:32px;">Privilege</span>
		  </div>
          <div id="flex1" class="flex1" style="width:100%;height:100%;"></div>
		</div>
		<script type="text/javascript">
		$("#flex1").flexigrid({
			url: '../db_src/a.php',
			dataType: 'json',
			colModel : [
				{display: '', name : 'id', width : 40, sortable : true, align: 'left'},
				{display: '主机', name : 'host', width : 180, sortable : true, align: 'left'},
				{display: '用户名', name : 'username', width : 180, sortable : true, align: 'left'},
				{display: '权限', name : 'priv', width : 450, sortable : true, align: 'left'}
				],
			buttons : [
				{name: '添加', bclass: 'add', onpress : test},
				{name: '编辑', bclass: 'edit', onpress : test},
				{name: '删除', bclass: 'delete', onpress : test},
				{separator: true}
				],
			searchitems : [
				{display: 'ISO', name : 'host'},
				{display: 'Name', name : 'username', isdefault: true}
				],
			sortname: "iso",
			sortorder: "asc",
			usepager: true,
			title: '用户权限',
			useRp: true,
			rp: 15,
			showTableToggleBtn: true,
			width: 920,
			height: 400
		});
		function test(){
			location = "adduser.php";
		}
		</script>

        <?php/*
            try{
                exec("python2.7 ../test1.py");
            }catch(Exception $e){
                var_dump($e->getMessage());
            }

            $data = file_get_contents("../priv.txt");
            $data_array = explode("\n",$data);
            */
            /*$conn = mysql_connect("localhost","root","");
            mysql_select_db("mysql");
            $result = mysql_query("select * from user;");
            $data = array();
            while($row = mysql_fetch_array($result)){
                //var_dump($row);
                //echo "<hr />";
                $data[] = array('host'=>$row["Host"],'user'=>$row["User"],'password'=>$row["Password"]);
            }*/
            
        ?>
		<?php /*?>
        <div style="height:24px;padding:5px 2%;">
          <div style="float:left;">
            <span style="font-weight:bold;">用户权限</span>
          </div>
          <div style="float:right;">
            <a href="adduser.php">添加用户</a>
          </div>
        </div>
        <table style="margin:0 2% 10px 2%;width:96%;">
          <thead style="background-color:#E5E5E5;">
            <tr><td width="140px;">用户</td><td width="200px;">主机</td><td width="280px;">权限</td><td width="100px;">操作</td></tr>
          </thead>
          <tbody>
            <?php
                foreach($data_array as $item_v){
                    $item = explode("\t",$item_v);
                    $user_host = "'".$item[0]."'@'".$item[1]."'";
                    if(empty($item[0]))
                        $item[0] = "任意";
                    //var_dump($user_host);
                    //$grant = mysql_query("show grants for ".$user_host.";");
                    //if(!$grant)
                        //var_dump("show grants for ".$user_host.";");echo "-----------------------------";
                    $tmp_grant_str = "";
                    //while($row = mysql_fetch_array($grant)){
                        //$tmp_grant_str .= $row[0]."<br />";
                    //}
                    $tmp_grant_str = "";
                    echo "<tr><td>".$item[0]."</td><td>".$item[1]."</td><td>".$tmp_grant_str."</td><td><a href='edituser.php?user=".$item[0]."'>编辑</a></td></tr>";
                }
            ?>
            </tbody>
          </table>
		  <?php */?>
        </div>
      <div class="clearfloat"></div>
    </div>
    <?php include "../web/_footer.php"?>
    <div class="clearfloat"></div>
  </body>
</html>