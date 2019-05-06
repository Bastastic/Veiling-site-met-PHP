<?php
$serverName = "mssql.iproject.icasites.nl"; 
$uid = "iproject15";   
$pwd = "FkKqcryvuU";  
$databaseName = "iproject15"; 

$connectionInfo = array( "UID"=>$uid,                            
                         "PWD"=>$pwd,                            
                         "Database"=>$databaseName); 

$dbh = sqlsrv_connect($serverName, $connectionInfo);

if(!$conn){
    die("Verbindingsfout: " . mssql_get_last_message());
}
?>