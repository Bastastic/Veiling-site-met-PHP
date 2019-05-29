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




// Met deze query halen we alle gegevens van de gebruiker die aangepast kunnen worden. 
$sqlupdategegevens = $dbh->prepare("SELECT  Adresregel1, Adresregel2, Postcode, Plaatsnaam, Land, Mailbox, Wachtwoord
FROM Gebruiker
WHERE Gebruikersnaam = '$gebruikersnaam'");
$sqlupdategegevens->execute();
$resultaat = $sqlupdategegevens->fetch(PDO::FETCH_ASSOC);
$adres = $resultaat['Adresregel1'];
$adres2 = $resultaat['Adresregel2'];
$postcode = $resultaat['Postcode'];
$plaatsnaam = $resultaat['Plaatsnaam'];
$land = $resultaat['Land'];
$mailbox= $resultaat['Mailbox'];
$wachtwoord = $resultaat['Wachtwoord'];


// met al deze if statements checken we of een waarde opnieuw is ingevuld. Dus als je bijv alleen je voornaam
// wilt wijzigen zal $nieuwevoornaam een nieuwe waarde krijgen. Al de andere $nieuwe..... variabele krijgen de waarde 
// uit de database.
$nieuwevoornaam = $voornaam; 
                                                                     
if (isset($_POST['voornaamwijzigen']) && $_POST['voornaamwijzigen'] != '' ) {
    $nieuwevoornaam = $_POST['voornaamwijzigen'];
}else{
    $nieuwevoornaam = $voornaam;     
}

$nieuweachternaam = $achternaam;   
                                                                     
if (isset($_POST['achternaamwijzigen'])   && $_POST['achternaamwijzigen'] != '' ) {
    $nieuweachternaam = $_POST['achternaamwijzigen'];
}else{
    $nieuweachternaam = $achternaam;     
}

$nieuweadres = $adres;   
    
if (isset($_POST['adreswijzigen'])  && $_POST['adreswijzigen'] != '' ) {
    $nieuweadres = $_POST['adreswijzigen'];
}else{
    $nieuweadres = $adres;     
}

$nieuweadres2 = $adres2;   
                                                                     
if (isset($_POST['adres2wijzigen']) && $_POST['adres2wijzigen'] != '' ) {
    $nieuweadres2 = $_POST['adres2wijzigen'];
}else{
    $nieuweadres2 = $adres2;     
}

$nieuwepostcode = $postcode;   
                                                                     
if (isset($_POST['postcodewijzigen']) && $_POST['postcodewijzigen'] != ''  ) {
    $nieuwepostcode = $_POST['postcodewijzigen'];
}else{
    $nieuwepostcode = $postcode;     
}

$nieuweplaatsnaam = $plaatsnaam;   
    
if (isset($_POST['plaatsnaamwijzigen']) && $_POST['plaatsnaamwijzigen'] != '' ) {
    $nieuweplaatsnaam = $_POST['plaatsnaamwijzigen'];
}else{
    $nieuweplaatsnaam = $plaatsnaam;     
}

$nieuweland= $land;   
                                                                     
if (isset($_POST['landwijzigen']) && $_POST['landwijzigen'] != '' ) {
    $nieuweland = $_POST['landwijzigen'];
}else{
    $nieuweland = $nieuweland;     
}

$nieuwemailbox = $mailbox;   

if (isset($_POST['mailboxwijzigen']) && $_POST['mailboxwijzigen'] != '') {

    $nieuwemailbox = $_POST['mailboxwijzigen'];
}else{
    $nieuwemailbox = $mailbox;     
    
} 



// hier checken we of het wachtwoord correct is voordat iets wordt aangepast wat betreft de gegevens. 
// als het password correct is voeren we de UPDATE query uit. Is deze niet correct dan zal er een fout komen.
if(  password_verify( $_POST['wachtwoordcheck'] , $wachtwoord ) ){

                $updategegevens = $dbh->prepare("UPDATE Gebruiker 
                SET Voornaam = '$nieuwevoornaam' , Achternaam = '$nieuweachternaam', Adresregel1 = '$nieuweadres', Adresregel2 = '$nieuweadres2',
                Postcode = '$nieuwepostcode', Plaatsnaam = '$nieuweplaatsnaam', Land = '$nieuweland', Mailbox = '$nieuwemailbox'
                WHERE Gebruikersnaam = '$gebruikersnaam'");
                $updategegevens->execute();
                header('Location: ../profiel.php');



// deze mail wordt verstuurd na het wijzigen van je gegevens. 
// met een link als je het niet zelf gedaan naar contactformulier.
                $subject = "Uw gegevens zijn gewijzigd!";
                $txt = "
                <html>
                <head>
                <title>Uw gegevens zijn gewijzigd!</title>
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



             

?>