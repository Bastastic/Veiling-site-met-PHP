<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include 'includes/links.php'; ?>
    <title>Code Invoeren</title>
</head>

<?php include 'includes/header.php'; 
    if (isset($_GET['errc'])) {
        $type = 'danger';
        if ($_GET['errc'] == '1') {
            $msg = 'U heeft geen code ingevuld. Probeer het opnieuw!';
        }
        if ($_GET['errc'] == '2') {
            $msg = 'De code die u heeft ingevuld klopt niet. Probeer het opnieuw!';
        }
    }
?>

<body>
    <h4> Bedankt voor de registratie!</h4>
    <?php
            if (isset($msg)) {
                echo '<div class="col-xs-12 col-sm-12 col-md-12">
                <div class="alert alert-' . $type . ' alert-dismissible fade show text-center" role="alert">
                <strong>Sorry!</strong> ' . $msg . '
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            </div>';
            }
        ?>
    <h5> Er is een mail gestuurd met een code ter verificatie van uw account. De ontvangen code kunt u hieronder
        invullen. <br>
        Het kan een aantal minuten duren voordat u de mail ontvangt.</h5>
    <form action="actions/verifieer.php" method="post">
        <input type="text" name="code" required>
        <input type="submit" name="submit" value="Verifieer">
    </form>
</body>
<?php include 'includes/footer.html' ; ?>

</html>