<?php


$digits = 5;
$controlegetal = mt_rand(pow(10, $digits-1), pow(10, $digits)-1);
echo $controlegetal;


if (isset($_POST['geklikt'])) {
    $mailadres = $_POST['emailadres'];
    $subject = "Verificatiecode voor uw account";
    $txt = "Hello Gebruiker! 
            Bedankt voor het registreren bij EenmaalAndermaal
            Hierbij ontvangt u uw controlegetal:"; echo $controlegetal;
    $headers = "From: contact@eenmaalandermaal.nl" . "\r\n";

    mail($mailadres, $subject, $txt, $headers);
    // echo 'Verstuurd';
    header("Location: ../mailverstuurd.php");
}

?> 