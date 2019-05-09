<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include 'includes/links.php'; ?>
    <title>Biedingspagina</title>

</head>

<style>
    /* Make the image fully responsive */
    .carousel-inner img {
        width: 100%;
        height: 100%;
    }

    .carousel {
        width: 100%;
        height: auto;
    }

    textarea {
        resize: none;
    }
</style>

<?php include 'includes/header.php'; ?>
<?php require 'php/connectDB.php'; ?>

<body>

    <?php
    if(isset($_GET['voorwerpnummer'])){
        $voorwerpnummer = $_GET['voorwerpnummer'];

        $sql = $dbh->prepare(
            'SELECT titel, beschrijving, voornaam, achternaam, Gebruiker.plaatsnaam
            FROM Gebruiker
            INNER JOIN Voorwerp
            ON Gebruiker.gebruikersnaam = Voorwerp.verkoper
            WHERE Voorwerp.voorwerpnummer = :voorwerpnummer'
        );
        $sql->execute(['voorwerpnummer' => $voorwerpnummer]);
        $resultaat = $sql->fetch(PDO::FETCH_ASSOC);

        $titel = $resultaat['titel'];
        $beschrijving = $resultaat['beschrijving'];
        $voornaam = $resultaat['voornaam'];
        $achternaam = $resultaat['achternaam'];
        $plaatsnaam = $resultaat['plaatsnaam'];

        $sql = $dbh->prepare(
            'SELECT bodbedrag, gebruiker, boddag, bodtijdstip
            FROM Bod, Voorwerp
            WHERE Bod.voorwerp = Voorwerp.voorwerpnummer
            AND voorwerpnummer = :voorwerpnummer
            ORDER BY bodbedrag'
        );
        $sql->execute(['voorwerpnummer' => $voorwerpnummer]);
        $resultaat = $sql->fetchAll(PDO::FETCH_ASSOC);
    }else{
        echo '<script>window.location.replace("zoeken.php");</script>';
        die();
    }
    ?>

    <div class="container my-3">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-7">
                <div id="demo" class="carousel slide mx-auto" data-ride="carousel">
                    <ul class="carousel-indicators">
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                        <li data-target="#demo" data-slide-to="1"></li>
                        <li data-target="#demo" data-slide-to="2"></li>
                        <li data-target="#demo" data-slide-to="3"></li>
                        <li data-target="#demo" data-slide-to="4"></li>
                        <li data-target="#demo" data-slide-to="5"></li>
                    </ul>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://www.w3schools.com/bootstrap4/ny.jpg" alt="Los Angeles">
                        </div>
                        <div class="carousel-item">
                            <img src="https://www.w3schools.com/bootstrap4/ny.jpg" alt="Chicago">
                        </div>
                        <div class="carousel-item">
                            <img src="https://www.w3schools.com/bootstrap4/ny.jpg" alt="New York">
                        </div>
                        <div class="carousel-item">
                            <img src="https://www.w3schools.com/bootstrap4/ny.jpg" alt="Chicago">
                        </div>
                        <div class="carousel-item">
                            <img src="https://www.w3schools.com/bootstrap4/ny.jpg" alt="Chicago">
                        </div>
                        <div class="carousel-item">
                            <img src="https://www.w3schools.com/bootstrap4/ny.jpg" alt="Chicago">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
                <div class="form-group my-3">
                    <h2><?=$titel;?></h2>
                    <p><?=$beschrijving;?></p>

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-5">
                    <p>
                        <h4><?=$voornaam . " " . $achternaam;?></h4>
                        <h6>Bijna 69 jaar actief op EenmaalAndermaal</h6>
                        Rating 4,5 van de 5
                    </p>
                    <hr>
                    <h6>Regio <?=$plaatsnaam;?></h6>
                    <br>
                    <div class="row justify-content-center">
                        <div class="tooltip-wrapper" data-placement="bottom" data-content="Hiervoor moet je ingelogd zijn">
                            <a href="" class="btn btn-secondary disabled" role="button">Chatten</a>
                        </div>
                        &nbsp; &nbsp;
                        <a href="" class="btn btn-primary" role="button">Meer van <?=$voornaam?></a>

                    </div>
                    <br><br>
                    <hr>
                    <h4>Biedingen</h4>
                    <div class="input-group mb-3 mx-auto" style="max-width: 300px;">
                        <input type="text" class="form-control my-4" placeholder="Bijv. €20.00" aria-label=""
                            aria-describedby="basic-addon1">
                        <div class="input-group-prepend my-4">
                            <div class="tooltip-wrapper" data-placement="top"
                                data-content="Hiervoor moet je ingelogd zijn">
                                <input type="submit" class="btn btn-primary disabled" value="Bied">
                            </div>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Gebruiker</th>
                                <th>Bod</th>
                                <th>Datum & Tijd</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            foreach ($resultaat as $key => $value) {
                                $datetime = date_create($value['boddag'] . " " . $value['bodtijdstip'], timezone_open("Europe/Amsterdam"));
                                $datetime = date_format($datetime,"d/m/Y H:i");
                                echo "
                                <tr>
                                <td>" . $value['gebruiker'] . "</td>
                                <td>€ " . $value['bodbedrag'] . "</td>
                                <td>" . $datetime . "</td>
                                </tr>
                                ";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
        </div>
    </div>
    </div>

    <script>
        $('.tooltip-wrapper').popover({
            trigger: "hover"
        });
    </script>

</body>
<footer>
    <?php include 'includes/footer.php'; ?>
</footer>

</html>