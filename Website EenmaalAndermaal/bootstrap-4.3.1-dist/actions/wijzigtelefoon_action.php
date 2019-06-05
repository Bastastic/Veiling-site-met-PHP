
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
$sqlupdatetelefoon = $dbh->prepare("SELECT  Telefoon
FROM Gebruikerstelefoon
WHERE Gebruiker = '$gebruikersnaam'");
$sqlupdatetelefoon->execute();
$resultaattelefoon = $sqlupdatetelefoon->fetch(PDO::FETCH_ASSOC);
$telefoon = $resultaattelefoon['Telefoon'];



$nieuwetelefoon = $telefoon;   
    
if (isset($_POST['telefoon'])  && $_POST['telefoon'] != '' ) {
    $nieuwetelefoon = $_POST['telefoon'];
}else{
    $nieuwetelefoon = $telefoon;     
}




if ( isset( $_POST['submittelefoon'])){

    if( $telefoon == ''){
        $updatetelefoon1 = "INSERT INTO  Gebruikerstelefoon (Volgnr, Gebruiker, Telefoon) 
                VALUES ( :Volgnr,
                         :Gebruiker,
                         :Telefoon)";
                
                
                $sqltel = $dbh->prepare($updatetelefoon1);
                $sqltel->bindValue(":Volgnr",  1);
                $sqltel->bindValue(":Gebruiker", $gebruikersnaam);
                $sqltel->bindValue(":Telefoon", $nieuwetelefoon);

                $sqltel->execute();
                 header('Location: ../profiel.php?succ=5');
    }else{

        $updatetelefoon = $dbh->prepare("UPDATE Gebruikerstelefoon 
        SET Telefoon = '$nieuwetelefoon' 
        WHERE Gebruiker = '$gebruikersnaam'");
        $updatetelefoon->execute();
         header('Location: ../profiel.php?succ=4');
    }



}



?>
