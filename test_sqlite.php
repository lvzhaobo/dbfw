<?php
	$db = new SQLite3("D://test.db3");
	//$result = $db->query("create table lv(id integer,name text);");
	$result = $db->query("insert into lv values(2,'lv2')");
	$result = $db->query("select * from lv;");
	
	$i = 0;
    while ($result->columnName($i))
    {
        $columns[ ] = $result->columnName($i);
        $i++;
    }
   
    $resx = $result->fetchArray(SQLITE3_ASSOC);
	
	$result = $db->query();
	
	var_dump($result,$resx);