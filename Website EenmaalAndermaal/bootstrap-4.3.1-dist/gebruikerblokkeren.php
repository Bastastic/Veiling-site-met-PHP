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

if (isset($_GET['errc'])) {
    $type = 'danger';
    $titel = 'Sorry!';
    if ($_GET['errc'] == '1') {
        $msg = 'Gebruikersnaam is niet bekend. Probeer het nog een keer!';
    }else if ($_GET['errc'] == '2') {
        $msg = 'Gebruiker is al geblokkeerd. Een gebruiker kan niet meerdere keren geblokkeerd worden!';
    }
}

if (isset($_GET['succ'])) {
    $type = 'success';
    $titel = 'Top!';
    if ($_GET['succ'] == '1') {
        $msg = 'De gebruikers is succesvol geblokkeerd!';
    }
}

//Geeft messages weer indiend die er zijn
if (isset($msg)) {
    echo '<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="alert alert-' . $type . ' alert-dismissible fade show text-center" role="alert">
    <strong>'. $titel .'</strong> ' . $msg . '
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
</div>';
}




if( isset($_POST['submit'])){
    $gebruiker = $_POST['gebruikersnaam'];
    $reden = $_POST['reden'];

    $query = "SELECT * FROM Gebruiker WHERE Gebruikersnaam = '$gebruiker'"; 
    $sql = $dbh->prepare($query);
    $sql->execute();
    $resultaten = $sql->fetch(PDO::FETCH_ASSOC);

    


        
    if($resultaten == 0){
        echo '<script>window.location.replace("test.php?errc=1");</script>'; 
    }else{


        $query1 = "SELECT * FROM geblokkeerd WHERE Gebruiker = '$gebruiker'"; 
        $sql1 = $dbh->prepare($query1);
        $sql1->execute();
        $resultaten1 = $sql1->fetch(PDO::FETCH_ASSOC);
        // $gebruikerblokkade = $resultaten1['Gebruiker'];

        if( $resultaten1 == 0){
            echo '<script>window.location.replace("test.php?succ=1");</script>';
        $gebruikersblokkeren = "INSERT INTO geblokkeerd ( Gebruiker, Datum, Reden)
    VALUES ( 
    :Gebruiker,
    GETDATE(),
    :Reden )";
    $blokkeer = $dbh->prepare($gebruikersblokkeren);
    $blokkeer->bindValue(":Gebruiker", $gebruiker);
    $blokkeer->bindValue(":Reden", $reden);    
    $blokkeer->execute();
    }else{
        echo '<script>window.location.replace("test.php?errc=2");</script>';
    }
        }
        

    }
    

?>
<!-- Hieronder is het formulier om de gebruiker te blokkeren -->
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