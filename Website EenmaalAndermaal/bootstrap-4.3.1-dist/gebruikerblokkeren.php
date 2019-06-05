<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include 'includes/links.php'; ?>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
        echo '<script>window.location.replace("gebruikerblokkeren.php?errc=1");</script>'; 
    }else{


        $query1 = "SELECT * FROM geblokkeerd WHERE Gebruiker = '$gebruiker'"; 
        $sql1 = $dbh->prepare($query1);
        $sql1->execute();
        $resultaten1 = $sql1->fetch(PDO::FETCH_ASSOC);
        // $gebruikerblokkade = $resultaten1['Gebruiker'];

        if( $resultaten1 == 0){
            echo '<script>window.location.replace("gebruikerblokkeren.php?succ=1");</script>';
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
        echo '<script>window.location.replace("gebruikerblokkeren.php?errc=2");</script>';
    }
        }
        

    }
    

?>

<?php
// met deze query halen we alle geblokkeerde gebruikers uit de database. 
$query = $dbh->prepare("SELECT Voorwerp.Verkoper, Count(Voorwerp.Verkoper) as Aantal_keer_Gerappoteerd
from Voorwerp
INNER JOIN Rapporteren ON Voorwerp.Voorwerpnummer = Rapporteren.AdvertentieID
GROUP BY Voorwerp.Verkoper 
ORDER BY Aantal_keer_Gerappoteerd DESC");
$query->execute();
$gebruikers = $query->fetchAll(PDO::FETCH_ASSOC);


?>

 <!-- hier worden de gebruikers in een tabel laten zien. -->
<table style="width:50%">
  <tr>
    <th>Gebruiker</th>
    <th>Aantal keer Gerappoteerd</th>
  </tr>
  
<?php
    foreach ( $gebruikers as $key => $value){
        
        $gebruiker = $value['Verkoper'];
        $aantalkeer = $value['Aantal_keer_Gerappoteerd'];
        echo  "<tr>
            <td>$gebruiker</td>
            <td>$aantalkeer</td>
            <td><a href='rapportinformatie.php?Verkoper=$gebruiker' class='w3-button w3-black'>Rapporteerinformatie</a></td>    
            </tr>";
    }
?>
  </tr>
</table>




</body>
<?php include 'includes/footer.php' ; ?>

</html>