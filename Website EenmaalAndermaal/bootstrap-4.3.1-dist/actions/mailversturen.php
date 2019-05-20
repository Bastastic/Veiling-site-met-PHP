<?php
session_start();
require '../php/connectDB.php';

$gebruikersnaam = $_SESSION['userID'];
$emailadres = $_POST['emailadres'];

$query = "SELECT Mailbox FROM Gebruiker WHERE Gebruikersnaam = :gebruikersnaam";
$sql = $dbh->prepare($query);
$sql->execute(['gebruikersnaam' => $gebruikersnaam]);
$mailbox = $sql->fetch(PDO::FETCH_ASSOC);
$mailbox = $mailbox['Mailbox'];

if (isset($_POST['geklikt']) &&  $emailadres == $mailbox) {
    $digits = 5;
    $controlegetal = mt_rand(pow(10, $digits-1), pow(10, $digits)-1);
    $subject = "Verificatiecode voor uw account";
    $txt = "
    <html>
    <head>
    <title>Verificatiecode</title>
    </head>
    <body style='text-algin: center;'>
    <h1>Uw Verificatiecode</h1>
    <p>Voer deze code in na het inloggen op EenmaalAndermaal</p>
    <h3>" . $controlegetal . "</h3>
    </body>
    </html>
    ";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: noreply@eenmaalandermaal.nl" . "\r\n";

    mail($emailadres, $subject, $txt, $headers);

    $query = "INSERT INTO Verificatie (Gebruikersnaam, Verificatiecode) VALUES (:gebruikersnaam, :controlegetal)";
    $sql = $dbh->prepare($query);
    $sql->bindValue(":gebruikersnaam", $gebruikersnaam);
    $sql->bindValue(":controlegetal", $controlegetal);
    $sql->execute();

    header("Location: ../mailverstuurd.php");
} else {
    header("Location: ../mailversturen.php");
}
