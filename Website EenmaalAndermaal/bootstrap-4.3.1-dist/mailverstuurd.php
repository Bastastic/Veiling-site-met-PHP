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
<h5> Er is een mail gestuurd met een code ter verificatie van uw account. De ontvangen code is hieronder in te vullen. Indien deze juist is kunt U inloggen.</h5>
<form action="actions/mailversturen.php" method="post">
<input type="text" name="controle">
<input type="submit" name="controleklik" value="Controleer">
</form>

<!-- <?php
$digits = 5;
$controlegetal = mt_rand(pow(10, $digits-1), pow(10, $digits)-1);
echo $controlegetal;
?> -->

</body>
<?php include 'includes/footer.php' ; ?>

</html>