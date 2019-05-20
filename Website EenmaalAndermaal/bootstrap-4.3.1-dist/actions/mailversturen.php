<?php
require '../php/connectDB.php';

$digits = 5;
$controlegetal = mt_rand(pow(10, $digits-1), pow(10, $digits)-1);



if (isset($_POST['geklikt'])) {
    $mailadres = $_POST['emailadres'];
    $subject = "Verificatiecode voor uw account";
    $txt = "Hello Gebruiker! 
            Bedankt voor het registreren bij EenmaalAndermaal
            Hierbij ontvangt u uw controlegetal:$controlegetal";
    $headers = "From: contact@eenmaalandermaal.nl" . "\r\n";

    mail($mailadres, $subject, $txt, $headers);

     $querycode = "INSERT INTO Verificatie (Gebruikersnaam, Verificatiecode)
     VALUES ( :gebruikersnaam, :controlegetal)";
     $sqlcode = $dbh->prepare($querycode);
     $sqlcode->bindValue(":gebruikersnaam", $gebruikersnaam);
     $sqlcode->bindValue(":controlegetal", $controlegetal);
     $sqlcode->execute();

    header("Location: ../mailverstuurd.php");
}

?> 