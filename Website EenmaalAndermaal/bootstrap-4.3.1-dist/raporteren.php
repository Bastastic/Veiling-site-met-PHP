<?php
require 'php/connectDB.php';
session_start();

if(!isset($_SESSION['userID'])){
    header('Location: inloggen.php');
}

$voorwerpnummer = $_POST['voorwerpnummer'];
$omschrijving = $_POST['omschrijving'];
$rappoteerder = $_SESSION['userID'];

$query = "SELECT * FROM Rapporteren WHERE AdvertentieID = :AdvertentieID and Rapporteerde = :Rapporteerde"; 
$sql = $dbh->prepare($query);
$sql->bindValue(":AdvertentieID", $voorwerpnummer);
$sql->bindValue(":Rapporteerde", $rappoteerder);
$sql->execute();
$resultaten = $sql->fetch(PDO::FETCH_ASSOC);

if(isset($resultaten)){
    header('Location: biedingspagina.php?voorwerpnummer=' . $voorwerpnummer . '&errc=1');
}


$query = "INSERT INTO Rapporteren (AdvertentieID, Rapporteerde, Omschrijving) 
            VALUES (
                :AdvertentieID, 
                :Rapporteerde,
                :Omschrijving )";

$sql = $dbh->prepare($query);
$sql->bindValue(":AdvertentieID", $voorwerpnummer);
$sql->bindValue(":Rapporteerde", $rappoteerder);
$sql->bindValue(":Omschrijving", $omschrijving);
$sql->execute(); 
?>

<?php
header('Location: biedingspagina.php?voorwerpnummer=' . $voorwerpnummer . '&succ=1');
?>
