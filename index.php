<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <link rel="stylesheet" type="text/css" href="src/main.css" />
    <title>DBFW</title>
    <link rel="stylesheet" href="web/flexigrid-1.1/css/flexigrid.css" type="text/css"></link>  
    <script src="//code.jquery.com/jquery-1.8.0.min.js"></script>
    <script type="text/javascript" src="web/flexigrid-1.1/js/flexigrid.pack.js"></script>  
  </head>
  <body>
    <?php include 'web/_header.php'?>
    <?php include "web/_nav.php"?>
    <div id="content">
      <div id="main" style="">
	    <div style="padding:10px 20px;">
		  <div id="title">
		    <span style="line-height:32px;">������Ϣ</span>
		  </div>
          <div id="flex1" class="flex1" style="width:100%;height:100%;"></div>
		</div>
		<script type="text/javascript">
		$("#flex1").flexigrid({
			url: 'lib/getProcesslist.php',
			dataType: 'json',
			colModel : [
				{display: 'ID', name : 'id', width : 40, sortable : true, align: 'left'},
				{display: '�û���', name : 'user', width : 180, sortable : true, align: 'left'},
				{display: '����', name : 'host', width : 180, sortable : true, align: 'left'},
				{display: '�������ݿ�', name : 'db', width : 450, sortable : true, align: 'left'}
				],
			/*buttons : [
				{name: '���', bclass: 'add', onpress : addUser},
				{name: '�༭', bclass: 'edit', onpress : editUser},
				{name: 'ɾ��', bclass: 'delete', onpress : deleteUser},
				{separator: true}
				],*/
			sortname: "id",
			sortorder: "asc",
			usepager: true,
			title: '������Ϣ',
			useRp: true,
			rp: 15,
			showTableToggleBtn: true,
			width: 920,
			height: 400
		});
		</script>
        </div>
      <div class="clearfloat"></div>
    </div>
    <?php include "web/_footer.php"?>
    <div class="clearfloat"></div>
  </body>
</html>