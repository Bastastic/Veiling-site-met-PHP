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
// met deze query halen we alle geblokkeerde gebruikers uit de database. 
$query = $dbh->prepare("SELECT AdvertentieID, Count(AdvertentieID) as Aantal_keer_Gerappoteerd
from Rapporteren
GROUP BY AdvertentieID
ORDER BY Aantal_keer_Gerappoteerd DESC");
$query->execute();
$advertentie = $query->fetchAll(PDO::FETCH_ASSOC);


?>

 <!-- hier worden de gebruikers in een tabel laten zien. -->
<table style="width:50%">
  <tr>
    <th>AdvertentieID</th>
    <th>Aantal keer Gerappoteerd</th>
  </tr>
  
<?php
    foreach ( $advertentie as $key => $value){
        
        $AdvertentieID = $value['AdvertentieID'];
        $aantalkeer = $value['Aantal_keer_Gerappoteerd'];
        echo  "<tr>
            <td>$AdvertentieID</td>
            <td>$aantalkeer</td>
            <td><a href='rapportinformatie-advertentie.php?AdvertentieID=$AdvertentieID' class='w3-button w3-black'>Rapporteerinformatie</a></td>    
            </tr>";
    }
?>
  </tr>
</table>




</body>
<?php include 'includes/footer.php' ; ?>

</html>