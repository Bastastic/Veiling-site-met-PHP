<?php
setlocale(LC_ALL, 'NL_nl');
$serverName = "mssql.iproject.icasites.nl"; 
$uid = "iproject15";   
$pwd = "FkKqcryvuU";  
$databaseName = "iproject15"; 
$dbh = new PDO("sqlsrv:Server=$serverName;Database=$uid", "$databaseName", "$pwd");
?>