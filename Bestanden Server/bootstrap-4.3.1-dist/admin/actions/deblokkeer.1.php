<?php
session_start();
require '../../php/connectDB.php';
if (isset($_SESSION['adminID'])) {
    if (isset($_POST['AdvertentieID'])) {
        $advertentie = $_POST['AdvertentieID'];

        $gebruikersdeblokkeren = "DELETE FROM geblokkeerdeVeilingen WHERE AdvertentieID = :advertentie";
        $deblokkeer = $dbh->prepare($gebruikersdeblokkeren);
        $deblokkeer->execute(['advertentie' => $advertentie]);
        header('Location: ../veiling-deblokkeren.php');
    } else {
        echo 'Geen informatie mee gegeven';
    }
} else {
    header('Location: ../../inloggen.php');
}
