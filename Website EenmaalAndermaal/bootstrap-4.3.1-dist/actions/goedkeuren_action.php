<?php require '../php/connectDB.php'; ?>


<?php

$gebruiker = $_GET['Gebruiker'];

$emailophalen = "SELECT Mailbox FROM Gebruiker WHERE Gebruikersnaam = '$gebruiker'";
$sqlemail = $dbh->prepare($emailophalen);
$sqlemail->execute();
$mailbox = $sqlemail->fetch(PDO::FETCH_ASSOC);
$emailadres = $mailbox['Mailbox'];



if(isset($_POST[$gebruiker] ) ){
    $updatecontroleoptie = $dbh->prepare("UPDATE Verkoper 
    SET Controle_optie = 'Goedgekeurd' 
    WHERE Gebruiker = '$gebruiker'");
    $updatecontroleoptie->execute();
    
    
    $subject = "Goedkeuring van uw aanvraag";
    $txt = "
    <html>
    <head>
    <title>Goedkeuring</title>
    </head>
    <body style='text-algin: center;'>
    <h1>Gefeliciteerd</h1>
    <p>U bent goedgekeurd en bent nu officieel verkoper op EenmaalAndermaal. Uw kunt nu veilingen plaatsten.</p>
    <p>U kunt <a href='http://iproject15.icasites.nl/inloggen.php'>hier</a> inloggen.</p>
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


