<?php
// Server in the this format: <computer>\<instance name> or 
// <server>,<port> when using a non default port number
$server = 'localhost\SQLEXPRESS';
$pdo = new PDO("sqlite:'D://test.db3'");
// Connect to MSSQL
$link = mssql_connect('localhost,1433', 'sa', 'sa');
var_dump($link);
if (!$link) {
    die('Something went wrong while connecting to MSSQL');
}
?> 