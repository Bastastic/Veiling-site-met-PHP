<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php
        include 'includes/links.php';
    ?>
    <link rel="stylesheet" href="css/faq.css" />

    <title>Profiel</title>
</head>

<?php
    include 'includes/header.php';
    
    if (!isset($_SESSION['userID'])) {
        echo '<script>window.location.replace("inloggen.php");</script>';
    }

    if (isset($_GET['errc'])) {
        $type = 'danger';
        $titel = 'Sorry!';
        if ($_GET['errc'] == '1') {
            $msg = 'Error msg 1';
        }
    }
    if (isset($_GET['succ'])) {
        $type = 'success';
        $titel = 'Top!';
        if ($_GET['succ'] == '1') {
            $msg = 'U heeft uw account succesvol geactiveerd!';
        }
    }
?>

<body>
    <br>

    <div class="container">
        <?php
        // haal hier de gebruiker uit de sessievariabele
            echo "<h1>Welkom $voornaam $achternaam</h1>";
        ?>
        <?php
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
        <br>
        <div class="row" id="parentTab">
            <div class="col-md-3" id="sidebar">
                <div class="nav nav-pills faq-nav" id="faq-tabs" role="tablist" aria-orientation="vertical">
                    <a href="#tab1" class="nav-link active" data-toggle="pill" role="tab" aria-controls="tab1"
                        aria-selected="true">
                        <i class="mdi mdi-help-circle"></i> Dashboard
                    </a>
                    <a href="#tab2" class="nav-link" data-toggle="pill" role="tab" aria-controls="tab2"
                        aria-selected="false">
                        <i class="mdi mdi-account"></i> Wachtwoord
                    </a>
                    <a href="#tab3" class="nav-link" data-toggle="pill" role="tab" aria-controls="tab3"
                        aria-selected="false">
                        <i class="mdi mdi-account-settings"></i> Lopende veilingen
                    </a>
                    <a href="#tab4" class="nav-link" data-toggle="pill" role="tab" aria-controls="tab4"
                        aria-selected="false">
                        <i class="mdi mdi-heart"></i> Veiling historie
                    </a>
                </div>
            </div>
            <div class="col-md-9 accordion-group">
                <div class="tab-content" id="faq-tab-content">
                    <div class="tab-pane show active" id="tab1" role="tabpanel" aria-labelledby="tab1">
                        <div class="accordion" id="accordion-tab-1">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4>Dashboard</h4>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">

                                            <?php
                                            $sql = $dbh->prepare(
                                                "SELECT COUNT(*) AS 'count' FROM Verkoper WHERE Gebruiker = :gebruikersnaam"
                                            );
                                            $sql->execute(['gebruikersnaam' => $gebruikersnaam]);
                                            $aantal = count($sql->fetchAll());

                                            //kijkt of de gebruiker zijn gegevens al heeft opgegeven
                                            $verkoper = $dbh->prepare(
                                                "SELECT * FROM Verkoper inner join Gebruiker on Verkoper.Gebruiker = Gebruiker.Gebruikersnaam WHERE Verkoper.Gebruiker = :gebruikersnaam"
                                                );
                                            $verkoper->execute(['gebruikersnaam' => $gebruikersnaam]);
                                            $result = $verkoper->fetch(PDO::FETCH_ASSOC);
                                            $geactiveerd = $result['Verkoper'];

                                            if ($result) {
                                                if ($geactiveerd == 1) {
                                                    echo '<p class="mb-1"><strong>Wilt u een voorwerp veilen?</strong></p>
                                                    <a href="cat.php" class="btn btn-primary" role="button">
                                                    Maak veiling
                                                    </a>';
                                                } else {
                                                    echo '<p class="mb-1"><strong>Wilt u een voorwerp veilen?</strong></p>
                                                    <p>
                                                    Uw gegevens moeten gecontrolleerd worden voordat u een veiling kunt maken, dit zal binnen een paar dagen gebeuren.
                                                    </p>';
                                                }
                                            } else {
                                                echo '<p class="mb-1"><strong>Verkoper worden?</strong></p>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#verkoperWorden" role="button">
                                                Update account
                                                </button>';
                                            }

                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab2" role="tabpanel" aria-labelledby="tab2">
                        <div class="accordion" id="accordion-tab-2">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4>Wachtwoord veranderen</h4>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form>
                                                <div class="form-group row">
                                                    <label for="username"
                                                        class="col-4 col-form-label">Wachtwoord</label>
                                                    <div class="col-8">
                                                        <input id="oudWW" name="oudWW" placeholder="Wachtwoord"
                                                            class="form-control here" required="required"
                                                            type="password">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="username" class="col-4 col-form-label">Nieuw
                                                        wachtwoord</label>
                                                    <div class="col-8">
                                                        <input id="nieuwWW" name="nieuwWW" placeholder="Wachtwoord"
                                                            class="form-control here" required="required"
                                                            type="password">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="name" class="col-4 col-form-label">Nieuw wachtwoord
                                                        herhalen</label>
                                                    <div class="col-8">
                                                        <input id="nieuwWWher" name="nieuwWWher"
                                                            placeholder="Wachtwoord" class="form-control here"
                                                            type="password">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="offset-4 col-8">
                                                        <button name="submit" type="submit"
                                                            class="btn btn-primary">Update Wachtwoord</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab3" role="tabpanel" aria-labelledby="tab3">
                        <div class="accordion" id="accordion-tab-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4>Lopende veilingen</h4>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">

                                        <?php
                                            $query = "SELECT * 
                                            FROM Voorwerp
                                            WHERE Verkoper = :verkoper
                                            AND cast(LooptijdeindeDag as datetime) + cast(LooptijdeindeTijdstip as datetime) > GETDATE()
                                            ORDER BY LooptijdeindeDag DESC, LooptijdeindeTijdstip DESC
                                            ";
                                            $sql = $dbh->prepare($query);
                                            $sql->execute(['verkoper' => $gebruikersnaam]);
                                            $veilingen = $sql->fetchAll(PDO::FETCH_ASSOC);

                                            foreach ($veilingen as $key => $value) {
                                                $titel = $value['Titel'];
                                                $beschrijving = $value['Beschrijving'];
                                                $voorwerpnummer = $value['Voorwerpnummer'];
                                                $datetime = date_create($value['LooptijdeindeDag'] . " " . $value['LooptijdeindeTijdstip'], timezone_open("Europe/Amsterdam"));
                                                $datetime = date_format($datetime, "d-m-Y H:i");

                                                $sql = $dbh->prepare(
                                                    'SELECT bodbedrag, gebruiker, boddag, bodtijdstip
                                                    FROM Bod, Voorwerp
                                                    WHERE Bod.voorwerp = Voorwerp.voorwerpnummer
                                                    AND voorwerpnummer = :voorwerpnummer
                                                    ORDER BY bodbedrag DESC'
                                                );

                                                $sql->execute(['voorwerpnummer' => $value['Voorwerpnummer']]);
                                                $resultaat = $sql->fetchAll(PDO::FETCH_ASSOC);
                                                $hoogstebod = $value['Startprijs'];
                                                if ($resultaat) {
                                                    $hoogstebod = $resultaat[0]['bodbedrag'];
                                                }

                                                $query = "SELECT TOP 1 Filenaam FROM Bestand WHERE Voorwerp = $voorwerpnummer";
                                                $sql = $dbh->prepare($query);
                                                $sql->execute();
                                                $fotos = $sql->fetch(PDO::FETCH_ASSOC);
                                                $foto = $fotos['Filenaam'];

                                                echo '<div class="card mb-3" style="max-width: 800px;">
                                                <div class="row no-gutters">
                                                    <div class="col-md-4">
                                                        <img src="http://iproject15.icasites.nl/' . $foto . '" class="card-img" alt="...">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <h5 class="card-title">' . $titel . '</h5>
                                                            <p class="card-text">' . $beschrijving . '</p>
                                                            <p class="card-text">Hoogste bod: ' . $hoogstebod . '</p>
                                                            <p class="card-text"><small class="text-muted">Loopt af op ' . $datetime . '</small></p>
                                                            <a href="biedingspagina.php?voorwerpnummer=' . $voorwerpnummer . '" class="btn btn-primary stretched-link">Bekijk veiling</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>';
                                            }
                                        ?>
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="tab4" role="tabpanel" aria-labelledby="tab4">
                        <div class="accordion" id="accordion-tab-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4>Veiling historie</h4>
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">

                                            <?php
                                            $query = "SELECT * 
                                            FROM Voorwerp
                                            WHERE Verkoper = :verkoper
                                            AND cast(LooptijdeindeDag as datetime) + cast(LooptijdeindeTijdstip as datetime) <= GETDATE()
                                            ORDER BY LooptijdeindeDag DESC, LooptijdeindeTijdstip DESC
                                            ";
                                            $sql = $dbh->prepare($query);
                                            $sql->execute(['verkoper' => $gebruikersnaam]);
                                            $veilingen = $sql->fetchAll(PDO::FETCH_ASSOC);

                                            foreach ($veilingen as $key => $value) {
                                                $titel = $value['Titel'];
                                                $beschrijving = $value['Beschrijving'];
                                                $voorwerpnummer = $value['Voorwerpnummer'];
                                                $hoogstebod = $value['Startprijs'];
                                                $datetime = date_create($value['LooptijdeindeDag'] . " " . $value['LooptijdeindeTijdstip'], timezone_open("Europe/Amsterdam"));
                                                $datetime = date_format($datetime, "d-m-Y H:i");
                                                $gesloten = $value['VeiligGesloten'];

                                                $sql = $dbh->prepare(
                                                    'SELECT TOP 1 voorwerp, bodbedrag, gebruiker, voornaam, achternaam, mailbox, boddag, bodtijdstip
                                                    FROM Bod
                                                    INNER JOIN Gebruiker
                                                    ON Bod.gebruiker = Gebruiker.gebruikersnaam
                                                    WHERE voorwerp = :voorwerpnummer
                                                    GROUP BY Bod.gebruiker, Gebruiker.voornaam, Gebruiker.achternaam, Gebruiker.mailbox, BodDag, BodTijdstip, Bod.voorwerp, bodbedrag
                                                    ORDER BY bodbedrag DESC'
                                                );

                                                $sql->execute(['voorwerpnummer' => $voorwerpnummer]);
                                                $resultaat = $sql->fetch(PDO::FETCH_ASSOC);
                                                if ($resultaat) {
                                                    $hoogstebod = $resultaat['bodbedrag'];
                                                    $voornaambieder = $resultaat['voornaam'];
                                                    $achternaambieder = $resultaat['achternaam'];
                                                    $mailboxbieder = $resultaat['mailbox'];
                                                }

                                                $query = "SELECT TOP 1 Filenaam FROM Bestand WHERE Voorwerp = $voorwerpnummer";
                                                $sql = $dbh->prepare($query);
                                                $sql->execute();
                                                $fotos = $sql->fetch(PDO::FETCH_ASSOC);
                                                $foto = $fotos['Filenaam'];


                                                if ($gesloten == 0) {
                                                    echo '<div class="card mb-3" style="max-width: 800px;">
                                                <div class="row no-gutters">
                                                    <div class="col-md-4">
                                                        <img src="http://iproject15.icasites.nl/' . $foto . '" class="card-img" alt="...">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <h5 class="card-title">' . $titel . '</h5>
                                                            <p class="card-text">' . $beschrijving . '</p>
                                                            <p class="card-text mt-3">Hoogste bod: ' . $hoogstebod . '</p>
                                                            <a href="biedingspagina.php?voorwerpnummer=' . $voorwerpnummer . '" class="btn btn-primary mt-2">Bekijk veiling</a>
                                                            <a href="actions/veilingeindigen.php?voorwerpnummer=' . $voorwerpnummer . '" class="btn btn-primary mt-2">Veiling afronden</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>';
                                                } else {
                                                    echo '<div class="card mb-3" style="max-width: 800px;">
                                                <div class="row no-gutters">
                                                    <div class="col-md-4">
                                                        <img src="http://iproject15.icasites.nl/' . $foto . '" class="card-img" alt="...">
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="card-body">
                                                            <h5 class="card-title">' . $titel . '</h5>
                                                            <p class="card-text">' . $beschrijving . '</p>
                                                            <p class="card-text mt-3">Hoogste bod: ' . $hoogstebod . '</p>
                                                            <a href="biedingspagina.php?voorwerpnummer=' . $voorwerpnummer . '" class="btn btn-primary mt-2">Bekijk veiling</a>
                                                            <a class="btn btn-primary mt-2 disabled" disabled>Gesloten</a>
                                                            <p class="mt-2">Gewonnen door: ' . $voornaambieder . ' ' . $achternaambieder . '</p>
                                                            <h4><a href="mailto:'.$mailboxbieder.'">' . $mailboxbieder . '</a></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>';
                                                }
                                            }
                                        ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- popup window voor verkoper worden -->
    <div class="modal fade" id="verkoperWorden" tabindex="-1" role="dialog" aria-labelledby="verkoperWordenLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h2>Vul uw betaalgegevens in</h2>
                    <p>Minimaal 1 betaalwijze invullen</p><br>

                    <script type="text/javascript">
                        function validateForm() {
                            var a = document.forms["verkoper"]["IBAN"].value;
                            var b = document.forms["verkoper"]["ccNummer"].value;
                            var c = document.forms["verkoper"]["bank"].value;
                            if ((a == null || a == "") && (b == null || b == "")) {
                                alert("Vul minimaal 1 betaalwijze in.");
                                return false;
                            } else {
                                if (!(a == null || a == "") && c == "Kiew uw bank") {
                                    alert("Selecteer alstublieft een bank.");
                                    return false;
                                } else {
                                    return true;
                                }
                            }
                        }
                    </script>

                    <form action="" method="post" name="verkoper" onsubmit="return validateForm()">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="bank">Bank</label>
                                    <div class="form-group">
                                        <select class="form-control" id="bank" name="bank">
                                            <option>Kiew uw bank</option>
                                            <option>ING</option>
                                            <option>Rabobank</option>
                                            <option>ABN-Amro</option>
                                            <option>ASN</option>
                                            <option>SNS</option>
                                            <option>DHB</option>
                                            <option>Bunq</option>
                                            <option>Knab</option>
                                            <option>Triodos bank</option>
                                        </select>
                                    </div>
                                    <label for="IBAN">IBAN</label>
                                    <input type="text" class="form-control" id="IBAN" name="IBAN"
                                        placeholder="Vul uw IBAN in">
                                </div>
                            </div>
                            <div class="col-6 border-left">
                                <label for="ccNummer">Creditcard nummer</label>
                                <input type="text" class="form-control" id="ccNummer" name="ccNummer"
                                    placeholder="Vul uw creditcard nummer in">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <?php
    include 'php/phpcreditcard.php';
    include 'php/IBANcheck.php';

    if ((isset($_POST['IBAN']) && $_POST['IBAN'] != "") && (isset($_POST['ccNummer']) && $_POST['ccNummer'] != "")) {
        $banknaam = $_POST['bank'];
        $IBAN = $_POST['IBAN'];
        $ccNummer = $_POST['ccNummer'];

        if (isValidIBAN($IBAN) == true && check_cc($ccNummer) == true) {
            $sql = $dbh->prepare(
                "INSERT INTO Verkoper VALUES (:gebruikersnaam, :banknaam, :IBAN, 'In afwachting', :ccNummer)"
                );
            $sql->execute(['gebruikersnaam' => $gebruikersnaam, 'banknaam' => $banknaam, 'IBAN' => $IBAN, 'ccNummer' => $ccNummer]);

            $message = "Uw gegevens zijn opgestuurd, u krijgt binnenkort een mail hierover.";
            echo "<script type='text/javascript'>alert('$message');</script>";
        } else {
            $message = "Uw gegevens worden niet herkend";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    } elseif (isset($_POST['IBAN']) && $_POST['IBAN'] != "") {
        $banknaam = $_POST['bank'];
        $IBAN = $_POST['IBAN'];

        if (isValidIBAN($IBAN)) {
            $sql = $dbh->prepare(
                "INSERT INTO Verkoper VALUES (:gebruikersnaam, :banknaam, :IBAN, 'In afwachting', null)"
                );
            $sql->execute(['gebruikersnaam' => $gebruikersnaam, 'banknaam' => $banknaam, 'IBAN' => $IBAN]);

            $message = "Uw gegevens zijn opgestuurd, u krijgt binnenkort een mail hierover.";
            echo "<script type='text/javascript'>alert('$message');</script>";
        } else {
            $message = "Deze IBAN wordt niet herkend";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    } elseif (isset($_POST['ccNummer']) && $_POST['ccNummer'] != "") {
        $ccNummer = $_POST['ccNummer'];

        if (check_cc($ccNummer)) {
            $sql = $dbh->prepare(
                "INSERT INTO Verkoper VALUES (:gebruikersnaam, null, null, 'In afwachting', :ccNummer)"
                );
            $sql->execute(['gebruikersnaam' => $gebruikersnaam, 'ccNummer' => $ccNummer]);

            $message = "Uw gegevens zijn opgestuurd, u krijgt binnenkort een mail hierover.";
            echo "<script type='text/javascript'>alert('$message');</script>";
        } else {
            $message = "Dit creditcard nummer wordt niet herkend";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    }
?>

    <br>
</body>
<?php include 'includes/footer.php'; ?>

</html>