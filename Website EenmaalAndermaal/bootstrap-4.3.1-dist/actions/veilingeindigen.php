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
    $titel = $resultaat['Titel'];


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

    $verkoper = $hoogstebod['Verkoper'];
    $winnaaremailadres = $hoogstebod['Mailbox'];
    $winnaarvoornaam = $hoogstebod['Voornaam'];
    $winnaarachternaam = $hoogstebod['Achternaam'];


    // $bestaatBod = count($hoogstebod->fetchAll());
    if ($hoogstebod) {
        $winnaarsubject = "U heeft gewonnen!";
        $winnaartxt = "
        <html>
        <head>
        <title>Veiling gewonnen!</title>
        </head>
        <body style='text-algin: center;'>
        <h1>U heeft de veiling van " . $verkoper . " gewonnen!</h1>
        <p>Gefeliciteerd " . $winnaarvoornaam . " " . $winnaarachternaam . ".<br> U heeft de volgende veiling gewonnen:</p>
        <h3>" . $titel . "</h3>
        <p> Klik <a href='http://iproject15.icasites.nl/biedingspagina.php?voorwerpnummer=$voorwerpnummer'>hier</a> om naar de veiling toe te gaan.</p>
        </body>
        </html>
        ";



        $query = $dbh->prepare("SELECT Mailbox 
                                from Voorwerp inner join Gebruiker 
                                on Voorwerp.Verkoper = Gebruiker.Gebruikersnaam 
                                where Voorwerpnummer = :voorwerpnummer");
        $query->execute(['voorwerpnummer' => $voorwerpnummer]);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $eigenaaremailadres = $result['Mailbox'];

        $eigenaarsubject = "Uw product is verkocht!";
        $eigenaartxt = "
        <html>
        <head>
        <title>Veiling gewonnen!</title>
        </head>
        <body style='text-algin: center;'>
        <h1>Uw veiling, " . $titel . ", is verkocht!</h1>
        <p>Uw veiling is gekocht door: " . $winnaarvoornaam . " " . $winnaarachternaam . ".<br> $winnaaremailadres</p>
        </body>
        </html>
        ";

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: noreply@eenmaalandermaal.nl" . "\r\n";

        mail($winnaaremailadres, $winnaarsubject, $winnaartxt, $headers);
        mail($eigenaaremailadres, $eigenaarsubject, $eigenaartxt, $headers);
    } else {
        
        $query = $dbh->prepare("SELECT Mailbox 
                                from Voorwerp inner join Gebruiker 
                                on Voorwerp.Verkoper = Gebruiker.Gebruikersnaam 
                                where Voorwerpnummer = :voorwerpnummer");
        $query->execute(['voorwerpnummer' => $voorwerpnummer]);
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $eigenaaremailadres = $result['Mailbox'];



        $eigenaarsubject = "Uw product helaas niet is verkocht";
        $eigenaartxt = "
        <html>
        <head>
        <title>Veiling gewonnen!</title>
        </head>
        <body style='text-algin: center;'>
        <h1>Uw veiling, " . $titel . ", is niet verkocht</h1>
        <p>Er was helaas geen bod gemaakt.</p>
        </body>
        </html>
        ";

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: noreply@eenmaalandermaal.nl" . "\r\n";

        mail($eigenaaremailadres, $eigenaarsubject, $eigenaartxt, $headers);
    }

    header('Location: ../profiel.php');
?>