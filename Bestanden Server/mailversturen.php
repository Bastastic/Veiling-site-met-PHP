<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include 'includes/links.php'; 
    ?>
    <title>Verificatie</title>
</head>

<?php include 'includes/header.php'; 

    if(!isset($_SESSION['userID'])){
        echo '<script>window.location.replace("inloggen.php");</script>';
    }
    if (isset($_GET['errc'])) {
        $type = 'danger';
        $titel = 'Sorry!';
        if ($_GET['errc'] == '1') {
            $msg = 'mail is niet verstuurd, probeer het opnieuw';
        }
    }
    
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
?>


<body>

        <div class="container text-center">
           <h1>Vul ter controle nog een keer uw emailadres hieronder in.</h1>
            <form action="actions/mailversturen.php" method="post" class="w-25 mx-auto">
                <div class="form-group">
                    <input type="email" name="emailadres" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="submit" name="geklikt" value="Verzenden" class="btn btn-primary w-50">
                </div>
            </form>
        </div>

</body>

<?php include 'includes/footer.php'; ?>

</html>