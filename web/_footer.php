<?php
	$host = $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["HTTP_HOST"]."/dbfw/dreamstar.html";
	echo <<<EOF
	<div id="footer">
	  <div style="margin-top:20px;text-align:center;font-size:12px;font-weight:bold;line-height:24px;">
		<a href="$host" style="color:#2D374B;">��Ȩ����@2014 ����֮�ǹ�����</a>&nbsp;&nbsp;<a href="http://www.miitbeian.gov.cn" style="color:#2D374B;" target="_blank">��ICP��14009817��</a><br />
		<span style="">����ʹ��IE8�����ϡ������Chrome����������</span><br />
		<div>
		  <script type="text/javascript">
			var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
			document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F8a2bda973b9a9ddb210f2d43cfeedbcf' type='text/javascript'%3E%3C/script%3E"));
		  </script>
		  <a href="http://tongji.baidu.com" target="_blank"><span>ʹ�ðٶ�ͳ��</span></a>
		</div>
		<div>
		  <a href="http://www.aliyun.com/?f=run" target="_blank"><img src="http://gtms01.alicdn.com/tps/i1/T1W6.aFbFbXXcZj_6s-96-18.png" alt="�����ڰ�����" /></a> 
		</div>
	  </div>
	</div>
EOF;
?>