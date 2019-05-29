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


$pakwachtwoord = $dbh->prepare("SELECT  Wachtwoord
FROM Gebruiker
WHERE Gebruikersnaam = '$gebruikersnaam'");
$pakwachtwoord->execute();
$resultaat = $pakwachtwoord->fetch(PDO::FETCH_ASSOC);
$wachtwoord = $resultaat['Wachtwoord'];

if( password_verify( $_POST['oudWW'] , $wachtwoord ) ){

    if( $_POST['nieuwWW'] == $_POST['nieuwWWher'] ){

  

        $nieuwewachtwoord =  password_hash($_POST['nieuwWW'], PASSWORD_ARGON2I);
         
                $updatewachtwoord = $dbh->prepare("UPDATE Gebruiker 
                SET Wachtwoord = '$nieuwewachtwoord' 
                WHERE Gebruikersnaam = '$gebruikersnaam'");
                $updatewachtwoord->execute();
                header('Location: ../profiel.php');
    }else{
        header('Location: ../index.php');
    }

}else{
    header('Location: ../contact.php');
}


?>