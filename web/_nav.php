<?php 
	$host = $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["HTTP_HOST"]."/dbfw";
?>
	  <div id="nav">
	    <div id="nav_content">
		  <ul>
		    <li><a href="<?php echo $host.'/index.php'?>" title="״̬">״̬</a></li>
		    <li class='<?php echo preg_match("/priv/",$_SERVER["REQUEST_URI"])?"seleted":""?>'><a href="<?php echo $host.'/priv/index.php'?>" title="Ȩ�޹���">Ȩ�޹���</a></li>
			<li class='<?php echo preg_match("/acl/",$_SERVER["REQUEST_URI"])?"seleted":""?>'><a href="<?php echo $host.'/acl/index.php'?>" title="���ʿ���">���ʿ���</a></li>
			<li class='<?php echo preg_match("/audit/",$_SERVER["REQUEST_URI"])?"seleted":""?>'><a href="<?php echo $host.'/audit/index.php'?>" title="���ϵͳ">���ϵͳ</a></li>
			<li class='<?php echo preg_match("/report/",$_SERVER["REQUEST_URI"])?"seleted":""?>'><a href="<?php echo $host.'/log/index.php'?>" title="��־">����澯</a></li>
			<li class='<?php echo preg_match("/log/",$_SERVER["REQUEST_URI"])?"seleted":""?>'><a href="<?php echo $host.'/log/index.php'?>" title="��־">��־</a></li>
			<li class='<?php echo preg_match("/firewall/",$_SERVER["REQUEST_URI"])?"seleted":""?>'><a href="<?php echo $host.'/log/index.php'?>" title="����ǽ">����ǽ</a></li>
			<li class='<?php echo preg_match("/network/",$_SERVER["REQUEST_URI"])?"seleted":""?>'><a href="<?php echo $host.'/log/index.php'?>" title="����">����</a></li>
			<li class='<?php echo preg_match("/system/",$_SERVER["REQUEST_URI"])?"seleted":""?>'><a href="<?php echo $host.'/system/index.php'?>" title="����">ϵͳ</a></li>
		  </ul>
		</div>
	  </div>