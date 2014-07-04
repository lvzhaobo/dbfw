<?php 
	$host = $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["HTTP_HOST"]."/dbfw";
?>
	  <div id="nav">
	    <div id="nav_content">
		  <ul>
		    <li><a href="<?php echo $host.'/index.php'?>" title="Home">Home</a></li>
		    <li class='<?php echo preg_match("/priv/",$_SERVER["REQUEST_URI"])?"seleted":""?>'><a href="<?php echo $host.'/priv/index.php'?>" title="Privilege">Privilege</a></li>
		  </ul>
		</div>
	  </div>