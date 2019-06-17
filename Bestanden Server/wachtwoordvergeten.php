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

        //Kijkt of er messages in de URL zijn gezet die weergegeven moeten worden
        if (isset($_GET['errc'])) {
            $type = 'danger';
            $titel = 'Sorry!';
            if ($_GET['errc'] == '1') {
                $msg = 'Dit emailadres is bij ons niet bekend. Probeer het opnieuw!';
            }
            if ($_GET['errc'] == '2') {
                $msg = 'U heeft geen emailadres ingevuld. Probeer het opnieuw!';
            }
            if ($_GET['errc'] == '3') {
                $msg = 'U heeft een verkeerd antwoord op de beveiligingsvraag ingevuld. Probeer het opnieuw!';
            }
            if ($_GET['errc'] == '4')
            {
                $msg = 'mail is niet verstuurd, probeer het opnieuw';
            }
        }
        if (isset($_GET['succ'])) {
            $type = 'success';
            $titel = 'Top!';
            if ($_GET['succ'] == '1') {
                $msg = 'Uw nieuwe wachtwoord is naar u gemaild. Vergeet niet uw wachtwoord te wijzigen na het inloggen!';
            }
        }

        //Geeft messages weer indiend die er zijn
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

        if (isset($_POST['email']) && isset($_POST['antwoord'])) {
            $emailadres = strip_tags($_POST['email']);
            $antwoordtext = strip_tags($_POST['antwoord']);

                //Vraagt antwoord op beveilingsvraag van emailadres.
                $query1 = "SELECT Antwoordtext
                FROM Gebruiker
                WHERE Mailbox = :mail";
                $sql1 = $dbh->prepare($query1);
                $sql1->execute(['mail' => $emailadres]);
                $vraag = $sql1->fetch(PDO::FETCH_ASSOC);
                $antwoord = $vraag['Antwoordtext'];

                // hiermee controleer je of het ingevulde antwoord gelijk is aan die uit de database.
                if( $antwoord == $antwoordtext ) {
                    $nieuwwachtwoord = generateRandomString();
                    $nieuwwachtwoordhash = password_hash($nieuwwachtwoord, PASSWORD_ARGON2I);

                    $query = "UPDATE Gebruiker
                    SET Wachtwoord = :nieuwwachtwoordhash
                    WHERE Mailbox = :emailadres";
                    $sql = $dbh->prepare($query);
                    $sql->execute(['nieuwwachtwoordhash' => $nieuwwachtwoordhash,
                                    'emailadres' => $emailadres]);

                    $subject = "Nieuw Wachtwoord";
                    $txt = "<html>
                        <head>
                        <title>Uw nieuwe wachtwoord!</title>
                        </head>
                        <body style=text-alignn: center;'>
                        <h1>Uw nieuwe wachtwoord</h1>
                        <h3>" . $nieuwwachtwoord . "</h3>
                        <br>
                        <h3>LET OP! HET IS BELANGRIJK DAT U UW WACHTWOORD METEEN WIJZIGT!</h3>
                        <p> Klik <a href='http://iproject15.icasites.nl/inloggen.php?opt=1' target='_blank'>hier</a> om in te loggen. </p>
                        </body>
                        </html>
                        ";
                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    $headers .= "From: noreply@eenmaalandermaal.nl" . "\r\n";
                    $success =  mail($emailadres, $subject, $txt, $headers);
                    if (!$success) {
                        header("Location: ../wachtwoordvergeten.php?errc=4");
                    }
                    else
                    {
                    //Success message en knop naar inlogpagina
                    echo '<h1>Wachtwoord gereset!</h1>
                        <p>U vind uw nieuwe wachtwoord in uw mailbox.</p>
                        <a href="inloggen.php" class="btn btn-primary">Inloggen</a>';
                    echo '<script>window.location.replace("wachtwoordvergeten.php?succ=1");</script>';
                    }     
                } else {
                //Geen juiste antwoord? Dan redirect naar zichzelf met error code 3. Antwoord is niet bekend.
                    echo '<script>window.location.replace("wachtwoordvergeten.php?errc=3");</script>';
                }
            
        } else if (isset($_POST['vraag'])) {
            $emailadres = strip_tags($_POST['email']);

            //Vraagt gebruiker op met meegegeven emailadres
            $query = "SELECT Mailbox
            FROM Gebruiker
            WHERE Mailbox = :emailadres";
            $sql = $dbh->prepare($query);
            $sql->execute(['emailadres' => $emailadres]);
            $resultaat = $sql->fetchAll(PDO::FETCH_ASSOC);

            //Als er resultaat is nieuw wachtwoord genereren. Gebruiker record updaten met nieuwe wachtwoord. Mail versturen.
            if ($resultaat) {
                if ($_POST['email'] != "") {
                    $emailadres = strip_tags($_POST['email']);

                    //deze query haalt de beveiligingsvraag op
                    $query = "SELECT Tekst_vraag 
                    FROM Gebruiker INNER JOIN Vraag 
                    ON Vraag = Vraagnummer 
                    WHERE Mailbox = :mail";
                    $sql = $dbh->prepare($query);
                    $sql->execute(['mail' => $emailadres]);
                    $resultaat = $sql->fetch(PDO::FETCH_ASSOC);
                    $vraag = $resultaat['Tekst_vraag'];

                    echo '<h1>Wachtwoord vergeten?</h1>
                    <p>'.$vraag.'</p>
                    <form action="" method="post" class="w-25 mx-auto">
                    <div class="form-group">
                        <input type="text" name="antwoord" class="form-control" placeholder="Antwoord" maxlength="300" required>
                    </div>
                    <input type="hidden" name="email" value="'.$emailadres.'" class="form-control">
                    <div class="form-group">
                        <input type="submit" name="submit" value="Verzenden" class="btn btn-primary w-50">
                    </div>
                    </from>';
                }
            } else {
                //Geen resultaat? Dan redirect naar zichzelf met error code 1. Emailadres niet bekend.
                echo '<script>window.location.replace("wachtwoordvergeten.php?errc=1");</script>';
            }
        } else {
        //Beginpunt. Form voor invullen email als deze pagina zonder POST info wordt geladen.
        echo '<h1>Wachtwoord vergeten?</h1>
        <p>Voer uw email in om uw wachtwoord te resetten!</p>
        <form action="" method="post" class="w-25 mx-auto">
            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Emailadres" maxlength="255" required>
            </div>
            
            <div class="form-group">
                <input type="submit" name="vraag" value="Verzenden" class="btn btn-primary w-50">
            </div>
        </form>';
        }

    //Genereert een random string met een bepaalde lengte (standaard 10)
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
<?php include 'includes/footer.php'; ?>

</html>