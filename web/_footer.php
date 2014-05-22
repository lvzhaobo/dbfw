<?php
	$host = $_SERVER["REQUEST_SCHEME"]."://".$_SERVER["HTTP_HOST"]."/dbfw/dreamstar.html";
	echo <<<EOF
	<div id="footer">
	  <div style="margin-top:20px;text-align:center;font-size:12px;font-weight:bold;line-height:24px;">
		<a href="$host" style="color:#2D374B;">版权所有@2014 梦想之星工作室</a>&nbsp;&nbsp;<a href="http://www.miitbeian.gov.cn" style="color:#2D374B;" target="_blank">沪ICP备14009817号</a><br />
		<span style="">建议使用IE8及以上、火狐、Chrome等浏览器浏览</span><br />
		<div>
		  <script type="text/javascript">
			var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
			document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F8a2bda973b9a9ddb210f2d43cfeedbcf' type='text/javascript'%3E%3C/script%3E"));
		  </script>
		  <a href="http://tongji.baidu.com" target="_blank"><span>使用百度统计</span></a>
		</div>
		<div>
		  <a href="http://www.aliyun.com/?f=run" target="_blank"><img src="http://gtms01.alicdn.com/tps/i1/T1W6.aFbFbXXcZj_6s-96-18.png" alt="运行在阿里云" /></a> 
		</div>
	  </div>
	</div>
EOF;
?>