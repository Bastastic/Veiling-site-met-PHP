

<?php

require '../php/connectDB.php';

$emailadres = $_POST['emailadres'];


$querygebruikersnaam = "SELECT Gebruikersnaam, Mailbox FROM Gebruiker WHERE Mailbox = :emailadres";
$sqlgebruikersnaam = $dbh->prepare($querygebruikersnaam);
$sqlgebruikersnaam->execute(['emailadres' => $emailadres]);
$gebruikersnaam = $sqlgebruikersnaam->fetch(PDO::FETCH_ASSOC);
$gebruikersnaam = $gebruikersnaam['Gebruikersnaam'];

$controleadres = $mail['Mailbox'];

// $querymail = "SELECT Mailbox FROM Gebruiker WHERE Gebruikersnaam = :gebruikersnaam";
// $sqlmail = $dbh->prepare($querymail);
// $sqlmail->execute(['gebruikersnaam' => $gebruikersnaam]);
// $mail = $sqlmail->fetch(PDO::FETCH_ASSOC);
 $controleadres = $mail['Mailbox'];


// $controleadres = 'peter2@gmail.com';

if(isset($_POST['geklikt']) &&  $emailadres == $controleadres ){ 




$digits = 5;
$controlegetal = mt_rand(pow(10, $digits-1), pow(10, $digits)-1);
// $gebruikersnaam= "peter2";

if (isset($_POST['geklikt'])) {
    $mailadres = $_POST['emailadres'];
    $subject = "Verificatiecode voor uw account";
    $txt = "Hello Gebruiker! 
            Bedankt voor het registreren bij EenmaalAndermaal
            Hierbij ontvangt u uw controlegetal: $controlegetal";
    $headers = "From: contact@eenmaalandermaal.nl" . "\r\n";

    mail($mailadres, $subject, $txt, $headers);

     $querycode = "INSERT INTO Verificatie (Gebruikersnaam, Verificatiecode)
                   VALUES ( :gebruikersnaam, 
                            :controlegetal)";

     $sqlcode = $dbh->prepare($querycode);
     $sqlcode->execute(['gebruikersnaam' => $gebruikersnaam, 'controlegetal' => $controlegetal ]);

    header("Location: ../mailverstuurd.php");
}


}else{
    header("Location: ../mailversturen.php");
}

?> 