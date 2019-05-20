<?php


$digits = 5;
$controlegetal = mt_rand(pow(10, $digits-1), pow(10, $digits)-1);
// echo $controlegetal;


if (isset($_POST['geklikt'])) {
    $mailadres = $_POST['emailadres'];
    $subject = "Verificatiecode voor uw account";
    $txt = "Hello Gebruiker! 
            Bedankt voor het registreren bij EenmaalAndermaal
            Hierbij ontvangt u uw controlegetal:$controlegetal";
    $headers = "From: contact@eenmaalandermaal.nl" . "\r\n";

    mail($mailadres, $subject, $txt, $headers);

    // $sql = "INSERT INTO Verificatie (Gebruikersnaam, Verificatiecode)
    // VALUES ('John', 'Doe', 'john@example.com')";

    // echo 'Verstuurd';
    header("Location: ../mailverstuurd.php");
}

?> 