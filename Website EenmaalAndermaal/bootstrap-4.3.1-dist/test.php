<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include 'includes/links.php'; ?>
    <title>Algemene Voorwaarden</title>
</head>

<?php include 'includes/header.php'; ?>
<body>
  
<?php


if( isset($_POST['submit'])){
    $gebruiker = $_POST['gebruikersnaam'];
    $reden = $_POST['reden'];

    $gebruikersblokkeren = "INSERT INTO geblokkeerd ( Gebruiker, Datum, Reden)
    VALUES ( 
    :Gebruiker,
    GETDATE(),
    :Reden )";
$blokkeer = $dbh->prepare($gebruikersblokkeren);
$blokkeer->bindValue(":Gebruiker", $gebruiker);
$blokkeer->bindValue(":Reden", $reden);    
$blokkeer->execute();

}

?>


<div class="container text-center">
            <form method="post" class="w-25 mx-auto">
                <div class="form-group">
                    <input type="text" name="gebruikersnaam" class="form-control" placeholder="Gebruiker" required>
                </div>
                <div class="form-group">
                    <input type="text" name="reden" class="form-control" placeholder="Reden" required>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Blokkeer" class="btn btn-primary w-50">
                </div>
            </form>
</div>
</body>
<?php include 'includes/footer.php' ; ?>

</html>