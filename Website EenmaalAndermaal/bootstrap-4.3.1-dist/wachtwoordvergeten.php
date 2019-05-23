<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include 'includes/links.php'; ?>
    <title>Wachtwoord Vergeten</title>
</head>

<?php include 'includes/header.php'; ?>

<body>

    <div class="container text-center">
        <br>

        <?php

        if (isset($_GET['errc'])) {
            $type = 'danger';
            $titel = 'Sorry!';
            if ($_GET['errc'] == '1') {
                $msg = 'Dit emailadres is bij ons niet bekend. Probeer het opnieuw!';
            }
            if ($_GET['errc'] == '2') {
                $msg = 'U heeft geen emailadres ingevuld. Probeer het opnieuw!';
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

        if (isset($_POST['submit'])) {
            if ($_POST['email'] != "") {
                $emailadres = $_POST['email'];

                $query = "SELECT Mailbox
                FROM Gebruiker
                WHERE Mailbox = :emailadres";
                $sql = $dbh->prepare($query);
                $sql->execute(['emailadres' => $emailadres]);
                $resultaat = $sql->fetchAll(PDO::FETCH_ASSOC);

                if ($resultaat) {
                    $nieuwwachtwoord = generateRandomString();
                    $nieuwwachtwoordhash = password_hash($nieuwwachtwoord, PASSWORD_ARGON2I);

                    $query = "UPDATE Gebruiker
                    SET Wachtwoord = :nieuwwachtwoordhash
                    WHERE Mailbox = :emailadres";
                    $sql = $dbh->prepare($query);
                    $sql->execute(['nieuwwachtwoordhash' => $nieuwwachtwoordhash,
                                    'emailadres' => $emailadres]);

                    $subject = "Reset Wachtwoord";
                    $txt = "<html>
                        <head>
                        <title>Uw nieuwe wachtwoord!</title>
                        </head>
                        <body style=text-alignn: center;'>
                        <h1>Uw nieuwe wachtwoord</h1>
                        <h3>" . $nieuwwachtwoord . "</h3>
                        <br>
                        <p> Klik <a href='http://iproject15.icasites.nl/inloggen.php'>hier</a> om in te loggen. </p>
                        </body>
                        </html>
                        ";
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    $headers .= "From: noreply@eenmaalandermaal.nl" . "\r\n";

                    mail($emailadres, $subject, $txt, $headers);

                    echo '<h1>Wachtwoord gereset!</h1>
                <p>U vind uw nieuwe wachtwoord in uw mailbox.</p>
                <a href="inloggen.php" class="btn btn-primary">Inloggen</a>';
                } else {
                    echo '<script>window.location.replace("wachtwoordvergeten.php?errc=1");</script>';
                }
            } else {
                echo '<script>window.location.replace("wachtwoordvergeten.php?errc=2");</script>';
            }
        } else {
            echo '<h1>Wachtwoord vergeten?</h1>
            <p>Voer uw email in om uw wachtwoord te resetten!</p>
            <form action="" method="post" class="w-25 mx-auto">
                <div class="form-group">
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Verzenden" class="btn btn-primary w-50">
                </div>
            </form>';
        }

        function generateRandomString($length = 10)
        {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }
    ?>

    </div>
    <br>

</body>
<?php include 'includes/footer.html'; ?>

</html>