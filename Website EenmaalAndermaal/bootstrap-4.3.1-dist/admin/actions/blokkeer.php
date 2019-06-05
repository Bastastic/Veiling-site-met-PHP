<?php
session_start();
require '../../php/connectDB.php';
if(isset($_SESSION['adminID'])){
if( isset($_POST['submit'])){
    $gebruiker = $_POST['gebruikersnaam'];
    $reden = $_POST['reden'];

        $gebruikersblokkeren = "INSERT INTO geblokkeerd (Gebruiker, Datum, Reden)
            VALUES (:Gebruiker, GETDATE(), :Reden)";
            $blokkeer = $dbh->prepare($gebruikersblokkeren);
            $blokkeer->bindValue(":Gebruiker", $gebruiker);
            $blokkeer->bindValue(":Reden", $reden);    
            $blokkeer->execute();
            header('Location: ../verkoper-blokkeren.php');
    }else{
        echo 'Geen informatie mee gegeven';
    }
}else{
    header('Location: ../../inloggen.php');
}

?>