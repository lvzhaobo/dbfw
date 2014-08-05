<?php
// Server in the this format: <computer>\<instance name> or 
// <server>,<port> when using a non default port number
$server = 'localhost\SQLEXPRESS';

// Connect to MSSQL
$link = mssql_connect('localhost,1433', 'sa', 'sa');

if (!$link) {
    die('Something went wrong while connecting to MSSQL');
}
?> 