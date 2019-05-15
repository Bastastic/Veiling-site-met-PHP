<?php
    require_once '../php/connectDB.php';
    session_start();
    if(isset($_SESSION['userID'])){
        $bod = $_POST["bod"];
        $voorwerpnummer = $_POST['voorwerpnummer'];
        $gebruikersnaam = $_SESSION['userID'];
        $datum = date('Y-m-d');
        $tijd = date('H:i:s');
        $sql = $dbh->prepare("INSERT INTO Bod (Voorwerp, Bodbedrag, Gebruiker, BodDag, BodTijdstip) VALUES ('$voorwerpnummer', '$bod', '$gebruikersnaam',  '$datum',
        '$tijd')");
        $sql->execute();
        header("Location: ../biedingspagina.php?voorwerpnummer=$voorwerpnummer");
    }else{
        header("Location: ../inloggen.php");
    }
?>
