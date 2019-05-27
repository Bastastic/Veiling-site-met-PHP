<?php
    require_once '../php/connectDB.php';
    session_start();
    // hier wordt gechekt of de gebruiker is ingelogd om te kunnen bieden. Als gebruiker ingelogd is wordt het bod in de Database toegevoegd. 
    if(isset($_SESSION['userID'])){
        $bod = $_POST["bod"];
        $hoogstebod = $_POST["hoogstebod"];
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
