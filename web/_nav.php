<?php 
	$host = (empty($_SERVER["REQUEST_SCHEME"])?"http":$_SERVER["REQUEST_SCHEME"])."://".$_SERVER["HTTP_HOST"]."/dbfw";
	//$selected = preg_match("/priv/",$_SERVER["REQUEST_URI"])?"seleted":"";
?>
	  <div id="nav">
	    <div id="nav_content">
		  <ul>
		    <li><a href="<?php echo $host.'/index.php'?>" title="Home">Home</a></li>
            <li class='<?php echo preg_match("/priv/",$_SERVER["REQUEST_URI"])?"seleted":""?>'><a href="<?php echo $host.'/priv/index.php'?>" title="Privilege">Privilege</a></li>
			<li class='<?php echo preg_match("/\/db\//",$_SERVER["REQUEST_URI"])?"seleted":""?>'><a href="<?php echo $host.'/db/index.php'?>" title="DB">DB</a></li>
		  </ul>
		</div>
	  </div>