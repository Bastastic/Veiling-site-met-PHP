<?php
require 'php/connectDB.php';
session_start();

if (!file_exists("pics/$advertentie")) {
    mkdir("pics/$advertentie", 0777, true);
}

$target_dir = "pics";
$target_file = $target_dir . "/" . $advertentie . "/" . basename($_FILES["fileToUpload"]["name"]);
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
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
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


$titel = $_POST['Titel'];
$startprijs = $_POST['Startprijs'];
$beschijving = $_POST['Beschijving'];
$looptijd = $_POST['Looptijd'];
$LooptijdBegin = date("Y-m-d");
$tijd = date("H:i:s");
$LooptijdEind = $startdag + $looptijd;
$betalingswijze = $_POST['betalingswijze'];
$betalingsinstructie = NULL;
$plaatsnaam = $_POST['plaatsnaam'];
$land = $_POST['land'];
$verzendkosten = $_POST['verzendkosten'];
$veilinggesloten = "0";
$verkoopprijs = NULL;

$query = "INSERT INTO Voorwerp (Titel, Beschijving, Startprijs, Betalingswijze, Betalingsinstructie, Plaatsnaam, Land, Looptijd, LooptijdbeginDag, looptijdbeginTijdstip, Verzendkosten, Verzendinstructies, Verkoper, Koper, looptijdeindeDag, looptijdeindeTijdstip, Veiliggesloten, Vekoopprijs) 
            VALUES (
                :Titel, 
                :Beschijving, 
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
                :Vekoopprijs )";

        $sql = $dbh->prepare($query);
        $sql->bindValue(":titel", $);
        $sql->bindValue(":Beschijving", $);
        $sql->bindValue(":Startprijs", $);
        $sql->bindValue(":Betalingwijze", $);
        $sql->bindValue(":Betalingsinstructie", $);
        $sql->bindValue(":Plaatsnaam", $);
        $sql->bindValue(":Land", $);
        $sql->bindValue(":titel", $);
        $sql->bindValue(":titel", $);
        $sql->bindValue(":titel", $);
        $sql->bindValue(":titel", $);
        $sql->bindValue(":titel", $);
        $sql->bindValue(":titel", $);
        $sql->bindValue(":titel", $);
        $sql->bindValue(":titel", $);

?>