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
//met deze query halen we alle gebruikers op die verkoper willen worden uit de database. 
$query = $dbh->prepare("SELECT Gebruiker.Voornaam, Gebruiker.Achternaam, Verkoper.Gebruiker, Verkoper.Bank, Verkoper.Bankrekening
FROM Verkoper
INNER JOIN Gebruiker ON Gebruiker.Gebruikersnaam = Verkoper.Gebruiker 
WHERE  Controle_optie = 'Afgekeurd' ");
$query->execute();
$gebruikers = $query->fetchAll(PDO::FETCH_ASSOC);  

?>


<!-- hier worden de gebruikers in een tabel laten zien die een verkoper willen worden. -->
<table style="width:50%">
  <tr>
    <th>Voornaam</th>
    <th>Achternaam</th>
    <th>Gebruiker</th>
    <th>Bank</th>
    <th>Bankrekening</th>
    <th></th>
    <th></th>
  </tr>
  
<?php
    foreach ( $gebruikers as $key => $value){
        
        $voornaam = $value['Voornaam'];
        $achternaam = $value['Achternaam'];
        $gebruiker = $value['Gebruiker'];
        $bank = $value['Bank'];
        $bankrekening = $value['Bankrekening'];
        echo  "<tr>
            <td>$voornaam</td>
            <td>$achternaam</td>
            <td>$gebruiker</td>
            <td>$bank</td>
            <td>$bankrekening</td>
            <td> <form action='goedkeuren_action.php' method='post'><input type='submit' id='goedkeuren' name='goedkeuren' class='btn btn-primary'>Goedkeuren</a> </form> </td>    
            <td><a href='afgekeurd.php?Verkoper=$gebruiker' class='btn btn-primary'>Afkeuren</a></td>    
            </tr>";
    }
?>
  </tr>
</table>




</body>
<?php include 'includes/footer.php' ; ?>

</html>