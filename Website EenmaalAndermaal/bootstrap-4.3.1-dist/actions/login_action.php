<?php
require '../php/connectDB.php';
session_start();

$gebruikersnaam = $_POST['Gebruikersnaam'];
$wachtwoord = $_POST['Wachtwoord'];

$query = "SELECT Gebruikersnaam, Wachtwoord
FROM Gebruiker
WHERE Gebruikersnaam = $gebruikersnaam";

$sql = $dbh->prepare($query);
$sql->execute();
$gebruiker = $sql->fetch();

if (password_verify($wachtwoord, $gebruiker['Wachtwoord'])) {
    $_SESSION['userID'] = $gebruikersnaam;
    header('Location: ../index.php');
}else{
    echo "Fout wachtwoord!";
}
