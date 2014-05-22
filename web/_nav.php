<?php 
	$host = $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["HTTP_HOST"]."/dbfw";
?>
	  <div id="nav">
	    <div id="nav_content">
		  <ul>
		    <li><a href="<?php echo $host.'/index.php'?>" title="状态">状态</a></li>
		    <li class='<?php echo preg_match("/priv/",$_SERVER["REQUEST_URI"])?"seleted":""?>'><a href="<?php echo $host.'/priv/index.php'?>" title="权限管理">权限管理</a></li>
			<li class='<?php echo preg_match("/acl/",$_SERVER["REQUEST_URI"])?"seleted":""?>'><a href="<?php echo $host.'/acl/index.php'?>" title="访问控制">访问控制</a></li>
			<li class='<?php echo preg_match("/audit/",$_SERVER["REQUEST_URI"])?"seleted":""?>'><a href="<?php echo $host.'/audit/index.php'?>" title="审计系统">审计系统</a></li>
			<li class='<?php echo preg_match("/report/",$_SERVER["REQUEST_URI"])?"seleted":""?>'><a href="<?php echo $host.'/log/index.php'?>" title="日志">报表告警</a></li>
			<li class='<?php echo preg_match("/log/",$_SERVER["REQUEST_URI"])?"seleted":""?>'><a href="<?php echo $host.'/log/index.php'?>" title="日志">日志</a></li>
			<li class='<?php echo preg_match("/firewall/",$_SERVER["REQUEST_URI"])?"seleted":""?>'><a href="<?php echo $host.'/log/index.php'?>" title="防火墙">防火墙</a></li>
			<li class='<?php echo preg_match("/network/",$_SERVER["REQUEST_URI"])?"seleted":""?>'><a href="<?php echo $host.'/log/index.php'?>" title="网络">网络</a></li>
			<li class='<?php echo preg_match("/system/",$_SERVER["REQUEST_URI"])?"seleted":""?>'><a href="<?php echo $host.'/system/index.php'?>" title="网络">系统</a></li>
		  </ul>
		</div>
	  </div>