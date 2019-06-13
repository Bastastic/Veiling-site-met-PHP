<?php
session_start();
require '../../php/connectDB.php';
if (isset($_SESSION['adminID'])) {
    if (isset($_POST['gebruikersnaam'])) {
        $gebruiker = $_POST['gebruikersnaam'];

        $gebruikersdeblokkeren = "DELETE FROM geblokkeerd WHERE Gebruiker = :gebruiker";
        $deblokkeer = $dbh->prepare($gebruikersdeblokkeren);
        $deblokkeer->execute(['gebruiker' => $gebruiker]);
        header('Location: ../verkoper-deblokkeren.php');
    } else {
        echo 'Geen informatie mee gegeven';
    }
} else {
    header('Location: ../../inloggen.php');
}
