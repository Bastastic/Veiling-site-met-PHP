<?php require '../php/connectDB.php'; ?>


<?php

$gebruiker = $_GET['Gebruiker'];

$emailophalen = "SELECT Mailbox FROM Gebruiker WHERE Gebruikersnaam = '$gebruiker'";
$sqlemail = $dbh->prepare($emailophalen);
$sqlemail->execute();
$mailbox = $sqlemail->fetch(PDO::FETCH_ASSOC);
$emailadres = $mailbox['Mailbox'];



if( isset($_POST[$gebruiker]) ){
    $updatecontroleoptie1 = $dbh->prepare("UPDATE Verkoper 
    SET Controle_optie = 'Afgekeurd' 
    WHERE Gebruiker = '$gebruiker'");
    $updatecontroleoptie1->execute();

    $subject = "Afkeuring van uw aanvraag";
    $txt = "
    <html>
    <head>
    <title>Afgekeurd</title>
    </head>
    <body style='text-algin: center;'>
    <h1>Gefeliciteerd</h1>
    <p>U aanvraag voor het worden van verkoper is afgekeurd.</p>
    <p>U kunt <a href='http://iproject15.icasites.nl/contact.php'>hier</a> contact opnemen mocht u dat willen.</p>
    </body>
    </html>
    ";

    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: noreply@eenmaalandermaal.nl" . "\r\n";

    mail($emailadres, $subject, $txt, $headers);
    header('Location: ../test.php');
}

?>


