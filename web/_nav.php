<?php 
	$host = $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["HTTP_HOST"]."/dbfw";
?>
	  <div id="nav">
	    <div id="nav_content">
		  <ul>
		    <li><a href="<?php echo $host.'/index.php'?>" title="״̬">״̬����</a></li>
		    <li class='<?php echo preg_match("/priv/",$_SERVER["REQUEST_URI"])?"seleted":""?>'><a href="<?php echo $host.'/priv/index.php'?>" title="Ȩ�޹���">Ȩ�޹���</a></li>
			<li><a href="#" title="���ʿ���">���ʿ���</a></li>
			<li><a href="study/study.html" title="���ϵͳ">���ϵͳ</a></li>
			<li><a href="study/study.html" title="��־">��־</a></li>
			<li><a href="dreamstar.html" title="ϵͳ">ϵͳ</a></li>
		  </ul>
		</div>
	  </div>