<?php
    require '../php/connectDB.php';

    if (isset($_POST['Verkoper'])) {
        if ($_POST['Verkoper'] == "yes") {
            $verkoper = 1;
        }
    } else {
        $verkoper = 0;
    }

        $voornaam = $_POST['Voornaam'];
        $achternaam = $_POST['Achternaam'];
        $adresregel = $_POST['Adresregel'];
        $adresregel2 = $_POST['Adresregel2'];
        $postcode = $_POST['Postcode'];
        $plaatsnaam = $_POST['Plaatsnaam'];
        $land = $_POST['Land'];
        $geboortedatum = date('Y-m-d', strtotime($_POST['Geboortedatum']));
        $emailadres = $_POST['Emailadres'];
        $vraagid = $_POST['Vraag'];
        $antwoord = $_POST['Antwoord'];
        $gebruikersnaam = $_POST['Gebruikersnaam'];
        $wachtwoord = password_hash($_POST['Wachtwoord'], PASSWORD_ARGON2I);


        $query = "INSERT INTO Gebruiker VALUES (
            :gebruikersnaam,
            :voornaam, 
            :achternaam, 
            :adresregel, 
            :adresregel2,
            :postcode,
            :plaatsnaam,
            :land,
            :geboortedatum,
            :emailadres,
            :wachtwoord,
            :vraagid,
            :antwoord,
            :verkoper )";

        $sql = $dbh->prepare($query);
        $sql->bindValue(":gebruikersnaam", $gebruikersnaam);
        $sql->bindValue(":voornaam", $voornaam);
        $sql->bindValue(":achternaam", $achternaam);
        $sql->bindValue(":adresregel", $adresregel);
        $sql->bindValue(":adresregel2", $adresregel2);
        $sql->bindValue(":postcode", $postcode);
        $sql->bindValue(":plaatsnaam", $plaatsnaam);
        $sql->bindValue(":land", $land);
        $sql->bindValue(":geboortedatum", $geboortedatum);
        $sql->bindValue(":emailadres", $emailadres);
        $sql->bindValue(":wachtwoord", $wachtwoord);
        $sql->bindValue(":vraagid", $vraagid);
        $sql->bindValue(":antwoord", $antwoord);
        $sql->bindValue(":verkoper", $verkoper);
        $sql->execute();

    header('Location: ../index.php');
