<?php
    require_once '../php/connectDB.php';
    session_start();
    // hier wordt gecheckt of de gebruiker is ingelogd om te kunnen bieden. Als gebruiker ingelogd is wordt het bod in de Database toegevoegd. 
    if(isset($_SESSION['userID'])){
        $bod = $_POST["bod"];
        $voorwerpnummer = $_POST['voorwerpnummer'];
        $bodBedrag = $_POST['tweedeBodBedrag'];
        $bodGebruiker = $_POST['tweedeGebruiker'];

        $gebruikersnaam = $_SESSION['userID'];
        $datum = date('Y-m-d');
        $tijd = date('H:i:s');
        $sql = $dbh->prepare("INSERT INTO Bod (Voorwerp, Bodbedrag, Gebruiker, BodDag, BodTijdstip) VALUES ('$voorwerpnummer', '$bod', '$gebruikersnaam',  '$datum',
        '$tijd')");
        $sql->execute();


        // hier staan de queries om een mail naar de een na hoogste bieder te sturen
        if ($gebruikersnaam != $bodGebruiker) {
            //Hiermee wordt de mail opgehaald
            $queryMail = "SELECT Mailbox
                        from Gebruiker
                        where Gebruikersnaam = :Gebruikersnaam";
            $sql = $dbh->prepare($queryMail);
            $sql->execute(['Gebruikersnaam' => $bodGebruiker]);
            $result = $sql->fetch(PDO::FETCH_ASSOC);
            $emailadres = $result['Mailbox'];

            //Hiermee wordt de titel van het betreffende product opgehaald
            $queryTitel = "SELECT Titel
                        from Voorwerp
                        where Voorwerpnummer = :Voorwerpnummer";
            $sql = $dbh->prepare($queryTitel);
            $sql->execute(['Voorwerpnummer' => $voorwerpnummer]);
            $resultTitel = $sql->fetch(PDO::FETCH_ASSOC);
            $voorwerpTitel = $resultTitel['Titel'];

            $subject = "U bent overboden";
            $txt = "
            <html>
                <head>
                    <title>Wilt u opnieuw bieden?</title>
                </head>
                <body>
                    <h1>Uw bod op $voorwerpTitel is overboden</h1>
                    <p>Uw vorige bod was €$bodBedrag, er is €$bod geboden.
                    Als u een nieuw bod wilt plaatsen klik dan 
                    <a href='http://iproject15.icasites.nl/biedingspagina.php?voorwerpnummer=$voorwerpnummer'>hier</a>.</p>
                </body>
            </html>
            ";
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "From: noreply@eenmaalandermaal.nl" . "\r\n";

            mail($emailadres, $subject, $txt, $headers);
        }

        header("Location: ../biedingspagina.php?voorwerpnummer=$voorwerpnummer");
    } else {
        header("Location: ../inloggen.php");
    }

    
?>
