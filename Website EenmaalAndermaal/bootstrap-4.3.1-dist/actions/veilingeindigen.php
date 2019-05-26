<?php
    require_once '../php/connectDB.php';
    session_start();

    $voorwerpnummer = $_GET['voorwerpnummer'];
    $gebruiker = $_SESSION['userID'];

    $query = "SELECT * FROM Voorwerp 
    WHERE Voorwerpnummer = :voorwerpnummer 
    AND cast(LooptijdeindeDag as datetime) + cast(LooptijdeindeTijdstip as datetime) <= GETDATE()";
    $sql = $dbh->prepare($query);
    $sql->execute(['voorwerpnummer' => $voorwerpnummer]);
    $resultaat = $sql->fetch(PDO::FETCH_ASSOC);

    if(!isset($_SESSION['userID'])){
        header('Location: ../inloggen.php');
    }elseif (!$resultaat) {
        header('Location: ../profiel.php');
    }

    $query = "UPDATE Voorwerp SET Veiliggesloten = '1' WHERE voorwerpnummer = :voorwerpnummer";
    $sql = $dbh->prepare($query);
    $sql->execute(['voorwerpnummer' => $voorwerpnummer]);

    $query = "SELECT Gebruiker.Mailbox, Gebruiker.Voornaam, Gebruiker.Achternaam,  MAX(Bod.Bodbedrag) as hoogstebod, Voorwerp.Titel, Voorwerp.Verkoper
    from Gebruiker
    inner join Bod
    on Gebruiker.gebruikersnaam = Bod.Gebruiker
    inner Join Voorwerp
    on Voorwerp.voorwerpnummer = Bod.Voorwerp
    where Bod.Voorwerp = :voorwerpnummer
    GROUP BY Gebruiker.Mailbox, Gebruiker.Voornaam, Gebruiker.Achternaam, Voorwerp.Titel, Voorwerp.Verkoper";
    $sql = $dbh->prepare($query);
    $sql->execute(['voorwerpnummer' => $voorwerpnummer]);
    $hoogstebod = $sql->fetch(PDO::FETCH_ASSOC);

    $titel = $hoogstebod['Titel'];
    $verkoper = $hoogstebod['Verkoper'];
    $emailadres = $hoogstebod['Mailbox'];
    $winnaarvoornaam = $hoogstebod['Voornaam'];
    $winnaarachternaam = $hoogstebod['Achternaam'];

    $subject = "U heeft gewonnen!";
    $txt = "
    <html>
    <head>
    <title>Veiling gewonnen!</title>
    </head>
    <body style='text-algin: center;'>
    <h1>U heeft de veiling van " . $verkoper . " gewonnen!</h1>
    <p>Gefeliciteerd " . $winnaarvoornaam . " " . $winnaarachternaam . ".<br> U heeft de volgende veiling gewonnen:</p>
    <h3>" . $titel . "</h3>
    </body>
    </html>
    ";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: noreply@eenmaalandermaal.nl" . "\r\n";

    mail($emailadres, $subject, $txt, $headers);

    header('Location: ../profiel.php');
?>