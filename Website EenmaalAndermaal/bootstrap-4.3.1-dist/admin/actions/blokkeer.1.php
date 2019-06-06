<?php
session_start();
require '../../php/connectDB.php';
if(isset($_SESSION['adminID'])){
if(isset($_POST['AdvertentieID']) && isset($_POST['reden'])){
    $gebruiker = $_POST['AdvertentieID'];
    $reden = $_POST['reden'];

        $gebruikersblokkeren = "INSERT INTO geblokkeerdeVeilingen (AdvertentieID, Datum, Reden)
            VALUES (:Gebruiker, GETDATE(), :Reden)";
            $blokkeer = $dbh->prepare($gebruikersblokkeren);
            $blokkeer->bindValue(":Gebruiker", $gebruiker);
            $blokkeer->bindValue(":Reden", $reden);
            $blokkeer->execute();
            header('Location: ../veiling-blokkeren.php');
    }else{
        echo 'Geen informatie mee gegeven';
    }
}else{
    header('Location: ../../inloggen.php');
}

?>