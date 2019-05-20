<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include 'includes/links.php'; ?>
    <title>Biedingspagina</title>

</head>

<?php include 'includes/header.php'; ?>

<body>

<h5> Vul ter controle nog een keer uw emailadres hieronder in.</h5>


<form action="actions/mailversturen.php" method="post">
<input type="email" name="emailadres">
<input type="submit" name="geklikt" value="Verzend">
</form>


</body>


<?php include 'includes/footer.php'; ?>

</html>


