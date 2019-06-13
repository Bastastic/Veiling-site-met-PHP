<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php include 'includes/links.php'; ?>
    <title>EenmaalAndermaal</title>
</head>

<?php
    include 'includes/header.php';
    require_once 'php/connectDB.php';
?>
<body>
<style>
    .carousel-inner img {
        width: 100%;
        height: 100%;
    }

    .ad img {
        width: 100%;
        height: 100%;
    }

    .ad {
        color: white;
        background-color: #ff814f;
        /* padding-left: 1%; */
    }
</style>
<?php

//Haalt laatst toegevoegde voorwerp uit de database
$sql = $dbh->prepare("SELECT TOP 1 Voorwerp.Voorwerpnummer, Voorwerp.Titel, Voorwerp.Beschrijving, Voorwerp.LooptijdeindeDag, Voorwerp.LooptijdeindeTijdstip, Gebruiker.Gebruikersnaam 
FROM Voorwerp
LEFT JOIN Gebruiker
ON Voorwerp.Verkoper = Gebruiker.Gebruikersnaam
WHERE cast(LooptijdeindeDag as datetime) + cast(LooptijdeindeTijdstip as datetime) > GETDATE() 
AND Voorwerpnummer not in (select AdvertentieID from geblokkeerdeVeilingen) 
ORDER BY LooptijdbeginDag DESC, LooptijdbeginTijdstip DESC");
$sql->execute();
$resultaat = $sql->fetch(PDO::FETCH_ASSOC);

$voorwerpnummer = $resultaat['Voorwerpnummer'];
$titel = $resultaat['Titel'];
$beschrijving = $resultaat['Beschrijving'];
$beschrijving = substr($beschrijving, 0, 200);
$gebruikersnaam = $resultaat['Gebruikersnaam'];
$eindedag = $resultaat['LooptijdeindeDag'];
$eindetijdstip = $resultaat['LooptijdeindeTijdstip'];

//Bepaalt het aantal foto's voor product
$tellenVanFoto = $dbh->prepare("select COUNT(*) as count
from Bestand
where Voorwerp = $voorwerpnummer ");
$tellenVanFoto->execute();
$aantalfoto = $tellenVanFoto->fetch(PDO::FETCH_ASSOC);

//Haalt alle foto's van uitgelichte voorwerp op.
$query = "SELECT Filenaam FROM Bestand WHERE Voorwerp = :voorwerpnummer";
$sql = $dbh->prepare($query);
$sql->execute(['voorwerpnummer' => $voorwerpnummer]);
$fotos = $sql->fetchAll(PDO::FETCH_ASSOC);

//Telt aantal foto's
$aantalfoto = $aantalfoto['count'];
if ($aantalfoto > 4) {
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
                          for ($x=0; $x < $aantalfoto; $x++) {
                              if ($x == 0) {
                                  echo "<li data-target='#demo' data-slide-to='$x' class='active'></li>";
                              } else {
                                  echo "<li data-target='#demo' data-slide-to='$x'>";
                              }
                          }

                        ?>


                        </ul>
                        <div class="carousel-inner">

                        <?php
                        $a = 0;
                        //Zet alle foto's in carousel
                        foreach ($fotos as $key => $value) {
                            $foto = strip_tags($value['Filenaam']);
                            
                            //Eerste foto is active
                            if ($a == 0) {
                                echo   "<div class='carousel-item active' style='cursor: pointer'
                            onclick=\"window.location='biedingspagina.php?voorwerpnummer=" . htmlspecialchars($voorwerpnummer, ENT_QUOTES, 'UTF-8') . "';\">
                                    <img src='http://iproject15.icasites.nl/" . htmlspecialchars($foto, ENT_QUOTES, 'UTF-8'). "' alt='Slider afbeelding'>
                                    </div>";
                                $a++;
                            //De volgende foto's allemaal niet active
                            } else {
                                echo   "<div class='carousel-item' style='cursor: pointer'
                            onclick=\"window.location='biedingspagina.php?voorwerpnummer=" . htmlspecialchars($voorwerpnummer, ENT_QUOTES, 'UTF-8') . "';\">
                                    <img src='http://iproject15.icasites.nl/" . htmlspecialchars($foto, ENT_QUOTES, 'UTF-8'). "' alt='Slider afbeelding'>
                                    </div>";
                            }
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
                <!-- Details van de uitglichte veiling -->
                <?php    echo    "<div class='col-lg-5 mt-2'>
                <h2>" . htmlspecialchars($titel, ENT_QUOTES, 'UTF-8'). "</h2>
                <h6>" . htmlspecialchars($gebruikersnaam, ENT_QUOTES, 'UTF-8'). "</h6>
                <h4>Omschrijving:</h4>
                <small> " . htmlspecialchars($beschrijving, ENT_QUOTES, 'UTF-8'). "...
                </small>
            </div>" ?>
            </div>
            <!-- Countdown timer -->
            <div class="col-lg-7 d-flex justify-content-center">
                <?php    echo    "<h4>Nog&nbsp</h4>  <h4 id='" . htmlspecialchars($voorwerpnummer, ENT_QUOTES, 'UTF-8'). "'></h4>
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
                $sql = $dbh->prepare("SELECT top 12 Voorwerp.voorwerpnummer, Voorwerp.titel , Bestand.Filenaam 
                from Voorwerp inner join Bestand on Voorwerp.voorwerpnummer = Bestand.voorwerp 
                where Voorwerp.veiliggesloten = 0 AND cast(LooptijdeindeDag as datetime) + cast(LooptijdeindeTijdstip as datetime) > GETDATE()
                AND Voorwerpnummer not in (select AdvertentieID from geblokkeerdeVeilingen) 
                order by NEWID()");
                $sql->execute();
                $result = $sql->fetchAll(PDO::FETCH_ASSOC);

                //Geeft de 12 random veilingen weer
                shuffle($result);
                foreach ($result as $key => $value) {
                    $titel = $value['titel'];
                    $titel = substr($titel, 0, 25);
                    $titel = strip_tags($titel);
                    $foto = strip_tags($value['Filenaam']);
                    $voorwerpnummer = strip_tags($value['voorwerpnummer']);
                    echo "<div class='col-xs-12 col-sm-6 col-md-4 col-lg-3' style='cursor: pointer'
                    onclick=\"window.location='biedingspagina.php?voorwerpnummer=" .  htmlspecialchars($voorwerpnummer, ENT_QUOTES, 'UTF-8')  . "';\">
                    <div class='ad'>
                        <img style='height:150px' src='http://iproject15.icasites.nl/" . htmlspecialchars($foto, ENT_QUOTES, 'UTF-8'). "' alt='Responsive image'>
                        <p>" . htmlspecialchars($titel, ENT_QUOTES, 'UTF-8'). "</p>
                    </div>
                </div>";
                }
            ?>
            </div>
        </div>
</body>

<?php include 'includes/footer.php'; ?>

</html>