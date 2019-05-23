<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include 'includes/links.php'; ?>
    <title>EenmaalAndermaal</title>
</head>

<style>
    .carousel-inner img {
        width: 100%;
        height: 100%;
    }

    #ad img {
        width: 100%;
        height: 100%;
    }

    #ad {
        color: white;
        background-color: #ff814f;
        padding-left: 1%;
    }
</style>

<?php
    include 'includes/header.php';
    require_once 'php/connectDB.php';
?>

<body>

    <?php

$sql = $dbh->prepare("SELECT TOP 1 Voorwerp.Voorwerpnummer, Voorwerp.Titel, Voorwerp.Beschrijving, Voorwerp.LooptijdeindeDag, Voorwerp.LooptijdeindeTijdstip, Gebruiker.Gebruikersnaam 
FROM Voorwerp
INNER JOIN Gebruiker
ON Voorwerp.Verkoper = Gebruiker.Gebruikersnaam
ORDER BY LooptijdbeginDag DESC, LooptijdbeginTijdstip DESC");
$sql->execute();
$resultaat = $sql->fetch(PDO::FETCH_ASSOC);

$voorwerpnummer = $resultaat['Voorwerpnummer'];
$titel = $resultaat['Titel'];
$beschrijving = $resultaat['Beschrijving'];
$beschrijving = substr($beschrijving,0, 200);
$gebruikersnaam = $resultaat['Gebruikersnaam'];
$eindedag = $resultaat['LooptijdeindeDag'];
$eindetijdstip = $resultaat['LooptijdeindeTijdstip'];

$tellenVanFoto = $dbh->prepare("select COUNT(*) as count
from Bestand
where Voorwerp = $voorwerpnummer ");
$tellenVanFoto->execute();
$aantalfoto = $tellenVanFoto->fetch(PDO::FETCH_ASSOC);

$query = "SELECT Filenaam FROM Bestand WHERE Voorwerp = $voorwerpnummer";
$sql = $dbh->prepare($query);
$sql->execute();
$fotos = $sql->fetchAll(PDO::FETCH_ASSOC);

$aantalfoto = $aantalfoto['count'];
if ($aantalfoto > 4){
    $aantalfoto = 4;
}
?>


    <div class="container">
        <div class="segment">
            <div class="row align-items-start">
                <div class="col-lg-7">

                    <div id="demo" class="carousel slide mt-3" data-ride="carousel">
                        <ul class="carousel-indicators">

                            <!-- hieronder een forloop om ervoor te zorgen dat de aantal sliders worden bepaald -->
                            <?php 
                          for( $x=0; $x < $aantalfoto; $x++ ){
                           echo "<li data-target='#demo' data-slide-to='$x' class='active'></li>";
                          }

                        ?>


                        </ul>
                        <div class="carousel-inner">

                        <?php

                        foreach ($fotos as $key => $value) {
                            $foto = $value['Filenaam'];
                            echo   "<div class='carousel-item active' style='cursor: pointer'
                        onclick=\"window.location='biedingspagina.php?voorwerpnummer=" . $voorwerpnummer . "';\">
                                <img src='http://iproject15.icasites.nl/$foto' alt='Slider afbeelding'>
                                </div>";
                        }

                        ?>


                        </div>

                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#demo" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>
                    </div>
                </div>
                <?php    echo    "<div class='col-lg-5 mt-2'>
                <h2>$titel</h2>
                <h6>$gebruikersnaam</h6>
                <h4>Omschrijving:</h4>
                <small> $beschrijving...
                </small>
            </div>" ?>
            </div>
            <div class="col-lg-7 d-flex justify-content-center">
                <?php    echo    "<h4>Nog&nbsp</h4>  <h4 id='$voorwerpnummer'></h4>
                     </div>
                                <script>
										var countDownDate$voorwerpnummer = new Date('$eindedag $eindetijdstip').getTime();

										var x = setInterval(function() {

											var now = new Date().getTime();

											var distance = countDownDate$voorwerpnummer - now;

											var days = Math.floor(distance / (1000 * 60 * 60 * 24));
											var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
											var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
											var seconds = Math.floor((distance % (1000 * 60)) / 1000);

											document.getElementById('$voorwerpnummer').innerHTML = days + 'd ' + hours + 'h '
											+ minutes + 'm ' + seconds + 's ';

											if (distance < 0) {
												clearInterval(x);
												document.getElementById('$voorwerpnummer').innerHTML = 'Veiling afgelopen!';
											}
										}, 1000);
								  </script>" ?>
                    </div>
            <div class="row mt-5">
                <?php
            // veiling gesloten in Voorwerp is standaard 0, dit betekent dus dat de veiling nog open is. Bij het aflopen van de veiling wordt de waarde naar 1 gezet.
                $sql = $dbh->prepare("select top 12 Voorwerp.voorwerpnummer, Voorwerp.titel , Bestand.Filenaam from Voorwerp inner join Bestand on Voorwerp.voorwerpnummer = Bestand.voorwerp where Voorwerp.veiliggesloten = 0");
                $sql->execute();
                $result = $sql->fetchAll(PDO::FETCH_ASSOC);

                foreach ($result as $key => $value) {
                    $titel = $value['titel'];
                    $titel = substr($titel, 0, 25);
                    $foto = $value['Filenaam'];
                    $voorwerpnummer = $value['voorwerpnummer'];
                    echo "<div class='col-xs-12 col-sm-6 col-md-4 col-lg-3' style='cursor: pointer'
                    onclick=\"window.location='biedingspagina.php?voorwerpnummer=" . $voorwerpnummer . "';\">
                    <div id='ad'>
                        <img style='height:150px' src='/$foto' alt='Responsive image'>
                        <p>$titel</p>
                    </div>
                </div>";
                }
            ?>
            </div>
        </div>
</body>

<?php include 'includes/footer.php'; ?>

</html>