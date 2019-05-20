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

<h4> Bedankt voor de registratie!</h4>
<h5> Er is een mail gestuurd met een code ter verificatie van uw account. De ontvangen code kunt u hieronder invullen. <br>
     Het kan een aantal minuten duren voordat u de mail ontvangt.</h5>
<form action="actions/mailversturen.php" method="post">
<input type="text" name="controle">     
<input type="submit" name="controleklik" value="Verifiveer">
</form>

<?php




?>



</body>
<?php include 'includes/footer.php' ; ?>

</html>