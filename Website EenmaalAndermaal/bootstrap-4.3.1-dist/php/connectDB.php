<?php
setlocale(LC_ALL, 'NL_nl');
$dsn = 'dblib:dbname=iproject15;host=mssql.iproject.icasites.nl';
$user = "iproject15";
$password = "FkKqcryvuU";
$dbh = new PDO($dsn, $user, $password);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
