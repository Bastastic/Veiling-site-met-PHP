<?php
require 'php/connectDB.php';
session_start();


if(!isset($_SESSION['userID'])){
    echo '<script>window.location.replace("inloggen.php");</script>';
}else{
    $query = 'SELECT Gebruikersnaam FROM Gebruiker WHERE Gebruikersnaam = :gebruikersnaam AND Verkoper = 1';
    $sql = $dbh->prepare($query);
    $sql->execute(['gebruikersnaam' => $_SESSION['userID']]);
    $resultaat = $sql->fetch();

    if(!$resultaat){
        echo '<script>window.location.replace("profiel.php");</script>';
    }
}

$verkoper = $_SESSION['userID'];

$query = "SELECT * FROM Gebruiker WHERE Gebruikersnaam = :Gebruikersnaam"; 
         $sql = $dbh->prepare($query);
         $sql->bindValue(":Gebruikersnaam", $verkoper);
         $sql->execute();
         $resultaten = $sql->fetch(PDO::FETCH_ASSOC);
$land = strip_tags($resultaten['Land']);
$plaatsnaam = strip_tags($resultaten['Plaatsnaam']);
$catogorie = strip_tags($_POST['cat']);
$titel = strip_tags($_POST['Titel']);
$startprijs = strip_tags($_POST['Startprijs']);
$beschrijving = strip_tags($_POST['Beschrijving']);
$looptijd = strip_tags($_POST['Looptijd']);
$LooptijdBegin = date("Y-m-d");
$tijd = date("H:i:s");
$LooptijdEind = date("Y-m-d", strtotime($LooptijdBegin. ' + ' . $looptijd . ' days'));
$betalingswijze =strip_tags($_POST['betalingwijze']);
$betalingsinstructie = NULL;
$koper = NULL;
$verzendkosten = strip_tags($_POST['Verzendkosten']);
$veilinggesloten = "0";
$verkoopprijs = NULL;
$verzendinstructie = NULL;

print_r($verzendkosten);
print_r($startprijs);
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
  
         $query = "INSERT INTO Voorwerp_in_Rubriek (Voorwerp, Rubriek_op_Laagste_Niveau) 
         VALUES (
             :Voorwerp, 
             :Rubriek_op_Laagste_Niveau )";
         
         $sql = $dbh->prepare($query);
         $sql->bindValue(":Voorwerp", $voorwerpnummer);
         $sql->bindValue(":Rubriek_op_Laagste_Niveau", $catogorie);
         $sql->execute();
       
    // Compress image
    function compressImage($source, $quality) {

    $info = getimagesize($source);
  
    if ($info['mime'] == 'image/jpeg') 
      $image = imagecreatefromjpeg($source);
  
    elseif ($info['mime'] == 'image/gif') 
      $image = imagecreatefromgif($source);
    
    elseif ($info['mime'] == 'image/jpg') 
      $image = imagecreatefromgif($source);
  
    elseif ($info['mime'] == 'image/png') 
      $image = imagecreatefrompng($source);
  
    imagejpeg($image, $quality);
  
    }

  $file1 = 0;
  $file2 = 0;
  $file3 = 0;
  $file4 = 0;

    if($_FILES["fileToUpload1"]["error"] == 0){
        $file1 = 1;
        $target_dir = "upload/";
        $temp = explode(".", $_FILES["fileToUpload1"]["name"]);
        $extention =  end($temp);
        $target_file = $target_dir . 'dt_1_'.$voorwerpnummer . "." . $extention;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $uploadOk = 1;
        compressImage($target_file, 30);
        if($extention != "jpg" && $extention != "png" && $extention != "jpeg"
        && $extention != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";

        } else {
            if (move_uploaded_file($_FILES["fileToUpload1"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["fileToUpload1"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        $query = "INSERT INTO Bestand (Filenaam, Voorwerp) 
            VALUES (
                :Filenaam, 
                :Voorwerp )";

        $sql = $dbh->prepare($query);
        $sql->bindValue(":Filenaam", 'upload/dt_1_' . $voorwerpnummer . '.' . $extention);
        $sql->bindValue(":Voorwerp", $voorwerpnummer);
        $sql->execute();
    }

    if($_FILES["fileToUpload2"]["error"] == 0){
        $file2 = 1;
        $target_dir = "upload/";
        $temp = explode(".", $_FILES["fileToUpload2"]["name"]);
        $extention =  end($temp);
        $target_file = $target_dir . 'dt_2_'.$voorwerpnummer . "." . $extention;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $uploadOk = 1;
        compressImage($target_file, 30);
        if($extention != "jpg" && $extention != "png" && $extention != "jpeg"
        && $extention != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";

        } else {
            if (move_uploaded_file($_FILES["fileToUpload2"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["fileToUpload2"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        $query = "INSERT INTO Bestand (Filenaam, Voorwerp) 
            VALUES (
                :Filenaam, 
                :Voorwerp )";

        $sql = $dbh->prepare($query);
        $sql->bindValue(":Filenaam", 'upload/dt_2_' . $voorwerpnummer . '.' . $extention);
        $sql->bindValue(":Voorwerp", $voorwerpnummer);
        $sql->execute();
    }

    if($_FILES["fileToUpload3"]["error"] == 0){
        $file3 = 1;
        $target_dir = "upload/";
        $temp = explode(".", $_FILES["fileToUpload3"]["name"]);
        $extention =  end($temp);
        $target_file = $target_dir . 'dt_3_'.$voorwerpnummer . "." . $extention;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $uploadOk = 1;
        compressImage($target_file, 30);
        if($extention != "jpg" && $extention != "png" && $extention != "jpeg"
        && $extention != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";

        } else {
            if (move_uploaded_file($_FILES["fileToUpload3"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["fileToUpload3"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        $query = "INSERT INTO Bestand (Filenaam, Voorwerp) 
            VALUES (
                :Filenaam, 
                :Voorwerp )";

        $sql = $dbh->prepare($query);
        $sql->bindValue(":Filenaam", 'upload/dt_3_' . $voorwerpnummer . '.' . $extention);
        $sql->bindValue(":Voorwerp", $voorwerpnummer);
        $sql->execute();
    }

    if($_FILES["fileToUpload4"]["error"] == 0){
        $file4 = 1;
        $target_dir = "upload/";
        $temp = explode(".", $_FILES["fileToUpload4"]["name"]);
        $extention =  end($temp);
        $target_file = $target_dir . 'dt_4_'.$voorwerpnummer . "." . $extention;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $uploadOk = 1;
        compressImage($target_file, 30);
        if($extention != "jpg" && $extention != "png" && $extention != "jpeg"
        && $extention != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";

        } else {
            if (move_uploaded_file($_FILES["fileToUpload4"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["fileToUpload4"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

        $query = "INSERT INTO Bestand (Filenaam, Voorwerp) 
            VALUES (
                :Filenaam, 
                :Voorwerp )";

        $sql = $dbh->prepare($query);
        $sql->bindValue(":Filenaam", 'upload/dt_4_' . $voorwerpnummer . '.' . $extention);
        $sql->bindValue(":Voorwerp", $voorwerpnummer);
        $sql->execute();
    }

    if($file1 == 0 && $file2 == 0 && $file3 == 0 && $file4 == 0){
    copy('upload/standaard.png', 'upload/dt_1_' . $voorwerpnummer . '.png' );
    $query = "INSERT INTO Bestand (Filenaam, Voorwerp) 
            VALUES (
                :Filenaam, 
                :Voorwerp )";

        $sql = $dbh->prepare($query);
        $sql->bindValue(":Filenaam", 'upload/dt_1_' . $voorwerpnummer . '.png');
        $sql->bindValue(":Voorwerp", $voorwerpnummer);
        $sql->execute();
        echo 'Geen afbeelding toegevoegt, voegt standaard afbeelding toe.';

}
header('Location: ../profiel.php');



?>