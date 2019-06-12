<?php
session_start();
require '../../php/connectDB.php';
if(isset($_SESSION['adminID'])){

    $query = 'DELETE FROM Gebruiker WHERE Geactiveerd = 0';
    $sql = $dbh->prepare($query);
    $sql->execute();

    header('Location: ../index.php?succ=1');
}else{
    header('Location: ../../inloggen.php');
}
?>