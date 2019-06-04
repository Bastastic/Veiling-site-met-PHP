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