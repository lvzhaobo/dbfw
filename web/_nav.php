<?php 
	$host = $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["HTTP_HOST"]."/dbfw";
?>
	  <div id="nav">
	    <div id="nav_content">
		  <ul>
		    <li><a href="<?php echo $host.'/index.php'?>" title="状态">状态概览</a></li>
		    <li class='<?php echo preg_match("/priv/",$_SERVER["REQUEST_URI"])?"seleted":""?>'><a href="<?php echo $host.'/priv/index.php'?>" title="权限管理">权限管理</a></li>
			<li><a href="#" title="访问控制">访问控制</a></li>
			<li><a href="study/study.html" title="审计系统">审计系统</a></li>
			<li><a href="study/study.html" title="日志">日志</a></li>
			<li><a href="dreamstar.html" title="系统">系统</a></li>
		  </ul>
		</div>
	  </div>