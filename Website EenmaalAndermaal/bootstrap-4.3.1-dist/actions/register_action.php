<?php
    session_start();
    require '../php/connectDB.php';

    $voornaam = $_POST['Voornaam'];
    $achternaam = $_POST['Achternaam'];
    $adresregel = $_POST['Adresregel'];
    if (isset($_POST['Adresregel2'])) {
        if ($_POST['Adresregel2'] == '') {
            $adresregel2 = null;
        } else {
            $adresregel2 = $_POST['Adresregel2'];
        }
    }
    $postcode = $_POST['Postcode'];
    $plaatsnaam = $_POST['Plaatsnaam'];
    $land = $_POST['Land'];
    $geboortedatum = date('Y-m-d', strtotime($_POST['Geboortedatum']));
    $emailadres = $_POST['Emailadres'];
    $vraagid = $_POST['Vraag'];
    $antwoord = $_POST['Antwoord'];
    $gebruikersnaam = $_POST['Gebruikersnaam'];
    $wachtwoord = password_hash($_POST['Wachtwoord'], PASSWORD_ARGON2I);
    $verkoper = 0;
    

    $query = "SELECT * FROM Gebruiker WHERE Gebruikersnaam=:gebruikersnaam";
    $sql = $dbh->prepare($query);
    $sql->bindValue(":gebruikersnaam", $gebruikersnaam);
    $sql->execute();
    $result = $sql->fetch(PDO::FETCH_ASSOC);

    // Nadat alle velden zijn ingevuld moet dit in de database worden geinstert. Dat gebeurd hieronder.
    // daarna zal je gaan naar mailversturen.php
    if (!$result) {
        $query = "INSERT INTO Gebruiker (Gebruikersnaam, Voornaam, Achternaam, Adresregel1, Adresregel2, Postcode, Plaatsnaam, Land, GeboorteDag, Mailbox, Wachtwoord, Vraag, Antwoordtext, Verkoper, Geactiveerd) 
            VALUES (
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
                :verkoper,
                :geactiveerd )";

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
        $sql->bindValue(":geactiveerd", 0);
        $sql->execute();
        $_SESSION['userID'] = $gebruikersnaam;
        header('Location: ../mailversturen.php');
    } else {
        header('Location: ../registreren.php?errc=1');
    }
