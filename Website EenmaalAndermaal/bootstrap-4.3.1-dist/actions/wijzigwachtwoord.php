<?php
require_once('../php/connectDB.php');
session_start();
if (isset($_SESSION['userID'])) {
    $gebruikersnaam = $_SESSION['userID'];
    $sql = $dbh->prepare("SELECT Voornaam, Achternaam, Geactiveerd
                    FROM Gebruiker
                    WHERE Gebruikersnaam = :gebruikersnaam");
    $sql->execute(['gebruikersnaam' => $gebruikersnaam]);
    $gebruiker = $sql->fetch(PDO::FETCH_ASSOC);
    $voornaam = $gebruiker['Voornaam'];
    $achternaam = $gebruiker['Achternaam'];
}


$pakwachtwoord = $dbh->prepare("SELECT  Wachtwoord, Mailbox
FROM Gebruiker
WHERE Gebruikersnaam = '$gebruikersnaam'");
$pakwachtwoord->execute();
$resultaat = $pakwachtwoord->fetch(PDO::FETCH_ASSOC);
$wachtwoord = $resultaat['Wachtwoord'];
$nieuwemailbox = $resultaat['Mailbox'];

if( password_verify( $_POST['oudWW'] , $wachtwoord ) ){

    if( $_POST['nieuwWW'] == $_POST['nieuwWWher'] ){

  

        $nieuwewachtwoord =  password_hash($_POST['nieuwWW'], PASSWORD_ARGON2I);
         
                $updatewachtwoord = $dbh->prepare("UPDATE Gebruiker 
                SET Wachtwoord = '$nieuwewachtwoord' 
                WHERE Gebruikersnaam = '$gebruikersnaam'");
                $updatewachtwoord->execute();
                header('Location: ../profiel.php?succ=2');

                $subject = "Uw wachtwoord is gewijzigd!";
                $txt = "
                <html>
                <head>
                <title>Uw wachtwoord is gewijzigd!</title>
                </head>
                <body style='text-algin: center;'>
                <h1>Wijziging van uw gegevens</h1>
                <p>Als u dit niet gedaan heeft dan kunt u contact opnemen met ons via het contactformulier!</p>
                <a href='http://iproject15.icasites.nl/contact.php'>Klik hier om direct naar het contactformulier te gaan.</a>
                </body>
                </html>
                ";
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= "From: noreply@eenmaalandermaal.nl" . "\r\n";
            
                mail($nieuwemailbox, $subject, $txt, $headers);

                } else{
                    header('Location: ../profiel.php?errc=1');
                }

    }else{
        header('Location: ../profiel.php?errc=2');
    }

}else{
    header('Location: ../profiel.php?errc=3');
}


?>