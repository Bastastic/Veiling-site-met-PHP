<?php
setlocale(LC_ALL, 'NL_nl');
$serverName = "mssql.iproject.icasites.nl";
$uid = "iproject15";
$pwd = "FkKqcryvuU";
$databaseName = "iproject15";
$dbh = new PDO("sqlsrv:Server=$serverName;Database=$databaseName", "$uid", "$pwd");
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
