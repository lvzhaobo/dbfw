<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <link rel="stylesheet" type="text/css" href="../src/main.css" />
	<title>Êý¾Ý¿â·À»ðÇ½--DBFW</title>
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
	  <?php
			$file = "D:/xampp\mysql\data/mysql.log";
			$handle = fopen($file,"r");
			while($row = fgets($handle)){
				var_dump($row);echo "<br />";
			}
	  ?>
	  </div>
	  <div class="clearfloat"></div>
	</div>
	<?php include "../web/_footer.php"?>
	<div class="clearfloat"></div>
  </body>
</html>