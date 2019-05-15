<?php


if (isset($_POST['geklikt'])) {
    $mailadres = $_POST['emailadres'];
    $subject = "Testmail";
    $txt = "Hello world!";
    $headers = "From: contact@eenmaalandermaal.nl" . "\r\n";

    mail($mailadres, $subject, $txt, $headers);
    echo 'Verstuurd';
}

?> 