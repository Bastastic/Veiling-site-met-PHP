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

?>

<body>
    <!-- <h5> Vul ter controle nog een keer uw emailadres hieronder in.</h5>
    <form action="actions/mailversturen.php" method="post">
        <input type="email" name="emailadres">
        <input type="submit" name="geklikt" value="Verzend">
    </form> -->

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