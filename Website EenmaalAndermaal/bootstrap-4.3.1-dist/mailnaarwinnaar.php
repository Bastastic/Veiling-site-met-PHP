<?php
session_start();
require '../php/connectDB.php';

// $gebruikersnaam = $_SESSION['userID'];
// $emailadres = $_POST['emailadres'];

// $query = "SELECT Mailbox FROM Gebruiker WHERE Gebruikersnaam = :gebruikersnaam";
// $sql = $dbh->prepare($query);
// $sql->execute(['gebruikersnaam' => $gebruikersnaam]);
// $mailbox = $sql->fetch(PDO::FETCH_ASSOC);
// $mailbox = $mailbox['Mailbox'];

    $query = "select Gebruiker.Mailbox,  Gebruiker.Gebruikersnaam,  MAX(Bod.Bodbedrag) as hoogstebod
    from Gebruiker
    inner join Bod
    on Gebruiker.gebruikersnaam = Bod.Gebruiker 
    where Bod.Voorwerp = '400807919211'
    GROUP BY Gebruiker.Mailbox, Gebruiker.Gebruikersnaam";
    $sql = $dbh->prepare($query);
    $sql->execute();
    $info = $sql->fetch(PDO::FETCH_ASSOC);

    $gebruikersnaam = $info['Gebruikersnaam'];
    $mail = $info['Mailbox'];
    $hoogstebod = $info['hoogstebod'];

    $queryy = "select titel from Voorwerp where Verkoper = $gebruikersnaam";
    $sqll = $dbh->prepare($query);
    $sqll->execute();
    $infoo = $sqll->fetch(PDO::FETCH_ASSOC);

    $titel = $infoo['titel'];



    $subject = "U bent de winnaar!";
    $txt = "
    <html>
    <head>
    <title>Van Harte Gefeliciteerd!</title>
    </head>
    <body style='text-algin: center;'>
    <h1>Veiling gewonnen!</h1>
    <p>Van harte gefeliciteerd met het winnen van de veiling. U heeft de volgende veiling gewonnen:</p>
    <h3>" . $titel . "</h3>
    </body>
    </html>
    ";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: noreply@eenmaalandermaal.nl" . "\r\n";

    mail($emailadres, $subject, $txt, $headers);

?>