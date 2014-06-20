<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <link rel="stylesheet" type="text/css" href="src/main.css" />
	<title>Êý¾Ý¿â·À»ðÇ½--DBFW</title>
	<LINK href="src/css.css" type=text/css rel=stylesheet>
	<SCRIPT src="src/xixi.js" type=text/javascript></SCRIPT>
  </head>
  <body>
    <?php include 'web/_header.php'?>
	<?php include "web/_nav.php"?>
	<div id="content">
	  <div id="main">
	    <?php
	    	$data = file_get_contents("data.txt");
	    	$data_array = explode("\n",$data);
	    	foreach($data_array as $item){
	    		$item_array = explode("\t",$item);
	    		echo $item."<br />";
	    		foreach($item_array as $v){
	    			//echo $v;
	    		}
	    	}
	    ?>
	    <?php 
			include "priv/db.php";
			$db = new my_user();
			$data = $db->getStatus();
			foreach($data as $key=>$item){
				echo $item[0]."=>".$item[1]."<br />";
			}
		?>
	  </div>
	  <div class="clearfloat"></div>
	</div>
	<?php include "web/_footer.php"?>
	<div class="clearfloat"></div>
  </body>
</html>