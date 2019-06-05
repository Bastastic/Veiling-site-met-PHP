<?php
session_start();
require '../../php/connectDB.php';
if(isset($_SESSION['adminID'])){
if(isset($_POST['gebruikersnaam']) && isset($_POST['reden'])){
    $gebruiker = $_POST['gebruikersnaam'];
    $reden = $_POST['reden'];
    if($_POST['duur'] == ""){
        $duur = null;
    }else{
        $duur = $_POST['duur'];
    }

        $gebruikersblokkeren = "INSERT INTO geblokkeerd (Gebruiker, Datum, Reden, Duur)
            VALUES (:Gebruiker, GETDATE(), :Reden, :Duur)";
            $blokkeer = $dbh->prepare($gebruikersblokkeren);
            $blokkeer->bindValue(":Gebruiker", $gebruiker);
            $blokkeer->bindValue(":Reden", $reden);
            $blokkeer->bindValue(":Duur", $duur);    
            $blokkeer->execute();
            header('Location: ../verkoper-blokkeren.php');
    }else{
        echo 'Geen informatie mee gegeven';
    }
}else{
    header('Location: ../../inloggen.php');
}

?>