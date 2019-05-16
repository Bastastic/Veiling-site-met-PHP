<?php
require '../php/connectDB.php';
session_start();

$gebruikersnaam = $_POST['Gebruikersnaam'];
$wachtwoord = $_POST['Wachtwoord'];

$sql = $dbh->prepare("SELECT * FROM Gebruiker WHERE Gebruikersnaam=:gebruikersnaam");
$sql->execute(['gebruikersnaam' => $gebruikersnaam]);
$gebruiker = $sql->fetch(PDO::FETCH_ASSOC);

if (password_verify($wachtwoord, $gebruiker['Wachtwoord'])) {
    $_SESSION['userID'] = $gebruikersnaam;
    header('Location: ../index.php');
} else {
    header('Location: ../inloggen.php?errc=1');
}