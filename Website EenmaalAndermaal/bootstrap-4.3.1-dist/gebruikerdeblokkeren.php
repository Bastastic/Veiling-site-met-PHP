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
        $msg = 'Gebruikersnaam is niet geblokkeerd. Probeer het nog een keer!';
    }
}

if (isset($_GET['succ'])) {
    $type = 'success';
    $titel = 'Top!';
    if ($_GET['succ'] == '1') {
        $msg = 'De gebruikers is succesvol gedeblokkeerd!';
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

    $query = "SELECT * FROM geblokkeerd WHERE Gebruiker = '$gebruiker'"; 
    $sql = $dbh->prepare($query);
    $sql->execute();
    $resultaten = $sql->fetch(PDO::FETCH_ASSOC);
        
    if($resultaten == 0){
        echo '<script>window.location.replace("gebruikerdeblokkeren.php?errc=1");</script>'; 
    }else{
        echo '<script>window.location.replace("gebruikerdeblokkeren.php?succ=1");</script>';
        $query1 = "DELETE FROM geblokkeerd WHERE Gebruiker = '$gebruiker'"; 
        $sql1 = $dbh->prepare($query1);
        $sql1->execute();
        $resultaten1 = $sql1->fetch(PDO::FETCH_ASSOC);
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
                    <input type="submit" name="submit" value="Deblokkeer" class="btn btn-primary w-50">
                </div>
            </form>
</div>






<!-- gebruikers laten zien in geblokkeerd -->
<?php
// met deze query halen we alle geblokkeerde gebruikers uit de database. 
$query = $dbh->prepare("SELECT Gebruiker, Datum, Reden
FROM geblokkeerd
ORDER BY Datum DESC, Gebruiker DESC");
$query->execute();
$gebruikers = $query->fetchAll(PDO::FETCH_ASSOC);


?>

 <!-- hier worden de gebruikers in een tabel laten zien. -->
<table style="width:50%">
  <tr>
    <th>Gebruiker</th>
    <th>Datum</th>
    <th>Reden</th>
  </tr>
  
<?php
    foreach ( $gebruikers as $key => $value){
        
        $gebruiker = $value['Gebruiker'];
        $datum = $value['Datum'];
        $reden = $value['Reden'];

        echo  " <tr>
            <td>$gebruiker</td>";
        echo  "<td>$datum</td>";
        echo  "<td>$reden</td>
        </tr>";
    }
?>
  </tr>
</table>



</body>
<?php include 'includes/footer.php' ; ?>

</html>