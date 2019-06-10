<?php
setlocale(LC_ALL, 'NL_nl');
$serverName = "LAPTOP-44J2VQK\MSSQLSERVER02";
$uid = "sa";
$pwd = "12345678";
$databaseName = "iproject15";
$dbh = new PDO("sqlsrv:Server=$serverName;Database=$databaseName", "$uid", "$pwd");
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
