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


<?php $gebruiker = $_GET['Verkoper']; ?>

<!-- Hieronder is het formulier om de gebruiker te blokkeren -->
<div class="container text-center">
            <form method="post" class="w-25 mx-auto">
                <div class="form-group">
                    <input type="text" name="gebruikersnaam" class="form-control" value='<?php echo $gebruiker; ?>' disabled>
                </div>
                <div class="form-group">
                    <input type="text" name="reden" class="form-control" placeholder="Reden" required>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Blokkeer" class="btn btn-primary w-50">
                </div>
            </form>
</div>


<?php 

$gebruiker = $_GET['Verkoper']; 

$query = $dbh->prepare("SELECT AdvertentieID, Rapporteerde, Omschrijving
FROM Rapporteren
INNER JOIN Voorwerp ON AdvertentieID = Voorwerpnummer 
WHERE Voorwerp.Verkoper = '$gebruiker'");
$query->execute();
$gebruikers = $query->fetchAll(PDO::FETCH_ASSOC);
?>


<table style="width:50%">
  <tr>
    <th>Advertentie nummer</th>
    <th>Gerappoteerd door</th>
    <th>Omschrijving</th>
  </tr>

<?php
    foreach ( $gebruikers as $key => $value){
        
        $advertentieID = $value['AdvertentieID'];
        $Rapporteerde = $value['Rapporteerde'];
        $Omschrijving = $value['Omschrijving'];
        echo  "<tr>
            <td>$advertentieID</td>
            <td>$Rapporteerde</td>
            <td>$Omschrijving</td>
            </tr>";
    }
?>

</tr>
</table>

</body>
<?php include 'includes/footer.php' ; ?>

</html>