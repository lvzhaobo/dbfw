<?php
	exec("python2.7 test.py list",$output,$result);
	
	$data = array('page'=>1,'total'=>10);
	foreach($output as $key=>$item){
		list($host,$username,$priv) = explode("\t",$item);
		//var_dump(json_decode($priv));
		$priv = join("<br />",json_decode($priv));
		$data['rows'][] = array("id"=>$key,"cell"=>array("id"=>"<input type='checkbox' value='".$username."@".$host."' name='id' class='user_select'/>","host"=>$host,"username"=>$username,"priv"=>$priv));
	}
	echo json_encode($data);
	
	//echo '{"page":1,"total":239,"rows":[{"id":"ZW","cell":{"name":"Zimbabwe ","iso":"ZW","printable_name":"Zimbabwe ","iso3":"ZWE ","numcode":"716"}},{"id":"ZM","cell":{"name":"Zambia ","iso":"ZM","printable_name":"Zambia ","iso3":"ZMB ","numcode":"894"}},{"id":"YE","cell":{"name":"Yemen ","iso":"YE","printable_name":"Yemen ","iso3":"YEM ","numcode":"887"}},{"id":"EH","cell":{"name":"Western Sahara ","iso":"EH","printable_name":"Western Sahara ","iso3":"ESH ","numcode":"732"}},{"id":"WF","cell":{"name":"Wallis and Futuna ","iso":"WF","printable_name":"Wallis and Futuna ","iso3":"WLF ","numcode":"876"}},{"id":"VI","cell":{"name":"Virgin Islands, U.s. ","iso":"VI","printable_name":"Virgin Islands, U.s. ","iso3":"VIR ","numcode":"850"}},{"id":"VG","cell":{"name":"Virgin Islands, British ","iso":"VG","printable_name":"Virgin Islands, British ","iso3":"VGB ","numcode":"92"}},{"id":"VN","cell":{"name":"Viet Nam ","iso":"VN","printable_name":"Viet Nam ","iso3":"VNM ","numcode":"704"}},{"id":"VE","cell":{"name":"Venezuela ","iso":"VE","printable_name":"Venezuela ","iso3":"VEN ","numcode":"862"}},{"id":"VU","cell":{"name":"Vanuatu ","iso":"VU","printable_name":"Vanuatu ","iso3":"VUT ","numcode":"548"}}],"post":[]}';
