<?php
require '../php/connectDB.php';
session_start();

$gebruikersnaam = $_POST['Gebruikersnaam'];
$wachtwoord = $_POST['Wachtwoord'];

$sql = $dbh->prepare("SELECT * FROM Gebruiker WHERE Gebruikersnaam=:gebruikersnaam");
$sql->execute(['gebruikersnaam' => $gebruikersnaam]);
$gebruiker = $sql->fetch(PDO::FETCH_ASSOC);

// Iedere keer nadat er is ingelogd wordt er gecontroleerd of je bent geactiveerd. Als je bent geactiveerd kan je overal naar toe
// anders wordt je steeds naar de mailversturen.php gestuurd.

if (password_verify($wachtwoord, $gebruiker['Wachtwoord'])) {
    $_SESSION['userID'] = $gebruikersnaam;
    if($gebruiker['Geactiveerd'] == 1){
        header('Location: ../profiel.php');
    }else{
        header('Location: ../mailversturen.php');
    }
} else {
    header('Location: ../inloggen.php?errc=1');
}