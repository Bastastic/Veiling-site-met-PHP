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
<?php require_once 'php/connectDB.php'; ?>

<body>

    <?php


    if (isset($_GET['voorwerpnummer'])) {
        $voorwerpnummer = $_GET['voorwerpnummer'];

        //Selecteert alle gegevens van veiling en verkoper
        $sql = $dbh->prepare(
            'SELECT titel, beschrijving, startprijs, LooptijdeindeDag, LooptijdeindeTijdstip, Veiliggesloten, gebruikersnaam, voornaam, achternaam, Gebruiker.plaatsnaam, Mailbox
            FROM Gebruiker
            INNER JOIN Voorwerp
            ON Gebruiker.gebruikersnaam = Voorwerp.verkoper
            WHERE Voorwerp.voorwerpnummer = :voorwerpnummer'
        );
        $sql->execute(['voorwerpnummer' => $voorwerpnummer]);
        $resultaat = $sql->fetch(PDO::FETCH_ASSOC);

        $sqlaf = $dbh->prepare('SELECT * 
        FROM Voorwerp
        WHERE Voorwerpnummer = :voorwerpnummer
        AND cast(LooptijdeindeDag as datetime) + cast(LooptijdeindeTijdstip as datetime) <= GETDATE()');
        $sqlaf->execute(['voorwerpnummer' => $voorwerpnummer]);
        $isaf = $sqlaf->fetch();

        $afgelopen = 'Veiling afgelopen!';
        // $rapoteerder = $_SESSION['userID'];
        $titel = $resultaat['titel'];
        $beschrijving = $resultaat['beschrijving'];
        $eindedag = $resultaat['LooptijdeindeDag'];
        $eindetijdstip = $resultaat['LooptijdeindeTijdstip'];
        $email = $resultaat['Mailbox'];
        $veilinggesloten = $resultaat['Veiliggesloten'];
        $verkoper = $resultaat['gebruikersnaam'];
        $voornaam = $resultaat['voornaam'];
        $achternaam = $resultaat['achternaam'];
        $plaatsnaam = $resultaat['plaatsnaam'];
        $startprijs = $resultaat['startprijs'];
        // $omschrijving = $_POST['omschrijving'];
        //Selecteert bedrag, bieder, boddatum en tijd.
        $sql = $dbh->prepare(
            'SELECT bodbedrag, gebruiker, boddag, bodtijdstip
            FROM Bod, Voorwerp
            WHERE Bod.voorwerp = Voorwerp.voorwerpnummer
            AND voorwerpnummer = :voorwerpnummer
            ORDER BY bodbedrag DESC'
        );
        $sql->execute(['voorwerpnummer' => $voorwerpnummer]);
        $resultaat = $sql->fetchAll(PDO::FETCH_ASSOC);
        //Hoogstebod is startprijs behalve als er geboden is dan is hoogstebod het hoogstebod
        $hoogstebod = $startprijs;
        if ($resultaat) {
            $hoogstebod = $resultaat[0]['bodbedrag'];
        }

        //Telt aantal foto's
        $tellenVanFotos = $dbh->prepare("select COUNT(*) as count
                                        from Bestand
                                        where Voorwerp = $voorwerpnummer ");
        $tellenVanFotos->execute();
        $aantalfoto = $tellenVanFotos->fetch(PDO::FETCH_ASSOC);

        //Limit aantal foto's (extra beveilinging)
        $aantalfoto = $aantalfoto['count'];
        if ($aantalfoto > 4) {
            $aantalfoto = 4;
        }
    } else {
        //Geen voorwerpnummer? Terug naar zoekpagina
        echo '<script>window.location.replace("zoeken.php");</script>';
        die();
    }

    //Haalt alle foto's op uit de database
    $query = "SELECT Filenaam FROM Bestand WHERE Voorwerp = :voorwerpnummer";
    $sql = $dbh->prepare($query);
    $sql->execute(['voorwerpnummer' => $voorwerpnummer]);
    $fotos = $sql->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <div class="container my-3">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-7">
                <div id="demo" class="carousel slide mx-auto" data-ride="carousel">
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
                        //Geeft foto's weer. De eerste als active, de rest niet.
                        $a = 0;
                        foreach ($fotos as $key => $value) {
                            $foto = $value['Filenaam'];
                         
                            if ($a == 0) {
                                echo   "<div class='carousel-item active' style='cursor: pointer'>
                                    <img src='http://iproject15.icasites.nl/$foto' alt='Slider afbeelding'>
                                    </div>";
                                $a++;
                            } else {
                                echo   "<div class='carousel-item' style='cursor: pointer'>
                                    <img src='http://iproject15.icasites.nl/$foto' alt='Slider afbeelding'>
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
                <!-- Geeft titel en beschrijving weer -->
                <div class="my-3">
                    <h2><?=$titel;?></h2>
                    <p><?=$beschrijving;?></p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-5">
                <p>
                    <!-- Laat voornaam achternaam verkoper zien -->
                    <h4><?=$voornaam . " " . $achternaam;?></h4>
                </p>
                <!-- Laat plaats van verkoper zien -->
                <p>Regio <?=$plaatsnaam;?></p>
                <hr>
                <br>
                <div class="row justify-content-center">
                    <?php
                    //Ingelogd dan contact opnemen knop ander disabled
                    if (isset($_SESSION['userID'])) {
                        echo '<a href="mailto:' . $email .'" class="btn btn-secondary" role="button">Contact opnemen</a>';
                    } else {
                        echo '<div class="tooltip-wrapper" data-placement="bottom" data-content="Hiervoor moet je ingelogd zijn">
                        <a href="" class="btn btn-secondary disabled" role="button" disabled>Contact opnemen</a>
                    </div>';
                    }
                    ?>
                    &nbsp; &nbsp;
                    <a href="meervan.php?verkoper=<?=$verkoper?>" class="btn btn-primary" role="button">Meer van
                        <?=$verkoper?></a>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Raporteren
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Rapporteer advertentie</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="comment">Omschrijving:</label>
                                        <textarea name="omschrijving" class="form-control" rows="5"
                                            id="comment"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">Sluiten</button>
                                    <button type="button" class="btn btn-primary">Versturen</button>
                                </div>
                            </div>
                        </div>
                    </div>
        <?php 
        // $query = "INSERT INTO Reporten (AdvertentieID, Raporteerde, Omschrijving) 
        //     VALUES (
        //         :AdvertentieID, 
        //         :Raporteerde,
        //         :Omschrijving )";

        // $sql = $dbh->prepare($query);
        // $sql->bindValue(":AdvertentieID", $voorwerpnummer);
        // $sql->bindValue(":Raporteerde", $rapoteerder);
        // $sql->bindValue(":Omschrijving", $omschrijving);
        // $sql->execute(); 
        ?>
                </div>
                <br>
                <hr>
                <p>Nog:</p>
                <h2 class="text-center" id="timer"></h2>
                <br>
                <hr>
                <h4>Biedingen</h4>

                <?php
                //Geeft biedform weer als veiling nog niet afgelopen is
                if ($veilinggesloten == '0' && !$isaf) {
                    echo '<form name="biedform" onsubmit="return validateForm()" method="post" action="actions/bieding_action.php">
                <div class="input-group mb-3 mx-auto" style="max-width: 300px;">
                    <input type="number" class="form-control my-4" placeholder="Minimaal € ' . $hoogstebod . '" name="bod" id="bod" aria-label=""
                        aria-describedby="basic-addon1" min="' . $hoogstebod . '" step="0.01" required>
                        <input type="hidden" name="voorwerpnummer" value="' . $voorwerpnummer . '"/>
                        <input type="hidden" name="hoogstebod" value="' . $hoogstebod . '">
                    <div class="input-group-prepend my-4">
                    <script>
                    function getdata() {
                        var bod = document.getElementById("bod").value;
                        return false;
                    } 
                    </script>';
                    
                    //Biedknop weergeven als gebruiker is ingelogd anders disabled
                    if (isset($_SESSION['userID'])) {
                        echo "<input class='btn btn-primary' data-toggle='modal' id='biedknop' data-target='#biedModal'
                        type='submit' value='Bied'>";
                    } else {
                        echo '<div class="tooltip-wrapper" data-placement="top" data-content="Hiervoor moet je ingelogd zijn">
                        <input type="submit" style="pointer-events: none" class="btn btn-primary disabled" id="biedknop" value="Bied" disabled>
                        </div>';
                    }
                }
                    ?>
            </div>
        </div>
        </form>
        <table class="table">
            <thead>
                <tr>
                    <th>Gebruiker</th>
                    <th>Bod</th>
                    <th>Datum & Tijd</th>
                </tr>
            </thead>
            <tbody>
                <!-- Weergeven alle biedingen in tabelvorm -->
                <?php
                            foreach ($resultaat as $key => $value) {
                                $datetime = date_create($value['boddag'] . " " . $value['bodtijdstip'], timezone_open("Europe/Amsterdam"));
                                $datetime = date_format($datetime, "d-m-Y H:i");
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

        //Biedknop disabled als input niet genoeg is
        bod.addEventListener("input", function (e) {
            if (this.value <= < ? = $hoogstebod ? > ) {
                biedknop.disabled = true;
            } else {
                biedknop.disabled = false;
            }
        });

        //Controleert input
        function validateForm() {
            var bod, melding;

            bod = document.getElementById("bod").value;

            if (isNaN(bod) || bod <= < ? = $hoogstebod ? > ) {
                alert("Je moet meer bieden!");
                return false;
            } else {
                var bod = document.getElementById('bod').value;

                if (confirm("Weet u zeker dat u €" + bod + " wilt bieden")) {
                    return true;
                } else {
                    return false;
                }
            }
        }

        //Timer
        var countDownDate = new Date('<?=$eindedag?> <?=$eindetijdstip?>').getTime();

        var x = setInterval(function () {

            var now = new Date().getTime();

            var distance = countDownDate - now;

            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById('timer').innerHTML = days + 'd ' + hours + 'h ' +
                minutes + 'm ' + seconds + 's ';

            if (distance <= 0) {
                clearInterval(x);
                document.getElementById('timer').innerHTML = 'Veiling is afgelopen!';
            }
        }, 1000);
    </script>
</body>

<?php include 'includes/footer.php'; ?>

</html>