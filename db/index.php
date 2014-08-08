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
		  <div style="float:left;">
          <div id="flex1" class="flex1" style="width:100%;height:100%;float:left;"></div>
		  </div>
		  <div style="float:left;margin-left:10px;">
		  <div id="flex2" class="flex2" style="width:100%;height:100%;float:left;"></div>
		  </div>
		</div>
		<script type="text/javascript">
		$("#flex1").flexigrid({
			url: '../lib/db.php?action=list',
			dataType: 'json',
			colModel : [
				{display: '数据库', name : 'db', width : 180, sortable : true, align: 'left'}
				],
			buttons : [
				{name: '添加', bclass: 'add', onpress : addUser},
				{name: '编辑', bclass: 'edit', onpress : editUser},
				{name: '删除', bclass: 'delete', onpress : deleteUser},
				{separator: true}
				],
			searchitems : [
				{display: 'ISO', name : 'host'},
				{display: 'Name', name : 'username', isdefault: true}
				],
			sortname: "iso",
			sortorder: "asc",
			usepager: true,
			title: '数据库列表',
			useRp: true,
			rp: 15,
			showTableToggleBtn: true,
			width: 360,
			height: 400
		});
		function addUser(){
			location = "adduser.php";
		}
		function editUser(){
			var id = $('input[id="user_select"]:checked').val();
			id = "aa@localhost"
			location = "edituser.php?id="+id;
		}
		function deleteUser(){
			var id = $('input[id="user_select"]:checked').val();
			location = "deleteuser.php"+id;
		}
		$("#flex2").flexigrid({
			url: '../lib/db.php?action=listTable&db=<?php echo $_GET["db"]?>',
			dataType: 'json',
			colModel : [
				{display: '数据表', name : 'table', width : 260, sortable : true, align: 'left'}
				],
			buttons : [
				{name: '添加', bclass: 'add', onpress : addUser},
				{name: '编辑', bclass: 'edit', onpress : editUser},
				{name: '删除', bclass: 'delete', onpress : deleteUser},
				{separator: true}
				],
			searchitems : [
				{display: 'ISO', name : 'host'},
				{display: 'Name', name : 'username', isdefault: true}
				],
			sortname: "iso",
			sortorder: "asc",
			usepager: true,
			title: '<?php echo $_GET["db"]?>中的数据表',
			useRp: true,
			rp: 15,
			showTableToggleBtn: true,
			width: 540,
			height: 400
		});
		</script>
        </div>
      <div class="clearfloat"></div>
    </div>
    <?php include "../web/_footer.php"?>
    <div class="clearfloat"></div>
  </body>
</html>