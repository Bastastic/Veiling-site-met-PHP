<?php
require 'php/connectDB.php';
session_start();
$verkoper = $_SESSION['userID'];

$query = "SELECT * FROM Gebruiker WHERE Gebruikersnaam = :Gebruikersnaam"; 
         $sql = $dbh->prepare($query);
         $sql->bindValue(":Gebruikersnaam", $verkoper);
         $sql->execute();
         $resultaten = $sql->fetch(PDO::FETCH_ASSOC);
         $land = $resultaten['Land'];
         $plaatsnaam = $resultaten['Plaatsnaam'];

$titel = $_POST['Titel'];
$startprijs = $_POST['Startprijs'];
$beschrijving = $_POST['Beschrijving'];
$looptijd = $_POST['Looptijd'];
$LooptijdBegin = date("Y-m-d");
$tijd = date("H:i:s");
$LooptijdEind = date("Y-m-d", strtotime($LooptijdBegin. ' + ' . $looptijd . ' days'));
$betalingswijze = $_POST['betalingwijze'];
$betalingsinstructie = NULL;
$koper = NULL;
$verzendkosten = $_POST['Verzondkosten'];
$veilinggesloten = "0";
$verkoopprijs = NULL;
$verzendinstructie = NULL;

$query = "INSERT INTO Voorwerp (Titel, Beschrijving, Startprijs, Betalingswijze, Betalingsinstructie, Plaatsnaam, Land, Looptijd, LooptijdbeginDag, looptijdbeginTijdstip, Verzendkosten, Verzendinstructies, Verkoper, Koper, looptijdeindeDag, looptijdeindeTijdstip, Veiliggesloten, Verkoopprijs) 
            VALUES (
                :Titel, 
                :Beschrijving, 
                :Startprijs, 
                :Betalingswijze, 
                :Betalingsinstructie, 
                :Plaatsnaam, 
                :Land, 
                :Looptijd, 
                :LooptijdbeginDag, 
                :looptijdbeginTijdstip, 
                :Verzendkosten, 
                :Verzendinstructies, 
                :Verkoper, 
                :Koper, 
                :looptijdeindeDag, 
                :looptijdeindeTijdstip, 
                :Veiliggesloten, 
                :Verkoopprijs )";

        $sql = $dbh->prepare($query);
        $sql->bindValue(":Titel", $titel);
        $sql->bindValue(":Beschrijving", $beschrijving);
        $sql->bindValue(":Startprijs", $startprijs);
        $sql->bindValue(":Betalingswijze", $betalingswijze);
        $sql->bindValue(":Betalingsinstructie", $betalingsinstructie);
        $sql->bindValue(":Plaatsnaam", $plaatsnaam);
        $sql->bindValue(":Land", $land);
        $sql->bindValue(":Looptijd", $looptijd);
        $sql->bindValue(":LooptijdbeginDag", $LooptijdBegin);
        $sql->bindValue(":looptijdbeginTijdstip", $tijd);
        $sql->bindValue(":Verzendkosten", $verzendkosten);
        $sql->bindValue(":Verzendinstructies", $verzendinstructie);
        $sql->bindValue(":Verkoper", $verkoper);
        $sql->bindValue(":Koper", $koper);
        $sql->bindValue(":looptijdeindeDag", $LooptijdEind);
        $sql->bindValue(":looptijdeindeTijdstip", $tijd);
        $sql->bindValue(":Veiliggesloten", $veilinggesloten);
        $sql->bindValue(":Verkoopprijs", $verkoopprijs);
        $sql->execute();

        $query = "SELECT Voorwerpnummer FROM Voorwerp WHERE Titel = :Titel AND Beschrijving = :Beschrijving AND Verkoper = :Verkoper AND 
        LooptijdbeginDag = :LooptijdbeginDag AND LooptijdbeginTijdstip = :LooptijdbeginTijdstip"; 
         $sql = $dbh->prepare($query);
         $sql->bindValue(":Titel", $titel);
         $sql->bindValue(":Beschrijving", $beschrijving);
         $sql->bindValue(":Verkoper", $verkoper);
         $sql->bindValue(":LooptijdbeginDag", $LooptijdBegin);
         $sql->bindValue(":LooptijdbeginTijdstip", $tijd);
         $sql->execute();
         $resultaat = $sql->fetch(PDO::FETCH_ASSOC);
         $voorwerpnummer = $resultaat['Voorwerpnummer'];
        
        $target_dir = "upload";
        $target_file = $target_dir . "/" . 'dt_1_'.$voorwerpnummer . '.jpg';
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        // if (file_exists($target_file)) {
        //     echo "Sorry, file already exists.";
        //     $uploadOk = 0;
        // }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        // if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        // && $imageFileType != "gif" ) {
        //     echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        //     $uploadOk = 0;
        // }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        $query = "INSERT INTO Bestand (Filenaam, Voorwerp) 
            VALUES (
                :Filenaam, 
                :Voorwerp )";

        $sql = $dbh->prepare($query);
        $sql->bindValue(":Filenaam", 'upload/dt_1_' . $voorwerpnummer . '.jpg');
        $sql->bindValue(":Voorwerp", $voorwerpnummer);
        $sql->execute();

?>