<?php
require '../php/connectDB.php';
session_start();

$gebruikersnaam = $_POST['Gebruikersnaam'];
$wachtwoord = $_POST['Wachtwoord'];

$sql = $dbh->prepare("SELECT * FROM Gebruiker WHERE Gebruikersnaam=:gebruikersnaam");
$sql->execute(['gebruikersnaam' => $gebruikersnaam]);
$gebruiker = $sql->fetch(PDO::FETCH_ASSOC);

$sql = $dbh->prepare("SELECT * FROM Admin WHERE Gebruikersnaam=:gebruikersnaam");
$sql->execute(['gebruikersnaam' => $gebruikersnaam]);
$admin = $sql->fetch(PDO::FETCH_ASSOC);

// Iedere keer nadat er is ingelogd wordt er gecontroleerd of je bent geactiveerd. Als je bent geactiveerd kan je overal naar toe
// anders wordt je steeds naar de mailversturen.php gestuurd.

$sql = $dbh->prepare("SELECT * FROM geblokkeerd WHERE Gebruiker=:gebruikersnaam");
$sql->execute(['gebruikersnaam' => $gebruikersnaam]);
$geblokkeerd = $sql->fetch(PDO::FETCH_ASSOC);

$banOphefDatum = date("Y-m-d", strtotime($geblokkeerd['datum']. ' + ' . $geblokkeerd['duur'] . ' days'));

if (password_verify($wachtwoord, $admin['Wachtwoord'])) {
    $_SESSION['adminID'] = $admin['Gebruikersnaam'];
    header('Location: ../admin/index.php');
} elseif (password_verify($wachtwoord, $gebruiker['Wachtwoord'])) {
    if ($geblokkeerd) {
        if ($banOphefDatum <= date(Y-m-d)) {
            $sql = $dbh->prepare("DELETE * FROM geblokkeerd WHERE Gebruiker=:gebruiker");
            $sql->execute(['gebruiker' => $gebruikersnaam]);
            $_SESSION['userID'] = $gebruiker['Gebruikersnaam'];
            if ($gebruiker['Geactiveerd'] == 1) {
                header('Location: ../profiel.php');
            } else {
                header('Location: ../mailversturen.php');
            }
        } else {
            header('Location: ../geblokkeerd.php?gebruiker=' . $gebruikersnaam);
        }
    } else {
        $_SESSION['userID'] = $gebruiker['Gebruikersnaam'];
        if ($gebruiker['Geactiveerd'] == 1) {
            header('Location: ../profiel.php');
        } else {
            header('Location: ../mailversturen.php');
        }
    }
} else {
    header('Location: ../inloggen.php?errc=1');
}
