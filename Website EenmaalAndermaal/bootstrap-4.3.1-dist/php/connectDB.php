<?php
setlocale(LC_TIME, 'NL_nl');
$serverName = "mssql.iproject.icasites.nl"; 
$uid = "iproject15";   
$pwd = "FkKqcryvuU";  
$databaseName = "iproject15"; 

// $connectionInfo = array( "Database"=>"databaseName", "UID"=>"uid", "PWD"=>"pwd");

// // $dbh = sqlsrv_connect($serverName, $connectionInfo);
$dbh = new PDO("sqlsrv:Server=$serverName;Database=$uid", "$databaseName", "$pwd");
?>