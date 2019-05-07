<?php
// $serverName = "mssql.iproject.icasites.nl"; 
// $uid = "iproject15";   
// $pwd = "FkKqcryvuU";  
// $databaseName = "iproject15"; 

// $connectionInfo = array( "Database"=>"databaseName", "UID"=>"uid", "PWD"=>"pwd");

// // $dbh = sqlsrv_connect($serverName, $connectionInfo);
$dbh = new PDO("sqlsrv:Server=mssql.iproject.icasites.nl;Database=iproject15", "iproject15", "FkKqcryvuU");
?>